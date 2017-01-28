<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/options/images/';
	
	
	/* *********************************************************** */

	$options = array();

	$options[] = array(
		'name' => __('Home Settings', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('welcome_header', 'options_check'),
		'desc' => __('Enter the Welcome Header', 'options_check'),
		'id' => 'welcome_header',
		'std' => 'Welcome to our site',
		'type' => 'text');


	$options[] = array(
		'name' => __('welcome_content', 'options_check'),
		'desc' => __('Enter Text for the Welcome Area', 'options_check'),
		'id' => 'welcome_content',
		'std' => 'This is the small (normal) font text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Blog Header', 'options_check'),
		'desc' => __('Enter the Blog Header', 'options_check'),
		'id' => 'blog_header',
		'type' => 'text');


	$options[] = array(
		'name' => __('Blog Description', 'options_check'),
		'desc' => __('Enter Text for the Blog Description', 'options_check'),
		'id' => 'blog_description',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook Link', 'options_check'),
		'desc' => __('Enter Facebook Link', 'options_check'),
		'id' => 'facebook_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Button Class', 'options_check'),
		'desc' => __('Enter Facebook Button Class', 'options_check'),
		'id' => 'facebook_class',
		'std' => 'icon_facebook',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Button Title', 'options_check'),
		'desc' => __('Enter Facebook Button Title', 'options_check'),
		'id' => 'facebook_title',
		'std' => 'Facebook',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Font Awesome Icon', 'options_check'),
		'desc' => __('Enter Facebook Icon', 'options_check'),
		'id' => 'facebook_icon',
		'std' => 'fa fa-facebook-square',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Twitter Link', 'options_check'),
		'desc' => __('Enter Twitter Link', 'options_check'),
		'id' => 'twitter_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Button Class', 'options_check'),
		'desc' => __('Enter Twitter Button Class', 'options_check'),
		'id' => 'twitter_class',
		'std' => 'icon_twitter',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Button Title', 'options_check'),
		'desc' => __('Enter Twitter Button Title', 'options_check'),
		'id' => 'twitter_title',
		'std' => 'Twitter',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Font Awesome Icon', 'options_check'),
		'desc' => __('Enter Twitter Icon', 'options_check'),
		'id' => 'twitter_icon',
		'std' => 'fa fa-twitter',
		'type' => 'text');

	$options[] = array(
		'name' => __('Linkedin', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Linkedin Link', 'options_check'),
		'desc' => __('Enter Linkedin Link', 'options_check'),
		'id' => 'linkedin_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Linkedin Button Class', 'options_check'),
		'desc' => __('Enter Linkedin Button Class', 'options_check'),
		'id' => 'linkedin_class',
		'std' => 'icon_linkedin',
		'type' => 'text');

	$options[] = array(
		'name' => __('Linkedin Button Title', 'options_check'),
		'desc' => __('Enter Linkedin Button Title', 'options_check'),
		'id' => 'linkedin_title',
		'std' => 'Linkedin',
		'type' => 'text');

	$options[] = array(
		'name' => __('Linkedin Font Awesome Icon', 'options_check'),
		'desc' => __('Enter Linkedin Icon', 'options_check'),
		'id' => 'linkedin_icon',
		'std' => 'fa fa-linkedin',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Instagram Link', 'options_check'),
		'desc' => __('Enter Instagram Link', 'options_check'),
		'id' => 'instagram_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram Button Class', 'options_check'),
		'desc' => __('Enter Instagram Button Class', 'options_check'),
		'id' => 'instagram_class',
		'std' => 'icon_instagram',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram Button Title', 'options_check'),
		'desc' => __('Enter Instagram Button Title', 'options_check'),
		'id' => 'instagram_title',
		'std' => 'Instagram',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram Font Awesome Icon', 'options_check'),
		'desc' => __('Enter Instagram Icon', 'options_check'),
		'id' => 'linkedin_icon',
		'std' => 'fa fa-instagram',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Google+ Link', 'options_check'),
		'desc' => __('Enter Google+ Link', 'options_check'),
		'id' => 'gplus_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Button Class', 'options_check'),
		'desc' => __('Enter Google+ Button Class', 'options_check'),
		'id' => 'gplus_class',
		'std' => 'icon_gplus',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Button Title', 'options_check'),
		'desc' => __('Enter Google+ Button Title', 'options_check'),
		'id' => 'gplus_title',
		'std' => 'Google+',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google+ Font Awesome Icon', 'options_check'),
		'desc' => __('Enter Google+ Icon', 'options_check'),
		'id' => 'gplus_icon',
		'std' => 'fa fa-google-plus',
		'type' => 'text');

	return $options;
}