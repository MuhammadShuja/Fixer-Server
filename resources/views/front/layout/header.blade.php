<?php
    $categories = \App\Models\Category::active();
    $brands = \App\Models\Brand::popular(10);
?>
<header id="masthead" class="site-header header-v1">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
            <div class="header-logo">
            	<a href="/" class="header-logo-link">
                    <img src="{{ URL::asset('/storage/logo/logo_dark.png') }}" height="54px" style="max-height: 54px;">
            	</a>
            </div>
            <!-- ============================================================= Header Logo : End============================================================= -->

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
        </div><!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-lg-3">
                <nav>
                    <ul class="list-group vertical-menu yamm make-absolute">
                        <li class="list-group-item"><span><i class="fa fa-list-ul"></i> All Categories</span></li>

                        @foreach($categories as $category)
                            <li class="highlight menu-item animate-dropdown"><a title="{{$category->name}}" href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
                        @endforeach

                    </ul>
                </nav>
            </div>

            <div class="col-xs-12 col-lg-9">
                <nav>
                    <ul id="menu-secondary-nav" class="secondary-nav">
                        @foreach($brands as $brand)
                            <li class="menu-item"><a href="/brands/{{$brand->slug}}">{{$brand->name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header><!-- #masthead -->