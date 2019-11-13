var insertSectionAfter = null;

var section, type, image;

function addNewSection(e){
	$('.cms-no-section').addClass('hide');
	$('.cms-popover').addClass('hide');
	$('.spin').removeClass('spin');
	section = $(e).data('section');
	type = $(e).data('type');
	image = $(e).data('image');

	var fab = '<a class="section-fab" onclick="fabPopover(this)">+</a>';

    var fabPopover = '<div class="cms-popover hide">'+
			            '<div class="popover-header">'+
			            '<span class="uppercase"><i class="icon-plus"></i> New Section</span></div>'+
			            '<div class="popover-body">'+
		                '<a data-toggle="modal" href="#productCarouselSingle">New Product Carousel Single</a>'+
		                '<a data-toggle="modal" href="#productCarouselTabbed">New Product Carousel Tabbed</a>'+
		                '<a data-toggle="modal" href="#dealsCarousel">New Deals Carousel</a>'+
		                '<a data-toggle="modal" href="#categoryCarousel">New Category Carousel</a>'+
			            '<a data-toggle="modal" href="#brandsCarousel">New Brands Carousel</a>'+
		                '<a data-toggle="modal" href="#widgets">New Widget Section</a></div></div>';

    var actions = '<div class="section-actions">'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Edit Section">'+
                    '<i class="fa fa-pencil"></i></a>'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Move Section Up">'+
                    '<i class="fa fa-arrow-up"></i></a>'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Move Section Down">'+
                    '<i class="fa fa-arrow-down"></i></a>'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Duplicate Section">'+
                    '<i class="fa fa-clone"></i></a>'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Divide Section">'+
                    '<i class="fa fa-columns"></i></a>'+
                    '<a class="action tooltips" data-container="body" data-placement="top" data-original-title="Remove Section">'+
                    '<i class="fa fa-trash-o"></i></a></div>';

    var output = '<div class="cms-section">'+actions+
    				'<div class="row">'+
    				'<div class="col-md-9">'+
    				'<img src="'+image+'">'+
    				'</div>'+fab+fabPopover+
    				'<div class="col-md-3">'+
    				'<div class="section-details">'+
    				'<table class="table table-borderless">'+
    				'<tr"><th style="border-top: none;">Title</th><td style="border-top: none;">Glasses Section</td></tr>'+
    				'<tr><th>Type</th><td>'+type+'</td></tr>'+
    				'<tr><th>Clicks</th><td>2589</td></tr>'+
    				'</div></div></div>';

	if(insertSectionAfter == null){
		$('.cms-sections').append(output);
	}
	else{
		$(output).insertAfter(insertSectionAfter);
	}

	populateSidepan();

	$('.sidepan').addClass('sidepan-open');
	$('.overlay').removeClass('hide');
}

function cancelSection(e){
	$('.sidepan').removeClass('sidepan-open');
	$('.overlay').addClass('hide');
}

function fabPopover(e){
	insertSectionAfter = $(e).parents('.cms-section')[0];
	$(e).siblings('.cms-popover').toggleClass('hide');
	$(e).toggleClass('spin');
}

function populateSidepan(){
	$('.sidepan-body').empty();
	var sidepanContent = controlTitle();
	switch(type){
		case 'simple-products-carousel':
			sidepanContent += controlHeader();
			sidepanContent += controlMedia();
			sidepanContent += controlDataSource();			
			break;
		case 'products-carousel-with-banner':
		break;
		case 'products-carousel-with-bg':
		break;
		case 'products-carousel-compact':
		break;
		case 'landscape-products-carousel-with-thumbnails':
		break;
		case 'landscape-products-carousel-with-bg':
		break;
		case 'large-single-product-carousel':
		break;
	}

	sidepanContent += controlConfig();

	$('.sidepan-body').append(sidepanContent);
}

var error = '<span class="cms-error"><i class="fa fa-exclamation-circle"></i> Please fill the blank</span>';

function controlTitle(){
	return '<input type="text" class="cms-input" placeholder="Section Title" id="inputTitle" name="inputTitle">'+
	'<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputHideTitle" name="inputHideTitle" value="Hide Title">'+
    'Hide Title</label></div>';
}

function controlHeader(){
	return '<textarea class="cms-textarea" rows="3" placeholder="Section Header" id="inputHeader" name="inputHeader"></textarea>';
}

function controlMedia(){
	return '<a class="cms-button" data-toggle="modal" href="#sectionMedia"><i class="fa fa-image"></i> Edit Section Media</a>';
}

function controlDataSource(){
	return '<a class="cms-button" data-toggle="modal" href="#sectionDataSource"><i class="fa fa-link"></i> Edit Section Data Source</a>';
}

function controlTabs(){
	return '<a class="cms-button" data-toggle="modal" href="#sectionTabs"><i class="fa fa-columns"></i> Edit Section Data Source</a>';
}

function controlConfig(){
	return '<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputHideTitle" name="inputHideTitle" value="Hide Title">'+
    'Hide Title</label></div>';
}

function controlConfig(){
	return '<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputCustomConfig" name="inputCustomConfig" value="Custom Configuration" onchange="switchConfigPanel(this)">Custom Configuration</label></div>'+
            '<div class="config-panel hide">'+
            '<input type="text" class="cms-input-inline" placeholder="Default - Display Slides" id="inputDisplaySlidesDefault" name="inputDisplaySlidesDefault">'+
            '<input type="text" class="cms-input-inline" placeholder="Default - Scroll Slides" id="inputScrollSlidesDefault" name="inputScrollSlidesDefault">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 780 - Display Slides" id="inputDisplaySlides780" name="inputDisplaySlides780">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 780 - Scroll Slides" id="inputScrollSlides780" name="inputScrollSlides780">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1200 - Display Slides" id="inputDisplaySlides1200" name="inputDisplaySlides1200">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1200 - Scroll Slides" id="inputScrollSlides1200" name="inputScrollSlides1200">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1400 - Display Slides" id="inputDisplaySlides1400" name="inputDisplaySlides1400">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1400 - Scroll Slides" id="inputScrollSlides1400" name="inputScrollSlides1400">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1600 - Display Slides" id="inputDisplaySlides1600" name="inputDisplaySlides1600">'+
            '<input type="text" class="cms-input-inline" placeholder="W < 1600 - Scroll Slides" id="inputScrollSlides1600" name="inputScrollSlides1600">'+
            '<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputSlidesInfinite" name="inputSlidesInfinite">Infinite</label></div>'+
            '<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputSlidesArrows" name="inputSlidesArrows">Arrows</label></div>'+
            '<div class="cms-checkbox"><label for="inputCheckbox"><input type="checkbox" id="inputSlidesDots" name="inputSlidesDots">Dots</label></div>'+
            '</div>';
}

function switchConfigPanel(e){
	if($(e).prop('checked') == true){
		$('.config-panel').removeClass('hide');
	}
	else{
		$('.config-panel').addClass('hide');
	}
}