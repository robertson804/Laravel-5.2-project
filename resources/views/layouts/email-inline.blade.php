<html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Minty-Multipurpose Responsive Email Template</title>
    <style type="text/css">
        /* Client-specific Styles */
        #outlook a {
            padding: 0;
        }

        /* Force Outlook to provide a "view in browser" menu link. */
        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }

        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
        .ExternalClass {
            width: 100%;
        }

        /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }

        /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }

        img {
            outline: none;
            text-decoration: none;
            border: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        .image_fix {
            display: block;
        }

        p {
            margin: 0px 0px !important;
        }

        table td {
            border-collapse: collapse;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        a { /*color: #e95353;*/
            text-underline: none !important;
            text-decoration: none;
            text-decoration: none !important;
        }

        /*STYLES*/
        table[class=full] {
            width: 100%;
            clear: both;
        }

        /*################################################*/
        /*IPAD STYLES*/
        /*################################################*/
        @media only screen and (max-width: 640px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: #ffffff; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: #ffffff !important;
                pointer-events: auto;
                cursor: default;
            }

            table[class=devicewidth] {
                width: 440px !important;
                text-align: center !important;
            }

            table[class=devicewidthinner] {
                width: 420px !important;
                text-align: center !important;
            }

            table[class="sthide"] {
                display: none !important;
            }

            img[class="bigimage"] {
                width: 420px !important;
                height: 219px !important;
            }

            img[class="col2img"] {
                width: 420px !important;
                height: 258px !important;
            }

            img[class="image-banner"] {
                width: 440px !important;
                height: 106px !important;
            }

            td[class="menu"] {
                text-align: center !important;
                padding: 0 0 10px 0 !important;
            }

            td[class="logo"] {
                padding: 10px 0 5px 0 !important;
                margin: 0 auto !important;
            }

            img[class="logo"] {
                padding: 0 !important;
                margin: 0 auto !important;
            }

        }

        /*##############################################*/
        /*IPHONE STYLES*/
        /*##############################################*/
        @media only screen and (max-width: 480px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: #ffffff; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: #ffffff !important;
                pointer-events: auto;
                cursor: default;
            }

            table[class=devicewidth] {
                width: 280px !important;
                text-align: center !important;
            }

            table[class=devicewidthinner] {
                width: 260px !important;
                text-align: center !important;
            }

            table[class="sthide"] {
                display: none !important;
            }

            img[class="bigimage"] {
                width: 260px !important;
                height: 136px !important;
            }

            img[class="col2img"] {
                width: 260px !important;
                height: 160px !important;
            }

            img[class="image-banner"] {
                width: 280px !important;
                height: 68px !important;
            }

        }
    </style>
