<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PostShipper Receipt</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .paid-stamp {
            position: absolute;
            left: 40%;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
<img class="paid-stamp" src="/images/paid.png">
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="/images/logo.png" style="width:100%; max-width:300px;">
                        </td>
                        <td>
                            {{ trans('account.order_id') }}: {{$charge->id}}<br>
                            {{ trans('account.invoice_created') }} {{ $charge->ordered_at->toFormattedDateString() }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{ $ship['company'] }}<br>
                            {{ $ship['street_no'] }} {{ $ship['street'] }}<br>
                            {{ $ship['city'] }}, {{ $ship['state'] }} {{ $ship['zip'] }}
                        </td>
                        <td>

                            <address>
                                @if($user->company_name)
                                    {{ $user->company_name }}<br>
                                @endif
                                {{ $user->full_name }}<br>
                                {{ $user->email }}<br>
                                {{ $user->address }} <br>
                                @if($user->address_2)
                                    {{ $user->address_2 }}  <br>
                                @endif
                                {{ $user->city }}, {{ $user->state }} {{ $user->postal }} <br>
                                {{ Countries::getOne($user->country, App::getLocale() , 'cldr') }} <br>
                                {{ $user->phone }}
                            </address>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                {{ trans('account.invoice_item') }}
            </td>

            <td>
                {{ trans('account.invoice_price') }}
            </td>
        </tr>

        <tr class="item">
            <td>
                {{ trans('account.invoice_shipped', ['order_id'=> $charge->id]) }}
            </td>
            <td>
                {{ $charge->cost }}
            </td>
        </tr>
    </table>
</div>
</body>
</html>