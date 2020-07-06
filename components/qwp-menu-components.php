<?php


//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action('init', 'create_topics_nonhierarchical_taxonomy', 0);

function create_topics_nonhierarchical_taxonomy()
{

  $labels = array(
    'name' => __('QWP Menu Components', 'quasarwp'),
    'singular_name' => __('Menu Component', 'quasarwp'),
    'search_items' =>  __('Search Menu Components', 'quasarwp'),
    'popular_items' => __('Popular Menu Components', 'quasarwp'),
    'all_items' => __('All Menu Components', 'quasarwp'),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __('Edit Menu Component', 'quasarwp'),
    'update_item' => __('Update Menu Component', 'quasarwp'),
    'add_new_item' => __('Add New Menu Component', 'quasarwp'),
    'new_item_name' => __('New Menu Component Name', 'quasarwp'),
    'separate_items_with_commas' => __('Separate menu components with commas', 'quasarwp'),
    'add_or_remove_items' => __('Add or remove menu components', 'quasarwp'),
    'choose_from_most_used' => __('Choose from the most used menu components', 'quasarwp'),
    'menu_name' => __('Menu Components', 'quasarwp'),
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
    'QWPSpace',
    'qwp_components',
    array(
      'description' => 'Menu Space.',
      'slug' => 'qwp-Space',
    )
  );

  wp_insert_term(
    'QWPSeparator',
    'qwp_components',
    array(
      'description' => 'Menu Separator.',
      'slug' => 'qwp-separator',
    )
  );

  wp_insert_term(
    'QWPLabel',
    'qwp_components',
    array(
      'description' => 'Menu Label.',
      'slug' => 'qwp-label',
    )
  );

  wp_insert_term(
    'QWPSearch',
    'qwp_components',
    array(
      'description' => 'Menu Search Input.',
      'slug' => 'qwp-search',
    )
  );

  wp_insert_term(
    'QWPLogo',
    'qwp_components',
    array(
      'description' => 'Site logo or icon.',
      'slug' => 'qwp-logo',
    )
  );
}

// Setup Inicial Menus
add_action('after_switch_theme', 'add_menus');
function add_menus()
{
  $menu_names   = array(
    'header-menu' => 'Header Menu',
    'footer-menu' => 'Footer Menu',
    'left-menu' => 'Left Drawer Menu'
  );
  $menu_ids = array();
  foreach ($menu_names as $key => $menu_name) {
    $menu_exists = wp_get_nav_menu_object($menu_name);
    if (!$menu_exists) {
      $menu_id = wp_create_nav_menu($menu_name);
      if ($menu_id > 0) {
        $menu_ids[$key] = $menu_id;
        if ($key == 'header-menu' || $key == 'footer-menu') {
          wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'   =>  __('QWPLogo', 'quasarwp'),
            'menu-item-status'  => 'publish'
          ));
        }
        if ($key == 'header-menu') {
          wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'   =>  __('QWPSpace', 'quasarwp'),
            'menu-item-status'  => 'publish'
          ));
          wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'   =>  __('QWPSearch', 'quasarwp'),
            'menu-item-status'  => 'publish'
          ));
        }
        if ($key == 'left-menu') {
          wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  '<q-icon name="home" size="md"></q-icon>&nbsp;' . __('Home', 'quasarwp'),
            'menu-item-url' => '/', 
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
          ));
        }
      }
    }
  }
  if (count($menu_ids) > 0) {
    set_theme_mod('nav_menu_locations', $menu_ids);
  }
}
