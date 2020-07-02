<?php

$setting = get_option('quasarwp-settings');
$minified = isset($setting['minified-files']) ? '.min' : '';
$modernEs6 = isset($setting['modern-es6']) ? '.modern' : '';
$language = $setting['language'];
$iconSet = $setting['icon-set'];

$headerMenu = '';
$footerMenu = '';
$tabMenu = '';
$leftMenu = '';
$rightMenu = '';

if (has_nav_menu('header-menu')) {
  $headerMenu = wp_nav_menu(array(
    'menu'            => 'header-menu',
    'theme_location'  => 'header-menu',
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'container'       => '',
    'walker' => new Custom_Tab_Walker_Nav_Menu
  ));
}

if (has_nav_menu('footer-menu')) {
  $footerMenu = wp_nav_menu(array(
    'menu'            => 'footer-menu',
    'theme_location'  => 'footer-menu',
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'container'       => '',
    'walker' => new Custom_Tab_Walker_Nav_Menu
  ));
}

if (has_nav_menu('tab-menu')) {
  $tabMenu = wp_nav_menu(array(
    'menu'            => 'tab-menu',
    'theme_location'  => 'tab-menu',
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'container'       => '',
    'walker' => new Custom_Tab_Walker_Nav_Menu
  ));
}

if (has_nav_menu('left-menu')) {
  $leftMenu = wp_nav_menu(array(
    'menu'            => 'left-menu',
    'theme_location'  => 'left-menu',
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'container'       => '',
    'walker' => new Custom_Side_Walker_Nav_Menu
  ));
}

if (has_nav_menu('right-menu')) {
  $rightMenu = wp_nav_menu(array(
    'menu'            => 'right-menu',
    'theme_location'  => 'right-menu',
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'container'       => '',
    'walker' => new Custom_Side_Walker_Nav_Menu
  ));
}
