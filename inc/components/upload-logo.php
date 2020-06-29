<?php

/**
 * Create Logo Setting and Upload Control
 */
$wp_customize->add_setting('quasarwp_theme_logo');
$wp_customize->add_control(new WP_Customize_Image_Control(
  $wp_customize,
  'quasarwp_theme_logo',
  array(
    'label' => _('Logo'),
    'section' => 'title_tagline',
    'priority'   => 1,
    'settings' => 'quasarwp_theme_logo',
  )
));
