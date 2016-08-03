@extends('layouts.app')

@section('content')
    <section class="headers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('account.edit_user') }}</h2>
                </div>
            </div>
        </div>

    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                {{ Form::model($user,['method' => 'PATCH', 'url' => ['/account/update',$user->id], 'id'=>'register-form']) }}

                @include('partials.user.edit-address')
                @include('partials.user.edit-info')

                {{ Form::submit(Lang::get('account.save_changes'), ['class'=>'btn btn-primary form-control']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
