<?php

global $current_user,$post;

/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="reviews" class="col-sm-6 col-sm-offset-3">

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			Recent Reviews			
		</h4>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Reviews are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>

	<?php

	

	$args = array('user_id' => $current_user->ID,'post_id' => $post->ID);
	$usercomment = get_comments($args);
	if(count($usercomment) >= 1){
		//echo 'disabled';
	} else {
			comment_form( array(
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
			'title_reply' => 'Leave a Review'
		) );
	}

	
	?>

</div><!-- .comments-area -->
