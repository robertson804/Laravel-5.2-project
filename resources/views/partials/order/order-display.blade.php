<div class="col-sm-12 order-details">
    <div class="panel panel-default">
        <div class="panel-heading ">
            <div class="row order-display-heading">
                <div class="col-sm-3 col-xs-6">
                    <h5>{{ Lang::get('account.order_id') }}</h5>
                    <span>{{ $order->id }}</span>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <h5>{{ Lang::get('account.shipped_at') }}</h5>
                    <span>{{ $order->ordered_at->toFormattedDateString() }}</span>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <h5>{{ Lang::get('account.order_cost') }}</h5>
                    <span>{{ $order->cost }}</span>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <h5>{{ Lang::get('account.package_count') }}</h5>
                    <span>{{ count($order->packages) }}</span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1 order-display-image">
                    <div>
                        <a href="{{ $order->photo }}" data-featherlight="image">
                            <img src="{{ $order->card }}" class="thumbnail col-xs-offset-1 col-xs-10 col-sm-3">
                        </a>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-10 col-xs-offset-1 col-sm-offset-0">
                    <div class="row">
                        @foreach($order->packages as $package)
                            <div class="col-xs-4">
                                <a href="{{ $package->open_image }}" data-featherlight="image">
                                    <img class="micro thumbnail" src="{{ $package->open_card }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0">
                    <ul class="list-unstyled">
                        <li>{{ trans('account.order_status') }}: <span> {{ $order->status_format }}</span></li>
                        <li>{{ trans('account.order_weight') }}: <span> {{ ShippingCalculations::gramsToPounds($order->packages->sum('weight_og')) }}
                                lbs </span>
                        </li>
                        <li>{{ trans('account.customs_value') }}:
                            <span dir="ltr">{{ Laravel\Cashier\Cashier::formatAmount($order->packages->sum('price_og')) }}</span>
                        </li>
                        <li>{{ trans('account.shipping_method') }}: <span>{{ $order->shipping_method }}</span></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <a class="order-buttons" href="{{ action('OrderController@showAccount',$order) }}">
                        <button class="btn btn-success">{{ Lang::get('account.view_order') }}</button>
                    </a>
                    <a class="order-buttons" href="{{ action('OrderController@track',$order) }}">
                        <button class="btn btn-success">{{ Lang::get('account.track_order') }}</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="progress">
                        @if($order->status == 'pending')
                            <div class="progress-bar" role="progressbar" aria-valuenow="30"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                {{Lang::get('account.statusbar_pending')}}
                            </div>
                        @elseif($order->status == 'consolidated')
                            <div class="progress-bar" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                {{Lang::get('account.statusbar_consolidated')}}
                            </div>
                        @elseif($order->status == 'ready')
                            <div class="progress-bar" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                {{Lang::get('account.statusbar_ready')}}
                            </div>
                        @elseif($order->status == 'shipped')
                            <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                {{Lang::get('account.statusbar_shipped')}}
                            </div>
                        @elseif($order->status == 'arrived')
                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                {{Lang::get('account.statusbar_arrived')}}
                            </div>
                        @else
                            <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                {{Lang::get('account.statusbar_delivered')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
