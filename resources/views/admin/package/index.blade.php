@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Packages</h1>

    <ul class="nav nav-pills column-filters" role="tablist" data-table="packages">
        <li role="presentation" class="active"><a href="#" data-filter="resolve" data-column="Status">Needs Price Data<span class="badge">{{ count($packages->where('status','resolve')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="pending" data-column="Status">Waiting For Payment<span class="badge">{{ count($packages->where('status','pending')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="ready" data-column="Status">Ready To Ship<span class="badge">{{ count($packages->where('status','ready')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="shipped" data-column="Status">Shipped<span class="badge">{{ count($packages->where('status','shipped')) }}</span></a></li>
        <li role="presentation" class="active"><a href="#" data-filter="delivered" data-column="Status">Delivered<span class="badge">{{ count($packages->where('status', 'delivered')) }}</span></a></li>
        <li role="presentation" class="active">
            <a href="#" data-filter="*" data-column="Status">All<span class="badge">{{ count($packages) }}</span></a>
        </li>
        <li role="presentation" class="active">
            <a href="#" data-min="45" class="min" data-column="Days" data-filter="> 45">Over 45 Days In Warehouse
                <span class="badge">{{ count(DB::table('packages')->whereRaw('received_at < DATE_SUB(NOW(), INTERVAL 45 DAY)')) }}</span>
            </a>
        </li>
    </ul>

    @include('partials.package.package-tables')
@endsection
@section('footer')
@endsection