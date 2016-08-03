@extends('layouts.email-inline')

@section('content')
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {{ trans_choice('emails.consolidated_line_1',count($order->packages),['count'=>count($order->packages)]) }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {{ trans('emails.consolidated_line_2') }}
            </p>
        </td>
    </tr>
@endsection