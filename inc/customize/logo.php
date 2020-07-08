<?php

/**
 * Create Logo Setting and Upload Control
 */
$wp_customize->add_setting('quasarwp_theme_logo');
$wp_customize->add_control(new WP_Customize_Image_Control(
  $wp_customize,
  'quasarwp_theme_logo',
  array(
    'label' => __('Logo', 'quasarwp'),
    'section' => 'title_tagline',
    'priority'   => 1,
    'settings' => 'quasarwp_theme_logo',
  )
));

$wp_customize->add_setting(
  'theme_logo_class',
  array(
    'default'    => 'q-my-sm',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);

$wp_customize->add_control(
  'quasarwp_theme_logo_class',
  array(
    'label' => __('Spacing Class', 'quasarwp'),
    'section' => 'title_tagline',
    'settings' => 'theme_logo_class',
    'type' => 'text',
    'priority'   => 1.1,
    'description' => '<a href="https://quasar.dev/style/spacing" target="_blank">Learn more about spacing classes here</a>'
  )
);

$wp_customize->get_setting('theme_logo_class')->transport = 'postMessage';
