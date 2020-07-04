<?php

if (post_password_required())
	return;

function customComments($comment, $args, $depth)
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
								<q-btn flat dense label="<?php echo $args['reply_text']; ?>" @click="qwpReplyComment(<?php comment_ID() ?>)"></q-btn>
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
			if (function_exists('customComments')) {
				$args['format'] = 'wpse';
				$args['callback'] = 'customComments';
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

	<?php include(get_template_directory() . '/components/comments/form.php');?>

</div>
