@extends('layouts.app')

@section('content')
    <div class="container">
    @include('partials.account.account-nav')
        <div class="row">
            @if(count($orders) >= 1)
                @foreach($orders as $order)
                    @include('partials.order.order-display')
                @endforeach
            @else
                <div class="col-xs-offset-1 col-xs-10 alert alert-info">
                    {{ trans('account.no_orders') }}
                </div>
            @endif

        </div>
    </div>
@endsection
