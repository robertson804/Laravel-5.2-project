@extends('layouts.admin')

@section('content')
    <h1>Add Tracking Data to Your Shipment</h1>

    @include('partials.error-box')
    <a class="pull-left"
       href="{{ $shipment->shippingProvider->tracking_link($shipment->tracking_code) }}"
       target="_blank">
        <button class="btn btn-success-">Retrieve Tracking Data</button>
    </a>
    @if(!$shipment->complete)
        {{ Form::open(['url'=>action('ShipmentController@complete',$shipment)]) }}
        {{ Form::input('submit','submit','Mark Shipment as Complete',['class'=>'btn btn-primary']) }}
        {{ Form::close() }}
    @else
        {{ Form::open(['url'=>action('ShipmentController@uncomplete',$shipment)]) }}
        {{ Form::input('submit','submit','Remove Complete Status',['class'=>'btn btn-warning']) }}
        {{ Form::close() }}
    @endif
    <div class="help-block ">
        <p>Click 'Retrieve Tracking Data' to open provider tracking data in a new window.</p>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <th>#</th>
            <th>Date</th>
            <th>Location</th>
            <th>Description</th>
            <th>Order</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($tracking as $index => $tracking)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $tracking->tracking_at }}</td>
                    <td>{{ $tracking->location }}</td>
                    <td>{{ $tracking->description }}</td>
                    <td>
                        @if($tracking->trackable_type == 'App\Shipment')
                            All
                            @else
                            <a href="{{action('OrderController@show',$tracking->trackable_id)}}" target="_blank">{{$tracking->trackable_id}}</a>
                        @endif
                    </td>
                    <td>
                        {{ Form::open([ 'url'=> action("TrackingController@destroy",$tracking->id), 'method'=>'DELETE']) }}
                        {{ Form::submit('x',['class'=>'btn btn-warning']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ Form::open(['action'=>"TrackingController@store",'class'=>'']) }}
        {{ Form::input('hidden','shipment_id',$shipment->id) }}
        {{ Form::input('hidden','last_tracking_date', $shipment->tracking()->max('tracking_at')) }}
        <div class="help-block col-md-12">
            Date <b>must</b> be set as Eastern Standard Time
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('tracking_at','Date:') }}
            {{ Form::text('tracking_at',\Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'id'=> 'datetimepicker']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('location','Location:') }}
            {{ Form::text('location',null,['class'=>'form-control']) }}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description','Description:') }}
            {{ Form::text('description',null,['class'=>'form-control']) }}
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('order_id','Order:') }}
            <div class="help-block ">
            <p>Hint: 'All' will add tracking details to all associated orders in the consolidated shipment.<br>Or you can add tracking details to a single order by selecting the order number.</p>
            </div>
            {{ Form::select('order_id', $order_select ,null,['class'=>'form-control', 'id'=>'order_id']) }}
        </div>


        @if($shipment->complete)
            <div class="form-group col-md-12 complete-order">
                {{ Form::label('complete_order','Mark order as delivered to client:') }}
                {{ Form::checkbox('complete','true' ,false,[]) }}
                <div class="help-block">
                    <p>Hint: Each order must be completed individually, per account. </p>
                </div>
            </div>
        @endif

        <div class="form-group">
            {{ Form::submit('Add Tracking',['class'=> 'form-control btn btn-primary']) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            if($('#order_id').val() !== ''){
                $('.complete-order').show();
            }else{
                $('.complete-order').hide();
            }

            $('#order_id').change(function () {
                if($(this).val() !== ''){
                    $('.complete-order').show();
                }else{
                    $('.complete-order').hide();
                }
            });

        });
    </script>
@endsection
