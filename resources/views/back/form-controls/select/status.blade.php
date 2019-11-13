{{-- 
    $control_name:      name of the control,
    $control_title:     title to display,
    $control_value:     predefined value for this control,
    $control_help:      content for help block,
    $initial:           (true|false) to select first option,
    $data:              predefined data set for this select control
--}}
<!-- BEGIN {{$control_name}} -->
<div class="form-group">
    <label class="control-label col-md-12">
        @if(!empty($control_title))
            {{$control_title}}
        @else
            Select status
        @endif
    </label>
    <div class="col-md-12">
        <select class="bs-select form-control" name="{{$control_name}}" id="{{$control_name}}" data-live-search="true">
            @if(!empty($data))
                @if(!empty($control_value))
                    @foreach($data as $status)
                        <option value="{{$status->id}}"
                            @if($control_value == $status->id)
                                selected
                            @endif
                            >{{$status->label}}</option>
                    @endforeach
                @elseif(old($control_name))
                    @foreach($data as $status)
                        <option value="{{$status->id}}"
                            @if(old($control_name) == $status->id)
                                selected
                            @endif
                            >{{$status->label}}</option>
                    @endforeach
                @elseif(!empty($initial))
                    @foreach($data as $k => $status)
                        @if($k == 0)
                            <option value="{{$status->id}}" selected>{{$status->label}}</option>
                        @else
                            <option value="{{$status->id}}">{{$status->label}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($data as $status)
                        <option value="{{$status->id}}">{{$status->label}}</option>
                    @endforeach
                @endif
            @else
                @if(!empty($control_value))
                    <option value="active"
                        @if($control_value == 'active')
                            selected
                        @endif
                        >Active</option>
                    <option value="inactive"
                        @if($control_value == 'inactive')
                            selected
                        @endif
                        >Inactive</option>
                @elseif(old($control_name))
                    <option value="active"
                        @if(old($control_name) == 'active')
                            selected
                        @endif
                        >Active</option>
                    <option value="inactive"
                        @if(old($control_name) == 'inactive')
                            selected
                        @endif
                        >Inctive</option>
                @elseif(!empty($initial))
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                @else
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                @endif
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