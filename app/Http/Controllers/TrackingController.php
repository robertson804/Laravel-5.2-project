<?php

namespace App\Http\Controllers;

use App\Order;
use App\Tracking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shipment;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTrackingRequest $request)
    {
        $tracking = new Tracking();

        $tracking->tracking_at = $request->tracking_at;
        $tracking->location = $request->location;
        $tracking->description = $request->description;

        if ($request->order_id === '') {
            Shipment::find($request->shipment_id)->tracking()->save($tracking);
        } else {
            $order = Order::find($request->order_id);
            if($request->has('complete')){
                $order->update(['status'=>'delivered']);
                $order->packages()->update(['status'=>'delivered']);
            }
            $order->tracking()->save($tracking);
        }

        \Session::flash('flash_message', 'Tracking Data Added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tracking $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        $tracking->delete();
        \Session::flash('flash_message', 'Tracking deleted');
        return redirect()->back();
    }
}
