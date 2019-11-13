<style>
    .search-box{        
        position: absolute;
        width: 50%;
        left: 25%;
        margin-top: 12px;
    }
    .search-input{
        background:#43467f;
        height: 51px;
        min-height: 51px;
        border-radius:3px;
        padding:7px 10px;
        box-sizing: border-box;
        transition: background .2s ease;
        color:#212B36;
        font-family:Open Sans,Helvetica,Roboto,Arial,sans-serif;
        font-size:18px;
        line-height:normal;
        width: 100%;
        border: none;
    }
    .search-input:focus{
        outline: none;
        background-color: #E6ECF2;
    }
    .search-input::-webkit-input-placeholder,
    .search-input:-moz-placeholder,
    .search-input::-moz-placeholder,
    .search-input:-ms-input-placeholder{
        color:#fff;
    }
</style>
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="/admin/dashboard">
                        <img src="{{URL::asset('/images/default/logo-light.png')}}" alt="logo" class="logo-default" height="22px" />
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <div class="search-box">
                    <form class="form-horizontal" action="/admin/search" method="GET">
                        <input type="text" class="search-input" placeholder="Search">
                    </form>
                </div>
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{auth('admin')->user()->name}} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="John Doe" class="img-circle" src="{{ URL::asset('images/default/profile-placeholder-m.png')}}" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>    
                                        <a class="dropdown-item" href="/logout"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Logout
                                        </a>
                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>