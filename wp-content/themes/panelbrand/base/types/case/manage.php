<?php

add_filter( 'manage_edit-case_columns', 'edit_case_columns' );
function edit_case_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		're-order' 	=> __( 'Reoder', 'theme_admin' ),
		'featured' 	=> __( 'Featured', 'theme_admin' ),
		'title' 	=> __( 'Title', 'theme_admin' ),
		'category' 	=> __( 'Category', 'theme_admin' ),
		'date' 		=> __( 'Date', 'theme_admin' ),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_case_columns' );
function manage_case_columns( $column ) {
	global $post;
	$icon = theme_get_attachment_src( get_post_meta($post->ID, 'info_icon', true) );
	$featured = get_post_meta($post->ID, 'info_side_case_featured', true);
	$category = wp_get_post_terms($post->ID, 'case_category', array("fields" => "names"));
	
	
	if ( $post->post_type == "case" ) {
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