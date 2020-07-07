<?php
get_header();
?>

<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout :view="qwpDataLayoutView">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <q-page-container class="qwp-page">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        endif; ?>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
