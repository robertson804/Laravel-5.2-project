@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->has('price'))
            <span class="col-xs-offset-1 col-xs-10 alert alert-danger">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif

        @include('partials.account.account-nav')

        <div class="panel panel-default packages">
            <div class="panel-heading">
                {{Lang::get('account.unshipped_packages')}}
            </div>
            <div class="panel-body">
                @if($current_order)
                    {{ Form::open(['action'=>['OrderController@pay',$current_order], 'id' => 'order-form' ]) }}
                    <div class="row">
                        @foreach($current_order->packages as $package)
                            @include('partials.package.package-display')
                        @endforeach
                    </div>
                    <div class="row" style="text-align: ">
                      <h5 style="background-color:lightgrey;margin-left:15px;margin-right:15px;">{{Lang::get('account.package_weight')}} <span class="force_ltr"> {{$current_order->weight}} LB</span> <br> {{Lang::get('account.package_dimensions')}} <span class="force_ltr"> {{$current_order->length}}" X {{$current_order->width}}" X {{$current_order->height}}"</span></h3>
                    </div>
                    <div class="row">

                        @if(!$needs_resolve->isEmpty())
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="alert alert-warning">
                                        {{ Lang::get('account.needs_resolve') }}
                                    </div>
                                </div>
                            </div>
                        @elseif($current_order->status == 'consolidated')
                            <div class="form-group col-md-12">
                                <div id="order-payment">
                                    <div class="checkboxes">
                                      @if($user->country == 'kw')
                                        {{ Form::radio('shipping_method','fast', null,['class'=>'form-control shipping_method','data-cost'=>$current_order->getOriginal('fast_price') + 700]) }}
                                        <label for="shipping_method">{{ Lang::get('account.fast_shipping')}}:
                                            <span dir="ltr">{{ $current_order->fast_price }}</span> {!! trans('account.shipping_clearance_notice') !!}</label>
                                      @else
                                        {{ Form::radio('shipping_method','fast', null,['class'=>'form-control shipping_method','data-cost'=>$current_order->getOriginal('fast_price')]) }}
                                        <label for="shipping_method">{{ Lang::get('account.fast_shipping')}}:
                                            <span dir="ltr">{{ $current_order->fast_price }}</span></label>
                                      @endif
                                    </div>
                                    <div class="checkboxes">
                                      @if($user->country == 'kw')
                                        {{ Form::radio('shipping_method','slow', 1,['class'=>'form-control shipping_method', 'data-cost'=>$current_order->getOriginal('slow_price') + 700]) }}
                                        <label for="shipping_method">{{ Lang::get('account.slow_shipping')}}:
                                            <span dir="ltr">{{ $current_order->slow_price }}</span> {!! trans('account.shipping_clearance_notice') !!}</label>
                                      @else
                                        {{ Form::radio('shipping_method','slow', 1,['class'=>'form-control shipping_method', 'data-cost'=>$current_order->getOriginal('slow_price')]) }}
                                        <label for="shipping_method">{{ Lang::get('account.slow_shipping')}}:
                                            <span dir="ltr">{{ $current_order->slow_price }}</span></label>
                                      @endif

                                    </div>
                                    @if($user->country == 'kw')
                                    <div>{{ trans('account.shipping_notice') }}</div>
                                    @endif
                                    @if($current_order->box_option)
                                        <div class="checkboxes">
                                          @if($user->country == 'kw')
                                            {{ Form::radio('shipping_method','box', null,['class'=>'form-control shipping_method', 'data-cost'=> $hdbox->getOriginal('price') + 700]) }}
                                            <label for="shipping_method">{{ Lang::get('account.box_shipping')}}: <span dir="ltr"> {{$hdbox->price}}</span> {!! trans('account.shipping_clearance_notice') !!}</label>
                                          @else
                                            {{ Form::radio('shipping_method','box', null,['class'=>'form-control shipping_method', 'data-cost'=> $hdbox->getOriginal('price')]) }}
                                            <label for="shipping_method">{{ Lang::get('account.box_shipping')}}: <span dir="ltr"> {{$hdbox->price}}</span></label>
                                          @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group col-md-12">
                                        {{ Form::submit(Lang::get('account.ship_packages'), ['class' => 'btn btn-primary', 'id'=>'customButton']) }}
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        @else
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="alert alert-info">
                                        {{ Lang::get('account.needs_consolidation') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    {{ Lang::get('account.no_packages') }}
                @endif
            </div>
        </div>
    </div>
    <input type="hidden" id="confirm_title" value="{{ trans('account.confirm_title') }}">
    <input type="hidden" id="confirm_text" value="{{ trans('account.confirm_text') }}">
    <input type="hidden" id="confirm_button" value="{{ trans('account.confirm_button') }}">
    <input type="hidden" id="confirm_cancel" value="{{ trans('account.confirm_cancel') }}">
<!-- Google Code for Regiter Page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 880271812;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "w6E8CK-EnGcQxMPfowM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""
src="//www.googleadservices.com/pagead/conversion/880271812/?label=w6E8CK-EnGcQxMPfowM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


@endsection

@section('footer')
    <script src="https://checkout.stripe.com/checkout.js"></script>


    <script>
        order_form = $('#order-form');
        var handler = StripeCheckout.configure({
            key: $('meta[name="publishable-key"]').attr('content'),
            image: '{{ url('/images/square-logo.png') }}',
            locale: 'auto',
            token: function(token) {
                // Use the token to create the charge with a server-side script.
                // You can access the token ID with `token.id`
                $('<input>', {
                            type: 'hidden',
                            name: 'stripe-token',
                            value: token.id
                        }
                ).appendTo(order_form);

                order_form[0].submit();

            }
        });

        order_form.on('submit', function(e) {
            // Open Checkout with further options
            handler.open({
                name: '{{trans('general.site_name')}}',
                description: 'Pay to ship your order',
                currency: "usd",
                amount: $(this).find('.shipping_method:checked').attr('data-cost'),
                billingAddress: true,
                email: '{{ $user->email }}'
            });
            e.preventDefault();
        });

        // Close Checkout on page navigation
        $(window).on('popstate', function() {
            handler.close();
        });
    </script>
@endsection
