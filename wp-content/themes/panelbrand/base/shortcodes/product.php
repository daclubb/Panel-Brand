
<?php


// Apps List
add_shortcode('product', 'theme_shortcode_product');
function theme_shortcode_product($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' => '200',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'product',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'product_category',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_product_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );


	$products = get_posts( $args );
	$list = '';
	$counter = 0;
	foreach ( $products as $product ) {

// Get "Product Info" Meta	
	$product_category = wp_get_post_terms($product->ID, 'portfolio_category', array("fields" => "names"));
	$info_short_desc = get_post_meta($product->ID, 'info_short_desc', true);
	$info_product_code = get_post_meta($product->ID, 'info_product_code', true);
	$info_product_size = get_post_meta($product->ID, 'info_product_size', true);
	
		$last = ( ++$counter % 4 == 0 ) ? 'last' : '';
		$clear = ( $counter % 4 == 0 ) ? '<div class="clear"></div>' : '';

		$title = $product->post_title;
		$product_category = wp_get_post_terms( $product->ID, 'product_category', array("fields" => "names" ));
		$link = get_permalink( $product->ID );
		

		$feature_image_id = get_post_thumbnail_id( $product->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, 241, 241, true );

		$list .= '<div class="one_fourth ' . $last . '">';
		

		$list .= '<div class="icon-watch item">';
		$list .= '<a href="'.$link.'"><img class="grayscale" src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		
		

		$list .= '<div class="product-info">';
		$list .= '<div class="title">'.$title.'</div>';
		$list .= '<div class="short_desc">'.$info_short_desc.'</div>';
		$list .= '<div class="short_size">'.$info_product_size.'</div>';		
		$list .= '</div>';

		$list .= '</div>';
		$list .= '</div>';

		$list .= $clear;
	}
	return <<<RET
$list
RET;
}

