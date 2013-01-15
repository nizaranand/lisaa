<?php

//----------------------------------------------------------------------------------------------------------------------------
//
//	Add the custom Posttype Meta
//
//----------------------------------------------------------------------------------------------------------------------------

$prefix = 'tva_';

//--------------------------------------------------------------
//	Page Specific Styles
//--------------------------------------------------------------

$meta_box_page_styles_portfolio = array(
	'id' 		=> 'tva-content-box-page-styles-portfolio',
	'title' 	=>  __( 'Page Specific Style Options', 'tva' ),
	'page'		=> 'portfolio',
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
			'std'		=> 'left',
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

$meta_box_page_styles_blur_portfolio = array(
	'id' 		=> 'tva-content-box-page-styles-blur',
	'title' 	=>  __( 'Page Specific Style Options &#187; Blur', 'tva' ),
	'page'		=> 'portfolio',
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
			'id'		=> $prefix . 'page_styles_blur_overlay_opacity_background_image',
			'type'		=> 'text',
			'std'		=> ''
    	),

	),

);


//--------------------------------------------------------------
//	Additional Thumbnail
//--------------------------------------------------------------

$meta_box_thumb = array(
	'id'		=> 'tva-meta-box-thumb',
	'title'		=>  __( 'Additional Thumbnail Settings', 'tva' ),
	'page'		=> 'portfolio',
	'context'	=> 'normal',
	'priority'	=> 'high',
	'fields'	=> array(

		array(
			'name'		=> __( 'Additional Thumb', 'tva' ),
			'desc'		=> __( 'Add an additional thumbnail.', 'tva' ),
			'id'		=> $prefix . "portfolio_additional_thumb",
			'type'		=> "text",
			'std'		=> ''
		),

		array(
			'name'		=> __( 'Browse', 'tva' ),
			'desc'		=> __( 'Upload and click "Insert to Post".', 'tva' ),
			'id'		=> $prefix . "portfolio_additional_thumb_button",
			'type'		=> 'button',
			'std'		=> 'Browse'
		),	

	),

);

	

//--------------------------------------------------------------
//	Portfolio
//--------------------------------------------------------------

$meta_box_portfolio = array(
	'id'		=> 'tva-meta-box-portfolio',
	'title'		=>  __( 'Portfolio Details Settings', 'tva' ),
	'page'		=> 'portfolio',
	'context'	=> 'normal',
	'priority'	=> 'high',
	'fields'	=> array(

    	array(
			'name'		=>  __( 'Portfolio Display', 'tva' ),
			'desc'		=> __( 'Choose the format you wish to display.', 'tva' ),
			'id'		=> $prefix . 'portfolio_format',
			'type'		=> 'select',
			'std'		=> 'Image',
			'options'	=> array(
				'Image',
				'Gallery',
				'Video'
				)
		),

    	array(
    	   'name'		=> __( 'Completion Date', 'tva' ),
    	   'desc'		=> __( 'When was the project completed?', 'tva' ),
    	   'id'			=> $prefix . 'portfolio_date',
    	   'type'		=> 'text',
    	   'std'		=> ''
    	),

    	array(
    	   'name'		=> __( 'Client', 'tva' ),
    	   'desc'		=> __( 'What is the name of the client this project was completed for?', 'tva' ),
    	   'id'			=> $prefix . 'portfolio_client',
    	   'type'		=> 'text',
    	   'std'		=> ''
    	),

    	array(
    	   'name'		=> __( 'Client URL', 'tva' ),
    	   'desc'		=> __( 'If there is a URL for the client, other than the URL for the project, what is it?', 'tva' ),
    	   'id'			=> $prefix . 'portfolio_client_url',
    	   'type'		=> 'text',
    	   'std'		=> ''
    	),

    	array(
    	   'name'		=> __( 'Project URL', 'tva' ),
    	   'desc'		=> __( 'What is the URL for the project?', 'tva' ),
    	   'id'			=> $prefix . 'portfolio_url',
    	   'type'		=> 'text',
    	   'std'		=> ''
    	),

		array(
			'name'		=> __( 'Button color', 'tva' ),
			'desc'		=> __( 'Choose the color for the Project URL button.', 'tva' ),
			'id'		=> $prefix . 'portfolio_button_color',
			"type"		=> "select",
			'std'		=> 'white',
			'options'	=> array(
							'white',
							'red',
							'yellow',
							'green',
							'blue'
						)
		),

	)

);



