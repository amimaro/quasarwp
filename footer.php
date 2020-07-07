<script>
  document.documentElement.style.setProperty('--q-color-primary', '<?php echo get_theme_mod('theme_primary'); ?>');
  document.documentElement.style.setProperty('--q-color-secondary', '<?php echo get_theme_mod('theme_secondary'); ?>');
  document.documentElement.style.setProperty('--q-color-accent', '<?php echo get_theme_mod('theme_accent'); ?>');
  document.documentElement.style.setProperty('--q-color-dark', '<?php echo get_theme_mod('theme_dark'); ?>');
  document.documentElement.style.setProperty('--q-color-positive', '<?php echo get_theme_mod('theme_positive'); ?>');
  document.documentElement.style.setProperty('--q-color-negative', '<?php echo get_theme_mod('theme_negative'); ?>');
  document.documentElement.style.setProperty('--q-color-info', '<?php echo get_theme_mod('theme_info'); ?>');
  document.documentElement.style.setProperty('--q-color-warning', '<?php echo get_theme_mod('theme_warning'); ?>');
</script>

<?php
$setting = get_option('quasarwp-settings');
$modernEs6 = isset($setting['modern-es6']) ? '.modern' : '';
$language = $setting['language'];
$iconSet = $setting['icon-set'];

wp_enqueue_script('pollyfills', 'https://cdn.jsdelivr.net/npm/quasar@1.12.8/dist/quasar.ie.polyfills.umd.min.js');
wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.min.js');
wp_enqueue_script('quasar', 'https://cdn.jsdelivr.net/npm/quasar@1.12.8/dist/quasar.umd' . $modernEs6 . '.min.js');
if ($language != 'en-us')
  wp_enqueue_script($language, 'https://cdn.jsdelivr.net/npm/quasar@1.12.8/dist/lang/' . $language . '.umd' . '.js');
if ($iconSet != 'material')
  wp_enqueue_script($iconSet, 'https://cdn.jsdelivr.net/npm/quasar@1.12.8/dist/icon-set/' . $iconSet . '.umd' . '.js');

wp_footer();
?>
</body>

</html>
