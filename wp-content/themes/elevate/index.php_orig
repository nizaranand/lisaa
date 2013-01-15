<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Index.php
//	The index page.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

get_header(); ?>

	<div id="content" class="blog grid twelve columns"><!-- BEGIN #content -->

		<div class="isotope" <?php if (wp_is_mobile() ) { ?>style="visibility: visible !important;"<?php } ?>><!-- BEGIN .isotope -->	

		<?php
		$post_type				= 'post';
		$paged 					= get_query_var( 'paged' );

		$query = array(
			'post_type'				=> $post_type,
			'paged'					=> $paged,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);

		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query($query);
		?>

		<?php $count = 0; if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); // We be loopin' ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>><!-- Begin #post-<?php the_ID(); ?> -->

			<?php

				$post_format = get_post_format();
				get_template_part( 'includes/'.$post_format );

				if($post_format == '' )
				get_template_part( 'includes/standard' );

			?>

		</article><!-- END #post-<?php the_ID(); ?> -->

		<?php $count++; endwhile; endif; wp_reset_query(); // We no longer be loopin' ?>

		</div><!-- END .isotope -->

		<?php if ($options[ 'blog_navigation_load_more' ] == 'enable' ) { ?>
		<div id="load-posts"><!-- BEGIN #load-posts -->

			<span><a class="load-more-items" href="#">Load more items</a></span>

			<?php $count_posts = wp_count_posts( 'post' )->publish - $count; ?>
			<span class="counter-text"><span><span class="counter"><?php echo $count_posts ?></span> <?php _e( 'more item(s) to be loaded', 'tva' ); ?></span></span>

			<div id="loading" data-perpage="<?php echo $count ?>"></div>

		</div><!-- END #load-posts -->

		<div class="isotope-new"></div>	
		<?php } ?>

		<?php if ($options[ 'blog_navigation_float' ] == 'enable' ) { ?>
		<?php tva_content_nav( 'float-page-navigation' ); ?>
		<?php } ?>

		<?php if ($options[ 'blog_navigation_page' ] == 'enable' ) { ?>
		<nav id="number-page-navigation">
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