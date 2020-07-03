<?php

add_action('admin_menu', 'quasarwp_menu');

include('data/load.php');
include('data/helpers.php');
include('components/custom-navs.php');

add_filter('rest_allow_anonymous_comments', '__return_true');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

register_nav_menus(
  array(
    'header-menu' => __('Header Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
    'tab-menu' => __('Tab Menu', 'theme'),
    'left-menu' => __('Left Menu', 'theme'),
    'right-menu' => __('Right Menu', 'theme'),
  )
);

function update_quasarwp()
{
  register_setting('quasarwp-settings', 'quasarwp-settings');
}

function quasarwp_menu()
{
  add_menu_page('QuasarWP', 'QuasarWP', 'manage_options', 'quasarwp', 'quasarwp_settings_page', 'dashicons-editor-code', 90);
  add_submenu_page(
    'quasarwp',
    'QuasarWP',
    'QuasarWP',
    'manage_options',
    'quasarwp'
  );
  // add_submenu_page('quasarwp', 'Menu Components', 'Menu Components', 'edit_posts', 'edit-tags.php?taxonomy=qwp_components&post_type=qwp_components',false );
  add_action('admin_init', 'update_quasarwp');
}


function quasarwp_settings_page()
{
  if (!current_user_can('manage_options')) {
    return;
  }

  include('data/languages.php');
  include('data/icon-sets.php');
  $options = get_option('quasarwp-settings');
?>
  <h1>QuasarWP Settings</h1>
  <p><a href="<?php echo get_site_url() . '/wp-admin/customize.php'; ?>">Click here</a> to customize your theme.</p>
  <form method="post" action="options.php">
    <?php settings_fields('quasarwp-settings'); ?>
    <?php do_settings_sections('quasarwp-settings'); ?>
    <table class="form-table">
      <tr>
        <?php include('components/functions/modules.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/language-pack.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/icon-set.php'); ?>
      </tr>
    </table>

    <?php submit_button(); ?>
  </form>
<?php
}

include('components/qwp-menu-components.php');

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

add_action('init', 'add_menus');
function add_menus()
{
  $menu_names   = array(
    'header-menu' => 'Header Menu',
    'footer-menu' => 'Footer Menu'
  );
  $menu_ids = array();
  foreach ($menu_names as $key => $menu_name) {
    $menu_exists = wp_get_nav_menu_object($menu_name);
    if (!$menu_exists) {
      $menu_id = wp_create_nav_menu($menu_name);
      if ($menu_id > 0) {
        $menu_ids[$key] = $menu_id;
        $page_args = array(
          'menu-item-title'   =>  __('QWPLogo'),
          'menu-item-status'  => 'publish'
        );
        wp_update_nav_menu_item($menu_id, 0, $page_args);
      }
    }
  }
  if(count($menu_ids) > 0) {
    set_theme_mod('nav_menu_locations', $menu_ids);
  }
}
