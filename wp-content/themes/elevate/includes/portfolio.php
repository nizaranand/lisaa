<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Portfolio.php
//	The default template for displaying Portfolio content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>

	<div class="entry-thumb"><!-- BEGIN .entry-thumb -->

		<?php if (!is_single() ) { ?>
		<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' ); ?>
		<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>" data-gal="prettyPhoto[slides]"><?php printf(__( 'View full', 'tva')); ?></a>
		<?php } ?>

		<a class="icon permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		
		<?php if (!is_single() ) { ?>
		<div class="entry-summary">
					
			<?php the_excerpt(); ?>

		</div>
		<?php } ?>
	
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">

		<?php $thumb = get_post_meta(get_the_ID(), 'tva_portfolio_additional_thumb', TRUE); ?>
		
		<?php if ($thumb) { ?>

			<img src="<?php echo $thumb ?>">

		<?php } else { ?>
		
			<?php if (has_post_thumbnail() ) { ?>
			
				<?php if (wp_is_mobile() ) { ?>
				<?php the_post_thumbnail( 'portfolio-small' ); ?>
				<?php } else { ?>
				<?php the_post_thumbnail( 'portfolio-small' ); ?>
				<?php } ?>
				
			<?php } else { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/thumb.png">
			<?php } ?>
		
		<?php } ?>

		</a>

		<span class="overlay"></span>

	</div><!-- END .entry-thumb -->

	<header class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	</header>

	<div class="entry-meta"><?php the_terms($post->ID, 'portfolio-type', '', ', ', ''); ?></div>