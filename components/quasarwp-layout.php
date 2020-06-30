<q-header :reveal="qwpComputedHeaderReveal" :elevated="qwpSelectSeparator('elevated', 'header')" :bordered="qwpSelectSeparator('bordered', 'header')">
  <q-toolbar>

    <q-btn id="qwp-btn-left-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpLeft = !qwpLeft"></q-btn>

    <q-toolbar-title class="cursor-pointer" @click="quasarwpRouteTo('/')">
      <?php
      if (get_theme_mod('quasarwp_theme_logo')) : ?>
        <img src="<?php echo get_theme_mod('quasarwp_theme_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
      <?php
      else : ?>
        <?php if (has_site_icon()) : ?>
          <q-avatar>
            <img src="<?php echo get_site_icon_url(); ?>">
          </q-avatar>
        <?php endif; ?>
        <span class="qwp-blogname">
          <?php bloginfo('name'); ?>
        </span>
      <?php endif; ?>
    </q-toolbar-title>

    <?php if (isset($setting['qheader-search'])) { ?>
      <q-space></q-space>
      <form role="search" method="get" id="qwp-form-search" action="<?php echo get_site_url(); ?>" class="qwp-form-search">
        <q-input name="s" id="s" class="qwp-input-search" dense standout="bg-primary" v-model="qwpSearch" placeholder="<?php _e('Search'); ?>">
          <template v-slot:append>
            <q-icon v-if="qwpSearch === ''" name="search"></q-icon>
            <q-icon v-else name="clear" class="cursor-pointer" @click="qwpSearch = ''"></q-icon>
          </template>
        </q-input>
      </form>
    <?php } ?>

    <?php echo $headerMenu; ?>

    <q-btn id="qwp-btn-right-menu" flat dense round icon="menu" aria-label="Menu" @click="qwpRight = !qwpRight"></q-btn>
  </q-toolbar>
  <?php if (isset($setting['qtabs'])) { ?>
    <q-tabs align="<?php echo $setting['qtabs-position']; ?>">
      <?php echo $tabMenu; ?>
    </q-tabs>
  <?php } ?>
</q-header>

<q-footer :reveal="qwpComputedFooterReveal" :elevated="qwpSelectSeparator('elevated', 'footer')" :bordered="qwpSelectSeparator('bordered', 'footer')">
  <q-toolbar>
    <q-toolbar-title class="cursor-pointer" @click="quasarwpRouteTo('/')">
      <?php
      if (get_theme_mod('quasarwp_theme_logo')) : ?>
        <img src="<?php echo get_theme_mod('quasarwp_theme_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
      <?php
      else : ?>
        <?php if (has_site_icon()) : ?>
          <q-avatar>
            <img src="<?php echo get_site_icon_url(); ?>">
          </q-avatar>
        <?php endif; ?>
        <span class="qwp-blogname">
          <?php bloginfo('name'); ?>
        </span>
      <?php endif; ?>
    </q-toolbar-title>

    <?php echo $footerMenu; ?>
  </q-toolbar>
</q-footer>

<q-drawer v-model="qwpLeft" side="left" :show-if-above="qwpComputedLeftDrawerShowIfAbove" <?php echo $setting['lqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['lqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['lqdrawer-behavior']); ?>>
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-left" class="menu-list">
      <?php echo $leftMenu; ?>
    </q-list>
  </q-scroll-area>
</q-drawer>

<q-drawer v-model="qwpRight" side="right" :show-if-above="qwpComputedRightDrawerShowIfAbove" <?php echo $setting['rqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['rqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['rqdrawer-behavior']); ?>>
  <q-scroll-area class="fit">
    <q-list padding id="menu-list-right" class="menu-list">
      <?php echo $rightMenu; ?>
    </q-list>
  </q-scroll-area>
</q-drawer>
