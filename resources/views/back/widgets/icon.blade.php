{{-- 
    $type:                 success | alert | danger
--}}
@if($type == 'success')
	<img src="{{URL::asset('images\svg\success.svg')}}" width="32px" height="32px" style="position: relative; top: -2px; margin-right: 4px;">
@elseif($type == 'alert')
	<img src="{{URL::asset('images\svg\alert.svg')}}" width="32px" height="32px" style="position: relative; top: -2px; margin-right: 4px;">
@elseif($type == 'danger')
	<img src="{{URL::asset('images\svg\danger.svg')}}" width="32px" height="32px" style="position: relative; top: -2px; margin-right: 4px;">
@endif