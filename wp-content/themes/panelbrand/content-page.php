<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php 	$appearance_slide_images = get_post_meta($post->ID, 'general_slide_image_s', true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</header><!-- .entry-header -->
	<?php if($appearance_slide_images) {	?>
	<div id="page-slide" class="pageslide afterclear">
				<style type="text/css" media="screen">
					
				</style>

	        	       <ul style="width:100%">
	        	        <?php 
	        	        if( is_array( $appearance_slide_images ) )
	        	        foreach( $appearance_slide_images as $image ) : 
	        	        	$resized_image_src = theme_get_image( $image, $s_width, $s_height, true );
	        	        ?>
	        	        	<li style="width:100%"><img src="<?php echo $resized_image_src; ?>" /></li>
	        	        <?php endforeach; ?>
	        	       </ul> 
	     </div>
	   <?php }?>
	<div class="entry-content">
		
		<?php the_content(); ?>
		
		 
		
	</div><!-- .entry-content -->
		
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
