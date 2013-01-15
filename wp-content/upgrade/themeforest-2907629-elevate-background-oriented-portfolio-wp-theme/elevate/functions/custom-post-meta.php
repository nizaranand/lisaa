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

$meta_box_page_styles_post = array(
	'id' 		=> 'tva-content-box-page-styles-post',
	'title' 	=>  __( 'Page Specific Style Options', 'tva' ),
	'page'		=> 'post',
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

$meta_box_page_styles_blur_post = array(
	'id' 		=> 'tva-content-box-page-styles-blur-post',
	'title' 	=>  __( 'Page Specific Style Options &#187; Blur', 'tva' ),
	'page'		=> 'post',
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


//--------------------------------------------------------------
//	Link
//--------------------------------------------------------------

$meta_box_link = array(
	'id' 		=> 'tva-meta-box-link',
	'title' 	=>  __( 'Link Settings', 'tva' ),
	'page'		=> 'post',
	'context' 	=> 'normal',
	'priority'	=> 'high',
	'fields' 	=> array(

		array(	
			'name'		=> __( 'The URL', 'tva' ),
			'desc'		=> __( 'Insert the URL you wish to link to.', 'tva' ),
			'id'		=> $prefix."link_url",
			'std'		=> '',
			'type'		=> 'text'
		),

	),
	
);


//--------------------------------------------------------------
//	Quote
//--------------------------------------------------------------

$meta_box_quote = array(
	'id' 		=> 'tva-meta-box-quote',
	'title' 	=>  __( 'Quote Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields'	 => array(

		array(	
			'name'		=> __( 'The Quote', 'tva' ),
			'desc'		=> __( 'Write your quote in this field.', 'tva' ),
			'id'		=> $prefix.'quote',
			'std'		=> '',
			'type'		=> 'textarea'
		),
		array(	
			'name'		=> __( 'The quoted person', 'tva' ),
			'desc'		=> __( 'Who did you quote?', 'tva' ),
			'id'		=> $prefix."quote_person",
			'std'		=> '',
			'type'		=> 'text'
		),

	),
	
);


//--------------------------------------------------------------
//	Status
//--------------------------------------------------------------

$meta_box_status = array(
	'id' 		=> 'tva-meta-box-status',
	'title' 	=>  __( 'Status Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(

		array(	
			'name'		=> __( 'The Status update', 'tva' ),
			'desc'		=> __( 'Write your status update in this field.', 'tva' ),
			'id'		=> $prefix.'status',
			'std'		=> '',
			'type'		=> 'textarea'
		),

	),
	
);


//--------------------------------------------------------------
//	Image
//--------------------------------------------------------------

$meta_box_image = array(
	'id' 		=> 'tva-meta-box-image',
	'title' 	=>  __( 'Image Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(
	
		array(	
			'name'		=> __( 'Enable Lightbox', 'tva' ),
			'desc'		=> __( 'Check this to enable to open your image in a pretty lightbox.', 'tva' ),
			'id'		=> $prefix.'image_enable_lightbox',
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
			'id'		=> $prefix.'image_enable_caption',
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
//	Gallery
//--------------------------------------------------------------

$meta_box_gallery = array(
	'id' 		=> 'tva-meta-box-gallery',
	'title' 	=>  __( 'Gallery Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(

		array(	
			'name'		=> __( 'Gallery Animation', 'tva' ),
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
			'name'		=> __( 'Gallery Slideshow', 'tva' ),
			'desc'		=> __( 'Select wether the gallery should be an automated slideshow or not. Default is set to true.', 'tva' ),
			'id'		=> $prefix . 'gallery_slideshow',
			'type'		=> 'select',
			'std'		=> 'true',
			'options'	=> array(
							'true',
							'false'
						)
		),

	),
	
);


//--------------------------------------------------------------
//	Audio
//--------------------------------------------------------------

$meta_box_audio = array(
	'id' 		=> 'tva-meta-box-audio',
	'title' 	=>  __( 'Audio Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(

		array(	
			'name'		=> __( 'MP3 File URL', 'tva' ),
			'desc'		=> __( 'The URL to the .mp3 audio file', 'tva' ),
			'id'		=> $prefix.'audio_mp3',
			'std'		=> '',
			'type'		=> 'text'
		),
		array(	
			'name'		=> __( 'Slider speed', 'tva' ),
			'desc'		=> __( 'Set the slider speed. ', 'tva' ),
			'id'		=> $prefix.'audio_ogg',
			'std'		=> '',
			'type'		=> 'text'
		),
			
	),
	
);


//--------------------------------------------------------------
//	Video
//--------------------------------------------------------------

$meta_box_video = array(
	'id' 		=> 'tva-meta-box-video',
	'title' 	=>  __( 'Video Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields'	=> array(

		array(	
			'name'		=> __( 'M4V File URL', 'tva'),
			'desc'		=> __( 'The URL to the .m4v video file', 'tva' ),
			'id'		=> $prefix.'custom_video_m4v',
			'std'		=> '',
			'type'		=> "text"
		),
		array(	
			'name'		=> __( 'OGV File URL', 'tva' ),
			'desc'		=> __( 'The URL to the .ogv video file', 'tva' ),
			'id'		=> $prefix.'custom_video_ogv',
			'std'		=> '',
			'type'		=> "text"
		),
		array( 	
			'name'		=> __( 'Embed Code', 'tva' ),
			'desc'		=> __( 'If you\'re using an embed code, you can include it here. Width should be set to 726px, height can be any value.', 'tva' ),
			'id'		=> $prefix.'video_embed',
			'std'		=> '',
			'type'		=> 'textarea'
		),

	),
	
);


//--------------------------------------------------------------
//	Chat
//--------------------------------------------------------------

$meta_box_chat = array(
	'id' 		=> 'tva-meta-box-chat',
	'title' 	=>  __( 'Chat Settings', 'tva' ),
	'page' 		=> 'post',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(

		array(
			'name'		=> __( 'The Chat', 'tva' ),
			'desc'		=> __( 'Put your chat in this field. Turn it into a list for some nice mark-up.', 'tva' ),
			'id'		=> $prefix.'chat',
			'std'		=> '',
			'type'		=> 'textarea'
		),

	),
	
);

add_action( 'admin_menu', 'tva_add_box' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Add a metabox to edit page
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_add_box() {
	global $meta_box_page_styles_post, $meta_box_page_styles_blur_post, $meta_box_link, $meta_box_quote, $meta_box_status, $meta_box_image, $meta_box_gallery, $meta_box_audio, $meta_box_video, $meta_box_chat;
 
	add_meta_box($meta_box_page_styles_post['id'], $meta_box_page_styles_post['title'], 'tva_show_box_page_styles_post', $meta_box_page_styles_post['page'], $meta_box_page_styles_post['context'], $meta_box_page_styles_post['priority']);
	add_meta_box($meta_box_page_styles_blur_post['id'], $meta_box_page_styles_blur_post['title'], 'tva_show_box_page_styles_blur_post', $meta_box_page_styles_blur_post['page'], $meta_box_page_styles_blur_post['context'], $meta_box_page_styles_blur_post['priority']);
	add_meta_box($meta_box_link['id'], $meta_box_link['title'], 'tva_show_box_link', $meta_box_link['page'], $meta_box_link['context'], $meta_box_link['priority']);
	add_meta_box($meta_box_quote['id'], $meta_box_quote['title'], 'tva_show_box_quote', $meta_box_quote['page'], $meta_box_quote['context'], $meta_box_quote['priority']);
	add_meta_box($meta_box_status['id'], $meta_box_status['title'], 'tva_show_box_status', $meta_box_status['page'], $meta_box_status['context'], $meta_box_status['priority']);
	add_meta_box($meta_box_image['id'], $meta_box_image['title'], 'tva_show_box_image', $meta_box_image['page'], $meta_box_image['context'], $meta_box_image['priority']);
	add_meta_box($meta_box_gallery['id'], $meta_box_gallery['title'], 'tva_show_box_gallery', $meta_box_gallery['page'], $meta_box_gallery['context'], $meta_box_gallery['priority']);
	add_meta_box($meta_box_audio['id'], $meta_box_audio['title'], 'tva_show_box_audio', $meta_box_audio['page'], $meta_box_audio['context'], $meta_box_audio['priority']);
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'tva_show_box_video', $meta_box_video['page'], $meta_box_video['context'], $meta_box_video['priority']);	
	add_meta_box($meta_box_chat['id'], $meta_box_chat['title'], 'tva_show_box_chat', $meta_box_chat['page'], $meta_box_chat['context'], $meta_box_chat['priority']);	
	
}



//----------------------------------------------------------------------------------------------------------------------------
//
//	Show the fields in meta box
//
//----------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------
//	Page Specific Styles
//--------------------------------------------------------------

function tva_show_box_page_styles_post() {
	global $meta_box_page_styles_post, $post;

	echo '<p style="font-weight: bold; border-bottom: 1px solid #e7e7e7; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your page-specific styles.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles_post['fields'] as $field) {
	
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

			// Checkbox		
			case 'checkbox':

			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';

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

			// Color
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

function tva_show_box_page_styles_blur_post() {
	global $meta_box_page_styles_blur_post, $post;

	echo '<p style="font-weight: bold; border-bottom: 1px solid #e7e7e7; padding: 10px 0 20px 0;">'.__( 'Use the following fields to set-up your page-specific blur styles.', 'tva' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_styles_blur_post['fields'] as $field) {
	
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



//--------------------------------------------------------------
//	Link
//--------------------------------------------------------------

function tva_show_box_link() {
	global $meta_box_link, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_link['fields'] as $field) {
	
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

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Quote
//--------------------------------------------------------------

function tva_show_box_quote() {
	global $meta_box_quote, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_quote['fields'] as $field) {
	
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

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Status
//--------------------------------------------------------------

function tva_show_box_status() {
	global $meta_box_status, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_status['fields'] as $field) {
	
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

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Image
//--------------------------------------------------------------

function tva_show_box_image() {
	global $meta_box_image, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_image['fields'] as $field) {
	
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
//	Gallery
//--------------------------------------------------------------

function tva_show_box_gallery() {
	global $meta_box_gallery, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_gallery['fields'] as $field) {
	
		// Get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
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

			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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
//	Audio
//--------------------------------------------------------------

function tva_show_box_audio() {
	global $meta_box_audio, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_audio['fields'] as $field) {
	
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

		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}



//--------------------------------------------------------------
//	Video
//--------------------------------------------------------------

function tva_show_box_video() {
	global $meta_box_video, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
	
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
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;
			

			// Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display: block; color: #999; font-family: Georgia, Helvetica, Arial; font-size: 0.9em; margin: 2px 0 0 0;">'. $field['desc'].'</span></label></th>',
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
//	Chat
//--------------------------------------------------------------

function tva_show_box_chat() {
	global $meta_box_chat, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tva_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_chat['fields'] as $field) {
	
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

		}

		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}


add_action( 'save_post', 'tva_save_data' );



//----------------------------------------------------------------------------------------------------------------------------
//
//	Save date
//
//----------------------------------------------------------------------------------------------------------------------------

function tva_save_data($post_id) {
	global $meta_box_page_styles_post, $meta_box_page_styles_blur_post, $meta_box_link, $meta_box_quote, $meta_box_status, $meta_box_image, $meta_box_gallery, $meta_box_audio, $meta_box_video, $meta_box_chat;
 
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
	foreach ($meta_box_page_styles_post['fields'] as $field) {
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
	foreach ($meta_box_page_styles_blur_post['fields'] as $field) {
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
	//	Link
	//--------------------------------------------------------------
	foreach ($meta_box_link['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	


	//--------------------------------------------------------------
	//	Quote
	//--------------------------------------------------------------
	foreach ($meta_box_quote['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	


	//--------------------------------------------------------------
	//	Status
	//--------------------------------------------------------------
	foreach ($meta_box_status['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}


	//--------------------------------------------------------------
	//	Gallery
	//--------------------------------------------------------------
	foreach ($meta_box_gallery['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	
	//--------------------------------------------------------------
	//	Image
	//--------------------------------------------------------------
	foreach ($meta_box_image['fields'] as $field) {
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
	//	Audio
	//--------------------------------------------------------------
	foreach ($meta_box_audio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	
	//--------------------------------------------------------------
	//	Video
	//--------------------------------------------------------------
	foreach ($meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}


	//--------------------------------------------------------------
	//	Chat
	//--------------------------------------------------------------
	foreach ($meta_box_chat['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
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

function tva_admin_scripts() {
	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'thickbox' );
	wp_register_script( 'tva-upload', get_template_directory_uri() . '/functions/js/upload-button.js', array( 'jquery', 'media-upload', 'thickbox' ));
	wp_enqueue_script( 'tva-upload' );
	wp_enqueue_script( 'color-picker', get_template_directory_uri() . '/functions/js/colorpicker.js', array('jquery'));
}

function tva_admin_styles() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'color-picker', get_template_directory_uri() . '/functions/css/colorpicker.css');
}

add_action( 'admin_print_scripts', 'tva_admin_scripts' );
add_action( 'admin_print_styles', 'tva_admin_styles' );



//----------------------------------------------------------------------------------------------------------------------------
//	That's all folks! (We can stop rollin´ now)
//----------------------------------------------------------------------------------------------------------------------------
?>