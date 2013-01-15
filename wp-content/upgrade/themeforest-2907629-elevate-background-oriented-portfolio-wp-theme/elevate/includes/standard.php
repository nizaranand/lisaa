<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Standard.php
//	The default template for displaying Standard content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>

	<?php if(has_post_thumbnail()) { ?>
	<div class="entry-thumb">

		<?php if (is_single()) { ?>

		<?php the_post_thumbnail( 'large' ); ?>

		<?php } else { ?>

		<a class="icon permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>

		<span class="overlay"></span>
		
		<?php the_post_thumbnail( 'large' ); ?>		

		<?php } ?>

	</div>
	<?php } ?>

	<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		<header class="entry-header">

			<?php if (is_single() ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php } else { ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php } ?>

		</header>

		<?php if (is_archive() ) { ?>
		<div class="entry-summary"><!-- BEGIN .entry-summary -->

			<?php the_excerpt(); ?>

		</div><!-- END .entry-summary -->
		<?php } else { ?>
		<div class="entry-content"><!-- BEGIN .entry-content -->

			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'tva' ) ); ?>

		</div><!-- END .entry-content -->
		<?php } ?>

		<?php tva_page_meta(); ?>

	</div><!-- END .<?php echo get_post_type( $post->ID ) ?>-content -->