<!DOCTYPE html>
<html>

<head>

  <?php wp_head(); ?>

  <meta charset="utf-8">
  <meta name="description" content="<?php echo esc_html(get_bloginfo('description')); ?>">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  $components = get_option('quasarwp-settings');

  $rtl = isset($components['rtl-css-support']) ? '.rtl' : '';
  $robotoFont = isset($components['roboto-font']) ? 'Roboto:100,300,400,500,700,900|' : '';
  $materialIcons = isset($components['material-icons']) ? 'Material+Icons|' : '';
  $materialIconsOutlined = isset($components['material-icons-outlined']) ? 'Material+Icons+Outlined|' : '';
  $materialIconsRound = isset($components['material-icons-round']) ? 'Material+Icons+Round|' : '';
  $materialIconsSharp = isset($components['material-icons-sharp']) ? 'Material+Icons+Sharp|' : '';

  if (strlen($robotoFont . $materialIcons . $materialIconsOutlined . $materialIconsRound . $materialIconsSharp) > 0)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=' . $robotoFont . $materialIcons . $materialIconsOutlined . $materialIconsRound . $materialIconsSharp);
  if (isset($components['animate'])) wp_enqueue_style('animate', 'https://cdn.jsdelivr.net/npm/animate.css@^4.0.0/animate.min.css');
  if (isset($components['mdiv5'])) wp_enqueue_style('mdiv5', 'https://cdn.jsdelivr.net/npm/@mdi/font@^5.0.0/css/materialdesignicons.min.css');
  if (isset($components['fontawesomev5'])) wp_enqueue_style('fontawesomev5', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css');
  if (isset($components['ioniconsv4'])) wp_enqueue_style('ioniconsv4', 'https://cdn.jsdelivr.net/npm/ionicons@^4.0.0/dist/css/ionicons' . '.min.css');
  if (isset($components['eva-icons'])) wp_enqueue_style('eva-icons', 'https://cdn.jsdelivr.net/npm/eva-icons@^1.0.0/style/eva-icons.css');
  if (isset($components['themify'])) wp_enqueue_style('themify', 'https://themify.me/wp-content/themes/themify-v32/themify-icons/themify-icons.css');
  if (isset($components['line-awesome'])) wp_enqueue_style('line-awesome', 'https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css');

  wp_enqueue_style('quasar', 'https://cdn.jsdelivr.net/npm/quasar@1.12.8/dist/quasar' . $rtl . '.min.css');
  ?>

  <?php wp_enqueue_style('style', get_stylesheet_uri()); ?>
</head>
