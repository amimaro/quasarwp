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

// Left Drawer checkbox show_if_above
$wp_customize->add_setting(
  'layout_ldrawer_show_if_above',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_ldrawer_show_if_above', array(
  'label' => __('Show if Above'),
  'section' => 'quasarwp_layout_ldrawer',
  'settings' => 'layout_ldrawer_show_if_above',
  'type' => 'checkbox',
  'priority'   => 2,
  'description' => __('Shows the menu when starting the page')
));

// Left Drawer checkbox overlay
$wp_customize->add_setting(
  'layout_ldrawer_overlay',
  array(
    'default'    => false,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_ldrawer_overlay', array(
  'label' => __('Overlay Mode'),
  'section' => 'quasarwp_layout_ldrawer',
  'settings' => 'layout_ldrawer_overlay',
  'type' => 'checkbox',
  'priority'   => 3,
));

// Left Drawer select separator type
$wp_customize->add_setting(
  'layout_ldrawer_separator',
  array(
    'default'    => 'elevated',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_ldrawer_separator', array(
  'label' => __('Separator type'),
  'section' => 'quasarwp_layout_ldrawer',
  'settings' => 'layout_ldrawer_separator',
  'type' => 'radio',
  'priority'   => 4,
  'choices' => array(
    'none' => 'None',
    'elevated' => 'Elevated',
    'bordered' => 'Bordered',
  ),
));

// Left Drawer select behavior
$wp_customize->add_setting(
  'layout_ldrawer_behavior',
  array(
    'default'    => 'normal',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_ldrawer_behavior', array(
  'label' => __('Behavior'),
  'section' => 'quasarwp_layout_ldrawer',
  'settings' => 'layout_ldrawer_behavior',
  'type' => 'radio',
  'priority'   => 5,
  'choices' => array(
    'normal' => 'Behave Normal',
    'mobile' => 'Behave Mobile',
    'desktop' => 'Behave Desktop',
  ),
));

$wp_customize->get_setting('layout_ldrawer_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_ldrawer_show_if_above')->transport = 'postMessage';
$wp_customize->get_setting('layout_ldrawer_overlay')->transport = 'postMessage';
$wp_customize->get_setting('layout_ldrawer_separator')->transport = 'postMessage';
$wp_customize->get_setting('layout_ldrawer_behavior')->transport = 'postMessage';
