<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">
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
                                        @if($product->stock() > 0)
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        @endif
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
                                        @if($product->stock() > 0)
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        @endif
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
                                        @if($product->stock() > 0)
                                            <a rel="nofollow" href="/products/{{$product->slug}}" class="button add_to_cart_button">Add to cart</a>
                                        @endif
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
                        <span>Sorry, no product found in <strong>{{$catalog_name}}</strong></span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
        @if($products)
            <ul class="products columns-3">
                @foreach($products as $product)
                    <li class="product list-view">
                        <div class="media">
                            <div class="media-left">
                                <a href="/products/{{$product->slug}}">
                                    <img class="wp-post-image" data-echo="{{$product->cover()}}" src="{{$product->cover()}}" alt="{{$product->name}}">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <span class="loop-product-categories">
                                            @if($product->category)
                                                <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
                                            @endif
                                        </span><a href="/products/{{$product->slug}}"><h3>{{$product->name}}</h3>
                                            <!-- <div class="product-rating">
                                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                            </div> -->
                                            <div class="product-short-description">
                                                <ul style="padding-left: 18px;">
                                                    {!!$product->specs!!}
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xs-12">

                                        @if($product->stock() > 0)
                                            <div class="availability in-stock">Availablity: <span>In stock</span></div>
                                        @else
                                            <div class="availability out-of-stock">Availablity: <span>Out of stock</span></div>
                                        @endif

                                        <span class="price">
                                            <span class="electro-price">
                                                @if($product->special_price)
                                                    <span class="amount">{{ config('app.currency') }}{{$product->special_price}}</span>
                                                @else
                                                    <span class="amount">{{ config('app.currency') }}{{$product->price}}</span>
                                                @endif
                                            </span>
                                        </span>
                                        @if($product->stock() > 0)
                                            <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" href="/products/{{$product->slug}}" rel="nofollow">Add to cart</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div  style="font-size: 18px; padding: 40px;">
                        <span>Sorry, no product found in <strong>{{$catalog->name}}</strong></span>
                    </div>
                </div>
            </div>
        @endif
    </div>