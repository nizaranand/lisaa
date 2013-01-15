<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Functions.php
// 	Here we have all our custom functions for this theme.
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

//----------------------------------------------------------------------------------------------------------------------------
//
//	Set the content width based on the theme's design and stylesheet.
//
//----------------------------------------------------------------------------------------------------------------------------

if (!isset( $content_width ) ) $content_width = 642;



//----------------------------------------------------------------------------------------------------------------------------
//
//	Load Translation Text Domain.
//
//----------------------------------------------------------------------------------------------------------------------------

load_theme_textdomain( 'tva' );

$locale = get_locale();
$locale_file = get_template_directory()."languages/$locale.php";
if (is_readable($locale_file) )
	require_once($locale_file);


//----------------------------------------------------------------------------------------------------------------------------
//
//	Add default posts and comments RSS feed links to <head>.
//
//----------------------------------------------------------------------------------------------------------------------------	

add_theme_support( 'automatic-feed-links' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	How we handle our menus.
//
//----------------------------------------------------------------------------------------------------------------------------	
	
register_nav_menu( 'primary', __( 'Primary Menu', 'tva' ) );


//-------------------------------------------------------------
//	Get wp_nav_menu() and wp_page_menu() to show a home link.
//-------------------------------------------------------------

function tva_page_menu_args( $args ) {
	$args[ 'show_home' ] = true;
	return $args;
}

add_filter( 'wp_page_menu_args', 'tva_page_menu_args' );


//-------------------------------------------------------------
//	Current-menu-item for active custom post type page.
//-------------------------------------------------------------

function current_page_for_custom_post_type($classes = array(), $menu_item = false){

    $c_page_type = get_post_type();
    $c_nav_item_tpl = get_post_meta($menu_item->object_id, '_wp_page_template', true);

    if($c_page_type == 'portfolio' && $c_nav_item_tpl == 'template-portfolio.php' ){
        $classes[] = 'current_page_parent';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'current_page_for_custom_post_type', 10, 2 );


//-------------------------------------------------------------
// Add a new class to menu items with a drop down.
//-------------------------------------------------------------

function check_for_submenu($classes, $item) {
	global $wpdb;
	$has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
	if ($has_children > 0) array_push($classes,'drop'); // assign the class dir to list items with sub menu.
	return $classes;
}

add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2 );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Add support for a variety of post formats.
//
//----------------------------------------------------------------------------------------------------------------------------	

$formats = array(
	'aside',
	'link',
	'quote',
	//'status',
	'image',
	'gallery',
	'audio',
	'video',
	//'chat'
	);
	
add_theme_support( 'post-formats', $formats );



//----------------------------------------------------------------------------------------------------------------------------
//
//	This theme styles the visual editor with editor-style.css to match the theme style.
//	It's also used to display visuals selected form the 'styles dropdown-menu'.
//
//----------------------------------------------------------------------------------------------------------------------------	

function tva_add_editor_style() {
	add_editor_style( 'editor-style.css' );
}

add_action( 'after_setup_theme', 'tva_add_editor_style' );	



//----------------------------------------------------------------------------------------------------------------------------
//
//	How we handle images.
//	Configure WP2.9+ Thumbnails & handle images in general.
//
//----------------------------------------------------------------------------------------------------------------------------

if (function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	
		set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnail
		add_image_size( 'xlarge', 978, '', true ); // Extra large image
		add_image_size( 'large', 726, '', true ); // Large image
		add_image_size( 'medium', 642, '', true ); // Medium image
		add_image_size( 'small', 306, '', true ); // Extra small image

		add_image_size( 'portfolio-small', 306, 220, true ); // Small portfolio Thumb
		
}


//-------------------------------------------------------------
//	Better quality Featured Image.
//-------------------------------------------------------------

function jpeg_quality_callback($arg) {
	return (int)100;
}

add_filter( 'jpeg_quality', 'jpeg_quality_callback' );


//-------------------------------------------------------------
//	IMG unautop (Courtesy of Interconnectit).
//-------------------------------------------------------------

function img_unautop($unautop) {
    $unautop = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $unautop);
    return $unautop;
}
add_filter( 'the_content', 'img_unautop', 20 );



//----------------------------------------------------------------------------------------------------------------------------
//
//	How we handle excerpts.
//	Set the lenght & return the 'continue reading' link.
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_excerpt_length( $length ) {
	return 22;
}

add_filter( 'excerpt_length', 'tva_excerpt_length' );


//-------------------------------------------------------------
//	Returns a "Continue Reading" link for excerpts.
//-------------------------------------------------------------

function tva_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt); 
}
	
