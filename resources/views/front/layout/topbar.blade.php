<?php
    $cart = Session::has('cart') ? Session::get('cart') : null;
    $cart_num = ($cart) ? $cart->total_items : 0;
?>
<div class="top-bar">
    <div class="container">
        <nav>
            <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
                <li class="menu-item animate-dropdown"><a title="Welcome to Worldwide Electronics Store" href="#">{{config('app.slogan')}}</a></li>
            </ul>
        </nav>

        <nav>
            <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                @if($cart_num > 0)
                <li class="menu-item animate-dropdown">
                    <a title="Checkout" href="/checkout"><i class="ec ec-shopping-bag"></i>Checkout</a>
                </li>
                @endif
                <li class="menu-item animate-dropdown">
                    <a title="Track Your Order" href="/track-order"><i class="ec ec-transport"></i>Track Your Order</a>
                </li>
                @if(\Auth::guard('web')->check())
                <li class="menu-item animate-dropdown">
                    <a title="My Account" href="/account"><i class="ec ec-user"></i>{{\Auth::user()->name}}'s Account</a>
                </li>
                <li class="menu-item animate-dropdown">
                    <a title="Logout" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <i class="ec ec-user"></i> {{ __('Logout') }}</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                </li>
                @else
                <li class="menu-item animate-dropdown">
                    <a title="Login" href="/login"><i class="ec ec-user"></i>Login</a>
                </li>
                <li class="menu-item animate-dropdown">
                    <a title="Register" href="/register"><i class="ec ec-user"></i>Register</a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>