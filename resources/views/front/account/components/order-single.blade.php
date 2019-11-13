<div class="woocommerce-MyAccount-content">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="account-content long" style="background-color: white;">
                <span class="content-title">Order Details
                    <a class="acc-action" href="/account/orders">Go Back</a>
                    <a class="acc-action" href="/account/orders/{{$order->reference}}/invoice">Print Invoice</a>
                </span>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="acc-card">
                            <span class="acc-card-header">Order Summary</span>
                            <span class="acc-card-title">ID: #{{ $order->reference }}</span>
                            <span class="acc-card-info">Date Placed: {{date('d/m/Y', strtotime($order->created_at))}}</span>
                            <span class="acc-card-info">Total Items: {{count($order->items)}}
                            </span>
                            <span class="acc-card-info" id="orderStatus">Current Status: {{ $order->status->label }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 card-separator">
                        <div class="acc-card">
                            <span class="acc-card-header">Payment Details</span>
                            <span class="acc-card-title">{{ config('app.currency') }} {{ $order->total_price }}</span>
                            <span class="acc-card-info">Subtotal: {{ config('app.currency') }} {{ $order->sub_total_price }}</span>
                            <span class="acc-card-info">Shipping: {{ config('app.currency') }} {{ $order->shipping_cost }}
                            </span>
                            <span class="acc-card-info">Method: Cash On Delivery</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 card-separator">
                        <div class="acc-card">
                            <span class="acc-card-header">Shipping Details</span>
                            <span class="acc-card-title">{{ $order->address->first_name }}</span>
                            <span class="acc-card-info">{{ $order->address->address }}</span>
                            <span class="acc-card-info">{{ $order->address->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table" style="background-color: #F5F5F5;">
        <thead>
            <tr>
                <th style="width: 10%">
                    <span class="nobr">Item</span>
                </th>
                <th style="width: 70%">
                    <span class="nobr">Name</span>
                </th>
                <th style="width: 10%">
                    <span class="nobr">Quantity</span>
                </th>
                <th style="width: 10%">
                    <span class="nobr">Price/Item</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order" data-id="{{$item->id}}" data-name="{{$item->name}}">
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Item">
                        <div class="order-items">
                            <img src="{{ URL::asset($item->thumbnail) }}" width="60px" height="60px" style="border: 1px solid #ECECEC; margin-left: 5px;" title="{{$item->name}}">
                        </div>
                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Name">
                        {{$item->name}}
                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Quantity">
                        {{$item->quantity}}
                    </td>
                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Price/Item">
                        {{ config('app.currency') }} {{$item->item_price}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
    <script>
    </script>
@endsection