{{-- 
    $control_name:      name of the control,
    $control_title:     title to display,
    $control_value:     predefined value for this control,
    $control_help:      content for help block,
    $rows:              number of rows for textarea,
    $letter_count:      number of letters to count,
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
        <textarea class="form-control
        @if(!empty($letter_count))
            letter-count-input
        @endif
        " name="{{$control_name}}" id="{{$control_name}}" style="resize: none;"
        @if(!empty($rows))
            rows="{{$rows}}"
        @else
            rows="4"
        @endif
        @if(!empty($letter_count))
            data-letter-count="{{$letter_count}}"
        @endif
        >@if(!empty($control_value)){{$control_value}}
        @elseif(old($control_name)){{old($control_name)}}
        @endif</textarea>
        @if($errors->has($control_name))
            <span class="help font-red-thunderbird">
                <strong>{{ $errors->first($control_name) }}</strong>
            </span>
        @endif
        @if(!empty($letter_count))
            <span class="help font-blue-dark" style="font-size: 13px;">
                <span class="letter-count">0</span> of {{$letter_count}} characters used
            </span>
        @elseif(!empty($control_help))
            <span class="help font-blue-dark" style="font-size: 13px;">
                {{$control_help}}
            </span>
        @endif
    </div>
</div>
<!-- END {{$control_name}} -->