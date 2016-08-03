@extends('layouts.app')

@section('content')
    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{trans('account.edit_billing')}}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">

                {{ Form::model($user,['method' => 'PATCH', 'url' => ['/account/update/billing',$user->id], 'id'=>'register-form' ]) }}
                @include('partials.billing.register')
                {{ Form::submit(Lang::get('account.save_changes')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="/js/billing.js"></script>
@endsection
