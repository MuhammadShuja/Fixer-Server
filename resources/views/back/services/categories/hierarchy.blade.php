@extends('back.master')
@section('title')
    <title>Categories ~ Hierarchy ~ {{ config('app.sys') }}</title>
@endsection
@section('meta')
    <script> var base_url = "{{asset('/')}}"; </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('assets')
    {!!Html::style('css/back/page-level-assets/jquery.nestable.css')!!}
    {!!Html::style('css/back/page-level-assets/notific8.min.css')!!}
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
    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content new-entry">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <a class="page-action-back" href="/admin/s/categories"><i class="fa fa-angle-left"></i> Categories</a>
                    <h1>Update hierarchy</h1>
                </div>
                <!-- END PAGE TITLE -->
                <div class="page-toolbar">
                    <a class="btn-c btn-p hide" href='javascript:;' onclick="updateOrder()">Save changes</a>
                </div>
            </div>
            <!-- BEGIN PAGE BASE CONTENT -->
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/s/categories/new" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="dd" id="list">
                                        <ol class="dd-list">
                                            @foreach($categories as $category)
                                                <li class="dd-item" data-id="{{ $category->id }}">
                                                    <div class="dd-handle"> {{ $category->name }}
                                                    @if($category->status == 'inactive')
                                                    <span class="pull-right">Inactive</span>
                                                    @endif
                                                    </div>
                                                    @if(count($category->children))
                                                         @include('back.catalog.categories.children',['children' => $category->children])
                                                    @endif 
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
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
    {!!Html::script('js/back/page-level-scripts/jquery.nestable.js')!!}
    {!!Html::script('js/back/page-level-scripts/notific8.min.js')!!}
    <script>
        var data;

        window.onload = function(){
            $(function(){

                $('.dd').nestable({
                    'maxDepth': 1
                }).on('change', function() {
                  var json_text = $('.dd').nestable('serialize');
                  $('.btn-c').removeClass('hide');
                  data = JSON.stringify(json_text);
                  console.log(data);
                });

                $('.nestable-action').on('click', function(e){
                    if ($(this).data('action') === 'expand') {
                        $('.dd').nestable('expandAll');
                    }
                    if ($(this).data('action') === 'collapse') {
                        $('.dd').nestable('collapseAll');
                    }
                });

            });
        }

        function updateOrder(){
            $.ajax({
                type: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/s/categories/hierarchy",
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'), 
                    data: data
                },
                dataType: "text",
                success: function(resultData) {
                    $.notific8("zindex",11500);
                    $.notific8(
                        'Hierarchy updated successfully.',
                        {
                            heading: "Success!",
                            theme: 'lime',              // teal, amethyst, ruby, tangerine, lemon, lime, ebony, smoke
                            sticky: false,              // true, false
                            horizontalEdge: 'top',   // top, bottom
                            verticalEdge: 'right',      // right, left
                            life: 3000,
                        }
                    );
                },
                error: function(data){
                    $.notific8("zindex",11500);
                    $.notific8(
                        'Could not update hierarchy.',
                        {
                            heading: "Error!",
                            theme: 'ruby',              // teal, amethyst, ruby, tangerine, lemon, lime, ebony, smoke
                            sticky: false,              // true, false
                            horizontalEdge: 'top',   // top, bottom
                            verticalEdge: 'right',      // right, left
                            life: 3000,
                        }
                    );
                }
            }); 
        }
    </script>
@endsection