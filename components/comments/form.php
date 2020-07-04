<?php if (is_user_logged_in()) { ?>
  <?php $displayName = wp_get_current_user()->display_name; ?>

  <div id="respond" class="comment-respond">
    <p id="reply-title" class="comment-reply-title q-py-md text-h4 text-weight-light">
      <?php _e('Leave a Comment') ?>
    </p>

    <q-form ref="qwpCommentForm" id="commentform" class="comment-form q-gutter-xl" @submit="quasarwpOnSubmitComment" @reset="quasarwpOnReset">
      <p class="logged-in-as">
        <?php printf(__('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'), get_edit_user_link(), sprintf(__('Logged in as %s. Edit your profile.'), $displayName), $displayName, wp_logout_url('/')) ?>
      </p>
      <p class="comment-form-comment">
        <q-input id="comment" name="comment" v-model="qwpComment" label="<?php echo _x('Comment', 'noun'); ?>" maxlength="10000" autogrow :rules="[val => !!val || '<?php _e('Comment is required.') ?>']"></q-input>
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

    <q-form ref="qwpCommentForm" id="commentform" class="comment-form q-gutter-xl" @submit="quasarwpOnSubmitComment" @reset="quasarwpOnReset">
      <p class="comment-form-author">
        <q-input id="author" name="author" v-model="qwpAuthor" label="<?php _e('Name'); ?>" maxlength="245" :rules="[val => !!val || '<?php _e('Sorry, that username is not allowed.'); ?>']"></q-input>
      </p>
      <p class="comment-form-email">
        <q-input id="email" name="email" v-model="qwpEmail" label="<?php _e('Email'); ?>" maxlength="100" :rules="[val => !!val || '<?php _e('A valid email address is required.'); ?>']"></q-input>
      </p>
      <p class="comment-form-comment">
        <q-input id="comment" name="comment" v-model="qwpComment" label="<?php echo _x('Comment', 'noun'); ?>" maxlength="10000" autogrow :rules="[val => !!val || '<?php _e('Comment is required.'); ?>']"></q-input>
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
