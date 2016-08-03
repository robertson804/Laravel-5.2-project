@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!isset($user->subscription))
            <div class="alert-info alert">
                The New version of Post Shipper requires your billing information to ship orders, please your information below to enable the new site
            </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                {{ Form::open(['method' => 'PATCH', 'action' => ['UserController@resubscribe', $user->id], 'id'=>'register-form' ]) }}
                @include('partials.billing.register')

                @if(!isset($user->subscription))
                {{ Form::submit('Add Card Data') }}
                @else
                    {{ Form::submit('Re Subscribe') }}
                @endif
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="/js/billing.js"></script>
@endsection
