@extends('back.master')
@section('title')
    <title>Jobs ~ New ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('form-title')
    Unsaved Job
@endsection
@section('form-actions')
    <a class="btn-c" href='/admin/jobs'>Discard</a>
    <a class="btn-c btn-p btn-save-form" href='javascript:;'>Save</a>
@endsection
@section('header')
    @include('back.layout.form-header')
@endsection
@section('assets')
{!!Html::style('css/back/page-level-assets/bootstrap-datepicker.min.css')!!}
    <style>
        .portlet{
            box-shadow: 0 0 2px 0 rgba(0,0,0,0.50);
        }
        .portlet .portlet-title{
            border-bottom: 0px;
            margin-bottom: 0px;
        }
        .portlet .portlet-title .caption-subject{
            font-size: 18px !important;
        }
        .trumbowyg-box, .trumbowyg-editor{
            margin-top: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content new-entry">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <a class="page-action-back" href="/admin/jobs"><i class="fa fa-angle-left"></i> Jobs</a>
                    <h1>Add Job</h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            @if ($errors->any())
                <div class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/jobs/new" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    @include('back.form-controls.select.single', [
                                        'control_name' => 'service_id',
                                        'control_title' => 'Service',
                                        'data' => $services,
                                        'option_value_source' => 'id',
                                        'option_content_source' => 'name',
                                    ])
                                    @include('back.form-controls.select.single', [
                                        'control_name' => 'user_id',
                                        'control_title' => 'Customer',
                                        'data' => $customers,
                                        'option_value_source' => 'id',
                                        'option_content_source' => 'name',
                                    ])
                                    @include('back.form-controls.textarea.simple', [
                                        'control_name' => 'job_notes',
                                        'control_title' => 'Notes',
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="portlet light" style="background-color: #F9FAFB;">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Job schedule </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-12">
                                            Time
                                        </label>
                                        <div class="col-md-12">
                                            <select class="bs-select form-control" name="schedule_time" id="schedule_time" data-live-search="true">
                                                @foreach($time_periods as $period)
                                                    <option value="{{$period}}"
                                                    @if(old('schedule_time') == $period)
                                                        selected 
                                                    @endif
                                                    >{{$period}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('schedule_time'))
                                                <span class="help font-red-thunderbird">
                                                    <strong>{{ $errors->first('schedule_time') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @include('back.form-controls.input.datepicker', [
                                        'control_name' => 'schedule_date',
                                        'control_title' => 'Date',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- BEGIN PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('scripts')
    {!!Html::script('js/back/page-level-scripts/components-date-time-pickers.min.js')!!}
    {!!Html::script('js/back/page-level-scripts/bootstrap-datepicker.min.js')!!}
@endsection