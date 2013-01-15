<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom-pagemeta.php
// 	Here we have all our custom post functions for this theme.
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
//	Add the custom Post Meta
//
//----------------------------------------------------------------------------------------------------------------------------

$prefix = 'tva_';

//--------------------------------------------------------------
//	Page Specific Styles
//--------------------------------------------------------------

$meta_box_page_styles = array(
	'id' 		=> 'tva-content-box-page-styles',
	'title' 	=>  __( 'Page Specific Style Options', 'tva' ),
	'page'		=> 'page',
	'context' 	=> 'normal',
	'priority'	=> 'high',
	'fields' 	=> array(

		// Background
		array(
			'name'		=> __( 'Background: Color', 'tva' ),
			'desc'		=> __( 'An optional background color for this slide.', 'tva' ),
			'id'		=> $prefix . "page_styles_background_color",
			'type'		=> "color",
			'std'		=> ''
		),

		array(
			'name'		=> __( 'Background: Image', 'tva' ),
			'desc'		=> __( 'Add a background image for this page.', 'tva' ),
			'id'		=> $prefix . "page_styles_background_image",
			'type'		=> "text",
			'std'		=> ''
		),

		array(
			'name'		=> __( 'Browse', 'tva' ),
			'desc'		=> __( 'Upload and click "Insert to Post".', 'tva' ),
			'id'		=> $prefix . "page_styles_background_image_button",
			'type'		=> 'button',
			'std'		=> 'Browse'
		),
		
		array(
			'name'		=> __( 'Background: Featured Image', 'tva' ),
			'desc'		=> __( 'Use the featured image for this post as background image.', 'tva' ),
			'id'		=> $prefix . "page_styles_background_featured_image",
			'type'		=> "checkbox",
			'std'		=> ''
		),

		array(
			'name'		=> __( 'Background: Repeat', 'tva' ),
			'desc'		=> __( 'Select the background-repeat for the background-image.', 'tva' ),
			'id'		=> $prefix . 'page_styles_background_image_repeat',
			"type"		=> "select",
			'std'		=> 'no-repeat',
			'options'	=> array(
							'',
							'repeat',
							'repeat-x',
							'repeat-y',
							'no-repeat'
						)
		),

		array(
			'name'		=> __( 'Background: Attachment', 'tva' ),
			'desc'		=> __( 'Select the background-attachment for the background-image.', 'tva' ),
			'id'		=> $prefix . 'page_styles_background_image_attachment',
			"type"		=> "select",
			'std'		=> 'scroll',
			'options'	=> array(
							'',
							'scroll',
							'fixed'
						)
		),

		array(
			'name'		=> __( 'Background: Position', 'tva' ),
			'desc'		=> __( 'Select the background-position for the background-image.', 'tva' ),
			'id'		=> $prefix . 'page_styles_background_image_position',
			"type"		=> "select",
			'std'		=> 'top left',
			'options'	=> array(
							'',
							'top left',
							'top center',
							'top right',
							'center left',
							'center center',
							'center right',
							'bottom left',
							'bottom center',
							'bottom right',
							'full screen'
						)
		),

		// Style
		array(
			'name'		=> __( 'Page specific style', 'tva' ),
			'desc'		=> __( 'Select the page specific style. Choose light when using a dark background and choose dark when using a light background.', 'tva' ),
			'id'		=> $prefix . 'page_styles_style',
			"type"		=> "select",
			'std'		=> 'dark',
			'options'	=> array(
							'dark',
							'light'
						)
		),
		
	),

);		



//--------------------------------------------------------------
//	Page Specific Styles » Blur
//--------------------------------------------------------------

$meta_box_page_styles_blur = array(
	'id' 		=> 'tva-content-box-page-styles-blur',
	'title' 	=>  __( 'Page Specific Style Options &#187; Blur', 'tva' ),
	'page'		=> 'page',
	'context' 	=> 'normal',
	'priority'	=> 'high',
	'fields' 	=> array(

		array(
			'name'		=> __( 'Background: Blur', 'tva' ),
			'desc'		=> __( 'Want to Blur your background image without editing your image manually?', 'tva' ),
			'id'		=> $prefix . 'page_styles_blur_background_image',
			"type"		=> "select",
			'std'		=> 'no',
			'options'	=> array(
							'no',
							'yes'
						)
		),
    	array(
			'name'		=> __( 'Blur: Radius', 'tva' ),
			'desc'		=> __( 'Enter a blur radius for your blurred background image. Default is set to 20.', 'tva' ),
			'id'			=> $prefix . 'page_styles_blur_radius_background_image',
			'type'		=> 'text',
			'std'		=> ''
    	),
		array(
			'name'		=> __( 'Blur: Overlay Style', 'tva' ),
			'desc'		=> __( 'Choose to lighten or darken your background image.', 'tva' ),
			'id'		=> $prefix . 'page_styles_blur_overlay_style_background_image',
			"type"		=> "select",
			'std'		=> 'darken',
			'options'	=> array(
							'none',
							'darken',
							'lighten'
						)
		),
    	array(
			'name'		=> __( 'Blur: Overlay Opacity', 'tva' ),
			'desc'		=> __( 'Enter a value between 0 and 1. Leave blank to disable overlay.', 'tva' ),
			'id'			=> $prefix . 'page_styles_blur_overlay_opacity_background_image',
			'type'		=> 'text',
			'std'		=> ''
    	),

	),

);

