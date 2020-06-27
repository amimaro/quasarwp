<?php


//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action('init', 'create_topics_nonhierarchical_taxonomy', 0);

function create_topics_nonhierarchical_taxonomy()
{

  $labels = array(
    'name' => __('QWP Menu Components'),
    'singular_name' => __('Menu Component'),
    'search_items' =>  __('Search Menu Components'),
    'popular_items' => __('Popular Menu Components'),
    'all_items' => __('All Menu Components'),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __('Edit Menu Component'),
    'update_item' => __('Update Menu Component'),
    'add_new_item' => __('Add New Menu Component'),
    'new_item_name' => __('New Menu Component Name'),
    'separate_items_with_commas' => __('Separate menu components with commas'),
    'add_or_remove_items' => __('Add or remove menu components'),
    'choose_from_most_used' => __('Choose from the most used menu components'),
    'menu_name' => __('Menu Components'),
  );

  register_taxonomy('qwp_components', 'quasarwp', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => false,
    'show_in_quick_edit' => false,
    'meta_box_cb' => false,
    'show_admin_column' => false,
    'show_in_menu'  => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => false,
    'rewrite' => array('slug' => 'qwp-components'),
  ));

  wp_insert_term(
    'QWPSeparator',
    'qwp_components',
    array(
      'description' => 'Menu separator.',
      'slug' => 'qwp-separator',
    )
  );

  wp_insert_term(
    'QWPLabel',
    'qwp_components',
    array(
      'description' => 'Menu label.',
      'slug' => 'qwp-label',
    )
  );

}
