<nav class="woocommerce-MyAccount-navigation">
    <ul>
        <li class="woocommerce-MyAccount-navigation-link 
        @if(Request::segment(1) == 'account' & Request::segment(2) == '') is-active @endif
        ">
            <a href="/account">Dashboard</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link 
        @if(Request::segment(2) == 'profile') is-active @endif
        ">
            <a href="/account/profile">Profile</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link 
        @if(Request::segment(2) == 'orders') is-active @endif
        ">
            <a href="/account/orders">Orders</a>
        </li>
    </ul>
</nav>