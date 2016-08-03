<h4>Subscription</h4>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Date:</th>
        <th>Cost:</th>
        <th></th>
    </tr>
    </thead>
    @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
            <td>{{ $invoice->total() }}</td>
            <td><a href="/account/invoice/{{ $invoice->id }}">Download Invoice</a></td>
        </tr>
    @endforeach
</table>

<h4>Orders</h4>
<table class="table table-striped table-responsive">
    <thead>
    <tr>
        <th>Date:</th>
        <th>Order #:</th>
        <th>Cost:</th>
        <th>Status:</th>
        <th></th>
    </tr>
    </thead>
    @foreach ($charges as $charge)
        <tr>
            <td>{{ Carbon\Carbon::createFromTimestamp($charge->created)->toFormattedDateString() }}</td>
            <td><a href="{{ url("/account/order/".$charge->metadata->order."/track") }}">{{ $charge->metadata->order  }}</a></td>
            <td>{{ Laravel\Cashier\Cashier::formatAmount($charge->amount) }}</td>
            <td>@if($charge->refunded) Refunded @else Paid @endif</td>
            <td></td>
        </tr>
    @endforeach
</table>
