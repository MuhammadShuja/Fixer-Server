<style>
    .sub-menu>li>a>span{
        margin-left: 1.5rem;
    }
    .nav-last-item{
        position: fixed;
        bottom: 20px;
    }
    .nav-item .btn-quick-action{
        display: none;
        color: #DEE1E5;
        background-color: transparent;
        border: 0px;
        margin: 0px;
        padding: 0px;
        float: right;
        margin-right: 10px;
    }
    .nav-item:hover .btn-quick-action{
        display: block;
        color: #212B36;
    }
    .page-sidebar .page-sidebar-menu>li a{
        border-left: 0px;
    }
</style>
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse" style="border-right: 1px solid #b7c9d6; border-radius: 0px;">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @can('manage dashboard')
                <!-- BEGIN DASHBOARD -->
                <li class="nav-item 
                    @if(Request::segment(2) == 'dashboard') active @endif
                ">
                    <a href="/admin/dashboard" class="nav-link nav-toggle">
                        <i class="icon-grid"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <!-- END DASHBOARD -->
            @endcan
            @can('manage services')
                <!-- BEGIN PRODUCTS -->
                <li class="nav-item
                    @if(Request::segment(2) == 's') active open @endif
                ">
                    <a href="/admin/s/services" class="nav-link nav-toggle">
                        <i class="icon-magic-wand"></i>
                        <span class="title">Services</span>
                        <button class="btn-quick-action" onclick="window.location.href='/admin/s/services/new'"><i class="icon-plus"></i></button>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item 
                            @if(Request::segment(3) == 'services') active @endif
                        ">
                            <a href="/admin/s/services" class="nav-link ">
                                <span class="title">All Services</span>
                            </a>
                        </li>
                        @can('manage workers')
                            <li class="nav-item
                                @if(Request::segment(3) == 'workers') active @endif
                            ">
                                <a href="/admin/s/workers" class="nav-link ">
                                    <span class="title">Workers</span>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item
                            @if(Request::segment(3) == 'categories') active @endif
                        ">
                            <a href="/admin/s/categories" class="nav-link ">
                                <span class="title">Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END PRODUCTS -->
            @endcan
            @can('manage jobs')
                <!-- BEGIN ORDERS -->
                <li class="nav-item 
                    @if(Request::segment(2) == 'jobs') active open @endif
                ">
                    <a href="/admin/jobs" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">Jobs</span>
                    </a>
                </li>
                <!-- END ORDERS -->
            @endcan
            @can('manage customers')
                <!-- BEGIN CUSTOMERS -->
                <li class="nav-item
                    @if(Request::segment(2) == 'customers') active open @endif
                ">
                    <a href="/admin/customers" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <!-- END CUSTOMERS -->
            @endcan
            @can('manage payments')
                <!-- BEGIN PAYMENTS -->
                <li class="nav-item
                    @if(Request::segment(2) == 'payments') active open @endif
                ">
                    <a href="/admin/payments" class="nav-link nav-toggle">
                        <i class="icon-credit-card"></i>
                        <span class="title">Payments</span>
                    </a>
                </li>
                <!-- END PAYMENTS -->
            @endcan
            @can('manage settings')
                <!-- BEGIN SETTINGS -->
                <li class="nav-item nav-last-item
                    @if(Request::segment(2) == 'settings') active @endif
                ">
                    <a href="/admin/settings" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <!-- END SETTINGS -->
            @endcan
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>