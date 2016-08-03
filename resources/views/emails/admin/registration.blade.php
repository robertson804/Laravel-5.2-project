@extends('layouts.email-admin')
@section('content')
    A new user has registered<br>
    <p><b>Name:</b><br>{{ $user->full_name }}</p>
    <p><b>Email:</b><br>{{ $user->email }}</p>
    <p><b>Country:</b><br>{{ $user->country }}</p>
@endsection
