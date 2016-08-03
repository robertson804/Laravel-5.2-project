<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Postshipper Admin</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/pikaday.css" rel="stylesheet">
</head>
<body>
@include('layouts.admin_nav')
<div id="wrap">

    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                @include('layouts.admin_sidebar')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if (Session::has('flash_message'))
                    <div class="alert alert-success flash_message">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>

