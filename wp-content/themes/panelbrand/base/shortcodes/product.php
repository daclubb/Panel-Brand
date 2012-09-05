
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
		'post__not_in' => array($post->ID),
		'orderby' => 'menu_order',
		'order' => 'ASC'
		
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
	$titlelist = '<div class="titlelist titlelist-p">';
	$counter = 0;
	
	
	foreach ( $products as $product ) {
	
	
	
	
	$appearance_slide_images = get_post_meta($product->ID, 'appearance_slide_images', true);
		// Get "Title & Text" Meta
	$appearance_use_image = get_post_meta($product->ID, 'appearance_use_image', true);
	$appearance_title_image = get_post_meta($product->ID, 'appearance_title_image', true);
	$appearance_google_web_font_custom = get_post_meta($product->ID, 'appearance_google_web_font_custom', true);
	
	// Slide Option
	$img_slide_effect = theme_options( 'portfolio', 'img_slide_effect' );
	$img_slide_direction = theme_options( 'portfolio', 'img_slide_direction' );
	$img_slide_pause = theme_options( 'portfolio', 'img_slide_pause' ) * 1000;
	$img_slide_animate_speed = theme_options( 'portfolio', 'img_slide_animate_speed' ) * 1000;
	
	
 	        	  
	        	    
	
	// General App Option
	$show_qr = theme_options( 'portfolio', 'show_qr' );
	
	// Compute Screen W & H
	$s_width = 600;
	$s_height = 450;


// Get "Product Info" Meta	
	$product_category = wp_get_post_terms($product->ID, 'portfolio_category', array("fields" => "names"));
	$info_short_desc = get_post_meta($product->ID, 'info_short_desc', true);
	$info_popup_short_desc = get_post_meta($product->ID, 'info_popup_short_desc', true);
	$info_product_code = get_post_meta($product->ID, 'info_product_code', true);
	$info_product_size = get_post_meta($product->ID, 'info_product_size', true);
	
	$i++;				
					
		$last = ( ++$counter % 4 == 0 ) ? 'last' : '';
		$clear = ( $counter % 4 == 0 ) ? '<div class="clear"></div>' : '';
		
	
		$title = $product->post_title;
		$fullcontent = $product->post_content;
		$product_category = wp_get_post_terms( $product->ID, 'product_category', array("fields" => "names" ));
		$link = get_permalink( $product->ID );
		

		$feature_image_id = get_post_thumbnail_id( $product->ID );
		$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
		$feature_image_url = $feature_image_url[0];
		if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
		
		$resized_post_thumb_src = theme_get_image( $feature_image_url, true );
		$titlelist	.='<span class="tilte'.$i.'"> <a href="#data'.$i.'" class="fancybox ">'.$title.'</a>   / </span>';
		
		$list .= '<div class="one_fourth ' . $last . ' item product-item item'.$i.'">';
		

		$list .= '<div class="icon-watch product">';
		$list .= '<a href="#data'.$i.'" class="fancybox"><img class="grayscale" src="'.$resized_post_thumb_src.'" alt="'.$title.'" title="'.$title.'" rel="tip" /></a>';
		
		

		$list .= '<a href="#data'.$i.'" class="fancybox"><div class="product-info"><div class="inner">';
		$list .= '<p class="title">'.$title.'</p>';
		$list .= '<p class="short_desc">'.$info_short_desc.'</p>';
		if($info_product_size) {
		$list .= '<p class="short_size"> size: '.$info_product_size.'</p>';	
		}	
		$list .= '</div></div></a>';

		$list .= '</div>';
		$list .= '<div id="data'.$i.'" class="data"  style="width:965px;height:450px;display: none;">';
		$list .=  '<div class="slider-wraper">';
		$list .=  '<ul class="slides-indetail">';

		 if( is_array( $appearance_slide_images ) )
	        	        foreach( $appearance_slide_images as $image ) {
	        	        	        	        	$resized_image_src = theme_get_image( $image, $s_width, $s_height, true );
	     $list .= '<img src='.$resized_image_src.' />';   	
	       
	     } 
	     
	    $list .= '</ul>';
	    
		
		
		$list .= '</div>';
		
	    $list .= '<div class="text">'.$fullcontent;
		
		$list .= '<div class="product-detail" style="border-top:1px solid #999;padding:10px 0;margin:">';
		
		
		
		
		$list .= '<h6>Product detail</h6>';
		$list .= '<p class="short_desc">'.$info_popup_short_desc.'</p>';
		if($info_product_size) {
		$list .= '<p class="short_size"> size: '.$info_product_size.'</p>';	
		}		
		$list .= '</div>';
		$list .= '</div>';
		$list .= '</div>';
		$list .= '</div>';

		$list .= $clear;
	}
	$titlelist	.='</div>';
	return <<<RET
$titlelist	
$list

RET;

}
?>




