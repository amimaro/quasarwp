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

    if (!isJson($title)) {
      if ($item->title == 'QWPSeparator') {
        $output .= '<q-separator class="q-my-md"></q-separator>';
      } else if ($item->title == 'QWPLabel') {
        $output .= '<q-item-label header>' . $title . '</q-item-label>';
      } else {
        $output .= '<a href="' . $url . '" class="q-tab relative-position self-stretch flex q-tab--inactive q-focusable q-hoverable cursor-pointer">';
        $output .= '  <div class="q-focus-helper"></div>';
        $output .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
        $output .= '    <div class="q-tab__label">' . $title . '</div>';
        $output .= '  </div>';
        $output .= '</a>';
      }
    } else {
      $json = json_decode($title);
      $title = !empty($json->title) ? $json->title : false;
      $icon = !empty($json->icon) ? $json->icon : false;
      $caption = !empty($json->caption) ? $json->caption : false;
      $target = (!empty($json->target) && $json->target == 'blank') ? 'target="_blank"' : '';

      $output .= '<q-item clickable tag="a" ' . $target . ' rel="noopener" href="' . $url . '">';
      if ($icon) {
        $output .= '  <q-item-section avatar>';
        $output .= '    <q-icon name="' . $icon . '"></q-icon>';
        $output .= '  </q-item-section>';
      }
      $output .= '  <q-item-section>';
      if ($title) {
        $output .= '    <q-item-label>' . $title . '</q-item-label>';
      }
      if ($caption) {
        $output .= '    <q-item-label caption>' . $caption . '</q-item-label>';
      }
      $output .= '  </q-item-section>';
      $output .= '</q-item>';
    }
  }
}
