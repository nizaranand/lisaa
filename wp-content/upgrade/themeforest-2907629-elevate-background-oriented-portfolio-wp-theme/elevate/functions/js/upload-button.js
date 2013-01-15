jQuery(document).ready(function() {

	// Page Specific Styles button
	jQuery( '#tva_page_styles_background_image_button' ).click(function() {

		window.send_to_editor = function(html)

		{
			imgurl = jQuery( 'img',html ).attr( 'src' );
			jQuery( '#tva_page_styles_background_image' ).val(imgurl);
			tb_remove();
		}

		post_id = jQuery( '#post_ID' ).val();

		tb_show( '', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
		return false;

	});

	// Additional Thumbnail button
	jQuery( '#tva_portfolio_additional_thumb_button' ).click(function() {

		window.send_to_editor = function(html)

		{
			imgurl = jQuery( 'img',html ).attr( 'src' );
			jQuery( '#tva_portfolio_additional_thumb' ).val(imgurl);
			tb_remove();
		}

		post_id = jQuery( '#post_ID' ).val();

		tb_show( '', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
		return false;

	});

});