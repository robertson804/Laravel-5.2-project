@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Shipments</h1>

    <div class="table-responsive">
        <table class="table table-striped datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Tracking Code</th>
                <th>Status</th>
                <th>Shipped Date</th>
                <th>Total Weight</th>
                <th>Total Paid</th>
                <th>Destination</th>
                <th>Last Tracking Data</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{  $shipment->id }}</td>
                    <td><a href="{{ $shipment->shippingProvider->tracking_link($shipment->tracking_code) }}" target="_blank">{{ $shipment->tracking_code }}</a></td>
                    <td>{{  $shipment->status }}</td>
                    <td>{{ $shipment->created_at->toFormattedDateString() }}</td>
                    <td>{{ ShippingCalculations::gramsToPounds($shipment->packages->sum('weight_og')) }} LB</td>
                    <td>{{ Laravel\Cashier\Cashier::formatAmount($shipment->orders->sum('cost_og'))}}</td>
                    <td>{{  Countries::getOne($shipment->orders()->first()->user->country) }}</td>
                    <td>
                        @if(count($shipment->trackingThrough()->get()))
                            {{ \Carbon\Carbon::parse($shipment->trackingThrough()->max('tracking_at'))->toFormattedDateString() }}
                            @else
                            No Tracking Data
                        @endif
                    </td>
                    <td><a href="{{ action('ShipmentController@show',$shipment) }}"><button class="btn btn-success">View</button></a>
                        <a href="{{ action("ShipmentController@track",$shipment) }}"><button class="btn btn-primary">Add Tracking Data</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
