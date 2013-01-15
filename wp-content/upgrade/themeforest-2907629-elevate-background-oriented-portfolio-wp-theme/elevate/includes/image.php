<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Image.php
//	The default template for displaying Image content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>	

	<?php if(has_post_thumbnail()) { ?>
	<div class="entry-format entry-thumb"><!-- BEGIN .entry-format -->

		<?php $lightbox				= get_post_meta(get_the_ID(), 'tva_image_enable_lightbox', TRUE); ?>
		<?php $caption				= get_post_meta(get_the_ID(), 'tva_image_enable_caption', TRUE); ?>
		<?php $caption_custom		= get_post_meta(get_the_ID(), 'tva_image_caption_custom', TRUE); ?>
		<?php $caption_custom_link	= get_post_meta(get_the_ID(), 'tva_image_caption_custom_link', TRUE); ?>

		<?php if (is_single() ) { ?>

		<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' ); ?>
		<?php if ($lightbox == 'yes' ) { ?>
		<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>" data-gal="prettyPhoto[slides]"><?php printf(__( 'View full', 'tva')); ?></a>
		<?php } else { ?>
		<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>"><?php printf(__( 'View full', 'tva')); ?></a>
		<?php } ?>
				
		<?php } else { ?>

		<div class="entry-summary">
					
			<?php the_excerpt(); ?>

		</div>
		
		<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' ); ?>
		<?php if ($lightbox == true ) { ?>
		<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>" data-gal="prettyPhoto[slides]"><?php printf(__( 'View full', 'tva')); ?></a>
		<?php } else { ?>
		<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>"><?php printf(__( 'View full', 'tva')); ?></a>
		<?php } ?>
		<a class="icon permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>

		<span class="overlay"></span>
			
		<?php } ?>
		
		<?php if ($caption == true ) { ?>
		<div class="image-caption">
		<?php if ($caption_custom) { ?>
		<?php if ($caption_custom_link) { ?><a href="<?php echo $caption_custom_link ?>"><?php } ?>
		<?php echo $caption_custom ?>
		<?php if ($caption_custom_link) { ?></a><?php } ?>
		<?php } else { ?>
		<?php the_title(); ?>
		<?php } ?>
		</div>
		<?php } ?>

		<?php the_post_thumbnail( 'large' ); ?>
	
	</div><!-- END .entry-format -->
	<?php } ?>
	
	<?php if (is_single() ) { ?>
	<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		<header class="entry-header">

			<h1 class="entry-title"><?php the_title(); ?></h1>

		</header>
	
		<div class="entry-content"><!-- BEGIN .entry-content -->
				
			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>

		</div><!-- END .entry-content -->
		
		<?php tva_page_meta(); ?>

	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->
	<?php } ?>