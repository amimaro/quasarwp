<q-dialog v-model="qwpDataCommentFormDialog" position="bottom" full-width @hide="qwpHideCommentDialog">
  <q-card>

    <q-card-section class="row items-center q-pb-none">
      <div class="text-h6 comment-reply-title q-py-md text-weight-light" v-if="qwpDataReplyCommentId">
        <?php esc_attr_e('Reply', 'quasarwp') ?> {{qwpDataReplyCommentAuthor}}</div>
      <div class="text-h6 comment-reply-title q-py-md text-weight-light" v-else>
        <?php esc_attr_e('Leave a Comment', 'quasarwp') ?></div>
      <q-space></q-space>
      <q-btn icon="close" flat round dense v-close-popup></q-btn>
    </q-card-section>

    <q-card-section>
      <q-form ref="qwpCommentForm" id="commentform" class="comment-form q-gutter-xl" @reset="qwpCommentFormOnReset" @submit="qwpCommentFormOnSubmit">
        <div id="respond" class="comment-respond">
          <?php echo wp_kses(
            get_comment_id_fields(get_post()->ID),
            array('input' => array(
              'type' => array(),
              'name' => array(),
              'id' => array(),
              'value' => array(),
            ))
          ); ?>
          <?php if (is_user_logged_in()) { ?>
            <p class="logged-in-as">
              <?php
              $displayName = wp_get_current_user()->display_name;
              $loggedInUser = sprintf(
                /* translators: user url, aria-label, username, logout link */
                __('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>', 'quasarwp'),
                get_edit_user_link(),
                /* translators: username */
                sprintf(__('Logged in as %s. Edit your profile.', 'quasarwp'), $displayName),
                $displayName,
                wp_logout_url('/')
              );
              echo wp_kses_post($loggedInUser);
              ?>
            </p>
          <?php } else { ?>
            <p class="comment-form-author">
              <q-input ref="qwpCommentAuthorName" id="author" name="author" v-model="qwpAuthor" label="<?php esc_attr_e('Name', 'quasarwp'); ?>" maxlength="245" :rules="[val => !!val || '<?php esc_attr_e('Sorry, that username is not allowed.', 'quasarwp'); ?>']">
              </q-input>
            </p>
            <p class="comment-form-email">
              <q-input id="email" name="email" v-model="qwpEmail" label="<?php esc_attr_e('Email', 'quasarwp'); ?>" maxlength="100" :rules="[val => !!val || '<?php esc_attr_e('A valid email address is required.', 'quasarwp'); ?>']">
              </q-input>
            </p>
          <?php } ?>
          <p class="comment-form-comment">
            <q-input ref="qwpCommentContent" id="comment" name="comment" v-model="qwpComment" label="<?php echo esc_html(__('Comment', 'quasarwp')); ?>" maxlength="10000" autogrow :rules="[val => !!val || '<?php esc_attr_e('Comment is required.', 'quasarwp'); ?>']"></q-input>
          </p>
          <p class="comment-notes text-caption"><span id="email-notes"><?php esc_attr_e('Your email address will not be published.', 'quasarwp'); ?></span>
            <br>
            <?php
            $requiredFiledsMessage = sprintf(
              /* translators: * */
              __('Required fields are marked %s', 'quasarwp'),
              '*'
            );
            echo esc_html($requiredFiledsMessage);
            ?>
          </p>
          <div class="q-mb-md float-right">
            <q-btn label="<?php esc_attr_e('Clear', 'quasarwp'); ?>" type="reset" color="primary" flat class="q-ml-sm">
            </q-btn>
            <q-btn label="<?php esc_attr_e('Post Comment', 'quasarwp'); ?>" type="submit" color="primary"></q-btn>
          </div>
        </div>
      </q-form>
    </q-card-section>

  </q-card>
</q-dialog>
