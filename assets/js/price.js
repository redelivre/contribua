function contribuaPriceFormat(e)
{
	digits = e.value.replace(/[^0-9]/g, '').replace(/^0/, '');
	while (digits.length < 3)
		digits = '0' + digits;
	cents = digits.substr(-2);
	digits = digits.substr(0, digits.length-2);
	e.value = 'R$ ' + digits.substr(0, digits.length % 3);
	for (var i = digits.length % 3; i < digits.length; i += 3)
	{
		if (i)
			e.value += '.';
		e.value += digits.substr(i, 3);
	}
	e.value += ',' + cents;
}
