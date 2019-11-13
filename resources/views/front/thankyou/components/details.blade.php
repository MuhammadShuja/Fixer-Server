<div class="type-page hentry">
    <header class="entry-header">
        <div class="page-header-caption">
            <h1 class="entry-title">Order received</h1>
        </div>
    </header><!-- .entry-header -->
</div>
<div class="entry-content">
    <div class="woocommerce">
        <div class="woocommerce-order">
            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>
            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                <li class="woocommerce-order-overview__order order">
                    Order number: <strong>{{$order->reference}}</strong>
                </li>
                <li class="woocommerce-order-overview__date date">
                    Date: <strong>{{ $order->created_at }}</strong>
                </li>
                <li class="woocommerce-order-overview__email email">
                    Total Items: <strong>{{ $order->total_items }}</strong>
                </li>
                <li class="woocommerce-order-overview__total total">
                    Total: <strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $order->total_price }}</span></strong>
                </li>
                <li class="woocommerce-order-overview__payment-method method">
                    Payment method: <strong>Cash On Delivery</strong>
                </li>
            </ul>
            <section class="woocommerce-order-details">
                <h2 class="woocommerce-order-details__title">Order details</h2>
                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                    <thead>
                        <tr>
                            <th class="woocommerce-table__product-name product-name">Product</th>
                            <th class="woocommerce-table__product-table product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr class="woocommerce-table__line-item order_item">
                                <td class="woocommerce-table__product-name product-name">
                                    <a href="javascript:;">{{ $item->name }}</a> <strong class="product-quantity">&times; {{ $item->quantity }}</strong>
                                </td>
                                <td class="woocommerce-table__product-total product-total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $item->total_price }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">Subtotal:</th>
                            <td>
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $order->sub_total_price}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Shipping:</th>
                            <td>
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $order->shipping_cost }}</span>&nbsp;<small class="shipped_via">via Normal Delivery</small>
                            </td>
                        </tr>
                        @if($order->extra_cost)
                        <tr>
                            <th scope="row">Handling:</th>
                            <td>
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $order->extra_cost }}</span>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th scope="row">Payment method:</th>
                            <td>Cash On Delivery</td>
                        </tr>
                        <tr>
                            <th scope="row">Total:</th>
                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('app.currency') }} </span>{{ $order->total_price }}</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </section>
            <section class="woocommerce-customer-details">
                <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                    <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                        <h2 class="woocommerce-column__title">Shipping address</h2>
                        <address>
                            {{ $order->address->first_name }}
                            <br/>
                            {{ $order->address->address }}
                            <br/>
                            {{ $order->address->city.', '.$order->address->country }}
                            <p class="woocommerce-customer-details--phone">{{ $order->address->phone }}</p>
                        </address>
                    </div><!-- /.col-1 -->
                </section><!-- /.col2-set -->
            </section>
        </div>
        <div class="cart-wrapper">
            <div class="col-full text-center">
                <a class="btn btn-primary wc-forward" href="/" style="color: white;">Continue Shopping</a>
            </div>
        </div>
    </div>
</div>