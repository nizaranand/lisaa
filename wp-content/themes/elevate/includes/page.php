<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Page.php
//	The template used for displaying page content in page.php.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>

	<div class="page-content"><!-- BEGIN .page-content -->
	
		<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		
		<div class="entry-content"><!-- BEGIN .entry-content -->

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tva' ) . '</span>', 'after' => '</div>' ) ); ?>
		
		</div><!-- END .entry-content -->

	</div><!-- END .page-content -->