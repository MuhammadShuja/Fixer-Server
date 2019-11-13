{{-- 
    $control_name:          name of the control,
    $control_title:         title to display,
    $control_value:         predefined value for this control,
    $control_help:          content for help block,
    $initial:               (true|false) to select first option,
    $data:                  predefined data set for this select control,
    $option_value_source:   source name for option value,
    $option_value_content:  source name for option content,
--}}
<!-- BEGIN {{$control_name}} -->
@section('assets')
    <style>
        .thumbnail-upload-wrapper{
            width: 100%;
            border: 2px dashed rgb(223, 227, 232);
            border-image: initial;
            border-radius: 3px;
            padding: 10px 20px;
            background-color: #FFFFFF;
            text-align: center;
            min-height: 150px;
        }
        input[type=file]{
            opacity: 0;
            filter:alpha(opacity=0);
        }
        .thumbnail-wrapper{
            width: 100%;
            text-align: center;
        }
        .thumbnail-wrapper img{
            width: 150px;
            height: auto;
            border: 1px solid rgb(223, 227, 232);
            padding: 0px;
            margin: 0px;
        }
    </style>
@endsection
<div class="form-group">
    <label class="control-label col-md-12">
        @if(!empty($control_title))
            {{$control_title}}
        @else
            Select single
        @endif
    </label>
    <div class="col-md-12">
        <select class="bs-select form-control" name="{{$control_name}}" id="{{$control_name}}" data-live-search="true">
            @if(!empty($data))
                @if(!empty($control_value))
                    @foreach($data as $option)
                        <option value="{{$option->$option_value_source}}"
                            @if($control_value == $option->$option_value_source)
                                selected
                            @endif
                            >{{$option->$option_content_source}}</option>
                    @endforeach
                @elseif(old($control_name))
                    @foreach($data as $option)
                        <option value="{{$option->$option_value_source}}"
                            @if(old($control_name) == $option->$option_value_source)
                                selected
                            @endif
                            >{{$option->$option_content_source}}</option>
                    @endforeach
                @elseif(!empty($initial))
                    @foreach($data as $k => $option)
                        @if($k == 0)
                            <option value="{{$option->$option_value_source}}" selected>{{$option->$option_content_source}}</option>
                        @else
                            <option value="{{$option->$option_value_source}}">{{$option->$option_content_source}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($data as $option)
                        <option value="{{$option->$option_value_source}}">{{$option->$option_content_source}}</option>
                    @endforeach
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