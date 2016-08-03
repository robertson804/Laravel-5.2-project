@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="jumbotron">
            <div class="error_message">
                @yield('error')
            </div>
            <div class="return_links">
                @yield('return_links')
            </div>
            <div class="error_contact">
                If you have any questions please visit our <a href="{{url('/contact')}}">Contact Form</a> or talk directly at <a href="tel:302.444.8144">302.444.8133</a>
            </div>
        </div>
    </div>

@endsection
