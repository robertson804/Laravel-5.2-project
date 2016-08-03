@extends('layouts.app')

@section('content')
    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 @if( App::getLocale() === 'ar' )style="text-align:right;"@endif>{{ trans('front.contact_title') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-6 contact-form">
                {{Form::open(['id'=>'register-form'])}}
                <fieldset class="register">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('email',trans('front.contact_email'),['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::email('email', old('email'), ['class' =>  'form-control']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name',trans('front.contact_name'),['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('name', old('name'), ['class' =>  'form-control']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        {{ Form::label('subject',trans('front.contact_subject'),['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('subject', old('subject'), ['class' =>  'form-control']) }}
                            @if ($errors->has('subject'))
                                <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        {{ Form::label('message',trans('front.contact_message'),['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::textarea('message', old('message'), ['class' =>  'form-control']) }}
                            @if ($errors->has('message'))
                                <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                {{ Form::submit(trans('front.contact_submit')) }}
                {{Form::close()}}


            </div>
            <div class="col-sm-4 col-md-4">
              <fieldset>
                <legend>USA Office</legend>
                <ul style="list-style-type:none">
                  <li><b>{{ trans ('front.office_usa_address_title')}}</b>
                    <br><span class="force_ltr">
                      {{ trans ('front.office_usa_address')}}</span></li>
                    <li><b>{{ trans ('front.office_usa_800_title')}}</b>
                      <br><span class="force_ltr">
                      {{ trans ('front.office_usa_800')}}</span></li>
                    <li><b>{{ trans ('front.office_usa_phone_title')}}</b>
                      <br><span class="force_ltr">
                      {{ trans ('front.office_usa_phone')}}</span></li>
                    <li><b>{{ trans ('front.office_usa_whatsapp_title')}}</b>
                      <br><span class="force_ltr">
                      {{ trans ('front.office_usa_whatsapp')}}</span></li>
                    <li><b>{{ trans ('front.office_usa_working_hours_title')}}</b>
                      <br><span>
                      {{ trans ('front.office_usa_working_hours')}}</span></li>
                </ul>
              </fieldset>
            </div>
        </div>
    </div>
    </div>
@endsection
