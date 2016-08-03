<h4>Common Actions</h4>
<ul class="nav nav-sidebar">
    <li {{Request::url() == url('admin') ? 'class="active"': ''}}><a href="{{ url('admin') }}">Overview <span class="sr-only">(current)</span></a></li>
    <li @if(Request::url() == url('admin/package/create'))class="active"@endif><a href="{{ url('admin/package/create') }}">Add Package</a></li>
    <li @if(Request::url() == url('admin/order/unprocessed'))class="active"@endif><a href="{{ url('admin/order/unprocessed') }}">Consolidate Client Orders</a></li>
    <li @if(Request::url() == url('admin/shipment/create'))class="active"@endif><a href="{{ url('admin/shipment/create') }}">Prepare Shipment</a></li>
</ul>

<h4>View All</h4>
<ul class="nav nav-sidebar">
    <li @if(Request::url() == url('admin/order'))class="active"@endif><a href="{{ url('admin/order') }}">Orders</a></li>
    <li @if(Request::url() == url('admin/package'))class="active"@endif><a href="{{ url('admin/package') }}">Packages</a></li>
    <li @if(Request::url() == url('admin/user'))class="active"@endif><a href="{{ url('admin/user') }}">Users</a></li>
    <li @if(Request::url() == url('admin/shipment'))class="active"@endif><a href="{{ url('admin/shipment') }}">Shipments</a></li>
    <li @if(Request::url() == url('admin/provider'))class="active"@endif><a href="{{ url('admin/provider') }}">Shipping Providers</a></li>
</ul>

<h4>Admin Settings</h4>
<ul class="nav nav-sidebar">
    <li @if(Request::url() == action('ShippingBoxController@edit',1))class="active"@endif><a href="{{ action('ShippingBoxController@edit', 1) }}">Change Big Box Price</a></li>
    <li @if(Request::url() == action('SliderController@index'))class="active"@endif><a href="{{ action('SliderController@index') }}">Front Page Sliders</a></li>
    <li @if(Request::url() == action('FaqController@index'))class="active"@endif><a href="{{ action('FaqController@index') }}">FAQ's</a></li>
</ul>
