<script>
  window.quasarConfig = {
    brand: {
      primary: '<?php echo $setting['theme-primary'] ?>',
      secondary: '<?php echo $setting['theme-secondary'] ?>',
      accent: '<?php echo $setting['theme-accent'] ?>',
      dark: '<?php echo $setting['theme-dark'] ?>',
      positive: '<?php echo $setting['theme-positive'] ?>',
      negative: '<?php echo $setting['theme-negative'] ?>',
      info: '<?php echo $setting['theme-info'] ?>',
      warning: '<?php echo $setting['theme-warning'] ?>'
    }
  }
</script>

<?php

echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.ie.polyfills.umd' . $minified . '.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue' . $minified . '.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.4/dist/quasar.umd' . $modernEs6 . $minified . '.js"></script>';
if ($language != 'en-us')
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/lang/' . $language . '.umd' . $minified . '.js"></script>';
if ($iconSet != 'material')
  echo '<script src="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/icon-set/' . $iconSet . '.umd' . $minified . '.js"></script>';