//--------------------------------------------------------------
//	Image
//--------------------------------------------------------------

$meta_box_portfolio_image = array(
	'id' 		=> 'tva-meta-box-portfolio-image',
	'title' 	=>  __( 'Image Settings', 'tva' ),
	'page' 		=> 'portfolio',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(
	
		array(	
			'name'		=> __( 'Enable Lightbox', 'tva' ),
			'desc'		=> __( 'Check this to enable to open your image in a pretty lightbox.', 'tva' ),
			'id'		=> $prefix . 'image_enable_lightbox',
			"type"		=> "select",
			'std'		=> 'yes',
			'options'	=> array(
							'yes',
							'no'
						)
		),
		array(	
			'name'		=> __( 'Enable caption', 'tva' ),
			'desc'		=> __( 'Check to enable a caption for your image.', 'tva' ),
			'id'		=> $prefix . 'image_enable_caption',
			"type"		=> "select",
			'std'		=> 'yes',
			'options'	=> array(
							'yes',
							'no'
						)
		),
    	array(
			'name'		=> __( 'Custom caption', 'tva' ),
			'desc'		=> __( 'When enabled, you can enter a custom caption.', 'tva' ),
			'id'			=> $prefix . 'image_caption_custom',
			'type'		=> 'text',
			'std'		=> ''
    	),
    	array(
			'name'		=> __( 'Custom caption Link', 'tva' ),
			'desc'		=> __( 'Enter a link for your custom caption.', 'tva' ),
			'id'			=> $prefix . 'image_caption_custom_link',
			'type'		=> 'text',
			'std'		=> ''
    	),

	),
	
);



//--------------------------------------------------------------
//	Portfolio » Gallery
//--------------------------------------------------------------

$meta_box_portfolio_gallery = array(
	'id'		=> 'tva-meta-box-portfolio-gallery',
	'title'		=> __( 'Gallery Settings', 'tva' ),
	'page'		=> 'portfolio',
	'context'	=> 'normal',
	'priority'	=> 'high',
	'fields'	=> array(

    	array(
			'name'		=>  __( 'Gallery Animation', 'tva' ),
			'desc'		=> __( 'Select the type of animation you wish to use for the gallery. Default is set to slide.', 'tva' ),
			'id'		=> $prefix . 'gallery_animation_type',
			'type'		=> 'select',
			'std'		=> 'slide',
			'options'	=> array(
							'slide',
							'fade'
							)
		),
    	array(
			'name'		=>  __( 'Gallery Slideshow', 'tva' ),
			'desc'		=> __( 'Select wether the gallery should be an automated slideshow or not. Default is set to true.', 'tva' ),
			'id'		=> $prefix . 'gallery_slideshow',
			'type'		=> 'select',
			'std'		=> 'true',
			'options'	=> array(
							'true',
							'false'
							)

		),

	)

);


//--------------------------------------------------------------
//	Portfolio » Video
//--------------------------------------------------------------

$meta_box_portfolio_video = array(
	'id'		=> 'tva-meta-box-portfolio-video',
	'title'		=> __( 'Video Settings', 'tva' ),
	'page'		=> 'portfolio',
	'context'	=> 'normal',
	'priority'	=> 'high',
	'fields'	=> array(

		array(
			'name'		=> __( 'M4V File URL', 'tva' ),
			'desc'		=> __( 'The URL to the .m4v video file', 'tva' ),
			'id'		=> $prefix . "custom_video_m4v",
			'type'		=> "text",
			'std'		=> ''
		),
		array(
			'name'		=> __( 'OGV File URL', 'tva' ),
			'desc'		=> __( 'The URL to the .ogv video file', 'tva' ),
			'id'		=> $prefix . "custom_video_ogv",
			'type'		=> "text",
			'std'		=> ''
		),
		array(
			'name'		=> __( 'Embed Code', 'tva' ),
			'desc'		=> __( 'If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 618px width and any height. This field will override the above.', 'tva'),
			'id'		=> $prefix . 'portfolio_video_embed',
			'type'		=> 'textarea',
			'std'		=> ''
		)

	)

);

add_action( 'admin_menu', 'tva_add_box_portfolio' );



