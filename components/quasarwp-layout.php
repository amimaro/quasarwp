<?php
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
    'walker' => new Custom_Nav_Menu('header')
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
    'walker' => new Custom_Nav_Menu('footer')
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
    'walker' => new Custom_Nav_Menu('tab')
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
    'walker' => new Custom_Nav_Menu('left')
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
    'walker' => new Custom_Nav_Menu('right')
  ));
}
?>

<q-header :reveal="qwpComputedHeaderReveal" :elevated="qwpSelectSeparator('elevated', 'header')" :bordered="qwpSelectSeparator('bordered', 'header')">
  <q-toolbar>

    <q-btn id="qwp-btn-left-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpLeft = !qwpLeft"></q-btn>

    <?php echo $headerMenu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> 

    <q-btn id="qwp-btn-right-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpRight = !qwpRight"></q-btn>

  </q-toolbar>

  <q-tabs :align="qwpDataTabsAlign">
    <?php echo $tabMenu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
  </q-tabs>

</q-header>

<q-footer :reveal="qwpComputedFooterReveal" :elevated="qwpSelectSeparator('elevated', 'footer')" :bordered="qwpSelectSeparator('bordered', 'footer')">
  <q-toolbar>
    <?php echo $footerMenu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
  </q-toolbar>
</q-footer>

<q-drawer v-model="qwpLeft" side="left" :show-if-above="qwpComputedLeftDrawerShowIfAbove" :elevated="qwpSelectSeparator('elevated', 'ldrawer')" :bordered="qwpSelectSeparator('bordered', 'ldrawer')" :overlay="qwpComputedLeftDrawerOverlay" :behavior="qwpDataLeftDrawerBehavior">
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-left" class="menu-list">
      <?php echo $leftMenu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </q-list>
  </q-scroll-area>
</q-drawer>

<q-drawer v-model="qwpRight" side="right" :show-if-above="qwpComputedRightDrawerShowIfAbove" :elevated="qwpSelectSeparator('elevated', 'rdrawer')" :bordered="qwpSelectSeparator('bordered', 'rdrawer')" :overlay="qwpComputedRightDrawerOverlay" :behavior="qwpDataRightDrawerBehavior">
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-right" class="menu-list">
      <?php echo $rightMenu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </q-list>
  </q-scroll-area>
</q-drawer>
