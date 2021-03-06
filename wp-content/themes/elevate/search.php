<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Search.php
//	The default template for displaying Search content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="blog grid twelve columns"><!-- BEGIN #content -->

		<div class="archive-header row"><!-- BEGIN .archive-header -->
		<span><?php printf( __( 'Search Results for: %s', 'tva' ), '<span>' . get_search_query() . '</span>' ); ?></span>
		</div><!-- END .archive-header -->

		<div class="isotope"><!-- BEGIN .isotope -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // We be loopin' ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>><!-- Begin #post-<?php the_ID(); ?> -->

		<?php 

			$post_format = get_post_format();
			get_template_part( 'includes/'.$post_format );
							
			if($post_format == '')
			get_template_part( 'includes/standard' );

		?>

		</article><!-- END #post-<?php the_ID(); ?> -->

		<?php endwhile; endif; wp_reset_query(); // We no longer be loopin' ?>

		</div><!-- END .isotope -->

	</div><!-- END #content -->

<?php get_footer(); ?>