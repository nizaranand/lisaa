<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Footer.php
//	The default template for displaying the Footer.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>

	</div>

</section><!-- END #content-wrap -->

<footer id="footer"><!-- BEGIN #footer -->

	<div class="<?php if (is_page_template( 'template-portfolio.php' ) || is_tax() || is_home() || is_archive() || is_search() || is_page_template( 'template-wide.php' ) ) { ?>big<?php } ?> row clearfix">

        <div class="footer">
            Footer div
        </div>

		<div id="copyright" class="left">

		&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>" class="home-url"><?php bloginfo( 'name' ); ?></a>.
			
		<?php if ($options[ 'footer_copyright_setup' ] !== 'disable' ) { ?>

			<?php if ($options[ 'footer_copyright_setup' ] == 'setup_tagline' ) { ?>
			<?php echo get_bloginfo ( 'description' ); ?>

			<?php } else { ?>
			<?php if ($options[ 'footer_copyright_custom' ]) { ?>
			<?php echo $options[ 'footer_copyright_custom' ]; ?>
			<?php } ?>

			<?php } ?>

		<?php } ?>

		<?php if ($options[ 'footer_wordpress_copyright_enable' ] == 'enable' ) { ?>
		<div><?php _e( 'Powered by', 'tva' ) // Yes we do! ?> <a href="http://wordpress.org/">WordPress</a>.</div>
		<?php } ?>

		<?php if ($options[ 'footer_links' ]) { ?>
		<div>

			<?php echo $options[ 'footer_links' ]; ?>

		</div>
		<?php } ?>	

		</div>

	</div>

</footer><!-- END #footer -->

<?php wp_footer(); ?>

</body>
</html>