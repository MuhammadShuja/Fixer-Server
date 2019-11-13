<?php
    $categories = \App\Models\Category::active();
    $brands = \App\Models\Brand::active();
?>
<footer id="colophon" class="site-footer">

<!--       <div class="footer-newsletter">
      	<div class="container">
      		<div class="row">
      			<div class="col-xs-12 col-sm-7">
      				<h5 class="newsletter-title">Sign up to Newsletter</h5>
      				<span class="newsletter-marketing-text">...and receive <strong>latest updates</strong></span>
      			</div>
      			<div class="col-xs-12 col-sm-5">
      				<form>
      					<div class="input-group">
      						<input type="text" class="form-control" placeholder="Enter your email address">
      						<span class="input-group-btn">
      							<button class="btn btn-secondary" type="button">Sign Up</button>
      						</span>
      					</div>
      				</form>
      			</div>
      		</div>
      	</div>
      </div> -->

      <div class="footer-bottom-widgets">
      	<div class="container">
      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
      				<div class="columns">
      					<aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
      						<div class="body">
      							<h4 class="widget-title">Find It Fast</h4>
      							<div class="menu-footer-menu-1-container">
      								<ul id="menu-footer-menu-1" class="menu">
                                                            @foreach($categories as $category)
                                                                  <li class="menu-item"><a href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
                                                            @endforeach
      								</ul>
      							</div>
      						</div>
      					</aside>
      				</div><!-- /.columns -->

      				<div class="columns">
      					<aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
      						<div class="body">
      							<h4 class="widget-title">&nbsp;</h4>
      							<div class="menu-footer-menu-2-container">
      								<ul id="menu-footer-menu-2" class="menu">
                                                            @foreach($brands as $brand)
                                                                  <li class="menu-item"><a href="/brands/{{$brand->slug}}">{{$brand->name}}</a></li>
                                                            @endforeach
      								</ul>
      							</div>
      						</div>
      					</aside>
      				</div><!-- /.columns -->

      				<div class="columns">
      					<aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
      						<div class="body">
      							<h4 class="widget-title">Customer Care</h4>
      							<div class="menu-footer-menu-3-container">
      								<ul id="menu-footer-menu-3" class="menu">
      									<li class="menu-item"><a href="/login">Login</a></li>
                                                            <li class="menu-item"><a href="/register">Register</a></li>
      									<li class="menu-item"><a href="/track-order">Track your Order</a></li>
      									<li class="menu-item"><a href="/support/faq">FAQs</a></li>
      									<li class="menu-item"><a href="/support/terms-and-conditions">Terms and Conditions</a></li>
      								</ul>
      							</div>
      						</div>
      					</aside>
      				</div><!-- /.columns -->

      			</div><!-- /.col -->

      			<div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
      				<div class="footer-logo">
                                    <img src="{{ URL::asset('/storage/logo/logo_dark.png') }}" width="175px">
      				</div><!-- /.footer-contact -->

      				<div class="footer-call-us">
      					<div class="media">
      						<span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
      						<div class="media-body">
      							<span class="call-us-text">Got Questions ? Call us 9am - 6 pm!</span>
      							<span class="call-us-number">+1 234 567 89</span>
      						</div>
      					</div>
      				</div><!-- /.footer-call-us -->


      				<div class="footer-address">
      					<strong class="footer-address-title">Contact Info</strong>
      					<address>Shop # 123, {{config('app.name')}}</address>
      				</div><!-- /.footer-address -->

      				<div class="footer-social-icons">
      					<ul class="social-icons list-unstyled">
      						<li><a class="fa fa-facebook" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-twitter" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-pinterest" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-linkedin" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-google-plus" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-tumblr" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-instagram" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-youtube" href="http://themeforest.net/user/shaikrilwan/portfolio"></a></li>
      						<li><a class="fa fa-rss" href="#"></a></li>
      						</ul>
      				</div>
      			</div>

      		</div>
      	</div>
      </div>

      <div class="copyright-bar">
      	<div class="container">
      		<div class="pull-left flip copyright">&copy; <a href="{{config('app.url')}}">{{config('app.name')}}</a> - All Rights Reserved</div>
      	</div><!-- /.container -->
      </div><!-- /.copyright-bar -->
</footer><!-- #colophon -->