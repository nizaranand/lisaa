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

function tva_social_widget() {
	register_widget( 'tva_Social' );
}


//----------------------------------------------------------------------------------------------------------------------------
//		Extend WP_Widget
//----------------------------------------------------------------------------------------------------------------------------

class tva_Social extends WP_Widget {

	const name = 'TVA Social Widget';
	const slug = 'tva-social-widget';


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget setup
	//------------------------------------------------------------------------------------------------------------------------

	function tva_Social() {

		$widget_ops = array(
			'classname'		=> 'tva-social',
			'description'	=> __( 'Display icon links to your social profiles.', 'tva' )
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

		$options	= get_option( 'tva' ); // Make sure we can use our Theme Options
		$title		= apply_filters( 'widget_title', $instance['title'] );
	
		echo $before_widget;
		
		if ($title)
			echo $before_title . $title . $after_title;

		?>

		<div class="social-container">

			<ul class="tva-social-icons">

				<?php if ($options[ 'social_digg' ]) { // Digg ?>
				<li><a class="digg" href="<?php echo $options[ 'social_digg' ]; ?>" title="Digg">Digg</a></li>
				<?php } ?>
			
				<?php if ($options[ 'social_dribbble' ]) { // Dribble ?>
				<li><a class="dribbble" href="<?php echo $options[ 'social_dribbble' ]; ?>" title="Dribbble">Dribbble</a></li>
				<?php } ?>

				<?php if ($options[ 'social_facebook' ]) { // Facebook ?>
				<li><a class="facebook" href="<?php echo $options[ 'social_facebook' ]; ?>" title="Facebook">Facebook</a></li>
				<?php } ?>

				<?php if ($options[ 'social_github' ]) { // Github ?>
				<li><a class="github" href="<?php echo $options[ 'social_github' ]; ?>" title="Github">Github</a></li>
				<?php } ?>

				<?php if ($options[ 'social_flickr' ]) { // FlickR ?>
				<li><a class="flickr" href="<?php echo $options[ 'social_flickr' ]; ?>" title="FlickR">FlickR</a></li>
				<?php } ?>

				<?php if ($options[ 'social_google' ]) { // Google+ ?>
				<li><a class="google" href="<?php echo $options[ 'social_google' ]; ?>" title="Google+">Google+</a></li>
				<?php } ?>

				<?php if ($options[ 'social_linkedin' ]) { // LinkedIN ?>
				<li><a class="linkedin" href="<?php echo $options[ 'social_linkedin' ]; ?>" title="LinkedIN">LinkedIN</a></li>
				<?php } ?>

				<?php if ($options[ 'social_pinterest' ]) { // Pinterest ?>
				<li><a class="pinterest" href="<?php echo $options[ 'social_pinterest' ]; ?>" title="Pinterest">Pinterest</a></li>
				<?php } ?>

				<?php if ($options[ 'social_rss' ]) { // RSS ?>
				<li><a class="rss" href="<?php echo $options[ 'social_rss' ]; ?>" title="RSS">RSS</a></li>
				<?php } ?>

				<?php if ($options[ 'social_skype' ]) { // Skype ?>
				<li><a class="skype" href="<?php echo $options[ 'social_skype' ]; ?>" title="Skype">Skype</a></li>
				<?php } ?>

				<?php if ($options[ 'social_twitter' ]) { // Twitter ?>
				<li><a class="twitter" href="<?php echo $options[ 'social_twitter' ]; ?>" title="Twitter">Twitter</a></li>
				<?php } ?>

				<?php if ($options[ 'social_wordpress' ]) { // WordPress ?>
				<li><a class="wordpress" href="<?php echo $options[ 'social_wordpress' ]; ?>" title="WordPress">WordPress</a></li>
				<?php } ?>

				<?php if ($options[ 'social_vimeo' ]) { // Vimeo ?>
				<li><a class="vimeo" href="<?php echo $options[ 'social_vimeo' ]; ?>" title="Vimeo">Vimeo</a></li>
				<?php } ?>

				<?php if ($options[ 'social_youtube' ]) { // YouTube ?>
				<li><a class="youtube" href="<?php echo $options[ 'social_youtube' ]; ?>" title="YouTube">YouTube</a></li>
				<?php } ?>				

			</ul>
		
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

		return $instance;

	}


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget Settings
	//------------------------------------------------------------------------------------------------------------------------

	function form( $instance ) {
	
		$defaults = array(
			'title'			=> __( 'Social', 'tva' )
		);
			
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tva' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title'];?>" />
		</p>

		<?php

	}		
	
}


/*---------------------------------------------------------------------------------------*/
/*		Load widget
/*---------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tva_social_widget' );


//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>