/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tva_add_box_portfolio() {
	global $meta_box_page_styles_portfolio, $meta_box_page_styles_blur_portfolio, $meta_box_thumb, $meta_box_portfolio, $meta_box_portfolio_image, $meta_box_portfolio_gallery, $meta_box_portfolio_video;
	
	add_meta_box($meta_box_page_styles_portfolio['id'], $meta_box_page_styles_portfolio['title'], 'tva_show_box_page_styles_portfolio', $meta_box_page_styles_portfolio['page'], $meta_box_page_styles_portfolio['context'], $meta_box_page_styles_portfolio['priority']);
	add_meta_box($meta_box_page_styles_blur_portfolio['id'], $meta_box_page_styles_blur_portfolio['title'], 'tva_show_box_page_styles_blur_portfolio', $meta_box_page_styles_blur_portfolio['page'], $meta_box_page_styles_blur_portfolio['context'], $meta_box_page_styles_blur_portfolio['priority']);
	add_meta_box($meta_box_thumb['id'], $meta_box_thumb['title'], 'tva_show_box_thumb', $meta_box_thumb['page'], $meta_box_thumb['context'], $meta_box_thumb['priority']);
	add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'tva_show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);
	add_meta_box($meta_box_portfolio_image['id'], $meta_box_portfolio_image['title'], 'tva_show_box_portfolio_image', $meta_box_portfolio_image['page'], $meta_box_portfolio_image['context'], $meta_box_portfolio_image['priority']);	
	add_meta_box($meta_box_portfolio_gallery['id'], $meta_box_portfolio_gallery['title'], 'tva_show_box_portfolio_gallery', $meta_box_portfolio_gallery['page'], $meta_box_portfolio_gallery['context'], $meta_box_portfolio_gallery['priority']);	
	add_meta_box($meta_box_portfolio_video['id'], $meta_box_portfolio_video['title'], 'tva_show_box_portfolio_video', $meta_box_portfolio_video['page'], $meta_box_portfolio_video['context'], $meta_box_portfolio_video['priority']);	

}


//----------------------------------------------------------------------------------------------------------------------------
//
//	Show the fields in meta box
//
//----------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------
//	Page Specific Styles
//--------------------------------------------------------------

function tva_show_box_page_styles_portfolio() {
	global $meta_box_page_styles_portfolio, $post;

	echo '<p style="border-bottom: 1px solid #fff; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your background image.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles_portfolio['fields'] as $field) {
	
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
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				wp_editor(apply_filters( 'the_content', $meta), $field['id'], $settings );
			
			break;


			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;


			// Button	
			case 'button':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
			echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $field['name'], '" />';
			
			break;

			
			// Checkbox		
			case 'checkbox':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
			
			break;


			// Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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


			// Color
            case 'color':

                echo '<tr>',
    			'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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

function tva_show_box_page_styles_blur_portfolio() {
	global $meta_box_page_styles_blur_portfolio, $post;

	echo '<p style="font-weight: bold; border-bottom: 1px solid #eee; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your page-specific blur styles.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles_blur_portfolio['fields'] as $field) {
	
		// Get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);

		switch ($field['type']) {

			// Text		
			case 'text':

			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';

			break;

			// Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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



//--------------------------------------------------------------
//	Additional thumb
//--------------------------------------------------------------

function tva_show_box_thumb() {
	global $meta_box_thumb, $post;

	echo '<p style="border-bottom: 1px solid #fff; padding: 10px 0 20px 0;">'.__( 'Use the following fields to add an additional thumbnail image, for when you want to include an image that differs from the featured image. This will override the featured image..', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_thumb['fields'] as $field) {
	
		// Get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);		
		
		switch ($field['type']) {

			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;

			// Button	
			case 'button':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
			echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $field['name'], '" />';
			
			break;


		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Portfolio-meta
//--------------------------------------------------------------

function tva_show_box_portfolio_meta() {
	global $meta_box_portfolio_meta, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_meta['fields'] as $field) {
	
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
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				wp_editor(apply_filters( 'the_content', $meta), $field['id'], $settings );
			
			break;

			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}


//--------------------------------------------------------------
//	Portfolio
//--------------------------------------------------------------

function tva_show_box_portfolio() {
	global $meta_box_portfolio, $post;
 	
	echo '<p style="border-bottom: 1px solid #fff; padding: 10px 0 20px 0;">'.__( 'Select your preferred Portfolio Type and fill out the additional information fields.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio['fields'] as $field) {

		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;
 
			// Button	
			case 'button':
			
			echo '<tr><td><input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
			echo '</td>',
			'</tr>';
			
			break;
			
			// Select	
			case 'select':

				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';
			
				echo'<select name="'.$field['id'].'" id="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo '<option';
					echo ' id="'. $option .'" '; 
					echo 'class="portfolio-type" '; 
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo '</select>';
			
			break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}




//--------------------------------------------------------------
//	Portfolio » Image
//--------------------------------------------------------------

function tva_show_box_portfolio_image() {
	global $meta_box_portfolio_image, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_image['fields'] as $field) {
	
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
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display: block; color: #aaa; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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
 
			// Select	
			case 'select':

				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo '</select>';
			
			break;

			// Checkbox		
			case 'checkbox':

			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';

			break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Portfolio » Gallery
//--------------------------------------------------------------

function tva_show_box_portfolio_gallery() {
	global $meta_box_portfolio_gallery, $post;
 	
	echo '<p style="border-bottom: 1px solid #fff; padding: 10px 0 20px 0;">'.__( 'Select your preferred Gallery settings.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_gallery['fields'] as $field) {

		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;
 
			// Button	
			case 'button':
			
			echo '<tr><td><input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
			echo '</td>',
			'</tr>';
			
			break;
			
			// Select	
			case 'select':

				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';
			
				echo'<select name="'.$field['id'].'" id="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo '<option';
					echo ' id="'. $option .'" '; 
					echo 'class="portfolio-type" '; 
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo '</select>';
			
			break;

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}


//--------------------------------------------------------------
//	Portfolio » Video
//--------------------------------------------------------------

function tva_show_box_portfolio_video() {
	global $meta_box_portfolio_video, $post;
 	
	echo '<p style="border-bottom: 1px solid #fff; padding: 10px 0 20px 0;">'.__( 'These settings enable you to embed videos into your portfolio pages.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:100%; margin-right: 20px; float:left;" />';
			
			break;
			
			// Text Area			
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;

			// Select	
			case 'select':

				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; font-family: Helvetica, Arial; font-size: 1em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';
			
				echo'<select name="'.$field['id'].'" id="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo '<option';
					echo ' id="'. $option .'" '; 
					echo 'class="portfolio-type" '; 
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo '</select>';
			
			break;
 
			// Button	
			case 'button':
					echo '<tr><td><input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;

		}

	}
 
	echo '</table>';
}

add_action( 'save_post', 'tva_save_data_portfolio' );



/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tva_save_data_portfolio($post_id) {
	global $meta_box_page_styles_portfolio, $meta_box_page_styles_blur_portfolio, $meta_box_thumb, $meta_box_portfolio, $meta_box_portfolio_image, $meta_box_portfolio_gallery, $meta_box_portfolio_video;

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
	foreach ($meta_box_page_styles_portfolio['fields'] as $field) {
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
	foreach ($meta_box_page_styles_blur_portfolio['fields'] as $field) {
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
	//	Additional Thumb
	//--------------------------------------------------------------
	foreach ($meta_box_thumb['fields'] as $field) {
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
	//	Portfolio
	//--------------------------------------------------------------
	foreach ($meta_box_portfolio['fields'] as $field) {
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
	//	Image
	//--------------------------------------------------------------
	foreach ($meta_box_portfolio_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		if (isset($_REQUEST[ $field['id'] ])) {
		$new = $_POST[$field['id']];
		}
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}


	//--------------------------------------------------------------
	//	Portfolio Gallery
	//--------------------------------------------------------------
	foreach ($meta_box_portfolio_gallery['fields'] as $field) {
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
	//	Portfolio Video
	//--------------------------------------------------------------
	foreach ($meta_box_portfolio_video['fields'] as $field) {
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


/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/
 
function tva_admin_scripts_portfolio() {
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'thickbox' );
	wp_register_script( 'tva-upload', get_template_directory_uri() . '/functions/js/upload-button.js', array( 'jquery', 'media-upload', 'thickbox' ));
	wp_enqueue_script( 'tva-upload' );
	wp_enqueue_script( 'color-picker', get_template_directory_uri() . '/functions/js/colorpicker.js', array( 'jquery' ));
}

function tva_admin_styles_portfolio() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'color-picker', get_template_directory_uri() . '/functions/css/colorpicker.css');
}

add_action( 'admin_print_scripts', 'tva_admin_scripts_portfolio' );
add_action( 'admin_print_styles', 'tva_admin_styles_portfolio' );


//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
?>