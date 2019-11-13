{{-- 
    $control_name:           name of the control,
    $control_title:          title to display,
    $upload_button_text:     text to display on upload button,
    $control_value:          images to display,
    $sortable:               (true|false) to sort images,
    $variant_id:             product variant id,
--}}
<div class="portlet light widget-multiple-image-upload">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay">
                @if(!empty($control_title))
                    {{$control_title}}
                @endif
            </span>
        </div>
        <div class="actions">
            <a class="btn font-blue-c upload-images">
                @if(!empty($upload_button_text))
                    {{$upload_button_text}}
                @endif
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12 uploads">
                <div class="images-upload-wrapper
                @if(isset($control_value))
                    hide
                @endif
                " style="text-align: center;">
                    <img src="/images/default/multi-image-upload-placeholder.svg" width="120px" height="120px">
                    <input type="file" title="" id="{{$control_name}}" name="{{$control_name}}[]" multiple="true">
                </div>
                <div class="images-upload
                @if(!empty($sortable))
                    sortable-images
                @endif
                " 
                @if(!empty($variant_id))
                    data-variant-id="{{$variant_id}}"
                @endif
                >
                @if(isset($control_value))
                    @foreach($control_value as $image)
                        <div class="image-wrapper ui-state-default" id="image_{{$image->id}}">
                            <img class="image" src="{{URL::asset($image->source)}}">
                            <div class="overlay">
                                <a class="btn eye" data-toggle="m-tooltip" title="View" data-placement="right" onclick="widgetViewImage(this)"><i class="icon-eye"></i></a>
                                <a class="btn trash" data-toggle="m-tooltip" title="Delete" data-placement="right" onclick="widgetRemoveImage(this)" data-id="{{$image->id}}"><i class="icon-trash"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- NOTE: DON'T FORGET TO INCLUDE IMAGE VIEW MODAL --}}