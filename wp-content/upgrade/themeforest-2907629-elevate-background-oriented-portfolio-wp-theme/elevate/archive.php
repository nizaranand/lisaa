<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Archive.php
//	The default template for displaying archive content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="blog grid twelve columns"><!-- BEGIN #content -->

		<div class="archive-header row"><!-- BEGIN .archive-header -->
		<h3 class="entry-title">
		
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: %s', 'tva' ), '<span>' . get_the_date() . '</span>' ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: %s', 'tva' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tva' ) ) . '</span>' ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: %s', 'tva' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tva' ) ) . '</span>' ); ?>
		<?php else : ?>
			<?php _e( 'Blog Archives', 'tva' ); ?>
		<?php endif; ?>		
		
		</h3>
		</div><!-- END .archive-header -->
		
		<div class="isotope" <?php if (wp_is_mobile() ) { ?>style="visibility: visible !important;"<?php } ?>><!-- BEGIN .isotope -->	

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