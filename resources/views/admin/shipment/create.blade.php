@extends('layouts.admin')
@section('content')

    <h1>Build a Shipment</h1>


    @if(count($orders) >= 1)
        {{ Form::open(['url' => 'admin/shipment']) }}

        <fieldset>
            <legend>Add orders To Shipment</legend>
            <div class="row filters">
                <span class="dest-filter col-md-3">Filter Destinations:</span>
                <span class="shipping-filter col-md-3">Filter Shipping methods:</span>
            </div>

            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th>[]</th>
                    <th>Order #</th>
                    <th>Consolidated Date</th>
                    <th>Destination</th>
                    <th>Shipping Speed</th>
                    <th>Warehouse Days</th>
                    <th>Dimensions (LWH)</th>
                    <th>Weight (lb)</th>
                    <th>Mailbox</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <th>[]</th>
                <th>Order #</th>
                <th>Consolidated Date</th>
                <th>Destination</th>
                <th>Shipping Speed</th>
                <th>Warehouse Days</th>
                <th>Dimensions</th>
                <th>Weight (lb)</th>
                <th>Mailbox</th>
                <th>Actions</th>

                </tfoot>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>
                            {{ Form::checkbox('order[]',$order->id) }}
                        </td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->consolidated_at->toFormattedDateString() }}</td>
                        <td>{{ Countries::getOne($order->user->country,'en') }}</td>
                        <td>{{ $order->shipping_method }}</td>
                        <td>{{ Carbon\Carbon::parse($order->packages()->max('received_at'))->diffInDays() }}</td>
                        <td>{{ $order->length.'"x '.$order->width.'" x '.$order->height.'"' }}</td>
                        <td>{{ $order->pounds }}</td>
                        <td><a href="{{ action('UserController@show',$order->user) }}">{{ $order->user->id }}</a></td>
                        <td><a target="_blank" href="{{ action('OrderController@show',$order)  }}">View</a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend>Shipment Details:</legend>
            <div class="form-group">
                {{ Form::label('shipping_provider','Shipping Provider:') }}
                {{ Form::select('shipping_provider', $shipping_providers, null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('tracking_code','Provider Tracking Code:') }}
                {{ Form::text('tracking_code', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Build Shipment', ['class' => 'btn btn-primary form-control']) }}
            </div>
        </fieldset>

        {{ Form::close() }}
        @include('partials.error-box')
    @else
        <h3>No Ready orders available to build a shipment</h3>
    @endif
@endsection
@section('footer')
    <script>
        $('.datatable').DataTable({
            initComplete: function () {
                var columns = this.api().column(':contains(Destination)');
                var selects = $('<select class="form-control col-md-3"><option value=""></option></select>')
                        .appendTo($('.dest-filter'))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                            );
                            columns
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                        });

                columns.data().unique().sort().each(function (d, j) {
                    selects.append('<option value="' + d + '">' + d + '</option>')
                });

                    var column = this.api().column(':contains(Shipping Speed)');
                    var select = $('<select class="form-control col-md-3"><option value=""></option></select>')
                            .appendTo($('.shipping-filter'))
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                );
                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
            }
        });
    </script>
@endsection
