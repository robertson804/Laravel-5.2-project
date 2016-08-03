@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Users</h1>

    <div class="table-responsive">
        <table class="table table-striped datatable">
            <thead>
            <tr>
                <th>Mailbox</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Countries::getOne($user->country) }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ url("admin/user/$user->id") }}"><button class="btn btn-success">View</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
