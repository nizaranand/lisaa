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

function tva_portfolio_type_widget() {
	register_widget( 'tva_Portfolio_Type' );
}


//----------------------------------------------------------------------------------------------------------------------------
//		Extend WP_Widget
//----------------------------------------------------------------------------------------------------------------------------

class tva_Portfolio_Type extends WP_Widget {

	const name = 'TVA Portfolio Type Widget';
	const slug = 'tva-portfolio-type-widget';


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget setup
	//------------------------------------------------------------------------------------------------------------------------

	function tva_Portfolio_Type() {

		$widget_ops = array(
			'classname'		=> 'tva-portfolio-type',
			'description'	=> __( 'List portfolio-types in your sidebar.', 'tva' )
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
		$counting		= isset( $instance['counting'] ) ? $instance['counting'] : false;
		
		echo $before_widget;
		
		if ($title)
			echo $before_title . $title . $after_title;

		?>
		
		<div class="portfolio-type-container">

			<?php $portfolio_type = get_terms( 'portfolio-type' ); $count = count( $portfolio_type );

				echo '<ul>';

				if ( $count > 0 ) {

					foreach ( $portfolio_type as $type ) {

						echo '<li>';
						echo '<li><a href="' . home_url() . '/portfolio-type/' . $type->slug . '" title="' . $type->name . '" class="' . $type->slug . '" data-filter=".'. $type->slug . '">' . $type->name . '</a> ';
						if ($counting)
						echo '<span class="count">(' . $type->count . ')</span>';
						echo '</li>';

					}

				}

				echo '</ul>';

			?>
		
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
		$instance['counting'] 	= $new_instance['counting'];

		return $instance;

	}


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget Settings
	//------------------------------------------------------------------------------------------------------------------------

	function form( $instance ) {
	
		$defaults = array(
			'title'			=> __( 'Portfolio Type', 'tva' ),
			'counting' 		=> true
		);
			
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tva' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title'];?>" />
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( (bool) $instance[ 'counting' ], true ); ?> id="<?php echo $this->get_field_id( 'counting' ); ?>" name="<?php echo $this->get_field_name( 'counting' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'counting' ); ?>"><?php _e( 'Display count?', 'tva' ); ?></label>
		</p>

		<?php

	}		
	
}


/*---------------------------------------------------------------------------------------*/
/*		Load widget
/*---------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tva_portfolio_type_widget' );


//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>