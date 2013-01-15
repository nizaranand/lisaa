<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Status.php
//	The default template for displaying Status content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>
	
	<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		<div class="entry-content"><!-- BEGIN .entry-content -->
			
			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>
			
			<div class="posted">
			<?php echo get_avatar( $post->post_author, 20 ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_time(); ?></a>
			</div>

		</div><!-- END .entry-content -->
		
	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->