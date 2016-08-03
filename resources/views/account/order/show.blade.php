@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.account.account-nav')
        <div class="row">
            @include('partials.order.order-display')
        </div>
        <div class="row">
        	<div class="col-sm-12">
            
            <div class="panel panel-default"> 
            	<div class="panel-heading ">
                	{{ Lang::get('account.order_packages') }}
       			</div>
                <div class="panel-body">
                	<div class="packages">
                      @foreach($order->packages as $package)
                            @include('partials.package.package-display')
                        @endforeach
            		 </div>
             </div>
        	</div>
        </div>
    </div>
@endsection