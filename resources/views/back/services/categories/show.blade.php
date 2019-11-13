@extends('back.master')
@section('title')
    <title>Categories ~ {{$category->name}} ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('header')
    @include('back.layout.header')
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
                    <a class="page-action-back" href="/admin/s/categories"><i class="fa fa-angle-left"></i> Categories</a>
                    <h1>Category Overview</h1>
                    <a class="page-action-new" href="/admin/s/categories/new"><i class="fa fa-plus"></i> Add New</a>
                    <a class="page-action-new" href="javascript:;" onclick="replicate(this)"><i class="fa fa-clone"></i> Duplicate</a>
                    <form id="replicateEntry" method="POST" action="/admin/s/categories/{{$category->id}}/replicate">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$category->name}}" name="name" id="replicateName">
                    </form>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            @if($alert == 'add')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    New category has been added successfully
                </div>
            @elseif($alert == 'update')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    Category details has been updated successfully
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
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/s/categories/{{$category->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'name',
                                        'control_title' => 'Name',
                                        'control_value' => $category->name,
                                    ])
                                    @include('back.form-controls.select.status', [
                                        'control_name' => 'status',
                                        'control_title' => 'Status',
                                        'control_value' => $category->status,
                                    ])
                                    @include('back.form-controls.input.text', [
                                        'control_name' => 'code',
                                        'control_title' => 'Code (optional)',
                                        'control_value' => $category->code,
                                    ])
                                    @include('back.form-controls.textarea.editor', [
                                        'control_name' => 'description',
                                        'control_title' => 'Description (optional)',
                                        'control_value' => $category->description,
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="portlet light" style="background-color: #F9FAFB;" id="webThumbnail">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay"> Thumbnail </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    @include('back.form-controls.image.single', [
                                        'control_name' => 'thumbnail',
                                        'upload_button_text' => 'Upload image',
                                        'change_button_text' => 'Browse image',
                                        'alt_text' => true,
                                        'control_value' => $category->thumbnail(),
                                        'content_alt_text' => $category->thumbnail_alt_text,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-8">
                            <a class="btn-c btn-x" href='javascript:;' onclick="remove('{{$category->id}}')">Delete</a>
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
              title: "Do you really want to delete selected category?",
              text: "Deleting the category will also remove all the associated data.",
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
                      url: "/admin/s/categories/remove",
                      data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        id : id
                      },
                      success: function(data){
                        swal("Deleted!", "Category and its associated data has been deleted successfully!", "success");
                        window.location.href=base_url+'/admin/s/categories';
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
        function replicate(e){
            swal({
                title: "Category name",
                text: "Please enter category name",
                type: "input",
                inputValue: "Copy of {{$category->name}}",
                confirmButtonText: "Duplicate",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "New category name",
                showLoaderOnConfirm: true
            },
            function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("Please enter category name!");
                    return false;
                }
                else{
                    $('#replicateName').val(inputValue);
                    $('#replicateEntry').submit();
                }
            });
        }
    </script>
@endsection