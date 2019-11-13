@extends('back.master')
@section('title')
    <title>Workers ~ New ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('form-title')
    Unsaved Worker
@endsection
@section('form-actions')
    <a class="btn-c" href='/admin/s/workers'>Discard</a>
    <a class="btn-c btn-p btn-save-form" href='javascript:;'>Save</a>
@endsection
@section('header')
    @include('back.layout.form-header')
@endsection
@section('assets')
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
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content new-entry">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <a class="page-action-back" href="/admin/s/workers"><i class="fa fa-angle-left"></i> Workers</a>
                    <h1>Add Worker</h1>
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
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/s/workers/new" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'name',
                                        'control_title' => 'Name',
                                    ])
                                    @include('back.form-controls.select.status', [
                                        'control_name' => 'status',
                                        'control_title' => 'Status',
                                        'initial' => true,
                                        'data' => $statuses,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'email',
                                        'control_title' => 'Email',
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'mobile',
                                        'control_title' => 'Mobile',
                                    ])
                                </div>
                            </div>
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay"> Login details </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'username',
                                        'control_title' => 'Username',
                                    ])
                                    @include('back.form-controls.input.password', [
                                        'control_name' => 'password',
                                        'control_title' => 'Password',
                                    ])
                                    @include('back.form-controls.input.password', [
                                        'control_name' => 'password_confirmation',
                                        'control_title' => 'Confirm password',
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="portlet light" style="background-color: #F9FAFB;" id="portlet-organization">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay"> Organization </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include('back.form-controls.select.single', [
                                        'control_name' => 'category_id',
                                        'control_title' => 'Category',
                                        'data' => $categories,
                                        'option_value_source' => 'id',
                                        'option_content_source' => 'name',
                                    ])
                                </div>
                            </div>
                            <div class="portlet light" style="background-color: #F9FAFB;" id="avatar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Profile image </span>
                                        <span class="caption-helper font-blue-hoki">(optional)</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include('back.form-controls.image.single', [
                                        'control_name' => 'avatar',
                                        'upload_button_text' => 'Upload image',
                                        'alt_text' => true,
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