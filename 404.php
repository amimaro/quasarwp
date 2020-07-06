<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>

<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout :view="qwpDataLayoutView">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <q-page-container>
        <q-page padding class="qwp-404 q-px-xl">
          <q-card class="q-my-md">
            <q-card-section>
              <p class="text-h3 text-weight-light"><?php _e('Page not found'); ?> :(</p>
              <div align="right">
                <q-btn label="<?php _e('Homepage'); ?>" color="primary" @click="quasarwpRouteTo('/')"></q-btn>
              </div>
            </q-card-section>
          </q-card>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
