@extends('back.master')
@section('title')
    <title>Users ~ {{$user->name}} ~ {{ config('app.sys') }}</title>
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
    {!!Html::style('css/back/page-level-assets/selectize.default.css')!!}
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
        .selectize-input{
            height: auto;
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
                    <a class="page-action-back" href="/admin/users"><i class="fa fa-angle-left"></i> Users</a> <h1>User Overview</h1>
                    <a class="page-action-new" href="/admin/users/new"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            @if($alert == 'add')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    New user has been added successfully
                </div>
            @elseif($alert == 'update')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    User details has been updated successfully
                </div>
            @endif
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'name',
                                        'control_title' => 'Name',
                                        'control_value' => $user->name,
                                    ])
                                    @include('back.form-controls.select.status', [
                                        'control_name' => 'user_status_id',
                                        'control_title' => 'Status',
                                        'data' => $statuses,
                                        'initial' => true,
                                        'control_value' => $user->user_status_id,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'email',
                                        'control_title' => 'Email',
                                        'control_value' => $user->email,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'phone',
                                        'control_title' => 'Phone',
                                        'control_value' => $user->phone,
                                    ])
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Permissions
                                        </label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                                @foreach($permissions as $k => $permission)
                                                    <option value="{{$permission->name}}"
                                                        @if($user->hasPermissionTo($permission->name))
                                                            selected
                                                        @endif
                                                    >{{$permission->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="portlet light" style="background-color: #F9FAFB;">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Login details </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include('back.form-controls.input.readonly', [
                                        'control_name' => 'username',
                                        'control_title' => 'Username',
                                        'control_value' => $user->username,
                                    ])
                                    @include('back.form-controls.input.password', [
                                        'control_name' => 'password',
                                        'control_title' => 'New password',
                                    ])
                                    @include('back.form-controls.input.password', [
                                        'control_name' => 'password_confirmation',
                                        'control_title' => 'Confirm new password',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-8">
                            <a class="btn-c btn-x" href='javascript:;' onclick="remove('{{$user->id}}')">Delete</a>
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
{!!Html::script('js/back/page-level-scripts/selectize.min.js')!!}
    <script>
        window.onload = function(){
            $(document).ready(function() {
                $('#permissions').removeClass('form-control').selectize({
                    plugins: ['remove_button'],
                    delimiter: ',',
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input
                        }
                    }
                });

            } );
        }

        function remove(id){
           swal({
              title: "Do you really want to delete selected user?",
              text: "Deleting the user will also remove all the associated data.",
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
                      url: "/admin/users/remove",
                      data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        id : id
                      },
                      success: function(data){
                        swal("Deleted!", "User and its associated data has been deleted successfully!", "success");
                        window.location.href=base_url+'/admin/users';
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