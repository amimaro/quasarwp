<?php

$wp_customize->add_section(
  'quasarwp_layout_footer',
  array(
    'title'       => __('Footer'),
    'priority'    => 104.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize the footer layout settings for QuasarWP.'),
  )
);

// Theme footer color
$wp_customize->add_setting(
  'layout_footer_backgroundcolor',
  array(
    'default'    => '',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_layout_footer_backgroundcolor',
  array(
    'label'      => __('Background Color'),
    'settings'   => 'layout_footer_backgroundcolor',
    'priority'   => 1,
    'section'    => 'quasarwp_layout_footer',
  )
));

$wp_customize->get_setting('layout_footer_backgroundcolor')->transport = 'postMessage';
