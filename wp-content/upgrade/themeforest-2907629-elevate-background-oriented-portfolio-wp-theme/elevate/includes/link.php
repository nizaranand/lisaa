<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Quote.php
//	The default template for displaying Quote content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>
	
	<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		<?php $link_url = get_post_meta(get_the_ID(), 'tva_link_url', TRUE); ?>
		<?php if($link_url) { ?>

		<header class="entry-header">
		
			<?php if (is_single() ) { ?>
			<h1 class="entry-title"><a href="<?php echo $link_url; ?>"><?php the_title(); ?></a></h1>
			<?php } else { ?>
			<h2 class="entry-title"><a href="<?php echo $link_url; ?>"><?php the_title(); ?></a></h2>
			<?php } ?>
			<div class="url"><?php echo $link_url; ?></div>
		
		</header>

		<?php } ?>
	
		<?php if (is_single() ) { ?>
		<div class="entry-content"><!-- BEGIN .entry-content -->

			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>

		</div><!-- END .entry-content -->
		<?php } ?>
		
		<?php tva_page_meta(); ?>

	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->
	
	
	