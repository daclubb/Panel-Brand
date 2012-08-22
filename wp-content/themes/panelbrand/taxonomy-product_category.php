<?php 
get_header(); ?>
		
	<section id="body" class="full-width">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php theme_breadcrumb(); ?>
	        	
	        	<div class="clear"></div>
	        	<ul id='source' class="product-archive-list"></ul>
	        	
	        	<ul id="destination" class="product-archive-list" style="display: none"> 
	        		<?php 
	        			while (have_posts()) : the_post();
	        				$product = $post; 
	        				
	        				$featured = ( get_post_meta($product->ID, 'info_side_product_featured', true) == 'on' ) ? 'featured' : '';
	        				$categories_id = wp_get_post_terms($product->ID, 'product_category', array("fields" => "ids"));
	        				$categories_name = wp_get_post_terms($product->ID, 'product_category', array("fields" => "names"));
	        				
	        				$feature_image_id = get_post_thumbnail_id( $product->ID );
							$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
							$feature_image_url = $feature_image_url[0];
							if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
							$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 175, true );
	        				
	        		?>
	        			
	        			<li data-id="<?php echo $product->ID; ?>" class="all <?php echo implode( ' ', $categories_id ); ?> <?php echo $featured; ?>">
	        				
	        				<div class="photo-frame product-frame icon-product">
	        				
	        				<a href="<?php echo get_permalink( $product->ID ); ?>"><img src="<?php echo $resized_post_thumb_src; ?>" /></a>
		        				<div class="product-info">
		        					<div class="title"><?php echo $product->post_title; ?></div>
		        					<div class="category"><?php echo implode( ' / ', $categories_name ); ?></div>
		        				</div>
	        				</div>



	        			</li>
	        			
	        		<?php endwhile; ?>
	        	</ul>

	        </div>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>