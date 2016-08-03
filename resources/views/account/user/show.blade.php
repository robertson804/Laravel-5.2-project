@extends('layouts.app')

@section('content')
    <div class="container user-info">
        @include('partials.account.account-nav')
        <div class="row">
            <div class="col-md-8">
                @include('partials.user.info')
            </div>
            <div class="col-md-4">
                <div class="btn-group-vertical">
                    <ul class="list-unstyled user-buttons" style="text-align: right">
                        <li>
                            <a href="/account/edit">
                                <button class="btn btn-success">{{Lang::get('account.edit_user')}}</button>
                            </a>
                        </li>
                        <li>
                            <a href="/account/edit/password">
                                <button class="btn btn-success">{{Lang::get('account.edit_pass')}}</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection