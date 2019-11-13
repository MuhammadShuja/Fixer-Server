<style>
    .button{
        line-height: 1.286em;
    }
    .whatsapp_button{
        background-color: #24CD63;
        color: #FFFFFF;
        font-weight: 700;
    }
    .hide{
        display: none;
    }
    .image-selector{
        border: 1px solid #c9c9c9;
        margin: 5px;
        cursor: pointer;
    }

    .image-selector-selected{
        border: 2px solid #0063D0;
        margin: 5px;
        cursor: pointer;
    }

    .selector{
        border: 1px solid #BFCAD1;
        padding: 5px;
        margin-left: 5px;
        cursor: pointer;
        line-height: 36px;
        white-space: nowrap;
    }
    .selector-selected{
        border: 1px solid #0063D0;
        background: #0063D0;
        color: #FFFFFF;
        padding: 5px;
        margin-left: 5px;
        cursor: pointer;
        line-height: 36px;
        white-space: nowrap;
    }
    .out-of-stock{
        background-color: #F5F5F5;
        color: grey;
        border-radius: 3px;        
        width: 100%;
        padding: 5px 5px;
        text-align: center;
    }
    .input-quantity{
        border: none;
        max-height:30px;
        border-radius:3px;
        padding:18px 5px;
        box-sizing: border-box;
        transition: background .2s ease;
        color:#4C5866;
        font-family:Open Sans,Helvetica,Roboto,Arial,sans-serif;
        font-size:18px;
        font-weight:600;
        line-height:normal;
        width: 30%;
        text-align: center;
    }
    .input-quantity:focus{
        outline: none;
        background-color: #E6ECF2;
    }
    .input-quantity::-webkit-input-placeholder,
    .input-quantity:-moz-placeholder,
    .input-quantity::-moz-placeholder,
    .input-quantity:-ms-input-placeholder{
        color:#98A7B8;
    }
    .input-quantity[readonly]{
        background:#FFFFFF;
        border:1px solid #EAEDF0;
        cursor:not-allowed;
    }
    .modify-quantity{
        background-color: #F5F5F5;
        text-decoration: none;
        border-radius: 3px;
        padding: 10px 15px;
        color: #909090;
    }
    .modify-quantity:hover,
    .modify-quantity:focus{
        background-color: #C9C9C9;
        color: white;
    }
    input[type=number] { 
      -moz-appearance: textfield;
      appearance: textfield;
      margin: 0; 
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
          -webkit-appearance: none; 
          margin: 0; 
    }
    .quantity{
        width: 100% !important;
    }
    .quantity label{
        display: inline-block !important;
        padding: 0px 13px;
        width: 200px;
    }
    .quantity .quantity-wrapper{
        display: inline-block;
        padding: 8px;
        width: 200px;
    }
    .action-controls{
        display: block;
        padding: 20px 0px;
    }
