<nav class="woocommerce-breadcrumb" >
	<a href="/">Home</a>
	<span class="delimiter"><i class="fa fa-angle-right"></i></span>
	@if($catalog)
		{{$catalog->name}}
	@else
		{{$catalog_name}}
	@endif
</nav>