</head>
<body>
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td>
            <div class="innerbg">
            </div>
            <table width="580" bgcolor="#0bb7ae" cellpadding="0" cellspacing="0" border="0" align="center"
                   class="devicewidth">
                <tbody>
                <tr>
                    <td>
                        <!-- logo -->

                        <table width="280" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth"
                               bgcolor="#0bb7ae">
                            <tbody>
                            <tr>
                                <td valign="middle" width="270" style="padding: 10px 0 10px 20px;" class="logo">
                                    <div class="imgpop">
                                        <a href="#"><img
                                                    src="{{ url('/images/high-logo.png') }}"
                                                    width="100" alt="logo" border="0"
                                                    style="display:block; border:none; outline:none; text-decoration:none;"
                                                    class="logo"/></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End of logo -->

                        <!-- menu -->

                        <table width="280" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth"
                               bgcolor="#0bb7ae">
                            <tbody>
                            <tr>
                                <td width="270" valign="middle"
                                    style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;"
                                    align="right" class="menu">
                                    <p>
                                        <a style="text-decoration: none; color: #ffffff;"
                                           href="{{ url('/') }}">{{ trans('emails.home') }}</a> | <a
                                                style="text-decoration: none; color: #ffffff;"
                                                href="{{ url('/about') }}">{{ trans('emails.about') }}</a> | <a
                                                style="text-decoration: none; color: #ffffff;"
                                                href="{{ url('/faq') }}">{{ trans('emails.faq') }}</a>
                                    </p>
                                </td>
                                <td width="20">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End of Menu -->

                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td>
            <div class="innerbg">
            </div>
            <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0"
                   class="devicewidth">
                <tbody>
                <tr>
                    <td width="100%" height="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="540" align="center" cellspacing="0" cellpadding="0" border="0"
                               class="devicewidthinner">
                            <tbody>
                            <tr>
                                <!-- start of image -->

                                <td align="center">
                                    <div class="imgpop">
                                        <a href="#">
                                            <img width="540" border="0" height="282" alt=""
                                                         style="display:block; border:none; outline:none; text-decoration:none;"
                                                         src="{{ url('/images/postshipper-email.png') }}"
                                                         class="bigimage"/>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- end of image -->

                            <!-- Spacing -->

                            <tr>
                                <td width="100%" height="20">
                                </td>
                            </tr>
                            <!-- Spacing -->

                            <!-- title -->

                            <tr>
                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;">
                                    <p> {{ trans('emails.greeting',['full_name'=> $user->full_name]) }} </p>
                                </td>
                            </tr>
                            <!-- end of title -->

                            <!-- Spacing -->

                            <tr>
                                <td width="100%" height="20">
                                </td>
                            </tr>
                            <!-- Spacing -->

                            <!-- content -->


                            @yield('content')
                            <!-- end of content -->

                            <!-- Spacing -->

                            <tr>
                                <td width="100%" height="10">
                                </td>
                            </tr>
                            <!-- button -->

                            <tr>
                                <td>
                                    <div class="buttonbg">
                                    </div>
                                    <table height="30" align="center" valign="middle" border="0" cellpadding="0"
                                           cellspacing="0" class="tablet-button" bgcolor="#f27232"
                                           style="border-radius: 4px; font-size: 13px; font-family: Helvetica, arial, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 18px; padding-right: 18px; background-color: rgb(242, 114, 50); background-clip: padding-box;">
                                        <tbody>
                                        <tr>
                                            <td width="auto" align="center" valign="middle" height="30"
                                                style="padding-left:18px; padding-right:18px;font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300;">
																<span style="color: #ffffff; font-weight: 300;">
																	<a style="color: #ffffff; text-align:center;text-decoration: none;"
                                                                       tabindex="-1"
                                                                       href="{{ url('/login') }}">{{ trans('emails.login') }}</a>
																</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- /button -->

                            <!-- Spacing -->

                            <tr>
                                <td width="100%" height="20">
                                </td>
                            </tr>
                            <!-- Spacing -->

                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td>
            <div class="innerbg">
            </div>
            <table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center"
                   class="devicewidth">
                <tbody>
                <tr>
                    <td width="100%" height="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="540" cellpadding="0" cellspacing="0" border="0" align="center"
                               class="devicewidth">
                            <tbody>
                            <tr>
                                <td>
                                    <!-- col 1 -->

                                    <table width="170" align="left" border="0" cellpadding="0" cellspacing="0"
                                           class="devicewidth">
                                        <tbody>
                                        <!-- image 2 -->

                                        <tr>
                                            <td width="170" height="128" align="center" class="devicewidth">
                                                <div class="imgpop">
                                                    <img src="{{ url('/images/icons/shop.png') }}" alt="" border="0"
                                                         width="170" height="128"
                                                         style="display:block; border:none; outline:none; text-decoration:none;"
                                                         class="col3img"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end of image2 -->

                                        <tr>
                                            <td>
                                                <!-- start of text content table -->

                                                <table width="170" align="center" border="0" cellpadding="0"
                                                       cellspacing="0" class="devicewidthinner">
                                                    <tbody>
                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- title2 -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;">
                                                            <p align="center">
                                                                {{ trans('front.shop') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of title2 -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- content2 -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 20px;">
                                                            <p style="text-align: center;">
                                                                {{ trans('front.shop_plus') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of content2 -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- button -->

                                                    <tr>
                                                        <td>
                                                            <div class="buttonbg">
                                                            </div>
                                                            <table height="30" align="left" valign="middle" border="0"
                                                                   cellpadding="0" cellspacing="0" class="tablet-button"
                                                                   style="border-radius: 4px; font-size: 13px; font-family: Helvetica, arial, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 18px; padding-right: 18px; background-color: rgb(255, 255, 255); background-clip: padding-box;"
                                                                   bgcolor="#ffffff">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="padding-left:18px; padding-right:18px;font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300;"
                                                                        width="auto" align="center" valign="middle"
                                                                        height="30">
                                                                        <span style="color: #ffffff; font-weight: 300;"> <a
                                                                                    style="color: #ffffff; text-align:center;text-decoration: none;"
                                                                                    href="#" tabindex="-1">Read More</a></span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- /button -->

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- end of text content table -->

                                        </tbody>
                                    </table>
                                    <!-- spacing -->

                                    <table width="15" align="left" border="0" cellpadding="0" cellspacing="0"
                                           class="removeMobile">
                                        <tbody>
                                        <tr>
                                            <td width="100%" height="15"
                                                style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- end of spacing -->

                                    <!-- col 2 -->

                                    <table width="170" align="left" border="0" cellpadding="0" cellspacing="0"
                                           class="devicewidth">
                                        <tbody>
                                        <!-- image 2 -->

                                        <tr>
                                            <td width="170" height="128" align="center" class="devicewidth">
                                                <div class="imgpop">
                                                    <img src="{{url('/images/icons/ship.png')}}" alt="" border="0"
                                                         width="170" height="128"
                                                         style="display:block; border:none; outline:none; text-decoration:none;"
                                                         class="col3img"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end of image2 -->

                                        <tr>
                                            <td>
                                                <!-- start of text content table -->

                                                <table width="170" align="center" border="0" cellpadding="0"
                                                       cellspacing="0" class="devicewidthinner">
                                                    <tbody>
                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- title2 -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;">
                                                            <p align="center">
                                                                {{ trans('front.ship') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of title2 -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- content2 -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 20px;">
                                                            <p style="text-align: center;">
                                                                {{ trans('front.ship_plus') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of content2 -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- /Spacing -->

                                                    <!-- button -->

                                                    <tr>
                                                        <td>
                                                            <div class="buttonbg">
                                                            </div>
                                                            <table height="30" align="left" valign="middle" border="0"
                                                                   cellpadding="0" cellspacing="0" class="tablet-button"
                                                                   style="border-radius: 4px; font-size: 13px; font-family: Helvetica, arial, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 18px; padding-right: 18px; background-color: rgb(255, 255, 255); background-clip: padding-box;"
                                                                   bgcolor="#ffffff">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="padding-left:18px; padding-right:18px;font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300;"
                                                                        width="auto" align="center" valign="middle"
                                                                        height="30">
                                                                        <span style="color: #ffffff; font-weight: 300;"> <a
                                                                                    style="color: #ffffff; text-align:center;text-decoration: none;"
                                                                                    href="#" tabindex="-1">Read More</a></span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- /button -->

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- end of text content table -->

                                        </tbody>
                                    </table>
                                    <!-- end of col 2 -->

                                    <!-- spacing -->

                                    <table width="1" align="left" border="0" cellpadding="0" cellspacing="0"
                                           class="removeMobile">
                                        <tbody>
                                        <tr>
                                            <td width="100%" height="15"
                                                style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- end of spacing -->

                                    <!-- col 3 -->

                                    <table width="170" align="right" border="0" cellpadding="0" cellspacing="0"
                                           class="devicewidth">
                                        <tbody>
                                        <!-- image3 -->

                                        <tr>
                                            <td width="170" height="128" align="center" class="devicewidth">
                                                <div class="imgpop">
                                                    <img src="{{ url('/images/icons/deliver.png') }}" alt="" width="170"
                                                         height="128" border="0"
                                                         style="display:block; border:none; outline:none; text-decoration:none;"
                                                         class="col3img"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end of image3 -->

                                        <tr>
                                            <td>
                                                <!-- start of text content table -->

                                                <table width="170" align="center" border="0" cellpadding="0"
                                                       cellspacing="0" class="devicewidthinner">
                                                    <tbody>
                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- title -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;">
                                                            <p align="center">
                                                                {{ trans('front.deliver') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of title -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- content -->

                                                    <tr>
                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 20px;">
                                                            <p style="text-align: center;">
                                                                {{ trans('front.deliver_plus') }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <!-- end of content -->

                                                    <!-- Spacing -->

                                                    <tr>
                                                        <td width="100%" height="15"
                                                            style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">
                                                        </td>
                                                    </tr>
                                                    <!-- Spacing -->

                                                    <!-- button -->

                                                    <tr>
                                                        <td>
                                                            <div class="buttonbg">
                                                            </div>
                                                            <table height="30" align="left" valign="middle" border="0"
                                                                   cellpadding="0" cellspacing="0" class="tablet-button"
                                                                   style="border-radius: 4px; font-size: 13px; font-family: Helvetica, arial, sans-serif; text-align: center; color: rgb(255, 255, 255); font-weight: 300; padding-left: 18px; padding-right: 18px; background-color: rgb(255, 255, 255); background-clip: padding-box;"
                                                                   bgcolor="#ffffff">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="padding-left:18px; padding-right:18px;font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300;"
                                                                        width="auto" align="center" valign="middle"
                                                                        height="30">
                                                                        <span style="color: #ffffff; font-weight: 300;"> <a
                                                                                    style="color: #ffffff; text-align:center;text-decoration: none;"
                                                                                    href="#" tabindex="-1">Read More</a></span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- /button -->

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!-- end of text content table -->

                                        </tbody>
                                    </table>
                                </td>
                                <!-- spacing -->

                                <!-- end of spacing -->

                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%" height="20">
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <td width="100%">
            <div class="innerbg">
            </div>
            <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                <tbody>
                <!-- Spacing -->

                <tr>
                    <td width="100%" height="5">
                    </td>
                </tr>
                <!-- Spacing -->

                <tr>
                    <td align="center" valign="middle"
                        style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999">
                        <p>
                            <a href="{{ url('/terms') }}"><span
                                        style="color: rgb(153, 177, 199); font-family: Arial; font-size: 12px; line-height: 15px; background-color: rgb(253, 253, 253);">{{ trans('emails.terms') }}</span></a>
                        </p>
                        <p>
                            <span style="color: rgb(153, 177, 199); font-family: Arial; font-size: 12px; line-height: 15px; background-color: rgb(253, 253, 253);">{{ trans('emails.rights_reserved') }} </span>
                        </p>
                    </td>
                </tr>
                <!-- Spacing -->

                <tr>
                    <td width="100%" height="5">
                    </td>
                </tr>
                <!-- Spacing -->

                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
