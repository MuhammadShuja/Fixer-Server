<style>
    .hide{
        display: none;
    }
    .btn-primary{
        color: white;
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
    .error-class{
        color: red;
    }
    .address-book, .order-summary{
        background-color: rgb(249,249,249);
        padding: 30px;
        border-radius: 25px;
    }
    .address-book, .btn-address{
        margin-bottom: 20px;
    }
    .address-book .title{
        font-size: 14px;
    }
    .address-book .title,
    .address-book .address .name,
    .address-book .address .phone,
    .address-book .address .address,
    .address-book .address .city{
        display: block;
        color: black;
    }
    .address-book .address .name{
        font-size: 16px;
        font-weight: 600;
    }
</style>
<article class="page type-page status-publish hentry">
    <form action="/checkout" class="checkout woocommerce-checkout" method="post">
        {{csrf_field()}}
        @if($default)
        <input type="hidden" name="default" value="{{$default->id}}">
        @else
        <input type="hidden" name="default" value="">
        @endif
        <div class="row">
            <div class="col-md-8">                
                <div class="woocommerce-billing-fields">
                    <h3>Shipping Details</h3>
                    @if($default)
                    <div class="address-book">
                        <div class="title pings-title">
                            <span class="">Default shipping address</span>
                        </div>
                        <div class="address">
                            <span class="name">{{$default->first_name}}</span>
                            <span class="phone">{{$default->phone}}</span>
                            <span class="address">{{$default->address}}</span>
                            <span class="city">{{$default->city.', '.$default->country}}</span>
                        </div>
                    </div>
                    <div class="row" id="controlNewAddress">
                        <div class="col-md-offset-4 col-md-4">
                            <a class="btn btn-primary btn-block btn-address" href="javascript:;" onclick="newAddress(this)">User different address</a>
                        </div>
                    </div>
                    <div class="row hide" id="controlDefaultAddress">
                        <div class="col-md-offset-4 col-md-4">
                            <a class="btn btn-primary btn-block btn-address" href="javascript:;" onclick="defaultAddress(this, {{$default->id}})">User default address</a>
                        </div>
                    </div>
                    @endif
                    <div class="new-address
                    @if($default)
                     hide
                    @endif
                    ">
                        <p class="form-row form-row-first validate-required">
                            <label>Name <abbr title="required" class="required">*</abbr></label>
                            <input type="text" value="{{ old('name') }}" placeholder="" name="name" class="input-text " autofocus>
                            @if($errors->has('name'))
                                <span class="error-class">{{ $errors->first('name') }}</span>
                            @endif
                        </p>

                        <p class="form-row form-row-last validate-required">
                            <label>Phone <abbr title="required" class="required">*</abbr></label>
                            <input type="tell" value="" placeholder="{{ old('phone') }}" name="phone" class="input-text ">
                            @if($errors->has('phone'))
                                <span class="error-class">{{ $errors->first('phone') }}</span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide address-field validate-required">
                            <label>Address <abbr title="required" class="required">*</abbr></label>
                            <input type="text" value="{{ old('address') }}" placeholder="Street address" name="address" class="input-text ">
                            @if($errors->has('address'))
                                <span class="error-class">{{ $errors->first('address') }}</span>
                            @endif
                        </p>

                        <p class="form-row form-row-first address-field validate-required">
                            <label>Town / City <abbr title="required" class="required">*</abbr></label>
                            <input type="text" value="{{ old('city') }}" placeholder="" name="city" class="input-text ">
                            @if($errors->has('city'))
                                <span class="error-class">{{ $errors->first('city') }}</span>
                            @endif
                        </p>

                        <p class="form-row form-row-last validate-required validate-email">
                            <label>State / County <abbr title="required" class="required">*</abbr></label>
                            <input type="text" value="{{ old('country') }}" placeholder="" name="country" class="input-text ">
                            @if($errors->has('country'))
                                <span class="error-class">{{ $errors->first('country') }}</span>
                            @endif
                        </p>

                        <p class="form-row notes">
                            <label>Order Notes</label>
                            <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." class="input-text " name="notes">{{ old('notes') }}</textarea>
                        </p>
                    </div>
                </div>
                <table class="shop_table shop_table_responsive cart" style="border: 1px solid rgb(249,249,249);">
                    <thead style="background-color: rgb(249,249,249);">
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
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
                                    <span class="cart-item-quantity">{{$item->quantity}}</span>
                                </td>
                                <td data-title="Total" class="product-subtotal">
                                    <span class="amount">{{ config('app.currency') }} {{$item->sub_total_price}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 order-summary">
                <h3>Order Summary</h3>
                <div>
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
                            <input type="submit" data-value="Place order" value="Place order" class="button btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </form>
</article>