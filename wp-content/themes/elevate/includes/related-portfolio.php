<?php
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

if ( 'portfolio' == get_post_type() ) {
	$taxs = wp_get_post_terms($post->ID, 'portfolio-type' );
	if ($taxs) {
		$tax_ids = array();
		foreach($taxs as $individual_tax) $tax_ids[] = $individual_tax->term_id;

		$args = array(
			'tax_query' => array(
				array(
					'taxonomy'  => 'portfolio-type',
					'terms'     => $tax_ids,
					'operator'  => 'IN'
				)
			),
			'post__not_in'			=> array($post->ID),
			'posts_per_page'		=> 2,
			'ignore_sticky_posts'	=> 1
		);

	$rp_query = new wp_query($args); ?>

<?php if ($rp_query->have_posts()) : ?>

<div id="related-portfolios"><!-- BEGIN #related-portfolios -->

	<header class="entry-header"><!-- BEGIN .related-posts-header -->
	
		<h2 class="entry-title">
		
			<?php if ($options[ 'portfolio_related_title' ]) { ?>
			<?php echo $options[ 'portfolio_related_title' ]; ?>
			<?php } else { ?>
			<?php _e( 'Related Posts', 'tva' ) ?>
			<?php } ?>
			
		</h2>
		<?php if ($options[ 'portfolio_related_description' ]) { ?>
		<div class="related-posts-description"><?php echo $options[ 'portfolio_related_description' ]; ?></div>
		<?php } ?>
		
	</header><!-- END .related-posts-header -->
	
	<div class="row">
	
		<?php while ($rp_query->have_posts()) : $rp_query->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="item four columns"><!-- Begin #post-<?php the_ID(); ?> -->

			<?php get_template_part( 'includes/portfolio' ); ?>

		</article><!-- END #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>
	
	</div>

</div><!-- END #related-portfolios -->

<?php endif; wp_reset_query(); ?>

<?php } ?>
<?php } ?>
