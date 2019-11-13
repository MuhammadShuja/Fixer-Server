@extends('back.master')
@section('content')
<style>
    .config-item{
        text-decoration: none;
        color: grey;
    }
    .config-item>.wrapper:hover{
        background-color: #F1F5F9;
    }
    .config-item>.wrapper{        
        padding: 10px;
        border-radius: 3px;
        height: 100px;
    }
    .config-item>.wrapper .head{
        background-color: #e9e9e9;
        padding: 12px;
        border-radius: 3px;
        width: 52px;
        height: 52px;
    }
    .config-item>.wrapper .head>i{
        font-size: 28px;
        line-height: 28px;
    }
    .config-item>.wrapper .body{
        /*float: right;*/
    }
    .config-item>.wrapper .body .title{
        font-size: 16px;

    }
</style>
  <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Settings</h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="/admin/settings/general">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-settings"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    General
                                                </span>
                                                <p>
                                                    View and Update your store details
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @can('manage staff')
                        <!-- BEGIN STAFF -->
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Account
                                                </span>
                                                <p>
                                                    Manage your account and permission
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END STAFF -->
                        @endcan
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="/admin/settings/staff">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Staff
                                                </span>
                                                <p>
                                                    Manage your staff and user permissions
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-organization"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Warehouses
                                                </span>
                                                <p>
                                                    Manage warehouses and permissions
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-basket-loaded"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Checkout
                                                </span>
                                                <p>
                                                    Customiize online checkout settings
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-plane"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Shipping
                                                </span>
                                                <p>
                                                    View and update shipping methods
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-screen-desktop"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Storefront
                                                </span>
                                                <p>
                                                    Edit storefront template settings
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-support"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Help Center
                                                </span>
                                                <p>
                                                    Manage user's help and support center
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a class="config-item" href="javascript:;">
                                <div class="wrapper">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="head">
                                                <i class="icon-wallet"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="body">
                                                <span class="title font-blue">
                                                    Payment Methods
                                                </span>
                                                <p>
                                                    Manage you store's payment methods
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        
    </script>    
@endsection