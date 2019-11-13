@extends('front.master')
@section('title')
    <title>Login ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="mobile, covers, protection, phone covers, stylish mobile covers">
    <meta name="description" content="Buy branded mobile phone covers/cases and protection in Pakistan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body')
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.auth.login.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="woocommerce-error">
                                <a href="/register" class="button wc-forward">Register Account</a>
                                <a href="/register">New at {{config('app.name')}}? please create new account.</a>
                            </div>
                            @include('front.auth.login.components.form')
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