@extends('layouts.email-admin')
@section('content')
    A user had paid for an order<br>
    The Order is now ready to ship<br>
    <p><b>Name:</b><br>{{ $order->user->full_name }}</p>
    <p><b>Email:</b><br>{{ $order->user->email }}</p>
    <p><b>Country:</b><br>{{ $order->user->country }}</p>
    <br>
    <p><b>Order #:</b><br>{{ $order->id }}</p>
@endsection
