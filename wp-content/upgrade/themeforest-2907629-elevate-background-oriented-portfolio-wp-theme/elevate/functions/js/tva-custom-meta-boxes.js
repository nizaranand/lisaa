//----------------------------------------------------------------------------------------------------------------------------
//
//	TVA-custom-meta-boxes.js
// 	Here we the functions that hide the post-format meta boxes.
//	When a post-format is clicked, the corresponding meta box will appear.
//	When a post-format is click that doesn't have a post-format supporting it: no meta box wil appear.
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

jQuery(document).ready(function() {

//----------------------------------------------------------------------------------------------------------------------------
//
//	Lets hide our Meta boxes (only to serve them up later on)
//
//----------------------------------------------------------------------------------------------------------------------------

	// Link
	jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
	
	// Quote
	jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
	
	// Status
	jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
	
	// Image
	jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
	
	// Gallery
	jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
	
	// Audio
	jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
	
	// Video
	jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
	
	// Chat
	jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	Lets make our Meta boxes re-appear after a post-format is selected
//
//----------------------------------------------------------------------------------------------------------------------------

	function tvaCheckMetaboxSettings() {

		// Show Link post meta box (hide the rest)
		if (jQuery( '#post-format-link' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );

		}
		
		// Show Quote post meta box (hide the rest)
		else if (jQuery( '#post-format-quote' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Status post meta box (hide the rest)
		else if (jQuery( '#post-format-status' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Image post meta box (hide the rest)
		else if (jQuery( '#post-format-image' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Gallery post meta box (hide the rest)
		else if (jQuery( '#post-format-gallery' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Audio post meta box (hide the rest)
		else if (jQuery( '#post-format-audio' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Video post meta box (hide the rest)
		else if (jQuery( '#post-format-video' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'block' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
		// Show Chat post meta box (hide the rest)
		else if (jQuery( '#post-format-chat' ).is( ":checked" )) {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'block' );			
			
		}
		
		// Hide all meta boxes
		else {
			jQuery( '#tva-meta-box-link' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-quote' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-status' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-image' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-gallery' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-audio' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-video' ).css( 'display', 'none' );
			jQuery( '#tva-meta-box-chat' ).css( 'display', 'none' );			
			
		}
		
	}

	tvaCheckMetaboxSettings();

	jQuery( '.post-format' ).change(function() {
		tvaCheckMetaboxSettings();
	});	

	

//----------------------------------------------------------------------------------------------------------------------------
//
//	Show specific content boxes on homepage only
//
//----------------------------------------------------------------------------------------------------------------------------
	
	(function($){

		jQuery( '#page_template' ).change(function() {
			jQuery( '#tva-content-box-homepage' ).toggle($(this).val() == 'template-homepage.php' );
		}).change();

	})(jQuery);

	

//----------------------------------------------------------------------------------------------------------------------------
//
//	Show specific boxes depending on portfolio type
//
//----------------------------------------------------------------------------------------------------------------------------
	
	(function($){

		jQuery( '#tva_portfolio_format' ).change(function() {
			jQuery( '#tva-meta-box-portfolio-image' ).toggle($(this).val() == 'Image' );
			jQuery( '#tva-meta-box-portfolio-gallery' ).toggle($(this).val() == 'Gallery' );
			jQuery( '#tva-meta-box-portfolio-video' ).toggle($(this).val() == 'Video' );
		}).change();

	})(jQuery);


//----------------------------------------------------------------------------------------------------------------------------
//
//	Show specific boxes depending on background-position
//
//----------------------------------------------------------------------------------------------------------------------------
	
	(function($){

		jQuery( '#tva_page_styles_background_image_position' ).change(function() {
			jQuery( '#tva-content-box-page-styles-blur-post' ).toggle($(this).val() == 'full screen' );
			jQuery( '#tva-content-box-page-styles-blur' ).toggle($(this).val() == 'full screen' );
		}).change();

	})(jQuery);
	
	
	



//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
});