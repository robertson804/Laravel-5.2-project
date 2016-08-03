@extends('layouts.admin')

@section('content')
    <h1 class="page-header">#{{ $user->id }} - {{ $user->fullName }}
    </h1>
    @include('partials.user.info')
    <a href="/admin/user/{{ $user->id }}/edit"><button class="btn btn-success">Edit User</button></a>
    <a href="/admin/user/{{ $user->id }}/edit/password"><button class="btn btn-success">Change Password</button></a>

    <div class="row">
        <div class="panel panel-default">
            <div class=panel-heading>Packages:</div>
            @include('partials.package.package-tables')
        </div>

        <div class="panel panel-default">
            <div class=panel-heading>Unprocessed Orders:</div>
            @include('partials.order.order-tables')
        </div>
    </div>
@endsection