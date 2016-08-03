@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Faqs</h1>

    <table id="packages" class="table table-striped table-condensed table-responsive table-hover ">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Language</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($faqs as $faq)
            <tr>
                <td>{{  $faq->id }}</td>
                <td>{{ $faq->name }}</td>
                <td>
                    @if($faq->content_ar && $faq->content_en)
                        Both
                    @elseif($faq->content_ar)
                        Arabic
                    @elseif($faq->content_en)
                        English
                    @else
                        None
                    @endif
                </td>
                <td>{{ $faq->order }}</td>
                <td>
                    <a href="{{ action('FaqController@edit', $faq) }}" class="pull-left">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    {{ Form::open(['url' => action('FaqController@moveUp',$faq),'method'=>'POST']) }}
                    {{ Form::submit('Move Up',['class'=>'btn btn-warning pull-left']) }}
                    {{ Form::close() }}
                    {{ Form::open(['url' => action('FaqController@moveDown',$faq),'method'=>'POST']) }}
                    {{ Form::submit('Move Down',['class'=>'btn btn-warning pull-left']) }}
                    {{ Form::close() }}
                    {{ Form::open(['url' => action('FaqController@destroy',$faq),'method'=>'DELETE']) }}
                    {{ Form::submit('Delete',['class'=>'btn btn-warning pull-left']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ action('FaqController@create') }}">
        <button class="btn btn-primary">Add New Faq</button>
    </a>
@endsection

