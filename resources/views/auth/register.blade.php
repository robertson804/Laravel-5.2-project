@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('general.reg_title') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                {{ Form::open(['id'=>'register-form']) }}
                <fieldset class="register">
                    <legend>{{ trans('general.reg_account') }}</legend>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('email',trans('general.reg_email'),['class' => 'col-md-4 required control-label']) }}
                        <div class="col-md-6">
                            {{ Form::email('email', old('email'), ['class' =>  'form-control']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                        {{ Form::label('email_confirmation',trans('general.reg_confirm_email'),['class' => 'col-md-4 required control-label']) }}
                        <div class="col-md-6">
                            {{ Form::email('email_confirmation', old('email'), ['class' =>  'form-control']) }}
                            @if ($errors->has('email_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {{ Form::label('password',trans('general.reg_password'),['class' => 'col-md-4 required control-label']) }}
                        <div class="col-md-6">
                            {{ Form::password('password', ['class' => 'form-control']) }}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        {{ Form::label('password_confirmation',trans('general.reg_confirm_password'),['class' => 'col-md-4 required control-label']) }}

                        <div class="col-md-6">
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                @include('partials.user.edit-info')
                @include('partials.user.edit-address')

                <div class="toc-box form-group{{ $errors->has('confirm') ? ' has-error' : '' }}">
                    <span class="col-md-4">
                    </span>
                    <div class="col-md-6 confirm">
                        <span>
                        {!! trans('general.reg_confirm') !!}</span>
                        {{ Form::checkbox('confirm',old('confirm'),false ) }}
                        @if ($errors->has('confirm'))
                            <span class="help-block">
                                <strong>{{ $errors->first('confirm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{ Form::submit(trans('general.reg_submit')) }}
                {{ Form::close() }}
            </div>

            <div class="col-sm-5 reasons-to-register">
                <div class="col-sm-12 col-xs-6">
                    <p><i class="fa fa-check"></i> {{ trans('general.reg_easy') }}</p>
                </div>
                <div class="col-sm-12 col-xs-6">
                    <p><i class="fa fa-user-times"></i> {{ trans('general.reg_share') }}</p>
                </div>
                <div class="col-sm-12 col-xs-6">
                    <p><i class="fa fa-lock"></i> {{ trans('general.reg_secure') }}</p>
                </div>
                <div class="col-sm-12 col-xs-6">
                    <p><i class="fa fa-thumbs-o-up"></i> {{ trans('general.reg_sat') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Code for Remarketing Tag -->
  <!--------------------------------------------------
  Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
  --------------------------------------------------->
  <script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 880271812;
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
  </script>
  <noscript>
  <div style="display:inline;">
  <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/880271812/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
  </noscript>
@endsection

@section('footer')
@endsection
