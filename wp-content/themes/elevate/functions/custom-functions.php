<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom-functions.php
// 	Here we have all our theme specific custom functions.
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
$options = get_option( 'tva' ); // Make sure we can use our Theme Options


//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom Typography
//
//----------------------------------------------------------------------------------------------------------------------------

function wp_head_style() {

	$options = get_option( 'tva' ); // Make sure we can use our Theme Options

	// Fonts
	$body_font_enable		= $options[ 'body_custom_webfonts_enable' ];
	$body_font				= explode(':', $options[ 'body_custom_webfonts' ]);
	$body_font_size			= $options[ 'body_font_size' ];

	// Links
	$link_color				= $options[ 'link_color' ];
	$link_hover_color		= $options[ 'link_hover_color' ];

	// Accents
	$accents_color			= $options[ 'accents_color' ];

	// Background
	$color					= get_post_meta(get_the_ID(), 'tva_page_styles_background_color', TRUE);
	$image					= get_post_meta(get_the_ID(), 'tva_page_styles_background_image', TRUE);
	$repeat					= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_repeat', TRUE);
	$position				= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_position', TRUE);
	$attachment				= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_attachment', TRUE);
	$blur					= get_post_meta(get_the_ID(), 'tva_page_styles_blur_background_image', TRUE);
	$blur_radius			= get_post_meta(get_the_ID(), 'tva_page_styles_blur_radius_background_image', TRUE);
	$blur_overlay			= get_post_meta(get_the_ID(), 'tva_page_styles_blur_overlay_background_image', TRUE);
	$style					= get_post_meta(get_the_ID(), 'tva_page_styles_style', TRUE);
	
	$background_color		= $options[ 'background_color' ];
	$background_image		= $options[ 'background_image' ];
	$background_repeat		= $options[ 'background_repeat' ];
	$background_position	= $options[ 'background_position' ];
	$background_attachment	= $options[ 'background_attachment' ];
	

	// Style
	if ( ($color || $background_color) || ($body_font_enable == 'enable' && $body_font) || $body_font_size || $link_color || $link_hover_color || $accents_color ) {
	
	if ($body_font_enable == 'enable') {
	echo '<link href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $body_font[0]).'" rel="stylesheet" type="text/css">';
	}

    echo "<style type='text/css'>\n";
	}

	// Fonts
	if ($body_font_enable == 'enable' ) {
	if ($body_font) {
	echo "body { font-family: $body_font[0]; font-weight: $body_font[1]; }\n";
	}
	}

	if ($body_font_size) {
	echo "body { font-size: $body_font_size";
	echo "px; }\n";
	}	

	// Link color
	if ($link_color) {
	echo "#content a { color: $link_color; }\n";
	}
	
	if ($link_hover_color) {
	echo "#content a:hover { color: $link_hover_color; }\n";
	}

	// Accents
	if ($accents_color) {
	echo ".jp-progress-wrap .jp-play-bar,\n";
	echo ".jp-volume-bar-wrap .jp-volume-bar-value,\n";
	echo ".post:hover .entry-thumb .overlay,\n";
	echo ".item:hover .entry-thumb .overlay,\n";
	echo ".entry-thumb:hover .overlay { background: $accents_color; }\n";
	}
	
	if ($accents_color) {
	echo ".jp-video-play .jp-video-play-icon:hover { border-color: $accents_color; }\n";
	}

	// Background
	if (!$color && !$image && ($background_position !== 'full screen' ) ) {
	echo "body { \n";
	
	if ($background_color) {		
	echo "background-color: $background_color; \n";
	}

	if ($background_image) {		
	echo "background-image: url($background_image); \n";
	}

	if ($background_repeat && $background_image) {		
	echo "background-repeat: $background_repeat; \n";
	}	

	if ($background_position && $background_image) {		
	echo "background-position: $background_position; \n";
	}

	if ($background_attachment && $background_image) {		
	echo "background-attachment: $background_attachment; \n";
	}

	echo "}\n";
	}

	
	// Background
	if ( ($color || $image) && ($position !== 'full screen' ) ) {
	echo "body { \n";

	if ($color) {		
	echo "background-color: $color; \n";
	}

	if ($image) {		
	echo "background-image: url($image); \n";
	}

	if ($repeat && $image) {		
	echo "background-repeat: $repeat; \n";
	}	

	if ($position && $image) {		
	echo "background-position: $position; \n";
	}

	if ($attachment && $image) {		
	echo "background-attachment: $attachment; \n";
	}

	echo "}\n";
	}
	
	
	if (wp_is_mobile() ) { // For the mobile version we fall back on our back-up background
	echo "body { \n";
	
	if ($background_color) {		
	echo "background-color: $background_color; \n";
	}

	if ($background_image) {		
	echo "background-image: url($background_image); \n";
	}

	if ($background_repeat && $background_image) {		
	echo "background-repeat: $background_repeat; \n";
	}	

	if ($background_position && $background_image) {		
	echo "background-position: $background_position; \n";
	}

	if ($background_attachment && $background_image) {		
	echo "background-attachment: $background_attachment; \n";
	}

	echo "}\n";
	}
	
	if ( ($color || $background_color) || ($body_font_enable == 'enable' && $body_font) || ($other_font_enable == 'enable' && $other_font) || $body_font_size || $link_color || $link_hover_color || $accents_color ) {
	echo "</style>\n";
	}

}

