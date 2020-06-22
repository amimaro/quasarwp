<?php /* Template Name: QuasarWP */ ?>

<?php

get_header();

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
?>


<body <?php body_class(); ?>>
  <div id="q-app">
    <q-layout view="<?php echo $setting['layout']; ?>">

      <?php if (isset($setting['qheader'])) { ?>
        <q-header <?php echo $setting['qheader-separator']; ?>>
          <q-toolbar>
            <?php if (isset($setting['lqdrawer'])) { ?>
              <q-btn flat dense round icon="menu" aria-label="Menu" @click="left = !left"></q-btn>
            <?php } ?>

            <q-toolbar-title>
              <?php echo get_bloginfo('name'); ?>
            </q-toolbar-title>

            <?php if (isset($setting['rqdrawer'])) { ?>
              <q-btn flat dense round icon="menu" aria-label="Menu" @click="right = !right"></q-btn>
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
        <q-footer <?php echo $setting['qfooter-separator']; ?>>
          <q-toolbar>
            <q-toolbar-title>
              <q-avatar>
                <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
              </q-avatar>
              <?php echo get_bloginfo('name'); ?>
            </q-toolbar-title>
          </q-toolbar>
        </q-footer>
      <?php } ?>

      <?php if (isset($setting['lqdrawer'])) { ?>
        <q-drawer v-model="left" side="left" <?php echo set_qdrawer_show($setting['lqdrawer-show']) ?> <?php echo $setting['lqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['lqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['lqdrawer-behavior']); ?>>
          <q-scroll-area class="fit">
            <q-list padding id="menu-list-left" class="menu-list">
              <?php echo $leftMenu; ?>
            </q-list>
          </q-scroll-area>
        </q-drawer>
      <?php } ?>

      <?php if (isset($setting['rqdrawer'])) { ?>
        <q-drawer v-model="right" side="right" <?php echo set_qdrawer_show($setting['rqdrawer-show']) ?> <?php echo $setting['rqdrawer-separator']; ?> <?php echo set_qdrawer_overlay($setting['rqdrawer-overlay']); ?> <?php echo set_qdrawer_behavior($setting['rqdrawer-behavior']); ?>>
          <q-scroll-area class="fit">
            <q-list padding id="menu-list-right" class="menu-list">
              <?php echo $rightMenu; ?>
            </q-list>
          </q-scroll-area>
        </q-drawer>
      <?php } ?>

      <q-page-container>
        <q-page padding>
          <q-card>
            <q-card-section class="q-pa-lg q-gutter-md">
              <p class="text-h3 text-weight-light"><?php _e('Page not found'); ?> :(</p>
              <div align="right">
                <q-btn label="<?php _e('Homepage'); ?>" color="primary" @click="themeRouteTo('/')"></q-btn>
              </div>
            </q-card-section>
          </q-card>
        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <?php get_footer(); ?>

  <?php

  if (isset($setting['qco'])) echo '';

  ?>
  <?php
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.ie.polyfills.umd' . $minified . '.js"></script>';
  echo '<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue' . $minified . '.js"></script>';
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.umd' . $modernEs6 . $minified . '.js"></script>';
  if ($language != 'en-us')
    echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/lang/' . $language . '.umd' . $minified . '.js"></script>';
  if ($iconSet != 'material')
    echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/icon-set/' . $iconSet . '.umd' . $minified . '.js"></script>';
  ?>

  <script>
    new Vue({
      el: '#q-app',
      data: function() {
        return {
          isMobile: this.$q.platform.is.mobile,
          isDesktop: this.$q.platform.is.desktop,
          left: false,
          right: false
        }
      },
      methods: {
        themeRouteTo(permalink) {
          document.location.href = permalink
        }
      }
    })
  </script>
