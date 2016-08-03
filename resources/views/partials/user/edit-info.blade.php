<fieldset class="info">
    <legend>{{ Lang::get('account.user_info') }}</legend>

    <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
        {{ Form::label('company_name',Lang::get('account.company_name'),['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('company_name', old('company_name'), ['class' =>  'form-control']) }}
            @if ($errors->has('company_name'))
                <span class="help-block">
                        <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        {{ Form::label('first_name',Lang::get('account.first_name'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('first_name', old('first_name'), ['class' =>  'required form-control']) }}
            @if ($errors->has('first_name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        {{ Form::label('last_name',Lang::get('account.last_name'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('last_name', old('last_name'), ['class' =>  'required form-control']) }}
            @if ($errors->has('last_name'))
                <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone',Lang::get('account.phone'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('phone', old('phone'), ['class' =>  'required form-control']) }}
            @if ($errors->has('phone'))
                <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
</fieldset>
