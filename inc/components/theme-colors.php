<?php

$wp_customize->add_section(
  'quasarwp_theme_colors',
  array(
    'title'       => __('Colors'),
    'priority'    => 102.3,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize colors for QuasarWP.'),
  )
);

// Theme primary color
$wp_customize->add_setting(
  'theme_primary',
  array(
    'default'    => '#027BE3',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_primary',
  array(
    'label'      => 'Primary',
    'settings'   => 'theme_primary',
    'priority'   => 1,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme secondary color
$wp_customize->add_setting(
  'theme_secondary',
  array(
    'default'    => '#26A69A',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_secondary',
  array(
    'label'      => 'Secondary',
    'settings'   => 'theme_secondary',
    'priority'   => 2,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme accent color
$wp_customize->add_setting(
  'theme_accent',
  array(
    'default'    => '#9C27B0',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_accent',
  array(
    'label'      => 'Accent',
    'settings'   => 'theme_accent',
    'priority'   => 3,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme dark color
$wp_customize->add_setting(
  'theme_dark',
  array(
    'default'    => '#1d1d1d',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_dark',
  array(
    'label'      => 'Dark',
    'settings'   => 'theme_dark',
    'priority'   => 4,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme positive color
$wp_customize->add_setting(
  'theme_positive',
  array(
    'default'    => '#21BA45',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_positive',
  array(
    'label'      => 'Positive',
    'settings'   => 'theme_positive',
    'priority'   => 5,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme negative color
$wp_customize->add_setting(
  'theme_negative',
  array(
    'default'    => '#C10015',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_negative',
  array(
    'label'      => 'Negative',
    'settings'   => 'theme_negative',
    'priority'   => 6,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme info color
$wp_customize->add_setting(
  'theme_info',
  array(
    'default'    => '#31CCEC',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_info',
  array(
    'label'      => 'Info',
    'settings'   => 'theme_info',
    'priority'   => 7,
    'section'    => 'quasarwp_theme_colors',
  )
));

// Theme warning color
$wp_customize->add_setting(
  'theme_warning',
  array(
    'default'    => '#F2C037',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
  )
);
$wp_customize->add_control(new WP_Customize_Color_Control(
  $wp_customize,
  'quasarwp_theme_warning',
  array(
    'label'      => 'Warning',
    'settings'   => 'theme_warning',
    'priority'   => 8,
    'section'    => 'quasarwp_theme_colors',
  )
));

$wp_customize->get_setting('theme_primary')->transport = 'postMessage';
$wp_customize->get_setting('theme_secondary')->transport = 'postMessage';
$wp_customize->get_setting('theme_accent')->transport = 'postMessage';
$wp_customize->get_setting('theme_dark')->transport = 'postMessage';
$wp_customize->get_setting('theme_info')->transport = 'postMessage';
$wp_customize->get_setting('theme_positive')->transport = 'postMessage';
$wp_customize->get_setting('theme_negative')->transport = 'postMessage';
$wp_customize->get_setting('theme_warning')->transport = 'postMessage';
