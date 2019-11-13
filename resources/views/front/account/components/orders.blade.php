<?php $user = auth('web')->user(); ?>
<div class="woocommerce-MyAccount-content">
    @if(count($user->orders) < 1)
        <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
            <a class="woocommerce-Button button" href="/">
                Go shop
            </a>
            No order has been made yet.
        </div>
    @else
        <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table" style="background-color: #F5F5F5;">
            <thead>
                <tr>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                        <span class="nobr">Order</span>
                    </th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                        <span class="nobr">Status</span>
                    </th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                        <span class="nobr">Date Placed</span>
                    </th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                        <span class="nobr">Items</span>
                    </th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                        <span class="nobr">Total</span>
                    </th>
                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                        <span class="nobr">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->orders as $order)
                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                            <a href="javascript:;">
                                {{'#'.$order->reference}}
                            </a>
                        </td>
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                            {{$order->status->label}}
                        </td>
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                            <time datetime="2018-12-31T21:23:57+00:00">{{date('d/m/Y', strtotime($order->created_at))}}</time>
                        </td>
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Items">
                            <div class="order-items">
                                @foreach($order->items as $item)
                                    <img src="{{ URL::asset($item->thumbnail) }}" width="60px" height="60px" style="border: 1px solid #ECECEC; margin-left: 5px;" title="{{$item->name}}">
                                @endforeach
                            </div>
                        </td>
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">
                                    {{ config('app.currency') }}
                                </span>{{$order->total_price}}
                            </span> for {{count($order->items)}} item(s)
                        </td>
                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Action">
                            <a href="/account/orders/{{$order->reference}}" class="acc-action" style="border-left: none; font-size: 0.8rem;">Manage</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>