@extends('layouts.admin')

@section('content')

    <h1>Add a new Shipping Provider</h1>

    {{ Form::open(['url' => action('ShippingProviderController@store')]) }}

    <div class="help-block">
        The Provider link MUST contain '{code}' to denote where a tracking code is to be placed (eg: ups.com/?tracking=<b>{code}</b>)<BR>
        Check with your shipping company before pasting your url
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('name','Provider Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('link','Provider Link:') }}
        {{ Form::text('link', null, ['class' => 'form-control']) }}
    </div>


    <div class="form-group">
        {{ Form::submit('Add Package', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
