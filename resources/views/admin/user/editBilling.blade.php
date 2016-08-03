@extends('layouts.admin')

@section('content')

    {{ Form::model($user,['method' => 'PATCH', 'action' => ['AccountController@updateBilling',$user->id], 'id'=>'register-form' ]) }}
    @include('partials.billing.register')
    {{ Form::submit('Save Changes') }}
    {{ Form::close() }}

@endsection

@section('footer')
    <script src="/js/billing.js"></script>
@endsection
