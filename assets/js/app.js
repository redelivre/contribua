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

	jQuery('.contribua-price').keyup(function (event)
	{
		contribuaPriceFormat(this);
	});
});
