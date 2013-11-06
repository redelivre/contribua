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
	
	jQuery('.colorSelector1').wpColorPicker();
	jQuery('.colorSelector2').wpColorPicker();
	jQuery('.colorSelector3').wpColorPicker();
});;
