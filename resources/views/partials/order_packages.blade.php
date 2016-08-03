@foreach($order->packages as $package)
    <div class="row package-view">

        <div class="img col-md-3">
            <img src="{{ $package->open_image }}" class="thumb thumbnail pull-left">
            <img src="{{ $package->close_image }}" class="thumb thumbnail">
        </div>
        <div class="row col-md-9">

            <div class="col-md-4">
                <dl >
                    <dt>Package #:</dt>
                    <dd>{{ $package->id }}</dd>
                    <dt>Name:</dt>
                    <dd>{{ $package->name }}</dd>
                    <dt>Status:</dt>
                    <dd>{{ ucfirst($package->status) }}</dd>
                    <dt>Product Price:</dt>
                    <dd dir="ltr">{{ $package->price }}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl >
                    <dt>Date Received:</dt>
                    <dd>{{ $package->received_at->toFormattedDateString() }}</dd>
                    <dt>Days In Warehouse:</dt>
                    <dd>{{$package->received_at->diffInDays()}}</dd>
                    <dt>Dimensions(LWH):</dt>
                    <dd>{{ $package->dimensions }} @if($package->oversized) <span class="text-danger">(oversized)</span>@endif</dd>
                    <dt>Weight:</dt>
                    <dd>{{ $package->weight }}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl >
                    <dt>User:</dt>
                    <dd><a href="{{ action('UserController@show',$package->user) }}">#{{$package->user->id}}</a>
                        - {{ $package->user->fullName }}</dd>
                    <dt>Order:</dt>
                    <dd>#<a href="{{ action('OrderController@show',$package->order) }}">{{ $package->order->id }}</a>
                    </dd>
                </dl>
                <a href="{{ action('PackageController@edit',$package) }}"><button class="btn btn-success">Edit</button></a>
                @if(in_array($package->order->status, ['pending','consolidated']) )
                <a href="{{ action('PackageController@destroy',$package) }}"><button class="btn btn-warning">Delete</button></a>
                    @endif
            </div>
        </div>
    </div>
@endforeach
