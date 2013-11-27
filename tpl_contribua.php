<?php
	get_header();
	__('Contribua', 'contribua');
?>
<h1><?php echo get_the_title(); ?></h1>
<?php
	require Contribua::getContentPath();
	get_footer();
?>
