@if($product->brand)
    <span class="loop-product-categories">
        <a href="/brands/{{$product->brand->slug}}" rel="tag">{{$product->brand->name}}</a>
    </span><!-- /.loop-product-categories -->
@endif

@if($product->category)
    <span class="loop-product-categories">
        @if($product->category)
            <a href="/categories/{{$product->category->slug}}" rel="tag">{{$product->category->name}}</a>
        @endif
    </span>
@endif

<h1 itemprop="name" class="product_title entry-title">{{$product->name}}</h1>

@if($product->stock() > 0)
    <div class="availability in-stock">Availablity: <span>{{$product->variants->first()->quantity}} In stock</span></div>
@else
    <div class="availability out-of-stock">Availablity: <span>Out of stock</span></div>
@endif
<!-- .availability -->

<hr class="single-product-title-divider" />

@if($product->specs)
    <div itemprop="description">
        {!!$product->specs!!}
    </div><!-- .description -->
@endif

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

    <span class="price">
        <span class="electro-price">{{ config('app.currency') }}
            @if($product->special_price)
                <ins><span class="amount">{{$product->special_price}}</span></ins>
                <del><span class="amount">{{$product->price}}</span></del>
                <span class="amount"> </span>
            @else
                <ins><span class="amount">{{$product->price}}</span></ins>
                <span class="amount"> </span>
            @endif
        </span>
    </span>

    @if($product->special_price)
        <meta itemprop="price" content="{{$product->special_price}}" />
    @else
        <meta itemprop="price" content="{{$product->price}}" />
    @endif
    <meta itemprop="priceCurrency" content="{{ config('app.currency') }}" />
    <link itemprop="availability" href="http://schema.org/InStock" />

</div><!-- /itemprop -->