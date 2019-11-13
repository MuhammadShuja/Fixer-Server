@extends('back.master')
@section('title')
    <title>Dashboard ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
  <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="/vendor/dashboard">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="row widget-row">
                        <div class="col-md-12">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bjobed">
                                <h4 class="widget-thumb-heading">Lifetime Sales</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue-hoki icon-wallet"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">
                                            {!!$trend_sales!!}
                                            This week: {{ config('app.currency') }} {{$lw_sales}}
                                        </span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$lt_sales}}">{{ config('app.currency') }} {{$lt_sales}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-12">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bjobed">
                                <a href="/admin/jobs" style="text-decoration: none;">
                                    <h4 class="widget-thumb-heading">Jobs</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-blue-hoki icon-layers"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">
                                                {!!$trend_jobs!!}
                                                This week: {{$lw_jobs}} new
                                            </span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$lt_jobs}}">{{$lt_jobs}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-12">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bjobed">
                                <a href="/admin/customers" style="text-decoration: none;">
                                    <h4 class="widget-thumb-heading">Customers</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-blue-hoki icon-user"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">
                                                {!!$trend_users!!}
                                                This week: {{$lw_users}} new
                                            </span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$lt_users}}">{{$lt_users}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-12">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bjobed">
                                <a href="/admin/s/services" style="text-decoration: none;">
                                    <h4 class="widget-thumb-heading">Services</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-blue-hoki icon-present"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">
                                                {!!$trend_services!!}
                                                This week: {{$lw_services}} new
                                            </span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$lt_services}}">{{$lt_services}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-12">
                    <div class="row">                        
                        <div class="col-md-12">
                            <div class="portlet light bjobed">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number visits" data-percent="{{$completed_jobs}}">
                                                    <span>{{$completed_jobs}}</span>% </div>
                                                <a class="title" href="javascript:;"> Completed Jobs
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number bounce" data-percent="{{$rejected_jobs}}">
                                                    <span>{{$rejected_jobs}}</span>% </div>
                                                <a class="title" href="javascript:;"> Rejected Jobs
                                                </a>
                                            </div>
                                        </div>                                
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number transactions" data-percent="{{$cancelled_jobs}}">
                                                    <span>{{$cancelled_jobs}}</span>% </div>
                                                <a class="title" href="javascript:;"> Cancelled Jobs
                                                </a>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet light bjobed">                                
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#overview_1" data-toggle="tab"> Latest Jobs </a>
                                            </li>
                                            <li>
                                                <a href="#overview_2" data-toggle="tab"> New Customers </a>
                                            </li>
                                            <li>
                                                <a href="#overview_3" data-toggle="tab"> New Services </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="overview_1">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bjobed">
                                                        <thead>
                                                            <tr>
                                                                <th> Customer Name </th>
                                                                <th> Date </th>
                                                                <th> Service </th>
                                                                <th> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($latest_jobs as $job)
                                                                <tr>
                                                                    <td>
                                                                        <a href="/admin/customers/{{$job->customer->id}}"> {{$job->customer->name}} </a>
                                                                    </td>
                                                                    <td> {{ date("d/m/Y H:i:s", strtotime('+5 hours', strtotime($job->created_at))) }} </td>
                                                                    <td>
                                                                        @if($job->name)
                                                                        {{$job->name}}
                                                                        @else
                                                                        {{$job->job_notes}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="/admin/jobs/{{$job->id}}" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="overview_2">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bjobed">
                                                        <thead>
                                                            <tr>
                                                                <th> Customer Name </th>
                                                                <th> Email </th>
                                                                <th> Phone </th>
                                                                <th> Jobs </th>
                                                                <th> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($latest_users as $user)
                                                                <tr>
                                                                    <td>
                                                                        <a href="/admin/customers/{{$user->id}}"> {{$user->name}} </a>
                                                                    </td>
                                                                    <td> {{$user->email}} </td>
                                                                    <td> {{$user->phone}} </td>
                                                                    <td> {{$user->jobs->count()}} </td>
                                                                    <td>
                                                                        <a href="/admin/customers/{{$user->id}}" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="overview_3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bjobed">
                                                        <thead>
                                                            <tr>
                                                                <th> Service Name </th>
                                                                <th> Category </th>
                                                                <th> Base Charges </th>
                                                                <th> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($latest_services as $service)
                                                                <tr>
                                                                    <td>
                                                                        <a href="/admin/p/services/{{$service->id}}"> {{$service->name}} </a>
                                                                    </td>
                                                                    <td>
                                                                        {{config('app.currency').' '.$service->price}}
                                                                    </td>
                                                                    <td> {{$service->category->name}} </td>
                                                                    <td>
                                                                        <a href="/admin/p/services/{{$service->id}}" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bjobed">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_sales" style="margin: 0px 10px;"></div>
                                                <a class="title" href="javascript:;"> Last 30 days: Sales
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet light bjobed">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_jobs" style="margin: 0px 10px;"></div>
                                                <a class="title" href="javascript:;"> Last 30 days: Jobs
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="/admin/jobs#pending">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$pending_jobs_count}}">{{$pending_jobs_count}}</span></div>
                                    <div class="desc"> New Job(s) </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a class="dashboard-stat dashboard-stat-v2 yellow-gold" href="/admin/jobs#ready_to_ship">
                                <div class="visual">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$rts_jobs_count}}">{{$rts_jobs_count}}</span>
                                    </div>
                                    <div class="desc"> Assigned </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection
