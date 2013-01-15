<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Template Name: Archives Template
//	Template-archives.php
//	The custom template for displaying archives content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="archives page eight columns"><!-- BEGIN #content -->

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- Begin #post-<?php the_ID(); ?> -->

			<div class="page-content"><!-- BEGIN .page-content -->
				
				<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				
				<div class="entry-content"><!-- BEGIN .entry-content -->
			
				<?php the_post(); ?>
				<?php the_content(); ?>
				
				<?php if ( is_active_sidebar( 'sidebar-archives' ) ) : // Check if sidebar is active ?>
				<?php dynamic_sidebar( 'sidebar-archives' ); ?>
				<?php endif; ?>
				
				</div><!-- END .entry-content -->

			</div><!-- END .page-content -->
			
		</article><!-- END #post-<?php the_ID(); ?> -->

	</div><!-- END #content -->

<?php get_footer(); ?>