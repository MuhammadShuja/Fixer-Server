{{-- 
    $control_name:          name of the control,
    $control_title:         title to display,
    $control_value:         predefined value for this control,
    $control_help:          content for help block,
    $initial:               (true|false) to select first option,
--}}
<!-- BEGIN {{$control_name}} -->
<div class="form-group">
    <label class="control-label col-md-12">
        @if(!empty($control_title))
            {{$control_title}}
        @else
            Select single
        @endif
    </label>
    <div class="col-md-12">
        <select class="form-control bs-select" name="{{$control_name}}" id="{{$control_name}}" data-live-search="true">
            @if(isset($control_value))
                <option value="1"
                    @if($control_value == "1")
                        selected
                    @endif
                    >Yes</option>
                <option value="0"
                    @if($control_value == "0")
                        selected
                    @endif
                    >No</option>
            @elseif(old($control_name))
                <option value="1"
                    @if(old($control_name) == "1")
                        selected
                    @endif
                    >Yes</option>
                <option value="0"
                    @if(old($control_name) == "0")
                        selected
                    @endif
                    >Inctive</option>
            @elseif(!empty($initial))
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            @else
                <option value="1">Yes</option>
                <option value="0">No</option>
            @endif
        </select>
        
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