<?php

$wp_customize->add_section(
  'quasarwp_layout_home',
  array(
    'title'       => __('Home Page'),
    'priority'    => 108.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize home page layout settings for QuasarWP.'),
  )
);

// Home checkbox show author's name
$wp_customize->add_setting(
  'layout_home_author',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_home_author', array(
  'label' => __('Show Author\'s Name'),
  'section' => 'quasarwp_layout_home',
  'settings' => 'layout_home_author',
  'type' => 'checkbox',
  'priority'   => 1,
));

// Home checkbox show excerpt
$wp_customize->add_setting(
  'layout_home_excerpt',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_home_excerpt', array(
  'label' => __('Show Excerpt'),
  'section' => 'quasarwp_layout_home',
  'settings' => 'layout_home_excerpt',
  'type' => 'checkbox',
  'priority'   => 2,
));

// Home checkbox show post date
$wp_customize->add_setting(
  'layout_home_postdate',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_home_postdate', array(
  'label' => __('Show Post Date'),
  'section' => 'quasarwp_layout_home',
  'settings' => 'layout_home_postdate',
  'type' => 'checkbox',
  'priority'   => 3,
));

// Home checkbox show comment counter
$wp_customize->add_setting(
  'layout_home_commentcounter',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_home_commentcounter', array(
  'label' => __('Show Comments Counter'),
  'section' => 'quasarwp_layout_home',
  'settings' => 'layout_home_commentcounter',
  'type' => 'checkbox',
  'priority'   => 4,
));

// Home select separator type
$wp_customize->add_setting(
  'layout_home_postlayout',
  array(
    'default'    => 'grid3x3',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_home_postlayout', array(
  'label' => __('Post Layout'),
  'section' => 'quasarwp_layout_home',
  'settings' => 'layout_home_postlayout',
  'type' => 'radio',
  'priority'   => 5,
  'choices' => array(
    'grid3x3' => '3x3 Grid',
    'stacked' => 'Stacked',
  ),
));

$wp_customize->get_setting('layout_home_author')->transport = 'postMessage';
$wp_customize->get_setting('layout_home_excerpt')->transport = 'postMessage';
$wp_customize->get_setting('layout_home_postdate')->transport = 'postMessage';
$wp_customize->get_setting('layout_home_commentcounter')->transport = 'postMessage';
$wp_customize->get_setting('layout_home_postlayout')->transport = 'postMessage';
