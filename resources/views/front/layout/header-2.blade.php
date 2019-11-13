<?php
    $categories = \App\Models\Category::active();
    $brands = \App\Models\Brand::popular(5);
?>
<header id="masthead" class="site-header header-v2">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
            <div class="header-logo">
                <a href="/" class="header-logo-link">
                    <img src="{{ URL::asset('/storage/logo/logo_dark.png') }}" height="54px" style="max-height: 54px;">
                </a>
            </div>
            <!-- ============================================================= Header Logo : End============================================================= -->

            <div class="primary-nav animate-dropdown">
                <div class="clearfix">
                     <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
                            &#9776;
                     </button>
                </div>

                <div class="collapse navbar-toggleable-xs" id="default-header">
                    <nav>
                        <ul id="menu-main-menu" class="nav nav-inline yamm">
                            @foreach($brands as $brand)
                                <li class="menu-item"><a title="{{$brand->name}}" href="/brands/{{$brand->slug}}">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="header-support-info">
                <div class="media">
                    <span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
                    <div class="media-body">
                        <span class="support-number"><strong>Support</strong> +1 234 567 89</span><br/>
                        <span class="support-email">Email: info@kajikifood.com</span>
                    </div>
                </div>
            </div>

        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->
<nav class="navbar navbar-primary navbar-full">
    <div class="container">
        <ul class="nav navbar-nav departments-menu animate-dropdown">
            <li class="nav-item dropdown ">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" >Shop by Category</a>
                <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown">
                    @foreach($categories as $category)
                        <li class="menu-item animate-dropdown"><a title="{{$category->name}}" href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <form class="navbar-search" method="get" action="/catalog">
            <label class="sr-only screen-reader-text" for="search">Search for:</label>
            <div class="input-group">
                <input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
                </div>
            </div>
        </form>

        <!-- BEGIN CART -->
        @include('front.layout.cart')
        <!-- END CART -->

    </div>
</nav>