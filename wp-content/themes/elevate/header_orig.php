<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head <?php language_attributes(); ?>>

<?php
$options 				= get_option( 'tva' ); // Make sure we can use our Theme Options
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

<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" /> 
<?php } ?>

<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noticia+Text' type='text/css' media='all' />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if ($options[ 'custom_css' ]) { ?>

<!-- BEGIN Custom CSS -->
<script type="text/css">
<?php echo $options[ 'custom_css' ]; ?>

</script>
<!-- END Custom CSS -->
<?php } ?>
	
<?php if ( ($options[ 'page_style' ] == 'light' ) || ($style == 'light') ) { ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/styles/light.css">
<?php } ?>

<?php wp_head(); ?>

<?php if ($options[ 'google_analytics_code' ]) { ?>
<!-- BEGIN Google Analytics Code -->
<script type="text/javascript">
<?php echo $options[ 'google_analytics_code' ]; ?>
</script>
<!-- END Google Analytics Code -->
<?php } ?>	

</head>

<body <?php body_class(); ?> id="top">

<?php tva_page_background(); ?>

<?php if (is_page_template( 'template-portfolio.php' ) || is_tax() || is_home() || is_archive() || is_search() ) { ?>
<div id="loading-isotope"></div>
<?php } ?>

<section id="content-wrap" class="container clearfix"><!-- BEGIN #content-wrap -->

	<div class="<?php if (is_page_template( 'template-portfolio.php' ) || is_tax() || is_home() || is_archive() || is_search() || is_page_template( 'template-wide.php' ) ) { ?>big<?php } ?> row">
	
	<div id="sidebar" class="three columns <?php if ($options[ 'navigation_sticky' ] == 'enable' ) {?>sticky-sidebar<?php } ?>"><!-- BEGIN #sidebar -->
	
		<header class="entry-header"><!-- BEGIN .entry-header -->
	
			<div id="logo"><!-- BEGIN #logo -->

				<?php if ($options[ 'text_only_logo' ] == 'enable' ) { ?>
				<?php $heading_tag = ( is_front_page() ) ? 'h1' : 'div'; ?><<?php echo $heading_tag; ?> id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></<?php echo $heading_tag; ?>>
				<?php } elseif ($options[ 'custom_logo' ]) { // Check if we have a custom logo ?>
				<?php $heading_tag = ( is_front_page() ) ? 'h1' : 'div'; ?><<?php echo $heading_tag; ?> id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $options[ 'custom_logo' ] ?>" alt="<?php bloginfo( 'name' ); ?>"/></a></<?php echo $heading_tag; ?>>
				<?php } else { // Appearantly none of the above, so we use our fall-back: logo.png ?>
				<?php $heading_tag = ( is_front_page() ) ? 'h1' : 'div'; ?><<?php echo $heading_tag; ?> id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a></<?php echo $heading_tag; ?>>
				<?php } ?>

			</div><!-- END #logo -->

			<div id="tagline"><!-- BEGIN #tagline -->
			
			<?php if ($options[ 'custom_tagline' ]) { ?>
			<?php echo $options[ 'custom_tagline' ] ?>
			<?php } else { ?>
			<?php bloginfo( 'description' ); ?>
			<?php } ?>
			
			</div><!-- END #tagline -->
			
		</header><!-- END .entry-header -->
	
		<div class="sidebar-content"><!-- BEGIN .sidebar-content -->

			<?php dynamic_sidebar( 'sidebar' ); ?>

			<?php if (is_front_page() ) { ?>
			<?php dynamic_sidebar( 'sidebar-homepage' ); ?>
			<?php } ?>

			<?php if (is_singular( 'portfolio' ) ) { ?>			
			<?php dynamic_sidebar( 'sidebar-portfolio' ); ?>
			<?php } ?>			

			<?php if (is_home() || (is_single() && !is_singular( 'portfolio' ) && !is_front_page() ) || (is_archive() && !is_tax() ) ) { ?>			
			<?php dynamic_sidebar( 'sidebar-blog' ); ?>
			<?php } ?>

			<?php if (is_page() && !is_page_template( 'template-contact.php' ) && !is_page_template( 'template-portfolio.php' ) ) { ?>			
			<?php dynamic_sidebar( 'sidebar-page' ); ?>
			<?php } ?>
			
			<?php if (is_page_template( 'template-contact.php' ) ) { ?>			
			<?php dynamic_sidebar( 'sidebar-contact' ); ?>
			<?php } ?>

		</div><!-- END .sidebar-content -->
		
	</div><!-- END #sidebar -->