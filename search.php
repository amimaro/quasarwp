<?php
get_header();
?>

<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout :view="qwpDataLayoutView">

      <?php include(get_template_directory() . '/components/quasarwp-layout.php'); ?>

      <!-- %d result found. -->
      <!-- No results.
      Search Results
      Search results for &#8220;%s&#8221; -->

      <q-page-container>
        <q-page padding class="qwp-search">
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
            ?>

            <q-card class="q-my-md">
              <q-card-section>
                <p class="text-h4 text-weight-light q-pt-md"><?php echo __('Search Results', 'quasarwp') . ': "' . $search_query['s'] . '"' ?></p>
                <q-separator></q-separator>
                <p class="text-caption q-pt-md text-right"><?php printf(_n('%d result found.', '%d results found.', $the_query->found_posts, 'quasarwp'), $the_query->found_posts); ?></p>
              </q-card-section>
            </q-card>
            <?php if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php include('components/post-layout/stacked.php'); ?>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <q-card class="q-my-md">
                <q-card-section>
                  <p class="text-h5 text-weight-light q-pt-md"><?php esc_attr_e('No results.', 'quasarwp') ?> :(</p>
                </q-card-section>
              </q-card>
            <?php endif; ?>
          </div>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>
  <?php include(get_template_directory() . '/components/quasarwp-scripts.php'); ?>
