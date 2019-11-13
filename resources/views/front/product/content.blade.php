@extends('front.master')
@section('title')
    <title>{{$product->name}} ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    @if($product->meta_keywords)
    <meta name="keywords" content="{{$product->meta_keywords}}" />
    @else
    <meta name="keywords" content="{{$product->name}}" />
    @endif
    @if($product->meta_description)
    <meta name="description" content="{{$product->meta_description}}" />
    @else
    <meta name="description" content="{{$product->name}}" />
    @endif

    <!-- Open Graph Metadata -->

    <meta property="og:type" content="product">

    @if($product->category)

    <meta property="og:title" content="{{$product->name}} &amp; {{$product->category->name}} on {{config('app.url')}}">
    <meta property="og:description" content="{{$product->category->name}}, {{$product->name}}">
    @else
    <meta property="og:title" content="{{$product->name}} on {{config('app.url')}}">
    <meta property="og:description" content="{{$product->name}}">
    @endif

    <meta property="og:url" content="{{config('app.url')}}/products/{{$product->slug}}">

    <meta property="og:image" content="{{$product->thumbnail()}}">

    @if($product->brand)
    <meta property="product:brand" content="{{$product->brand->name}}">
    @endif

    <meta property="product:availability" content="in stock">

    <meta property="product:condition" content="new">

    @if($product->sale_price)
        <meta property="product:price:amount" content="{{$product->sale_price}}">
    @else
        <meta property="product:price:amount" content="{{$product->list_price}}">
    @endif

    <meta property="product:price:currency" content="{{ config('app.currency') }}">

    <meta property="product:retailer_item_id" content="{{$product->id}}">

    <!-- End Open Graph Metadata -->

    <!-- BEGIN SCHEMA -->
    <script type="application/ld+json">
    {

        "@context":"https://schema.org",

        "@type":"Product",

        "productID":"{{$product->id}}",

        "name":"{{$product->name}}",

        @if($product->category)
        "description":"{{$product->category->name.', '.$product->name}}",
        @endif

        "url":"{{config('app.url')}}/products/{{$product->slug}}",

        "image": "{{$product->thumbnail()}}",

        @if($product->brand)
        "brand":"{{$product->brand->name}}",
        @endif


        "offers":[

            {

                "@type":"Offer",

                @if($product->sale_price)
                "price":"{{$product->sale_price}}",
                @else
                "price":"{{$product->list_price}}",
                @endif

                "priceCurrency":"{{ config('app.currency') }}",

                "itemCondition":"https://schema.org/NewCondition",

                "availability":"https://schema.org/InStock"

            }

        ]

    }
    </script>
    <!-- END SCHEMA -->
@endsection
@section('body')
    <body class="single-product full-width">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.product.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            @if($alert == 'add')
                                <div class="woocommerce-message">
                                    <a href="/cart" class="button wc-forward">View cart</a>
                                    Item has been added to your cart successfully!
                                </div>
                            @endif
                            <div class="product">
                                <div class="single-product-wrapper">

                                    @include('front.product.components.images')

                                    <div class="summary entry-summary">

                                        @include('front.product.components.summary')

                                        @if($product->stock() > 0)
                                            @include('front.product.components.actions')
                                        @endif

                                    </div>

                                </div>
                            </div>

                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #content -->

            @include('front.layout.footer')

        </div><!-- #page -->
@endsection