@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Order #{{$order->id}}</h1>

    <div class="row">
        <h3 class="sub-header">Order Details</h3>
        <div class="col-md-3 order-details">
            <img src="{{ $order->card }}" class="photo thumbnail">
        </div>
        <div class="col-md-4 order-details">
            <dl class="dl-horizontal">
                <dt>Order Number:</dt>
                <dd>#{{$order->id}}</dd>
                <dt>Shipping Total:</dt>
                <dd>{{$order->cost}}</dd>
                <dt>Status:</dt>
                <dd>{{ucfirst($order->status)}}</dd>
                <dt>Economy Price:</dt>
                <dd>{{$order->slow_price}}</dd>
                <dt>Fast Price:</dt>
                <dd>{{$order->fast_price}}</dd>
                <dt>Total Weight:</dt>
                <dd>{{ $order->weight}} LB</dd>
                <dt>Hd Box Option:</dt>
                <dd>{{ $order->box_option ? 'Enabled' : 'Disabled'}}</dd>
            </dl>
        </div>
        <div class="col-md-4 order-details">
            @if(in_array($order->status, ['ready','shipped','arrived','delivered'] ))
                <dl class="dl-horizontal">
                    <dt>Shipping Method:</dt>
                    <dd>{{$order->shipping_method}}</dd>
                    <dt>Price Paid:</dt>
                    <dd>{{$order->cost}}</dd>
                </dl>
                <div class="help-block">To print the invoice on the next page:<br> press Control + P ( Windows ) or Command + P ( Mac ).</div>
                <a target="_blank" href='{{ action('AccountController@showInvoice', $order->id) }}' >
                    <button class="btn btn-primary">View Invoice</button></a>
            @else
                <a href="{{ action('OrderController@process',$order) }}">
                    <button class="btn btn-success">Update/Consolidate</button>
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        <h3 class="sub-header">Order Packages</h3>
        @include('partials.order_packages')
    </div>
@endsection
