<?php

class Custom_Nav_Menu extends Walker_Nav_Menu
{

  private $menuLocations = array('header', 'footer', 'tab', 'left', 'right');
  private $horizontalMenus = array('header', 'footer', 'tab');
  private $verticalMenus = array('left', 'right');

  function __construct($menuLocation)
  {
    $this->menuLocation = $menuLocation;
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    // Simple Custom Inputs
    $url = !empty($item->url) ? $item->url : '';
    $title = !empty($item->title) ? $item->title : '';

    if (!isJson($title)) {
      if ($item->title == 'QWPSeparator' || strpos($url, 'qwp-separator')) {
        $output .= $this->qwpSeparator();
      } else if ($item->title == 'QWPLabel' || strpos($url, 'qwp-label')) {
        $output .= $this->qwpLabel($title);
      } else if ($item->title == 'QWPSearch' || strpos($url, 'qwp-search')) {
        $output .= $this->qwpSearch();
      } else if ($item->title == 'QWPSpace' || strpos($url, 'qwp-space')) {
        $output .= $this->qwpSpace();
      } else if ($item->title == 'QWPLogo' || strpos($url, 'qwp-logo')) {
        $output .= $this->qwpLogo();
      } else {
        $output .= $this->qwpSimpleBtn(array(
          'url'   => $url,
          'title' => $title
        ));
      }
    } else {
      $output .= $this->qwpCustomItem($title, $url);
    }
  }

  function qwpSpace()
  {
    $return = '';
    $return .= '<q-space class="qwp-space"></q-space>';
    return $return;
  }

  function qwpSeparator()
  {
    $return = '';
    if (in_array($this->menuLocation, $this->horizontalMenus))
      $return .= '<q-separator vertical inset class="qwp-separator"></q-separator>';
    else
      $return .= '<q-separator class="q-my-md qwp-separator"></q-separator>';
    return $return;
  }

  function qwpLabel($title)
  {
    $return = '';
    $return .= '<q-item-label header class="qwp-label">' . $title . '</q-item-label>';
    return $return;
  }

  function qwpSimpleBtn($args)
  {
    $return = '';
    $return .= '<a href="' . $args['url'] . '" class="q-tab qwp-simple-btn relative-position self-stretch flex q-tab--inactive q-focusable q-hoverable cursor-pointer">';
    $return .= '  <div class="q-focus-helper"></div>';
    $return .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
    $return .= '    <div class="q-tab__label">' . $args['title'] . '</div>';
    $return .= '  </div>';
    $return .= '</a>';
    return $return;
  }

  function qwpSearch()
  {
    $return = '';
    $return .= '<form role="search" method="get" action="' . get_site_url() . '"';
    $return .= '  class="qwp-form-search">';
    $return .= '  <q-input name="s" id="s" class="qwp-input-search" dense standout="bg-primary" v-model="qwpSearch"';
    $return .= '    placeholder="' . __("Search") . '">';
    $return .= '    <template v-slot:append>';
    $return .= '      <q-icon v-if="qwpSearch === \'\'" name="search"></q-icon>';
    $return .= '      <q-icon v-else name="clear" class="cursor-pointer" @click="qwpSearch = \'\'"></q-icon>';
    $return .= '    </template>';
    $return .= '  </q-input>';
    $return .= '</form>';
    return $return;
  }

  function qwpLogo()
  {
    $return .= '';
    $return .= '<q-toolbar-title shrink class="qwp-logo cursor-pointer" @click="quasarwpRouteTo(\'/\')">';
    if (get_theme_mod('quasarwp_theme_logo')) {
      $return .= '  <img id="qwp-site-logo" src="' . get_theme_mod('quasarwp_theme_logo') . '"';
      $return .= '    class="' . esc_attr(get_theme_mod('quasarwp_theme_logo_class')) . '"';
      $return .= '    alt="' . esc_attr(get_bloginfo('name', 'display')) . '">';
    } else {
      if (has_site_icon()) {
        $return .= '  <q-avatar>';
        $return .= '    <img src="' . get_site_icon_url() . '">';
        $return .= '  </q-avatar>';
      }
      $return .= '  <span class="qwp-blogname">' . get_bloginfo('name') . '</span>';
    }
    $return .= '</q-toolbar-title>';
    return $return;
  }

  function qwpCustomItem($data, $url)
  {
    $json = json_decode($data);
    $title = !empty($json->title) ? $json->title : false;
    $icon = !empty($json->icon) ? $json->icon : false;
    $avatar = !empty($json->avatar) ? $json->avatar : false;
    $sideIcon = !empty($json->sideIcon) ? $json->sideIcon : false;
    $caption = !empty($json->caption) ? $json->caption : false;
    $target = (!empty($json->target) && $json->target == 'blank') ? 'target="_blank"' : '';

    $return = '';
    $return .= '<q-item class="qwp-custom-component" clickable tag="a" ' . $target . ' rel="noopener" href="' . $url . '">';
    if ($icon) {
      $return .= '  <q-item-section avatar>';
      $return .= '  <q-icon ';
      $return .= isset($icon->name) ? 'name="' . $icon->name . '" ' : '';
      $return .= isset($icon->color) ? 'color="' . $icon->color . '" ' : '';
      $return .= isset($icon->size) ? 'size="' . $icon->size . '" ' : '';
      $return .= '></q-icon>';
      $return .= '  </q-item-section>';
    } else if ($avatar) {
      $return .= '<q-item-section avatar>';
      $return .= '  <q-avatar ';
      $return .= isset($avatar->icon) ? 'icon="' . $avatar->icon . '" ' : '';
      $return .= isset($avatar->color) ? 'color="' . $avatar->color . '" ' : '';
      $return .= isset($avatar->textColor) ? 'text-color="' . $avatar->textColor . '" ' : '';
      $return .= isset($avatar->size) ? 'size="' . $avatar->size . '" ' : '';
      $return .= isset($avatar->rounded) ? 'rounded ' : '';
      $return .= '>';
      $return .= isset($avatar->content) ? $avatar->content : '';;
      $return .= isset($avatar->img) ? '<img src="' . $avatar->img . '">' : '';;
      $return .= '</q-avatar>';
      $return .= '</q-item-section>';
    }
    $return .= '  <q-item-section>';
    if ($title) {
      $return .= '    <q-item-label>' . $title . '</q-item-label>';
    }
    if ($caption) {
      $return .= '    <q-item-label caption>' . $caption . '</q-item-label>';
    }
    $return .= '  </q-item-section>';
    if ($sideIcon) {
      $return .= '<q-item-section side>';
      $return .= '  <q-icon ';
      $return .= isset($sideIcon->name) ? 'name="' . $sideIcon->name . '" ' : '';
      $return .= isset($sideIcon->color) ? 'color="' . $sideIcon->color . '" ' : '';
      $return .= '></q-icon>';
      $return .= '</q-item-section>';
    }
    $return .= '</q-item>';
    return $return;
  }
}
