@extends('layouts.email-admin')
@section('content')
    A user has changed/added the price of a package<br>
    Please verify the packages value<br>
    <p><b>Name:</b><br>{{ $package->user->full_name }}</p>
    <p><b>Email:</b><br>{{ $package->user->email }}</p>
    <br>
    <p><b>Package #:</b><br>{{ $package->id }}</p>
    <p><b>Old Value:</b><br>{{ $old_price }}</p>
    <p><b>New Value:</b><br>{{ $package->price }}</p>
@endsection
