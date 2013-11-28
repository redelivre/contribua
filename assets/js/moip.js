jQuery(document).ready(function($){
	$('.link-moip1').click(function(){
		$('.form-moip1').submit();
		return false;
	});

	$('.link-moip2').click(function(){
		$('.form-moip2').submit();
		return false;
	});

	$('.link-moip3').click(function(){
		$('.form-moip3').submit();
		return false;
	});

	$('.link-moip4').click(function(){
		value = $('.form-moip4 input[name=valor-livre]').val();
		value = value.replace(/[^0-9]/g, '');
		if (value.length)
		{
			$('.form-moip4 input[name=valor]').val(value);
			$('.form-moip4').submit();
		}
		return false;
	});
});
