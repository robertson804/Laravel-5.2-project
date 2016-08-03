@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Shipping Providers</h1>

    <table id="packages" class="table table-striped table-condensed table-responsive table-hover datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Link</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($providers as $provider)
            <tr>
                <td>{{  $provider->id }}</td>
                <td>{{ $provider->name }}</td>
                <td>{{ $provider->link }}</td>
                    <td>
                        <a href="{{ action('ShippingProviderController@edit', $provider) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ action('ShippingProviderController@create') }}"><button class="btn btn-primary">Add Provider</button></a>

@endsection
