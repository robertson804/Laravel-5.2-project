@extends('layouts.admin')

@section('content')
    <h1 class="page-header">QuickLinks</h1>

    <div class="row">
        <a class="col-md-3" href="{{ action('PackageController@index') }}">
            <button class="btn btn-lg btn-hero btn-primary">View Packages</button>
        </a>
        <a class="col-md-3" href="{{ action('OrderController@index') }}">
            <button class="btn  btn-lg btn-hero btn-primary">View Orders</button>
        </a>
        <a class="col-md-3" href="{{ action('ShipmentController@index') }}">
            <button class="btn btn-lg btn-hero btn-primary">View Shipments</button>
        </a>
        <a class="col-md-3" href="{{ action('UserController@index') }}">
            <button class="btn btn-lg btn-hero btn-primary">View Users</button>
        </a>
    </div>


@endsection
