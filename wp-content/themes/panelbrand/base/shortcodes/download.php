<?php

// Apps List
add_shortcode('download', 'theme_shortcode_download');
function theme_shortcode_download($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'count' => '100',
		'featured'	=> false,
		'cats'		=> false,
		'ids'		=> false
	), $atts));
	global $post;
	$args = array(
		'post_type' => 'download',
		'post__not_in' => array($post->ID)
	);

	// CATs
	if( $cats ) $args['tax_query'] = array(
		array(
			'taxonomy' => 'download_category',
			'field' => 'id',
			'terms' => preg_split( '/,/', $cats )
		)
	);
	
	// Post Count
	$args['posts_per_page'] = $count;

	// Featured
	if( $featured ) {
		$args['meta_key'] = 'info_side_download_featured';
		if( $featured == 'true' ) $args['meta_value'] = 'on';
		elseif( $featured == 'false' ) $args['meta_value'] = 'off';
	}

	// IDs
	if( $ids ) $args['post__in'] = preg_split( '/,/', $ids );

	$downloads = get_posts( $args );
	$list = '';
	$titlelist = '<div class="titlelist titlelist-d">';
	$counter = 0;
	foreach ( $downloads as $download ) {

		$last = ( ++$counter % 2 == 0 ) ? 'last' : '';
		$clear = ( $counter % 2 == 0 ) ? '<div class="clear"></div>' : '';
		$i++;
		$title = $download->post_title;
		$content = $download->post_content;
		$download_category = wp_get_post_terms( $download->ID, 'download_category', array("fields" => "names" ));
		$link = get_permalink( $download->ID );
		

		$feature_image_id = get_post_thumbnail_id( $download->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, true );
		$titlelist	.='<a href="'.$link.' class="tilte'.$i.'">'.$title.'</a>  / ';
		$list .='<div class="item download-item download-item'.$i.'">';
		$list .='<a class="pic grayscale" href="'.$link.'"><img src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		$list .='<div class="info">';
		$list .='<h3 class="title">'.$title.'</div>';
		$list .='<div class="content">'.$content.'</div>';
		$list .='<a class="readmore" href="'.$link.'">download.</a>';

		
		$list .= '</div>';
		


		
	}
	$titlelist	.='</div>';
	return <<<RET
	$titlelist	
$list
RET;
}