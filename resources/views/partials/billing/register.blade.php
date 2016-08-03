<fieldset class="billing">
    <input type="hidden" name="plan" value="standard">
    <legend>{{ trans('general.reg_billing') }}</legend>
    @if(isset($token))
        <div class="saved-billing">
            {{ Form::input('hidden', 'stripe-token', $token) }}
            <div class="help-block blue col-md-offset-4 col-md-6">
                {{ trans('general.reg_saved') }}
            </div>
            {{ Form::label('enable-billing', trans('general.reg_new'),['class' => 'col-md-4 required control-label']) }}
            {{ Form::checkbox('enable-billing', null, null, ['class'=>'col-md-1']) }}
        </div>
    @endif

    <div class="billing-info {{ isset($token)? "hidden" : "" }} ">
        <div class="help-block blue col-md-offset-4 col-md-6">
            {{ trans('general.registration_billing_justification') }}
        </div>
        <div class="form-group">
            {{ Form::label(null, trans('general.reg_card'),['class' => 'col-md-4 required control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'number','class' =>  'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_cvc'),['class' => 'col-md-4 required control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'cvc','class' =>  'form-control']) }}
            </div>
        </div>
        <div class="form-row">
            {{ Form::label(null,trans('general.reg_expiry'),['class' => 'col-md-4 required control-label']) }}
            <div class="col-md-6">
                {{ Form::selectMonth(null,null,['data-stripe' => 'exp-month', 'class' => 'form-control']) }}
                {{ Form::selectYear(null,date('Y'),date('Y') + 10,null, ['data-stripe'=>'exp-year', 'class'=>'form-control']) }}
            </div>
        </div>
        <div class="help-block blue col-md-offset-4 col-md-6">
            {{ trans('general.reg_address_help') }}
        </div>

        <div class="form-group">
            {{ Form::label(null,trans('general.reg_b_name'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'name','class' =>  'form-control reg-name']) }}
            </div>
        </div>

        <div class="form-group">
            @if(Auth::check())
                {{ Form::label(null,'Shipping Information',['class' => 'col-md-4 control-label']) }}
            @else
                {{ Form::label(null,'Copy Shipping Information',['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::checkbox(null,null, null, ['class' =>  'copy-shipping']) }}
                </div>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label(null,trans('general.reg_b_address'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'address_line1','class' =>  'form-control reg-add']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_b_address_2'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'address_line2','class' =>  'form-control reg-add2']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_city'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'address_city','class' =>  'form-control reg-city']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_state'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'address_state','class' =>  'form-control reg-state']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_zip'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::text(null, null, ['data-stripe'=>'address_zip','class' =>  'form-control reg-zip']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(null,trans('general.reg_country'),['class' => 'col-md-4 control-label']) }}
            <div class="col-md-6">
                {{ Form::select(null, Countries::getList(App::getLocale()),null, ['data-stripe'=>'address_country','class' =>  'form-control reg-country']) }}
            </div>
        </div>
        <div class="payment-errors">
            @if($errors->has('card'))
                {{ $errors->first('card') }}
            @endif
        </div>
    </div>
</fieldset>
