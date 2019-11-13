@extends('back.master')
@section('title')
    <title>Settings ~ General ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('form-title')
    Unsaved Brand
@endsection
@section('header')
    @include('back.layout.header')
@endsection
@section('assets')
    {!!Html::style('css/back/page-level-assets/bootstrap-select.css')!!}
    {!!Html::style('plugins/Trumbowyg-master/dist/ui/trumbowyg.min.css')!!}
    {!!Html::style('css/back/page-level-assets/selectize.default.css')!!}

    <style>
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
        .page-head{
            border-bottom: 1px solid #b7c9d6;
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
                    <a class="page-action-back" href="/admin/settings"><i class="fa fa-angle-left"></i> Settings</a>
                    <h1>General</h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal settings-form" id="newEntry" method="POST" action="/admin/settings/general" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN STORE INFORMATION -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Store information</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">Your customers will use this information to contact you.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Name
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Store description
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Email
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Hours of operation
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_operation_hours">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Days of operation
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_operation_days">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">NTN number
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_ntn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END STORE INFORMATION -->
                            <!-- BEGIN STORE ADDRESS -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Store address</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">This address will appear at your storefront, emails, and invoices.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Phone
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Street address
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_street">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Office, appartment, etc.
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_office">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">City
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_city">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Zipcode
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_zipcode">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Region/State
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_state">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Country
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_address_country">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END STORE ADDRESS -->
                            <!-- BEGIN STORE STANDARDS AND FORMATS -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Standards and formats</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">Standards and formats are used to calculate product prices, and shipping weights.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Currency symbol
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_currency_symbol">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Weight unit
                                                        </label>
                                                        <div class="col-md-12">
                                                            <select class="bs-select form-control" name="store_weight_unit" data-live-search="true">
                                                                <option value="kilogram">Kilogram (kg)</option>
                                                                <option value="gram">Gram (g)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr class="separator">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label">Order ID prefix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_order_id_prefix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-12">Order ID suffix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_order_id_suffix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END STORE STANDARDS AND FORMATS -->
                            <!-- BEGIN WEB AND SEO -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay"> Web and search engine optimization </span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">Search engines will use this information to index your webpages.
                                                <br/><br/>
                                                Slug prefixes and suffixes will be used to add additional information in specified page url.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Homepage URL
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_home_url">
                                                            <span class="help font-blue-dark" style="font-size: 13px;">
                                                                include http:// or https://
                                                                <br/>e.g. https://www.example.com/
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class="separator">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Homepage meta title
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control letter-count-input" id="seoTitle" name="store_home_meta_title" data-letter-count="70">
                                                            <span class="help font-blue-dark" style="font-size: 13px;">
                                                                <span class="letter-count">0</span> of 70 characters used
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Homepage meta keywords
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" id="seoTags" name="store_home_meta_keywords">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Homepage meta description
                                                        </label>
                                                        <div class="col-md-12">
                                                            <textarea class="form-control letter-count-input" name="store_home_meta_description" rows="5" style="resize: none;" data-letter-count="320"></textarea>
                                                            <span class="help font-blue-dark" style="font-size: 13px;">
                                                                <span class="letter-count">0</span> of 320 characters used
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr class="separator">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label">Product slug prefix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_product_slug_prefix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-12">Product slug suffix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_product_slug_suffix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label">Category slug prefix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_category_slug_prefix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-12">Category slug suffix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_category_slug_suffix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-12 control-label">Brand slug prefix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_brand_slug_prefix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-12">Brand slug suffix
                                                                </label>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="store_brand_slug_suffix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WEB AND SEO -->
                            <!-- BEGIN STORE LOGO AND FAVICON -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Store logo and favicon</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">Store logo will be used at storefront, invoices, and emails etc.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    @include('back.form-controls.image.single', [
                                                        'control_name' => 'store_logo_dark',
                                                        'control_title' => 'Store logo dark',
                                                        'upload_button_text' => 'Upload logo dark',
                                                        'change_button_text' => 'Browse again'
                                                    ])

                                                    @include('back.form-controls.image.single', [
                                                        'control_name' => 'store_logo_light',
                                                        'control_title' => 'Store logo light',
                                                        'upload_button_text' => 'Upload logo light',
                                                        'change_button_text' => 'Browse again'
                                                    ])
                                                    
                                                    
                                                    <div class="form-group alt-text">
                                                        <label class="control-label col-md-12">Logo alt text
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_logo_alt_text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group alt-text">
                                                        <label class="control-label col-md-12">Logo attribute width
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_logo_width">
                                                        </div>
                                                    </div>
                                                    <div class="form-group alt-text">
                                                        <label class="control-label col-md-12">Logo attribute height
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_logo_height">
                                                        </div>
                                                    </div>
                                                    @include('back.form-controls.image.single', [
                                                        'control_name' => 'store_favicon',
                                                        'control_title' => 'Store favicon',
                                                        'upload_button_text' => 'Upload favicon',
                                                        'change_button_text' => 'Browse again',
                                                        'control_help'       => 'Allowed file types: ico, png, gif, jpg, jpeg, apng<br/><a class="btn font-blue" style="font-size: 12px;" onclick="advancedFavicon(\'advance\')">Advanced favicon</a>',
                                                    ])
                                                    <div class="hide" id="advanced_favicon">
                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_16x16',
                                                            'control_title' => 'Favicon 16x16',
                                                            'upload_button_text' => 'Favicon 16x16',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_32x32',
                                                            'control_title' => 'Favicon 32x32',
                                                            'upload_button_text' => 'Favicon 32x32',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_192x192',
                                                            'control_title' => 'Favicon 192x192 (for android chrome)',
                                                            'upload_button_text' => 'Favicon 192x192 (for android chrome)',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_512x512',
                                                            'control_title' => 'Favicon 512x512 (for android chrome)',
                                                            'upload_button_text' => 'Favicon 512x512 (for android chrome)',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_apple_touch_icon',
                                                            'control_title' => 'Apple touch icon',
                                                            'upload_button_text' => 'Apple touch icon',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_mstile',
                                                            'control_title' => 'MS tile 150x150',
                                                            'upload_button_text' => 'MS tile 150x150',
                                                            'change_button_text' => 'Browse again'
                                                        ])

                                                        @include('back.form-controls.image.single', [
                                                            'control_name' => 'store_favicon_safari_svg',
                                                            'control_title' => 'SVG format (Safari pinned tab)',
                                                            'upload_button_text' => 'SVG format (Safari pinned tab)',
                                                            'change_button_text' => 'Browse again'
                                                        ])
                                                        <div class="text-center">
                                                            <a class="btn font-blue" style="font-size: 12px;" onclick="advancedFavicon('basic')">Close advanced settings</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END STORE LOGO AND FAVICON -->
                            <!-- BEGIN SOCIAL CONTACTS -->
                            <div class="portlet b-border">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold font-blue-ebonyclay">Social contacts</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="head">
                                                <span class="description font-blue-ebonyclay">Your customers will use this information to contact you on social platforms.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">Whatsapp contact number
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_whatsapp_number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Facebook profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_facebook_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Instagram profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_instagram_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Twitter profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_twitter_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Youtube profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_youtube_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Google+ profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_google_plus_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Linkedin profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_facebook_link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Pinterest profile link
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="store_pinterest_link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SOCIAL CONTACTS -->
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <br/>
                            <a class="btn-c btn-p btn-save-form pull-right" href='javascript:;'>Update settings</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- BEGIN PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection

