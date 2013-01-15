<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Single.php
//	The default template for displaying Single content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="blog single eight columns"><!-- BEGIN #content -->

		<?php if (have_posts()) : while (have_posts()) : the_post(); // We be loopin' ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>><!-- Begin #post-<?php the_ID(); ?> -->

		<?php // Checks wich post format is used, and wich template to serve. In case a 'normal' post is used the 'standard' template is served.

			$post_format = get_post_format();
			get_template_part( 'includes/'.$post_format );

			if($post_format == '')
			get_template_part( 'includes/standard' );

		?>

		</article><!-- END #post-<?php the_ID(); ?> -->

		<div class="row sep"></div>

		<?php comments_template( '', true ); ?>

		<?php endwhile; else: ?>

		<article id="post-0" <?php post_class() ?>><!-- BEGIN #post-0 -->

			<h1 class="entry-title"><?php _e( 'Error 404 - Not Found', 'tva' ) ?></h1>

			<div class="post-content"><!-- BEGIN .post-content -->
				<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'tva' ) ?></p>
			</div>

		</article><!-- END #post-0 -->

		<?php endif; // We no longer be loopin'  ?>		

		<nav id="float-page-navigation" class="row"><!-- BEGIN #float-page-navigation -->

			<span class="nav-previous"><?php next_post_link( ' %link' ); ?></span>
			<span class="nav-next"><?php previous_post_link( '%link' ); ?></span>

		</nav><!-- BEGIN #page-navigation -->

		<nav id="page-navigation" class="row"><!-- BEGIN #page-navigation -->

			<span class="nav-previous"><?php next_post_link( '<span class="prev-icon"></span> %link' ); ?></span>
			<span class="nav-next"><?php previous_post_link( '%link <span class="next-icon"></span>' ); ?></span>

		</nav><!-- BEGIN #page-navigation -->

	</div><!-- END #content -->

<?php get_footer(); ?>