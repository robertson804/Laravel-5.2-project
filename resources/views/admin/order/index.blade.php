@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Orders</h1>

    <ul class="nav nav-pills column-filters" role="tablist" data-table="orders">
        <li role="presentation" class="active"><a href="#" data-filter="pending" data-column="Status">Un-Consolidated<span class="badge">{{ count($orders->where('status','pending')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="consolidated" data-column="Status">Consolidated<span class="badge">{{ count($orders->where('status','consolidated')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="ready" data-column="Status">Ready To Ship<span class="badge">{{ count($orders->where('status','ready')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="shipped" data-column="Status">Shipped<span class="badge">{{ count($orders->where('status','shipped')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="arrived" data-column="Status">Arrived at Warehouse<span class="badge">{{ count($orders->where('status','arrived')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="delivered" data-column="Status">Completed<span class="badge">{{ count($orders->where('status','delivered')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="*" data-column="Status">All<span class="badge">{{ count($orders) }}</span></a></li>
    </ul>

    @include('partials.order.order-tables')
@endsection

@section('footer')

@endsection
