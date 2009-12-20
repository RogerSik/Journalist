<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'journalist'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'journalist');?><p>
<?php return; } ?>

<!-- You can start editing here. -->

	<!-- TrackBacks/Pings -->
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
	<h3 id="trackbacks"><?php printf(__('%s Trackbacks/Pingbacks', 'journalist'), ping_count('', false));?></h3>
	<ol class="trackbacks">
	<?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
	<br>
	<?php endif; ?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('without comments', 'journalist'),__('with one comment', 'journalist'),__('with % comments', 'journalist'));?> <?php _e('to', 'journalist');?> &#8220;<?php the_title(); ?>&#8221;</h3>

<p class="comment_meta"><?php comments_rss_link(__('Subscribe comments with RSS.', 'journalist')); ?>
<?php if ( pings_open() ) : ?>
	<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack URL.', 'journalist');?></a>
<?php endif; ?>
</p>

	<div class="comment_nav group">
		<div class="alignleft"><?php previous_comments_link();?></div>
		<div class="alignright"><?php next_comments_link();?></div>
	</div>

	<!-- comments -->
	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=journalist_comment'); ?>
	</ol>

	<div class="comment_nav group">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'journalist');?></p>


	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h3 class="reply"><?php comment_form_title(__('Leave a Reply', 'journalist'),__('Leave a Reply to %s', 'journalist')); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'journalist'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'journalist'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'journalist'); ?>"><?php _e('Log out &raquo;', 'journalist'); ?></a></p>

<?php else : ?>

<p><input class="comment" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e('Name', 'journalist');?> <?php if ($req) echo (__('(required)', 'journalist'));?></small></label></p>

<p><input class="comment" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('Mail (will not be published)', 'journalist');?> <?php if ($req) echo (__('(required)', 'journalist'));?></small></label></p>

<p><input class="comment" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'journalist');?></small></label></p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'journalist'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'journalist');?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
