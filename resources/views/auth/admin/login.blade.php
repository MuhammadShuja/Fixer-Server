<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login ~ {{config('app.sys')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
        {!!Html::style('css/back/font-awesome/css/font-awesome.min.css')!!}
        {!!Html::style('css/back/simple-line-icons.min.css')!!}
        {!!Html::style('css/back/bootstrap.min.css')!!}
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        {!!Html::style('css/back/components-rounded.min.css')!!}
        {!!Html::style('css/back/plugins.min.css')!!}
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES -->
        {!!Html::style('css/back/page-level-assets/login.min.css')!!}
        <!-- END PAGE LEVEL STYLES -->
        <style>
            .btn-c {
              position: relative;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              min-height: 3.6rem;
              min-width: 3.6rem;
              margin: 0;
              padding: .7rem 1.6rem;
              background: linear-gradient(180deg,#fff,#f9fafb);
              border: .1rem solid #c4cdd5;
              box-shadow: 0 1px 0 0 rgba(22,29,37,.05);
              border-radius: 3px;
              line-height: 1;
              color: #212b36;
              text-align: center;
              cursor: pointer;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
              text-decoration: none;
              transition-property: background,border,box-shadow;
              transition-duration: .2s;
              transition-timing-function: cubic-bezier(.64,0,.35,1);
            }
            .btn-c:hover {
              background: linear-gradient(180deg,#f9fafb,#f4f6f8);
              border-color: #c4cdd5;
            }

            .btn-c:focus {
              border-color: #5c6ac4;
              outline: 0;
              box-shadow: 0 0 0 1px #5c6ac4;
            }

            @media (-ms-high-contrast:active) {
              .btn-c:focus {
                outline: 2px dotted;
              }
            }

            .btn-c:active {
              border-color: #c4cdd5;
              box-shadow: 0 0 0 0 transparent,inset 0 1px 1px 0 rgba(99,115,129,.1),inset 0 1px 4px 0 rgba(99,115,129,.2);
            }

            .btn-c:active {
              background: linear-gradient(180deg,#f4f6f8,#f4f6f8);
            }
            .btn-p {
              background: linear-gradient(180deg,#6371c7,#5563c1);
              box-shadow: inset 0 1px 0 0 #6774c8,0 1px 0 0 rgba(22,29,37,.05),0 0 0 0 transparent;
            }

            .btn-p,.btn-p:hover {
              border-color: #3f4eae;
              color: #fff;
            }

            .btn-p:hover {
              background: linear-gradient(180deg,#5c6ac4,#4959bd);
              text-decoration: none;
            }

            .btn-p:focus {
              border-color: #202e78;
              box-shadow: inset 0 1px 0 0 #6f7bcb,0 1px 0 0 rgba(22,29,37,.05),0 0 0 1px #202e78;
            }

            .btn-p:active {
              background: linear-gradient(180deg,#3f4eae,#3f4eae);
              border-color: #38469b;
              box-shadow: inset 0 0 0 0 transparent,0 1px 0 0 rgba(22,29,37,.05),0 0 1px 0 #38469b;
            }
            .login .logo{
              margin-top: 100px;
            }
        </style>

    </head>
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="javascript:;">
                <img src="{{URL::asset('/images/default/logo-full-bright.png')}}" alt="{{config('app.sys')}}" height="96px" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" autofocus />
                        @if ($errors->has('username'))
                            <span style="color: red;">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                        @if ($errors->has('password'))
                            <span style="color: red;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-c btn-p btn-block"> Login </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> {{date('Y')}} &copy; {{config('app.sys')}}</div>
        <!-- END COPYRIGHT -->

        <!--[if lt IE 9]>
        {!!Html::script('js/back/respond.min.js')!!}
        {!!Html::script('js/back/excanvas.min.js')!!}
        {!!Html::script('js/back/ie8.fix.min.js')!!}
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {!!Html::script('js/back/jquery.min.js')!!}
        {!!Html::script('js/back/bootstrap.min.js')!!}
        {!!Html::script('js/back/js.cookie.min.js')!!}
        {!!Html::script('js/back/jquery.slimscroll.min.js')!!}
        {!!Html::script('js/back/jquery.blockui.min.js')!!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!!Html::script('js/back/jquery.validate.min.js')!!}
        {!!Html::script('js/back/additional-methods.min.js')!!}
        {!!Html::script('js/back/page-level-scripts/jquery.backstretch.min.js')!!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!!Html::script('js/back/app.min.js')!!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!!Html::script('js/back/page-level-scripts/login.min.js')!!}
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>