@extends('layouts.errors')
@section('error')
    <h1>Credit Card Error</h1>
    <p>We cannot process your credit card at this time.</p>
@endsection

@section('return_links')
    <p>Please re-enter your credit card info <a href="{{ url('/account') }}">here</a>.</p>
@endsection
