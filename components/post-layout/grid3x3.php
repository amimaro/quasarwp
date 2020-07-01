<q-card class="hover-scale grid-3x3-item cursor-pointer" @click="quasarwpRouteTo('<?php the_permalink(); ?>')">
  <?php if (has_post_thumbnail()) : ?>
  <q-img src="<?php the_post_thumbnail_url('smallest'); ?>" :ratio="4/3" alt=""></q-img>
  <?php endif ?>
  <q-card-section>
    <div class="text-h6">
      <?php the_title(); ?>
      <div class="text-caption qwp-home-post-author">
        <?php _e('by') ?> <?php the_author(); ?>
      </div>
    </div>
  </q-card-section>

  <q-card-section class="q-pt-none qwp-home-post-excerpt">
    <?php the_excerpt(''); ?>
  </q-card-section>

  <br>
  <q-card-actions align="between" class="absolute-bottom">
    <div class="text-caption qwp-home-post-commentcounter">
      <?php
        $commentsText = __('Comments');
        $commentsCount =  get_comments_number(get_post()->ID);
        printf(_n('%s Comment', '%s Comments', $commentsCount), $commentsCount);
        ?>
    </div>
    <div class="text-caption qwp-home-post-postdate">
      <?php echo get_the_date(); ?>
    </div>
  </q-card-actions>
</q-card>
