<ul class="account-nav nav nav-pills nav-justified">
    <li role="presentation" class="{{ Request::url() == url('/account')? 'active' : '' }}"> <a href="{{ action('AccountController@index') }}"><i class="fa fa-cubes"></i> {{trans('account.nav_packages')}}</a></li>
    <li role="presentation" class="{{ Request::url() == url('/account/orders')? 'active' : '' }}"> <a href="{{ action('AccountController@orders') }}"><i class="fa fa-tags"></i> {{Lang::get('account.nav_orders')}}</a></li>
    <li role="presentation" class="{{ Request::url() == url('/account/invoice')? 'active' : '' }}"><a href="{{ action('AccountController@invoice') }}"><i class="fa fa-file-text-o"></i> {{ Lang::get('account.nav_invoice') }}</a></li>
    <li role="presentation" class="{{ Request::url() == url('/account/info')? 'active' : '' }}"><a href="{{ action('AccountController@info') }}"><i class="fa fa-user"></i> {{ Lang::get('account.nav_info') }}</a></li>
</ul>
