<?php
//----------------------------------------------------------------------------------------------------------------------------
//
// Plugin Name: TVA Latest Posts Widget
// Plugin URI: http://www.tienvooracht.nl
// Description: Display your recent work in a nice little widget.
// Version: 0.1
// Author: Tienvooracht
// Author URI: http://www.tienvooracht.nl
//
//
//
//	Lets roll!
//
//----------------------------------------------------------------------------------------------------------------------------
 
//----------------------------------------------------------------------------------------------------------------------------
//		Register the widget
//----------------------------------------------------------------------------------------------------------------------------

function tva_recent_work_widget() {
	register_widget( 'tva_Recent_Work' );
}


//----------------------------------------------------------------------------------------------------------------------------
//		Extend WP_Widget
//----------------------------------------------------------------------------------------------------------------------------

class tva_Recent_Work extends WP_Widget {

	const name = 'TVA Recent Work Widget';
	const slug = 'tva-recent-work-widget';


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget setup
	//------------------------------------------------------------------------------------------------------------------------

	function tva_Recent_Work() {

		$widget_ops = array(
			'classname'		=> 'tva-recent-work',
			'description'	=> __( 'Display recent post items in your sidebar.', 'tva' )
		);
			
		$control_ops = array(
			'width'		=> 350,
			'height'	=> 350
		);

		$this->WP_Widget( self::slug, __( self::name, 'tva' ), $widget_ops, $control_ops);
		
	}
	

	//------------------------------------------------------------------------------------------------------------------------
	//		Display the Widget
	//------------------------------------------------------------------------------------------------------------------------

	function widget( $args, $instance ) {
		extract($args);
		
		$title			= apply_filters( 'widget_title', $instance['title'] );
		$count			= $instance['count'];
		
		echo $before_widget;
		
		if ( $title )
			echo $before_title . $title . $after_title;

		$args = array(
			'post_type'			=> 'portfolio',
			'posts_per_page'	=> $count,
			'orderby'			=> 'menu_order',
			'order'				=> 'ASC',
			'post_status'		=> 'publish',
			'ignore_sticky_posts'	=> 1			
		);

		$recentwork = new WP_Query( $args );
		?>
		
		<div class="recent-work-container">

			<ul id="recent-work"><!-- BEGIN #recent-work -->

				<?php if ($recentwork -> have_posts()) : while ($recentwork -> have_posts()) : $recentwork -> the_post(); ?>

				<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="entry-title"><?php the_title(); ?></a></li>

				<?php endwhile; else: ?>

				<li id="no-posts-found" <?php post_class( 'item' ); ?>><?php printf(__( 'Oops! It looks like no work has been added yet, you might want to add some :-).', 'tva' )); ?></li>

				<?php endif; wp_reset_query(); ?>

			</ul><!-- END #recent-work -->
		
		</div>

		<?php		

		echo $after_widget;

	}


	//------------------------------------------------------------------------------------------------------------------------
	//		Update the Widget
	//------------------------------------------------------------------------------------------------------------------------
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['count'] 		= (int) $new_instance['count'];

		return $instance;

	}


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget Settings
	//------------------------------------------------------------------------------------------------------------------------

	function form( $instance ) {
	
		$defaults = array(
			'title'			=> __( 'Recent Work', 'tva' ),
			'count'			=> 6
		);
			
		$instance = wp_parse_args( (array) $instance, $defaults );

		if ( (int) $instance['count'] < 1 )
			(int) $intsance['count'] = 5;
		else if ( (int) $instance['count'] > 10 )
			(int) $instance['count'] = 10;

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php printf(__( 'Title', 'tva' )); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title'];?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php printf(__( 'Post Items to Show', 'tva' )); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count'];?>" size="3" maxlength="2" />
			<small><?php printf(__( 'For example: 3. (min = 1, max = 10)', 'tva' )); ?></small>
		</p>

		<?php

	}		
	
}


/*---------------------------------------------------------------------------------------*/
/*		Load widget
/*---------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tva_recent_work_widget' );


//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>