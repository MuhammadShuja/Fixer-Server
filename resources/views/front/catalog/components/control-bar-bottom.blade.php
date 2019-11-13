<div class="shop-control-bar-bottom">
    <p class="woocommerce-result-count">
        Showing {{($products->currentpage()-1)*$products->perpage()+1}}&ndash;{{$products->currentpage()*$products->perpage()}} of {{$products->total()}} results
    </p>
    <nav class="woocommerce-pagination">
        {!! $products -> render("pagination::custom") !!}
    </nav>
</div>