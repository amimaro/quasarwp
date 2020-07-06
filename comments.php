<?php include(get_template_directory() . '/components/comments/custom-comments.php'); ?>

<div id="comments" class="comments-area">

	<?php if (have_comments()) : ?>
		<q-separator class="q-my-xl"></q-separator>

		<?php include(get_template_directory() . '/components/comments/btn-post.php'); ?>

		<p class="q-pt-md text-h3 text-weight-light">
			<?php esc_attr_e('Comments', 'quasarwp') ?>
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

	<?php endif;
	?>

	<?php if (!have_comments()) : ?>
		<!-- <p class="q-py-md text-h6 text-weight-light">
			<?php esc_attr_e('No Comments', 'quasarwp') ?>
		</p> -->

		<q-separator class="q-my-xl"></q-separator>

		<?php include(get_template_directory() . '/components/comments/btn-post.php'); ?>
	<?php endif; ?>

	<?php include(get_template_directory() . '/components/comments/form.php'); ?>

</div>
