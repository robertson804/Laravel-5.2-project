<address class="shipping-address">
    {{ $user->address }} <br>
    @if($user->address2)
        {{ $user->address2 }}  <br>
    @endif
    {{ $user->city }} , {{ $user->state }} {{ $user->postal }}
    <br>
    {{ Countries::getOne($user->country, 'en', 'cldr') }} <br>
    <abbr title="Phone">P:</abbr> {{ $user->phone }} <br>
</address>
