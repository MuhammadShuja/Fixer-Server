@extends('front.master')
@section('title')
    <title>Cart ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="{{config('app.meta_keywords')}}">
    <meta name="description" content="{{config('app.meta_description')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body')
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.cart.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            @include('front.cart.components.items')
                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #content -->

            @include('front.layout.footer')

        </div><!-- #page -->
@endsection
@section('scripts')
    <script>
        function increaseQuantity(e, item){
            showMessage('Item quantity has been updated successfully!');
        }

        function decreaseQuantity(e, item){
            showMessage('Item quantity has been updated successfully!');
        }

        function removeItem(e, item){
            jQuery.ajax({
                type: "POST",
                url: "/cart/remove",
                data: {
                    _token : jQuery('meta[name="csrf-token"]').attr('content'),
                    id: item
                },
                success: function(result){
                    var cart = result.cart;
                    jQuery('.cart-subtotal .amount').text(cart.subtotal);
                    jQuery('.shipping .amount').text(cart.shipping);
                    jQuery('.extra-cost .amount').text(cart.extra);
                    jQuery('.order-total .amount').text(cart.total);

                    jQuery('.cart-items-count').text(cart.items);
                    jQuery('.cart-items-total-price .amount').text(cart.subtotal);

                    jQuery(e).parents('tr').remove();
                    showMessage('Item has been removed from your cart successfully!');
                    if(jQuery('table.cart').find('.cart_item').length < 1){
                        window.location.reload(false);
                    }
                },
                error: function(result){
                    console.log('Error!', 'Error in request!', 'error');
                }
            });
        }

        function increaseQuantity(e, item){
            jQuery.ajax({
                type: "POST",
                url: "/cart/increase",
                data: {
                    _token : jQuery('meta[name="csrf-token"]').attr('content'),
                    id: item
                },
                success: function(result){
                    var cart = result.cart;
                    jQuery('#item_'+item).find('.cart-item-quantity').text(cart.item_quantity);
                    jQuery('#item_'+item).find('.product-subtotal .amount').text(cart.item_subtotal);
                    jQuery('.cart-subtotal .amount').text(cart.subtotal);
                    jQuery('.shipping .amount').text(cart.shipping);
                    jQuery('.extra-cost .amount').text(cart.extra);
                    jQuery('.order-total .amount').text(cart.total);

                    jQuery('.cart-items-count').text(cart.items);
                    jQuery('.cart-items-total-price .amount').text(cart.subtotal);

                    showMessage('Item quantity has been updated successfully!');
                },
                error: function(result){
                    console.log('Error!', 'Error in request!', 'error');
                }
            });
        }

        function decreaseQuantity(e, item){
            jQuery.ajax({
                type: "POST",
                url: "/cart/decrease",
                data: {
                    _token : jQuery('meta[name="csrf-token"]').attr('content'),
                    id: item
                },
                success: function(result){
                    var cart = result.cart;
                    jQuery('#item_'+item).find('.cart-item-quantity').text(cart.item_quantity);
                    jQuery('#item_'+item).find('.product-subtotal .amount').text(cart.item_subtotal);
                    jQuery('.cart-subtotal .amount').text(cart.subtotal);
                    jQuery('.shipping .amount').text(cart.shipping);
                    jQuery('.extra-cost .amount').text(cart.extra);
                    jQuery('.order-total .amount').text(cart.total);

                    jQuery('.cart-items-count').text(cart.items);
                    jQuery('.cart-items-total-price .amount').text(cart.subtotal);

                    showMessage('Item quantity has been updated successfully!');
                },
                error: function(result){
                    console.log('Error!', 'Error in request!', 'error');
                }
            });
        }
    </script>
@endsection