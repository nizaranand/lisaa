<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Plugin Name: TVA Latest Tweets Widget
//	Plugin URI: http://www.tienvooracht.nl
//	Description: Display the latest x tweets from your Twitter account in your widgetized area's.
//	Version: 0.1
//	Author: Tienvooracht
//	Author URI: http://www.tienvooracht.nl
//
//
//
//	Lets roll!
//
//----------------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------------
//		Register the widget
//----------------------------------------------------------------------------------------------------------------------------

function tva_latest_tweets() { 
	register_widget( 'TVA_Latest_Tweets_Widget' );
}


//----------------------------------------------------------------------------------------------------------------------------
//		Extend WP_Widget
//----------------------------------------------------------------------------------------------------------------------------

class tva_latest_tweets_widget extends WP_Widget {

	const name = 'TVA Latest Tweets';
	const slug = 'tva-latest-tweets';


	//------------------------------------------------------------------------------------------------------------------------
	//		Widget setup
	//------------------------------------------------------------------------------------------------------------------------

	function tva_latest_tweets_widget() {

		$widget_ops = array(
			'classname' 	=> 'tva-latest-tweets',
			'description' 	=> __( 'Display recent tweets from your Twitter account.', 'tva' )
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
		extract( $args );

    	$title		= apply_filters( 'widget_title', $instance[ 'title' ] );
		$username	= $instance[ 'username' ];
    	$count		= $instance[ 'count' ];
    	$anchor		= $instance[ 'anchor' ];

		echo $before_widget;		
	
		if ( $title )
			echo $before_title . $title . $after_title;	
		
		?>
		
		<div class="twitter-container">
		
   
			<ul id="twitter_update_list"><li><?php printf( __( 'Loading Tweets...', 'tva' )); ?></li></ul>

			<?php if($anchor) { ?>
			
			<span class="twitter-follow-user"><a href="http://twitter.com/<?php echo $username; ?>"><?php echo $anchor; ?> &#64; <?php echo $username; ?></a></span>
			
			<?php } ?>			
			
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tweet.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username; ?>.json?count=<?php echo $count; ?>&amp;callback=?twitterCallback2"></script>
		
		</div>
		
    	<?php echo $after_widget;
    	
	}

	//------------------------------------------------------------------------------------------------------------------------
	//		Update the Widget
	//------------------------------------------------------------------------------------------------------------------------

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		// Update the widget with the new (and stripped) values
		$instance[ 'title' ]		= strip_tags($new_instance[ 'title' ]);
		$instance[ 'username' ]		= strip_tags($new_instance[ 'username' ]);
		$instance[ 'count' ]		= strip_tags($new_instance[ 'count' ]);
		$instance[ 'anchor' ]		= strip_tags($new_instance[ 'anchor' ]);
    	
		return $instance;
		
	}

	//------------------------------------------------------------------------------------------------------------------------
	//		Widget Settings
	//------------------------------------------------------------------------------------------------------------------------

	function form( $instance ) {

    	// Define the default values
		$defaults = array(
			'title'			=> __( 'Latest Tweets', 'tva' ),
			'username'		=> 'tienvooracht',
			'count'			=> 3,
			'anchor'		=> __( 'Follow on Twitter', 'tva' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		
		if ( (int) $instance['count'] < 1 )
			(int) $intsance['count'] = 5;
		else if ( (int) $instance['count'] > 10 )
			(int) $instance['count'] = 10;

		?>

		<!-- Title input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php printf(__( 'Title:', 'tva' )); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance[ 'title' ]; ?>" />
		</p>

		<!-- Username input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php printf(__( 'Twitter Username:', 'tva' )); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo $instance[ 'username' ]; ?>" />
			<small><?php printf(__( 'Enter username without @ symbol.', 'tva' )); ?></small>
		</p>

		<!-- Count input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php printf(__( 'Number of tweets to show:', 'tva' )); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $instance[ 'count' ]; ?>" />
			<small><?php printf(__( 'For example: 3. (min = 1, max = 10)', 'tva' )); ?></small>
		</p>

		<!-- Follow us Anchor input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'anchor' ); ?>"><?php printf(__( 'Follow us text:', 'tva' )); ?> </label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'anchor' ); ?>" name="<?php echo $this->get_field_name( 'anchor' ); ?>" type="text" value="<?php echo $instance[ 'anchor' ]; ?>" />
			<small><?php printf(__( 'Enter a follow us text (without @ symbol and username).', 'tva' )); ?></small>
		</p>

		<?php

	}
}


//----------------------------------------------------------------------------------------------------------------------------
//		Add function to widgets_init
//----------------------------------------------------------------------------------------------------------------------------

add_action( 'widgets_init', 'tva_latest_tweets' );


//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>