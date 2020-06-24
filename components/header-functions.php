<?php

$setting = get_option('quasarwp-settings');
$minified = isset($setting['minified-files']) ? '.min' : '';
$modernEs6 = isset($setting['modern-es6']) ? '.modern' : '';
$language = $setting['language'];
$iconSet = $setting['icon-set'];

$tabMenu = '';
$leftMenu = '';
$rightMenu = '';

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

function set_qdrawer_behavior($behavior)
{
  if ($behavior == 'mobile') : return 'behavior="mobile"';
  elseif ($behavior == 'desktop') : return 'behavior="mobile"';
  else : return '';
  endif;
}

function set_qdrawer_overlay($overlay)
{
  return $overlay ? 'overlay' : '';
}

function set_qdrawer_show($show)
{
  return $show ? 'show-if-above' : '';
}

function get_reveal_option($show)
{
  return $show ? 'reveal' : '';
}
