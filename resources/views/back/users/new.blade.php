@extends('back.master')
@section('title')
    <title>Users ~ New ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('form-title')
    Unsaved User
@endsection
@section('form-actions')
    <a class="btn-c" href='/admin/users'>Discard</a>
    <a class="btn-c btn-p btn-save-form" href='javascript:;'>Save</a>
@endsection
@section('header')
    @include('back.layout.form-header')
@endsection
@section('assets')
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
        .trumbowyg-box, .trumbowyg-editor{
            margin-top: 0px;
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
                    <a class="page-action-back" href="/admin/users"><i class="fa fa-angle-left"></i> Users</a>
                    <h1>Add User</h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/users/new" enctype="multipart/form-data">
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
                                        'control_name' => 'user_status_id',
                                        'control_title' => 'Status',
                                        'data' => $statuses,
                                        'initial' => true,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'email',
                                        'control_title' => 'Email',
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'phone',
                                        'control_title' => 'Phone',
                                    ])
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Permissions
                                        </label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                                @foreach($permissions as $k => $permission)
                                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
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
    </script>
@endsection