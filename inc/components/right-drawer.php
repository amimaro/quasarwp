<?php

$wp_customize->add_section(
  'quasarwp_layout_rdrawer',
  array(
    'title'       => __('Right Drawer'),
    'priority'    => 106.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize right drawer layout for QuasarWP.'),
    'panel'  => 'quasarwp',
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

// Theme right drawer background-color
$wp_customize->add_setting(
  'layout_rdrawer_backgroundcolor',
  array(
    'default'    => '',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_layout_rdrawer_backgroundcolor',
  array(
    'label'      => __('Background Color'),
    'settings'   => 'layout_rdrawer_backgroundcolor',
    'priority'   => 4,
    'section'    => 'quasarwp_layout_rdrawer',
  )
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

// Left Drawer select behavior
$wp_customize->add_setting(
  'layout_rdrawer_behavior',
  array(
    'default'    => 'default',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_rdrawer_behavior', array(
  'label' => __('Behavior'),
  'section' => 'quasarwp_layout_rdrawer',
  'settings' => 'layout_rdrawer_behavior',
  'type' => 'radio',
  'priority'   => 5,
  'choices' => array(
    'default' => 'Behave Normal',
    'mobile' => 'Behave Mobile',
    'desktop' => 'Behave Desktop',
  ),
));

$wp_customize->get_setting('layout_rdrawer_enabled')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_show_if_above')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_overlay')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_backgroundcolor')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_separator')->transport = 'postMessage';
$wp_customize->get_setting('layout_rdrawer_behavior')->transport = 'postMessage';
