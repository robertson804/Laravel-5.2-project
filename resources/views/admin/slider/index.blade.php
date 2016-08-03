@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Slides</h1>

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
        @foreach ($sliders as $slide)
            <tr>
                <td>{{  $slide->id }}</td>
                <td>{{ $slide->name }}</td>
                <td>{{ $slide->link }}</td>
                <td>
                    <a href="{{ action('SliderController@edit', $slide) }}" class="pull-left">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    {{ Form::open(['url' => action('SliderController@destroy',$slide),'method'=>'DELETE']) }}
                    {{ Form::submit('Delete',['class'=>'btn btn-warning']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ action('SliderController@create') }}">
        <button class="btn btn-primary">Add New Slide</button>
    </a>
@endsection

