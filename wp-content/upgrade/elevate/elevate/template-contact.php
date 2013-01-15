<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Template Name: Contact Template
//	Template-contact.php
//	The custom template for displaying the contact page.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

	$nameError = '';
	$emailError = '';
	$commentError = '';

	if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		if(!isset($hasError)) {
			$emailTo = $options[ 'contact_email' ];
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
				
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}

	}

get_header(); ?>

	<div id="content" class="page eight columns"><!-- BEGIN #content -->

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>><!-- Begin #post-<?php the_ID(); ?> -->

			<div class="page-content"><!-- BEGIN .page-content -->
				
				<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				
				<div class="entry-content"><!-- BEGIN .entry-content -->
				
					<?php the_post(); ?>

					<?php if(isset($emailSent) && $emailSent == true) { ?>
					<?php $email_thanks = $options[ 'contact_thank_you_message' ]; ?>
					 <div class="thanks">
						<p><?php echo $email_thanks ?></p>
					 </div>

					<?php } else { ?>

					<?php the_content(); ?>

					<?php if(isset($hasError) || isset($captchaError)) { ?>
						<p class="error"><?php printf(__( 'There was an error submitting the form.', 'tva')); ?><p>
					<?php } ?>
					
					<form action="<?php the_permalink(); ?>" id="contactform" method="post">
			
						<div class="form-input-container name">
						<label for="contactName"><?php printf(__( 'Name:', 'tva')); ?></label>
						<div><input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" /></div>
						<?php if($nameError != '') { ?><span class="error"><?php echo $nameError; ?></span><?php } ?>
						</div>

						<div class="form-input-container email">
						<label for="email"><?php printf(__( 'E-mail:', 'tva')); ?></label>
						<div><input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" /></div>
						<?php if($emailError != '') { ?><span class="error"><?php echo $emailError; ?></span><?php } ?>
						</div>

						<div class="form-input-container message">
						<label for="commentsText"><?php printf(__( 'Comments:', 'tva')); ?></label>
						<textarea name="comments" id="commentsText" rows="10" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
						<?php if($commentError != '') { ?><span class="error"><?php echo $commentError; ?></span><?php } ?>
						</div>
						
						<div class="screenReader"><label for="checking" class="screenReader"><?php printf(__( 'If you want to submit this form, do not enter anything in this field.', 'tva')); ?></label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></div>
						
						<div class="form-input-container form-input-container-email">
						<input type="hidden" name="submitted" id="submitted" value="true" />
						<input name="submit" type="submit" id="submit-button" value="<?php printf(__( 'Send E-mail', 'tva')); ?>">
						</div>
						
					</form>
					<?php } ?>
				
				</div><!-- END .entry-content -->

			</div><!-- END .page-content -->
			
		</article><!-- END #post-<?php the_ID(); ?> -->

	</div><!-- END #content -->

<?php get_footer(); ?>