add_action( 'wp_head', 'wp_head_style' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Load more
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_loadmore_init() {
 	global $wp_query;
	
 		// Queue JS and CSS
 		wp_enqueue_script( 'load-posts', true );

		$options = get_option( 'tva' );
		
		if (is_page_template( 'template-portfolio.php' ) ) {

			$posts_per_page = $options[ 'portfolio_items' ];
		
			$args = array(
				'post_type'			=> 'portfolio',
				'post_status'		=> 'publish',
				'posts_per_page'	=> $posts_per_page
			);		
		
			$loop		= new WP_Query($args);
			$max		= $loop->max_num_pages;
			$paged		= get_query_var( 'paged' );

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}
	
		} else {
		
			$max		= $wp_query->max_num_pages;
			$paged 		= (get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
			
		}

 		// Add some parameters for the JS.
 		wp_localize_script(
 			'load-posts',
 			'tva_loadmore',
 			array(
 				'startPage' 	=> $paged,
 				'maxPages' 		=> $max,
 				'nextLink' 		=> next_posts($max, false)
 			)

 		);

}

add_action( 'template_redirect', 'tva_loadmore_init' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Filter search so it´s for posts only
//
//----------------------------------------------------------------------------------------------------------------------------

function wp_search_filter($query) {

	if ($query->is_search) {
	$query->set( 'post_type', 'post' );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'wp_search_filter' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Backgrounds
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_page_background' ) ) {
	function tva_page_background() {
	
	$options				= get_option( 'tva' ); // Make sure we can use our Theme Options
	$color					= get_post_meta(get_the_ID(), 'tva_page_styles_background_color', TRUE);
	$image					= get_post_meta(get_the_ID(), 'tva_page_styles_background_image', TRUE);
	$repeat					= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_repeat', TRUE);
	$position				= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_position', TRUE);
	$attachment				= get_post_meta(get_the_ID(), 'tva_page_styles_background_image_attachment', TRUE);
	$blur					= get_post_meta(get_the_ID(), 'tva_page_styles_blur_background_image', TRUE);
	$blur_radius			= get_post_meta(get_the_ID(), 'tva_page_styles_blur_radius_background_image', TRUE);
	$blur_overlay_style		= get_post_meta(get_the_ID(), 'tva_page_styles_blur_overlay_style_background_image', TRUE);
	$blur_overlay_opacity	= get_post_meta(get_the_ID(), 'tva_page_styles_blur_overlay_opacity_background_image', TRUE);
	$style					= get_post_meta(get_the_ID(), 'tva_page_styles_style', TRUE);
	
	?>

	<?php if (!wp_is_mobile() ) { // Don't fire any backgrounds when WP is Mobile ?>

		<?php // Check if any custom background action is availible ?>
		<?php if ( ( ($blur == 'yes' && $options[ 'background_technique' ] == 'div') && ($image) && ($position == 'full screen' ) ) ) { ?>
		<script type="text/javascript">
		jQuery(window).load(function($){

			jQuery( '.blur' ).blurjs({
				source: '.blur',
				radius: <?php if ($blur_radius) { ?><?php echo $blur_radius ?><?php } else { ?>20<?php } ?>,
				optClass: 'blurred',
				<?php if ($blur_overlay_style !== 'none' && $blur_overlay_opacity) { ?>
				overlay: 'rgba(<?php if ($blur_overlay_style == 'darken' ) { ?>0,0,0,<?php } ?><?php if ($blur_overlay_style == 'lighten' ) { ?>255,255,255,<?php } ?> <?php echo $blur_overlay_opacity ?>)',
				<?php } ?>
				cache: true
			});

			jQuery( '#bg' ).addClass( 'visible' );

		});
		</script>
		<?php } ?>

		<?php if ($image && ($position == 'full screen' ) ) { ?>

		<?php if ($options[ 'background_technique' ] == 'div' ) { ?>
		<div id="bg" <?php if ($blur == 'yes' ) { ?>class="blur"<?php } ?> style="background-image: url(<?php echo $image; ?>); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $image; ?>', sizingMethod='scale')';"></div>
		<?php } else { ?>
		<img src="<?php echo $image; ?>" id="bg">
		<?php } ?>
			
		<?php } ?>

		<?php // Check if any fall-back background action is availible ?>
		<?php if ( !$color && !$image && ( ($options[ 'background_blur' ] == 'yes' ) && ($options[ 'background_position' ] == 'full screen' ) ) ) { ?>
		<script type="text/javascript">
		jQuery(window).load(function($){

		
			jQuery( '.blur' ).blurjs({
				source: '.blur',
				radius: <?php if ($options[ 'background_blur_radius' ] ) { ?><?php echo $options[ 'background_blur_radius' ] ?><?php } else { ?>20<?php } ?>,
				optClass: 'blurred',
				<?php if ($options[ 'background_blur_overlay_style' ] && $options[ 'background_blur_overlay_opacity' ]) { ?>
				overlay: 'rgba(<?php if ($options[ 'background_blur_overlay_style' ] == 'darken' ) { ?>0,0,0,<?php } else { ?>255,255,255,<?php } ?> <?php echo $options[ 'background_blur_overlay_opacity' ] ?>)',
				<?php } ?>
				cache: true
			});
			
			jQuery( '#bg' ).addClass( 'visible' );

		});
		</script>
		<?php } ?>

		<?php if (!$image) { ?>
		<?php if ($options[ 'background_image' ] && ($options[ 'background_position' ] == 'full screen' ) ) { ?>

		<?php if ($options[ 'background_technique' ] == 'div' ) { ?>
		<div id="bg" <?php if ($options[ 'background_blur' ] == 'yes' ) { ?>class="blur"<?php } ?> style="background-image: url(<?php echo $options[ 'background_image' ]; ?>); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $options[ 'background_image' ]; ?>', sizingMethod='scale')';"></div>
		<?php } else { ?>
		<img src="<?php echo $options[ 'background_image' ]; ?>" id="bg">
		<?php } ?>

		<?php } ?>
		<?php } ?>

	<?php } ?>

    <?php }
}	



//----------------------------------------------------------------------------------------------------------------------------
//
//	Post Meta
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_page_meta' ) ) {
	function tva_page_meta() {
	
	$options = get_option( 'tva' ); // Make sure we can use our Theme Options
	
	?>

	<div class="entry-meta"><!-- BEGIN .entry-meta -->

		<span class="posted">
			<?php if (is_single() ) { ?>
			<?php _e( 'Posted: ', 'tva' ); ?>
			<?php } ?>
			<?php if ($options[ 'blog_time_notation' ] == 'enable' ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_time(); ?></a>
			<?php } else { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tva' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_date(); ?></a>
			<?php } ?>
		</span>

		<?php if (is_single() ) { ?>
		<?php $categories_list = get_the_category_list( __( ', ', 'tva' ) ); ?>
		<?php if ( $categories_list ) { ?>

		<span class="sep">/</span>

		<span class="cat-links">
			<?php _e( 'In:', 'tva' ); ?>
			<?php printf( __( '%2$s', 'tva' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
		</span>
		<?php } ?>

		<?php $tags_list = get_the_tag_list( '', __( ', ', 'tva' ) ); ?>
		<?php if ( $tags_list ) { ?>

		<span class="sep">/</span>

		<span class="tag-links">
			<?php _e( 'Tagged:', 'tva' ); ?>
			<?php printf( __( '%2$s', 'tva' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
		</span>
		<?php } ?>
		<?php } ?>

		<?php if ($options[ 'blog_post_rating' ] == 'enable' ) { ?>
		<?php echo getPostLikeLink(get_the_ID()); ?>
		
		<span class="sep alignright">/</span>
		<?php } ?>
		
		<?php if ( comments_open() ) { ?>
		<span class="comments">
			<?php comments_popup_link( __( '0', 'tva' ), __( '1', 'tva' ), __( '%', 'tva' ) ); ?>
		</span>	
		<?php } ?>

	</div><!-- END .entry-meta -->

    <?php }
}	



//----------------------------------------------------------------------------------------------------------------------------
//
//	Time ago
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_time_ago() {
 
	global $post;
 
	$date = get_post_time('G', true, $post);
 
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'tva' ), __( 'years', 'tva' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'tva' ), __( 'months', 'tva' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'tva' ), __( 'weeks', 'tva' ) ),
		array( 60 * 60 * 24 , __( 'day', 'tva' ), __( 'days', 'tva' ) ),
		array( 60 * 60 , __( 'hour', 'tva' ), __( 'hours', 'tva' ) ),
		array( 60 , __( 'minute', 'tva' ), __( 'minutes', 'tva' ) ),
		array( 1, __( 'second', 'tva' ), __( 'seconds', 'tva' ) )
	);
 
	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
 
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );
 
	// Difference in seconds
	$since = $newer_date - $date;
 
	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'tva' );
 
	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */
 
	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
 
		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}
 
	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
 
 
	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'tva' );
	}
 
	$output .= __( ' ago', 'tva' );
 
	return $output;
}
 