add_filter( 'wp_trim_excerpt', 'tva_excerpt_more' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Register and enqueue common javascripts.
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_enqueue_scripts' )) { 
	function tva_enqueue_scripts() {

		// Register scripts
		wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', '1.3', true );
		wp_register_script( 'blur', get_template_directory_uri() . '/js/blur.min.js', true );
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', true );
		wp_register_script( 'infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', true );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', true );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', true );
		wp_register_script( 'jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', 'jquery', true );
		wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', '3.1.4', true );
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery', '', true );
		wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', 'jquery', '1.9.0', true );
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-1.7.min.js', 'jquery', '1.7.1', true );
		wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1.0', true );
		
		// Enqueue scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'easing' );
		wp_enqueue_script( 'blur' );
		wp_enqueue_script( 'flexslider' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'jplayer' );
		wp_enqueue_script( 'prettyPhoto' );
		wp_enqueue_script( 'superfish' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'custom' );

		// Enqueue validate script
		if (is_single() || is_page_template ( 'template-contact.php' ) ) {
			wp_enqueue_script( 'validate' );
		}
		
		// Enqueue jPlayer script
		if (is_single() || is_home() || is_archive() || is_page_template ( 'template-portfolio.php' ) ) {
			wp_enqueue_script( 'jplayer' );
		}

		// Enqueue isotope script
		if (is_front_page() || is_page_template ( 'template-portfolio.php' ) || is_tax() || is_home() || is_archive() || is_search() ) {
			wp_enqueue_script( 'isotope' );
		}
		
		// Enqueue comment-reply.js.
		if (is_singular() && comments_open() && ( get_option( 'thread_comments' ) == '1' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}


		// Localize the Theme URI so its availible for use in JS files
		$tva_theme_uri = get_template_directory_uri();

		wp_localize_script( 'custom', 'tva_theme_uri', $tva_theme_uri );	


		// Localize the Theme URI so its availible for use in JS files
		$gallery_animation = get_post_meta(get_the_ID(), 'tva_gallery_animation_type', true);

		wp_localize_script( 'custom', 'gallery_animation', $gallery_animation );			
	
		// Localize the Theme URI so its availible for use in JS files
		$gallery_slideshow = get_post_meta(get_the_ID(), 'tva_gallery_slideshow', true);

		wp_localize_script( 'custom', 'gallery_slideshow', $gallery_slideshow );
	

	}
	
	add_action( 'wp_enqueue_scripts', 'tva_enqueue_scripts' );

}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Additional admin JS.
//
//----------------------------------------------------------------------------------------------------------------------------

if (!function_exists( 'tva_custom_admin_scripts' ) ) {
    function tva_custom_admin_scripts($page) {

    	if ( ($page == 'post.php') || ($page == 'post-new.php') ) {
    		wp_register_script( 'custom-meta-boxes', get_template_directory_uri() . '/functions/js/tva-custom-meta-boxes.js', 'jquery' );
    		wp_enqueue_script( 'custom-meta-boxes' );
    	}

    }
    
    add_action( 'admin_enqueue_scripts', 'tva_custom_admin_scripts' );

}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Register our sidebars and widgetized areas.
//
//----------------------------------------------------------------------------------------------------------------------------	

