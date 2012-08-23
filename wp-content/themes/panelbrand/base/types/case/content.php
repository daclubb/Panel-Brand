<?php

$config = array(
	'title' 	=> __('App Info', 'theme_admin'),
	'group_id' 	=> 'info',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'case' ),
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

	// Button #1
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'use_button_1',
		'toggle' 		=> 'toggle-button-1',
		'title' 		=> __('Button #1', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'on'
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_link_url',
		'title' 		=> __('Link URL', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_text',
		'title' 		=> __('Text', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'Launch Project'
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_sub_text',
		'title' 		=> __('Sub Text', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'view the live work'
	),
	array(
		'type' 			=> 'select',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_color',
		'title' 		=> __('Button Color', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'black',
		'options' 		=> array(
			'black' 			=> 'Black',
			'blue' 				=> 'Blue',
			'green' 			=> 'Green',
			'magenta' 			=> 'Magenta',
			'orange' 			=> 'Orange',
			'red' 				=> 'Red',
			'yellow' 			=> 'Yellow',
		),
	),
	
	
);

new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('case Info', 'theme_admin'),
	'group_id' 	=> 'info_side',
	'context'	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'case' ),
	'multi' 	=> false
);

$options = array(
	
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'case_featured',
		'title'		 	=> __('Featured', 'theme_admin'),
		'description' 	=> __('featured app will be shown on the app slide dock', 'theme_admin'),
		'default' 		=> 'on'
	),

);

new metaboxes_tool($config,$options);

?>