<table id="packages" class="table table-striped table-condensed table-responsive table-hover datatable">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Dimensions(LWH)</th>
        <th>Oversized</th>
        <th>Weight</th>
        <th>Received Date</th>
        <th>Destination</th>
        <th>Days In Warehouse</th>
        <th>User</th>
        <th>Mailbox</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($packages as $package)
        <tr>
            <td>{{  $package->id }}</td>
            <td>{{ $package->name }}</td>
            <td>{{ $package->price }}</td>
            <td>{{ $package->status }}</td>
            <td>{{ $package->dimensions }}</td>
            <td>@if($package->oversized) <span class="text-danger">Yes</span> @else  No @endif</td>
            <td>{{ $package->weight }}</td>
            <td>{{ $package->received_at->toDayDateTimeString() }}</td>
            <td>{{ Countries::getOne($package->user->country) }}</td>
                @if( $package->received_at->diffInDays() >= 45 && in_array($package->status, ['resolve','pending']) )
                <td class="text-danger">
                  {{ $package->received_at->diffInDays() }}
                @elseif( !in_array($package->status, ['resolve','pending']) )
                <td> -
                @else
                <td>{{ $package->received_at->diffInDays() }}
                @endif
            </td>
            <td><a href="{{ action('UserController@show',$package->user) }}">{{ $package->user->fullName }}</a></td>
            <td><a href="{{ action('UserController@show',$package->user) }}">{{ $package->user->id }}</a></td>
            <td width="120px"><a href="{{ url("admin/package/$package->id") }}">
                    <button class="btn btn-success">View</button>
                </a>
                <a href="{{ url("admin/package/$package->id/edit") }}">
                    <button class="btn btn-primary">Edit</button>
                </a></td>
        </tr>
    @endforeach
    </tbody>
</table>
