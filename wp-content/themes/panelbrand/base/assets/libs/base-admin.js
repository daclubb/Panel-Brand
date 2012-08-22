jQuery(document).ready(function($) {
	
	// On-Off
	$('.input-on-off').iphoneStyle();
	
	// Toggle Group
	$('.input-on-off[toggle]').change(function(event, recursive){
		// console.log( 'on-off: ' + $(this).is(':checked'));
		if( $(this).is(':checked') ) { 
			$('.input-list.' + $(this).attr('toggle') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle')).get().reverse() ).trigger('change');
		} else {
			$('.input-list.' + $(this).attr('toggle') ).hide();	
		}
	});
	$('.input-radio[toggle]').change(function(event, recursive){
		// console.log( 'radio: ' + $(this).is(':checked') + ' ' + $(this).val());
		if( $(this).is(':checked') ) {
			$('.input-list.' + $(this).attr('toggle') ).hide();
			$('.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value')).get().reverse() ).trigger('change');
		}
	});
	// Hide Toggle Group
	$( $('.input-on-off, .input-radio').get().reverse() ).trigger('change');
	
	// Color
	$('.input-color').mColorPicker({
		imageFolder : theme_admin_assets_uri+"/images/mColorPicker/"
	});
	
	// Date
	$('.input-date').each( function(){
		var input_date = $(this);
		$(this).dateinput({
			trigger : true,
			format : 'dd mmmm yyyy',
			change: function() {
				
				var isoDate = parseDate(this.getValue('yyyy-mm-dd')) / 1000;
				$(input_date).siblings('.input-date-value').val(isoDate);
			},
			onHide: function(){
				if( $(input_date).val() == '' ) {
					$(input_date).siblings('.input-date-value').val('');
				}
			}
		});
	});
	
	function parseDate(input, format) {
	  format = format || 'yyyy-mm-dd'; // default format
	  var parts = input.match(/(\d+)/g), 
	      i = 0, fmt = {};
	  // extract date-part indexes from the format
	  format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
	  return new Date(Date.UTC(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]));
	}
	
	// Time
	$('.input-time').timeEntry({spinnerImage: '', show24Hours: true});
	$('.time-trigger').click(function(e){
		e.preventDefault();
		$('.input-time', $(this).parent('.input-field')).focus();
	});
	
	// Range
	$('.input-range').rangeinput({
		progress : false
	});
	
	// File upload
	$('.upload-file-bt-box').each(function(){
		var cur_item = $(this);
		var cur_parent = $(cur_item).parents('.input-field');
		var cur_input_name = $('.dummy-input', cur_parent).attr('name');
		new qq.FileUploader({
		    element: $(this)[0],
		    action: ajaxurl,
		    params : {
		    	action: 'theme_ajax_action',
		    	method: 'upload_file',
		    	allowedExtensions: $('.file-extensions', $(cur_parent)).attr('value').split(','),
		    	post_id: ( typeof $('#post_ID').attr('value') != 'undefined' ) ? $('#post_ID').attr('value') : '0'
		    },
		    multiple : false,
		    template: '<div class="qq-uploader">' +
		                  '<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
		                  '<div class="qq-upload-button">Upload a File</div>' +
		                  '<ul class="qq-upload-list"></ul>' +
		              '</div>',
		    onSubmit: function(id, fileName){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).show();
		    },
		    onComplete : function(id, fileName, responseJSON){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).hide();
		    	if( responseJSON.success ) {
			    	$('.uploaded-file-container', $(cur_parent)).html('<div class="uploaded-file">'+responseJSON.file_path+'<a class="remove" href="#">remove</a><input type="hidden" value="'+ responseJSON.attach_id +'" name="'+ cur_input_name +'" /></div>').fadeIn();
			    } else {
			    	alert( responseJSON.error );
			    }
		    }
		});
	});
	
	$('.upload-image-bt-box').each(function(){
		var cur_item = $(this);
		var cur_parent = $(cur_item).parents('.input-field');
		var cur_input_name = $('.dummy-input', cur_parent).attr('name');
		new qq.FileUploader({
		    element: $(this)[0],
		    action: ajaxurl,
		    params : {
		    	action: 'theme_ajax_action',
		    	method: 'upload_file',
		    	allowedExtensions: ['jpg', 'jpeg', 'gif', 'png'],
		    	post_id: ( typeof $('#post_ID').attr('value') != 'undefined' ) ? $('#post_ID').attr('value') : '0'
		    },
		    multiple : false,
		    template: '<div class="qq-uploader">' +
		                  '<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
		                  '<div class="qq-upload-button">Upload an Image</div>' +
		                  '<ul class="qq-upload-list"></ul>' +
		              '</div>',
		    onSubmit: function(id, fileName){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).show();
		    },
		    onComplete : function(id, fileName, responseJSON){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).hide();
		    	if( responseJSON.success ) {
			    	$('.uploaded-image-container', $(cur_parent)).html('<div class="uploaded-image"><img  src="'+responseJSON.resized_image_src+'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ responseJSON.attach_id +'" name="'+ cur_input_name +'" /></div>').fadeIn();
			    } else {
			    	alert( responseJSON.error );
			    }
		    }
		});
	});
	
	$('.upload-images-bt-box').each(function(){
		var post_id = '0';
		var cur_item = $(this);
		var cur_parent = $(cur_item).parents('.input-field');
		var cur_input_name = $('.dummy-input', cur_parent).attr('name');
		new qq.FileUploader({
		    element: $(this)[0],
		    action: ajaxurl,
		    params : {
		    	action: 'theme_ajax_action',
		    	method: 'upload_file',
		    	allowedExtensions: ['jpg', 'jpeg', 'gif', 'png'],
		    	post_id: ( typeof $('#post_ID').attr('value') != 'undefined' ) ? $('#post_ID').attr('value') : '0'
		    },
		    multiple : true,
		    template: '<div class="qq-uploader">' +
		                  '<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
		                  '<div class="qq-upload-button">Upload Images</div>' +
		                  '<ul class="qq-upload-list"></ul>' +
		              '</div>',
		    onSubmit: function(id, fileName){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).show();
		    },
		    onComplete : function(id, fileName, responseJSON){
		    	$('.upload-image-bt-ajax-load', $(cur_parent)).hide();
		    	if( responseJSON.success ) {
			    	$('.uploaded-images-container', $(cur_parent)).append('<div class="uploaded-image"><img  src="'+responseJSON.resized_image_src+'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ responseJSON.attach_id +'" name="'+ cur_input_name +'[]" /></div>').fadeIn();
			    }
		    }
		});
	});
	$('.uploaded-image .remove, .uploaded-file .remove').live('click', function(e){
		e.preventDefault();
		$(this).parent().fadeOut(function(){
			$(this).remove();
		});
	});
	$('.uploaded-images-container').sortable({
		items : '.uploaded-image',
		cursor : 'move',
		placeholder : 'uploaded-image-dummy'
	});
	
	// ColorBox
	$('a[rel="fancy"]').colorbox({
		rel 		: 'group',
		maxWidth	: '80%',
		maxHeight 	: '80%',
		close		: false,
		current		: false,
		opacity		: 0.75
	});
	
	// Radio Image
	$('.radio-img-list label').click(function(){
		$('.radio-img-list label', $(this).parents('.input-field') ).removeClass('active');
		$(this).addClass('active');
	});
	
	// Checkbox Image
	$('.checkbox-img-list input[type="checkbox"]').change(function(){
		$(this).is(':checked') ? $(this).siblings('label').addClass('active') : $(this).siblings('label').removeClass('active');
	});
	
	// Notification Box
	$(window).scroll(function() {
	       $('.notification-box').css('top', $(window).scrollTop() + 100);
	});
	
	// Theme Box
	$('#theme-box-tabs ul li').click(function(e){
		e.preventDefault();
		if( ! $(this).hasClass('active') ){
			$('#theme-box-tabs ul li').removeClass('active');
			$(this).addClass('active');
			$('#theme-box-content .theme-box-content-pane').removeClass('active').hide();
			$('#theme-box-content .theme-box-content-pane:eq('+$(this).index()+')').addClass('active').fadeIn();
		}
	});
	
	// Input List Odd
	$('.input-list:odd').addClass('odd');
	
	// Option Box save button
	$('#theme-options-save').click(function(){
		$('.notification-box').html('<div class="ajax-load-icon"></div>saving …').stop(true, true).fadeIn();
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'save_option',
			options: $('#theme-options-form').serialize()
		};
		
		$.post(ajaxurl, data, function(response) {
		    if('ok' == response.result){
		    	$('.notification-box').html('<div class="ajax-okay-icon"></div>success').delay(1000).fadeOut('slow');
		    	$('#advance-theme_export_option').val(response.encodedOptions);
		    } else {
		    	$('.notification-box').html('<div class="ajax-fail-icon"></div>fail').delay(1000).fadeOut('slow');
		    }
		    if( $('#advance-theme_import_option').val() != '' ) location.reload();
		}, 'json');
	});
	
	// Type - Re-order
	$('.wp-list-table tbody').sortable({
		items : 'tr',
		handle : '.reorder-handle',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('tr.ui-state-highlight').append('<td colspan="0"></td>');
		},
		update : function(e, ui) {
			$('.ajax-load-icon', ui.item).show();
			var data = {
				action: 'theme_ajax_action',
				method: 'update_post_order',
				post_order: $(this).sortable('serialize')
			};
			$.post(ajaxurl, data, function(response) {
			   	if('ok' == response.result){
				    $('.ajax-load-icon', ui.item).hide();
				}
			}, 'json');
		}
	});
	
	//////////////// Meta 
	/*
	// Meta Add
	$(".meta-add-row-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-close-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideDown();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideDown();
	});
	$(".meta-add-row-close-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideUp();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideUp();
	});
	
	// Meta Edit
	$('.meta-edit-row-bt').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parents(".meta-row").next(".meta-edit-row").slideToggle();
		$('.post-meta-options', $(this).parents(".meta-row").next(".meta-edit-row")).slideToggle();
	});
	
	// Meta Delete
	$('.meta-delete-row-bt').click(function(e){
		e.preventDefault();
		$(this).addClass('meta-delete-row-bt-loading');
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'remove_meta',
			meta_tag: $(this).parents('.postbox').attr('id'),
			meta_index: $(this).parents('tr').attr('index'),
			post_id: post_id
		};
		$.post(ajaxurl, data, function(response) {
		   	if('ok' == response.result){
			    $(current).parents(".meta-row").next(".meta-edit-row").remove();
			    $(current).parents(".meta-row").remove();
			}
		}, 'json');
	});
	
	// Sortable Meta List
	$('.theme-setting-table tbody').sortable({
		items : '.sortable',
		cursor : 'move',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('.ui-state-highlight').append('<td colspan="100%"></td>');
		},
		update : function(e, ui) {
			var parent_table = $(ui.item).parents('table');
			$('.meta-edit-row', parent_table).each(function(){
				$(this).insertAfter($('.meta-row[index="' + $(this).attr('index') + '"]', parent_table));
			});
		}
	});
	*/
	
	
});