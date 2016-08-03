<nav class="navbar navbar-default navbar-fixed-top">

    <div class="top-header hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if(Auth::check())
                        <h5 class="welcome-user">{!!  trans('account.welcome',['fullname'=>Auth::user()->fullName]) !!}</h5>
                    @endif
                    <ul class="social">
                        <li><a class="icon-instagram" href="https://www.instagram.com/postshipper/" target="_blank"></a>
                        </li>
                        <li><a class="icon-twitter" href="https://twitter.com/postshipper" target="_blank"></a></li>
                        <li><a class="icon-pinterest" href="https://www.pinterest.com/postshipper/" target="_blank"></a>
                        </li>
                        <li><a class="icon-facebook" href="https://www.facebook.com/postshipperar" target="_blank"></a>
                        </li>
                    </ul>


                    <ul class="second-top-links">
                        <li class="icon-whatsapp"><a href="tel:302.444.8144">302.444.8144</a></li>
                        <li><a class="icon-calculator" href="{{ url('/') }}"></a></li>
                    </ul>


                    <div class="language dropdown" style="visibility: inherit;">
                        <button class="{{App::getLocale()}} dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('navs.'.App::getLocale()) }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a class="{{$lang}}"
                                           href="{{ route('lang.switch', $lang) }}">{{trans('navs.'.$lang)}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">{{ trans('navs.toggle_nav') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="language picker visible-xs" style="visibility: inherit" >
                    @foreach (Config::get('languages') as $lang => $language)
                        <a href="{{ route('lang.switch', $lang) }}"><img src="{{ url('/images/'.$lang.'.png') }}"/> </a>
                    @endforeach
                </div>
                <a class="navbar-brand" href="/"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main-nav navbar-right">
                    <li class="visible-xs icon-whatsapp"><a href="tel:302.444.8144">302.444.8144</a></li>

                    <li class="{{Request::url() == url('/') ? 'active': ''}}"><a href="/"><i
                                    class="fa fa-home visible-xs"></i>{{ trans('navs.home') }}</a></li>
                    <li class="{{Request::url() == url('/how-it-works') ? 'active': ''}}"><a
                                href="{{ url('/how-it-works') }}"><i
                                    class="fa fa-cog visible-xs"></i>{{ trans('navs.how-it-works') }}</a></li>
                    <li class="{{Request::url() == url('/services') ? 'active': ''}}"><a
                                href="{{ url('/services') }}"><i
                                    class="fa fa-gift visible-xs"></i>{{ trans('navs.services') }}</a></li>
                    <li class="{{request::url() == url('/about') ? 'active': ''}}"><a href="{{ url('/about') }}"><i
                                    class="fa fa-comments visible-xs"></i>{{ trans('navs.about') }}</a></li>
                    <li class="{{request::url() == url('/faq') ? 'active': ''}}"><a href="{{ url('/faq') }}"><i
                                    class="fa fa-comments visible-xs"></i>{{ trans('navs.faq') }}</a></li>
                    <li class="{{Request::url() == url('/contact') ? 'active': ''}}"><a href="{{ url('/contact') }}"><i
                                    class="fa fa-comments visible-xs"></i>{{ trans('navs.contact') }}</a></li>

                    @if ( ! Auth::check())
                        <li class="hidden-xs"><a class="login-button blue-but" href="#">{{ trans('navs.login') }}</a>
                        </li>
                        <li class="hidden-xs"><a class="orange-but"
                                                 href="{{ url('/register') }}">{{ trans('navs.new_account') }}</a></li>
                    @else
                        <li class="hidden-xs"><a class="blue-but"
                                                 href="{{ url('/logout') }}">{{ trans('navs.logout') }}</a></li>
                        <li class="hidden-xs"><a class="orange-but"
                                                 href="{{ url('/account') }}">{{ trans('navs.my_account') }}</a></li>
                    @endif
                    <div class="mobile-login">

                        @if ( ! Auth::check())
                            <li class="visible-xs">

                                <ul>
                                    {{ Form::open(['url' => '/login', 'class' => 'navbar-form']) }}

                                    <li><h2>{{ trans('navs.login') }}</h2></li>

                                    <li class="form-elements {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="email" placeholder="E-Mail Address" class="form-control"
                                               name="email"
                                               value="{{ old('email') }}">
                                    </li>
                                    <li class="form-elements {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" placeholder="Password" class="form-control"
                                               name="password">
                                    </li>
                                    <li class="form-elements">
                                        <input class="btn orange-but" type="submit" value="Log In">
                                    </li>
                                    <li class="form-elements">
                                        <a class="btn btn-link forgot-password" href="{{ url('/password/reset') }}">Forgot
                                            Your Password?</a>
                                    </li>

                                    {{ Form::close() }}
                                    <div class="error-message">
                                        {{ $errors->first() }}
                                    </div>
                                </ul>

                            </li>
                            <li class="visible-xs"><a class="blue-but"
                                                      href="{{ url('/register') }}">{{ trans('navs.new_account') }}</a>
                            </li>
                        @else
                            <li class="visible-xs"><a class="blue-but"
                                                      href="{{ url('/logout') }}">{{ trans('navs.logout') }}</a></li>
                            <li class="visible-xs"><a class="orange-but"
                                                      href="{{ url('/account') }}">{{ trans('navs.my_account') }}</a>
                            </li>
                        @endif
                    </div>
                </ul>


            </div>

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

@if ( ! Auth::check())
    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <ul class="nav navbar-nav navbar-right">
                        {{ Form::open(['url' => '/login', 'class' => 'navbar-form']) }}

                        <li class="form-elements {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" placeholder="E-Mail Address" class="form-control" name="email"
                                   value="{{ old('email') }}">
                        </li>
                        <li class="form-elements {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </li>
                        <li class="form-elements">
                            <input class="btn orange-but" type="submit" value="Log In">
                        </li>
                        <li class="form-elements">
                            <a class="btn btn-link forgot-password" href="{{ url('/password/reset') }}">Forgot Your
                                Password?</a>
                        </li>

                        {{ Form::close() }}
                        <div class="error-message">
                            {{ $errors->first() }}
                        </div>
                    </ul>

                    <div class="close-login"><i class="fa fa-times"></i></div>

                </div>
            </div>
        </div>
        @endif
    </div>


    <!--<nav class="navbar navbar-default">
        <div class="navbar-collapse nav_hldr">
            <div>
                <div class="col-sm-6 nav_logn">
                    <div class="logd_cont">
                    </div>
                </div>
            </div>
        </div>
    </nav>-->
