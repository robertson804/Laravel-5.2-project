@extends('layouts.admin')

@section('content')

    <h1>Add a new Slide</h1>

    {{ Form::open(['url' => action('SliderController@store'), 'files' => true]) }}


    <div class="form-group col-md-12">
        {{ Form::label('name','Slide Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('link','Slide Link:') }}
        {{ Form::text('link', null, ['class' => 'form-control']) }}
    </div>

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
