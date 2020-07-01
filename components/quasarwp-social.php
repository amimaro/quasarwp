<?php
$id = get_the_ID();
$title = get_the_title($id);
$permalink = get_permalink();
$tags = comma_tags(get_the_tags(), false);
?>
<div class="q-my-xl q-gutter-sm" align="center">
  <?php if (isset($setting['whatsapp'])) { ?>
  <q-btn round color="quasarwp-whatsapp" glossy icon="<?php echo $setting['whatsapp-icon'] ?>" data-sharer="whatsapp"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['telegram'])) { ?>
  <q-btn round color="quasarwp-telegram" glossy icon="<?php echo $setting['telegram-icon'] ?>" data-sharer="telegram"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['facebook'])) { ?>
  <q-btn round color="quasarwp-facebook" glossy icon="<?php echo $setting['facebook-icon'] ?>" data-sharer="facebook"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['twitter'])) { ?>
  <q-btn round color="quasarwp-twitter" glossy icon="<?php echo $setting['twitter-icon'] ?>" data-sharer="twitter"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['mail'])) { ?>
  <q-btn round color="quasarwp-mail" glossy icon="<?php echo $setting['mail-icon'] ?>" data-sharer="email"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['linkedin'])) { ?>
  <q-btn round color="quasarwp-linkedin" glossy icon="<?php echo $setting['linkedin-icon'] ?>" data-sharer="linkedin"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['reddit'])) { ?>
  <q-btn round color="quasarwp-reddit" glossy icon="<?php echo $setting['reddit-icon'] ?>" data-sharer="reddit"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
  <?php if (isset($setting['pinterest'])) { ?>
  <q-btn round color="quasarwp-pinterest" glossy icon="<?php echo $setting['pinterest-icon'] ?>" data-sharer="pinterest"
    data-title="<?php echo $title; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <?php } ?>
</div>
<?php
  wp_enqueue_script('sharer', get_template_directory_uri() . '/vendor/sharer/sharer.min.js');
?>
