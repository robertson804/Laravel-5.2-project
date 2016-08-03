@extends('layouts.email-inline')

@section('content')

    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {{ trans('emails.welcome_line_1') }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:@if( App::getLocale() === 'ar' ) center @else left @endif;line-height: 24px;">
            <p>
                {{ trans('emails.welcome_line_2') }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:center;line-height: 24px;">
            <p>
            <address>
              <table>
                <tbody>
                <tr>
                  <th>Address Line:&nbsp;&nbsp;&nbsp;</th><td>
                    {{ $user->shippingAddress['street_no'] }} {{ $user->shippingAddress['street'] }}
                  {{ $user->shippingAddress['unit'] }}</td>
                </tr>
                <tr>
                  <th>City:</th><td>{{ $user->shippingAddress['city'] }}</td>
                </tr>
                <tr>
                  <th>State:</th><td>{{ $user->shippingAddress['state'] }}</td>
                </tr>
                <tr>
                  <th>ZipCode:</th><td>{{ $user->shippingAddress['zip'] }}</td>
                </tr>
                <tr>
                  <th>Country:</th><td>{{ Countries::getOne($user->shippingAddress['country'], 'en', 'cldr') }}</td>
                </tr>
                <tr>
                  <th>Phone:</th><td>{{ $user->shippingAddress['phone'] }}</td>
                </tr>
                </tbody>
              </table>
            </address>
            </p>
        </td>
    </tr>

@endsection
