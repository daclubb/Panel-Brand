<?php

// General Meta
$config = array(
	'title' => 'Theme Option',
	'group_id' => 'general_side',
	'callback' => '',
	'context' => 'side',
	'priority' => 'low',
	'types' => array( 'page', 'post' ),
	'multi' => false
);
$options = array(
	array(
		'type' => 'select',
		'id' => 'custom_sidebar',
		'title' => 'Custom Sidebar',
		'description' => '',
		'default' => '',
		'source' => array( 
			'post_type' => 'custom_sidebar'
		),
		'options' => array(
			'' => 'choose ...'
		)
	),
);
new metaboxes_tool($config,$options);

$config = array(
	'title' => 'Slide Images',
	'group_id' => 'general',
	'callback' => '',
	'context' => 'normal',
	'priority' => 'low',
	'types' => array( 'page', 'post' ),
	'multi' => false
);
$options = array(
	array(
		'type' => 'separator',
		'title' => 'Images for slide, Description'
	),

	array(
		'type' 			=> 'images',
		'id' 			=> 'slide_image_s',
		'toggle_group' 	=> 'toggle-effect toggle-effect-slide',
		'title' 		=> __('Image for Slide', 'theme_admin'),
		'description' 	=> ''
	),


);
new metaboxes_tool($config,$options);

// Shortcode Meta
$config = array(
	'title' 		=> __('Data for Shortcode', 'theme_admin'),
	'group_id' 		=> 'shortcode',
	'types' 		=> array( 'app', 'portfolio', 'page', 'post' ),
	'context' 		=> 'normal',
	'multi' 		=> false,
	'priority' 		=> 'low'
);
$options = array(
	array(
		'type' 			=> 'images',
		'id' 			=> 'photos_wall_images',
		'title' 		=> __('Photos Bar images', 'theme_admin'),
		'description' 	=> __('use [photos_bar] shortcode to show these images as "Photos Wall"', 'theme_admin'),
	)
);
new metaboxes_tool($config,$options);

?>