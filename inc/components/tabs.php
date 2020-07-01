<?php

$wp_customize->add_section(
  'quasarwp_layout_tabs',
  array(
    'title'       => __('Tabs'),
    'priority'    => 107.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize tabs layout settings for QuasarWP.'),
  )
);

// Right Drawer checkbox enabled
$wp_customize->add_setting(
  'layout_tabs_enabled',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_tabs_enabled', array(
  'label' => __('Enabled'),
  'section' => 'quasarwp_layout_tabs',
  'settings' => 'layout_tabs_enabled',
  'type' => 'checkbox',
  'priority'   => 1,
));

// Theme Tabs background-color
$wp_customize->add_setting(
  'layout_tabs_backgroundcolor',
  array(
    'default'    => '',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_layout_tabs_backgroundcolor',
  array(
    'label'      => __('Background Color'),
    'settings'   => 'layout_tabs_backgroundcolor',
    'priority'   => 2,
    'section'    => 'quasarwp_layout_tabs',
  )
));

// Right Drawer select separator type
$wp_customize->add_setting(
  'layout_tabs_align',
  array(
    'default'    => 'left',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_tabs_align', array(
  'label' => __('Align Items'),
  'section' => 'quasarwp_layout_tabs',
  'settings' => 'layout_tabs_align',
  'type' => 'radio',
  'priority'   => 3,
  'choices' => array(
    'left' => 'Left',
    'center' => 'Center',
    'right' => 'Right',
  ),
));

$wp_customize->get_setting('layout_tabs_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_tabs_backgroundcolor')->transport = 'postMessage';
$wp_customize->get_setting('layout_tabs_align')->transport = 'postMessage';
