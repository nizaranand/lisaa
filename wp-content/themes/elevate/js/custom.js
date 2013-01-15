//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom.js
// 	Here we have all the JS functions for the theme.
//	Be extremely carefull when editing this file.
//	When shit hits the fan, it usually hits the fan big time.
//
//	When you do decide to start editing, make sure you have back-up!
//
//
//
//	Lets roll!
//
//----------------------------------------------------------------------------------------------------------------------------

jQuery.noConflict();
jQuery(document).ready(function($) {

//--------------------------------------------------------------
//	Navigation dropdown with Superfish
//--------------------------------------------------------------

	jQuery( 'ul.sf-menu' ).superfish({
		delay: 200,
		animation: { opacity: 'show', height: 'show' },
		speed: 400,
		dropShadows: false,
		autoArrows: false
		
	});


	
//--------------------------------------------------------------
//	Shortcodes � Alert
//--------------------------------------------------------------	

	jQuery( '.alert .closealert' ).click( function() {
		jQuery(this).parent('.alert').fadeTo(400, 0.001).slideUp();
		return false;
	});



//--------------------------------------------------------------
//	Shortcodes � Toggle
//--------------------------------------------------------------	

	jQuery( '.tva-toggle-trigger' ).click(function() {

		// Add 'active' class for active toggle
		if(jQuery(this).hasClass( 'active' )) {
			jQuery(this).removeClass( 'active' );
		} else {
			jQuery(this).addClass( 'active' );
		}

		// Make sure we can have multiple toggles on one page
		jQuery(this).parent().nextAll( '.tva-toggle-content' ).first().slideToggle( 'slow' );

		return false;

	});



//--------------------------------------------------------------
//	Validate forms
//--------------------------------------------------------------	

	if (jQuery().validate) {
		jQuery( '#contactform' ).validate();
		jQuery( '#commentform' ).validate();
	}


//--------------------------------------------------------------
//	Scroll to top
//--------------------------------------------------------------	

	jQuery.fn.scrollToTop=function(){
		
		jQuery(this).hide().removeAttr( 'href' );
		
		if(jQuery(window).scrollTop()!="0"){
			jQuery(this).fadeIn( "slow" )
		}
		var scrollDiv=jQuery(this);
		
		jQuery(window).scroll(function(){
								  
			if($(window).scrollTop()=='0'){
				$(scrollDiv).fadeOut( 1000 )
			}else{
				$(scrollDiv).fadeIn( 1000 )
			}
		
		});
		
		jQuery(this).click(function(){
			jQuery( 'html, body' ).animate({scrollTop:0}, 1000);
		});
	
	}

	jQuery( '#toTop' ).scrollToTop();



//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin now)
//----------------------------------------------------------------------------------------------------------------------------
});



