{{ Form::open(['url'=>'/calculate','id'=>'calculator-form']) }}
<div class="shipping-calculators">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 shipping-title">
                <div class="hidden-xs">
                    <p>{{ trans('front.calc_shipping_rate') }}</p>
                    <p>{{ trans('front.calc_calculator') }}</p>
                </div>
                <div class="visible-xs">
                    <p>{{ trans('front.calc_shipping_rate') }} <span
                                class="white">{{ trans('front.calc_calculator') }}</span></p>
                </div>
            </div>

            <div class="col-xs-5 col-sm-3 shipping-to">
                <div class="form-group">
                    <label for="sel1">{{ trans('front.calc_shipping_to') }}</label>

                    {{ Form::select('sel1',CountrySome::getSome(Config::get('country.countries')), null,  [ 'class'=>'form-control calculator-input', 'id'=>'sel1']) }}
                </div>
            </div>

            <div class="col-xs-5 col-sm-3 weight">
                <div class="form-group">
                    <label for="weight">{{ trans('front.calc_weight') }}</label>
                    <div class="input-group">
                        {{ Form::text('weight', null, ['class'=>'form-control calculator-input', 'id'=>'weight', 'placeholder'=>trans('general.enter_weight')]) }}
                        <div class="input-group-addon">
                            {{ trans('general.lb') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 calculate">
                {{ Form::submit(trans('general.calculate'),['class'=>'btn blue-but calculate-shipping']) }}
            </div>
        </div>

        <div class="calculated-amount">
            <p>{{ trans('front.calc_economy')}} {!! trans('front.calc_economy_duration') !!}: {{ trans('front.calc_apx')}} <span class="slow_amount force_ltr"></span></p>
            <p>{{ trans('front.calc_fast')}} {!! trans('front.calc_fast_duration') !!} : {{ trans('front.calc_apx')}} <span class="fast_amount force_ltr"></span></p>
            <p><a href="services#repacking"> {{ trans('front.calc_bigbox')}}</a>: <span class="bigbox_amount force_ltr"></span></p>
            <p class="small">{{ trans('front.calc_blurb') }}</p>
            <p class="small">{{ trans('front.calc_blurb2') }}</p>
            <div class="close-shipping"><i class="fa fa-times"></i></div>
        </div>
    </div>
</div>
{{ Form::close() }}
