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

		<blockquote class="entry-quote">
		<?php $quote = get_post_meta(get_the_ID(), 'tva_quote', TRUE); // We be quotin' ?>
		<?php $quote_person	= get_post_meta(get_the_ID(), 'tva_quote_person', TRUE); // Who we be quotin' ?>
		<?php echo $quote; ?>
			
		<?php if($quote_person) { ?><div class="quoted">&#151; &nbsp;<?php echo $quote_person; ?></div><?php } ?>			
		</blockquote>	
	
		<?php if (is_single() ) { ?>
		<div class="entry-content"><!-- BEGIN .entry-content -->

			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>

		</div><!-- END .entry-content -->
		<?php } ?>

		<?php tva_page_meta(); ?>

	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->