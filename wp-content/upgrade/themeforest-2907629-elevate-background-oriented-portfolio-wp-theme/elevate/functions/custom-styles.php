<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Plugin Name: TVA Post Styles
//	Plugin URI: http://www.tienvooracht.nl
//	Description: This plugin will enable a stylesheet drop-down menu in the WordPress TinyMCE editor.
//	Version: 1.0
//	Author: Tienvooracht
//	Author URI: http://www.tienvooracht.nl
//
//
//
//	Lets roll!
//
//----------------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------------
//
//	Add stylesheet select dropdown to the WordPress Editor
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'mce_buttons_2', 'tva_mce_buttons_2' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	Add our classes to the stylesheet select dropdown in the WordPress editor
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_tiny_mce_before_init( $settings ) {

	$style_formats = array(

		// Buttons
		array( 'title' 	=> __( 'Buttons', 'tva' )),
		array(
			'title' 	=> __( 'White Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'button button-white',
			'selector' 	=> 'a'
		),
		array(
			'title' 	=> __( 'Red Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'button button-red',
			'selector' 	=> 'a'
		),
		array(
			'title' 	=> __( 'Yellow Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'button button-yellow',
			'selector' 	=> 'a'
		),
		array(
			'title' 	=> __( 'Green Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'button button-green',
			'selector' 	=> 'a'
		),
		array(
			'title' 	=> __( 'Blue Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'button button-blue',
			'selector' 	=> 'a'
		),
		array(
			'title' 	=> __( 'Small Button', 'tva' ),
			'block'		=> 'span',
			'classes' 	=> 'small',
			'selector' 	=> 'a'
		),

			
		// Toggle
		array( 'title' 	=> __( 'Toggle', 'tva' )), 
		array(
			'title' 	=> __( 'Toggle wrap', 'tva' ),
			'block' 	=> 'div',
			'classes'	=> 'tva-toggle',
			'wrapper'	=> true
		),
    	array(
			'title' 	=> __( 'Toggle trigger/title', 'tva' ),
			'classes'	=> 'tva-toggle-trigger',
			'selector'	=> 'a'
		),
    	array(
			'title'		=> __( 'Toggle Content', 'tva' ),
			'block' 	=> 'p',
			'classes' 	=> 'tva-toggle-content',
			'wrapper' 	=> true
		),

		
		// Quote
		array( 'title' 	=> __( 'Pull-Quotes', 'tva' )),
		array(
			'title' 	=> __( 'Left Pull Quote', 'tva' ),
			'classes' 	=> 'pullquote pullleft alignleft',
			'selector' 	=> 'blockquote'
		),
		array(
			'title' 	=> __( 'Right Pull Quote', 'tva' ),
			'classes' 	=> 'pullquote pullright alignright',
			'selector' 	=> 'blockquote'
		),

			
		// Alerts
		array( 'title' 	=> __( 'Alerts', 'tva' )),
		array(
			'title' 	=> __( 'White Alert', 'tva' ),
			'block'   	=> 'div',
			'classes' 	=> 'alert white',
			'wrapper' 	=> true
		),
		array(	
			'title'		=> __( 'Red Alert', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'alert red',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( 'Yellow Alert', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'alert yellow',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( 'Green Alert', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'alert green',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( 'Blue Alert', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'alert blue',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( 'Close Alert', 'tva' ),
			'block'		=> 'span',
			'classes'	=> 'closealert',
			'wrapper'	=> true
		),

		// Columns
		array( 'title'	=> __( 'Columns', 'tva' )),
		array(
			'title'		=> __( '2 Columns', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'tva-two-columns',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( '3 Columns', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'tva-three-columns',
			'wrapper'	=> true
		),
		array(
			'title'		=> __( '4 Columns', 'tva' ),
			'block'		=> 'div',
			'classes'	=> 'tva-four-columns',
			'wrapper'	=> true
		),


		// Lists
		array( 'title'	=> __( 'Lists', 'tva' )),
		array(
			'title'		=> __( 'v List', 'tva' ),
			'selector'		=> 'ul',
			'classes'	=> 'list-v'
		),
		array(
			'title'		=> __( 'x List', 'tva' ),
			'selector'		=> 'ul',
			'classes'	=> 'list-x'
		),


		// Highlight
		array( 'title'	=> __( 'Other', 'tva' )),
		array(
			'title'		=> __( 'Highlight', 'tva' ),
			'inline'	=> 'span',
			'classes'	=> 'highlight'
		),


	);

	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;

}

add_filter( 'tiny_mce_before_init', 'tva_tiny_mce_before_init' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
?>