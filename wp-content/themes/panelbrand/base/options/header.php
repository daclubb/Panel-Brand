<?php 
	
	// Option
	$options = array(
		
		// Header
		array(
			'title' 	=> __('Header Container', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'color',
					'id' 			=> 'header_bg_color',
					'title' 		=> __('Header BG Color', 'theme_admin'),
					'description' 	=> __('background color of header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),
						
			)
		),
		
		// Logo
		array(
			'title' 	=> __('Logo', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'branding_top_margin',
					'title' 		=> __('Top Margin', 'theme_admin'),
					'description' 	=> __('0 - 20 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '0',
					'min' 			=> '0',
					'max' 			=> '20',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'branding_type',
					'toggle' 		=> 'toggle-branding-type',
					'title' 		=> __('Logo Type', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> 'text',
					'options' 		=> array(
						'text' 			=> __('Text', 'theme_admin'),
						'image' 		=> __('Image', 'theme_admin'),
					),
					'images' 		=> array(
						'text' 			=> 'branding-type/text.png',
						'image' 		=> 'branding-type/image.png',
					)
				),
				
				// Text
				array(
					'type' 			=> 'range',
					'id' 			=> 'branding_font_size',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('20 - 28 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '24',
					'min' 			=> '20',
					'max' 			=> '28',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'branding_font_color',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#333333'
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'branding_desc',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Description Text', 'theme_admin'),
					'description' 	=> __('show description text', 'theme_admin'),
					'default' 		=> 'off'
				),
				
				// Image
				array(
					'type' 			=> 'image',
					'id' 			=> 'branding_image',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-image',
					'title' 		=> __('Logo Image', 'theme_admin'),
					'description' 	=> __('recommended height is 60px', 'theme_admin')
				)
				
			)
		),
		
		array(
			'title' 	=> __('Primary Menu', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'menu_font_size',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('10 - 18 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '14',
					'min' 			=> '10',
					'max' 			=> '18',
					'step' 			=> '1'
				),
						
			)
		),
		
	);
	
	$config = array(
		'title' 		=> __('Header', 'theme_admin'),
		'group_id' 		=> 'header',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>