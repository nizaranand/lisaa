<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Template Name: Wide Template
//
//	Template-Full-Width.php
//	The default template for displaying Full Width content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="<?php echo get_post_type( $post->ID ) ?> twelve columns"><!-- BEGIN #content -->

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>><!-- Begin #post-<?php the_ID(); ?> -->

		<?php the_post(); ?>
		<?php get_template_part( 'includes/page' ); ?>
			
		</article><!-- END #post-<?php the_ID(); ?> -->

	</div><!-- END #content -->

<?php get_footer(); ?>