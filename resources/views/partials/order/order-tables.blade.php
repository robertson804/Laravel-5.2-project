<div class="table-responsive" xmlns="http://www.w3.org/1999/html">
    <table id="orders" class="table table-striped ">
        <thead>
        <tr>
            <th>#</th>
            <th>Box ID</th>
            <th>User</th>
            <th>Status</th>
            <th>Package Count</th>
            <th>Date Created</th>
            <th>Date Readied</th>
            <th>Gross Paid</th>
            <th>Destination</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>

        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->id }}</td>
                <td><a href='{{ url("admin/user/show/$order->user->id") }}'>{{ $order->user->fullName }}</a></td>
                <td>{{ $order->status }}</td>
                <td>{{ count($order->packages) }}</td>
                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                @if($order->ordered_at)
                    <td>{{ $order->ordered_at->toFormattedDateString() }}</td>
                @else
                    <td>Not Ready to ship</td>
                @endif
                <td>{{ $order->cost }}</td>
                @if($order->user->country == 'kw')
                  <td style="color:blue;">{{ Countries::getOne($order->user->country) }}</td>
                @else
                  <td>{{ Countries::getOne($order->user->country) }}</td>
                @endif
                <td>
                    <a href='{{ url("admin/order/$order->id") }}' ><button class="btn btn-success">View</button></a>
                    @if($order->status == 'pending' || $order->status == 'consolidated')
                        <a href='{{ url("admin/order/$order->id/process") }}'>
                            <button class="btn btn-primary"> Consolidate</button>
                        </a>
                    @else
                        <a target="_blank" href='{{ action('AccountController@showInvoice', $order->id) }}' >
                            <button class="btn btn-primary">Invoice</button></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@section('footer')
    <script>
        $(document).ready(function () {
            $('#orders').DataTable({
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        if (i == 'Unpaid') {
                            return 0;
                        }
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                        i : 0;
                    };

                    // Total over all pages
                    total = api
                            .column(':contains(Paid)')
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(':contains(Paid)', {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                    // Update footer
                    $(api.column(':contains(Paid)').footer()).html(
                            '$' + pageTotal + ' ( $' + total + ' total)'
                    );
                }
            });
        });
    </script>
@endsection
