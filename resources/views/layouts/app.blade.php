<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" @if( App::getLocale() === 'ar' )dir="rtl"@endif>
<head>
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}">
    <title>Post Shipper</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900' rel='stylesheet'
          type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css" type="text/css"
          rel="stylesheet"/>
        <link href="/css/account.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/sweetalert.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>

@include('layouts.nav')
<div id="wrap">
<div class="container-fluid main">
    @if (Session::has('flash_message'))
        <div class="alert alert-success flash_message">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    @yield('content')
</div>
</div>

@include('layouts.footer')
