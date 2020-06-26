<q-card class="hover-scale grid-3x3-item cursor-pointer" @click="quasarwpRouteTo('<?php the_permalink(); ?>')">
  <?php if (has_post_thumbnail()) : ?>
    <q-img src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt=""></q-img>
  <?php endif ?>
  <q-card-section>
    <div class="text-h6">
      <?php the_title(); ?>
      <?php if (isset($setting['frontpage-show-post-author'])) { ?>
        <div class="text-caption">
          <?php _e('by') ?> <?php the_author(); ?>
        </div>
      <?php } ?>
    </div>
  </q-card-section>

  <?php if (isset($setting['frontpage-show-post-excerpt'])) { ?>
    <q-card-section class="q-pt-none">
      <?php the_excerpt(''); ?>
    </q-card-section>
  <?php } ?>

  <?php if (isset($setting['frontpage-show-post-comments-counter']) || isset($setting['frontpage-show-post-date'])) { ?>
    <br>
    <q-card-actions align="between" class="absolute-bottom">
      <div class="text-caption">
        <?php if (isset($setting['frontpage-show-post-comments-counter'])) { ?>
          <?php
          $commentsText = __('Comments');
          $commentsCount =  get_comments_number(get_post()->ID);
          printf(_n('%s Comment', '%s Comments', $commentsCount), $commentsCount);
          ?>
        <?php } ?>
      </div>
      <div class="text-caption">
        <?php if (isset($setting['frontpage-show-post-date'])) { ?>
          <?php echo get_the_date(); ?>
        <?php } ?>
      </div>
    </q-card-actions>
  <?php } ?>
</q-card>
