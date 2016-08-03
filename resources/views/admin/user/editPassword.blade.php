@extends('layouts.admin')

@section('content')

    {{ Form::model($user,['method' => 'PATCH', 'action' => ['AccountController@updatePassword',$user->id] ]) }}

    <fieldset class="register">
        <legend>Change Password</legend>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('password','Password',['class' => 'col-md-4 control-label']) }}
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
            {{ Form::label('password_confirmation','Confirm Password',['class' => 'col-md-4 control-label']) }}

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

    {{ Form::submit('Save Changes') }}
    {{ Form::close() }}

@endsection

@section('footer')
    <script src="js/billing.js"></script>
@endsection
