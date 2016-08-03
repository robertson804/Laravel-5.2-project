@extends('layouts.admin')

@section('content')
    <h2 class="page-header">Package #{{ $package->id }}
        <small> - {{ $package->name }}</small>
    </h2>

    <div class="row">

        <div class="img col-md-3">
            <img src="{{ $package->open_image }}" class="photo thumbnail">
            <img src="{{ $package->close_image }}" class="photo thumbnail">
        </div>
        <div class="row col-md-9">

            <div class="col-md-4">
                <dl>
                    <dt>Package #:</dt>
                    <dd>{{ $package->id }}</dd>
                    <dt>Name:</dt>
                    <dd>{{ $package->name }}</dd>
                    <dt>Status:</dt>
                    <dd>{{ ucfirst($package->status) }}</dd>
                    <dt>Product Price:</dt>
                    <dd>{{ $package->price }}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>Date Received:</dt>
                    <dd>{{ $package->received_at->toFormattedDateString() }}</dd>
                    <dt>Days In Warehouse:</dt>
                    @if($package->received_at->diffInDays() >= 45)
                        <dd class="text-danger">
                    @else
                        <dd>
                    @endif
                            {{$package->received_at->diffInDays()}}
                        </dd>
                        <dt>Dimensions(LWH):</dt>
                        <dd>{{ $package->dimensions }} @if($package->oversized )<span
                                    class="text-danger">(oversized)</span>@endif</dd>
                        <dt>Weight:</dt>
                        <dd>{{ $package->weight }}</dd>
                </dl>
            </div>
            <div class="col-md-4">
                <dl>
                    <dt>User:</dt>
                    <dd><a href="{{ action('UserController@show',$package->user) }}">#{{$package->user->id}}</a>
                        - {{ $package->user->fullName }}</dd>
                    <dt>Order:</dt>
                    <dd>#<a href="{{ action('OrderController@show',$package->order) }}">{{ $package->order->id }}</a>
                    </dd>
                </dl>
            </div>
            @if(in_array($package->status,['pending','resolve']) )
                <div class="col-md-12">
                    <a href="{{ action('PackageController@edit',$package) }}">
                        <button class="btn btn-success">Edit</button>
                    </a>
                    {{ Form::open(['url'=> action('PackageController@destroy',$package),'method'=>'DELETE']) }}
                    {{ Form::submit('Delete',['class'=>'btn btn-warning']) }}
                    {{ Form::close() }}
                </div>
            @endif
        </div>
    </div>
@endsection
