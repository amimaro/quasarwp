<?php
$postId = esc_html(get_the_ID());
$postTitle = esc_html(get_the_title($postId));
$permalink = esc_html(get_permalink());
$tags = esc_html(comma_tags(get_the_tags(), false));

// @codingStandardsIgnoreStart phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
?>

<div class="q-my-xl q-gutter-sm" align="center">
  <q-btn id="social-icon-whatsapp" round color="quasarwp-whatsapp" glossy
    icon="<?php echo esc_html(get_theme_mod('social_whatsapp_class')) ?>" data-sharer="whatsapp"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-telegram" round color="quasarwp-telegram" glossy
    icon="<?php echo esc_html(get_theme_mod('social_telegram_class')) ?>" data-sharer="telegram"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-facebook" round color="quasarwp-facebook" glossy
    icon="<?php echo esc_html(get_theme_mod('social_facebook_class')) ?>" data-sharer="facebook"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-twitter" round color="quasarwp-twitter" glossy
    icon="<?php echo esc_html(get_theme_mod('social_twitter_class')) ?>" data-sharer="twitter"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-e-mail" round color="quasarwp-mail" glossy
    icon="<?php echo esc_html(get_theme_mod('social_e-mail_class')) ?>" data-sharer="email"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-linkedin" round color="quasarwp-linkedin" glossy
    icon="<?php echo esc_html(get_theme_mod('social_linkedin_class')) ?>" data-sharer="linkedin"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-reddit" round color="quasarwp-reddit" glossy
    icon="<?php echo esc_html(get_theme_mod('social_reddit_class')) ?>" data-sharer="reddit"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
  <q-btn id="social-icon-pinterest" round color="quasarwp-pinterest" glossy
    icon="<?php echo esc_html(get_theme_mod('social_pinterest_class')) ?>" data-sharer="pinterest"
    data-title="<?php echo $postTitle; ?>" data-hashtags="<?php echo $tags; ?>" data-url="<?php echo $permalink; ?>">
  </q-btn>
</div>

<?php
// @codingStandardsIgnoreEnd phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

wp_enqueue_script('sharer', get_template_directory_uri() . '/lib/sharer/sharer.min.js');
?>
