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
                  <?php if (isset($setting['posts-show-comments-counter'])) { ?>
                    <div class="text-caption">
                      <a href="#comments">
                        <?php
                        $commentsText = __('Comments');
                        $commentsCount =  get_comments_number(get_post()->ID);
                        printf(_n('%s Comment', '%s Comments', $commentsCount), $commentsCount);
                        ?>
                      </a>
                    </div>
                  <?php } ?>
                  <?php if (isset($setting['posts-show-date'])) { ?>
                    <div class="text-caption"><?php echo get_the_date(); ?></div>
                  <?php } ?>
                </div>

                <?php if (isset($setting['posts-show-author'])) { ?>
                  <div class="text-caption">
                    <?php _e('by') ?> <?php the_author(); ?>
                  </div>
                <?php } ?>

                <q-separator class="q-my-lg"></q-separator>

                <?php if (has_post_thumbnail() && isset($setting['posts-show-featured-img'])) : ?>
                  <div align="center">
                    <q-img src="<?php the_post_thumbnail_url('largest'); ?>" alt="" style="max-width: 900px; max-height: 300px"></q-img>
                  </div>
                <?php endif ?>

                <?php include(get_template_directory() . '/components/quasarwp-social.php'); ?>

                <div class="q-pt-lg">
                  <?php the_content(); ?>
                </div>

                <?php if (isset($setting['posts-show-comments'])) { ?>
                  <div>
                    <?php
                    if (comments_open() || get_comments_number()) :
                      comments_template();
                    endif; ?>
                  </div>
                <?php } ?>

            <?php endwhile;
            endif; ?>
          </div>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
