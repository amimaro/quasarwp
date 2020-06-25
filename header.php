<!DOCTYPE html>
<html>

<head>
  <title><?php echo get_bloginfo('name'); ?></title>

  <meta charset="utf-8">
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="icon" type="image/png" sizes="128x128" href="statics/icons/favicon-128x128.png">
  <link rel="icon" type="image/png" sizes="96x96" href="statics/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="32x32" href="statics/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="statics/icons/favicon-16x16.png">
  <link rel="icon" type="image/ico" href="statics/icons/favicon.ico"> -->

  <?php
  wp_head();
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

  <style>
    .post-card {
      transition: transform .2s;
    }

    .post-card:hover {
      transform: scale(1.02);
    }

    .post-card-horizontal {
      width: 90%;
    }

    .post-card-vertical {
      max-width: 31%;
    }

    .list-unbullet {
      list-style-type: none;
    }

    .text-quasarwp-github {
      color: #000000;
    }

    .bg-quasarwp-github {
      background: #000000;
    }

    .text-quasarwp-facebook {
      color: #3b5998;
    }

    .bg-quasarwp-facebook {
      background: #3b5998;
    }

    .text-quasarwp-twitter {
      color: #1da1f2;
    }

    .bg-quasarwp-twitter {
      background: #1da1f2;
    }

    .text-quasarwp-instagram {
      color: #7232bd;
    }

    .bg-quasarwp-instagram {
      background: #7232bd;
    }

    .text-quasarwp-mail {
      color: #03c2fc;
    }

    .bg-quasarwp-mail {
      background: #03c2fc;
    }

    .text-quasarwp-pinterest {
      color: #bd081c;
    }

    .bg-quasarwp-pinterest {
      background: #bd081c;
    }

    .text-quasarwp-linkedin {
      color: #007bb5;
    }

    .bg-quasarwp-linkedin {
      background: #007bb5;
    }

    .text-quasarwp-whatsapp {
      color: #25d366;
    }

    .bg-quasarwp-whatsapp {
      background: #25d366;
    }

    .text-quasarwp-reddit {
      color: #ff4500;
    }

    .bg-quasarwp-reddit {
      background: #ff4500;
    }

    .text-quasarwp-telegram {
      color: #0088cc;
    }

    .bg-quasarwp-telegram {
      background: #0088cc;
    }

    .text-quasarwp-snapchat {
      color: #fffc00;
    }

    .bg-quasarwp-snapchat {
      background: #fffc00;
    }

    .text-quasarwp-tumblr {
      color: #35465d;
    }

    .bg-quasarwp-tumblr {
      background: #35465d;
    }
  </style>
</head>
