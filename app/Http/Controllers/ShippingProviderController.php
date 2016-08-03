<?php

namespace App\Http\Controllers;

use App\ShippingProvider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShippingProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = ShippingProvider::all();
        return view('admin.shipping-provider.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping-provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateShippingProvider $request)
    {
        ShippingProvider::create($request->input());

        \Session::flash('flash_message','Shipping Provider Created');
        return redirect()->action('ShippingProviderController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  ShippingProvider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingProvider $provider)
    {
        return view('admin.shipping-provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ShippingProvider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingProvider $provider)
    {
        return view('admin.shipping-provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateShippingProvider $request, ShippingProvider $provider )
    {
        $provider->update($request->input());
        \Session::flash('flash_message','Shipping Provider Updated');
        return redirect()->action('ShippingProviderController@index',$provider);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingProvider $provider)
    {
    }
}
