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

// Footer checkbox enabled
$wp_customize->add_setting(
  'layout_footer_enabled',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_footer_enabled', array(
  'label' => __('Enabled'),
  'section' => 'quasarwp_layout_footer',
  'settings' => 'layout_footer_enabled',
  'type' => 'checkbox',
  'priority'   => 1,
));

// Footer reveal checkbox
$wp_customize->add_setting(
  'layout_footer_reveal',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_footer_reveal', array(
  'label' => __('Footer Reveal'),
  'section' => 'quasarwp_layout_footer',
  'settings' => 'layout_footer_reveal',
  'type' => 'checkbox',
  'priority'   => 2,
));

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
    'priority'   => 3,
    'section'    => 'quasarwp_layout_footer',
  )
));

$wp_customize->get_setting('layout_footer_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_footer_reveal')->transport = 'postMessage';
$wp_customize->get_setting('layout_footer_backgroundcolor')->transport = 'postMessage';
