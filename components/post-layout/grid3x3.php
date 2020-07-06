<q-card class="hover-scale qwp-home-post-card qwp-grid-3x3-item cursor-pointer" @click="quasarwpRouteTo('<?php the_permalink(); ?>')">
  <?php if (has_post_thumbnail()) : ?>
  <q-img src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt="" class="qwp-home-featured-img"></q-img>
  <?php endif ?>
  <q-card-section>
    <div class="text-h6">
      <?php the_title(); ?>
      <div class="text-caption qwp-home-author">
        <?php esc_attr_e('by', 'quasarwp') ?> <?php the_author(); ?>
      </div>
    </div>
  </q-card-section>

  <q-card-section class="q-pt-none qwp-home-excerpt">
    <?php the_excerpt(''); ?>
  </q-card-section>

  <br>
  <q-card-actions align="between" class="absolute-bottom">
    <div class="text-caption qwp-home-commentcounter">
      <?php
        $commentsText = __('Comments', 'quasarwp');
        $commentsCount =  get_comments_number(get_post()->ID);
        printf(_n('%s Comment', '%s Comments', $commentsCount, 'quasarwp'), $commentsCount);
        ?>
    </div>
    <div class="text-caption qwp-home-postdate">
      <?php echo get_the_date(); ?>
    </div>
  </q-card-actions>
</q-card>
