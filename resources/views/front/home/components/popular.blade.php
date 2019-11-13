<?php
    $products = \App\Models\Product::popular(6);
?>
<section class="section-product-cards-carousel">
    <header>
        <h2 class="h1">Popular Products</h2>
    </header>

    <div id="home-v1-product-cards-careousel">
        <div class="woocommerce columns-3">
            <ul class="products columns-3">
                @foreach($products as $k => $product)
                    @if($k % 3 == 0)
                        <li class="product product-card first">
                            <div class="product-outer">
                                <div class="media product-inner">
                                    <a class="media-left" href="/products/{{$product->slug}}" title="{{$product->name}}">
                                        <img class="media-object wp-post-image img-responsive" src="{{$product->thumbnail()}}" data-echo="{{$product->thumbnail()}}" alt="{{$product->name}}">
                                    </a>
                                    <div class="media-body">
                                        @if($product->category)
                                            <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                        @endif
                                        <a href="{{$product->name}}">
                                            <h3>{{$product->name}}</h3>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">{{ config('app.currency') }}
                                                    @if($product->special_price)
                                                        <ins><span class="amount">{{$product->special_price}}</span></ins>
                                                        <del><span class="amount">{{$product->price}}</span></del>
                                                        <span class="amount"> </span>
                                                    @else
                                                        <ins><span class="amount"></span></ins>
                                                        <span class="amount">{{$product->price}}</span>
                                                    @endif
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                    </div>
                                </div><!-- /.product-inner -->
                            </div><!-- /.product-outer -->
                        </li><!-- /.products -->
                    @elseif($k % 3 == 1)
                        <li class="product product-card ">
                            <div class="product-outer">
                                <div class="media product-inner">
                                    <a class="media-left" href="/products/{{$product->slug}}" title="{{$product->name}}">
                                        <img class="media-object wp-post-image img-responsive" src="{{$product->thumbnail()}}" data-echo="{{$product->thumbnail()}}" alt="{{$product->name}}">
                                    </a>
                                    <div class="media-body">
                                        @if($product->category)
                                            <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                        @endif
                                        <a href="{{$product->name}}">
                                            <h3>{{$product->name}}</h3>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">{{ config('app.currency') }}
                                                    @if($product->special_price)
                                                        <ins><span class="amount">{{$product->special_price}}</span></ins>
                                                        <del><span class="amount">{{$product->price}}</span></del>
                                                        <span class="amount"> </span>
                                                    @else
                                                        <ins><span class="amount"></span></ins>
                                                        <span class="amount">{{$product->price}}</span>
                                                    @endif
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                    </div>
                                </div><!-- /.product-inner -->
                            </div><!-- /.product-outer -->
                        </li><!-- /.products -->
                    @else
                        <li class="product product-card last">
                            <div class="product-outer">
                                <div class="media product-inner">
                                    <a class="media-left" href="/products/{{$product->slug}}" title="{{$product->name}}">
                                        <img class="media-object wp-post-image img-responsive" src="{{$product->thumbnail()}}" data-echo="{{$product->thumbnail()}}" alt="{{$product->name}}">
                                    </a>
                                    <div class="media-body">
                                        @if($product->category)
                                            <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                        @endif
                                        <a href="{{$product->name}}">
                                            <h3>{{$product->name}}</h3>
                                        </a>
                                        <div class="price-add-to-cart">
                                            <span class="price">
                                                <span class="electro-price">{{ config('app.currency') }}
                                                    @if($product->special_price)
                                                        <ins><span class="amount">{{$product->special_price}}</span></ins>
                                                        <del><span class="amount">{{$product->price}}</span></del>
                                                        <span class="amount"> </span>
                                                    @else
                                                        <ins><span class="amount"></span></ins>
                                                        <span class="amount">{{$product->price}}</span>
                                                    @endif
                                                </span>
                                            </span>
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        </div><!-- /.price-add-to-cart -->
                                    </div>
                                </div><!-- /.product-inner -->
                            </div><!-- /.product-outer -->
                        </li><!-- /.products -->
                    @endif
                @endforeach
            </ul>
        </div>
    </div><!-- #home-v1-product-cards-careousel -->

</section>