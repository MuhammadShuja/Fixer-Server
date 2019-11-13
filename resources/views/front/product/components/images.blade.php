<div class="product-images-wrapper">
    @if($product->sale_price)
        <span class="onsale">Sale!</span>
    @endif
    <div class="images electro-gallery">
        <div class="thumbnails-single owl-carousel" style="border: 1px solid #eaeaea;">
            @foreach($product->variants as $variant)
                @foreach($variant->images as $image)
                    <a href="javascript:;" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="{{URL::asset($image->source)}}" data-echo="{{URL::asset($image->source)}}" class="wp-post-image" alt="{{$product->name}}"></a>
                @endforeach
            @endforeach
        </div><!-- .thumbnails-single -->

        <div class="thumbnails-all columns-5 owl-carousel">
            @foreach($product->variants as $variant)
                @foreach($variant->images as $image)
                    <a href="{{URL::asset($image->thumbnail)}}" class="" title=""><img src="{{URL::asset($image->thumbnail)}}" data-echo="{{URL::asset($image->thumbnail)}}" class="wp-post-image" alt="{{$product->name}}"></a>
                @endforeach
            @endforeach
        </div><!-- .thumbnails-all -->
    </div><!-- .electro-gallery -->
</div><!-- /.product-images-wrapper -->