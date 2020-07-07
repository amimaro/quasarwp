<?php

if (!get_option('quasarwp-settings')) {
  add_option('quasarwp-settings', array(
    'roboto-font' => 1,
    'material-icons' => 1,
    'fontawesomev5' => 1,
    'language' => 'en-us',
    'icon-set' => 'material',
  ));
}

add_action('admin_init', 'update_quasarwp');
function update_quasarwp()
{
  register_setting('quasarwp-settings', 'quasarwp-settings');
}

include('assets/helpers.php');
include('components/custom-navs.php');
include('components/functions/setup.php');

add_filter('rest_allow_anonymous_comments', '__return_true');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

register_nav_menus(
  array(
    'header-menu' => __('Header Menu', 'quasarwp'),
    'footer-menu' => __('Footer Menu', 'quasarwp'),
    'tab-menu' => __('Tab Menu', 'quasarwp'),
    'left-menu' => __('Left Menu', 'quasarwp'),
    'right-menu' => __('Right Menu', 'quasarwp'),
  )
);

add_action('admin_menu', 'quasarwp_menu');
function quasarwp_menu() {
    add_theme_page('QuasarWP Settings', 'QuasarWP Settings', 'manage_options', 'quasarwp', 'quasarwp_settings_page');
}

function quasarwp_settings_page()
{
  if (!current_user_can('manage_options')) {
    wp_die( __('You do not have sufficient permissions to access this page.', 'quasarwp') );
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

// Setup menus
include('components/qwp-menu-components.php');

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

function quasarwp_load_theme_textdomain()
{
  load_theme_textdomain('quasarwp', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'quasarwp_load_theme_textdomain');


require_once('inc/TGM/class-quasarwp-components-activation.php');
