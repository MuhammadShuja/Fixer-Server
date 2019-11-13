@extends('back.master')
@section('title')
    <title>Workers ~ {{$worker->name}} ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('header')
    @include('back.layout.header')
@endsection
@section('assets')
    {!!Html::style('css/back/page-level-assets/bootstrap-select.css')!!}
    {!!Html::style('plugins/Trumbowyg-master/dist/ui/trumbowyg.min.css')!!}
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
                    <h1>Worker Overview</h1>
                    <a class="page-action-new" href="/admin/s/workers/new"><i class="fa fa-plus"></i> Add new</a>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            @if($alert == 'add')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    New worker has been added successfully
                </div>
            @elseif($alert == 'update')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    Worker details has been updated successfully
                </div>
            @endif
            @if ($errors->any())
                <div class="custom-alerts alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/s/workers/{{$worker->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'name',
                                        'control_title' => 'Name',
                                        'control_value' => $worker->name,
                                    ])
                                    @include('back.form-controls.select.status', [
                                        'control_name' => 'status',
                                        'control_title' => 'Status',
                                        'data' => $statuses,
                                        'control_value' => $worker->status->id,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'email',
                                        'control_title' => 'Email',
                                        'control_value' => $worker->email,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'phone',
                                        'control_title' => 'Phone',
                                        'control_value' => $worker->phone,
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
                                    @include('back.form-controls.input.readonly', [
                                        'control_name' => 'username',
                                        'control_title' => 'Username',
                                        'control_value' => $worker->username,
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
                                        'control_value' => $worker->category_id,
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
                                        'control_value' => $worker->avatar(),
                                        'content_alt_text' => $worker->avatar_alt_text,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-8">
                            <a class="btn-c btn-x" href='javascript:;' onclick="remove('{{$worker->id}}')">Delete</a>
                            <a class="btn-c btn-p btn-save-form pull-right" href='javascript:;'>Update</a>
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
    <script>
        function remove(id){
           swal({
              title: "Do you really want to delete selected worker?",
              text: "Deleting the worker will also remove all the associated data.",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                      type: "POST",
                      url: "/admin/s/workers/remove",
                      data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        id : id
                      },
                      success: function(data){
                        swal("Deleted!", "Worker and its associated data has been deleted successfully!", "success");
                        window.location.href=base_url+'/admin/s/workers';
                      },
                      error: function(data){
                        swal("Error!", "Error in deletion!", "error");
                      }
                    });
                } else {
                    swal("Cancelled", "Your data is completely safe :)", "error");
                }
            });
        }
    </script>
@endsection