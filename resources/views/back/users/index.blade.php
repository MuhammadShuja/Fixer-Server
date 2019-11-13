@extends('back.master')
@section('title')
    <title>Users ~ {{ config('app.sys') }}</title>
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
                    <h1>Users</h1>
                </div>
                <!-- END PAGE TITLE -->
                <div class="page-toolbar">
                    <a class="btn-c btn-p" href='/admin/users/new'>Add user</a>
                </div>
            </div>            
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- BEGIN TABLE PORTLET-->
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="toolbar-c">
                        <ul class="nav nav-tabs">
                            <li>
                                <a onclick="hidePanel()" id="btnPrint"><i class="fa fa-print"></i> Print</a>
                            </li>
                            <li>
                                <a onclick="showPanel(this)" href="#tabExport" data-toggle="tab"><i class="fa fa-upload"></i> Export</a>
                            </li>
                        </ul>
                        <div class="tab-content hide" style="padding: 10px;" id="toolbarPanel">
                            <div class="tab-pane" id="tabExport">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn font-grey-mint" id="btnCopy"><i class="fa fa-clipboard"></i> Copy</a>
                                        <a class="btn font-grey-mint" id="btnCSV"><i class="fa fa-file-text-o"></i> CSV</a>
                                        <a class="btn font-grey-mint" id="btnXLS"><i class="fa fa-file-excel-o"></i> XLS</a>
                                        <a class="btn font-grey-mint" id="btnPDF"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                        <a class="btn font-blue-c pull-right" onclick="hidePanel()">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <input type="text" class="form-control" id="dtSearch" placeholder="Search users">
                                            <span class="input-group-btn" id="colvis">
                                                <!-- <a class="btn grey" id="btnColumns" style="position: relative;">Columns <i class="fa fa-angle-down"></i></a> -->
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
                                                <th class="title-column"> Name </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Phone </th>
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
                   window.open('{{config('APP_URL')}}/admin/users/'+$(this).closest('tr').find('td:eq(0)').data('link'));
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
                    "ajax": "/api/admin/users?status="+key,
                    "autoWidth":false,
                    fixedHeader: {
                        header: true,
                        headerOffset: $('.navbar-fixed-top').outerHeight()
                    },
                    "dom": '<"top">rt<"bottom"lpi><"clear">',
                    // "headerCallback": function( thead, data, start, end, display ) {
                    //     $(thead).find('th').eq(0).html( 'Displaying '+(end-start)+' records' );
                    // }

                    "columns": [
                        { "data": "name", "width": "20%", "className": "title-column" },
                        { "data": "username", "width": "20%" },
                        { "data": "email", "width": "20%" },
                        { "data": "phone", "width": "20%" },
                        { "data": "created_at", "width": "20%" }
                    ],
                    "order": [[1, 'desc']],
                    createdRow: function( row, data, dataIndex ) {
                        $(row).find('td:eq(0)').attr('data-link', data.id);
                    },
            });

            var export_filename = '~ {{ config('app.sys') }}_Users';

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
                        extension: '.csv',
                    }, {
                        text: '<i class="fa fa-file-excel-o"></i> XLS',
                        extend: 'excel',
                        className: 'btn font-grey-mint',
                        title: export_filename,
                        extension: '.xls',
                    }, {
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        extend: 'pdf',
                        className: 'btn font-grey-mint',
                        title: export_filename,
                        extension: '.pdf',
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