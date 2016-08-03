@extends('layouts.admin')

@section('content')

    <h1>Add a new Faq</h1>

    {{ Form::open(['url' => action('FaqController@store')]) }}

    <div class="form-group col-md-12">
        {{ Form::label('name','Faq Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ form::label('title_en','faq title english:') }}
        {{ form::text('title_en', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('title_ar','Faq Title Arabic:') }}
        {{ Form::text('title_ar', null, ['class' => 'form-control','dir'=>'rtl']) }}
    </div>
    <p class="help-block">Title Field is shown to the user</p>

    <div class="help-message col-md-12">Leave a language field empty if you don't want the FAQ to show up in that language</div>
    <div class="form-group col-md-12">
        {{ Form::label('content_en','Content English:') }}
        {{ Form::textarea('content_en', null, ['class' => 'form-control','id'=>'content_en']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('content_ar','Content Arabic:') }}
        {{ Form::textarea('content_ar', null, ['class' => 'form-control','id'=>'content_ar']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Add Faq', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close() }}
    @include('partials.error-box')
@endsection
@section('footer')
    <script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content_en' );
        CKEDITOR.replace( 'content_ar',{
            contentsLangDirection: 'rtl'
        } );
    </script>
    @endsection
