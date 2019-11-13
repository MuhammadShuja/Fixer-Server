@extends('front.master')
@if($catalog)
    @section('title')
        <title>{{$catalog->name}} ~ {{config('app.url')}}</title>
    @endsection
    @section('meta')
        @if($catalog->meta_keywords)
        <meta name="keywords" content="{{$catalog->meta_keywords}}" />
        @else
        <meta name="keywords" content="{{$catalog->name}}" />
        @endif
        @if($catalog->meta_description)
        <meta name="description" content="{{$catalog->meta_description}}" />
        @else
        <meta name="description" content="{{$catalog->name}}" />
        @endif
    @endsection
@else
    @section('title')
        <title>{{$catalog_name}} ~ {{config('app.url')}}</title>
    @endsection
    @section('meta')
        <meta name="keywords" content="{{$catalog_name}}" />
        <meta name="description" content="{{$catalog_name}}" />
    @endsection
@endif
@section('body')
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            @include('front.layout.header-3')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.catalog.components.breadcrumbs')

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            @include('front.catalog.components.section-header')

                            <!-- @include('front.catalog.components.filters') -->

                            @include('front.catalog.components.control-bar')

                            @include('front.catalog.components.products')

                            @include('front.catalog.components.control-bar-bottom')

                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .container -->
            </div><!-- #content -->

            @include('front.layout.footer')

        </div><!-- #page -->
@endsection