</style>
<form class="variations_form cart" method="post" action="{{route('cart.add')}}" name="buyNowForm">
    {{csrf_field()}}

    @if(count($product->variants) > 1)
        <table class="variations">
            <tbody>s
                <tr>
                    <td class="label" width="200px"><label>{{$product->variant_label}} options</label></td>
                    <td class="value">
                        @if($product->selection_type == 'image')
                            @foreach($product->variants as $k => $variant)
                                <img class="
                                @if($k == 0)
                                    image-selector-selected
                                @else
                                    image-selector
                                @endif
                                " src="{{ $variant->thumbnail() }}" width="60px" height="60px" style="float: left;" onclick="selectVariantImage(this, {{$variant->id}});checkStock({{$variant->id}});" data-id="{{$variant->id}}">
                            @endforeach
                        @elseif($product->selection_type == 'radio')
                            @foreach($product->variants as $k => $variant)
                                <span class="
                                        @if($k == 0)
                                            selector-selected
                                        @else
                                            selector
                                        @endif
                                        " onclick="selectVariantRadio(this, 
                                        {{$variant->id}});checkStock({{$variant->id}});" data-id="{{$variant->id}}">
                                    {{$variant->name}}
                                </span>
                            @endforeach
                        @else
                            <select class="" name="attribute_pa_color" onchange="checkStock(this.value)">
                                @foreach($product->variants as $variant)
                                    <option value="{{$variant->id}}">{{$variant->name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    @endif


    <div class="single_variation_wrap">
        <div class="woocommerce-variation single_variation"></div>
        <div class="woocommerce-variation-add-to-cart variations_button">
            <div class="quantity" style="width: 50%;">
                <label>Quantity:</label>
                <div class="quantity-wrapper">
                    <a class="modify-quantity" href="javascript:;" onclick="decreaseQuantity()"><i class="fa fa-minus"></i></a>
                    <input type="number" id="quantity" name="quantity" value="1" class="input-quantity" data-max="{{$product->variants[0]->quantity}}" onkeyup="editQuantity()">
                    <a class="modify-quantity" href="javascript:;" onclick="increaseQuantity()"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="action-controls">
                <a href="javascript:;" class="single_add_to_cart_button button" id="btnBuyNow"
                    onclick="buyNow(this)"
                    data-content-name="{{$product->name}}"
                    data-content-category="
                        @if($product->category)
                            {{$product->category->name}}
                        @endif
                    "
                    data-content-id="{{$product->id}}"
                    @if($product->special_price)
                        data-content-value="{{$product->special_price}}"
                    @else
                        data-content-value="{{$product->price}}"
                    @endif
                >Add to Cart</a>
            </div>
            <input type="hidden" name="product_id" value="{{$product->id}}" />
            <input type="hidden" value="{{$product->variants->first()->id}}" id="product_variant_id" name="product_variant_id">
        </div>
    </div>
</form>

{!!Html::script('js/back/jquery.min.js')!!}
<script>
    function buyNow(e){
        document.buyNowForm.submit();
    }

    function selectVariantRadio(e, id){
        $('.selector-selected').addClass('selector').removeClass('selector-selected');
        $(e).addClass('selector-selected').removeClass('selector');
        $('#inputVariant').val($(e).data('id'));
    }

    var base_url = "{{asset('/')}}";

    function checkStock(id){
        $.ajax({
            type: "GET",
            url: "/products/variant/stock",
            data: {
                id: id
            },
            success: function(result) {
                if(result.stock > 0){
                    $('.single_variation_wrap').removeClass('hide');
                    $('.availability').removeClass('out-of-stock');
                    $('.availability').addClass('in-stock');
                    $('.availability span').text('In stock');
                }
                else{
                    $('.single_variation_wrap').addClass('hide');
                    $('.availability').addClass('out-of-stock');
                    $('.availability').removeClass('in-stock');
                    $('.availability span').text('Out of stock');
                }
                console.log('stock for '+id+' is: '+result.stock);
                $('#quantity').data('max', result.stock);

                var current = $('#quantity').val();

                if(result.stock < current){
                    $('#quantity').val(result.stock);
                }
                if(current == 0 && result.stock > current){
                    $('#quantity').val(1);
                }
            },
            error: function(result){
                console.log('Error!', 'Error in loading stock!', 'error');
            }
        });
    }
    function decreaseQuantity(){
        var current = $('#quantity').val();
        if(current > 1){
            $('#quantity').val(parseInt(current) - 1);
        }
    }
    function increaseQuantity(){
        var current = $('#quantity').val();
        var max = $('#quantity').data('max');
        console.log(max);
        if(current < max){
            $('#quantity').val(parseInt(current) + 1);
        }
    }
    function editQuantity(){
        var current = $('#quantity').val();
        var max = $('#quantity').data('max');

        if(isNaN(current)){
            $('#quantity').val(1);
        }
        else if(parseInt(current) > parseInt(max)){
            $('#quantity').val(parseInt(max));
        }
        else if(parseInt(current) < 1){
            $('#quantity').val(1);
        }
        else if(current == ""){
            $('#quantity').val(1);
        }
    }
</script>