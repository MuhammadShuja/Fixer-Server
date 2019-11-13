@extends('front.master')
@section('title')
    <title>Register ~ {{config('app.url')}}</title>
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

                    @include('front.auth.register.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="woocommerce-error">
                                <a href="/login" class="button wc-forward">Login</a>
                                <a href="/login">Already a member? login to your account.</a>
                            </div>
                            @include('front.auth.register.components.form')
                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #content -->

            @include('front.layout.footer')

        </div><!-- #page -->
@endsection
@section('scripts')
    <script>
    </script>
@endsection