jQuery(window).load(function($) {

//--------------------------------------------------------------
// Expendable Stuff
//--------------------------------------------------------------

	jQuery( '<a href="#" class="toggle-trigger">Toggle</a>' ).prependTo( '.sidebar-content aside' );

	function tva_drop() {

		if (jQuery(window).width() < 1023) {
		
			jQuery( '.sidebar-content > aside > div, .sidebar-content > aside > ul, .sidebar-content > aside > form' ).addClass( 'toggle' ).hide();
			jQuery( '.sidebar-content aside a.toggle-trigger' ).show();

		} else {

			jQuery( '.sidebar-content > aside > div, .sidebar-content > aside > ul, .sidebar-content > aside > form' ).show();
			jQuery( '.sidebar-content aside a.toggle-trigger' ).hide();

		}
		
	}

	jQuery(window).bind( 'resize', tva_drop);

    jQuery( '.sidebar-content aside a.toggle-trigger' ).click(function() {
	
		// Add 'active' class for active toggle
		if (jQuery(this).hasClass( 'active' )) {
			jQuery(this).removeClass( 'active' );
		} else {
			jQuery(this).addClass( 'active' );
		}	

        jQuery(this).nextAll( '.sidebar-content > aside > div.toggle, .sidebar-content > aside > ul.toggle, .sidebar-content > aside > form.toggle' ).slideToggle( 'slow' );

		return false;
		
		jQuery(window).unbind( 'resize', tva_drop);

    });

    tva_drop();


//--------------------------------------------------------------
//	prettyPhoto
//--------------------------------------------------------------	

	function tva_prettyPhoto() {

		jQuery( "a[data-gal^='prettyPhoto']" ).prettyPhoto({
			animationSpeed: 'normal',		// Fast, slow or normal.
			autoplay_slideshow: false,		// true/false
			opacity: 0.80,					// Value between 0 and 1.
			showTitle: true,				// True or false.
			show_title: false,				// true/false
			allow_resize: true,				// Resize the photos bigger than viewport. True or false.
			hideflash: true, 				// Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto
			autoplay: false,				// Automatically start videos: True/False
			theme: 'pp_default',			// Default, light_rounded, dark_rounded, light_square, dark_square or facebook.
			social_tools: false				// html or false to disable
		});
	
	}

	tva_prettyPhoto();



//--------------------------------------------------------------
// Post Like
//--------------------------------------------------------------

	function tva_postlike() {

		jQuery(".post-like a").click(function(){
		
			heart = jQuery(this);
		
			post_id = heart.data("post_id");
			
			jQuery.ajax({
				type: "post",
				url: ajax_var.url,
				data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
				success: function(count){
					if(count != "already")
					{
						heart.addClass("voted");
						heart.siblings(".count").text(count);
					}
				}
			});
			
			return false;
		})
	
	}
	
	tva_postlike();


//--------------------------------------------------------------
//	Make embedded YouTube and Vimeo videos play nice!
//--------------------------------------------------------------	

	function tva_fitVids() {

		jQuery( '.entry-video' ).fitVids();
	
	}
	
	tva_fitVids();


//----------------------------------------------------------------------------------------------------------------------------
//	Audio Player
//----------------------------------------------------------------------------------------------------------------------------

	function tva_audio() {

		jQuery( '.item' ).each(function(){
			$currentItem=jQuery(this);

			$currentItem.find( '.jp-jplayer-audio' ).each(function(){
				jQuery(this).jPlayer({
					ready: function () {
						jQuery(this).jPlayer( "setMedia", {
							mp3: jQuery(this).attr( 'data-src' )
						});
					},
					swfPath: tva_theme_uri + "/js/jplayer",
					cssSelectorAncestor: "#jp_container_"+jQuery(this).attr('data-id'),
					supplied: "mp3"
				});
			});
		});

	}
	
	tva_audio();	



//----------------------------------------------------------------------------------------------------------------------------
//	Video Player
//----------------------------------------------------------------------------------------------------------------------------

	function tva_video() {

		jQuery( '.item' ).each(function(){
			$currentItem=jQuery(this);

			$currentItem.find( '.jp-jplayer-video' ).each(function(){
				jQuery(this).jPlayer({
					ready: function () {
						jQuery(this).jPlayer( "setMedia", {
							m4v: jQuery(this).attr( 'data-src' ),
							poster: jQuery(this).attr( 'data-img' )
						});
					},
					size: {
					width: jQuery(this).attr( 'data-width' ),
					height: jQuery(this).attr( 'data-height' )
					},
					swfPath: tva_theme_uri + "/js/jplayer",
					cssSelectorAncestor: "#jp_container_"+jQuery(this).attr( 'data-id' ),
					supplied: "m4v"
				});
			});
		});

	}
	
	tva_video();	


//----------------------------------------------------------------------------------------------------------------------------
//	Flexslider
//----------------------------------------------------------------------------------------------------------------------------

	function tva_flexslider() {
	
		jQuery( ".flexslider" ).flexslider({

			animation: gallery_animation,
			animationSpeed: 1500,
			slideshow: gallery_slideshow,
			slideshowSpeed: 5000,
			easing: "swing",
			direction: "horizontal",
			animationLoop: true,
			controlNav: false,
			directionNav: true,
			touch: true,
			smoothHeight: false,
			start: function(slider){
				jQuery( '.flexslider' ).removeClass( 'loading' );
			}

		});
		
	}
		
	tva_flexslider();
	
	
//----------------------------------------------------------------------------------------------------------------------------
//	Isotope Grid
//----------------------------------------------------------------------------------------------------------------------------

	// Start custom function wich we will use later on!
	function tva_isotope() {

		jQuery(function() {

			var $container = jQuery( '#content .isotope' );

            //BUG #4 script errors on homepage
            if ($container.length > 0) {
                $container.imagesLoaded( function(){
                    $container.isotope({
                        itemSelector: '.item',
                        transformsEnabled: true,
                        visibleStyle: { opacity: 1 },
                        hiddenStyle: { opacity: 0 },
                        animationEngine: 'jquery',
                        animate: true
                    });
                });
            }
			// Filter items when filter link is clicked
			jQuery( '#filters a' ).click(function(){
				var selector = jQuery(this).attr( 'data-filter' );
				$container.isotope({ filter: selector });
				return false;
			});
			
			// set selected menu items
			var $optionSets = jQuery( '#filters' ),
				$optionLinks = $optionSets.find( 'a' );
		 
			$optionLinks.click(function(){
				var $this = jQuery(this);
				// don't proceed if already selected
				if ( $this.hasClass( 'selected' ) ) {
					return false;
				}

				var $optionSet = $this.parents( '#filters' );
				$optionSet.find( '.selected' ).removeClass( 'selected' );
				$this.addClass( 'selected' ); 

			});

		});
	
	}
	
	tva_isotope();

	
	jQuery( '.isotope' ).css( 'visibility', 'visible' );
	jQuery( '#loading-isotope' ).hide();

	

//----------------------------------------------------------------------------------------------------------------------------
//	Load more
//----------------------------------------------------------------------------------------------------------------------------

	function tva_getposts(pageNum, max, nextLink, count) {
	
		if(!pageNum) {
		// The number of the next page to load (/page/x/).
		var pageNum = parseInt(tva_loadmore.startPage) + 1;
		}
		
		if(!max) {
		// The maximum number of pages the current query can return.
		var max = parseInt(tva_loadmore.maxPages);
		}
		
		if(!nextLink) {
		// The link of the next page of posts.
		var nextLink = tva_loadmore.nextLink;
		}

		if(!count) {
			var count = parseInt(jQuery( '.counter' ).text());
		}
		
		/**
		 * Replace the traditional navigation with our own,
		 * but only if there is at least one page of new posts to load.
		 */
		if(pageNum <= max) {

			// Remove the traditional navigation.
			//jQuery( '#number-page-navigation' ).remove();

		} else {
		
			jQuery( '#load-posts' ).addClass( 'inactive' );
		
		}
		
		/**
		 * Load new posts when the link is clicked.
		 */
		jQuery( '#load-posts a' ).click(function(e) {
		
			jQuery(this).unbind( 'click', tva_getposts());
			
			// Are there more posts to load?
			if(pageNum <= max) {
			
				// Show that we're working.
				jQuery(this).text( 'Loading...' );

					jQuery( '.counter-text' ).fadeOut(200, function(){
						jQuery( '#loading' ).fadeIn(200);
					});

					jQuery( '#content .isotope-new' ).load(nextLink + ' .item',
					function() {
			
						var $newEls = jQuery( '#content .isotope-new .item' );
						
						$newEls.imagesLoaded( function(){

						jQuery( '#content .isotope' ).append($newEls).isotope( 'appended', $newEls, function() {
					
							// Update page number and nextLink.
							pageNum++;
							nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
							
							// Update the button message.
							if(pageNum <= max) {

								jQuery( '#loading' ).fadeOut(200, function () {
	
									count = count - parseInt(jQuery( '#loading' ).attr( 'data-perpage' ));
									jQuery( '.counter' ).text(count);
									jQuery( '.counter-text' ).fadeIn(200);
									jQuery( '#load-posts a' ).bind( 'click', tva_getposts(pageNum, max, nextLink, count));
									jQuery( '#loading' ).fadeOut(200);
											
								});

								jQuery( '#load-posts a' ).text( 'Load more items' );

							} else {
								
								jQuery( '#loading').fadeOut(200, function () {
	
									jQuery( '#load-posts a' ).addClass( 'inactive' );
									jQuery( '.counter' ).text( '0' );
									jQuery( '.counter-text' ).fadeIn(200);
									jQuery( '#load-posts a' ).bind( 'click', tva_getposts(pageNum, max, nextLink, count));
									jQuery( '#loading' ).fadeOut(200);
	
								});

								jQuery( '#load-posts a' ).text( 'All done loading' );

							}

						});

						tva_prettyPhoto();
						tva_postlike();
						tva_fitVids();
						tva_audio();
						tva_video();
						tva_flexslider();
						tva_isotope();

						});

					}

				);

			}

			e.preventDefault();

		});

	}
	
	tva_getposts();



//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin now)
//----------------------------------------------------------------------------------------------------------------------------
});