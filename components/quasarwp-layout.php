<q-header :reveal="qwpComputedHeaderReveal" :elevated="qwpSelectSeparator('elevated', 'header')"
  :bordered="qwpSelectSeparator('bordered', 'header')">
  <q-toolbar>

    <q-btn id="qwp-btn-left-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpLeft = !qwpLeft"></q-btn>

    <?php echo $headerMenu; ?>

    <q-btn id="qwp-btn-right-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpRight = !qwpRight"></q-btn>

  </q-toolbar>

  <q-tabs :align="qwpDataTabsAlign">
    <?php echo $tabMenu; ?>
  </q-tabs>

</q-header>

<q-footer :reveal="qwpComputedFooterReveal" :elevated="qwpSelectSeparator('elevated', 'footer')"
  :bordered="qwpSelectSeparator('bordered', 'footer')">
  <q-toolbar>
    <?php echo $footerMenu; ?>
  </q-toolbar>
</q-footer>

<q-drawer v-model="qwpLeft" side="left" :show-if-above="qwpComputedLeftDrawerShowIfAbove"
  :elevated="qwpSelectSeparator('elevated', 'ldrawer')" :bordered="qwpSelectSeparator('bordered', 'ldrawer')"
  :overlay="qwpComputedLeftDrawerOverlay" :behavior="qwpDataLeftDrawerBehavior">
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-left" class="menu-list">
      <?php echo $leftMenu; ?>
    </q-list>
  </q-scroll-area>
</q-drawer>

<q-drawer v-model="qwpRight" side="right" :show-if-above="qwpComputedRightDrawerShowIfAbove"
  :elevated="qwpSelectSeparator('elevated', 'rdrawer')" :bordered="qwpSelectSeparator('bordered', 'rdrawer')"
  :overlay="qwpComputedRightDrawerOverlay" :behavior="qwpDataRightDrawerBehavior">
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-right" class="menu-list">
      <?php echo $rightMenu; ?>
    </q-list>
  </q-scroll-area>
</q-drawer>
