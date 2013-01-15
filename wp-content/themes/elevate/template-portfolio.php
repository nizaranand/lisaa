<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Template Name: Portfolio Template
//
//	Template-portfolio.php
//	The custom template for displaying portfolio overview content.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="portfolio grid twelve columns"><!-- BEGIN #content -->

		<div class="isotope" <?php if (wp_is_mobile() ) { ?>style="visibility: visible !important;"<?php } ?>><!-- BEGIN .isotope -->

			<?php
			$post_type			= 'portfolio';
			$posts_per_page		= $options[ 'portfolio_items' ];
			$paged				= get_query_var( 'paged' );

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
				'posts_per_page' 		=> $posts_per_page,
				'ignore_sticky_posts'	=> 1
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

			<?php endwhile; endif; wp_reset_query(); ?>		

		</div><!-- END .isotope -->

		<?php if ($options[ 'portfolio_navigation_load_more' ] == 'enable' ) { ?>
		<div id="load-posts"><!-- BEGIN #load-posts -->

			<span><a class="load-more-items" href="#">Load more items</a></span>

			<?php $count_posts = wp_count_posts( 'portfolio' )->publish - $posts_per_page; ?>
			<span class="counter-text"><span><span class="counter"><?php echo $count_posts ?></span> <?php _e( 'more item(s) to be loaded', 'tva' ); ?></span></span>

			<div id="loading" data-perpage="<?php echo $posts_per_page ?>"></div>

		</div><!-- END #load-posts -->

		<div class="isotope-new"></div>	
		<?php } ?>

		<?php if ($options[ 'portfolio_navigation_float' ] == 'enable' ) { ?>
		<nav id="float-page-navigation" class="row"><!-- BEGIN #page-navigation -->

			<span class="nav-previous"><?php previous_posts_link(__( '&laquo; Newer posts', 'tva' ), $wp_query->max_num_pages); ?></span>
			<span class="nav-next"><?php next_posts_link(__( 'Older posts &raquo;', 'tva' ), $wp_query->max_num_pages); ?></span>

		</nav><!-- END #page-navigation -->
		<?php } ?>

		<?php if ($options[ 'portfolio_navigation_page' ] == 'enable' ) { ?>
		<nav id="number-page-navigation" class="row">
		<?php	
		$total_pages = $wp_query->max_num_pages;
		if ($total_pages > 1){

		$paged = get_query_var( 'paged' );

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}				

		$current_page = max(1, $paged);

			echo paginate_links(array(
				'base'		=> get_pagenum_link(1) . '%_%',
				'format'	=> 'page/%#%',
				'current'	=> $current_page,
				'total'		=> $total_pages
				));
			}

		?>
		</nav>
		<?php } ?>

	</div><!-- END #content -->

<?php get_footer(); ?>