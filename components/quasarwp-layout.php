<?php if (isset($setting['qheader'])) { ?>
  <q-header <?php echo get_reveal_option($setting['qheader-reveal']); ?> <?php echo $setting['qheader-separator']; ?>>
    <q-toolbar>
      <?php if (isset($setting['lqdrawer'])) { ?>
        <q-btn flat dense round icon="menu" aria-label="Menu" @click="qwpLeft = !qwpLeft"></q-btn>
      <?php } ?>

      <q-toolbar-title class="cursor-pointer" @click="quasarwpRouteTo('/')">
        <?php if (isset($setting['qheader-icon'])) { ?>
          <q-avatar>
            <img src="<?php echo get_site_icon_url(); ?>">
          </q-avatar>
        <?php } ?>
        <?php echo get_bloginfo('name'); ?>
      </q-toolbar-title>

      <?php if (isset($setting['rqdrawer'])) { ?>
        <q-btn flat dense round icon="menu" aria-label="Menu" @click="qwpRight = !qwpRight"></q-btn>
      <?php } ?>
    </q-toolbar>
    <?php if (isset($setting['qtabs'])) { ?>
      <q-tabs align="<?php echo $setting['qtabs-position']; ?>">
        <?php echo $tabMenu; ?>
      </q-tabs>
    <?php } ?>
  </q-header>
<?php } ?>

<?php if (isset($setting['qfooter'])) { ?>
  <q-footer <?php echo get_reveal_option($setting['qfooter-reveal']); ?> <?php echo $setting['qfooter-separator']; ?>>
    <q-toolbar>
      <q-toolbar-title class="cursor-pointer" @click="quasarwpRouteTo('/')">
        <?php if (isset($setting['qfooter-icon'])) { ?>
          <q-avatar>
            <img src="<?php echo get_site_icon_url(); ?>">
          </q-avatar>
        <?php } ?>
        <?php echo get_bloginfo('name'); ?>
      </q-toolbar-title>
    </q-toolbar>
  </q-footer>
<?php } ?>

<?php if (isset($setting['lqdrawer'])) { ?>
  <q-drawer v-model="qwpLeft" side="left" <?php echo set_qdrawer_show($setting['lqdrawer-show']) ?> <?php echo $setting['lqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['lqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['lqdrawer-behavior']); ?>>
    <q-scroll-area class="fit">
      <q-list padding id="menu-list-left" class="menu-list">
        <?php echo $leftMenu; ?>
      </q-list>
    </q-scroll-area>
  </q-drawer>
<?php } ?>

<?php if (isset($setting['rqdrawer'])) { ?>
  <q-drawer v-model="qwpRight" side="right" <?php echo set_qdrawer_show($setting['rqdrawer-show']) ?> <?php echo $setting['rqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['rqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['rqdrawer-behavior']); ?>>
    <q-scroll-area class="fit">
      <q-list padding id="menu-list-right" class="menu-list">
        <?php echo $rightMenu; ?>
      </q-list>
    </q-scroll-area>
  </q-drawer>
<?php } ?>
