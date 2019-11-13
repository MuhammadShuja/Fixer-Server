{{-- 
    $control_name:           name of the control,
    $control_title:          title to display,
    $upload_button_text:     text to display on upload button,
    $change_button_text:     text to display on change button,
    $alt_text:               (true|false) to show alt text field,
    $control_help:           content for help block,
    $control_value:          image link to display,
    $content_alt_text:       content for alt text field,
--}}
<!-- BEGIN {{$control_name}} -->
<div class="form-group widget-single-image-upload">
    <div class="col-md-12">
        @if(!empty($control_value))
            <div class="image-upload-wrapper hide">
                <img class="placeholder" src="/images/default/single-image-upload-placeholder.svg" height="100px" width="100px"/>
                <div class="btn-upload">
                    <a class="btn-c btn-single-image-upload" href="javascript:;">{{$upload_button_text}}</a>
                    @if(!empty($control_help))
                        <br/>
                        <span class="help font-blue-dark" style="font-size: 13px;">
                            {!! $control_help !!}
                        </span>
                    @endif
                    <input type="file" onchange="uploadSingleImage(this, '{{$control_name}}')" title="" name="{{$control_name}}">
                </div>
            </div>
            <div class="image-wrapper image-wrapper-bordered">
                <img src="{{$control_value}}" width="150px" style="background-color: #F1F5F9;" />
                @if(!empty($control_title))
                    <br/>
                    <span class="help font-blue-dark" style="font-size: 13px;">
                        {{$control_title}}
                    </span>
                @endif
                <br/>
                <a class="btn-c btn-p btn-single-image-browse-again" href="javascript:;" style="width: 150px">
                @if(!empty($change_button_text))
                    {{$change_button_text}}
                @else
                    Browse again
                @endif
                </a>
                @if(!empty($control_help))
                    <br/>
                    <span class="help font-blue-dark" style="font-size: 13px;">
                        {!! $control_help !!}
                    </span>
                @endif
            </div>
        @else
            <div class="image-upload-wrapper">
                <img class="placeholder" src="/images/default/single-image-upload-placeholder.svg" height="100px" width="100px"/>
                <div class="btn-upload">
                    <a class="btn-c btn-single-image-upload" href="javascript:;">{{$upload_button_text}}</a>
                    @if(!empty($control_help))
                        <br/>
                        <span class="help font-blue-dark" style="font-size: 13px;">
                            {!! $control_help !!}
                        </span>
                    @endif
                    <input type="file" onchange="uploadSingleImage(this, '{{$control_name}}')" title="" name="{{$control_name}}">
                </div>
            </div>
            <div class="image-wrapper image-wrapper-bordered hide">
                <img src="/images/default/image-placeholder.png" width="150px" style="background-color: #F1F5F9;" />
                @if(!empty($control_title))
                    <br/>
                    <span class="help font-blue-dark" style="font-size: 13px;">
                        {{$control_title}}
                    </span>
                @endif
                <br/>
                <a class="btn-c btn-p btn-single-image-browse-again" href="javascript:;" style="width: 150px">@if(!empty($change_button_text))
                    {{$change_button_text}}
                @else
                    Browse again
                @endif
                </a>
                @if(!empty($control_help))
                    <br/>
                    <span class="help font-blue-dark" style="font-size: 13px;">
                        {!! $control_help !!}
                    </span>
                @endif
            </div>
        @endif
    </div>
</div>
@if(!empty($alt_text))
    <div class="form-group alt-text">
        <label class="control-label col-md-12">Alt text
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="{{$control_name}}_alt_text"
            @if(!empty($content_alt_text))
                value="{{ $content_alt_text }}" 
            @endif
            >
        </div>
    </div>
@endif
<!-- END {{$control_name}} -->