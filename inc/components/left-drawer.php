<?php

$wp_customize->add_section(
  'quasarwp_layout_ldrawer',
  array(
    'title'       => __('Left Drawer'),
    'priority'    => 105.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize the left drawer layout settings for QuasarWP.'),
  )
);

// Left Drawer checkbox enabled
$wp_customize->add_setting(
  'layout_ldrawer_enabled',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_ldrawer_enabled', array(
  'label' => __('Enabled'),
  'section' => 'quasarwp_layout_ldrawer',
  'settings' => 'layout_ldrawer_enabled',
  'type' => 'checkbox',
  'priority'   => 1,
));

$wp_customize->get_setting('layout_ldrawer_enabled')->transport = 'postMessage';
