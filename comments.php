<?php get_template_part('components/comments/comment', 'custom'); ?>

<div id="comments" class="comments-area">

	<?php if (have_comments()) : ?>
		<q-separator class="q-my-xl"></q-separator>

		<?php get_template_part('components/comments/comment', 'ctabtn'); ?>

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

		<?php get_template_part('components/comments/comment', 'ctabtn'); ?>
	<?php endif; ?>

	<?php get_template_part('components/comments/comment', 'form'); ?>

</div>
