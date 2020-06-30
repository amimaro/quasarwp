<?php

$wp_customize->add_section(
  'quasarwp_layout_rdrawer',
  array(
    'title'       => __('Right Drawer'),
    'priority'    => 106.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize the right drawer layout settings for QuasarWP.'),
  )
);

// Right Drawer checkbox enabled
$wp_customize->add_setting(
  'layout_rdrawer_enabled',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_rdrawer_enabled', array(
  'label' => __('Enabled'),
  'section' => 'quasarwp_layout_rdrawer',
  'settings' => 'layout_rdrawer_enabled',
  'type' => 'checkbox',
  'priority'   => 1,
));

$wp_customize->get_setting('layout_rdrawer_enabled')->transport = 'postMessage';
