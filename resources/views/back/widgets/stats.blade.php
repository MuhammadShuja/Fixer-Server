{{-- 
    $views:                number of times the product has been viewed by users,
    $in_cart:              number of times the product has been added in cart
    $sold:                 number of times the product has been ordered,
    $search:               number of times the product has appeared in search,
--}}
<style>
    .widget-thumb{
        background-color: #F1F5F9;
        box-shadow: 0 0 2px 0 rgba(0,0,0,0.50);
    }    
</style>
<div class="row">
    <div class="col-md-3">
        @if(isset($views))
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb text-uppercase">
                <h4 class="widget-thumb-heading">Views</h4>
                <div class="widget-thumb-wrap">
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-value="{{$views}}">{{$views}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        @endif
    </div>
    <div class="col-md-3">
        @if(isset($in_cart))
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb text-uppercase">
                <h4 class="widget-thumb-heading">Cart</h4>
                <div class="widget-thumb-wrap">
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-value="{{$in_cart}}">{{$in_cart}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        @endif
    </div>
    <div class="col-md-3">
        @if(isset($sold))
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb text-uppercase">
                <h4 class="widget-thumb-heading">Sold</h4>
                <div class="widget-thumb-wrap">
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-value="{{$sold}}">{{$sold}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        @endif
    </div>
    <div class="col-md-3">
        @if(isset($search))
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb text-uppercase">
                <h4 class="widget-thumb-heading">Search</h4>
                <div class="widget-thumb-wrap">
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-body-stat" data-value="{{$search}}">{{$search}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        @endif
    </div>
</div>