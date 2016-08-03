<?php

namespace App\Http\Controllers;

use App\Order;
use App\Package;
use App\Exceptions\CardDenied;
use App\Postshipper\Billing\StripeBilling;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ProcessOrderRequest;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Utilities\ShippingCalculations;
use App\Http\Utilities\ImageHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function viewUnprocessed()
    {

        $orders = Order::Unshipped()->get();
        return view('admin.order.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $user = User::fetch($user_id);
        return view('admin.user.create', compact('user'));
    }

    /**
     *
     * Takes a 'consolidated' order,
     * adds it's packages and charges the customer against
     *
     */
    public function pay(CreateOrderRequest $request, Order $order)
    {
        $cost = $order->calculateCost($request->shipping_method);
        if($order->user->country == 'kw') {
          $cost = $cost + 700; //clearance
        }

        try{
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $order->user->email,
                'card'  => $request->{'stripe-token'}
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $cost,
                'currency' => 'usd'
            ));

        }catch(\Stripe\Error\Card $e){
            throw new CardDenied();
        }

        $order->update([
            'cost' => $cost,
            'status' => 'ready', //Ready to ship
            'shipping_method' => $request->shipping_method,
            'ordered_at' => Carbon::now(),
            'charge_id' => $charge->id,
        ]);
        $order->packages()->update(['status' => 'ready']);

        \Mail::send('emails.admin.paid',['order'=>$order],function($m){
            $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to('info@postshipper.com', 'PostshipperAdmin')->subject('PostShipper Admin - Order has been paid for');
        });
        Session::flash('flash_message', Lang::get('account.flash_order_created'));
        return redirect('/account/orders');
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function showAccount(Order $order)
    {
        return view('account.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $packages = $order->packages;
        return view('admin.order.edit', compact('order'), compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function process(Order $order)
    {
        $packages = $order->packages;
        return view('admin.order.process', compact('order'), compact('packages'));
    }

    public function updateProcess(Requests\ConsolidateOrderRequest $request, Order $order)
    {

        //Save the image
        $image = $request->consolidated_image;
        $filename = 'order-' . $order->id . '-' . time() . '.' . $image->getClientOriginalExtension();
        ImageHandler::storeImage($image, $filename);
        $order->consolidated_image = $filename;

        $order->status = 'consolidated';
        $order->weight = ShippingCalculations::poundsToGrams($request->weight);
        $order->length = $request->length;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->consolidated_at = Carbon::now();
        $order->box_option = ($request->has('box_option') ? true : false);
        $order->update($request->only('fast_price', 'slow_price'));
        $user = $order->user;

        \Mail::send('emails.consolidated',['user'=>$user, 'order' => $order],function($m) use ($user){
            $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
            $m->to($user->email, $user->full_name)->subject(trans('emails.consolidated_subject'));
        });

        Session::flash('flash_message', 'Order has been consolidated');
        return redirect('/admin/order');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //First We refund
        $stripe = new StripeBilling();
        $stripe->refundCharge($order->charge_id);

        //Then we dissasociate packages
        foreach ($order->packages as $package) {
            $package->order()->dissociate();
            $package->save();
        }

        //Then we delete the order
        $order->delete();
        Session::flash('flash_message', 'Order refunded and deleted');
        return redirect('/account');
    }

    public function track(Order $order)
    {
        $trackings = null;
        if ($order->shipment) {

            $trackings = DB::table('trackings')
                ->where(function ($query) use ($order) {
                    $query->where('trackable_id', $order->id)
                        ->where('trackable_type', 'App\Order');
                })
                ->orWhere(function ($query) use ($order) {
                    $query->where('trackable_id', $order->shipment->id)
                        ->where('trackable_type', 'App\Shipment');
                })
                ->orderBy('tracking_at', 'asc')->get();
        }
        return view('account.order.track', compact('order'), compact('trackings'));
    }
}
