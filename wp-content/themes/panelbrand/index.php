<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				
			<div id="impact">
				<div id="banner" class="fadeslide">
			 	 <?php $recent = new WP_Query("cat=3"); while($recent->have_posts()) : $recent->the_post();?>	   
			 	   <div class="item">   
			 	      		
					<?php 
					remove_filter( 'the_content', 'wpautop' );
					the_content(); 
					add_filter( 'the_content', 'wpautop' );
					?>	
					<div class="text">
						<h3 class="title"><?php the_title(); ?></h3>
						<p class="description">
							<?php $bannerDesc = get_post_meta($post->ID, 'banner-description', true); echo $bannerDesc;?>
						</p>	
					</div>	
					<div class="navslide"></div>	
				 </div>	           
				<?php endwhile;?> 
			 </div>	


			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>