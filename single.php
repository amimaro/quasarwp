<?php
get_header();
?>

<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout :view="qwpDataLayoutView">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <q-page-container>
        <q-page padding class="qwp-post">

          <div class="q-px-sm">

            <p class="text-h3 q-pt-md qwp-post-title"><?php the_title() ?></p>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="row justify-between">
              <div class="text-caption qwp-post-commentcounter">
                <a href="#comments">
                  <?php
                      $commentsText = __('Comments', 'quasarwp');
                      $commentsCount =  get_comments_number(get_post()->ID);
                      printf(_n('%s Comment', '%s Comments', $commentsCount, 'quasarwp'), $commentsCount);
                      ?>
                </a>
              </div>
              <div class="text-caption qwp-post-postdate"><?php echo get_the_date(); ?></div>
            </div>

            <div class="text-caption qwp-post-author">
              <?php esc_attr_e('by', 'quasarwp') ?> <?php the_author(); ?>
            </div>

            <q-separator class="q-my-lg"></q-separator>

            <?php if (has_post_thumbnail()) : ?>
            <div align="center" class="qwp-post-featured-image">
              <q-img src="<?php the_post_thumbnail_url('largest'); ?>" alt="" class="qwp-post-featured-img "></q-img>
            </div>
            <?php endif ?>

            <div class="qwp-post-social">
              <?php include(get_template_directory() . '/components/quasarwp-social.php'); ?>
            </div>

            <div class="q-pt-lg qwp-post-content">
              <?php the_content(); ?>
            </div>

            <div class="qwp-post-comments">
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
