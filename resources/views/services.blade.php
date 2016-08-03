@extends('layouts.app')
@section('content')


    <span class="anchor" id="address"></span>
    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 @if( App::getLocale() === 'ar' )style="text-align:right;"@endif>{{ trans('front.services') }}</h2>
                </div>
            </div>
        </div>
    </section>


    <section class="services page">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="col-sm-3 col-sm-offset-1 ctas">
                            <div class="cta-icon">
                                <img src="/images/icons/address.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-7 col-sm-offset-1">

                            <h3 class="offset">{{ trans('front.us_address') }}</h3>
                            <p>{{ trans('front.us_address_plus') }}</p>
                            <p>{{ trans('front.us_address_2') }}</p>
                            <p>{{ trans('front.us_address_3') }}</p>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h5>{{ trans('front.us_address_example') }}</h5>
                                </div>

                                <div class="panel-body">
                                    <p class="blue">{{ trans('front.your_name') }}</p>
                                    <address>
                                      Address Line: 601 Carson DR #XXX<br>
                                      City: Bear<br>
                                      State: DE<br>
                                      ZipCode: 19701<br>
                                      Telephone: +1-302-444-8144<br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <span class="anchor" id="images"></span>
        <section >
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">

                        <div class="col-sm-3 ctas hidden-sm hidden-md hidden-lg">
                            <div class="cta-icon">
                                <img src="/images/icons/images.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <h3 class="offset">{{ trans('front.free_images') }}</h3>
                            <p>{{ trans('front.free_images_plus') }}</p>
                            <p>{{ trans('front.free_images_2') }}</p>
                            <p>{{ trans('front.free_images_3') }}</p>
                        </div>


                        <div class="col-sm-3 ctas">
                            <div class="cta-icon hidden-xs">
                                <img src="/images/icons/images.svg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <span class="anchor" id="notifications"></span>
        <section >
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="col-sm-3 col-sm-offset-1 ctas">
                            <div class="cta-icon">
                                <img src="/images/icons/notifications.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-7 col-sm-offset-1">
                            <h3 class="offset">{{ trans('front.mobile_notifications') }}</h3>
                            <p>{{ trans('front.mobile_notifications_1') }}</p>
                            <p>{{ trans('front.mobile_notifications_2') }}</p>
                            <p>{{ trans('front.mobile_notifications_3') }}</p>
                            <ul>
                                <li>{{ trans('front.mobile_notifications_list.0') }}</li>
                                <li>{{ trans('front.mobile_notifications_list.1') }}</li>
                                <li>{{ trans('front.mobile_notifications_list.2') }}</li>
                                <li>{{ trans('front.mobile_notifications_list.3') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <span class="anchor" id="repacking"></span>
        <section >
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="col-sm-3 ctas hidden-sm hidden-md hidden-lg">
                            <div class="cta-icon">
                                <img src="/images/icons/repacking.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <h3 class="offset">{{ trans('front.repacking') }}</h3>
                            <p>{{ trans('front.repacking_plus') }}</p>
                            <p>{{ trans('front.repacking_2') }}</p>
                            <p>{{ trans('front.repacking_3') }}</p>
                            <p>{{ trans('front.repacking_4') }}</p>
                        </div>


                        <div class="col-sm-3 ctas hidden-xs">
                            <div class="cta-icon">
                                <img src="/images/icons/repacking.svg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <span class="anchor" id="storage"></span>
        <section >
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="col-sm-3 col-sm-offset-1 ctas">
                            <div class="cta-icon">
                                <img src="/images/icons/storage.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-7 col-sm-offset-1">
                            <h3 class="offset">{{ trans('front.storage') }}</h3>
                            <p>{{ trans('front.storage_plus') }}</p>
                            <p>{{ trans('front.storage_2') }}</p>
                            <p>{{ trans('front.storage_3') }}</p>
                            <p>{{ trans('front.storage_4') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <span class="anchor" id="consolidation"></span>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8-col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="col-sm-3 ctas hidden-sm hidden-md hidden-lg">
                            <div class="cta-icon">
                                <img src="/images/icons/consolidation.svg"/>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <h3 class="offset">{{ trans('front.consolidation') }}</h3>
                            <p>{{ trans('front.consolidation_plus') }}</p>
                            <p>{{ trans('front.consolidation_2') }}</p>
                            <p>{{ trans('front.consolidation_3') }}</p>
                            <p>{{ trans('front.consolidation_4') }}</p>
                        </div>


                        <div class="col-sm-3 ctas hidden-xs">
                            <div class="cta-icon">
                                <img src="/images/icons/consolidation.svg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </section>

@endsection
