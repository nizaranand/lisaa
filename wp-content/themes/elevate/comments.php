<?php
//----------------------------------------------------------------------------------------------------------------------------
//
//	Comments.php
//	The default template for displaying Comments.
//
//----------------------------------------------------------------------------------------------------------------------------
$options = get_option( 'tva' ); // Make sure we can use our Theme Options

?>
	
	<?php if ( post_password_required() ) : ?>
	<div id="comments"><!-- BEGIN #comments -->
	
		<div class="comments-content">
	
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tva' ); ?></p>
		
		</div>

	</div>
	<?php return; endif; // Stop the rest of comments.php from being processed, but don't kill the script entirely -- we still have to fully load the template. ?>

	<?php if ( have_comments() ) : ?>
	<div id="comments" class="row"><!-- BEGIN #comments -->

		<header class="comments-header"><!-- BEGIN .comments-header -->
	
			<h2 id="comments-title"><?php printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'tva' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h2>
			<?php if ($options[ 'blog_comments_description' ]) { ?>
			<div class="comments-description"><?php echo $options[ 'blog_comments_description' ]; ?></div>
			<?php } ?>
	
		</header><!-- END .comments-header -->

		<div class="comments-content">

		<div class="row"><!-- BEGIN .comments-content -->
		
			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tva_comment' ) ); ?>
			</ol>

		</div><!-- END .comments-content -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tva' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tva' ) ); ?></div>
		</nav>
		<?php endif; ?>
		
		</div>
		
	</div><!-- END #comments -->

	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'tva' ); ?></p>
	<?php endif; ?>
	
	<?php if ( comments_open() ) : ?>
	<div id="respond-wrap" class="row"><!-- BEGIN #respond-wrap -->

		<header class="respond-header"><!-- BEGIN .respond-header -->
		
			<h2 id="respond-title"><?php comment_form_title( __( 'Leave a Comment', 'tva' ), __( 'Leave a Reply to %s', 'tva' ) ); ?></h2>
			<?php if ($options[ 'blog_respond_description' ]) { ?>
			<div class="respond-description"><?php echo $options[ 'blog_respond_description' ]; ?></div>
			<?php } ?>
		
		</header><!-- END .respond-header -->

		<div class="respond-content">

		<?php if(get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
		<p><?php printf(__( 'You must be %1$slogged in%2$s to post a comment.', 'tva' ), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
		<?php else : ?>
		
		<?php
		$comments_args = array(
			'title_reply'			=> null,
			'comment_notes_after'	=> '',
			'cancel_reply_link'		=> ''
		);
		?>
		
		<?php comment_form( $comments_args ); ?>
		
		</div>
		
	</div><!-- END #respond-wrap -->

	<?php endif; ?>
	<?php endif; ?>