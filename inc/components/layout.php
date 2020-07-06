<?php

$wp_customize->add_section(
  'quasarwp_layout_settings',
  array(
    'title'       => __('Layout', 'quasarwp'),
    'priority'    => 102.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize theme layout for QuasarWP.', 'quasarwp'),
    'panel'  => 'quasarwp',
  )
);

$wp_customize->add_setting(
  'settings_loading_enabled',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(
  'quasarwp_settings_loading_enabled',
  array(
    'label' => 'Show Loading Overlay',
    'section' => 'quasarwp_layout_settings',
    'settings' => 'settings_loading_enabled',
    'type' => 'checkbox',
    'priority'   => 1,
  )
);

$wp_customize->add_setting(
  'settings_layout_view',
  array(
    'default'    => 'hHh Lpr lFf',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);

$wp_customize->add_control(
  'quasarwp_settings_layout_view',
  array(
    'label' => 'Layout View',
    'section' => 'quasarwp_layout_settings',
    'settings' => 'settings_layout_view',
    'type' => 'text',
    'priority'   => 2,
    'description' => '<a href="https://quasar.dev/layout/layout#QLayout-API" target="_blank">Learn more about q-layout here</a>'
  )
);

$wp_customize->get_setting('settings_loading_enabled')->transport = 'postMessage';
$wp_customize->get_setting('settings_layout_view')->transport = 'postMessage';
