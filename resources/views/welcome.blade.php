@extends('layouts.app')

@section('content')


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


        <!-- Indicators -->
        <ol class="carousel-indicators">
            @if($sliders->count() > 1)
                @foreach($sliders as $key => $slider )
                    <li data-target="#carousel-example-generic" data-slide-to="{{$key}}"
                        class="{{ $key === 0? 'active': ''}}"></li>
                @endforeach
            @endif
        </ol>

        @include('partials.calculator')

        @if($sliders->count())
            <div class="carousel-inner" role="listbox">

                @foreach($sliders as $key => $slider )
                    <div class="item {{ $key === 0? 'active': '' }}"
                         style="background-image:url('{{ $slider->slider }}')">

                        @if($key === 0)
                            <div class="carousel-caption">
                                <h2>{{trans('front.save_money')}}</h2>
                                <h3>{{ trans('front.with_us') }}</h3>
                                <a class="orange-but" href="{{ url('/register') }}">{{ trans('front.sign_up') }}</a>
                            </div>
                        @endif
                    </div>
                @endforeach

                @if($sliders->count() > 1)
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">{{ trans('general.previous') }}</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">{{ trans('general.next') }}</span>
                    </a>
                @endif
            </div>
        @endif
    </div>

    <section class="howitworks">
        <div class="howitworks-arrows"></div>

        <h2>{!! trans('front.how-it-works') !!}</h2>

        <div class="container">
            <div class="row">

                <div class="col-xs-6  col-sm-3 ctas">
                    <a class="cta-icon" href="{{ url('/register') }}">
                        <img src="/images/icons/register.svg"/>
                    </a>
                    <h3><a href="#">{{ trans('front.register') }}</a></h3>
                    <p>{{ trans('front.register_plus') }}</p>
                </div>

                <div class="col-xs-6 col-sm-3 ctas">
                    <a class="cta-icon" href="{{ url('/how-it-works') }}">
                        <img src="/images/icons/shop.svg"/>
                    </a>
                    <h3><a href="#">{{ trans('front.shop') }}</a></h3>
                    <p>{{ trans('front.shop_plus') }}</p>
                </div>

                <div class="col-xs-6 col-sm-3 ctas">
                    <a class="cta-icon ship" href="{{ url('/how-it-works') }}">
                        <img src="/images/icons/ship.svg"/>
                    </a>
                    <h3><a href="#">{{ trans('front.ship') }}</a></h3>
                    <p>{{ trans('front.ship_plus') }}</p>
                </div>

                <div class="col-xs-6 col-sm-3 ctas">
                    <a class="cta-icon" href="{{ url('/how-it-works') }}">
                        <img src="/images/icons/deliver.svg"/>
                    </a>
                    <h3><a href="#">{{ trans('front.deliver') }}</a></h3>
                    <p>{{ trans('front.deliver_plus') }}</p>
                </div>

                <div class="col-sm-12 text-center">
                    <a class="orange-but big" href="{{ url('/register') }}">{{ trans('front.get_started') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="services-arrows"></div>
        <h2 class="blue">{{ trans('front.services') }}</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#address">
                            <img src="/images/icons/address.svg"/>
                        </a>
                        <h3><a href="#">{{ trans('front.us_address') }}</a></h3>
                        <p>{{ trans('front.us_address_plus') }}</p>
                    </div>

                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#images">
                            <img src="/images/icons/images.svg"/>
                        </a>
                        <h3><a href="/services#images">{{ trans('front.free_images') }}</a></h3>
                        <p>{{ trans('front.free_images_plus') }}</p></div>

                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#notifications">
                            <img src="/images/icons/notifications.svg"/>
                        </a>
                        <h3><a href="/services#notifications">{{ trans('front.mobile_notifications') }}</a></h3>
                        <p>{{ trans('front.mobile_notifications_plus') }}</p>
                    </div>

                    <div class="col-sm-12 visible-sm">
                        &nbsp;
                    </div>

                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#repacking">
                            <img src="/images/icons/repacking.svg"/>
                        </a>
                        <h3><a href="/services#repacking">{{ trans('front.repacking') }}</a></h3>
                        <p>{{ trans('front.repacking_plus') }}</p>
                    </div>

                    <div class="col-xs-12 visible-xs">
                        &nbsp;
                    </div>

                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#storage">
                            <img src="/images/icons/storage.svg"/>
                        </a>
                        <h3><a href="/services#storage">{{ trans('front.storage') }}</a></h3>
                        <p>{{ trans('front.storage_plus') }}</p>
                    </div>

                    <div class="col-xs-6 col-sm-4 ctas">
                        <a class="cta-icon" href="/services#consolidation">
                            <img src="/images/icons/consolidation.svg"/>
                        </a>
                        <h3><a href="/services#consolidation">{{ trans('front.consolidation') }}</a></h3>
                        <p>{{ trans('front.consolidation_plus') }}</p>
                    </div>

                    <div class="col-xs-12 services-drive text-center">
                        <p>{{ trans('front.premium_service') }}<br/>
                            {{ trans('front.own_address') }}</p>
                        <h3>{{ trans('front.no_contract') }}<br/>
                            <span>{{ trans('front.cancel') }}</span></h3>
                        <a class="orange-but big" href="{{ url('/register') }}">{{ trans('front.get_started') }}</a>
                    </div>

                    <table class="table table-striped">
                        <tr class="blue-back">
                            <th class="white">{{ trans('general.services_table_setup') }}</th>
                            <td class="white">{{ trans('general.services_table_free') }}</td>
                        </tr>
                        <tr class="orange-back">
                            <th class="white">{{ trans('general.services_table_monthly') }}</th>
                            <td class="white">{{ trans('general.services_table_free_1000') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_images') }}</th>
                            <td>{{ trans('general.services_table_yes') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_packages') }}</th>
                            <td>{{ trans('general.services_table_yes') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_storage') }}</th>
                            <td>{{ trans('general.services_table_days') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_consolidation') }}</th>
                            <td>{{ trans('general.services_table_yes') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_repackaging') }}</th>
                            <td>{{ trans('general.services_table_yes') }}</td>
                        </tr>
                        <tr class="">
                            <th>{{ trans('general.services_table_junk') }}</th>
                            <td>{{ trans('general.services_table_yes') }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <section class="brands">
        <div class="brands-arrows"></div>
        <h2>{{ trans('front.shop_brands') }}</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-logos">
                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/target.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/ebay.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/walmart.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/ck.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/macys.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/american-eagle.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/nordstrom.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/disney.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/amazon.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/nike.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/costco.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/sephora.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/apple.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/kohls.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/ralph-lauren.svg"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <div class="logo">
                                <img src="/images/brands/adidas.svg"/>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Code for Remarketing Tag -->
    <!--
    Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
    --------------------------------------------------->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 880271812;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/880271812/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>




@endsection

@section('footer')
    <script type="text/javascript" src="/js/calculator.js"></script>

@endsection
