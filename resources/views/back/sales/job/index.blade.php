@extends('back.master')
@section('title')
    <title>Jobs ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('assets')
    <style>
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Jobs</h1>
                </div>
                <!-- END PAGE TITLE -->
                <div class="page-toolbar">
                    <a class="btn-c btn-p" href='/admin/jobs/new'>Add job</a>
                </div>
            </div>            
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- BEGIN TABLE PORTLET-->
            <!-- BEGIN TOOLBAR -->
            @include('back.layout.index-toolbar')
            <!-- END TOOLBAR -->
            <div class="row">
                <div class="col-md-12 tabs-c">
                    <ul class="nav nav-tabs">
                        <li>
                            <a class="data-tab" href="#tab_content" data-toggle="tab" data-key="all" id="tab_all"> All </a>
                        </li>
                        @foreach($statuses as $status)
                            <li>
                                <a class="data-tab" href="#tab_content" data-toggle="tab" data-key="{{$status->key}}"> {{$status->label}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="portlet light portlet-fit bordered" style="border-top-left-radius: 0px;">
                <div class="portlet-body">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="dtSearch" placeholder="Search jobs">
                                            <span class="input-group-btn" id="colvis">class="fa fa-angle-down"></i></a> -->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab_content">
                                    <table class="table table-striped table-hover" id="indexTable">
                                        <thead>
                                            <tr>
                                                <th class="title-column"> Reference </th>
                                                <th> Service </th>
                                                <th> Customer </th>
                                                <th> Worker </th>
                                                <th> Amount </th>
                                                <th> Payment </th>
                                                <th> Created At </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TABLE PORTLET-->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('scripts')
    <script>
        window.onload = function(){
            $(document).ready(function() {

                $('#tab_all').tab('show');
                populateData('all');

                $('#indexTable').on('click', 'tbody td', function(){
                   window.open('{{config('APP_URL')}}/admin/jobs/'+$(this).closest('tr').find('td:eq(0)').data('link'));
                });

                $('.data-tab').on('shown.bs.tab', function (event) {
                    populateData($(event.target).data('key'));
                });

            } );
        }

        function populateData(key){
            var dt = $('#indexTable').on('error.dt', function (e, settings, techNote, message) {
                    swal('Error', 'Error in loading data from server!', 'error');
                    console.log(message);
                }).DataTable({
                    "destroy": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/api/admin/jobs?status="+key,
                    "autoWidth":false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('.navbar-fixed-top').outerHeight()
                    },
                    "dom": '<"top">rt<"bottom"lpi><"clear">',

                    "columns": [
                        { "data": "reference", "width": "10%", "className": "title-column" },
                        { "data": "service", "width": "15%" },
                        { "data": "customer", "width": "15%" },
                        { "data": "worker", "width": "15%" },
                        { "data": "amount", "width": "15%" },
                        {
                            "data": "payment", "width": "15%", "orderable": false,
                            "render": function ( data, type, row, meta ) {
                                if(data == 'pending'){
                                    return '<span class="iq-badge yellow"><i class="fa fa-circle-o"></i><span class="label">Pending</span></span>';
                                }
                                else if(data == 'paid'){
                                    return '<span class="iq-badge green"><i class="fa fa-circle-o"></i><span class="label">Paid</span></span>';
                                }
                            }
                        },
                        { "data": "created_at", "width": "15%" }
                    ],
                    "order": [[0, 'desc']],
                    createdRow: function( row, data, dataIndex ) {
                        $(row).find('td:eq(0)').attr('data-link', data.id);
                    },
            });

            var export_filename = '{{ config('app.sys') }}_Jobs';

            // Configure Export Buttons
            new $.fn.dataTable.Buttons( dt, {
                buttons: [
                    {
                        text: '<i class="fa fa-print"></i> Print',
                        extend: 'print',
                        className: 'btn font-grey-mint',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        text: '<i class="fa fa-clipboard"></i> Copy',
                        extend: 'copy',
                        className: 'btn font-grey-mint',
                    }, {
                        text: '<i class="fa fa-file-text-o"></i> CSV',
                        extend: 'csv',
                        className: 'btn font-grey-mint',
                        title: export_filename,
                        extension: '.csv'
                    }, {
                        text: '<i class="fa fa-file-excel-o"></i> XLS',
                        extend: 'excel',
                        className: 'btn font-grey-mint',
                        title: export_filename,
                        extension: '.xls'
                    }, {
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        extend: 'pdf',
                        className: 'btn font-grey-mint',
                        title: export_filename,
                        extension: '.pdf'
                    },
                ]
            } );
             
            // Add the Export buttons to the toolbox
            // dt.buttons( 0, null ).container().appendTo( '#exportPanel' );

            new $.fn.dataTable.Buttons( dt, {
                buttons: [
                    {
                        extend: 'colvis',
                        text: 'Columns <i class="fa fa-angle-down"></i>',
                        className: 'btn grey'
                    }
                ],
            } );
             
            // Add the select columns button to the toolbox
            dt.buttons( 1, null ).container().appendTo( '#colvis' );

            $('#dtSearch').on( 'change keyup paste', function () {
                dt.search($('#dtSearch').val()).draw();
            });

            $("#btnPrint").on("click", function() {
                dt.button( '.buttons-print' ).trigger();
            });
            $("#btnCopy").on("click", function() {
                dt.button( '.buttons-copy' ).trigger();
            });
            $("#btnCSV").on("click", function() {
                dt.button( '.buttons-csv' ).trigger();
            });
            $("#btnXLS").on("click", function() {
                dt.button( '.buttons-excel' ).trigger();
            });
            $("#btnPDF").on("click", function() {
                dt.button( '.buttons-pdf' ).trigger();
            });
        }
    </script>
@endsection