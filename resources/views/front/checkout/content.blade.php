@extends('front.master')
@section('title')
    <title>Checkout ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="{{config('app.meta_keywords')}}">
    <meta name="description" content="{{config('app.meta_description')}}">
@endsection
@section('body')
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.checkout.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            @include('front.checkout.components.details')
                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #content -->

            @include('front.layout.footer')

        </div><!-- #page -->
@endsection
@section('scripts')
    <script>
        function newAddress(e){
            jQuery('input[name=default]').val('');
            jQuery('.new-address').removeClass('hide');
            jQuery('.address-book').addClass('hide');
            jQuery('#controlNewAddress').addClass('hide');
            jQuery('#controlDefaultAddress').removeClass('hide');
        }

        function defaultAddress(e, id){
            jQuery('input[name=default]').val(id);
            jQuery('.new-address').addClass('hide');
            jQuery('.address-book').removeClass('hide');
            jQuery('#controlNewAddress').removeClass('hide');
            jQuery('#controlDefaultAddress').addClass('hide');
        }
    </script>
@endsection