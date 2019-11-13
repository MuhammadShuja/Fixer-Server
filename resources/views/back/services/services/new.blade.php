@extends('back.master')
@section('title')
    <title>Services ~ New ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('form-title')
    Unsaved Service
@endsection
@section('form-actions')
    <a class="btn-c btn-discard-form" href='/admin/s/services'>Discard</a>
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
        input[type=file]{
            opacity: 0;
            filter:alpha(opacity=0);
        }
        .images-upload .image-wrapper{
            margin-bottom: 10px;
            padding-left: 10px;
            width: 20%;
            display: inline-block;
            float: left;
            position: relative;
        }
        .images-upload{
            padding-right: 10px;
        }
        .images-upload .image-wrapper:first-of-type{
            width: 40%;
        }
        .images-upload .image-wrapper img{
            width: 100%;
            min-height: 110px;
            border: 1px solid rgb(223, 227, 232);
            cursor: pointer;
        }
        .image-wrapper .overlay{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            margin-left: 10px;
            width: calc(100%-10px);
            opacity: 0;
            background-color: #212B26;
            cursor: pointer;
        }
        .image-wrapper .overlay .btn{
            color: white;
            font-size: 18px;
            position: absolute;
        }
        .image-wrapper .overlay .btn.eye{
            bottom: 0;
            left: 0;
            margin-bottom: 30px;
        }
        .image-wrapper .overlay .btn.trash{
            bottom: 0;
            left: 0;
        }
        .image-wrapper:hover .overlay {
            opacity: 0.6;
        }
        .select-type .btn.dropdown-toggle{
            background-color: #F1F5F9;
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
                    <a class="page-action-back" href="/admin/s/services"><i class="fa fa-angle-left"></i> Services</a>
                    <h1>Add Service</h1>
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
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/s/services/new" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <input type="hidden" name="service_type" value="simple">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- BEGIN INFO -->
                            <div class="portlet light" id="portlet-info">
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'name',
                                        'control_title' => 'Name',
                                    ])
                                    @include('back.form-controls.select.status', [
                                        'control_name' => 'status',
                                        'control_title' => 'Status',
                                        'data' => $statuses,
                                        'initial' => true,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'price',
                                        'control_title' => 'Price',
                                    ])
                                    @include('back.form-controls.textarea.editor', [
                                        'control_name' => 'description',
                                        'control_title' => 'Description (optional)',
                                    ])
                                </div>
                            </div>
                            <!-- END INFO -->
                        </div>
                        <div class="col-md-4">
                            <!-- BEGIN ORGANIZATION -->
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
                            <!-- END ORGANIZATION -->
                        </div>
                    </div>
                </div>
            </form>
            <!-- BEGIN PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection