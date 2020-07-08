<?php

$wp_customize->add_section(
  'quasarwp_layout_single',
  array(
    'title'       => __('Post Page', 'quasarwp'),
    'priority'    => 108.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize single page layout for QuasarWP.', 'quasarwp'),
    'panel'  => 'quasarwp',
  )
);

// Single checkbox show author's name
$wp_customize->add_setting(
  'layout_single_author',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_author', array(
  'label' => __('Show Author\'s Name', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_author',
  'type' => 'checkbox',
  'priority'   => 1,
));

// Single checkbox show post date
$wp_customize->add_setting(
  'layout_single_postdate',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_postdate', array(
  'label' => __('Show Post Date', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_postdate',
  'type' => 'checkbox',
  'priority'   => 2,
));

// Single checkbox show comment counter
$wp_customize->add_setting(
  'layout_single_commentcounter',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_commentcounter', array(
  'label' => __('Show Comments Counter', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_commentcounter',
  'type' => 'checkbox',
  'priority'   => 3,
));

// Single checkbox show featured_image
$wp_customize->add_setting(
  'layout_single_featured_image',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_featured_image', array(
  'label' => __('Show Featured Image', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_featured_image',
  'type' => 'checkbox',
  'priority'   => 4,
));

// Single checkbox show social
$wp_customize->add_setting(
  'layout_single_social',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_social', array(
  'label' => __('Show Social Icons', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_social',
  'type' => 'checkbox',
  'priority'   => 4,
));

// Single checkbox show comments
$wp_customize->add_setting(
  'layout_single_comments',
  array(
    'default'    => true,
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control('quasarwp_layout_single_comments', array(
  'label' => __('Show Comments', 'quasarwp'),
  'section' => 'quasarwp_layout_single',
  'settings' => 'layout_single_comments',
  'type' => 'checkbox',
  'priority'   => 4,
));

$wp_customize->get_setting('layout_single_author')->transport = 'postMessage';
$wp_customize->get_setting('layout_single_postdate')->transport = 'postMessage';
$wp_customize->get_setting('layout_single_commentcounter')->transport = 'postMessage';
$wp_customize->get_setting('layout_single_featured_image')->transport = 'postMessage';
$wp_customize->get_setting('layout_single_social')->transport = 'postMessage';
$wp_customize->get_setting('layout_single_comments')->transport = 'postMessage';
