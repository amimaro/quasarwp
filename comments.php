<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required())
	return;

function better_comments($comment, $args, $depth)
{
	// Get correct tag used for the comments
	if ('div' === $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID() ?>" style="list-style-type: none; padding: 20px 0 20px 0">

		<!-- // case 'trackback':  -->
		<!-- <div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e('Pingback:', 'textdomain'); ?></span> <?php comment_author_link(); ?></div> -->

		<q-card>
			<q-card-section>
				<?php
				if ('div' != $args['style']) { ?>
					<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
					<?php } ?>

					<div class="comment-author vcard">
						<?php
						// Display avatar unless size is set to 0
						if ($args['avatar_size'] != 0) {
							$avatar_size = !empty($args['avatar_size']) ? $args['avatar_size'] : 70; // set default avatar size
							echo '<q-avatar class="q-mr-md">';
							echo get_avatar($comment, $avatar_size);
							echo '</q-avatar>';
						}

						// Display author name
						printf(__('%s', 'textdomain'), get_comment_author()); ?>
						<!-- printf(__('%s', 'textdomain'), get_comment_author_link()); ?> -->
					</div><!-- .comment-author -->

					<div class="comment-details">

						<div class="q-py-md">
							<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->

							<?php
							// Display comment moderation text
							if ($comment->comment_approved == '0') { ?>
								<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.'); ?></em><br />
							<?php	} ?>
						</div>

						<div class="row justify-between">
							<div class="reply">
								<?php

								if (empty($comment->comment_author)) {
									$author = '';
								} else {
									$author = $comment->comment_author;
								}
								$args['reply_text'] = __('Reply') . ' ' . $author;

								// Display comment reply link
								// comment_reply_link(array_merge($args, array(
								// 	'add_below' => $add_below,
								// 	'depth'     => $depth,
								// 	'max_depth' => $args['max_depth']
								// ))); 
								?>
								<q-btn flat dense label="<?php echo $args['reply_text']; ?>" onclick="replyComment(<?php comment_ID() ?>)"></q-btn>
							</div>
							<div class="comment-meta commentmetadata">
								<!-- <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"> -->
								<?php
								/* translators: 1: date, 2: time */
								printf(
									__('%1$s · %2$s', 'textdomain'),
									get_comment_date(),
									get_comment_time()
								); ?>
								<!-- </a> -->
								<!-- <?php edit_comment_link(__('(Edit)', 'textdomain'), '  ', ''); ?> -->
							</div><!-- .comment-meta -->
						</div>

					</div><!-- .comment-details -->

					<?php
					if ('div' != $args['style']) { ?>
						<!-- end tag -->
					</div>
			</q-card-section>
		</q-card>
<?php }
				}
?>

<q-separator class="q-my-xl"></q-separator>

<div id="comments" class="comments-area">

	<?php if (have_comments()) : ?>
		<p class="q-py-md text-h3 text-weight-light">
			<?php _e('Comments') ?>
		</p>

		<ul class="comment-list" style="list-style-type: none">
			<?php
			$args = [
				'style'       => 'li',
				'format'      => 'html5',
				'short_ping'  => true,
			];
			if (function_exists('better_comments')) {
				$args['format'] = 'wpse';
				$args['callback'] = 'better_comments';
			}
			wp_list_comments($args);
			?>
		</ul>

		<?php if (!comments_open() && get_comments_number()) : ?>
			<p class="no-comments"><?php _e('Comments are closed.', 'quasarwp'); ?></p>
		<?php endif; ?>

	<?php endif;
	?>

	<q-separator class="q-my-md"></q-separator>

	<?php if (is_user_logged_in()) { ?>
		<?php $displayName = wp_get_current_user()->display_name; ?>

		<div id="respond" class="comment-respond">
			<p id="reply-title" class="comment-reply-title q-py-md text-h4 text-weight-light">
				<?php _e('Leave a Comment') ?>
			</p>

			<q-form ref="commentForm" id="commentform" class="comment-form q-gutter-xl" @submit="quasarwpOnSubmitComment" @reset="quasarwpOnReset">
				<p class="logged-in-as">
					<?php printf(__('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'), get_edit_user_link(), sprintf(__('Logged in as %s. Edit your profile.'), $displayName), $displayName, wp_logout_url('/')) ?>
				</p>
				<p class="comment-form-comment">
					<q-input id="comment" name="comment" v-model="comment" label="<?php echo _x('Comment', 'noun'); ?>" maxlength="10000" autogrow :rules="[val => !!val || '<?php _e('Comment is required.') ?>']"></q-input>
				</p>
				<div>
					<q-btn type="submit" label="<?php _e('Post Comment'); ?>" color="primary" class="submit"></q-btn>
					<?php echo get_comment_id_fields(get_post()->ID); ?>
					<q-btn label="<?php _e('Clear'); ?>" type="reset" color="primary" flat class="q-ml-sm"></q-btn>
				</div>
				<p class="comment-notes text-caption"><span id="email-notes"><?php _e('Your email address will not be published.'); ?></span>
					<br>
					<?php printf(__('Required fields are marked %s'), '*'); ?>
				</p>
			</q-form>
		</div>
	<?php } else { ?>
		<div id="respond" class="comment-respond">
			<p id="reply-title" class="comment-reply-title q-py-md text-h4 text-weight-light">
				<?php _e('Leave a Comment') ?>
			</p>

			<q-form ref="commentForm" id="commentform" class="comment-form q-gutter-xl" @submit="quasarwpOnSubmitComment" @reset="quasarwpOnReset">
				<p class="comment-form-author">
					<q-input id="author" name="author" v-model="author" label="<?php _e('Name'); ?>" maxlength="245" :rules="[val => !!val || '<?php _e('Sorry, that username is not allowed.'); ?>']"></q-input>
				</p>
				<p class="comment-form-email">
					<q-input id="email" name="email" v-model="email" label="<?php _e('Email'); ?>" maxlength="100" :rules="[val => !!val || '<?php _e('A valid email address is required.'); ?>']"></q-input>
				</p>
				<p class="comment-form-comment">
					<q-input id="comment" name="comment" v-model="comment" label="<?php echo _x('Comment', 'noun'); ?>" maxlength="10000" autogrow :rules="[val => !!val || '<?php _e('Comment is required.'); ?>']"></q-input>
				</p>
				<div>
					<q-btn type="submit" label="<?php _e('Post Comment'); ?>" color="primary" class="submit"></q-btn>
					<?php echo get_comment_id_fields(get_post()->ID); ?>
					<q-btn label="<?php _e('Clear'); ?>" type="reset" color="primary" flat class="q-ml-sm"></q-btn>
				</div>
				<p class="comment-notes text-caption"><span id="email-notes"><?php _e('Your email address will not be published.'); ?></span>
					<br>
					<?php printf(__('Required fields are marked %s'), '*'); ?>
				</p>
			</q-form>
		</div>
	<?php } ?>

</div>

<script>
	const replyComment = function(commentId) {
		document.location.href = `<?php echo the_permalink(); ?>?replytocom=${commentId}#respond`
	}
	const submitComment = function() {
		console.log(this.$refs)
		// document.getElementById('commentform').submit()
	}

	function submitAction() {
		document.commentform.btnSubmit();
	}
</script>
