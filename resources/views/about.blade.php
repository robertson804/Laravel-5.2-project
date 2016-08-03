@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 @if( App::getLocale() === 'ar' )style="text-align:right;"@endif>{{ trans('front.page_header') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="about-us">
        <div class="container">

            <div class="row">


                <article class="col-md-10 col-md-offset-1">

                    <h2>{{ trans('front.page_title') }}</h2>
                    <p>{{ trans('front.about_1') }}</p>
                    <p>{{ trans('front.about_2') }}</p>
                    <p>{{ trans('front.about_3') }}</p>
                    <p>{{ trans('front.about_4') }}</p>
                    <p>{{ trans('front.about_5') }}</p>
                    <p>{{ trans('front.about_6') }}</p>
                    <p>{{ trans('front.about_7') }}</p>
                    <p>{{ trans('front.about_8') }}</p>
                    <p>{{ trans('front.about_9') }}</p>
                    <p>{{ trans('front.about_10') }}</p>
                    <p>{{ trans('front.about_11') }}</p>
                    <p>{{ trans('front.about_12') }}</p>
                    <p>{{ trans('front.about_13') }}</p>

                    <address>
                      601 Carson DR, Bear DE 19701<br>
                      +1-888-552-3520
                    </address>
                </article>
            </div>
        </div>
    </div>
    @endsection
