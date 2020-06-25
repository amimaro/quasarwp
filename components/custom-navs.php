<?php

class Custom_Tab_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $url = !empty($item->url) ? $item->url : '';
    $title = !empty($item->title) ? $item->title : '';

    $output .= '<a href="' . $url . '" class="q-tab relative-position self-stretch flex flex-center text-center q-tab--inactive q-focusable q-hoverable cursor-pointer">';
    $output .= '  <div class="q-focus-helper"></div>';
    $output .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
    $output .= '    <div class="q-tab__label">' . $title . '</div>';
    $output .= '  </div>';
    $output .= '</a>';
  }
}

class Custom_Side_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $url = !empty($item->url) ? $item->url : '';
    $title = !empty($item->title) ? $item->title : '';

    $output .= '<a href="' . $url . '" class="q-tab relative-position self-stretch flex q-tab--inactive q-focusable q-hoverable cursor-pointer">';
    $output .= '  <div class="q-focus-helper"></div>';
    $output .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
    $output .= '    <div class="q-tab__label">' . $title . '</div>';
    $output .= '  </div>';
    $output .= '</a>';
  }
}
