<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">{{Lang::get('account.my_address')}}</div>
            <div class="panel-body">
                <address>
                    <h5>{{ $user->fullName }}</h5>
                    <a href="mailto:#">{{ $user->email }}</a>
                </address>

                <address>
                    {{ $user->address }}  <br>
                    @if($user->address_2)
                    {{ $user->address_2 }}  <br>
                    @endif
                    {{ $user->city }}, {{ $user->state }} {{ $user->postal }} <br>
                    {{ Countries::getOne($user->country, 'en', 'cldr') }}  <br>
                    <abbr title="Phone">P:</abbr> {{ $user->phone }}
                </address>


            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class=panel-heading>{{Lang::get('account.us_address')}}</div>
            <div class="panel-body">
                <address>
                    {{ $user->shippingAddress['street_no'] }},  {{ $user->shippingAddress['street'] }} <br>
                    {{ $user->shippingAddress['unit'] }}  <br>
                    {{ $user->shippingAddress['city'] }} , {{ $user->shippingAddress['state'] }} {{ $user->shippingAddress['zip'] }} <br>
                    {{ Countries::getOne($user->shippingAddress['country'], 'en', 'cldr') }}  <br>
                   <abbr title="Phone">P:</abbr> {{ $user->shippingAddress['phone'] }}  <br>
                </address>
            </div>
        </div>
    </div>
</div>
