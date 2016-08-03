@extends('layouts.app')
@section('content')
<section class="headers">
	<div class="container">
        <div class="row">
        	<div class="col-md-12">
            	<h2 @if( App::getLocale() === 'ar' )style="text-align:right;"@endif>{{ trans('front.how_title') }}</h2>
            </div>
        </div>
    </div>

</section>

<section class="howitworks page">

<section class="step one">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 col-md-10 col-md-offset-1 step-1">
                <div class="col-sm-6">
                    <p class="step">1</p>
                    <p>{{ trans('front.how_1') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="step two">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 col-md-10 col-md-offset-1 step-2">
                <div class="col-sm-6 col-sm-offset-6">
                    <p class="step">2</p>
                    <p>{{ trans('front.how_2') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="step three">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 col-md-10  col-md-offset-1 step-3">
                <div class="col-sm-6">
                    <p class="step">3</p>
                    <p>{{ trans('front.how_3') }}</p>
                </div>
             </div>
        </div>
    </div>


<section class="step four">
	<div class="container">
    	<div class="row">
            <div class="col-sm-12 col-md-10  col-md-offset-1 step-4">
<div class="col-sm-6 col-sm-offset-6">
                    <p class="step">4</p>
                    <p>{{ trans('front.how_4') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="step five">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 col-md-10  col-md-offset-1 step-5">
                <div class="col-sm-6">
            	<p class="step">5</p>
            	<p>{{ trans('front.how_5') }}</p>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection
