\@extends('back.master')
@section('title')
    <title>Jobs ~ {{$job->reference}} ~ {{ config('app.sys') }}</title>
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
        .block{
            display: block;
        }
        .table>tbody>tr>td,
        .table>tbody>tr>th{
            border-top: none;
        }
        td:last-child,
        th:last-child{
          text-align: right;
        }
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
                    <a class="page-action-back" href="/admin/jobs"><i class="fa fa-angle-left"></i> Jobs</a>
                    <h1>
                        #{{$job->reference}}
                        <small>{{ Carbon\Carbon::parse($job->created_at)->format('F d, Y \a\t h:m a') }}</small>
                    </h1>
                    @if(!$job->worker)
                    <span class="iq-badge red">
                        <i class="fa fa-circle-o"></i>
                        <span class="label">Not assigned</span>
                    </span>
                    @endif
                    @if($job->job_status_id == \App\Models\JobStatus::completed())
                    <span class="iq-badge green">
                        <i class="fa fa-circle-o"></i>
                        <span class="label">Completed</span>
                    </span>
                    @else
                    <span class="iq-badge orange">
                        <i class="fa fa-circle-o"></i>
                        <span class="label">Incomplete</span>
                    </span>
                    @endif
                    @if($job->payment->status == 'paid')
                    <span class="iq-badge green">
                        <i class="fa fa-circle-o"></i>
                        <span class="label">Paid</span>
                    </span>
                    @else
                    <span class="iq-badge yellow">
                        <i class="fa fa-circle-o"></i>
                        <span class="label">Payment pending</span>
                    </span>
                    @endif
                </div>
                <!-- END PAGE TITLE -->
            </div>
            @if($alert == 'add')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    New job has been added successfully
                </div>
            @elseif($alert == 'update')
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="fa fa-lg fa-check"></i>
                    Job details has been updated successfully
                </div>
            @endif
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-8">
                    <!-- BEGIN SERVICE INFO -->
                    @include('back.sales.job.blocks.service')
                    <!-- END SERVICE INFO -->
                    <!-- BEGIN WORKER INFO -->
                    @include('back.sales.job.blocks.worker')
                    <!-- END WORKER INFO -->
                    <!-- BEGIN SERVICE INFO -->
                    @include('back.sales.job.blocks.payment')
                    <!-- END SERVICE INFO -->
                </div>
                <div class="col-md-4">
                    <!-- BEGIN SERVICE INFO -->
                    @include('back.sales.job.blocks.notes')
                    <!-- END SERVICE INFO -->
                    <!-- BEGIN SERVICE INFO -->
                    @include('back.sales.job.blocks.schedule')
                    <!-- END SERVICE INFO -->
                    <!-- BEGIN SERVICE INFO -->
                    @include('back.sales.job.blocks.customer')
                    <!-- END SERVICE INFO -->
                </div>
            </div>
            <!-- BEGIN PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('scripts')
    <script>
        function updateStatus(status, status_id){
           swal({
              title: "Do you really want to "+status+" selected job?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Confirm",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                      type: "POST",
                      url: "/admin/jobs/{{$job->id}}/update-status",
                      data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        job_status_id : status_id
                      },
                      success: function(data){
                        swal("Updated!", "Job status has been deleted successfully!", "success");
                        location.reload();
                      },
                      error: function(data){
                        swal("Error!", "Sorry, could not update job status!", "error");
                      }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
        }

        function updatePayment(status){
           swal({
              title: "Do you really want to update payment status?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Confirm",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                      type: "POST",
                      url: "/admin/jobs/{{$job->id}}/update-payment",
                      data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        status : status
                      },
                      success: function(data){
                        swal("Updated!", "Payment status has been deleted successfully!", "success");
                        location.reload();
                      },
                      error: function(data){
                        swal("Error!", "Sorry, could not update payment status!", "error");
                      }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
        }
    </script>
@endsection