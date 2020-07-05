<q-dialog v-model="qwpDataCommentFormDialog" position="bottom" full-width @hide="qwpHideCommentDialog">
  <q-card>

    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6 comment-reply-title q-py-md text-weight-light" v-if="qwpDataReplyCommentId">
        <?php _e('Reply') ?> {{qwpDataReplyCommentAuthor}}</div>
      <div class="text-h6 comment-reply-title q-py-md text-weight-light" v-else><?php _e('Leave a Comment') ?></div>
      <q-space></q-space>
      <q-btn icon="close" flat round dense v-close-popup></q-btn>
    </q-card-section>

    <q-card-section>
      <q-form ref="qwpCommentForm" id="commentform" class="comment-form q-gutter-xl" @reset="qwpCommentFormOnReset"
        @submit="qwpCommentFormOnSubmit">
        <div id="respond" class="comment-respond">
          <?php echo get_comment_id_fields(get_post()->ID); ?>
          <?php if (is_user_logged_in()) { ?>
          <?php $displayName = wp_get_current_user()->display_name; ?>
          <p class="logged-in-as">
            <?php printf(__('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'), get_edit_user_link(), sprintf(__('Logged in as %s. Edit your profile.'), $displayName), $displayName, wp_logout_url('/')) ?>
          </p>
          <?php } else { ?>
          <p class="comment-form-author">
            <q-input ref="qwpCommentAuthorName" id="author" name="author" v-model="qwpAuthor"
              label="<?php _e('Name'); ?>" maxlength="245"
              :rules="[val => !!val || '<?php _e('Sorry, that username is not allowed.'); ?>']"></q-input>
          </p>
          <p class="comment-form-email">
            <q-input id="email" name="email" v-model="qwpEmail" label="<?php _e('Email'); ?>" maxlength="100"
              :rules="[val => !!val || '<?php _e('A valid email address is required.'); ?>']"></q-input>
          </p>
          <?php } ?>
          <p class="comment-form-comment">
            <q-input ref="qwpCommentContent" id="comment" name="comment" v-model="qwpComment"
              label="<?php echo _x('Comment', 'noun'); ?>" maxlength="10000" autogrow
              :rules="[val => !!val || '<?php _e('Comment is required.'); ?>']"></q-input>
          </p>
          <p class="comment-notes text-caption"><span
              id="email-notes"><?php _e('Your email address will not be published.'); ?></span>
            <br>
            <?php printf(__('Required fields are marked %s'), '*'); ?>
          </p>
          <div class="q-mb-md float-right">
            <q-btn label="<?php _e('Clear'); ?>" type="reset" color="primary" flat class="q-ml-sm"></q-btn>
            <q-btn label="<?php _e('Post Comment'); ?>" type="submit" color="primary"></q-btn>
          </div>
        </div>
      </q-form>
    </q-card-section>

  </q-card>
</q-dialog>
