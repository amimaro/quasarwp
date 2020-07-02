<?php

get_header();

include(get_template_directory() . '/components/header-functions.php');
?>

<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout view="<?php echo $setting['layout']; ?>">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <!-- %d result found. -->
      <!-- No results.
      Search Results
      Search results for &#8220;%s&#8221; -->

      <q-page-container>
        <q-page padding>
          <div class="q-px-xl">
            <?php
            global $query_string;
            $query_args = explode("&", $query_string);
            $search_query = array();
            foreach ($query_args as $key => $string) {
              $query_split = explode("=", $string);
              $search_query[$query_split[0]] = urldecode($query_split[1]);
            }
            $the_query = new WP_Query($search_query);
            if ($the_query->have_posts()) :
            ?>

              <p class="text-h3 q-pt-md"><?php echo __('Search Results') . ': "' . $search_query['s'] . '"' ?></p>
              <q-separator></q-separator>
              <p class="text-caption q-pt-md text-right"><?php printf(_n('%d result found.', '%d results found.', $the_query->found_posts), $the_query->found_posts); ?></p>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php include('components/post-layout/stacked.php'); ?>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

            <?php else : ?>
              <p><?php _e('No results.'); ?></p>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
          </div>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
