<!DOCTYPE html>
<html>

<head>

  <?php wp_head(); ?>

  <meta charset="utf-8">
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  $components = get_option('quasarwp-settings');

  $rtl = isset($components['rtl-css-support']) ? '.rtl' : '';
  $minified = isset($components['minified-files']) ? '.min' : '';
  $robotoFont = isset($components['roboto-font']) ? 'Roboto:100,300,400,500,700,900|' : '';
  $materialIcons = isset($components['material-icons']) ? 'Material+Icons|' : '';
  $materialIconsOutlined = isset($components['material-icons-outlined']) ? 'Material+Icons+Outlined|' : '';
  $materialIconsRound = isset($components['material-icons-round']) ? 'Material+Icons+Round|' : '';
  $materialIconsSharp = isset($components['material-icons-sharp']) ? 'Material+Icons+Sharp|' : '';

  if (strlen($robotoFont . $materialIcons . $materialIconsOutlined . $materialIconsRound . $materialIconsSharp) > 0)
    echo '<link href="https://fonts.googleapis.com/css?family=' . $robotoFont . $materialIcons . $materialIconsOutlined . $materialIconsRound . $materialIconsSharp . '" rel="stylesheet" type="text/css">';
  if (isset($components['animate'])) echo '<link href="https://cdn.jsdelivr.net/npm/animate.css@^4.0.0/animate' . $minified . '.css" rel="stylesheet" type="text/css">';
  if (isset($components['mdiv5'])) echo '<link href="https://cdn.jsdelivr.net/npm/@mdi/font@^5.0.0/css/materialdesignicons' . $minified . '.css" rel="stylesheet" type="text/css">';
  if (isset($components['fontawesomev5'])) echo '<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" type="text/css">';
  if (isset($components['ioniconsv4'])) echo '<link href="https://cdn.jsdelivr.net/npm/ionicons@^4.0.0/dist/css/ionicons' . $minified . '.css" rel="stylesheet" type="text/css">';
  if (isset($components['eva-icons'])) echo '<link href="https://cdn.jsdelivr.net/npm/eva-icons@^1.0.0/style/eva-icons.css" rel="stylesheet" type="text/css">';
  if (isset($components['themify'])) echo '<link href="https://themify.me/wp-content/themes/themify-v32/themify-icons/themify-icons.css" rel="stylesheet" type="text/css">';
  if (isset($components['line-awesome'])) echo '<link href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all' . $minified . '.css" rel="stylesheet" type="text/css">';

  echo '<link href="https://cdn.jsdelivr.net/npm/quasar@1.12.5/dist/quasar' . $rtl . $minified . '.css" rel="stylesheet" type="text/css">';
  ?>

  <?php wp_enqueue_style('style', get_stylesheet_uri()); ?>
</head>

