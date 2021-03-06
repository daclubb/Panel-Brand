<?php 
get_header('page'); ?>
		
	<section id="body" class="full-width">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php theme_breadcrumb(); ?>
	        	
	        	<?php
	        		// Get All Apps
	        		$products = get_posts( array( 'post_type' => 'product', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
	        		$categories = get_terms( 'product_category' );
	        	?>
	        	
	        	<ul id="platform-filter" class="filter-list">
	        		<li data-id='all' class="active">All</li>
	        		
	        		<?php foreach ( $categories as $category ) : ?>
	        			<li data-id='<?php echo $category->term_id; ?>'><?php echo $category->name; ?></li>
	        		<?php endforeach; ?>
	        		
	        	</ul>
	        	
	        	<!--
	        	<ul id="featured-filter" class="filter-list">
	        		<li data-id='featured'>Featured</li>
	        	</ul>
	        	-->

	        	<div class="clear"></div>
	        	<ul id='source' class="product-archive-list"></ul>
	        	
	        	<ul id="destination" class="product-archive-list" style="display: none">
	        		<?php 
	        			foreach ( $products as $product ) : 
	        				
	        				$featured = ( get_post_meta($product->ID, 'info_side_product_featured', true) == 'on' ) ? 'featured' : '';
	        				$categories_id = wp_get_post_terms($product->ID, 'product_category', array("fields" => "ids"));
	        				$categories_name = wp_get_post_terms($product->ID, 'product_category', array("fields" => "names"));
	        				
	        				$feature_image_id = get_post_thumbnail_id( $product->ID );
							$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
							$feature_image_url = $feature_image_url[0];
							if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
							$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 125, true );
	        				
	        		?>
	        			
	        			<li data-id="<?php echo $product->ID; ?>" class="all <?php echo implode( ' ', $categories_id ); ?> <?php echo $featured; ?>">
	        				
	        				<div class="product-frame">

        					<div class="photo-frame icon-watch">
	        				<a href="<?php echo get_permalink( $product->ID ); ?>"><img src="<?php echo $resized_post_thumb_src; ?>" /></a>
	        				<div class="photo-frame-shadow"></div>
	        				</div>

	        				<div class="product-info">
	        					<div class="title"><?php echo $product->post_title; ?></div>
	        					<div class="category"><?php echo implode( ' / ', $categories_name ); ?></div>
	        				</div>

	        				
	        				</div>


	        			</li>
	        			
	        		<?php endforeach; ?>
	        	</ul>

	        </div>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>