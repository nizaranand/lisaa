<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Single-portfolio.php
//	The default template for displaying single Portfolio content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="portfolio single eight columns"><!-- BEGIN #content -->

		<?php if (have_posts()) : while (have_posts()) : the_post(); // We be loopin' ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- Begin #post-<?php the_ID(); ?> -->
		
			<?php if (get_post_meta(get_the_ID(), 'tva_portfolio_format', true ) == 'Video' ) { // Video ?>

			<?php $custom_video = get_post_meta(get_the_ID(), 'tva_portfolio_video_embed', TRUE); ?>
			<div class="entry-video"><!-- BEGIN .entry-format -->

				<?php

					if( !empty($custom_video) ) {
						echo stripslashes(htmlspecialchars_decode($custom_video));
					} else {
						tva_custom_video($post->ID);
					}

				?>

			</div><!-- END .entry-format -->

			<?php } elseif (get_post_meta(get_the_ID(), 'tva_portfolio_format', true ) == 'Gallery' ) { // Gallery ?>

			<div class="entry-gallery"><!-- BEGIN .entry-gallery -->	
					
				<?php tva_gallery_post( $post->ID, 'large' ); // Gallery ?>
				
			</div><!-- END .entry-gallery -->	

			<?php } else { // Image ?>
			
			<?php $lightbox				= get_post_meta(get_the_ID(), 'tva_image_enable_lightbox', TRUE); ?>
			<?php $caption				= get_post_meta(get_the_ID(), 'tva_image_enable_caption', TRUE); ?>
			<?php $caption_custom		= get_post_meta(get_the_ID(), 'tva_image_caption_custom', TRUE); ?>
			<?php $caption_custom_link	= get_post_meta(get_the_ID(), 'tva_image_caption_custom_link', TRUE); ?>

			<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' ); ?>
			<?php if ($image_src) { ?>
			<div class="entry-thumb"><!-- BEGIN .entry-format -->

				<?php if ($lightbox == 'yes' ) { ?>
				<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>" data-gal="prettyPhoto[slides]"><?php printf(__( 'View full', 'tva')); ?></a>
				<?php } else { ?>
				<a class="icon view-full" href="<?php echo $image_src[0]; ?>" title="<?php the_title(); ?>"><?php printf(__( 'View full', 'tva')); ?></a>
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
				
				<?php the_post_thumbnail( 'full' ); ?>

			</div><!-- END .entry-format -->
			<?php } ?>
			
			<?php } ?>

			<div class="<?php echo get_post_type( $post->ID ) ?>-content"><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

				<header class="entry-header"><!-- BEGIN .entry-header -->

					<h1 class="entry-title"><?php the_title(); ?></h1>

				</header><!-- END .entry-content -->
				
				<div class="portfolio-meta">

					<?php
					$portfolio_date = get_post_meta(get_the_ID(), 'tva_portfolio_date', TRUE);
					$portfolio_client = get_post_meta(get_the_ID(), 'tva_portfolio_client', TRUE);
					$portfolio_client_url = get_post_meta(get_the_ID(), 'tva_portfolio_client_url', TRUE);
					$portfolio_url = get_post_meta(get_the_ID(), 'tva_portfolio_url', TRUE);
					$portfolio_button = get_post_meta(get_the_ID(), 'tva_portfolio_button_color', TRUE);
					?>

					<?php if ($portfolio_date) { ?>
					<div class="portfolio-meta-item">
					<h3 class="entry-title"><?php printf(__( 'Completed:', 'tva' )); ?></h3>
					<span class="entry-meta"><?php echo $portfolio_date ?></span>
					</div>
					<?php } ?>					
					
					<?php if ($portfolio_client) { ?>
					<div class="portfolio-meta-item">
					<h3 class="entry-title"><?php printf(__( 'Client:', 'tva' )); ?></h3>
					<span class="entry-meta"><?php if ($portfolio_client_url) { ?><a href="<?php echo $portfolio_client_url ?>"><?php } ?><?php echo $portfolio_client ?><?php if ($portfolio_client_url) { ?></a><?php } ?></span>
					</div>
					<?php } ?>

					<div class="portfolio-meta-item">
					<h3 class="entry-title"><?php printf(__( 'Skill:', 'tva' )); ?></h3>
					<span class="entry-meta"><?php the_terms($post->ID, 'portfolio-type', '', ', ', ''); ?></span>
					</div>

					<?php if ($portfolio_url) { ?>
					<div class="button button-<?php echo $portfolio_button ?>"><a href="<?php echo $portfolio_url ?>"><?php if ($options[ 'portfolio_launch_text' ]) { ?><?php echo $options[ 'portfolio_launch_text' ] ?><?php } else { ?><?php _e( 'Launch', 'tva' ); ?><?php } ?></a></div>
					<?php } ?>
				
				</div>

				<div class="entry-content"><!-- BEGIN .entry-content -->

					<?php the_content(); ?>
		
				</div><!-- END .entry-content -->

			</div><!-- BEGIN .<?php echo get_post_type( $post->ID ) ?>-content -->

		</article><!-- END #post-<?php the_ID(); ?> -->

		<?php endwhile; else: ?>

		<article id="post-0" <?php post_class() ?>><!-- BEGIN #post-0 -->

			<h1 class="entry-title"><?php _e( 'Error 404 - Not Found', 'tva' ) ?></h1>

			<div class="post-content"><!-- BEGIN .post-content -->
				<p><?php _e( 'Sorry, but you are looking for something that is not here.', 'tva' ) ?></p>
			</div>

		</article>

		<?php endif; wp_reset_query(); // We no longer be loopin' ?>	
		
		<nav id="page-navigation" class="row"><!-- BEGIN #page-navigation -->

			<span class="nav-previous"><?php next_post_link( '<span class="prev-icon"></span> %link' ); ?></span>
			<span class="nav-next"><?php previous_post_link( '%link <span class="next-icon"></span>' ); ?></span>

		</nav><!-- BEGIN #page-navigation -->

		<?php if ($options[ 'portfolio_related_enable' ] == 'enable' ) { ?>
		<?php get_template_part( 'includes/related-portfolio' ); ?>
		<?php } ?>
		
		<nav id="float-page-navigation" class="row"><!-- BEGIN #float-page-navigation -->

			<span class="nav-previous"><?php next_post_link( ' %link' ); ?></span>
			<span class="nav-next"><?php previous_post_link( '%link' ); ?></span>

		</nav><!-- BEGIN #page-navigation -->

	</div><!-- END #content -->

<?php get_footer(); ?>