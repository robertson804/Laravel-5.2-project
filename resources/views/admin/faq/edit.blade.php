@extends('layouts.admin')

@section('content')

    <h2>Edit Faq - {{ $faq->name }}</h2>


    {{ Form::model($faq,['method' => 'PATCH', 'action' => ['FaqController@update', $faq]]) }}

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
    <div class="form-group col-md-12">
        {{ Form::label('content_en','Content English:') }}
        {{ Form::textarea('content_en', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('content_ar','Content Arabic:') }}
        {{ Form::textarea('content_ar', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edit Faq', ['class' => 'btn btn-primary form-control']) }}
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
