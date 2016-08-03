@extends('layouts.admin')

@section('content')

    <h1>Edit Shipment #{{ $shipment->id }}</h1>


    {{ Form::model($shipment,['method' => 'PATCH', 'action' => ['ShipmentController@update', $shipment->id] ]) }}


    <div class="form-group">
        {{ Form::label('shipping_provider','Shipping Provider:') }}
        {{ Form::select('shipping_provider', $shipping_providers, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('tracking_code','Provider Tracking Code:') }}
        {{ Form::text('tracking_code', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edit Package', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
