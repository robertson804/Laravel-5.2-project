@extends('layouts.admin')

@section('content')

    <h1>Edit Shipping Provider - {{ $provider->name }}</h1>


    {{ Form::model($provider,['method' => 'PATCH', 'action' => ['ShippingProviderController@update', $provider->id] ]) }}
    <div class="form-group col-md-12">
        {{ Form::label('name','Provider Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('link','Provider Link:') }}
        {{ Form::text('link', null, ['class' => 'form-control']) }}
    </div>



    <div class="form-group">
        {{ Form::submit('Edit Package', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
