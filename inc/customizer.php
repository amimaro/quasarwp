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

      // $wp_customize->add_control('sidebar_position_control', array(
      //    'label' => __('Sidebar Position', 'mytheme'),
      //    'section' => 'sidebar_settings',
      //    'settings' => 'sidebar_position',
      //    'type' => 'radio',
      //    'choices' => array(
      //       'left' => 'Left',
      //       'right' => 'Right',
      //    ),
      // ));
   }

   public static function header_output()
   {
?>
      <!--Customizer CSS-->
      <style type="text/css">
         <?php
         self::generate_css('#site-title a', 'color', 'header_textcolor', '#');
         self::generate_css('body', 'background-color', 'background_color', '#');
         self::generate_css('a', 'color', 'theme_primary');
         self::generate_css('.q-header', 'background-color', 'layout_header_backgroundcolor', '', ' !important');
         self::generate_css('.q-footer', 'background-color', 'layout_footer_backgroundcolor', '', ' !important');

         $headerVisible = get_theme_mod('layout_header_enabled') ? 'block' : 'none';
         self::set_css('.q-header', 'display', $headerVisible);
         
         $footerVisible = get_theme_mod('layout_footer_enabled') ? 'block' : 'none';
         self::set_css('.q-footer', 'display', $footerVisible);
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

   public static function set_css($selector, $style, $value)
   {
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
