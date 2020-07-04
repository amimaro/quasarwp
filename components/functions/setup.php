<?php 

add_action('after_switch_theme', 'set_default_theme_mod');
function set_default_theme_mod()
{
  set_theme_mod('layout_header_enabled', true);
  set_theme_mod('layout_header_icon', true);
  set_theme_mod('layout_header_blogname', true);
  set_theme_mod('layout_header_separator', 'elevated');

  set_theme_mod('layout_footer_enabled', true);
  set_theme_mod('layout_footer_icon', true);
  set_theme_mod('layout_footer_blogname', true);
  set_theme_mod('layout_footer_separator', 'elevated');

  set_theme_mod('layout_ldrawer_enabled', true);
  set_theme_mod('layout_ldrawer_show_if_above', true);
  set_theme_mod('layout_ldrawer_separator', 'elevated');
  set_theme_mod('layout_ldrawer_behavior', 'normal');

  set_theme_mod('settings_loading_enabled', true);
  set_theme_mod('settings_layout_view', 'hHh Lpr lFf');

  set_theme_mod('layout_home_author', true);
  set_theme_mod('layout_home_excerpt', true);
  set_theme_mod('layout_home_postdate', true);
  set_theme_mod('layout_home_commentcounter', true);
  set_theme_mod('layout_home_postlayout', 'grid3x3');


  set_theme_mod('layout_single_author', true);
  set_theme_mod('layout_single_postdate', true);
  set_theme_mod('layout_single_commentcounter', true);
  set_theme_mod('layout_single_featured_image', true);
  set_theme_mod('layout_single_social', true);
  set_theme_mod('layout_single_comments', true);
  
  set_theme_mod('social_whatsapp_enabled', true);
  set_theme_mod('social_facebook_enabled', true);
  set_theme_mod('social_twitter_enabled', true);
  set_theme_mod('social_e-mail_enabled', true);
  set_theme_mod('social_whatsapp_class', 'fab fa-whatsapp');
  set_theme_mod('social_facebook_class', 'fab fa-facebook-f');
  set_theme_mod('social_twitter_class', 'fab fa-twitter');
  set_theme_mod('social_e-mail_class', 'far fa-envelope');
  
  set_theme_mod('layout_tabs_align', 'left');

  set_theme_mod('theme_primary', '#027BE3');
  set_theme_mod('theme_secondary', '#26A69A');
  set_theme_mod('theme_accent', '#9C27B0');
  set_theme_mod('theme_dark', '#1d1d1d');
  set_theme_mod('theme_positive', '#21BA45');
  set_theme_mod('theme_negative', '#C10015');
  set_theme_mod('theme_info', '#31CCEC');
  set_theme_mod('theme_warning', '#F2C037');

  set_theme_mod('theme_logo_class', 'q-my-sm');
}
