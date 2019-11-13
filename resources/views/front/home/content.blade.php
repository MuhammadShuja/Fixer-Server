@extends('front.master')
@section('title')
	<title>{{config('app.url')}}</title>
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
			        <div id="primary" class="content-area">
			            <main id="main" class="site-main">

			                @include('front.home.components.slider')

			                @include('front.home.components.ads')

			                @include('front.home.components.featured')

			                @include('front.home.components.popular')

			                @include('front.home.components.products')

			            </main><!-- #main -->
			        </div><!-- #primary -->

			    </div><!-- .container -->
			</div><!-- #content -->

	        @include('front.layout.footer')

	    </div><!-- #page -->
@endsection