@extends('layouts.email-inline')

@section('content')
    <table class="container"
           style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: inherit; width: 580px; margin: 0 auto; padding: 0;">
        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
            <td style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"
                align="left" valign="top">
                <table class="row"
                       style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                    <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="wrapper last"
                            style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;"
                            align="left" valign="top">

                            <table class="twelve columns"
                                   style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td style="text-align: left; vertical-align: center; word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px;"
                                        align="left" valign="center"><p class="lead"
                                                                        style="color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 21px; font-size: 18px; display: inline !important; margin: 0 0 10px; padding: 0;"
                                                                        align="left">
                                            Click here to reset your password: <a href="{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">Click Here</a>
                                        </p></td>
                                    <td class="expander"
                                        style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"
                                        align="left" valign="top"></td>
                                </tr>
                                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td style="text-align: left; vertical-align: center; word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px;"
                                        align="left" valign="center"><p
                                                style="color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; display: inline !important; margin: 0 0 10px; padding: 0;"
                                                align="left"></p></td>
                                    <td class="expander"
                                        style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"
                                        align="left" valign="top"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="row callout"
                       style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                    <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="wrapper last"
                            style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;"
                            align="left" valign="top">

                            <table class="twelve columns"
                                   style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td class="panel"
                                        style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; background: #f2f2f2; margin: 0; padding: 10px; border: 1px solid #d9d9d9;"
                                        align="left" bgcolor="#f2f2f2" valign="top">
                                        <p style="color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; display: inline !important; margin: 0 0 10px; padding: 0;"
                                           align="left">
                                        </p>
                                    </td>
                                    <td class="expander"
                                        style="word-break: break-word; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"
                                        align="left" valign="top"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table><!-- container end below --></td>
        </tr>
    </table>

@endsection
