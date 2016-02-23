<?php

/**
 * Based on:
 * 
 * 	Have you ever wanted to create your own page templates, but not had access to the theme itself? I, as a WordPress plugin author,
 * have found this problem to be particularly annoying when developing my plugins. Thankfully the solution is quite simple! I’m
 * going to take you quickly through the few lines of code which you will need to dynamically create WordPress Page Templates directly through PHP.
 *  Inspiration for this article and the genius behind the code solution comes from Tom McFarlin: I am using my edited version of his original code,
 * which you can find on his GitHub. I have kept his commenting in (as well as adding some of my own) as I find it very helpful in explaining what
 * is going on – I couldn’t have said it any better myself!
 * 
 * @author Harri Bell-Thomas
 * @url http://www.wpexplorer.com/wordpress-page-templates-plugin/
 *
 */
class PageTemplater
{
	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;
	
	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	public function __construct()
	{
		$this->templates = array ();
		
		// Add a filter to the attributes metabox to inject template into the cache.
		add_filter ( 'page_attributes_dropdown_pages_args', array (
				$this,
				'register_project_templates' 
		) );
		
		// Add a filter to the save post to inject out template into the page cache
		add_filter ( 'wp_insert_post_data', array (
				$this,
				'register_project_templates' 
		) );
		
		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter ( 'template_include', array (
				$this,
				'view_project_template' 
		) );
		
		// Add your templates to this array.
		$this->templates = array (
				'../tpl_contribua.php' => __('Página do Contribua','contribua') 
		);
	}
	
	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates($atts) {
		
		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5 ( get_theme_root () . '/' . get_stylesheet () );
		
		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme ()->get_page_templates ();
		if (empty ( $templates )) {
			$templates = array ();
		}
		
		// New cache, therefore remove the old one
		wp_cache_delete ( $cache_key, 'themes' );
		
		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge ( $templates, $this->templates );
		
		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add ( $cache_key, $templates, 'themes', 1800 );
		
		return $atts;
	}
	
	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template($template) {
		global $post;
		
		if (! isset ( $this->templates [get_post_meta ( $post->ID, '_wp_page_template', true )] )) {
			
			return $template;
		}
		
		$file = plugin_dir_path ( __FILE__ ) . get_post_meta ( $post->ID, '_wp_page_template', true );
		
		// Just to be safe, we check if the file exist first
		if (file_exists ( $file )) {
			return $file;
		} else {
			echo $file;
		}
		
		return $template;
	}
}

$PageTemplater = new PageTemplater();


