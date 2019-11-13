<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('title')
        @yield('meta')

        <link rel="apple-touch-icon" sizes="180x180" href="/storage/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon/favicon-16x16.png">
        <link rel="manifest" href="/storage/favicon/site.webmanifest">
        <link rel="mask-icon" href="/storage/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/storage/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#00a300">
        <meta name="msapplication-config" content="/storage/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!!Html::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
        {!!Html::style('css/back/font-awesome/css/font-awesome.min.css')!!}
        {!!Html::style('css/back/simple-line-icons.min.css')!!}
        {!!Html::style('css/back/bootstrap.min.css')!!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!!Html::style('css/back/components-rounded.min.css')!!}
        {!!Html::style('css/back/plugins.min.css')!!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {!!Html::style('css/back/layout.min.css')!!}
        {!!Html::style('css/back/default.min.css')!!}
        {!!Html::style('css/back/custom.min.css')!!}
        <!-- END THEME LAYOUT STYLES -->
        {!!Html::style('css/back/datatables.min.css')!!}
        {!!Html::style('css/back/datatables.bootstrap.css')!!}
        {!!Html::style('css/back/fixedHeader.dataTables.min.css')!!}
        {!!Html::style('css/back/sweetalert.css')!!}
        {!!Html::style('css/back/dropzone.min.css')!!}
        {!!Html::style('css/back/dropzone.basic.min.css')!!}
        {!!Html::style('css/back/page-level-assets/bootstrap-select.css')!!}
        {!!Html::style('plugins/Trumbowyg-master/dist/ui/trumbowyg.min.css')!!}
        {!!Html::style('css/back/page-level-assets/selectize.default.css')!!}

        <!-- BEGIN PAGE LEVEL ASSETS -->
        @yield('assets')
        <!-- END PAGE LEVEL ASSETS -->
        

        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            .page-header.navbar .page-logo .logo-default {
                margin: 25px 10px 0;
                height: 28px;
            }
            .iq-badge{
                border: solid 2px #F1F5F9;
                border-radius: 20px;
                padding: 2px 8px;
                margin-right: 5px;
                background: #D3D3D3;
                font-size: 12px;
            }
            .iq-badge .label{
                color: #2F353B;
                font-size: 12px;
                font-weight: 600;
            }
            .iq-badge.orange{
                background: #FFC58B;
            }
            .iq-badge.orange i{
                color: #C05717;
            }

            .iq-badge.green{
                background: #BBE5B3;
            }
            .iq-badge.green i{
                color: #108043;
            }

            .iq-badge.red{
                background: #FDAC9A;
            }
            .iq-badge.red i{
                color: #BF0711;
            }

            .iq-badge.yellow{
                background: #FFEA8A;
            }
            .iq-badge.yellow i{
                color: #8D6519;
            }
            .iq-info-block{
                display: block;
                padding-bottom: 10px;
            }
            .iq-info-block .heading,
            .iq-info-block .body{
                display: block;
            }
            .page-header.navbar .top-menu .navbar-nav>li.dropdown>.dropdown-toggle:hover,
            .page-header.navbar .top-menu .navbar-nav>li.dropdown>.dropdown-toggle:focus,
            .page-header.navbar .top-menu .navbar-nav>li.dropdown>.dropdown-toggle:active{
                background-color: #43467F !important;
            }
            .dataTables_wrapper .dataTables_processing{
                padding-top: 7px;
            }
            .image-upload-wrapper{
                width: 100%;
                border: 2px dashed rgb(223, 227, 232);
                border-image: initial;
                border-radius: 3px;
                padding: 10px 20px;
                background-color: #FFFFFF;
                text-align: center;
                min-height: 150px;
            }
            .image-upload-wrapper input[type=file]{
                opacity: 0;
                filter:alpha(opacity=0);
            }
            .image-wrapper{
                width: 100%;
                text-align: center;
            }
            .image-wrapper-bordered{
                border: 2px dashed rgb(223, 227, 232);
                border-image: initial;
                border-radius: 3px;
                padding: 10px 20px;
            }
            .image-wrapper img{
                width: 150px;
                height: auto;
                border: 1px solid rgb(223, 227, 232);
                padding: 0px;
                margin: 0px;
            }
            .trumbowyg-box, .trumbowyg-editor{
                margin-top: 0px;
            }
            .settings-form .head{
                padding: 20px 0px;
            }
            .settings-form .head .title{
                font-size: 16px;
                font-weight: 600;
                display: block;
            }
            .settings-form .head .description{
                margin-top: 10px;
                display: block;
            }
            .portlet.b-border{
                box-shadow: 0 0 0 0 rgba(0,0,0,0) !important;
                border-radius: 0px;
                border-bottom: 1px solid #b7c9d6;
                margin-bottom: 0px;
            }
            .form-control:focus{
                border: 2px solid #4b5bbe;
                outline: 0px;
                box-sizing: border-box !important;
            }
            .page-content.new-entry{
                padding: 10px 100px !important;
            }            
            .form-horizontal .control-label{
                text-align: left !important;
            }
            .toolbar-c .nav-tabs{
                margin-bottom: 0px;
                border-bottom: 0px;
            }
            .toolbar-c .nav-tabs li a{
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                font-size: 18px;
                color: #525E64;
            }
            .toolbar-c .nav-tabs li a:hover{
                background-color: #F1F5F9;
                border-bottom: 0px;        
                border-radius: 5px;
            }
            .toolbar-c .nav-tabs li.active a{
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;
                background-color: #F1F5F9;
                border: 1px solid #F1F5F9;
                cursor: pointer;        
            }
            .toolbar-c .tab-content{
                background-color: #F1F5F9;
            }


            .tabs-c .nav-tabs{
                margin-bottom: 0px;
                border-bottom: 0px;
            }
            .tabs-c .nav-tabs li a{
                background-color: #F1F5F9;
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                border: 1px solid #D9D9D9;
                margin-right: 2px;
                border-bottom: 0px;
            }
            .tabs-c .nav-tabs li.active a{
                background-color: #fff;
                border-bottom: 1px solid #fff;
            }
            .tabs-c .tab-content{
                background-color: #fff;
            }
            table.dataTable thead th{
                vertical-align: middle;
                text-align: center;
                padding: 20px 0px;
            }
            table.dataTable thead th:after{
                bottom: 19px !important;
            }

            table.dataTable tbody td{
                vertical-align: middle;
                text-align: center;
                cursor: pointer;
                padding: 20px 0px;
            }
            table.dataTable thead .title-column,
            table.dataTable tbody .title-column{
                text-align: left;                
            }
            table td.title-column{
                color: #3598DC;
            }
            .table>thead>tr>th{
                border-bottom: 1px solid #C9C9C9;
            }
            .dt-button{
                border-top-left-radius: 0px;
                border-bottom-left-radius: 0px;
            }

            .page-title>h1{
                color: #212B36!important;
                font-size: 2.4rem!important;
                line-height: 2.8rem!important;
                font-weight: 600!important;
                margin-bottom: 10px!important;
            }
            .page-action-back, .page-action-new{
                display: inline-block;
                text-decoration: none;
                font-weight: 600;
                font-size: 14px;
                color: #637381;
                padding: 10px;
                margin-left: -10px;
                margin-bottom: 5px;
                border-radius: 3px;
            }
            .page-action-back>i{
                font-size: 18px;
            }
            .page-action-back:hover,
            .page-action-new:hover{
                text-decoration: none;
                color: #212B36;
            }
            .page-action-back:focus,
            .page-action-new:hover{
                background-color: #DEE1E5;
                text-decoration: none;
                color: #212B36;
            }
            .alert-dot{
                height: 4px;
                width: 4px;
                background-color: #ff0000;
                border-radius: 50%;
                display: inline-block;
            }
            .nav.alert-dot{
                height: 5px;
                width: 5px;
                position: absolute;
                top: 20px;
                left: 5px;
            }
            .tab.alert-dot{
                position: absolute;
                top: 5px;
                left: 50%;
                margin-left: -2px;
            }
            .tr.alert-dot{
                height: 5px;
                width: 5px;
                position: absolute;
                left: 8px;
                margin-top: -18px;
            }

            #indexTable .row-thumbnail{
                width: 80px;
                height: 80px;
                border: 1px solid #ECECEC;
                border-radius: 3px;
                background-color: #F1F5F9;
            }            
            .thumbnail-wrapper{
                position: relative;
            }
            .thumbnail-wrapper:hover .thumbnail-popover{
                display: block;
            }
            .thumbnail-popover{
                position: absolute;
                width: 200px;
                height: 200px;
                top: 50%;
                margin-top: -100px;
                left: -200px;
                z-index: 9999;
                display: none;
                box-shadow: 6px 0 30px 0 rgba(0, 0, 0, 0.3), 0 2px 2px 0 rgba(0, 0, 0, 0.1);
            }
            .thumbnail-popover-body{
                position: relative;
                width: 100%;
                height: 100%;
            }
            .thumbnail-popover-body:after{
                border-left: 20px solid #FFFFFF;
                border-top: 20px solid transparent;
                border-bottom: 20px solid transparent;
                right: -20px;
                bottom: 50%;
                margin-bottom: -20px;
                content: "";
                position: absolute;
                width: 0; 
                height: 0;
            }
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
            a.btn-c{
                text-decoration: none;
            }

            .btn-c svg {
              fill: #637381;
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

            .btn-c.disabled,.btn-c:active {
              background: linear-gradient(180deg,#f4f6f8,#f4f6f8);
            }

            .btn-c.disabled {
              transition: none;
              color: #919eab;
            }

            .btn-c.disabled svg {
              fill: #919eab;
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

            .btn-p svg {
              fill: #fff;
            }

            .btn-p.disabled {
              background: linear-gradient(180deg,#bac0e6,#bac0e6);
              border-color: #a7aedf;
              box-shadow: none;
              color: #fff;
            }

            .btn-p.disabled svg {
              fill: #fff;
            }

            .btn-x {
              background: linear-gradient(180deg,#e6391a,#d53417);
              box-shadow: inset 0 1px 0 0 #e73d1f,0 1px 0 0 rgba(22,29,37,.05),0 0 0 0 transparent;
            }

            .btn-x,.btn-x:hover {
              border-color: #b02b13;
              color: #fff;
            }

            .btn-x:hover {
              background: linear-gradient(180deg,#de3618,#c73016);
              text-decoration: none;
            }

            .btn-x:focus {
              border-color: #bf0711;
              box-shadow: inset 0 1px 0 0 #e84528,0 1px 0 0 rgba(22,29,37,.05),0 0 0 1px #bf0711;
            }

            .btn-x:active {
              background: linear-gradient(180deg,#b02b13,#b02b13);
              border-color: #992511;
              box-shadow: inset 0 0 0 0 transparent,0 1px 0 0 rgba(22,29,37,.05),0 0 1px 0 #992511;
            }

            .btn-x svg {
              fill: #fff;
            }

            .btn-x.disabled {
              background: linear-gradient(180deg,#f29484,#f29484);
              border-color: #ef816d;
              box-shadow: none;
              color: #fff;
            }

            .btn-x.disabled svg {
              fill: #fff;
            }

            .disabled {
              cursor: default;
              pointer-events: none;
            }
            .hide{
                display: none;
            }
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed">

        <!-- BEGIN HEADER -->
        @yield('header', \View::make('back.layout.header'))
        <!-- END HEADER -->

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            @include('back.layout.sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            @yield('content')
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        
        <!-- END FOOTER -->

        <!--[if lt IE 9]>
            {!!Html::script('js/back/respond.min.js')!!}
            {!!Html::script('js/back/excanvas.min.js')!!}
            {!!Html::script('js/back/ie8.fix.min.js')!!}
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {!!Html::script('js/back/jquery.min.js')!!}
        {!!Html::script('js/back/bootstrap.min.js')!!}
        {!!Html::script('js/back/bootstrap-switch.min.js')!!}
        {!!Html::script('js/back/js.cookie.min.js')!!}
        {!!Html::script('js/back/jquery.slimscroll.min.js')!!}
        {!!Html::script('js/back/jquery.blockui.min.js')!!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!!Html::script('js/back/app.min.js')!!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {!!Html::script('js/back/layout.min.js')!!}
        {!!Html::script('js/back/demo.min.js')!!}
        {!!Html::script('js/back/quick-sidebar.min.js')!!}
        {!!Html::script('js/back/quick-nav.min.js')!!}
        <!-- END THEME LAYOUT SCRIPTS -->
        
        {!!Html::script('js/back/jquery.validate.min.js')!!}
        {!!Html::script('js/back/additional-methods.min.js')!!}
        {!!Html::script('js/back/datatables.min.js')!!}
        {!!Html::script('js/back/datatables.bootstrap.js')!!}
        {!!Html::script('js/back/datatable.js')!!}
        {!!Html::script('js/back/dataTables.fixedHeader.min.js')!!}
        {!!Html::script('js/back/sweetalert.js')!!}
        {!!Html::script('js/back/jquery-ui.js')!!}
        {!!Html::script('js/back/page-level-scripts/bootstrap-select.min.js')!!}
        {!!Html::script('plugins/Trumbowyg-master/dist/trumbowyg.min.js')!!}
        {!!Html::script('js/back/page-level-scripts/selectize.min.js')!!}
        <script>

            var $handleControl = $('.widget-seo #slug');
            var handleControl = $('.widget-seo #slug').get(0);
            var handle = $('.widget-seo #slug').data('handle');
            var link_field = $('.widget-seo #slug').data('link-field');
            var fileIdCounter = 0;
            var filesToUpload = [];

            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'd/m/yyyy',
                    startDate: '0d'
                });
                // BEGEIN WIDGET MULTIPLE IMAGE UPLOAD
                    $('.widget-multiple-image-upload .upload-images').on('click', function(){
                        $(this).parents('.widget-multiple-image-upload').find('input[type=file]').trigger("click");
                    });

                    $('.widget-multiple-image-upload input:file').on('change', function(){
                        // App.blockUI({
                        //     target: ".widget-multiple-image-upload",
                        //     boxed: !0
                        // });
                        var input = $(this).get(0);
                        if (input.files) {
                            $(input).parents('.images-upload-wrapper').addClass('hide');
                            // $(input).parents('.uploads').find('.images-upload').empty();
                            var filesAmount = input.files.length;

                            var fileIdCounter = 0;

                            for (i = 0; i < filesAmount; i++) {
                                fileIdCounter++;
                                var file = input.files[i];
                                var fileId = fileIdCounter;

                                filesToUpload.push({
                                    id: fileId,
                                    file: file
                                });


                                var reader = new FileReader();

                                reader.onload = function(id) {
                                    return function(event){
                                        $(input).parents('.uploads').find('.images-upload').append(
                                            '<div class="image-wrapper ui-state-default">'+
                                            '<img class="image" src="'+event.target.result+'">'+
                                            '<div class="overlay">'+
                                            '<a class="btn eye" data-toggle="m-tooltip" title="View" data-placement="right" onclick="widgetViewImage(this)"><i class="icon-eye"></i></a>'+
                                            '<a class="btn trash" data-toggle="m-tooltip" title="Delete" data-placement="right" onclick="widgetRemoveImage(this)" data-id="'+id+'"><i class="icon-trash"></i></a>'+
                                            '</div></div>');
                                    }
                                }(fileId);

                                reader.readAsDataURL(input.files[i]);
                            }

                            // input.value = null;
                        }
                    });
                // BEGEIN WIDGET MULTIPLE IMAGE UPLOAD

                // BEGIN WIDGET PRICING
                    $(".widget-pricing input[name=price]").on("change keyup paste", function(){
                        if(isNaN($(this).val())){
                            $(this).siblings('.help-block').text('Sorry, please enter numeric value');
                        }
                        else{
                            $(this).siblings('.help-block').text('');

                            if($('.widget-pricing input[name=discount]').val()>0){
                                var off = $('.widget-pricing input[name=price]').val() * $('.widget-pricing input[name=discount]').val() / 100;
                                $('.widget-pricing input[name=special_price]').val(Math.round($('.widget-pricing input[name=price]').val() - off));
                            }
                        }
                    });

                    $(".widget-pricing input[name=discount]").on("change keyup paste", function(){
                        if(isNaN($(this).val())){
                            $(this).siblings('.help-block').text('Sorry, please enter numeric value');
                        }
                        else if($(this).val() != '' && ($(this).val() < 1 || $(this).val() > 99)){
                            $(this).siblings('.help-block').text('Sorry, percentage must be between 1 and 99');
                        }
                        else{
                            $(this).siblings('.help-block').text('');

                            if($('.widget-pricing input[name=price]').val()>0){
                                var off = $('.widget-pricing input[name=price]').val() * $(this).val() / 100;
                                $('.widget-pricing input[name=special_price]').val(Math.round($('.widget-pricing input[name=price]').val() - off));
                            }
                        }
                    });

                    $(".widget-pricing input[name=special_price]").on("change keyup paste", function(){
                        if(isNaN($(this).val())){
                            $(this).siblings('.help-block').text('Sorry, please enter numeric value');
                        }
                        else if($('.widget-pricing input[name=price]').val()>0){
                            if($(this).val() > $('.widget-pricing input[name=price]')){
                                $(this).siblings('.help-block').text('Sorry, sale price can not be higher than the list price');
                            }
                            else if($(this).val() != ''){
                                $(this).siblings('.help-block').text('');
                                var off = $('.widget-pricing input[name=special_price]').val() / $('.widget-pricing input[name=price]').val() * 100;
                                $('.widget-pricing input[name=discount]').val(Math.round(100 - off));
                            }
                        }
                    });
                // END WIDGET PRICING


                // $('.collapse').click();
                $('[data-toggle="m-tooltip"]').tooltip();

                // BEGIN WIDGET SEO
                    if($($handleControl).length){
                        addFormatter(handleControl, regexPrefix(/^https?:\/\/{{config('app.url_path')}}\/+handle+\//, '{{config('app.url')}}/'+handle+'/'));
                        $('#'+link_field).on('change paste keyup', slugUpdateOnNameFieldChangeEvent);
                    }
                // END WIDGET SEO

                // BEGEIN SINGLE IMAGE UPLOAD
                    $('.btn-single-image-upload').on('click', function(){
                        $(this).parents('.widget-single-image-upload').find('input[type=file]').trigger('click');
                    });
                    $('.btn-single-image-browse-again').on('click', function(){
                        $(this).parents('.widget-single-image-upload').find('input[type=file]').trigger('click');
                    });
                // END SINGLE IMAGE UPLOAD

                var ComponentsBootstrapSelect = function(){var n=function(){$(".bs-select").selectpicker({iconBase:"fa",tickIcon:"fa-check",title:" "})};return{init:function(){n()}}}();App.isAngularJsApp()===!1&&jQuery(document).ready(function(){ComponentsBootstrapSelect.init()});

                $('.textarea-editor').trumbowyg();

                $('.input-tags').removeClass('form-control').selectize({
                    plugins: ['remove_button', 'restore_on_backspace'],
                    delimiter: ',',
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input
                        }
                    }
                });

                $(".letter-count-input").on('change paste keyup', function () {
                    var text = $(this).val();
                    var length = text.length;
                    var allowed = $(this).data('letter-count');
                    $(this).parents('.form-group').find('.letter-count').text(length);
                    if(length > allowed){
                        $(this).val(text.substring(0, allowed));
                    }
                    $(this).parents('.form-group').find('.letter-count').text($(this).val().length);
                });

                $('.btn-save-form').on('click', function(){
                    $('#newEntry').submit();
                });

                $(document).on('keyup', function(event) {
                  if (event.which == 32 && event.target.id != 'dtSearch') {
                    $("#dtSearch").focus().select();
                  }
                });
            });
            function showPanel(e){
                $('#toolbarPanel').removeClass('hide');
            }

            function hidePanel(){
                $('#toolbarPanel').addClass('hide');
                $('.toolbar-c').find('li.active').removeClass('active');
            }

            // Util function
            function addFormatter (input, formatFn) {
              let oldValue = input.value;
              
              const handleInput = event => {
                const result = formatFn(input.value, oldValue, event);
                if (typeof result === 'string') {
                  input.value = result;
                }
                
                oldValue = input.value;
              }

              handleInput();
              input.addEventListener("input", handleInput);
            }
            // HOF returning regex prefix formatter
            function regexPrefix (regex, prefix) {
              return (newValue, oldValue) => regex.test(newValue) ? newValue : (newValue ? oldValue : prefix);
            }

            function convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/ /g,'-')
                    .replace(/[^\w-]+/g,'')
                    ;
            }
            // BEGEIN SINGLE IMAGE UPLOAD
            function uploadSingleImage(e, control_name){
                var parent = $(e).parents('.widget-single-image-upload');
                if (e.files && e.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (i) {
                        $(parent).find('.image-upload-wrapper').addClass('hide');
                        $(parent).find('.image-wrapper').removeClass('hide');
                        $(parent).find('.btn-single-image-browse-again').removeClass('hide');
                        $(parent).siblings('.alt-text').removeClass('hide');
                        $(parent).find('.image-wrapper').find('img').attr('src', i.target.result);
                    }
                    
                    reader.readAsDataURL(e.files[0]);
                }
            }
            // END SINGLE IMAGE UPLOAD

            // BEGIN MULTIPLE IMAGE UPLOAD
            function widgetRemoveImage(e){
                var fileId = $(e).data("id");
                for (var i = 0; i < filesToUpload.length; ++i) {
                    if (filesToUpload[i].id === fileId)
                        filesToUpload.splice(i, 1);
                }
                $(e).parents('.image-wrapper').remove();

                if($('.images-upload .image-wrapper').length < 1){
                    $('.images-upload-wrapper').removeClass('hide');
                }
            }

            function widgetViewImage(e){
                var src = $(e).parents('.image-wrapper').find('img').attr('src');
                $('#modalImage').attr('src', src);

                $('#imageViewModal').modal('show');
            }

            function widgetRemoveImage(e){
                var id = $(e).data('id');
                $.ajax({
                   type:'POST',
                   url:'/admin/p/products/remove-image',
                   data: {
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        id : id,
                    },
                    success: function(data){
                        var src = $(e).parents('.image-wrapper').remove();
                    },
                    error: function(data){
                        swal("Error!", "Error in deletion!", "error");
                    }
                });
                var src = $(e).parents('.image-wrapper').find('img').attr('src');
                $('#modalImage').attr('src', src);

                $('#imageViewModal').modal('show');
            }

            // END MULTIPLE IMAGE UPLOAD

            function slugUpdateOnNameFieldChangeEvent(){
                var text = $(this).val();
                var slug = convertToSlug(text);
                $($handleControl).val('{{config("app.url")}}/'+handle+'/'+slug);
                $('#meta_title').val(text);

                addFormatter(handleControl, regexPrefix(/^https?:\/\/{{config('app.url_path')}}\/'+handle+'\//, '{{config('app.url')}}/'+handle+'/'));
            }
        </script>

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @yield('scripts')
        <!-- END PAGE LEVEL SCRIPTS -->     
    </body>
</html>