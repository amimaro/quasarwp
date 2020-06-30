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

// Right Drawer checkbox show_if_above
$wp_customize->add_setting(
  'layout_rdrawer_show_if_above',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_rdrawer_show_if_above', array(
  'label' => __('Show if Above'),
  'section' => 'quasarwp_layout_rdrawer',
  'settings' => 'layout_rdrawer_show_if_above',
  'type' => 'checkbox',
  'priority'   => 2,
  'description' => __('Shows the menu when starting the page')
));

// Left Drawer checkbox overlay
$wp_customize->add_setting(
  'layout_rdrawer_overlay',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_rdrawer_overlay', array(
  'label' => __('Overlay Mode'),
  'section' => 'quasarwp_layout_rdrawer',
  'settings' => 'layout_rdrawer_overlay',
  'type' => 'checkbox',
  'priority'   => 3,
));

// Right Drawer select separator type
$wp_customize->add_setting(
  'layout_rdrawer_separator',
  array(
    'default'    => 'elevated',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_rdrawer_separator', array(
  'label' => __('Separator type'),
  'section' => 'quasarwp_layout_rdrawer',
  'settings' => 'layout_rdrawer_separator',
  'type' => 'radio',
  'priority'   => 4,
  'choices' => array(
    'none' => 'None',
    'elevated' => 'Elevated',
    'bordered' => 'Bordered',
  ),
));

$wp_customize->get_setting('layout_rdrawer_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_show_if_above')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_overlay')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_separator')->transport = 'postMessage';
