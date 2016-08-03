<fieldset class="address">
<legend>{{Lang::get('account.my_address')}}</legend>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {{ Form::label('address',Lang::get('account.address'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('address', old('address'), ['class' =>  'form-control']) }}
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
        {{ Form::label('address_2',Lang::get('account.address_2'),['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('address_2', old('address_2'), ['class' =>  'form-control']) }}
            @if ($errors->has('address_2'))
                <span class="help-block">
                        <strong>{{ $errors->first('address_2') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
        {{ Form::label('country',Lang::get('account.country'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::select('country', CountrySome::getSome(Config::get('country.countries'),'en', 'cldr'),old('country'), ['class'=>'form-control']) }}
            @if ($errors->has('country'))
                <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
        {{ Form::label('state',Lang::get('account.state'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('state', old('state'), ['class' =>  'form-control']) }}
            @if ($errors->has('state'))
                <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
        {{ Form::label('city',Lang::get('account.city'),['class' => 'col-md-4 required control-label']) }}
        <div class="col-md-6">
            {{ Form::text('city', old('city'), ['class' =>  'form-control']) }}
            @if ($errors->has('city'))
                <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('postal') ? ' has-error' : '' }}">
        {{ Form::label('postal',Lang::get('account.postal'),['class' => 'col-md-4 control-label']) }}
        <div class="col-md-6">
            {{ Form::text('postal', old('postal'), ['class' =>  'form-control']) }}
            @if ($errors->has('postal'))
                <span class="help-block">
                        <strong>{{ $errors->first('postal') }}</strong>
                </span>
            @endif
        </div>
    </div>
</fieldset>
