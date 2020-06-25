<?php

add_filter('rest_allow_anonymous_comments', '__return_true');

include('data/load.php');

add_theme_support('menus');
add_theme_support('post-thumbnails');
register_nav_menus(
  array(
    'tab-menu' => __('Tab Menu', 'theme'),
    'left-menu' => __('Left Menu', 'theme'),
    'right-menu' => __('Right Menu', 'theme'),
  )
);
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

add_action('admin_menu', 'quasarwp_menu');
function quasarwp_menu()
{
  add_menu_page('QuasarWP', 'QuasarWP', 'manage_options', 'quasarwp', 'quasarwp_settings_page', 'dashicons-editor-code', 90);
  add_action('admin_init', 'update_quasarwp');
}

function update_quasarwp()
{
  register_setting('quasarwp-settings', 'quasarwp-settings');
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
  <form method="post" action="options.php">
    <?php settings_fields('quasarwp-settings'); ?>
    <?php do_settings_sections('quasarwp-settings'); ?>
    <table class="form-table">
      <tr>
        <?php include('components/functions/general.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/modules.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/qheader.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/qfooter.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/left-drawer.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/right-drawer.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/tabs.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/front-page.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/posts-page.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/language-pack.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/icon-set.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/theme-colors.php'); ?>
      </tr>
      <tr>
        <?php include('components/functions/social-icons.php'); ?>
      </tr>
    </table>

    <?php submit_button(); ?>
  </form>
<?php
}

include('components/custom-navs.php');
include('data/helpers.php');
