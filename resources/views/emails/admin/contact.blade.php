@extends('layouts.email-admin')
@section('content')
    New message from PostShipper Contact Us page<br>
    <p><b>Name:</b><br>{{ $request->name }}</p>
    <p><b>Email:</b><br>{{ $request->email }}</p>
    <p><b>Subject:</b><br>{{ $request->subject }}</p>
    <p><b>Message:</b><br>{{ $request->message }}</p>
@endsection
