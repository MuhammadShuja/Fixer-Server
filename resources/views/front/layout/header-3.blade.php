<?php
    $categories = \App\Models\Category::active();
    $brands = \App\Models\Brand::popular(10);
?>
<header id="masthead" class="site-header header-v3">
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
    </div><!-- /.container -->
</header><!-- #masthead -->
<nav class="navbar navbar-primary navbar-full yamm">
    <div class="container">
        <div class="clearfix">
            <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#header-v3">
                &#9776;
            </button>
        </div>

        <div class="collapse navbar-toggleable-xs" id="header-v3">
            <ul class="nav navbar-nav">
                @foreach($categories as $category)
                    <li class="menu-item">
                        <a title="{{$category->name}}" href="/categories/{{$category->slug}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div><!-- /.collpase -->
    </div><!-- /.-container -->
</nav><!-- /.navbar -->