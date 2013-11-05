jQuery( document ).ready(function(){
	jQuery('input:checkbox[name^=contribuicao]').on('click', function(){
		var contentElement = jQuery(this).parent().next('div');

		if (!contentElement.is(':visible')) {
			contentElement.fadeIn('fast');
		}
		else {
			contentElement.fadeOut('fast');
		}
	});

	jQuery('.price').priceFormat({
	    prefix: 'R$ ',
	    centsSeparator: ',',
	    thousandsSeparator: '.'
	});
	
	jQuery('.colorSelector1').ColorPicker({
		color: jQuery('.colorSelector1 input').val(),
		onShow: function (picker) {
			if(!jQuery(picker).is(':visible'))
			{
				jQuery(picker).fadeIn(500);
			}
	
			return false;
		},
		onHide: function (picker) {
			if(jQuery(picker).is(':visible')){
				jQuery(picker).fadeOut(500);
			}
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('.colorSelector1 div').css('backgroundColor', '#' + hex);
			jQuery('.colorSelector1 input').val('#' + hex);
		}
	});

	jQuery('.colorSelector2').ColorPicker({
		color: jQuery('.colorSelector2 input').val(),
		onShow: function (colpkr) {
			if(!jQuery(colpkr).is(':visible')){
				jQuery(colpkr).fadeIn(500);
			}

			return false;
		},
		onHide: function (colpkr) {
			if(jQuery(colpkr).is(':visible')){
				jQuery(colpkr).fadeOut(500);
			}

			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('.colorSelector2 div').css('backgroundColor', '#' + hex);
			jQuery('.colorSelector2 input').val('#' + hex);
		}
	});

	jQuery('.colorSelector3').ColorPicker({
		color: jQuery('.colorSelector3 input').val(),
		onShow: function (colpkr) {
			if(!jQuery(colpkr).is(':visible')){
				jQuery(colpkr).fadeIn(500);
			}

			return false;
		},
		onHide: function (colpkr) {
			if(jQuery(colpkr).is(':visible')){
				jQuery(colpkr).fadeOut(500);
			}

			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('.colorSelector3 div').css('backgroundColor', '#' + hex);
			jQuery('.colorSelector3 input').val('#' + hex);
		}
	});

	
});;