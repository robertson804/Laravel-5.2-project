@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1 class="page-header">Consolidate Order #{{ $order->id }}</h1>

        <h2 class="sub-header"> Received Packages </h2>
        @include('partials.package.package-tables')
    </div>

    <div class="row" id="process-step-2">
        <h2 class="sub-header">Consolidate Order</h2>
        @if($packages->filter(function($package){
            return $package->oversized;
        })->first())
            <div class="alert alert-danger">Order Is Oversized, Price accordingly</div>
        @endif
        {{ Form::model($order,['method' => 'PATCH', 'action' => ['OrderController@updateProcess', $order->id], 'files'=>true,'id'=>'process-form' ]) }}

        <div class="form-group col-md-12">
            {{ Form::label('consolidated_image','Consolidated Package Photo:') }}
            {{ Form::file('consolidated_image', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('slow_price','Set Economy Shipping') }}
            <div class="input-group">
                <div class="input-group-addon">$</div>
                {{ Form::text('slow_price', '', ['class' => 'form-control', 'placeholder' => 'Old Price - ' . $order->slow_price]) }}
                <!-- <div class="input-group-addon">.00</div> -->
            </div>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('fast_price','Set Fast Shipping') }}
            <div class="input-group">
                <div class="input-group-addon">$</div>
                {{ Form::text('fast_price', '', ['class' => 'form-control','placeholder' => 'Old Price - ' . $order->fast_price]) }}
                <!-- <div class="input-group-addon">.00</div> -->
            </div>
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('length','Length:') }}
            <div class="input-group">
                {{ Form::text('length', null, ['class' => 'form-control']) }}
                <div class="input-group-addon">In</div>
            </div>
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('width','Width:') }}
            <div class="input-group">
                {{ Form::text('width', null, ['class' => 'form-control']) }}
                <div class="input-group-addon">In</div>
            </div>
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('height','Height') }}
            <div class="input-group">
                {{ Form::text('height', null, ['class' => 'form-control']) }}
                <div class="input-group-addon">In</div>
            </div>
        </div>
        <div class="form-group col-md-6 col-md-offset-right-6">
            {{ Form::label('weight','Weight in Pounds:') }}
            <div class="input-group">
                {{ Form::text('weight', null, ['class' => 'form-control']) }}
                <div class="input-group-addon"> LB</div>
            </div>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('box_option','Allow Postshipper Big Box Shipping') }}
            {{ Form::checkbox('box_option', null, null , ['class' => '']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Consolidate', ['class' => 'btn btn-primary form-control']) }}
        </div>

        {{ Form::close() }}
        @include('partials.error-box')
    </div>
@endsection

@section('footer')
@endsection
