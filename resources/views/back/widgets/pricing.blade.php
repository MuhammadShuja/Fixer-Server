{{-- 
    $control_title:                 title to display,
    $price:                         price of item,
    $cost:                          cost of item,
    $discount:                      discount on item,
    $special_price:                 special discounted price on product,
    $special_price_start_date:      date from which special price will be applied,
    $special_price_end_date:        date at which special price will end,
--}}
<div class="portlet light widget-pricing">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay">
                @if(isset($control_title))
                    {{$control_title}}
                @else
                    Pricing
                @endif
            </span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                @include('back.form-controls.input.number', [
                    'control_name' => 'price',
                    'control_title' => 'Price',
                    'control_value' => (isset($price)) ? $price : '',
                ])
            </div>
        </div>
        <hr class="separator">
        <div class="row">
            <div class="col-md-6">
                @include('back.form-controls.input.number', [
                    'control_name' => 'special_price',
                    'control_title' => 'Special price',
                    'control_value' => (isset($special_price)) ? $special_price : '',
                ])
            </div>
            <div class="col-md-6">
                @include('back.form-controls.input.number', [
                    'control_name' => 'discount',
                    'control_title' => 'Discount (% percentage)',
                    'control_value' => (isset($discount)) ? $discount : '',
                ])
            </div>
        </div>
    </div>
</div>