<?php

/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link https://quasarwp.com
 * @since QuasarWP 1.0
 */
class QuasarWP_Customize
{
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @since QuasarWP 1.0
    */
   public static function register($wp_customize)
   {
      include(get_template_directory() . '/inc/components/upload-logo.php');
      include(get_template_directory() . '/inc/components/theme-colors.php');
      include(get_template_directory() . '/inc/components/header.php');
      include(get_template_directory() . '/inc/components/footer.php');
      include(get_template_directory() . '/inc/components/left-drawer.php');
      include(get_template_directory() . '/inc/components/right-drawer.php');
      include(get_template_directory() . '/inc/components/tabs.php');
      include(get_template_directory() . '/inc/components/home.php');
   }

   public static function header_output()
   {
?>
<!--Customizer CSS-->
<style type="text/css">
<?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#');
self::generate_css('body', 'background-color', 'background_color', '#');
self::generate_css('a', 'color', 'theme_primary');
self::generate_css('.q-header', 'background-color', 'layout_header_backgroundcolor', '', ' !important');
self::generate_css('.q-footer', 'background-color', 'layout_footer_backgroundcolor', '', ' !important');
self::generate_css('.q-header .q-tabs', 'background-color', 'layout_tabs_backgroundcolor', '', ' !important');
self::generate_css('.q-drawer--left', 'background-color', 'layout_ldrawer_backgroundcolor', '', ' !important');
self::generate_css('.q-drawer--right', 'background-color', 'layout_rdrawer_backgroundcolor', '', ' !important');

self::set_view('.q-header', 'display', 'layout_header_enabled');
self::set_view('.q-footer', 'display', 'layout_footer_enabled');
self::set_view('.q-header .q-avatar', 'display', 'layout_header_icon', 'inline-block');
self::set_view('.q-footer .q-avatar', 'display', 'layout_footer_icon', 'inline-block');
self::set_view('.q-header .qwp-blogname', 'display', 'layout_header_blogname', 'inline-block');
self::set_view('.q-footer .qwp-blogname', 'display', 'layout_footer_blogname', 'inline-block');
self::set_view('#qwp-btn-left-menu', 'display', 'layout_ldrawer_enabled', 'inline-block');
self::set_view('#qwp-btn-right-menu', 'display', 'layout_rdrawer_enabled', 'inline-block');
self::set_view('.q-header .q-tabs', 'display', 'layout_tabs_enabled');
self::set_view('.qwp-home-post-author', 'display', 'layout_home_author');
self::set_view('.qwp-home-post-excerpt', 'display', 'layout_home_excerpt');
self::set_view('.qwp-home-post-postdate', 'display', 'layout_home_postdate');
self::set_view('.qwp-home-post-commentcounter', 'display', 'layout_home_commentcounter');
?>
</style>
<!--/Customizer CSS-->
<?php
   }

   public static function live_preview()
   {
      wp_enqueue_script(
         'mytheme-themecustomizer', // Give the script a unique ID
         get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
         array('jquery', 'customize-preview'), // Define dependencies
         '', // Define a version (optional) 
         true // Specify whether to put in footer (leave this true)
      );
   }

   public static function set_view($selector, $style = 'display', $mod_name, $visible = '', $hidden = '')
   {
      $return = '';
      $value = '';
      $mod = get_theme_mod($mod_name);
      if ($style == 'display') {
         if (!$visible) $visible = 'block';
         if (!$hidden) $hidden = 'none';
      }
      if ($style == 'visibility') {
         if (!$visible) $visible = 'visible';
         if (!$hidden) $hidden = 'hidden';
      }
      $value = $mod ? $visible : $hidden;
      return printf(
         '%s { %s: %s; }',
         $selector,
         $style,
         $value
      );
   }

   public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
   {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if (!empty($mod)) {
         $return = sprintf(
            '%s { %s: %s; }',
            $selector,
            $style,
            $prefix . $mod . $postfix
         );
         if ($echo) {
            echo $return;
         }
      }
      return $return;
   }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('QuasarWP_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('QuasarWP_Customize', 'header_output'));

// Enqueue live preview javascript in Theme Customizer admin screen
add_action('customize_preview_init', array('QuasarWP_Customize', 'live_preview'));
