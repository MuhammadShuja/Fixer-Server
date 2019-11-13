<nav class="woocommerce-breadcrumb">
    <a href="/">Home</a>
    <span class="delimiter"><i class="fa fa-angle-right"></i></span>
    @if($product->category)
    	<a href="/categories/{{$product->category->slug}}">{{$product->category->name}}</a>
    	<span class="delimiter"><i class="fa fa-angle-right"></i></span>
	@endif
    {{$product->name}}
</nav><!-- /.woocommerce-breadcrumb -->