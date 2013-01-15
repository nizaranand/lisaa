<form method="get" id="searchform" action="<?php echo home_url(); ?>/"><!-- Begin #searchform -->
	<fieldset>
		<input type="text" name="s" id="s" value="<?php printf(__( 'To search hit enter..', 'tva' )) ?>" onfocus="if(this.value=='<?php printf(__( 'To search hit enter..', 'tva' )) ?>')this.value='';" onblur="if(this.value=='')this.value='<?php printf(__( 'To search hit enter..', 'tva' )) ?>';" />
	</fieldset>
</form><!-- End #searchform -->