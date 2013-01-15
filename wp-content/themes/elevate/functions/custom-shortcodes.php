<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom-shortcodes.php
// 	Here we have all our custom shortcodes.
//
//	Please be extremely cautious editing this file.
//	When things go wrong, they usually go wrong in a big way.
//	You have been warned!
//
//
//
//	Lets roll!
//
//----------------------------------------------------------------------------------------------------------------------------

add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'the_content', 'do_shortcode' );
add_filter( 'the_content', 'shortcode_unautop' );
add_filter( 'the_excerpt', 'do_shortcode' );
add_filter( 'the_excerpt', 'shortcode_unautop' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	Seperator line
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_sep( $atts, $content = null ) { 
	return '<hr class="sep">';
}

add_shortcode( 'sep', 'tva_sep' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	Seperator line (for padding/margin purposes)
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_sep_space( $atts, $content = null ) { 
	return '<hr class="sep give-me-space">';
}

add_shortcode( 'sep_space', 'tva_sep_space' );



//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>