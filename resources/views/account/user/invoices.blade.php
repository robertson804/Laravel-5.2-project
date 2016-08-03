@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.account.account-nav')
        <div class="row">
            @if(count($charges))
            <table class="col-xs-12 table table-striped table-responsive">
                <thead>
                <tr>
                    <th>{{ trans('account.invoice_date') }}</th>
                    <th>{{ trans('account.order_id') }}</th>
                    <th>{{ trans('account.invoice_cost') }}</th>
                    <th>{{ trans('account.invoice_status') }}</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($charges as $charge)
                        <tr>
                            <td>{{ $charge->ordered_at->toFormattedDateString() }}</td>
                            <td>
                                <a href="{{ url("/account/order/".$charge->id) }}">{{ $charge->id  }}</a>
                            </td>
                            <td>{{ $charge->cost }}</td>
                            <td>@if($charge->refunded) {{ trans('account.invoice_refunded') }} @else {{ trans('account.invoice_paid') }} @endif</td>
                            <td><a href="{{ action('AccountController@showInvoice',$charge->id) }}">
                                    <button class="btn btn-success">{{ trans('account.invoice_receipt') }}</button>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="col-xs-offset-1 col-xs-10 alert alert-info">
                    {{ trans('account.invoice_none') }}
                </div>
            @endif
        </div>
    </div>
@endsection
