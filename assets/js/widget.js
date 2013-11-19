jQuery(function($){
	jQuery('input[rel=price-format]').priceFormat({
	    prefix: 'R$ ',
	    centsSeparator: ',',
	    thousandsSeparator: '.'
	});
});
