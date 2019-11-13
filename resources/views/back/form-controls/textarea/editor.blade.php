{{-- 
    $control_name:      name of the control,
    $control_title:     title to display,
    $control_value:     predefined value for this control,
    $control_help:      content for help block,
    $rows:              number of rows for textarea,
--}}
<!-- BEGIN {{$control_name}} -->
<div class="form-group">
    <label class="control-label col-md-12">
        @if(!empty($control_title))
            {{$control_title}}
        @else
            Textarea simple
        @endif
    </label>
    <div class="col-md-12">
        <textarea class="form-control textarea-editor" name="{{$control_name}}" id="{{$control_name}}"
        @if(!empty($rows))
            rows="{{$rows}}"
        @else
            rows="4"
        @endif
        >@if(!empty($control_value)){{$control_value}}
        @elseif(old($control_name)){{old($control_name)}}
        @endif</textarea>
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