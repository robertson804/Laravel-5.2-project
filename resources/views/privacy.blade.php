@extends('layouts.app')

@section('content')

    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('front.page_header') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="about-us">
        <div class="container">

            <div class="row">


                <article class="col-md-8">

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
                        601 Carson DR
                        Bear, DE 19701
                        302 444 8144
                    </address>

                </article>
                <div class="faq col-md-4">
                    <div>

                        <div>

                            <div class="panel panel-default">
                                <div class="panel-heading"><h5>{{ trans('front.contact') }}</h5>
                                </div>

                                <div class="panel-body">
                                    <p>{{ trans('general.phone') }} +1 302&nbsp;229&nbsp;9294</p>
                                    <p>{{ trans('general.email') }} Info@postshipper.com</p>
                                </div>
                            </div>

                        </div>

                        <div class="accordion" id="accordion2">


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseOne">
                                        {{ trans('front.faq_how') }}
                                    </a>
                                </div>

                                <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_how_plus') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseTwo">
                                        {{ trans('front.faq_what') }}
                                    </a>
                                </div>

                                <div id="collapseTwo" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <p><b>{{ trans('front.example_address') }}</b><br/>
                                            ({{ trans('front.your_name') }})<br/>
                                            Carson DR, #XXX<br/>
                                            Bear, DE 19701<br/>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseFour">
                                        {{ trans('front.faq_can') }}
                                    </a>
                                </div>

                                <div id="collapseFour" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <p>{{ trans('front.faq_can_plus') }}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseFive">
                                        {{ trans('front.faq_long') }}
                                    </a>
                                </div>

                                <div id="collapseFive" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_long_plus') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseSix">
                                        {{ trans('front.faq_cold') }}
                                    </a>
                                </div>

                                <div id="collapseSix" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_cold_plus') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseSeven">
                                        {{ trans('front.faq_what') }}
                                    </a>
                                </div>

                                <div id="collapseSeven" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_what_plus') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseEight">
                                        {{ trans('front.faq_damaged') }}
                                    </a>
                                </div>

                                <div id="collapseEight" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_damaged_plus') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseNine">
                                        {{ trans('front.faq_arrived_damaged') }}
                                    </a>
                                </div>

                                <div id="collapseNine" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_arrived_damaged_plus') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseTen">
                                        {{ trans('front.faq_tax') }}
                                    </a>
                                </div>

                                <div id="collapseTen" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        {!! trans('front.faq_tax_plus') !!}
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection