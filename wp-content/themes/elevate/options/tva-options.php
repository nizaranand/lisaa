<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	TVA-options.php
// 	Here we have all our custom theme-options for this theme.
//
//	Require the framework class before doing anything else, so we can use the defined urls and dirs
//	Also if running on windows you may have url problems, which can be fixed by defining the framework url first
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
//		define('NHP_OPTIONS_URL', site_url('path the options folder'));
//----------------------------------------------------------------------------------------------------------------------------

if(!class_exists( 'NHP_Options' )){
	get_template_part( '/options/options' );
}

//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
//	Simply include this function in the child themes functions.php file.
//	
//	NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
//	get_template_directory_uri() if you want to use any of the built in icons
//
//----------------------------------------------------------------------------------------------------------------------------

function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __( 'A Section added by hook', 'tva' ),
				'desc' => __( '<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'tva' ),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');



//----------------------------------------------------------------------------------------------------------------------------
//
//	Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
//
//----------------------------------------------------------------------------------------------------------------------------

function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');



//----------------------------------------------------------------------------------------------------------------------------
//
//	This is the meat of creating the optons page
//
//	Override some of the default values, uncomment the args and change the values
//	- no $args are required, but there there to be over ridden if needed.
//
//----------------------------------------------------------------------------------------------------------------------------

function setup_framework_options(){
$args = array();


//----------------------------------------------------------------------------------------------------------------------------
//	Set it to dev mode to view the class settings/info in the form - default is false
//----------------------------------------------------------------------------------------------------------------------------

$args['dev_mode'] = false;


//----------------------------------------------------------------------------------------------------------------------------
//	google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//----------------------------------------------------------------------------------------------------------------------------

$args['google_api_key'] = 'AIzaSyAeHT9Co5vns1Ik8xy2HaA_0rnQO1Hqalc';


//----------------------------------------------------------------------------------------------------------------------------
//	Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//----------------------------------------------------------------------------------------------------------------------------

//$args['stylesheet_override'] = true;


//----------------------------------------------------------------------------------------------------------------------------
//	Add HTML before the form
//----------------------------------------------------------------------------------------------------------------------------

$args['intro_text'] = __( '<p>Welcome to the Theme Options: you can customize your theme to your liking!</p>', 'tva' );


//----------------------------------------------------------------------------------------------------------------------------
//	Setup custom links in the footer for share icons
//----------------------------------------------------------------------------------------------------------------------------

//$args['share_icons']['twitter'] = array(
										//'link' => 'http://twitter.com/tienvooracht',
										//'title' => 'Folow me on Twitter', 
										//'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
										//);

										
//----------------------------------------------------------------------------------------------------------------------------
//	Choose to disable the import/export feature
//----------------------------------------------------------------------------------------------------------------------------

$args['show_import_export'] = true;


//----------------------------------------------------------------------------------------------------------------------------
//	Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
//----------------------------------------------------------------------------------------------------------------------------

$args['opt_name'] = 'tva';


//----------------------------------------------------------------------------------------------------------------------------
//	Custom menu icon
//----------------------------------------------------------------------------------------------------------------------------

//$args['menu_icon'] = '';


//----------------------------------------------------------------------------------------------------------------------------
//	Custom menu title for options page - default is "Options"
//----------------------------------------------------------------------------------------------------------------------------

$args['menu_title'] = __( 'Theme Options', 'tva' );


//----------------------------------------------------------------------------------------------------------------------------
//	Custom Page Title for options page - default is "Options"
//----------------------------------------------------------------------------------------------------------------------------

$args['page_title'] = __( 'Elevate Theme Options', 'tva' );


//----------------------------------------------------------------------------------------------------------------------------
//	Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
//----------------------------------------------------------------------------------------------------------------------------

$args['page_slug'] = 'tva_theme_options';


//----------------------------------------------------------------------------------------------------------------------------
//	Custom page capability - default is set to "manage_options"
//----------------------------------------------------------------------------------------------------------------------------

//$args['page_cap'] = 'manage_options';


//----------------------------------------------------------------------------------------------------------------------------
//	page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//----------------------------------------------------------------------------------------------------------------------------

//$args['page_type'] = 'submenu';


//----------------------------------------------------------------------------------------------------------------------------
//	parent menu - default is set to "themes.php" (Appearance)
//	the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//----------------------------------------------------------------------------------------------------------------------------

//$args['page_parent'] = 'themes.php';


//----------------------------------------------------------------------------------------------------------------------------
//	custom page location - default 100 - must be unique or will override other items
//----------------------------------------------------------------------------------------------------------------------------

$args['page_position'] = 27;


//----------------------------------------------------------------------------------------------------------------------------
//	Custom page icon class (used to override the page icon next to heading)
//----------------------------------------------------------------------------------------------------------------------------

//$args['page_icon'] = 'icon-themes';


//----------------------------------------------------------------------------------------------------------------------------
//	Want to disable the sections showing as a submenu in the admin? uncomment this line
//----------------------------------------------------------------------------------------------------------------------------

//$args['allow_sub_menu'] = false;


	// Pull all the pages into an array
	$options_pages 			= array();  
	$options_pages_obj 		= get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] 		= 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->guid] = $page->post_title;
	}


//----------------------------------------------------------------------------------------------------------------------------
//	Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition
//----------------------------------------------------------------------------------------------------------------------------
		
$args['help_tabs'][] = array(
							'id'			=> 'nhp-opts-1',
							'title'			=> __( '', 'tva' ),
							'content'		=> __( '', 'tva' )
						);

$args['help_tabs'][] = array(
							'id'			=> 'nhp-opts-2',
							'title'			=> __( '', 'nhp-opts' ),
							'content'		=> __( '', 'tva' )
						);

							
//----------------------------------------------------------------------------------------------------------------------------
//	Set the Help Sidebar for the options page - no sidebar by default
//----------------------------------------------------------------------------------------------------------------------------
							
$args['help_sidebar'] = __( '', 'tva' );



//----------------------------------------------------------------------------------------------------------------------------
//	General
//----------------------------------------------------------------------------------------------------------------------------
	
$sections[] = array(
				'title'			=> __( 'General settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several General settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/general.png',
				'fields' => array(

					// Heading
					array(
						'id'			=> 'Heading',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Heading settings</p>', 'tva' )
					),

					array(
						'id'				=> 'custom_css',
						'type'				=> 'textarea',
						'title'				=> __( 'Custom CSS', 'tva' ), 
						'sub_desc'			=> __( 'Quickly add some custom CSS to your theme.', 'tva' ),
						'desc'				=> '',
						'validate'			=> 'html',
						'std'				=> ''
					),

					array(
						'id'				=> 'google_analytics_code',
						'type'				=> 'textarea',
						'title'				=> __( 'Google Analytics code', 'tva' ), 
						'sub_desc'			=> __( 'Paste your Google Analytics tracking code here. It will be inserted before the closing header tag.', 'tva' ),
						'desc'				=> '',
						'validate'			=> 'html',
						'std'				=> ''
					),


					// Header
					array(
						'id'			=> 'Header',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Header settings</p>', 'tva' )
					),

					array(
						'id'			=> 'text_only_logo',
						'type'			=> 'button_set',
						'title'			=> __( 'Text ony logo', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a plain text logo rather than an image.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'disable'
					),				
	
					array(
						'id'			=> 'custom_logo',
						'type'			=> 'upload',
						'title'			=> __( 'Custom Logo', 'tva' ), 
						'sub_desc'		=> __( 'Upload your custom logo.', 'tva' ),
						'desc'			=> ''
					),

					array(
						'id'			=> 'custom_favicon',
						'type'			=> 'upload',
						'title'			=> __( 'Custom favicon', 'tva' ), 
						'sub_desc'		=> __( 'Upload a 16px x 16px Png/Gif/Ico image that will represent your websites favicon.', 'tva' ),
						'desc'			=> ''
					),
					
					array(
						'id'			=> 'custom_tagline',
						'type'			=> 'text',
						'title'			=> __( 'Custom tagline', 'tva' ), 
						'sub_desc'		=> __( 'Enter a custom tagline. This will override the WordPress native tagline.', 'tva' ),
						'desc'			=> '',
						'std'			=> ''
					),


					// Sidebar
					array(
						'id'			=> 'Sidebar',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Sidebar settings</p>', 'tva' )
					),

					array(
						'id'			=> 'navigation_sticky',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Sticky Sidebar', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "sticky" Sidebar. Its disabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					
					// Footer
					array(
						'id'			=> 'Footer',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Footer settings</p>', 'tva' )
					),

					array(
						'id'			=> 'footer_copyright_setup',
						'type'			=> 'select_hide_below',
						'title'			=> __( 'Footer copyright text set-up', 'tva' ), 
						'sub_desc'		=> __( 'Choose how to set-up the Footer copyright text.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'setup_tagline'		=> array( 'name' => 'Tagline', 'allow'		=> 'false' ),
											'setup_custom'		=> array( 'name' => 'Custom', 'allow' 		=> 'true' ),
											'disable'			=> array( 'name' => 'Disable', 'allow'		=> 'false' )
										),
						'std'			=> 'setup_tagline'
					),

					array(
						'id'			=> 'footer_copyright_custom',
						'type'			=> 'editor',
						'title'			=> __( 'Footer copyright Text', 'tva' ), 
						'sub_desc'		=> __( 'Additional text to the already built in copyright notice. Leave blank for the WordPress tagline.', 'tva' ),
						'desc'			=> __( 'Leave blank for the WordPress tagline.', 'tva' ),
						'validate'		=> 'html',
						'std'			=> ''
					),

					array(
						'id'			=> 'footer_wordpress_copyright_enable',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable WordPress copyright', 'tva' ), 
						'sub_desc'		=> __( 'Check to enable the WordPress copyright in the footer.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),
					
					array(
						'id'			=> 'footer_links',
						'type'			=> 'editor',
						'title'			=> __( 'Footer links', 'tva' ), 
						'sub_desc'		=> __( 'Add custom content to your footer, some links for example.', 'tva' ),
						'desc'			=> '',
						'validate'		=> 'html',
						'std'			=> ''
					),

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Font & Color
//----------------------------------------------------------------------------------------------------------------------------

$sections[] = array(
				'title'			=> __( 'Font & Color settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Typography settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/typography.png',
				'fields' => array(

					// Custom webfont: Body
					array(
						'id'			=> 'body_custom_webfonts_enable',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/Disable a custom webfont', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable the use of custom webfonts.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'disable'
					),					
					
					array(
						'id'			=> 'body_custom_webfonts',
						'type'			=> 'google_webfonts',
						'title'			=> __( 'Custom webfont', 'tva' ), 
						'sub_desc'		=> __( 'Choose a custom webfont for the body of your website.', 'tva' ),
						'desc'			=> ''		
					),

					array(
						'id'			=> 'body_font_size',
						'type'			=> 'text',
						'title'			=> __( 'Font size', 'tva' ), 
						'sub_desc'		=> __( 'Enter a custom (base) font size. Default is set to 12px.', 'tva' ),
						'desc'			=> __( 'px', 'tva' ),
						'std'			=> '',
						'class'			=> 'small-text'
					),


					// Colors
					array(
						'id'			=> 'Colors',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various colors used throughout the theme.</p>', 'tva' )
					),

					array(
						'id'			=> 'link_color',
						'type'			=> 'color',
						'title'			=> __( 'Custom Link color', 'tva' ), 
						'sub_desc'		=> __( 'Choose a custom color for your links', 'tva' ),
						'desc'			=> __( 'Click the field for the color-picker.', 'tva' ),
						'std'			=> ''
					),

					array(
						'id'			=> 'link_hover_color',
						'type'			=> 'color',
						'title'			=> __( 'Custom Link Hover color', 'tva' ), 
						'sub_desc'		=> __( 'Choose a custom hover color for your links', 'tva' ),
						'desc'			=> __( 'Click the field for the color-picker.', 'tva' ),
						'std'			=> ''
					),
					
					// General Style
					array(
						'id'			=> 'General style',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Style used side-wide.</p>', 'tva' )
					),

					array(
						'id'			=> 'page_style',
						'type'			=> 'select',
						'title'			=> __( 'Page style', 'tva' ), 
						'sub_desc'		=> __( 'Select the page style which is used site-wide but can be overriden per individual post/page/portfolio.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'dark'			=> 'dark',
											'light'			=> 'light'
										),
						'std'			=> 'dark'
					),


					// Accents
					array(
						'id'			=> 'Accents',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Accents used throughout the theme.</p>', 'tva' )
					),

					array(
						'id'			=> 'accents_color',
						'type'			=> 'color',
						'title'			=> __( 'Custom Accent color', 'tva' ), 
						'sub_desc'		=> __( 'Choose a custom color for the various color Accents used throughout the theme.', 'tva' ),
						'desc'			=> __( 'Click the field for the color-picker.', 'tva' ),
						'std'			=> ''
					),

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Background
//----------------------------------------------------------------------------------------------------------------------------

$sections[] = array(
				'title'			=> __( 'Background settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Background settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/background.png',
				'fields' => array(

					// Background
					array(
						'id'			=> 'Body',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Backgrounds settings which can be overriden per individual post/page/portfolio</p>', 'tva' )
					),

					array(
						'id'			=> 'background_color',
						'type'			=> 'color',
						'title'			=> __( 'Background: Color', 'tva' ), 
						'sub_desc'		=> __( 'Choose a background color for your website. This is used as fall back for pages without a custom background color/image.', 'tva' ),
						'desc'			=> __( 'Click the field for the color-picker.', 'tva' ),
						'std'			=> '#222222'
					),

					array(
						'id'			=> 'background_image',
						'type'			=> 'upload',
						'title'			=> __( 'Background: Image', 'tva' ), 
						'sub_desc'		=> __( 'Choose a background image for your website. This is used as fall back for pages without a custom background color/image.', 'tva' ),
						'desc'			=> ''
					),					

					array(
						'id'			=> 'background_repeat',
						'type'			=> 'select',
						'title'			=> __( 'Background: Repeat', 'tva' ), 
						'sub_desc'		=> __( 'Select the background-repeat for the background-image.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											''				=> '',
											'repeat'		=> 'repeat',
											'repeat-x'		=> 'repeat-x',
											'repeat-y'		=> 'repeat-y',
											'no-repeat'		=> 'no-repeat'
										),
						'std'			=> ''
					),

					array(
						'id'			=> 'background_position',
						'type'			=> 'select',
						'title'			=> __( 'Background: Position', 'tva' ), 
						'sub_desc'		=> __( 'Select the background-position for the background-image.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											''					=> '',
											'top left'			=> 'top left',
											'top center'		=> 'top center',
											'top right'			=> 'top right',
											'center left'		=> 'center left',
											'center center'		=> 'center center',
											'center right'		=> 'center right',
											'bottom left'		=> 'bottom left',
											'bottom center'		=> 'bottom center',
											'bottom right'		=> 'bottom right',
											'full screen'		=> 'full screen'
										),
						'std'			=> ''
					),

					array(
						'id'			=> 'background_attachment',
						'type'			=> 'select',
						'title'			=> __( 'Background: Attachment', 'tva' ), 
						'sub_desc'		=> __( 'Select the background-attachment for the background-image.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											''				=> '',
											'scroll'		=> 'scroll',
											'fixed'			=> 'fixed'
										),
						'std'			=> ''
					),

					array(
						'id'			=> 'background_blur',
						'type'			=> 'select',
						'title'			=> __( 'Background: Blur', 'tva' ), 
						'sub_desc'		=> __( 'Want to Blur your background image without editing your image manually? Use Blur.js to blur your background image. Note: only works on full screen background images.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'no'		=> 'no',
											'yes'		=> 'yes'
										),
						'std'			=> ''
					),

					array(
						'id'			=> 'background_blur_radius',
						'type'			=> 'text',
						'title'			=> __( 'Blur: Radius', 'tva' ), 
						'sub_desc'		=> __( 'Enter a blur radius for your blurred background image. It is set to 20 by default.', 'tva' ),
						'desc'			=> __( '', 'tva' ),
						'std'			=> '',
						'class'			=> 'small-text'
					),

					array(
						'id'			=> 'background_blur_overlay_style',
						'type'			=> 'select',
						'title'			=> __( 'Blur: Overlay Style', 'tva' ), 
						'sub_desc'		=> __( 'Select a style for an optional overlay style for your blur.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											''			=> '',
											'darken'	=> 'darken',
											'lighten'	=> 'lighten'
										),
						'std'			=> ''
					),

					array(
						'id'			=> 'background_blur_overlay_opacity',
						'type'			=> 'text',
						'title'			=> __( 'Blur: Overlay Opacity', 'tva' ), 
						'sub_desc'		=> __( 'Enter a value between 0 and 1. Leave blank to disable overlay.', 'tva' ),
						'desc'			=> __( '', 'tva' ),
						'std'			=> '',
						'class'			=> 'small-text'
					),


					// Background
					array(
						'id'			=> 'Body',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Backgrounds settings which can <strong>not</strong> be overriden per individual post/page/portfolio</p>', 'tva' )
					),

					array(
						'id'			=> 'background_technique',
						'type'			=> 'select',
						'title'			=> __( 'Background: Technique', 'tva' ), 
						'sub_desc'		=> __( 'Select the technique you wish to use for full-screen backgrounds.<br /><br /><strong>Note: if you choose to use "image" as background technique you will not be able to use blur.js</strong>', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'div'			=> 'DIV (CSS background-size property)',
											'image	'		=> 'Image (100% x 100%)'
										),
						'std'			=> 'div'
					),

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Portfolio
//----------------------------------------------------------------------------------------------------------------------------
	
$sections[] = array(
				'title'			=> __( 'Portfolio settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Portfolio settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/homepage.png',
				'fields' => array(

					// Portfolio Grid
					array(
						'id'			=> 'Portfolio Grid',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Portfolio Grid settings.</p>', 'tva' )
					),

					array(
						'id'			=> 'portfolio_items',
						'type'			=> 'text',
						'title'			=> __( 'Number of items', 'tva' ), 
						'sub_desc'		=> __( 'Enter the number of Portfolio items to show.', 'tva' ),
						'desc'			=> '',
						'validate'		=> 'numeric',
						'std'			=> '12',
						'class'			=> 'small-text'
					),

					array(
						'id'			=> 'portfolio_navigation_load_more',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Load more Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "Load More" Navigation. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					array(
						'id'			=> 'portfolio_navigation_page',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Page Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "numbered" Page Navigation. Its disabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					array(
						'id'			=> 'portfolio_navigation_float',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Floating Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "left/right" Floating Navigation. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),


					// Portfolio Single
					array(
						'id'			=> 'Portfolio Single',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Portfolio Single settings.</p>', 'tva' )
					),

					array(
						'id'			=> 'portfolio_launch_text',
						'type'			=> 'text',
						'title'			=> __( 'Launch button anchor', 'tva' ), 
						'sub_desc'		=> __( 'Enter a custom "launch project" button anchor text.', 'tva' ),
						'desc'			=> '',
						'std'			=> 'Launch'
					),


					// Related Portfolios
					array(
						'id'			=> 'portfolio_related_enable',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Related Portfolios', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable Related Portfolios for your portfolio items. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					array(
						'id'			=> 'portfolio_related_title',
						'type'			=> 'text',
						'title'			=> __( 'Related posts title', 'tva' ), 
						'sub_desc'		=> __( 'Enter a custom title for the Related Portfolio area.', 'tva' ),
						'desc'			=> '',
						'std'			=> 'You might also like:'
					),

					array(
						'id'			=> 'portfolio_related_description',
						'type'			=> 'editor',
						'title'			=> __( 'Related posts description', 'tva' ), 
						'sub_desc'		=> __( 'Enter an optional description for the Related Portfolios area.', 'tva' ),
						'desc'			=> '',
						'validate'		=> 'html',
						'std'			=> __( 'This description is optional and is editable through the Theme Options.', 'tva' )
					),

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Blog
//----------------------------------------------------------------------------------------------------------------------------
	
$sections[] = array(
				'title'			=> __( 'Blog settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Blog settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/blog.png',
				'fields' => array(	

					// Blog Grid
					array(
						'id'			=> 'Blog Grid',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Blog Grid settings.</p>', 'tva' )
					),

					array(
						'id'			=> 'blog_navigation_load_more',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Load more Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "Load More" Navigation. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					array(
						'id'			=> 'blog_navigation_page',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Page Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "numbered" Page Navigation. Its disabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),

					array(
						'id'			=> 'blog_navigation_float',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Floating Navigation', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable a "left/right" Floating Navigation. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),
					
				
					// Blog Meta
					array(
						'id'			=> 'Blog Meta',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Blog Meta settings.</p>', 'tva' )
					),

					array(
						'id'			=> 'blog_time_notation',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable Time Ago', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable Twitter-like time ago notations. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),					

					array(
						'id'			=> 'blog_post_rating',
						'type'			=> 'button_set',
						'title'			=> __( 'Enable/disable post rating', 'tva' ), 
						'sub_desc'		=> __( 'Choose to enable the post rating system on posts. Its enabled by default.', 'tva' ),
						'desc'			=> '',
						'options'		=> array(
											'enable'	=> 'Enable',
											'disable'	=> 'Disable'
										),
						'std'			=> 'enable'
					),
					

					// Blog Comments & Respond
					array(
						'id'			=> 'Blog Comments & Respond',
						'type'			=> 'info',
						'desc'			=> __( '<p class="description">Here you can set various Blog Comments & Respond settings.</p>', 'tva' )
					),

					array(
						'id'			=> 'blog_comments_description',
						'type'			=> 'editor',
						'title'			=> __( 'Comments description', 'tva' ), 
						'sub_desc'		=> __( 'Enter an optional description for the Comments area.', 'tva' ),
						'desc'			=> '',
						'validate'		=> 'html',
						'std'			=> __( 'This description is optional and is editable through the Theme Options.', 'tva' )
					),

					array(
						'id'			=> 'blog_respond_description',
						'type'			=> 'editor',
						'title'			=> __( 'Respond description', 'tva' ), 
						'sub_desc'		=> __( 'Enter an optional description for the Respond area.', 'tva' ),
						'desc'			=> '',
						'validate'		=> 'html',
						'std'			=> __( 'This description is optional and is editable through the Theme Options.', 'tva' )
					),

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Contact
//----------------------------------------------------------------------------------------------------------------------------
	
$sections[] = array(
				'title'			=> __( 'Contact settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Contact settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/contact.png',
				'fields'		=> array(

					array(
						'id'				=> 'contact_email',
						'type'				=> 'text',
						'title'				=> __( 'E-mail adress', 'tva' ), 
						'sub_desc'			=> __( 'Enter the e-mail adress all e-mails coming through the contact form should be sent to. Leave blank to send all e-mails to the WordPress admin e-mail.', 'tva' ),
						'desc'				=> '',
						'validate'			=> 'email',
						'std'				=> ''
					),

					array(
						'id'				=> 'contact_thank_you_message',
						'type'				=> 'textarea',
						'title'				=> __( 'Thank you message', 'tva' ), 
						'sub_desc'			=> __( 'Enter a thank you message which will be displayed when an e-mail has beed sent.', 'tva' ),
						'desc'				=> '',
						'validate'			=> 'html',
						'std'				=> __( 'Thanks bro, ill get back to you shortly!', 'tva' )
					)

				)

			);



//----------------------------------------------------------------------------------------------------------------------------
//	Social
//----------------------------------------------------------------------------------------------------------------------------
	
$sections[] = array(
				'title'			=> __( 'Social settings', 'tva' ),
				'desc'			=> __( '<p class="description">On this page you can edit several Social settings.</p>', 'tva' ),
				'icon'			=> NHP_OPTIONS_URL.'img/icons/social.png',
				'fields'		=> array(

					array(
						'id'				=> 'social_digg',
						'type'				=> 'text',
						'title'				=> __( 'Digg', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Digg account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_dribbble',
						'type'				=> 'text',
						'title'				=> __( 'Dribbble', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Dribbble account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_facebook',
						'type'				=> 'text',
						'title'				=> __( 'Facebook', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Facebook account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_github',
						'type'				=> 'text',
						'title'				=> __( 'Github', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Github account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_flickr',
						'type'				=> 'text',
						'title'				=> __( 'FlickR', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your FlickR account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_google',
						'type'				=> 'text',
						'title'				=> __( 'Google+', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Google+ account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_linkedin',
						'type'				=> 'text',
						'title'				=> __( 'LinkedIN', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your LinkedIN account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_pinterest',
						'type'				=> 'text',
						'title'				=> __( 'Pinterest', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Pinterest account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_rss',
						'type'				=> 'text',
						'title'				=> __( 'RSS', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your RSS feed', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_skype',
						'type'				=> 'text',
						'title'				=> __( 'Skype', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Skype account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_twitter',
						'type'				=> 'text',
						'title'				=> __( 'Twitter', 'tva' ), 
						'sub_desc'			=> __( 'Enter the URL to your Twitter account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_wordpress',
						'title'				=> __( 'WordPress', 'tva' ), 
						'type'				=> 'text',
						'sub_desc'			=> __( 'Enter the URL to your WordPress account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_vimeo',
						'title'				=> __( 'Vimeo', 'tva' ), 
						'type'				=> 'text',
						'sub_desc'			=> __( 'Enter the URL to your Vimeo account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),
					array(
						'id'				=> 'social_youtube',
						'title'				=> __( 'YouTube', 'tva' ), 
						'type'				=> 'text',
						'sub_desc'			=> __( 'Enter the URL to your YouTube account', 'tva' ),
						'desc'				=> '',
						'std'				=> ''
					),


				)

			);


//----------------------------------------------------------------------------------------------------------------------------
//	Set-up Tabs
//----------------------------------------------------------------------------------------------------------------------------

	$tabs = array();

	if (function_exists( 'wp_get_theme' )){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get( 'ThemeURI' );
		$description = $theme_data->get( 'Description' );
		$author = $theme_data->get( 'Author' );
		$version = $theme_data->get( 'Version' );
		$tags = $theme_data->get( 'Tags' );
	} else {
		$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';

	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/icons/info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);
	
	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}

add_action( 'init', 'setup_framework_options', 0 );


//----------------------------------------------------------------------------------------------------------------------------
//	Custom function for the callback referenced above
//----------------------------------------------------------------------------------------------------------------------------

function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}


//----------------------------------------------------------------------------------------------------------------------------
//	Custom function for the callback validation referenced above
//----------------------------------------------------------------------------------------------------------------------------

function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}

//----------------------------------------------------------------------------------------------------------------------------
//
//	That's all folks! (We can stop rollin´ now)
//
//----------------------------------------------------------------------------------------------------------------------------
?>