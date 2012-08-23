<?php

// Apps List
add_shortcode('portfolio', 'theme_shortcode_portfolio');
function theme_shortcode_portfolio($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' => '100',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'portfolio',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'portfolio_category',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_portfolio_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );

	$portfolios = get_posts( $args );
	$list = '';
	$counter = 0;
	foreach ( $portfolios as $portfolio ) {

		$last = ( ++$counter % 1 == 0 ) ? 'last' : '';
		$clear = ( $counter % 1 == 0 ) ? '<div class="clear"></div>' : '';
		$i++;
		$title = $portfolio->post_title;
		$content = $portfolio->post_content;
		$portfolio_category = wp_get_post_terms( $portfolio->ID, 'portfolio_category', array("fields" => "names" ));
		$link = get_permalink( $portfolio->ID );
		

		$feature_image_id = get_post_thumbnail_id( $portfolio->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, true );
		
		$list .='<div class="story story'.$i.'">';
		$list .='<a class="pic" href="'.$link.'"><img src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		$list .='<div class="info">';
		$list .='<h3 class="title">'.$title.'</div>';
		$list .='<div class="content">'.$content.'</div>';
		$list .='<a class="readmore" href="'.$link.'">Read more.</a>';

		
		$list .= '</div>';
		$list .= '</div>';

		
	}
	return <<<RET
$list
RET;
}