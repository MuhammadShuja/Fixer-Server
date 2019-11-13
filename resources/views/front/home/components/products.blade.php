<?php
    $products = \App\Models\Product::active();
?>
<section class="">
    <header>
        <h2 class="h1">Just for You</h2>
    </header>
    <div class="home-v1-deals-and-tabs deals-and-tabs row animate-in-view fadeIn animated" data-animation="fadeIn">
        <div class="tabs-block col-lg-12">
            <div class="products-carousel-tabs">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-products-1" role="tabpanel">
                        <div class="woocommerce columns-4">
                            @if($products)
                                <ul class="products columns-4">
                                    @foreach($products as $k => $product)
                                        @if($k % 4 == 0)
                                            <li class="product first">
                                                <div class="product-outer">
                                                    <div class="product-inner">
                                                        <span class="loop-product-categories">
                                                            @if($product->category)
                                                                <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                                            @endif
                                                        </span>
                                                        <a href="/products/{{$product->slug}}">
                                                            <h3>{{$product->name}}</h3>
                                                            <div class="product-thumbnail">
                                                                <img class="placeholder" src="{{$product->cover()}}" class="img-responsive" alt="{{$product->name}}">
                                                                
                                                            </div>
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
                                                    </div><!-- /.product-inner -->
                                                </div><!-- /.product-outer -->
                                            </li>
                                        @elseif($k % 4 == 3)
                                            <li class="product last">
                                                <div class="product-outer">
                                                    <div class="product-inner">
                                                        <span class="loop-product-categories">
                                                            @if($product->category)
                                                                <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                                            @endif
                                                        </span>
                                                        <a href="/products/{{$product->slug}}">
                                                            <h3>{{$product->name}}</h3>
                                                            <div class="product-thumbnail">
                                                                <img class="placeholder" src="{{$product->cover()}}" class="img-responsive" alt="">
                                                                
                                                            </div>
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
                                                    </div><!-- /.product-inner -->
                                                </div><!-- /.product-outer -->
                                            </li>
                                        @else
                                            <li class="product ">
                                                <div class="product-outer">
                                                    <div class="product-inner">
                                                        <span class="loop-product-categories">
                                                            @if($product->category)
                                                                <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                                            @endif
                                                        </span>
                                                        <a href="/products/{{$product->slug}}">
                                                            <h3>{{$product->name}}</h3>
                                                            <div class="product-thumbnail">
                                                                <img class="placeholder" src="{{$product->cover()}}" class="img-responsive" alt="">
                                                                
                                                            </div>
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
                                                    </div><!-- /.product-inner -->
                                                </div><!-- /.product-outer -->
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div  style="font-size: 18px; padding: 40px;">
                                            <span>Sorry, no product found.</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.tabs-block -->
    </div><!-- /.deals-and-tabs -->
</section>