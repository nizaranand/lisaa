<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Aside.php
//	The default template for displaying Aside content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>
	
	<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		<div class="entry-content"><!-- BEGIN .entry-content -->
				
			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>

		</div><!-- END .entry-content -->

		<?php tva_page_meta(); ?>

	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->