// Filter our tva_time_ago() function into WP's the_time() function and voila!
add_filter( 'the_time', 'tva_time_ago' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Exclude 'Featured' taxonomy term
//
//----------------------------------------------------------------------------------------------------------------------------

function my_get_the_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '', $exclude = array() ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	foreach ( $terms as $term ) {

		if(!in_array($term->name,$exclude)) {
			$link = get_term_link( $term, $taxonomy );
			if ( is_wp_error( $link ) )
				return $link;
			$term_links[] = '<a href="' . $link . '" rel="tag">' . $term->name . '</a>';
		}
	}

	$term_links = apply_filters( "term_links-$taxonomy", $term_links );

	return $before . join( $sep, $term_links ) . $after;
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Image
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_image' ) ) {
    function tva_image($postid, $imagesize) {
        // get the featured image for the post
        $thumbid = 0;
        if( has_post_thumbnail($postid) ) {
            $thumbid = get_post_thumbnail_id($postid);
        }
    
        // get first 2 attachments for the post
        $args = array(
            'orderby' => 'menu_order',
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => 2
        );
        $attachments = get_posts($args);

        if( !empty($attachments) ) {
            foreach( $attachments as $attachment ) {
                // if current image is featured image reloop
                if( $attachment->ID == $thumbid ) continue;
                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<div class='image caption'>$alt</div>";
                echo "<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />";
                break;
            }
        }
    }
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	prettyPhoto on galleries in posts
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_prettyPhoto_styles() {
	
	wp_register_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto/css/prettyPhoto.css' );
	wp_enqueue_style( 'prettyPhoto' );
	
}

add_action( 'wp_print_styles', 'tva_prettyPhoto_styles' );

function tva_get_attachment_link ($content) {
	$content = preg_replace("/<a/","<a data-gal=\"prettyPhoto[slides]\"",$content,1);
	return $content;
}

add_filter( 'wp_get_attachment_link', 'tva_get_attachment_link' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Remove 10px added to image caption divs
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_img_caption($nowt, $attr, $content) {
	extract( shortcode_atts( array(
		'id'		=> '',
		'align'		=> 'alignnone',
		'width'		=> '',
		'caption'	=> '',
	), $attr ) );

	if ( 1 > (int) $width || empty( $caption ) ) {
		return $content;
	}

	if ( $id )
		$id = 'id="' . esc_attr( $id ) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '" style="width:' . ( (int) $width ) . 'px;">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

add_filter( 'img_caption_shortcode', 'tva_img_caption', 10, 3 );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Gallery
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_gallery_post' ) ) {
    function tva_gallery_post( $postid, $imagesize ) {

	$gallery_animation = get_post_meta(get_the_ID(), 'tva_gallery_animation_type', true);
	$gallery_slideshow = get_post_meta(get_the_ID(), 'tva_gallery_slideshow', true);
	
	?>
	
	<?php

		$thumbid = 0;
    
		// Grab all of the attachments for the post
        $args = array(
			'orderby'			=> 'menu_order',
			'order'				=> 'ASC',
			'post_type'			=> 'attachment',
			'post_parent'		=> $postid,
			'post_mime_type'	=> 'image',
			'post_status'		=> null,
			'numberposts'   	=> -1,
		);

		$attachments = get_posts($args);

		echo "<div id='slider-$postid' pid='$postid' class='flexslider entry-format entry-gallery loading'><!-- BEGIN #slider-$postid -->\n";
		
		if ($attachments) {
			
			echo "<ul class='slides'>\n";

			//$i = 0;
			foreach( $attachments as $attachment ) {
				//if ($attachment->ID == $thumbid) continue;

				if (is_single() ) {
				$src = wp_get_attachment_image_src( $attachment->ID, 'large' ) ;
				} else {
				$src = wp_get_attachment_image_src( $attachment->ID, 'small' ) ;
				}

				//$caption = $attachment->post_excerpt;
				//$caption = ($caption) ? "<div class='flex-caption'><span>$caption</span></div>" : '';
				$alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
				echo "<li class='slide'><img width='$src[1]' height='$src[2]' src='$src[0]' alt='$alt' /></li>\n";
				//$i++;
			}

			echo "</ul>\n";

		}

		echo "</div><!-- END #slider-$postid -->\n";

		echo "<style type='text/css'>\n";
		echo "#slider-$postid { height: $src[2]px; }\n";
		echo "</style>\n";		
		
	}
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Formats » Audio
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_custom_audio' ) ) {
    function tva_custom_audio($postid) {
	
		$mp3 = get_post_meta(get_the_ID(), 'tva_audio_mp3', TRUE);
	
	?>
	
	<?php if($mp3) { ?>

	<div class="entry-<?php echo get_post_format(); ?>"><!-- BEGIN .entry-<?php echo get_post_format(); ?> -->
	
		<div id="jquery_jplayer_<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-audio" data-src="<?php echo $mp3; ?>"></div>
	
		<div id="jp_container_<?php the_ID(); ?>" class="jp-audio"><!-- BEGIN #jp_container_<?php the_ID(); ?> -->
		
			<div class="jp-type-single"><!-- BEGIN .jp-type-single -->
	
				<div id="#jp_interface_<?php the_ID(); ?>" class="jp-interface"><!-- BEGIN .jp-interface -->

					<ul class="jp-controls">
						<li><a href="#" class="jp-play" tabindex="1">Play</a></li>
						<li><a href="#" class="jp-pause" tabindex="1">Pause</a></li>
					</ul>
					
					<div class="jp-progress-wrap">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>		
					</div>
		
					<div class="jp-volume-bar-wrap">
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value">
								<div class="jp-volume-bar-knob"></div>
							</div>
						</div>
					</div>

				</div><!-- END .jp-interface -->

			</div><!-- END .jp-type-single -->

		</div><!-- END #jp_container_<?php the_ID(); ?> -->
	
	</div><!-- END .entry-<?php echo get_post_format(); ?> -->

	<?php } ?>

	<?php 
    }
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Video
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_custom_video' ) ) {
    function tva_custom_video($postid) {

    	$m4v		= get_post_meta($postid, 'tva_custom_video_m4v', true);
		
		if (is_single() ) {
 		$image		= wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium' );
		} else {
 		$image		= wp_get_attachment_image_src(get_post_thumbnail_id(), 'small' );
		}

		$image_url 	= $image[0];

    ?>
	
	<?php if($m4v) { ?>

	<div class="entry-format"><!-- BEGIN .entry-<?php echo get_post_format(); ?> -->
	
		<div id="jquery_jplayer_<?php echo $postid; ?>" data-id="<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-video" data-src="<?php echo $m4v; ?>" data-img="<?php echo $image_url; ?>" data-width="<?php echo $image[1]; ?>" data-height="<?php echo $image[2]; ?>"></div>

		<div id="jp_container_<?php echo $postid; ?>" class="jp-video"><!-- BEGIN #jp_container_<?php echo $postid; ?> -->

			<!--<div class="jp-video-play">
				<a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
			</div>-->

			<div class="jp-type-single">

					<div class="jp-interface"><!-- BEGIN .jp-interface -->

						<ul class="jp-controls">
							<li><a href="#" class="jp-play" tabindex="1">play</a></li>
							<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
						</ul>

						<div class="jp-progress-wrap">

							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>

						</div>

						<div class="jp-volume-bar-wrap">

							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value">
									<div class="jp-volume-bar-knob"></div>
								</div>
							</div>

						</div>

					</div><!-- END .jp-interface -->

			</div>

		</div><!-- END #jp_container_<?php echo $postid; ?> -->
	
	</div>

	<?php } ?>

    <?php }
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Post rating
//
//----------------------------------------------------------------------------------------------------------------------------

$timebeforerevote = 10800; // Thats once a week!

add_action( 'wp_ajax_nopriv_post-like', 'post_like' );
add_action( 'wp_ajax_post-like', 'post_like' );

function ajaxurl() {
    //BUG # nonexisting script included
    return;
	wp_enqueue_script( 'like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', 1 );
	wp_localize_script( 'like_post', 'ajax_var', array(
		'url'		=> admin_url( 'admin-ajax.php' ),
		'nonce'		=> wp_create_nonce( 'ajax-nonce' )
	));

}
add_action( 'wp_head', 'ajaxurl' );

function post_like() {

	$nonce = $_POST['nonce'];
 
    if (!wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!' );
		
	if(isset($_POST['post_like']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");
		$voted_IP = $meta_IP;
			
		if(isset( $meta_IP[0] )) {
			$voted_IP = $meta_IP[0];	
		}

		if(!is_array($voted_IP))
			$voted_IP = array();
		
		$meta_count = get_post_meta($post_id, "votes_count", true);

		if(!hasAlreadyVoted($post_id))
		{
			$voted_IP[$ip] = time();

			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			
			echo $meta_count;
		}
		else
			echo "already";
	}
	exit;
}

function hasAlreadyVoted($post_id) {

	global $timebeforerevote;

	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = $meta_IP;
		
	if(isset( $meta_IP[0] )) {
		$voted_IP = $meta_IP[0];
	}

	if(!is_array($voted_IP))
		$voted_IP = array();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP)))
	{
		$time = $voted_IP[$ip];
		$now = time();
		
		if(round(($now - $time) / 10800) > $timebeforerevote)
			return false;
			
		return true;
	}
	
	return false;
}

function getPostLikeLink($post_id) {

	//$themename = get_current_theme();

	$vote_count = get_post_meta($post_id, "votes_count", true);

	echo "<span class='post-like'>";

	if (hasAlreadyVoted($post_id)) {
	
		if ($vote_count == 0) {
		echo "<span class='qtip like alreadyvoted'>Like</span>";
		} else {
		echo "<span class='qtip like alreadyvoted'>Like</span>";
		echo "<span class='count'>$vote_count</span>";
		}
	
	} else {

		echo "<a href='#' data-post_id='$post_id'><span class='qtip like'>Like</span></a>";
		echo "<span class='count'>$vote_count</span>";

	}

	echo "</span>";

}



//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
?>