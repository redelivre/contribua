jQuery( document ).ready(function(){
	jQuery('.contribua-color-picker').wpColorPicker();

	jQuery('input:checkbox[name^=contribuicao]').on('click', function()
	{
		var contentElement = jQuery(this).nextAll('div:first');

		if (!contentElement.is(':visible'))
		{
			contentElement.fadeIn('fast');
		}
		else
		{
			contentElement.fadeOut('fast');
		}
	});
});
