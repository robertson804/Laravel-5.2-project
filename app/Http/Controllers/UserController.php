<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $packages = $user->packages;
        $orders = $user->orders;
        return view('admin.user.show')->with([
            'user' => $user,
            'packages' => $packages,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function editPassword(User $user)
    {
        return view('admin.user.editPassword', compact('user'));
    }

    public function editBilling(User $user)
    {
        return view('admin.user.editBilling', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function resubscribe(Request $request, User $user)
    {

        try {
            if (isset($user->subscription) && $user->subscription($request->plan)->cancelled()) {
                //If user's subscription has failed
                $user->subscription($request->plan)->resume($request->{'stripe-token'});
            } else {
                //If the user never had a subscription
                $user->newSubscription($request->plan, $request->plan)->create($request->{'stripe-token'}, [
                        'email' => $user->email,
                        'description' => $user->full_name,
                    ]
                );
        }

        } catch (Exception $e) {
            return back()->with('flash_error', 'Error Occoured');
        }

        Session::flash('flash_message', 'Welcome Back!');
        return redirect('/account');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
