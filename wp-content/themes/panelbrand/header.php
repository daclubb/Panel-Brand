 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?> class="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/media-queries.css" type="text/css" media="screen" />	
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" language="Javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="Javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.cycle.all.js"></script>
<script type="text/javascript" language="Javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.fancybox.css" media="screen" />



<script type="text/javascript">
			
		$('#banner').cycle({ 
		    fx:      'fade', 
		    speedIn:  1000, 
		    speedOut: 1000,  
		    pager:  '.navslide' 
	    });
	    
	    $(".slides-indetail").cycle({ 
		    fx:      'fade', 
		    speedIn:  500, 
		    speedOut: 700,  
		    pager:  '.navslide' 
	    });
	    
	    $(".pageslide ul").cycle({ 
		    fx:      'fade', 
		    speedIn:  500, 
		    speedOut: 700,  
		   
	    });

	
    
    
/*
    $(function() {
    $('.slides-indetail').each(function(i) {
        $(this).before('<div class="imgSelect imgSelect'+i+'">').cycle({
            fx:     'fade',
            speed:  'fast',
            timeout: 2000,
            pager:  '.imgSelect' + i
            });
        });
    });
*/


		$('.fancybox').fancybox({
			 helpers:  {
		        overlay : {
			            css : {
			                'background' : 'rgba(0, 0, 0, 0.8)'
		                }
		              }     
		     }
		     
		});
	
</script>	
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">
		$(document).ready(function() {
			var iwidth = $('.product-item').width();
			$('.item .product').css({'height':iwidth+'px'});
			var i4width = $('.product-item').width()*4;
			$('.titlelist-p').css({'width':i4width+'px'});
			
			var i2width = $('.download-item').width()*2;
			$('.titlelist-d').css({'width':i2width+'px'});
			
			
			$(".tilte1").hover( function () { $(this).addClass("hover"); }, function () { $(this).removeClass("hover"); } );
			
			$('.entry-title').append("<div class='right-corner' />");
			$('.tilte4').after("<br />")
			
			$('.qtrans_language_chooser li:first-child a').after("<span style='float:left;margin:3px 4px;'>/</span>");
			
		});
	</script>
<?php if(is_home()) { /*  Add .home to body  */ ?>
 <script type="text/javascript">
	$(document).ready(function() {
		$('body').addClass("home ") ;
		
	});
	
	
 </script>	
<?php }?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17939604-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed <?php echo get_post_type(); ?>">
	<header id="branding" role="banner">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="tagline">
					
				<?php $recent = new WP_Query("p=19"); while($recent->have_posts()) : $recent->the_post();?>           		
					<?php the_content(); ?>			           
			    <?php endwhile;?>

				</h2>
			</hgroup>

			<nav id="access" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
				<div id="head-foot">
					<nav id="lan">
					
						<!-- <p><a class="current" href="#">TH</a> / <a href="#">EN</a>	</p> -->
					</nav>				
					<div id="copyright">
						<p>Copyright © 2012 PANEL BRAND. </p>
						<p>All Rights Reserved. Design by <a style="color:black;" href="http://www.builk.com">Builk Asia</a></p>
					</div>
				</div>	
	</header><!-- #branding -->


	<div id="main">
