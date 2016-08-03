@extends('layouts.email-inline')

@section('content')
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {{ trans('emails.shipped_line_1',['order_no'=> $order->id]) }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {!! trans('emails.shipped_line_2', ['link' =>'<a href="'.url('/login').'">My Account</a>']) !!}
            </p>
        </td>
    </tr>
@endsection