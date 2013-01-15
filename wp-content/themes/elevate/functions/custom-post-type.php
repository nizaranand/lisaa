<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom-posttype.php
// 	Here we have our custom post-type for this theme.
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
//	Add the custom Post Type
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_create_post_type_portfolio() 
{
	$labels = array(
		'name'					=> __( 'Portfolios', 'tva' ),
		'singular_name'			=> __( 'Portfolio', 'tva' ),
		'add_new'				=> __( 'Add New', 'tva' ),
		'add_new_item'			=> __( 'Add New Portfolio', 'tva' ),
		'edit_item'				=> __( 'Edit Portfolio', 'tva' ),
		'new_item'				=> __( 'New Portfolio', 'tva' ),
		'view_item'				=> __( 'View Portfolio', 'tva' ),
		'search_items'			=> __( 'Search Portfolio', 'tva' ),
		'not_found'				=> __( 'No portfolio found', 'tva' ),
		'not_found_in_trash'	=> __( 'No portfolio found in Trash','tva' ), 
		'parent_item_colon'		=> ''
	  );
	  
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,	
		'rewrite'				=> array( 
			'slug'	=> 'portfolio'
		), 
		'supports'				=> array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'page-attributes'
		)
	); 
	  
	register_post_type(__( 'portfolio', 'tva' ), $args);

}



//--------------------------------------------------------------
//	Create custom taxonomies
//--------------------------------------------------------------

function tva_build_taxonomies(){
    $labels = array(
        'name'							=> __( 'Portfolio Type', 'tva' ),
        'singular_name'					=> __( 'Portfolio Type', 'tva' ),
        'search_items'					=> __( 'Search Portfolio Types', 'tva' ),
        'popular_items'					=> __( 'Popular Portfolio Types', 'tva' ),
        'all_items'						=> __( 'All Portfolio Types', 'tva' ),
        'parent_item'					=> __( 'Parent Portfolio Type', 'tva' ),
        'parent_item_colon'				=> __( 'Parent Portfolio Type:', 'tva' ),
        'edit_item'						=> __( 'Edit Portfolio Type', 'tva' ), 
        'update_item'					=> __( 'Update Portfolio Type', 'tva' ),
        'add_new_item'					=> __( 'Add New Portfolio Type', 'tva' ),
        'new_item_name'					=> __( 'New Portfolio Type Name', 'tva' ),
        'separate_items_with_commas'	=> __( 'Separate portfolio types with commas', 'tva' ),
        'add_or_remove_items'			=> __( 'Add or remove portfolio types', 'tva' ),
        'choose_from_most_used'			=> __( 'Choose from the most used portfolio types', 'tva' ),
        'menu_name'						=> __( 'Portfolio Types', 'tva' )
    );
    
	register_taxonomy(
	    'portfolio-type', 
	    array( __( 'portfolio', 'tva' )), 
	    array(
	        'hierarchical'	=> true, 
	        'labels'		=> $labels,
	        'show_ui'		=> true,
	        'query_var'		=> true,
	        'rewrite'		=> array(
				'slug'			=> 'portfolio-type',
				'hierarchical'	=> true
			)
	    )
	); 
}



//--------------------------------------------------------------
//	Custom posttype sorting
//--------------------------------------------------------------

function tva_create_portfolio_sorting_page() {
    $tva_portfolio_sorting_page = add_theme_page( 'Sort Portfolios', __( 'Sort Portfolios', 'tva' ), 'edit_posts', 'tva_portfolio', 'tva_portfolio_sort' );
}

function tva_portfolio_sort() {
	$portfolio = new WP_Query( 'post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC' );
?>

    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e( 'Sort Portfolio', 'tva' ); ?></h2>
        <p><?php _e( 'Re-order your portfolio items as you wish by dragging and dropping. The first item will appear as first, and so on.<br /> Re-ordering your portfolio items will only alter the display order. The actual order (by date) remains the same.', 'tva' ); ?></p>

        <ul id="portfolio-list">
			<?php while( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

			<li id="<?php the_id(); ?>" class="menu-item">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="menu-item-title"><?php the_title(); ?></span>
					</dt>
				</dl>
			</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
    </div>
 
<?php
}
 
function tva_save_portfolio_sorting_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $portfolio_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_id));
        $counter++;
    }
    return true;
}

function tva_print_sorting_scripts() {
	global $pagenow;
 
	$pages = array( 'themes.php' );
	if (in_array($pagenow, $pages)) {
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'tva_portfolio_sort', get_template_directory_uri() . '/functions/js/tva-portfolio-sorting.js' );
	}
}
add_action( 'admin_print_scripts', 'tva_print_sorting_scripts' );

function tva_print_sorting_styles() {
	global $pagenow;
 
	$pages = array('edit_posts');
	if (in_array($pagenow, $pages)) {
		wp_enqueue_style( 'tva_portfolio_sort', get_template_directory_uri() . '/admin/css/tva-portfolio-sorting.css' );
	}
}
add_action( 'admin_print_styles', 'tva_print_sorting_styles' );


//--------------------------------------------------------------
//	Columns
//--------------------------------------------------------------

function tva_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type', 'tva' ):  
                echo get_the_term_list($post->ID, __( 'portfolio-type', 'tva' ), '', ', ','' );  
                break;

			case __( 'thumbnail', 'tva' ):
				$width = (int) 35;
				$height = (int) 35;
				$thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );

				// Display the featured image in the column view if possible
				if ($thumbnail_id) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				}
				if ( isset($thumb) ) {
					echo $thumb;
				} else {
					echo __( 'None', 'tva' );
				}
				break;
        }  
}

function tva_portfolio_edit_columns($columns){  

	$columns = array(  
		"cb"		=> "<input type=\"checkbox\" />",  
		"title"		=> __( 'Title', 'tva' ),
		"thumbnail" => __( 'Thumbnail', 'tva' ),
		"type"		=> __( 'Type', 'tva' ),
		"date"		=> __( 'Date', 'tva' )
	);  
	$portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $columns;  
}



//--------------------------------------------------------------
//	Call
//--------------------------------------------------------------

add_action( 'init', 'tva_create_post_type_portfolio' );
add_action( 'init', 'tva_build_taxonomies', 0 );

add_action( 'admin_menu' , 'tva_create_portfolio_sorting_page' ); 
add_action( 'wp_ajax_portfolio_sort', 'tva_save_portfolio_sorting_order' );

add_action( 'manage_posts_custom_column',  'tva_portfolio_custom_columns' ); 
add_filter( 'manage_edit-portfolio_columns', 'tva_portfolio_edit_columns' ); 


//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
?>