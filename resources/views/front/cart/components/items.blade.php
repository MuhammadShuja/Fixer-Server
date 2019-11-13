<style>
    .btn{
        color: white;
    }
    .cart_totals{
        background-color: rgb(249, 249, 249);
        padding: 10px;
    }
    .cart-modify{
        background-color: #F5F5F5;
        text-decoration: none;
        border-radius: 50%;
        padding: 5px 10px;
        color: #000000;
    }
    .cart-modify i{
        color: grey;
    }
    .cart-item-quantity{
        font-size: 1.214em;
        line-height: 1.147em;
        padding: 0px 5px;
    }
    table th, table td{
        border: 0px;
    }
    .order-summary table th{
        font-weight: 500;
        text-align: left;
    }
    .order-summary table td{
        text-align: right;
    }
    tr.order-total{
        border-top: 1px solid rgb(190, 190, 190);
        border-bottom: 1px solid rgb(190, 190, 190);
    }
</style>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<article class="page type-page status-publish hentry">
            @if($cart && (count($cart->items) > 0) )
            <div class="row">
                <div class="col-md-8">
        			<form>
                        <table class="shop_table shop_table_responsive cart">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $key => $item)
                                    <tr class="cart_item" id="item_{{$item->id}}">
                                        <td class="product-thumbnail">
                                            <a href="/products/{{$item->slug}}"><img width="180" height="180" src="{{$item->thumbnail}}" alt=""></a>
                                        </td>
                                        <td data-title="Product" class="product-name">
                                            <a href="/products/{{$item->slug}}">{{$item->name}}</a>
                                        </td>
                                        <td data-title="Price" class="product-price">
                                            {{ config('app.currency') }}&nbsp;<span class="amount">{{$item->item_price}}</span>
                                        </td>
                                        <td data-title="Quantity" class="product-quantity">
                                            <div class="quantity buttons_added">        
                                                <label>Quantity:</label>
                                                <a class="cart-modify" href="javascript:;" onclick="decreaseQuantity(this, {{$item->id}})"><i class="fa fa-xs fa-minus"></i></a>
                                                <span class="cart-item-quantity"> 
                                                    {{$item->quantity}}
                                                </span>
                                                <a class="cart-modify" href="javascript:;" onclick="increaseQuantity(this, {{$item->id}})"><i class="fa fa-sm fa-plus"></i></a>
                                            </div>
                                        </td>
                                        <td data-title="Total" class="product-subtotal">
                                            <span class="amount">{{ config('app.currency') }} {{$item->sub_total_price}}</span>
                                        </td>
                                        <td class="product-remove">
                                            <a class="remove" href="javascript:;" onclick="removeItem(this, {{$item->id}})">×</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="col-md-4 woocommerce-checkout" style="background-color: rgb(249,249,249); padding: 30px;">
                    <h3>Cart Totals</h3>
                    <div class="order-summary">
                        <table class="shop_table">
                            <tbody>
                                <tr class="subtotal">
                                    <th>Subtotal</th>
                                    <td><strong>{{ config('app.currency') }}&nbsp;<span class="amount">{{$cart->sub_total_price}}</span></strong></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Shipping</th>
                                    <td><strong>{{ config('app.currency') }}&nbsp;<span class="amount">{{$cart->shipping_cost}}</span></strong></td>
                                </tr>
                                @if($cart->extra_cost)
                                    <tr class="extra-cost">
                                        <th>Handling</th>
                                        <td><string>{{ config('app.currency') }}&nbsp;<span class="amount">{{$cart->extra_cost}}</span></string></td>
                                    </tr>
                                @endif
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong>{{ config('app.currency') }}&nbsp;<span class="amount">{{$cart->total_price}}</span></strong> </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="woocommerce-checkout-payment">
                            <div class="form-row place-order">
                                <a href="/checkout" class="btn btn-primary btn-block wc-forward">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <h3>Sorry, there is currently no item in your cart.</h3>
                        <a class="btn btn-primary" href="/" style="color: #FFFFFF;">Continue Shopping <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            @endif
		</article>
	</main><!-- #main -->
</div><!-- #primary -->