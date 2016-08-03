@extends('layouts.admin')

@section('content')

    <h1>Edit package #{{ $package->id }} - {{ $package->name }}</h1>


    {{ Form::model($package,['method' => 'PATCH', 'action' => ['PackageController@update', $package->id],'files'=>true ]) }}


    <div class="row">
        <img src="{{ $package->open_image }}" class="photo thumbnail pull-left">
        <img src="{{ $package->close_image }}" class="photo thumbnail pull-left">
    </div>

    <div class="form-group col-sm-12">
        {{ Form::label('name','Product Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-sm-12">
        {{ Form::label('price','Product Price:') }}
        <div class="help-block"><p>If you cannot find a price, leave blank and the client will be prompted to fill it in.</p></div>
        <div class="input-group">
            <div class="input-group-addon">$</div>
            {{ Form::text('price', $package->getOriginal('price') / 100, ['class' => 'form-control']) }}
            <div class="input-group-addon">.00</div>
        </div>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('weight','Weight in Pounds:') }}
        <div class="input-group">
            {{ Form::text('weight', ShippingCalculations::gramsToPounds($package->getOriginal('weight')), ['class' => 'form-control']) }}
            <div class="input-group-addon"> LB</div>
        </div>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('received_at','Date package was received:') }}
        {{ Form::text('received_at',\Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'id'=> 'datepicker']) }}
    </div>

    <div class="form-group col-sm-12">
        {{ Form::label('user_id','Mailbox #:') }}
        {{ Form::text('user_id', null, ['class' => 'form-control']) }}
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
    <div class="help-block col-md-12">
        <p>Oversize packages will show in red on the consolidation page</p>
    </div>

    <div class="form-group col-md-6">
        {{ Form::input('hidden','old_close_image',$package->close_image) }}
        {{ Form::label('close_image','Closed Box Photo') }}
        {{ Form::file('close_image', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::input('hidden','old_open_image',$package->open_image) }}
        {{ Form::label('open_image','Opened Box Photo') }}
        {{ Form::file('open_image', null, ['class' => 'form-control']) }}
    </div>


    <div class="form-group">
        {{ Form::submit('Edit Package', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
