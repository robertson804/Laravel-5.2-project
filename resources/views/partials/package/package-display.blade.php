<div class="col-xs-12 col-sm-4 col-md-3">
    <div class="thumbnail package package-{{$package->status}}">
        <ul class="nav nav-tabs">
            <li role="presentation" class="col-sm-6 active package-tabs"><a href="#open_{{$package->id}}" role="tab"
                                                                            class="open-box"
                                                                            data-toggle="tab"></a></li>
            <li role="presentation" class="col-sm-6 package-tabs"><a href="#close_{{$package->id}}" role="tab"
                                                                     data-toggle="tab"
                                                                     class="closed-box"></a>
            </li>
        </ul>
        <div class="tab-content">
            <a href="{{ $package->open_image }}" target="_blank" class="tab-pane active fade in" id="open_{{$package->id}}" >
                <img  src="{{ $package->open_card }}">
            </a>
            <a href="{{ $package->close_image }}" target="_blank" class="tab-pane fade" id="close_{{$package->id}}">
                <img   src="{{ $package->close_card }}">
            </a>
        </div>

        <div class="caption">
            <h4>{{ $package->name }}</h4>
            <ul class="list-unstyled">
                <li>{{Lang::get('account.package_id')}} {{ $package->id }}</li>
                <li>{{Lang::get('account.package_weight')}} <span class="force_ltr">{{ $package->weight }}</span></li>
                <li>{{Lang::get('account.package_dimensions')}} <span class="force_ltr">{{ $package->dimensions }}</span></li>
                @if($package->days_left)
                    <li>{{Lang::get('account.package_arrived', ['days' => $package->days_left] )}} </li>
                @else
                    <li class="text-danger">{{ Lang::get('account.package_overdue') }}</li>
                @endif
                @if($package->status == 'resolve')
                    <li>
                        <a href="account/{{$package->id}}/resolve"
                           data-featherlight-namespace="resolve-popup"
                           data-featherlight="ajax"
                           class="btn btn-warning" role="button">{{ Lang::get('account.package_resolve') }}</a>
                    </li>
                @else
                    <li>{{Lang::get('account.package_value')}} <span dir="ltr">{{ $package->price }}</span>
                        @if(in_array($package->order->status, ['pending','consolidated']))
                            <a class="edit" href="{{ url("account/$package->id/resolve") }}"
                               data-featherlight-namespace="resolve-popup"
                               data-featherlight="ajax"
                            ><i class="fa fa-pencil-square-o"></i></a>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
