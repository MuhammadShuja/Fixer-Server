{{-- 
    $control_name:      name of the control,
    $control_title:     title to display,
    $control_value:     predefined value for this control,
    $control_help:      content for help block,
    $handle:            url handle for this slug,
    $link_field:        field name to auto generate meta title and slug,
--}}
<!-- BEGIN {{$control_name}} -->
<div class="form-group">
    <label class="control-label col-md-12">
        @if(!empty($control_title))
            {{$control_title}}
        @else
            Input text
        @endif
    </label>
    <div class="col-md-12">
        <input type="text input-slug" class="form-control input-slug-handle" name="{{$control_name}}" id="{{$control_name}}"
        @if(!empty($control_value))
            value="{{config('app.url').'/'.$handle.'/'.$control_value}}"
        @elseif(old($control_name))
            value="{{config('app.url').'/'.$handle.'/'.old($control_name)}}"
        @endif
        data-handle="{{$handle}}" data-link-field="{{$link_field}}"
        >
        @if($errors->has($control_name))
            <span class="help font-red-thunderbird">
                <strong>{{ $errors->first($control_name) }}</strong>
            </span>
        @endif
        @if(!empty($control_help))
            <span class="help font-blue-dark" style="font-size: 13px;">
                {{$control_help}}
            </span>
        @endif
    </div>
</div>
<!-- END {{$control_name}} -->