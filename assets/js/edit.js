jQuery(document).ready(function()
{
	jQuery('#page_template').append(
		'<option value="contribua">Contribua</option>');
	if (templateData['slug'] == 'contribua')
	{
		jQuery('#page_template option[value="contribua"]').prop(
				'selected', true);
	}
});