if (function_exists( 'register_sidebar' ) ) {

	// Main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Main Sidebar', 'tva' ),
		'id'				=> 'sidebar',
		'description'		=> __( 'The main sidebar.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);

	// Homepage sidebar
	register_sidebar( array(
		'name' 				=> __( 'Homepage Sidebar', 'tva' ),
		'id'				=> 'sidebar-homepage',
		'description'		=> __( 'The sidebar for the Homepage.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);

	// Portfolio Single sidebar
	register_sidebar( array(
		'name' 				=> __( 'Portfolio Sidebar', 'tva' ),
		'id'				=> 'sidebar-portfolio',
		'description'		=> __( 'The sidebar for the Portfolio single pages.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);	
	
	// Blog sidebar
	register_sidebar( array(
		'name' 				=> __( 'Blog Sidebar', 'tva' ),
		'id'				=> 'sidebar-blog',
		'description'		=> __( 'The sidebar for the Blog.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);

	// Page sidebar
	register_sidebar( array(
		'name' 				=> __( 'Page Sidebar', 'tva' ),
		'id'				=> 'sidebar-page',
		'description'		=> __( 'The sidebar for normal Pages.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);
	
	// Contact sidebar
	register_sidebar( array(
		'name' 				=> __( 'Contact Sidebar', 'tva' ),
		'id'				=> 'sidebar-contact',
		'description'		=> __( 'The sidebar for the Contact page.', 'tva' ),
		'before_widget'		=> '<aside id="%1$s" class="%2$s">',
		'after_widget'		=> "</aside>",
		'before_title'		=> '<h3 class="widget-title">',
		'after_title'		=> '</h3>',
		)
	);
	
	// Archives Page Widgets
	register_sidebar( array(
		'name'				=> __( 'Archives Widgets', 'tva' ),
		'id'				=> 'sidebar-archives',
		'description'		=> __( 'The widgets that are displayed on the archives page.', 'tva' ),
		'before_widget'		=> '<article id="%1$s" class="widget %2$s">',
		'after_widget'		=> "</article>",
		'before_title'		=> '<h2 class="widget-title">',
		'after_title'		=> '</h2>',
		)
	);

}




 
//----------------------------------------------------------------------------------------------------------------------------
//
//	Display navigation to next/previous pages.
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>

	<nav id="<?php echo $nav_id; ?>" class="row"><!-- BEGIN #page-navigation -->

		<?php if (get_previous_posts_link() ) { ?>
		<span class="nav-previous"><?php previous_posts_link( __( 'Newer posts', 'tva' ) ); ?></span>
		<?php } ?>

		<?php if (get_next_posts_link() ) { ?>
		<span class="nav-next"><?php next_posts_link( __( 'Older posts', 'tva' ) ); ?></span>
		<?php } ?>

	</nav><!-- END #page-navigation -->

	<?php endif;

}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Template for comments and pingbacks.
//
//----------------------------------------------------------------------------------------------------------------------------

if(!function_exists( 'tva_comment' )) :

function tva_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :

	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'tva' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'tva' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	
		<article id="comment-<?php comment_ID(); ?>" class="clearfix"><!-- BEGIN #comment-<?php comment_ID(); ?> -->

			<div class="comment-content">
				
					<div class="comment-meta">

						<?php $avatar_size = 40; if ( '0' != $comment->comment_parent ) $avatar_size = 40; echo get_avatar( $comment, $avatar_size ); ?>

						<?php
							/* Translators: 1: comment author, 2: date and time */
							printf( __( '%1$s %2$s', 'tva' ),
								sprintf( '<div class="fn">%s</div>', get_comment_author_link() ),
								sprintf( '<time datetime="%2$s" class="entry-date">%3$s</time>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* Translators: 1: date, 2: time */
									sprintf( __( '%1$s at %2$s', 'tva' ), get_comment_date(), get_comment_time() )
								)
							);
						?>

						<span class="comment-reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tva' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span>

						<?php edit_comment_link( __( 'Edit', 'tva' ), '<span class="edit-link">', '</span>' ); ?>

					</div>

					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tva' ); ?></em>
					<?php endif; ?>

					<div class="comment-body">
					<?php comment_text(); ?>
					</div>
				
					
			</div>

		</article><!-- END #comment-<?php comment_ID(); ?> -->

	<?php
			break;
	endswitch;
}
endif;



//----------------------------------------------------------------------------------------------------------------------------
//
//	Remove rel attribute from the category list (for validation purposes).
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_remove_category_list_rel($output)
{
	$output = str_replace( ' rel="category"', '', $output);
	return $output;
}

add_filter( 'wp_list_categories', 'tva_remove_category_list_rel' );
add_filter( 'the_category', 'tva_remove_category_list_rel' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Include custom stuff.
//
//----------------------------------------------------------------------------------------------------------------------------

// Include custom post-styles
include( 'functions/custom-styles.php' );

// Include custom page meta
include( 'functions/custom-functions.php' );

// Include custom post meta
include( 'functions/custom-post-meta.php' );

// Include custom page meta
include( 'functions/custom-page-meta.php' );

// Include custom post-type
include( 'functions/custom-post-type.php' );
include( 'functions/custom-post-type-meta.php' );

// Include custom shortcodes
include( 'functions/custom-shortcodes.php' );

// Include custom widget: Twitter
include( 'widgets/widget-twitter.php' );

// Include custom widget: Social
include( 'widgets/widget-social.php' );

// Include custom widget: Recent Work
include( 'widgets/widget-recent-work.php' );

// Include custom widget: Portfolio Type
include( 'widgets/widget-portfolio-type.php' );

// Include custom widget: Portfolio Type Filter
include( 'widgets/widget-portfolio-type-filter.php' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Load Theme Options.
//
//----------------------------------------------------------------------------------------------------------------------------

get_template_part( '/options/tva-options' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now).
//
//----------------------------------------------------------------------------------------------------------------------------
?>