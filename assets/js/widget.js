jQuery(function($){
	$('input[rel=price-format]').priceFormat({
	    prefix: 'R$ ',
	    centsSeparator: ',',
	    thousandsSeparator: '.'
	});
});