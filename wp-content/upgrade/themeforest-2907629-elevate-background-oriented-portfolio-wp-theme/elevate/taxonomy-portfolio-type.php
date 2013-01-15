<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Taxonomy-portfolio-type.php
//	The custom template for displaying portfolio-type archives.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="portfolio grid twelve columns"><!-- BEGIN #content -->
	
		<div class="archive-header row"><!-- BEGIN .archive-header -->
		<h3 class="entry-title"><?php printf( __( 'Portfolio Archives: %s', 'tva' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h3>
		</div><!-- END .archive-header -->
	
		<div class="isotope"><!-- BEGIN .isotope -->

			<?php
			$post_type 			= 'portfolio';
			$term				= get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$posts_per_page 	= $options[ 'portfolio_items' ];
			$paged 				= get_query_var( 'paged' );

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}	
			
			$args = array(
				'post_type'				=> $post_type,
				'paged'					=> $paged,
				'orderby'				=> 'menu_order',
				'order'					=> 'ASC',
				'post_status'			=> 'publish',
				'posts_per_page' 		=> -1,
				'ignore_sticky_posts'	=> 1,
				'portfolio-type'		=> $term->slug
			);

			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query($args);
			?>		

			<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<?php $terms = get_the_terms( get_the_ID(), 'portfolio-type' ); ?>
			<article id="post-<?php the_ID(); ?>" class="item <?php echo get_post_type( $post->ID ) ?> <?php foreach ( $terms as $term) { echo $term->slug . ' '; } ?>"><!-- Begin #post-<?php the_ID(); ?> -->

				<?php get_template_part( 'includes/portfolio' ); ?>

			</article><!-- END #post-<?php the_ID(); ?> -->

			<?php endwhile; endif; ?>		
		
		</div><!-- END .isotope -->

	</div><!-- END #content -->

<?php get_footer(); ?>