@section('scripts')
    {!!Html::script('js/back/jquery.flot.min.js')!!}    
    {!!Html::script('js/back/jquery.flot.resize.min.js')!!}
    {!!Html::script('js/back/jquery.easypiechart.min.js')!!}
    {!!Html::script('js/back/jquery.flot.categories.min.js')!!}
    {!!Html::script('js/back/page-level-scripts/sparkline.min.js')!!}
    {!!Html::script('js/back/amcharts.js')!!}
    {!!Html::script('js/back/pie.js')!!}
    <script>
        var Dashboard = function() {
            return {
                initEasyPieCharts: function() {
                    jQuery().easyPieChart && ($(".easy-pie-chart .number.transactions").easyPieChart({
                        animate: 1e3,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor("yellow")
                    }), $(".easy-pie-chart .number.visits").easyPieChart({
                        animate: 1e3,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor("green")
                    }), $(".easy-pie-chart .number.bounce").easyPieChart({
                        animate: 1e3,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor("red")
                    }), $(".easy-pie-chart-reload").click(function() {
                        $(".easy-pie-chart .number").each(function() {
                            var e = Math.floor(100 * Math.random());
                            $(this).data("easyPieChart").update(e), $("span", this).text(e)
                        })
                    }))
                },
                initSparklineCharts: function() {
                    jQuery().sparkline && (
                     $("#sparkline_sales").sparkline([{{$l30_sales}}], {
                        type: "line",
                        width: "300",
                        height: "60",
                        lineColor: "#ffb848"
                    }), $("#sparkline_jobs").sparkline([{{$l30_jobs}}], {
                        type: "line",
                        width: "300",
                        height: "60",
                        lineColor: "#ffb848"
                    }))
                },
                initAmChart4: function() {
                    if ("undefined" != typeof AmCharts && 0 !== $("#dashboard_amchart_4").size()) {
                        var e = AmCharts.makeChart("dashboard_amchart_4", {
                            type: "pie",
                            theme: "light",
                            path: "../assets/global/plugins/amcharts/ammap/images/",
                            dataProvider: [{
                                country: "Lithuania",
                                value: 260
                            }, {
                                country: "Ireland",
                                value: 201
                            }, {
                                country: "Germany",
                                value: 65
                            }, {
                                country: "Australia",
                                value: 39
                            }, {
                                country: "UK",
                                value: 19
                            }, {
                                country: "Latvia",
                                value: 10
                            }],
                            valueField: "value",
                            titleField: "country",
                            outlineAlpha: .4,
                            depth3D: 15,
                            balloonText: "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                            angle: 30,
                            "export": {
                                enabled: !0
                            }
                        });
                        jQuery(".chart-input").off().on("input change", function() {
                            var t = jQuery(this).data("property"),
                                a = e,
                                i = Number(this.value);
                            e.startDuration = 0, "innerRadius" == t && (i += "%"), a[t] = i, e.validateNow()
                        })
                    }
                },
                init: function() {
                    this.initEasyPieCharts(),
                    this.initSparklineCharts(),
                    this.initAmChart4()
                }
            }
        }();


        jQuery(document).ready(function() {
            Dashboard.init();
        });
    </script>
@endsection