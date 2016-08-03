@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('account.edit_pass') }}</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">

                {{ Form::model($user,['method' => 'PATCH', 'url' => ['/account/update/password',$user->id], 'id'=>'register-form' ]) }}

                <fieldset class="register">
                    <legend>{{ Lang::get('account.change_password') }}</legend>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {{ Form::label('password',Lang::get('account.password'),['class' => 'col-md-4 control-label']) }}
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
                        {{ Form::label('password_confirmation',Lang::get('account.confirm_password'),['class' => 'col-md-4 control-label']) }}

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

                {{ Form::submit(Lang::get('account.save_changes')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="js/billing.js"></script>
@endsection
