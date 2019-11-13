{{-- 
    $control_name:      name of the control,
    $control_title:     title to display,
    $control_value:     predefined value for this control,
    $control_help:      content for help block,
    $letter_count:      number of letters to count
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
        <input type="text" class="form-control letter-count-input" name="{{$control_name}}" id="{{$control_name}}" min="0" 
        @if(!empty($letter_count))
            data-letter-count="{{$letter_count}}"
        @else
            data-letter-count="192"
        @endif
        @if(!empty($control_value))
            value="{{$control_value}}"
        @elseif(old($control_name))
            value="{{old($control_name)}}"
        @endif
        >
        @if($errors->has($control_name))
            <span class="help font-red-thunderbird">
                <strong>{{ $errors->first($control_name) }}</strong>
            </span>
        @endif
        @if(!empty($letter_count))
            <span class="help font-blue-dark" style="font-size: 13px;">
                <span class="letter-count">0</span> of {{$letter_count}} characters used
            </span>
        @endif
    </div>
</div>
<!-- END {{$control_name}} -->