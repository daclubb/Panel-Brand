<?php

add_filter( 'manage_edit-product_columns', 'edit_product_columns' );
function edit_product_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		're-order' 	=> __( 'Reoder', 'theme_admin' ),
		'featured' 	=> __( 'Featured', 'theme_admin' ),
		'title' 	=> __( 'Title', 'theme_admin' ),
		'short_desc' 	=> __( 'Shor', 'theme_admin' ),		
		'product_code' 	=> __( 'Product code', 'theme_admin' ),
		'category' 	=> __( 'Category', 'theme_admin' ),
		'date' 		=> __( 'Date', 'theme_admin' ),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_product_columns' );
function manage_product_columns( $column ) {
	global $post;
	$icon = theme_get_attachment_src( get_post_meta($post->ID, 'info_icon', true) );
	$featured = get_post_meta($post->ID, 'info_side_product_featured', true);
	$category = wp_get_post_terms($post->ID, 'product_category', array("fields" => "names"));
	
	
	if ( $post->post_type == "product" ) {
		switch( $column ) {
			
			case 'featured':
				echo ( $featured == 'on' ) ? '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/admin/icons-16/star.png" width="16" />' : '';
				break;
			
			case 'category':
				echo implode( ', ', $category );
				break;
			
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}



?>