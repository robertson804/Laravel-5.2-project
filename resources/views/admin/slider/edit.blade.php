@extends('layouts.admin')

@section('content')

    <h2>Edit Front Page Slide - {{ $slider->name }}</h2>


    {{ Form::model($slider,['method' => 'PATCH', 'action' => ['SliderController@update', $slider->id] ,'files'=>true]) }}

    <div class="col-md-12">
        <img class="img-responsive img-centered" src="{{ $slider->slider }}">
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('name','Slide Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('link','Slide Link:') }}
        {{ Form::text('link', null, ['class' => 'form-control']) }}
    </div>

    @if($slider->slider)
        {{ Form::input('hidden','old_slide', $slider->slider) }}
    @endif
    <div class="form-group col-md-6">
        {{ Form::label('image','Slide Image') }}
        {{ Form::file('image', null, ['class' => 'form-control']) }}
        <div class="help-block">
            The slider must be of the following dimensions 1360px by 461px in a jpg or png, all other submissions are invalid
        </div>
    </div>

    <div class="form-group">
        {{ Form::submit('Add Slide', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
