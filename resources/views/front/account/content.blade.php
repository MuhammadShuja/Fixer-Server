@extends('front.master')
@section('title')
    <title>{{$title}} ~ {{config('app.url')}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="mobile, covers, protection, phone covers, stylish mobile covers">
    <meta name="description" content="Buy branded mobile phone covers/cases and protection in Pakistan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body')
    <style>
        .woocommerce-account .woocommerce-MyAccount-navigation {
            position: relative;
            float: left;
            min-height: 1px;
            padding-left: .9375rem;
            padding-right: .9375rem;
            width: 100%
        }

        @media (min-width:768px) {
            .woocommerce-account .woocommerce-MyAccount-navigation {
                width: 25%
            }
        }

        .woocommerce-account .woocommerce-MyAccount-content {
            position: relative;
            float: left;
            min-height: 1px;
            padding-left: .9375rem;
            padding-right: .9375rem;
            width: 100%
        }

        @media (min-width:768px) {
            .woocommerce-account .woocommerce-MyAccount-content {
                width: 75%
            }
        }

        .woocommerce-MyAccount-navigation ul {
            margin-left: 0;
            border-top: 1px solid #eceeef;
            padding-left: 0
        }

        .woocommerce-MyAccount-navigation ul li {
            list-style: none;
            border-bottom: 1px solid #eceeef;
            position: relative
        }

        .woocommerce-MyAccount-navigation ul li.is-active a {
            font-weight: 700
        }

        .woocommerce-MyAccount-navigation ul li.is-active a:before {
            opacity: 1
        }

        .woocommerce-MyAccount-navigation ul li a {
            padding: .857em 0;
            display: block;
            color: #333e48
        }

        .woocommerce-MyAccount-navigation ul li a:before {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 1;
            vertical-align: -.125em;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            line-height: 1.618;
            margin-left: .53em;
            width: 1.387em;
            text-align: right;
            float: right;
            opacity: .25
        }

        .woocommerce-MyAccount-navigation ul li a:hover:before {
            opacity: 1
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--dashboard a:before {
            content: "\f0e4"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--orders a:before {
            content: "\f291"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--downloads a:before {
            content: "\f1c6"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--edit-address a:before {
            content: "\f015"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--payment-methods a:before {
            content: "\f09d"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--edit-account a:before {
            content: "\f007"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--customer-logout a:before {
            content: "\f2f5"
        }

        .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--subscriptions a:before {
            content: "\f021"
        }

        .my_account_orders .button,
        .woocommerce-MyAccount-downloads .button {
            padding: .618em .857em;
            font-size: .857em;
            margin-right: .236em
        }

        .my_account_orders .button.view:after {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 1;
            vertical-align: -.125em;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            content: "\f06e";
            margin-left: .53em
        }

        p.order-again .button:after {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 1;
            vertical-align: -.125em;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            content: "\f021";
            margin-left: .53em
        }

        .woocommerce-MyAccount-downloads td,
        .woocommerce-MyAccount-downloads th {
            vertical-align: middle
        }

        .woocommerce-MyAccount-downloads .button:after {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 1;
            vertical-align: -.125em;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            content: "\f381";
            margin-left: .53em
        }

        .woocommerce-MyAccount-content h2 {
            font-size: 2em;
            font-weight: 600
        }

        .woocommerce-MyAccount-content #payment .payment_methods {
            margin-bottom: 1.618em!important
        }

        .woocommerce-MyAccount-content #payment .payment_methods li .payment_box {
            background-color: rgba(0, 0, 0, .05)
        }

        .account-content{
            background-color: #F5F5F5;
            padding: 20px;
            border-radius: 3px;
        }
        .content-title{
            display: block;
            font-size: 22px;
        }
        .acc-action{
            text-decoration: none;
            font-size: 16px;
            color: #0071F0;
            border-left: 1px solid #C9C9C9;
            margin-left: 5px;
            padding-left: 10px;
            text-transform: uppercase;
        }
        .acc-empty{
            position: absolute;
            width: 100%;
            top: 50%;
            text-align: center;
        }
        .acc-card{
            padding-top: 10px;
        }
        @media (min-width: 576px) {
            .card-separator {
                border-left: none;
            }
            .account-content{
                height: 250px;
                min-height: 250px;
            }
            .account-content.long{
                height: 500px;
                min-height: 500px;
            }
        }

        @media (min-width: 768px) {
            .card-separator {
                border-left: 1px solid #C9C9C9;
            }
            .account-content,
            .account-content.long{
                height: 250px;
                min-height: 250px;
            }
        }

        @media (min-width: 992px) {
            .card-separator {
                border-left: 1px solid #C9C9C9;
            }
            .account-content,
            .account-content.long{
                height: 250px;
                min-height: 250px;
            }
        }

        @media (min-width: 1200px) {
            .card-separator {
                border-left: 1px solid #C9C9C9;
            }
            .account-content,
            .account-content.long{
                height: 250px;
                min-height: 250px;
            }        
        }
        .acc-card-header{
            color: #B9B9B9;
            font-size: 16px;
            text-transform: uppercase;
        }
        .acc-card-title{
            font-size: 18px;
            display: block;
            padding: 5px 0px;
        }
        .acc-card-info{
            font-size: 14px;
            display: block;
        }
        .order-items{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
    </style>
    <body class="page home page-template-default woocommerce-account">
        <div id="page" class="hfeed site">

            @include('front.layout.topbar')

            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    @include('front.account.components.breadcrumbs')
                    <div class="site-content-inner">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <article class="page type-page status-publish hentry">
                                    <header class="entry-header">
                                        <h1 class="entry-title">{{$title}}</h1>
                                    </header>
                                    <!-- .entry-header -->
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            @include('front.account.components.nav')
                                            @switch($content)
                                                @case('dashboard')
                                                    @include('front.account.components.dashboard')
                                                @break
                                                @case('profile')
                                                    @include('front.account.components.profile')
                                                @break
                                                @case('orders')
                                                    @include('front.account.components.orders')
                                                @break
                                                @case('order-single')
                                                    @include('front.account.components.order-single')
                                                @break
                                                @default
                                                    @include('front.account.components.dashboard')
                                            @endswitch
                                        </div>
                                    </div>
                                </article>
                            </main><!-- #main -->
                        </div><!-- #primary -->
                    </div><!-- #site-content-inner -->

                </div><!-- .container -->
            </div><!-- #content -->

        </div><!-- #page -->
@endsection
@section('scripts')
    <script>
    </script>
@endsection