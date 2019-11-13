<?php
    $cart = Session::has('cart') ? Session::get('cart') : null;
?>
<ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
    <li class="nav-item dropdown">
        <a href="/cart" class="nav-link">
            <i class="ec ec-shopping-bag"></i>
            @if($cart)
                <span class="cart-items-count count">{{$cart->total_items}}</span>
                <span class="cart-items-total-price total-price">{{ config('app.currency') }}&nbsp;<span class="amount">{{$cart->sub_total_price}}</span></span>
            @else
                <span class="cart-items-count count">0</span>
            @endif
        </a>
    </li>
</ul>
