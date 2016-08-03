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
                    <b>Phone</b> {{ $user->phone }}
                </address>


            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class=panel-heading>{{Lang::get('account.us_address')}}</div>
            <div class="panel-body">
              <address>
                <table>
                  <tr>
                    <th>Address Line:&nbsp;&nbsp;&nbsp;</th><td>{{ $user->shippingAddress['street_no'] }} {{ $user->shippingAddress['street'] }} {{ $user->shippingAddress['unit'] }}</td>
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
                </table>
              </address>
            </div>
        </div>
    </div>
</div>
