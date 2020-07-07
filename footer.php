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

wp_enqueue_script('pollyfills', get_template_directory_uri() . '/vendor/quasar-1.12.8/package/dist/quasar.ie.polyfills.umd' . $minified . '.js');
wp_enqueue_script('vue', get_template_directory_uri() . '/vendor/vue-2.6.11/package/dist/vue' . $minified . '.js');
wp_enqueue_script('quasar', get_template_directory_uri() . '/vendor/quasar-1.12.8/package/dist/quasar.umd' . $modernEs6 . $minified . '.js');
if ($language != 'en-us')
  wp_enqueue_script($language, get_template_directory_uri() . '/vendor/quasar-1.12.8/package/dist/lang/' . $language . '.umd.min.js');
if ($iconSet != 'material')
  wp_enqueue_script($iconSet, get_template_directory_uri() . '/vendor/quasar-1.12.8/package/dist/icon-set/' . $iconSet . '.umd.min.js');

wp_footer();
?>
</body>

</html>
