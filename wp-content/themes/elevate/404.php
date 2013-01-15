<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	404.php
//	The default template for displaying 404 pages (Not Found).
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="page eight columns"><!-- BEGIN #content -->

		<article id="post-0" class="page error404 not-found"><!-- Begin #post-0 -->
		
			<div class="page-content"><!-- BEGIN .post-content -->
		
				<header class="entry-header">
				<h1 class="entry-title"><?php _e( '404 (Page not found)', 'tva' ); ?></h1>
				</header>
				
				<div class="entry-content"><!-- BEGIN .entry-content -->

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'tva' ); ?></p>

				<?php if ( is_active_sidebar( 'sidebar-archives' ) ) : // Check if sidebar is active ?>
				<?php dynamic_sidebar( 'sidebar-archives' ); ?>
				<?php endif; ?>
						
				</div><!-- END .entry-content -->

			</div><!-- END .post-content -->			
	
		</article><!-- END #post-0 -->

	</div><!-- END #content -->

<?php get_footer(); ?>