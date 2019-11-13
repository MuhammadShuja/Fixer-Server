@extends('front.master')
@section('title')
    <title>Terms & Conditions ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="{{config('app.meta_keywords')}}">
    <meta name="description" content="{{config('app.meta_description')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body')
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.support.terms.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            @include('front.support.terms.components.terms')
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