@section('scripts')
    {!!Html::script('js/back/page-level-scripts/bootstrap-select.min.js')!!}
    {!!Html::script('plugins/Trumbowyg-master/dist/trumbowyg.min.js')!!}
    {!!Html::script('js/back/page-level-scripts/selectize.min.js')!!}
    <script>
        window.onload = function(){
            $(document).ready(function() {
                $('.collapse').click();
                $('#description').trumbowyg();

                $('#seoTags').removeClass('form-control').selectize({
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

                $("#name").on('change paste keyup', function () {
                    var text = $(this).val();
                    var slug = convertToSlug(text);
                    $('#seoHandle').val('{{config('app.url')}}/brands/'+slug);
                    $('#seoTitle').val(text);
                });
            } );
        }
        function uploadImage(e, control_name){
            if (e.files && e.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (i) {
                    $('#'+control_name).find('.image-upload-wrapper').addClass('hide');
                    $('#'+control_name).find('.image-wrapper').removeClass('hide');
                    $('#'+control_name).find('#btn-upload-dark').removeClass('hide');
                    $('#'+control_name).find('.alt-text').removeClass('hide');
                    $('#'+control_name).find('.image-wrapper').find('img').attr('src', i.target.result);
                }
                
                reader.readAsDataURL(e.files[0]);
            }
        }

        function advancedFavicon(toggleType){
            if(toggleType == 'advance'){
                $('#advanced_favicon').removeClass('hide');
            }
            else if(toggleType == 'basic'){
                $('#advanced_favicon').addClass('hide');
            }
        }
    </script>
@endsection