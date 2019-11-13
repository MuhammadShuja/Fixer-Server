{{-- 
    $link_field:                    field name to auto generate meta title and slug,
    $handle:                        url handle for this slug,
    $content_meta_title:            field value for meta title,
    $content_meta_keywords:         field value for meta keywords,
    $content_meta_description:      field value for meta description,
    $content_slug:                  field value for slug handle,
--}}
<!-- BEGIN WIDGET SEO -->
<div class="portlet light widget-seo">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay"> Search engine listing preview </span>
        </div>
        <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        @include('back.form-controls.input.lettercount', [
            'control_name' => 'meta_title',
            'control_title' => 'Page title',
            'letter_count' => '70',
            'control_value' => (!empty($content_meta_title)) ? $content_meta_title : null,
        ])
        @include('back.form-controls.input.tags', [
            'control_name' => 'meta_keywords',
            'control_title' => 'Keywords',
            'control_value' => (!empty($content_meta_keywords)) ? $content_meta_keywords : null,
        ])
        @include('back.form-controls.textarea.simple', [
            'control_name' => 'meta_description',
            'control_title' => 'Description',
            'letter_count' => '320',
            'control_value' => (!empty($content_meta_description)) ? $content_meta_description : null,
        ])
        @include('back.form-controls.input.slug', [
            'control_name' => 'slug',
            'control_title' => 'URL and handle',
            'handle' => $handle,
            'link_field' => $link_field,
            'control_value' => (!empty($content_slug)) ? $content_slug : null,
        ])
    </div>
</div>
<!-- END WIDGET SEO -->