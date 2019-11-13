<style>
    .page-header.navbar{
        background: #FFFFFF;
        box-shadow: 0 2px 4px rgba(0,0,0,.1);
        border: 0px;
    }
    .page-header.navbar .page-logo{
        background: #FAFBFC;
        width: 255px;
        border-right: 1px solid #b7c9d6;
    }
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
    .form-actions-menu{
        height: 100%;
        padding: 15px;
        margin-right: 105px;
    }
    .form-actions-menu .btn-c{
        margin-left: 10px;
    }
    .form-action-title{
        font-weight: 600;
        margin-left: 90px;
        font-size: 20px;
    }
</style>
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="/admin/dashboard">
                        <img src="{{URL::asset('/images/default/logo.png')}}" alt="logo" class="logo-default" height="22px" />
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <div class="page-actions">
                    <h4 class="form-action-title font-grey-cascade">
                        @yield('form-title')
                    </h4>
                </div>
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="form-actions-menu">
                        @yield('form-actions')
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>