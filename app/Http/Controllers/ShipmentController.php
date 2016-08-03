<?php

namespace App\Http\Controllers;

use App\Order;
use App\Postshipper\Shipping\ShippingAddress;
use App\Shipment;
use App\ShippingProvider;
use App\Tracking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $shipments = Shipment::orderBy('complete')->orderBy('created_at', 'desc')->get();

        return view('admin.shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $orders = Order::ready()->get();
        $shipping_providers = ShippingProvider::all()->lists('name','id');
        return view('admin.shipment.create', compact('orders'),compact('shipping_providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * //TODO request
     */
    public function store(Requests\CreateShipmentRequest $request)
    {
        $shipment = Shipment::create($request->input());

        //Get all orders, add them
        foreach ($request->order as $order_id) {
            $order = Order::find($order_id);
            $order->packages()->update(['status'=>'shipped']);
            $user = $order->user;
            $shipment->orders()->save($order);
            $shipment->orders()->update(['status'=>'shipped']);

            \Mail::send('emails.shipped',['user'=>$user,'order'=>$order],function($m) use ($user){
                $m->from(\Config::get('mail.from.address'), trans('general.site_name')) ;
                $m->to($user->email, $user->full_name)->subject(trans('emails.shipped_subject'));
            });
        }

        Session::flash('flash_message', 'Shipment Built');
        return redirect('/admin/shipment');
    }

    /**
     * Display the specified resource.
     *
     * @param  Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
        return view('admin.shipment.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        $shipping_providers = ShippingProvider::all()->lists('name','id');
        return view('admin.shipment.edit', compact('shipment'),compact('shipping_providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        $shipment->update($request->input());
        $shipment->save();
        Session::flash('flash_message', 'Shipment updated');
        return redirect('/admin/shipment');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        //destroy the resource
        $shipment->orders()->update(['status'=>'ready']);

        DB::table('shipments')
        ->join('orders','shipments.id','=','orders.shipment_id')
        ->join('packages', 'orders.id', '=', 'packages.order_id')
        ->where('shipments.id', $shipment->id)
        ->update(['packages.status'=>'ready']);

        $shipment->delete();

        Session::flash('flash_message', 'Shipment Deleted');

        return redirect()->action('ShipmentController@index');

    }

    public function track(Shipment $shipment)
    {

        $order_select = [];
        $tracking = $shipment->trackingThrough()->get();
        $orders_to_track = $shipment->orders()
            ->where('status','!=','delivered')
            ->get()
            ->pluck('id', 'id')->prepend('All Orders', '');


        $order_select = $orders_to_track->map(function($setname,$id){
            $order = Order::find($id);
            if($order){
                $disp = 'Order#: ' . $order->id . ' - ' . $order->user->fullName . ' Unit#: ' . $order->user->id;
            }else{
                $disp = $setname;
            }

            return $disp;
        });

        return view('admin.tracking.create')->with([
            'tracking'=>$tracking,
            'order_select'=>$order_select,
            'shipment'=>$shipment,
        ]);
    }

    public function complete(Shipment $shipment)
    {
        $shipment->orders()->update(['status' => 'arrived']);
        $shipment->update(['complete' => true ]);

        Session::flash('flash_message', 'Shipment Completed');
        return redirect()->back();
    }

    public function uncomplete(Shipment $shipment)
    {
        $shipment->orders()->update(['status' => 'shipped']);
        DB::table('shipments')
            ->join('orders','shipments.id','=','orders.shipment_id')
            ->join('packages', 'orders.id', '=', 'packages.order_id')
            ->where('shipments.id', $shipment->id)
            ->update(['packages.status'=>'shipped']);

        $shipment->update(['complete'=> false]);

        Session::flash('flash_message', 'Shipment Un Completed');
        return redirect()->action('ShipmentController@show', compact('shipment'));
    }

    public function customs(Shipment $shipment){

        $ship = ShippingAddress::getShippingAddress();
        return view('customs', ['instance'=>$shipment, 'ship'=>$ship]);
    }
}
