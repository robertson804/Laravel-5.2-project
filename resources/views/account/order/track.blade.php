@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.account.account-nav')
        <div class="row">
            <div class="col-md-9 order-track">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{Lang::get('account.tracking_at')}}</th>
                        <th>{{Lang::get('account.tracking_location')}}</th>
                        <th>{{Lang::get('account.tracking_description')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>{{ $order->consolidated_at->toDayDateTimeString() }}</th>
                        <td>{{Lang::get('account.warehouse')}}</td>
                        <td>{{Lang::get('account.created_with',['count' => count($order->packages)])}}</td>
                    </tr>
                    @if(!in_array($order->status,['pending','consolidated']))
                        <tr>
                            <th>{{ $order->ordered_at->toDayDateTimeString() }}</th>
                            <td>{{Lang::get('account.warehouse')}}</td>
                            <td>{{Lang::get('account.shipped_at')}}</td>
                        </tr>
                    @endif
                    @if($order->shipment)
                        <tr>
                            <th>{{ $order->shipment->created_at->toDayDateTimeString() }}</th>
                            <td>{{Lang::get('account.warehouse')}}</td>
                            <td>{{ trans('account.shipped') }}</td>
                        </tr>
                        @foreach($trackings as $tracking)
                            <tr>
                                <th>{{ \Carbon\Carbon::parse($tracking->tracking_at)->toDayDateTimeString() }}</th>
                                <td>{{ $tracking->location }}</td>
                                <td>{{ $tracking->description }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 order-details">
                <div class="order-details-box">
                    <a href="{{ $order->photo }}" data-featherlight="image">
                        <img src="{{ $order->card }}" class="thumbnail photo">
                    </a>
                    <dl class="dl-horizontal">
                        <dt>{{Lang::get('account.order_id')}}</dt>
                        <dd>#{{$order->id}}</dd>
                        <dt>{{Lang::get('account.order_cost')}}</dt>
                        <dd>{{$order->cost}}</dd>
                        <dt>{{Lang::get('account.order_status')}}</dt>
                        <dd>{{$order->status_format}}</dd>
                        <dt>{{Lang::get('account.shipping_method')}}</dt>
                        <dd>{{$order->shipping_method}}</dd>
                    </dl>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading shipping-address">
                        {{ trans('account.shipping_address') }}
                    </div>
                    <div class="panel-body">
                        @include('partials.order.shipping', ['user'=>$order->user])
                    </div>
                </div>
            </div>
        </div>
@endsection