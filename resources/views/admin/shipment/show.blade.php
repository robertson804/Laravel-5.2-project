@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Shipment #{{ $shipment->id }}</h1>

    <h2>Orders</h2>
    @foreach($shipment->orders as $order)
        <div class="row">
            <div class="col-md-2">
                <img class="thumb thumbnail" src="{{ $order->card }}">
            </div>
            <div class="col-md-2">
                <h4 class="center">User Details:</h4>
                <dl class="dl">
                    <dt>User</dt>
                    <dd><a href="{{action('UserController@show',$order->user)}}">{{ $order->user->fullName }}</a></dd>
                    <dt>Unit #</dt>
                    <dd><a href="{{action('UserController@show',$order->user)}}">{{ $order->user->id }} </a> </dd>
                </dl>

            </div>
            <div class="col-md-2">
                <h4 class="center">Order Details:</h4>
            <dl>
                <dt>Shipping Method</dt>
                <dd><a href="{{action('OrderController@show',$order)}}">{{ $order->shipping_method }}</a> </dd>
                <dt>Order Price</dt>
                <dd><a href="{{action('OrderController@show',$order)}}">{{ $order->cost }}</a></dd>
                <dt>Order #</dt>
                <dd><a href="{{action('OrderController@show',$order)}}">{{$order->id}}</a></dt>
            </dl>
                </div>
            <div class="col-md-2">
                <h4>Destination:</h4>
                <address>
                    {{ $order->user->address }} <br>
                    {{ $order->user->address_2 }} <br>
                    {{ $order->user->city }}, {{ $order->user->state }} {{ $order->user->postal }} <br>
                    {{ Countries::getOne($order->user->country, 'en', 'cldr') }} <br>
                </address>
            </div>
            <div class="col-md-4">
                <a href="{{ action("OrderController@show",$order) }}">
                    <button class="btn btn-success">View Order</button>
                </a>
            </div>

        </div>
    @endforeach

    <h2>Shipment Details</h2>
    <div class="row">
        <dl class="dl-horizontal">
            <dt>Shipment id:</dt>
            <dd>#{{$shipment->id}}</dd>
            <dt>Status:</dt>
            <dd>{{$shipment->status}}</dd>
            <dt>Shipping Provider:</dt>
            <dd>{{$shipment->shippingProvider->name}}</dd>
            <dt>Tracking Code:</dt>
            <dd><a href="#">{{$shipment->tracking_code}}</a></dd>
        </dl>
    </div>

    <div>
        <a href="{{ action("ShipmentController@edit",$shipment) }}">
            <button class="btn btn-success">Edit</button>
        </a>
        <a href="{{ action("ShipmentController@track",$shipment) }}">
            <button class="btn btn-success">Add Tracking Data</button>
        </a>
        @if($shipment->complete == false)
            {{ Form::open(['url' => action("ShipmentController@destroy",$shipment),'method'=>'DELETE']) }}
            <button type="submit" class="btn btn-warning">Delete Shipment</button>
            {{ Form::close() }}
        @endif
    </div>
@endsection

