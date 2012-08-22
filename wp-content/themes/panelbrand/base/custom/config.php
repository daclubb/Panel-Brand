<?php

// Set Content Width
// Ref: http://wordpress.stackexchange.com/questions/6499/how-to-create-a-conditional-content-width-for-a-wordpress-theme
if ( ! isset( $content_width ) ) $content_width = 885;

$theme_config = array(
	'theme_name' 	=> __('Panel', 'theme_admin'), 
	'theme_slug' 	=> 'panel',
	'theme_version'		=> '1.2',
	
	// Theme Types
	'theme_types' => array( 'app', 'portfolio', 'slide', 'custom-sidebar','product'),
	
	// Theme Custom Meta
	'theme_custom_metas' => array( 'page' ),
	
	// Theme Menus
	'theme_menus' => array(
			'primary' => __('Primary Navigation', 'theme_admin'),
			'footer' => __('Footer Navigation', 'theme_admin')
	),
	
	// Theme Sidebar
	'theme_sidebars' => array(
		array(
			'id' => 'sidebar',
			'name' => __('Sidebar Widget Area', 'theme_admin'),
			'description' => __('Sidebar Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'home',
			'name' => __('Home - Sidebar Widget Area', 'theme_admin'),
			'description' => __('Home - Sidebar Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'blog',
			'name' => __('Blog - Sidebar Widget Area', 'theme_admin'),
			'description' => __('Blog - Sidebar Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'first-footer',
			'name' => __('1st Footer Widget Area', 'theme_admin'),
			'description' => __('1st Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'second-footer',
			'name' => __('2nd Footer Widget Area', 'theme_admin'),
			'description' => __('2nd Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'third-footer',
			'name' => __('3rd Footer Widget Area', 'theme_admin'),
			'description' => __('3rd Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		),
		array(
			'id' => 'fourth-footer',
			'name' => __('4th Footer Widget Area', 'theme_admin'),
			'description' => __('4th Footer Widget Area', 'theme_admin'),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	),
	
	// Theme Shortcode
	'theme_shortcodes' => array(
		'utility',
		'column',
		'elements',
		'image',
		'tab',
		'apps',
		'social',
		'slides',
		'map',
		'blog',
		'contact',
		'pricing',
		'portfolio',
		'product'
	),
	
	// Theme Options
	'theme_options' => array(
		'appearance' 	=> __('Appearance', 'theme_admin'),
		'header' 		=> __('Header', 'theme_admin'),
		'footer' 		=> __('Footer', 'theme_admin'),
		'content' 		=> __('Content', 'theme_admin'),
		'font' 			=> __('Font', 'theme_admin'),
		'home' 			=> __('Home', 'theme_admin'),
		'apps' 			=> __('Apps', 'theme_admin'),
		'portfolio' 	=> __('Portfolio', 'theme_admin'),
		'product' 	=> __('Portfolio', 'theme_admin'),
		'blog' 			=> __('Blog', 'theme_admin'),
		'advance' 		=> __('Advance', 'theme_admin'),
	),
	
	// Theme Documents
	'theme_documents' => array(
		'changes-log' 	=> __('Update', 'theme_admin'),
		'credit' 		=> __('Credits', 'theme_admin'),
		'support' 		=> __('Support', 'theme_admin')
	),
	
);