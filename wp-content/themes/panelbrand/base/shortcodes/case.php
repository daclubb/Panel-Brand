<?php

// Apps List
add_shortcode('case', 'theme_shortcode_case');
function theme_shortcode_case($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' => '100',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'case',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'case_category',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_case_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );

	$cases = get_posts( $args );
	$list = '';
	$counter = 0;
	foreach ( $cases as $case ) {

		$last = ( ++$counter % 1 == 0 ) ? 'last' : '';
		$clear = ( $counter % 1 == 0 ) ? '<div class="clear"></div>' : '';
		$i++;
		$title = $case->post_title;
		$content = $case->post_content;
		$case_category = wp_get_post_terms( $case->ID, 'case_category', array("fields" => "names" ));
		$link = get_permalink( $case->ID );
		

		$feature_image_id = get_post_thumbnail_id( $case->ID );
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