add_action( 'admin_menu', 'tva_add_box_page' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Add a metabox to edit page
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_add_box_page() {
	global $meta_box_page_styles, $meta_box_page_styles_blur;
 
	add_meta_box($meta_box_page_styles['id'], $meta_box_page_styles['title'], 'tva_show_box_page_styles', $meta_box_page_styles['page'], $meta_box_page_styles['context'], $meta_box_page_styles['priority']);
	add_meta_box($meta_box_page_styles_blur['id'], $meta_box_page_styles_blur['title'], 'tva_show_box_page_styles_blur', $meta_box_page_styles_blur['page'], $meta_box_page_styles_blur['context'], $meta_box_page_styles_blur['priority']);
	
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Show the fields in meta box
//
//----------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------
//	Page Specific Styles
//--------------------------------------------------------------

function tva_show_box_page_styles() {
	global $meta_box_page_styles, $post;

	echo '<p style="font-weight: bold; border-bottom: 1px solid #eee; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your page specific styles.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles['fields'] as $field) {
	
		// Get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);

		$settings =   array(
			'wpautop'			=> false, // use wpautop?
			'media_buttons'		=> false, // show insert/upload button(s)
			'textarea_name'		=> $field['id'], // set the textarea name to something different, square brackets [] can be used here
			'textarea_rows'		=> 10, // rows="..."
			'tabindex'			=> '',
			'editor_css'		=> '', // intended for extra styles for both visual and HTML editors buttons, needs to include the <style> tags, can use "scoped".
			'editor_class'		=> '', // add extra class(es) to the editor textarea
			'teeny'				=> true, // output the minimal editor config used in Press This
			'dfw'				=> false, // replace the default fullscreen with DFW (needs specific css)
			'tinymce'			=> true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
			'quicktags'			=> true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
		);		
		
		switch ($field['type']) {

			// Text Area			
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				wp_editor(apply_filters( 'the_content', $meta), $field['id'], $settings );
			
			break;

			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;

			// Button	
			case 'button':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
			echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $field['name'], '" />';
			
			break;

			// Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;

            case 'color':

                echo '<tr>',
    			'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
    			'<td>';

                echo '<div id="' . $field['id'] . '_picker" class="colorSelector"><div></div></div>';
    			echo '<input style="width:75px; margin-left: 5px;" class="tva-color" name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="'. $meta .'" />';
?>   			
    			<script type="text/javascript" language="javascript">
            		jQuery(document).ready(function(){
            			//Color Picker
    				    jQuery('#<?php echo $field['id']; ?>_picker').children('div').css('backgroundColor', '<?php echo $meta; ?>');    
            			jQuery('#<?php echo $field['id']; ?>_picker').ColorPicker({
            				color: '<?php echo $meta; ?>',
            				onShow: function (colpkr) {
            					jQuery(colpkr).fadeIn(500);
            					return false;
            				},
            				onHide: function (colpkr) {
            					jQuery(colpkr).fadeOut(500);
            					return false;
            				},
            				onChange: function (hsb, hex, rgb) {
            					//jQuery(this).css('border','1px solid red');
            					jQuery('#<?php echo $field['id']; ?>_picker').children('div').css('backgroundColor', '#' + hex);
            					jQuery('#<?php echo $field['id']; ?>_picker').next('input').attr('value','#' + hex);
        					}
    				    });
                    });
        		</script>

<?php       break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Page Specific Styles » Blur
//--------------------------------------------------------------

function tva_show_box_page_styles_blur() {
	global $meta_box_page_styles_blur, $post;

	echo '<p style="font-weight: bold; border-bottom: 1px solid #eee; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your page-specific blur styles.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles_blur['fields'] as $field) {
	
		// Get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);

		switch ($field['type']) {

			// Text		
			case 'text':

			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';

			break;

			// Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}

add_action( 'save_post', 'tva_save_data_page' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Save date
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_save_data_page($post_id) {
	global $meta_box_page_styles, $meta_box_page_styles_blur;
 
	//--------------------------------------------------------------
	//	Verify nonce
	//--------------------------------------------------------------
	if (!isset($_POST['tva_meta_box_nonce']) || !wp_verify_nonce($_POST['tva_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
 
	//--------------------------------------------------------------
	//	Check autosave
	//--------------------------------------------------------------
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
 
	//--------------------------------------------------------------
	//	Check capabilities
	//--------------------------------------------------------------
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}


	//--------------------------------------------------------------
	//	Page Specific Styles
	//--------------------------------------------------------------
	foreach ($meta_box_page_styles['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		if (isset($_REQUEST[ $field['id'] ])) {
		$new = $_POST[$field['id']];
		}
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	


	//--------------------------------------------------------------
	//	Page Specific Styles » Blur
	//--------------------------------------------------------------
	foreach ($meta_box_page_styles_blur['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		if (isset($_REQUEST[ $field['id'] ])) {
		$new = $_POST[$field['id']];
		}
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}


}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Queue the required scripts
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_admin_scripts_page() {
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'thickbox' );
	wp_register_script( 'tva-upload', get_template_directory_uri() . '/functions/js/upload-button.js', array( 'jquery', 'media-upload', 'thickbox' ));
	wp_enqueue_script( 'tva-upload' );
	wp_enqueue_script( 'color-picker', get_template_directory_uri() . '/functions/js/colorpicker.js', array( 'jquery' ));
}

function tva_admin_styles_page() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'color-picker', get_template_directory_uri() . '/functions/css/colorpicker.css');
}

add_action( 'admin_print_scripts', 'tva_admin_scripts_page' );
add_action( 'admin_print_styles', 'tva_admin_styles_page' );



//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>