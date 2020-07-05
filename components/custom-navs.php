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
      $json = json_decode($title);
      $title = !empty($json->title) ? $json->title : false;
      $icon = !empty($json->icon) ? $json->icon : false;
      $caption = !empty($json->caption) ? $json->caption : false;
      $target = (!empty($json->target) && $json->target == 'blank') ? 'target="_blank"' : '';

      $output .= $this->qwpCustom(array(
        'title'   =>  $title,
        'url'     =>  $url,
        'icon'    =>  $icon,
        'caption' =>  $caption
      ));
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

  function qwpCustom($args)
  {
    $return = '';
    $return .= '<q-item class="qwp-custom-component" clickable tag="a" ' . $args['target'] . ' rel="noopener" href="' . $args['url'] . '">';
    if ($args['icon']) {
      $return .= '  <q-item-section avatar>';
      $return .= '    <q-icon name="' . $args['icon'] . '"></q-icon>';
      $return .= '  </q-item-section>';
    }
    $return .= '  <q-item-section>';
    if ($args['title']) {
      $return .= '    <q-item-label>' . $args['title'] . '</q-item-label>';
    }
    if ($args['caption']) {
      $return .= '    <q-item-label caption>' . $args['caption'] . '</q-item-label>';
    }
    $return .= '  </q-item-section>';
    $return .= '</q-item>';
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
}
