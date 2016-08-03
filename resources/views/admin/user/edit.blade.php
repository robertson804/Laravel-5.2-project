@extends('layouts.admin')

@section('content')

    {{ Form::model($user,['method' => 'PATCH', 'action' => ['AccountController@update',$user->id] ]) }}

    @include('partials.user.edit-address')
    @include('partials.user.edit-info')

    {{ Form::submit('Save Changes', ['class'=>'btn btn-primary form-control']) }}
    {{ Form::close() }}

@endsection
