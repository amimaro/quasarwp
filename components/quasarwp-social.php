<?php if (isset($setting['posts-show-social'])) { ?>
  <div class="q-my-xl q-gutter-sm" align="center">
    <?php if (isset($setting['whatsapp'])) { ?>
      <q-btn round color="quasarwp-whatsapp" glossy icon="<?php echo $setting['whatsapp-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['telegram'])) { ?>
      <q-btn round color="quasarwp-telegram" glossy icon="<?php echo $setting['telegram-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['facebook'])) { ?>
      <q-btn round color="quasarwp-facebook" glossy icon="<?php echo $setting['facebook-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['twitter'])) { ?>
      <q-btn round color="quasarwp-twitter" glossy icon="<?php echo $setting['twitter-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['instagram'])) { ?>
      <q-btn round color="quasarwp-instagram" glossy icon="<?php echo $setting['instagram-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['github'])) { ?>
      <q-btn round color="quasarwp-github" glossy icon="<?php echo $setting['github-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['linkedin'])) { ?>
      <q-btn round color="quasarwp-linkedin" glossy icon="<?php echo $setting['linkedin-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['reddit'])) { ?>
      <q-btn round color="quasarwp-reddit" glossy icon="<?php echo $setting['reddit-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['google'])) { ?>
      <q-btn round color="quasarwp-google" glossy icon="<?php echo $setting['google-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['snapchat'])) { ?>
      <q-btn round color="quasarwp-snapchat" glossy icon="<?php echo $setting['snapchat-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['pinterest'])) { ?>
      <q-btn round color="quasarwp-pinterest" glossy icon="<?php echo $setting['pinterest-icon'] ?>"></q-btn>
    <?php } ?>
    <?php if (isset($setting['tumblr'])) { ?>
      <q-btn round color="quasarwp-tumblr" glossy icon="<?php echo $setting['tumblr-icon'] ?>"></q-btn>
    <?php } ?>
  </div>
<?php } ?>