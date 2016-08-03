@extends('layouts.admin')

@section('content')
    <h1>Edit {{ $shippingBox->name }}</h1>

    {{ Form::model($shippingBox,['method' => 'PATCH', 'action' => ['ShippingBoxController@update', $shippingBox->id] ]) }}


    <div class="form-group col-sm-12">
        {{ Form::label('name','Product Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('price','Box Price:') }}
        <div class="input-group">
            <div class="input-group-addon">$</div>
            {{ Form::text('price', $shippingBox->getOriginal('price') / 100, ['class' => 'form-control']) }}
            <div class="input-group-addon">.00</div>
        </div>
    </div>

    <div class="form-group col-sm-6">
        {{ Form::label('max_weight','Weight in Pounds:') }}
        <div class="input-group">
            {{ Form::text('max_weight', ShippingCalculations::gramsToPounds($shippingBox->getOriginal('max_weight')), ['class' => 'form-control']) }}
            <div class="input-group-addon"> LB</div>
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

    <div class="form-group">
        {{ Form::submit('Edit', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection