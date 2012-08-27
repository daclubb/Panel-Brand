<?php

$config = array(
	'title' 	=> __('Portfolio Info', 'theme_admin'),
	'group_id' 	=> 'info',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'portfolio' ),
	'multi' 	=> false
);
$options = array(
	
	
	array(
		'type' 			=> 'textarea',
		'id' 			=> 'short_desc',
		'title' 		=> __('Short Description', 'theme_admin'),
		'description' 	=> __('Recommend 100 - 120 Alphabet', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'customer',
		'title' 		=> __('Customer', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'budget',
		'title' 		=> __('Budget', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'date',
		'id' 			=> 'create_date',
		'title' 		=> __('Create Date', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),

	
	
	
);

new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Portfolio Info', 'theme_admin'),
	'group_id' 	=> 'info_side',
	'context'	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'portfolio' ),
	'multi' 	=> false
);

$options = array(
	
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'portfolio_featured',
		'title'		 	=> __('Featured', 'theme_admin'),
		'description' 	=> __('featured app will be shown on the app slide dock', 'theme_admin'),
		'default' 		=> 'on'
	),

);

new metaboxes_tool($config,$options);

?>