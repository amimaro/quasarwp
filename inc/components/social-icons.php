<?php

$socialMedias = array(
  'whatsapp', 'telegram', 'facebook', 'twitter', 'e-mail', 'linkedin', 'reddit', 'pinterest'
);
$defaultSocialMedias = array('', 'whatsapp', 'facebook', 'twitter', 'e-mail');
$socialMediasClasses = array(
  'fab fa-whatsapp',
  'fab fa-telegram-plane',
  'fab fa-facebook-f',
  'fab fa-twitter',
  'far fa-envelope',
  'fab fa-linkedin-in',
  'fab fa-reddit-alien',
  'fab fa-pinterest-p',
);

$wp_customize->add_section(
  'quasarwp_layout_social',
  array(
    'title'       => __('Social Icons'),
    'priority'    => 109.1,
    'capability'  => 'edit_theme_options',
    'description' => __('Allows you to customize social icons layout for QuasarWP.'),
  )
);

foreach ($socialMedias as $i => $socialMedia) {
  $wp_customize->add_setting(
    'social_' . $socialMedia . '_enabled',
    array(
      'default'    => array_search($socialMedia, $defaultSocialMedias) ? true : false,
      'type'       => 'theme_mod',
      'capability' => 'edit_theme_options',
      'transport'  => 'postMessage',
    )
  );
  $wp_customize->add_control('quasarwp_social_' . $socialMedia . '_enabled', array(
    'label' => __(ucfirst($socialMedia)),
    'section' => 'quasarwp_layout_social',
    'settings' => 'social_' . $socialMedia . '_enabled',
    'type' => 'checkbox',
    'priority'   => $i + 1.1,
  ));

  $wp_customize->add_setting(
    'social_' . $socialMedia . '_class',
    array(
      'default'    => $socialMediasClasses[$i],
      'type'       => 'theme_mod',
      'capability' => 'edit_theme_options',
      'transport'  => 'postMessage',
    )
  );

  $wp_customize->add_control(
    'quasarwp_social_' . $socialMedia . '_class',
    array(
      'label' => __(ucfirst($socialMedia) . ' icon class'),
      'section' => 'quasarwp_layout_social',
      'settings' => 'social_' . $socialMedia . '_class',
      'type' => 'text',
      'priority'   => $i + 1.2,
    )
  );
}

$wp_customize->get_setting('social_whatsapp_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_telegram_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_facebook_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_twitter_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_e-mail_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_linkedin_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_reddit_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_pinterest_enabled')->transport = 'postMessage';
$wp_customize->get_setting('social_whatsapp_class')->transport = 'postMessage';
$wp_customize->get_setting('social_telegram_class')->transport = 'postMessage';
$wp_customize->get_setting('social_facebook_class')->transport = 'postMessage';
$wp_customize->get_setting('social_twitter_class')->transport = 'postMessage';
$wp_customize->get_setting('social_e-mail_class')->transport = 'postMessage';
$wp_customize->get_setting('social_linkedin_class')->transport = 'postMessage';
$wp_customize->get_setting('social_reddit_class')->transport = 'postMessage';
$wp_customize->get_setting('social_pinterest_class')->transport = 'postMessage';
