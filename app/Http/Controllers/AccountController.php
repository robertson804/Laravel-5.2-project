<?php

namespace App\Http\Controllers;

use App\Exceptions\StripeException;
use App\Http\Requests;
use App\Http\Utilities\Countries;
use App\Http\Utilities\ShippingCalculations;
use App\Order;
use App\Package;
use App\Postshipper\Shipping\ShippingAddress;
use App\ShippingBox;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Postshipper\Billing\StripeBilling;
use Illuminate\Support\Facades\Lang;
use Laravel\Cashier\Invoice;
use Mockery\CountValidator\Exception;
use Stripe\Stripe;


class AccountController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //User
        $user = $this->user;
        //Paid Orders
        $orders = $user->orders()->paid()->orderBy('created_at', 'desc')->get();

        //Current pending/consolidated order
        $current_order = $user->orders()->unShipped()->first();

        $hdbox = ShippingBox::find(1);

        $needs_resolve = false;
        if ($current_order) {
            $needs_resolve = $current_order->packages->filter(function ($package) {
                if ($package->status == 'resolve') {
                    return true;
                }
            });
        }



        return view('home')->with([
            'user' => $user,
            'orders' => $orders,
            'current_order' => $current_order,
            'needs_resolve' => $needs_resolve,
            'hdbox' => $hdbox,
        ]);
    }

    public function orders()
    {
        $orders = $this->user->orders()->paid()->orderBy('created_at', 'desc')->get();
        return view('account.order.index')->with([
            'user' => $this->user,
            'orders' => $orders
        ]);
    }

    public function info()
    {
        $user = $this->user;
        return view('account.user.show', compact('user'));
    }

    public function subscribe()
    {
        $user = $this->user;

        return view('account.subscribe', compact('user'));
    }

    public function invoice()
    {
        $charges = $this->user->orders()->paid()->orderBy('ordered_at','desc')->get();
        return view('account.user.invoices')->with([
            'user' => $this->user,
            'charges' => $charges,
        ]);
    }

    public function showInvoice($charge)
    {
        $ship = ShippingAddress::getShippingAddress($this->user->id);
        $charge = Order::find($charge);
        return view('account.user.invoice')->with([
            'user' => $this->user,
            'ship' => $ship,
            'charge' => $charge
        ]);
    }

    public function show()
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    public function showPassword()
    {
        $user = Auth::user();
        return view('account.editPassword', compact('user'));
    }

    public function showBilling()
    {
        $user = Auth::user();
        return view('account.editBilling', compact('user'));
    }

    public function cancelSubscription(User $user)
    {
        $user->subscription()->cancel();
        \Session::flash('flash_message', 'Subscription Cancelled');
        return redirect('/account');
    }

    public function updateBilling(Request $request, User $user)
    {
        try {

            $user->updateCard($request->{'stripe-token'});
        } catch (\Exception $e) {
            throw new StripeException('/account');
        }
        $user->save();
        \Session::flash('flash_message', Lang::get('account.flash_billing'));

        //Redirect admins
        if (Auth::user()->is_admin) {
            return redirect('/admin/user/' . $user->id);
        }
        return redirect('/account/info');
    }

    public function update(Requests\UpdateUserRequest $request, User $user)
    {
        $user->update($request->input());
        \Session::flash('flash_message', Lang::get('account.flash_info'));
        //Redirect admins
        if (Auth::user()->is_admin) {
            return redirect('/admin/user/' . $user->id);
        }
        return redirect('/account/info');
    }

    public function updatePassword(Requests\UpdateUserPasswordRequest $request, User $user)
    {
        $user->password = bcrypt($request->password);
        $user->save();
        \Session::flash('flash_message', Lang::get('account.flash_password'));
        //Redirect admins
        if (Auth::user()->is_admin) {
            return redirect('/admin/user/' . $user->id);
        }
        return redirect('/account/info');
    }
}
