<?php

$wp_customize->add_section(
  'quasarwp_layout_header',
  array(
    'title'       => __('Header'),
    'priority'    => 103.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize the header layout settings for QuasarWP.'),
  )
);

// Header checkbox enabled
$wp_customize->add_setting(
  'layout_header_enabled',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_header_enabled', array(
  'label' => __('Enabled'),
  'section' => 'quasarwp_layout_header',
  'settings' => 'layout_header_enabled',
  'type' => 'checkbox',
  'priority'   => 1,
));

// Theme header color
$wp_customize->add_setting(
  'layout_header_backgroundcolor',
  array(
    'default'    => '',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_layout_header_backgroundcolor',
  array(
    'label'      => __('Background Color'),
    'settings'   => 'layout_header_backgroundcolor',
    'priority'   => 2,
    'section'    => 'quasarwp_layout_header',
  )
));

$wp_customize->get_setting('layout_header_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_header_backgroundcolor')->transport = 'postMessage';
