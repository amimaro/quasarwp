<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>

<body <?php body_class(); ?>>
  <div id="q-app" <?php if (isset($setting['show-loading'])) { ?>style="visibility: hidden;" <?php } ?>>
    <q-layout view="<?php echo $setting['layout']; ?>">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <q-page-container>
        <q-page padding>

          <div class="q-px-xl">

            <p class="text-h3 q-pt-md"><?php the_title() ?></p>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="row justify-between">
              <div class="text-caption qwp-single-commentcounter">
                <a href="#comments">
                  <?php
                      $commentsText = __('Comments');
                      $commentsCount =  get_comments_number(get_post()->ID);
                      printf(_n('%s Comment', '%s Comments', $commentsCount), $commentsCount);
                      ?>
                </a>
              </div>
              <div class="text-caption qwp-single-postdate"><?php echo get_the_date(); ?></div>
            </div>

            <div class="text-caption qwp-single-author">
              <?php _e('by') ?> <?php the_author(); ?>
            </div>

            <q-separator class="q-my-lg"></q-separator>

            <?php if (has_post_thumbnail()) : ?>
            <div align="center" class="qwp-single-featured-image">
              <q-img src="<?php the_post_thumbnail_url('largest'); ?>" alt="" class="post-featured-img"></q-img>
            </div>
            <?php endif ?>

            <div class="qwp-single-social">
              <?php include(get_template_directory() . '/components/quasarwp-social.php'); ?>
            </div>

            <div class="q-pt-lg">
              <?php the_content(); ?>
            </div>

            <div class="qwp-single-comments">
              <?php
                    if (comments_open() || get_comments_number()) :
                      comments_template();
                    endif; ?>
            </div>

            <?php endwhile;
            endif; ?>
          </div>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
