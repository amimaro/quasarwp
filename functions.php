<?php

// QUASARWP MENU

add_filter('rest_allow_anonymous_comments', '__return_true');

if (!get_option('quasarwp-settings')) {
  add_option('quasarwp-settings', array(
    'layout' => 'hHh Lpr lFf',
    'qheader' => 1,
    'qheader-separator' => 'elevated',
    'qheader-icon' => 1,
    'qfooter' => 1,
    'qfooter-separator' => 'elevated',
    'qfooter-icon' => 1,
    'lqdrawer' => 1,
    'lqdrawer-behavior' => 'none',
    'lqdrawer-separator' => 'bordered',
    'lqdrawer-show' => 1,
    'rqdrawer-behavior' => 'none',
    'rqdrawer-separator' => 'bordered',
    'roboto-font' => 1,
    'material-icons' => 1,
    'fontawesomev5' => 1,
    'minified-files' => 1,
    'language' => 'en-us',
    'icon-set' => 'material',
    'qtabs-position' => 'left',
    'frontpage-post-layout' => 'vertical',
    'frontpage-show-post-date' => 1,
    'frontpage-show-post-author' => 1,
    'frontpage-show-post-comments-counter' => 1,
    'posts-show-comments-counter' => 1,
    'posts-show-date' => 1,
    'posts-show-author' => 1,
    'posts-show-featured-img' => 1,
    'posts-show-social' => 1,
    'theme-primary' => '#027BE3',
    'theme-secondary' => '#26A69A',
    'theme-accent' => '#9C27B0',
    'theme-dark' => '#1d1d1d',
    'theme-positive' => '#21BA45',
    'theme-negative' => '#C10015',
    'theme-info' => '#31CCEC',
    'theme-warning' => '#F2C037',
    'show-loading' => 1,
    'whatsapp' => '1',
    'facebook' => '1',
    'twitter' => '1',
    'google' => '1',
    'whatsapp-icon' => 'fab fa-whatsapp',
    'telegram-icon' => 'fab fa-telegram-plane',
    'facebook-icon' => 'fab fa-facebook-f',
    'twitter-icon' => 'fab fa-twitter',
    'instagram-icon' => 'fab fa-instagram',
    'github-icon' => 'fab fa-github-alt',
    'linkedin-icon' => 'fab fa-linkedin-in',
    'reddit-icon' => 'fab fa-reddit-alien',
    'google-icon' => 'fab fa-google',
    'snapchat-icon' => 'fab fa-snapchat-ghost',
    'pinterest-icon' => 'fab fa-pinterest-p',
    'tumblr-icon' => 'fab fa-tumblr',
  ));
}

add_theme_support('menus');
add_theme_support('post-thumbnails');
register_nav_menus(
  array(
    'tab-menu' => __('Tab Menu', 'theme'),
    'left-menu' => __('Left Menu', 'theme'),
    'right-menu' => __('Right Menu', 'theme'),
  )
);
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

// Shorten Excerpt Length
function tn_custom_excerpt_length($length)
{
  return 35;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

add_action('admin_menu', 'quasarwp_menu');
function quasarwp_menu()
{
  add_menu_page('QuasarWP', 'QuasarWP', 'manage_options', 'quasarwp', 'quasarwp_settings_page', 'dashicons-editor-code', 90);
  add_action('admin_init', 'update_quasarwp');
}

function quasarwp_settings_page()
{
  if (!current_user_can('manage_options')) {
    return;
  }

  include('data/languages.php');
  include('data/icon-sets.php');
  $options = get_option('quasarwp-settings');
?>
  <h1>QuasarWP Settings</h1>
  <form method="post" action="options.php">
    <?php settings_fields('quasarwp-settings'); ?>
    <?php do_settings_sections('quasarwp-settings'); ?>
    <table class="form-table">
      <tr>
        <th scope="row">General:</th>
        <td>
          <div>
            <label for="quasarwp-settings-show-loading" style="padding-right: 20px;">
              <input name="quasarwp-settings[show-loading]" type="checkbox" value="1" <?php checked(isset($options['show-loading'])); ?> id="quasarwp-settings-show-loading" />
              Show Loading Overlay
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Layout view:</th>
        <td>
          <input type="text" name="quasarwp-settings[layout]" value="<?php echo $options['layout']; ?>" />
        </td>
      </tr>
      <tr>
        <th scope="row">Modules:</th>
        <td>
          <div>
            <label for="quasarwp-settings-roboto-font" style="padding-right: 20px;">
              <input name="quasarwp-settings[roboto-font]" type="checkbox" value="1" <?php checked(isset($options['roboto-font'])); ?> id="quasarwp-settings-roboto-font" />
              Roboto Font
            </label>
            <label for="quasarwp-settings-animate" style="padding-right: 20px;">
              <input name="quasarwp-settings[animate]" type="checkbox" value="1" <?php checked(isset($options['animate'])); ?> id="quasarwp-settings-animate" />
              Animate.css
            </label>
          </div>
          <hr>
          <div style="padding-top: 10px;">
            <label for="quasarwp-settings-material-icons" style="padding-right: 20px;">
              <input name="quasarwp-settings[material-icons]" type="checkbox" value="1" <?php checked(isset($options['material-icons'])); ?> id="quasarwp-settings-material-icons" />
              Material Icons
            </label>
            <label for="quasarwp-settings-material-icons-outlined" style="padding-right: 20px;">
              <input name="quasarwp-settings[material-icons-outlined]" type="checkbox" value="1" <?php checked(isset($options['material-icons-outlined'])); ?> id="quasarwp-settings-material-icons-outlined" />
              Material Icons (Outlined)
            </label>
            <label for="quasarwp-settings-material-icons-round" style="padding-right: 20px;">
              <input name="quasarwp-settings[material-icons-round]" type="checkbox" value="1" <?php checked(isset($options['material-icons-round'])); ?> id="quasarwp-settings-material-icons-round" />
              Material Icons (Round)
            </label>
            <label for="quasarwp-settings-material-icons-sharp" style="padding-right: 20px;">
              <input name="quasarwp-settings[material-icons-sharp]" type="checkbox" value="1" <?php checked(isset($options['material-icons-sharp'])); ?> id="quasarwp-settings-material-icons-sharp" />
              Material Icons (Sharp)
            </label>
          </div>
          <div style="padding-top: 10px;">
            <label for="quasarwp-settings-mdiv5" style="padding-right: 20px;">
              <input name="quasarwp-settings[mdiv5]" type="checkbox" value="1" <?php checked(isset($options['mdiv5'])); ?> id="quasarwp-settings-mdiv5" />
              MDI v5
            </label>
            <label for="quasarwp-settings-fontawesomev5" style="padding-right: 20px;">
              <input name="quasarwp-settings[fontawesomev5]" type="checkbox" value="1" <?php checked(isset($options['fontawesomev5'])); ?> id="quasarwp-settings-fontawesomev5" />
              Fontawesome v5
            </label>
            <label for="quasarwp-settings-ioniconsv4" style="padding-right: 20px;">
              <input name="quasarwp-settings[ioniconsv4]" type="checkbox" value="1" <?php checked(isset($options['ioniconsv4'])); ?> id="quasarwp-settings-ioniconsv4" />
              Ionicons v4
            </label>
            <label for="quasarwp-settings-eva-icons" style="padding-right: 20px;">
              <input name="quasarwp-settings[eva-icons]" type="checkbox" value="1" <?php checked(isset($options['eva-icons'])); ?> id="quasarwp-settings-eva-icons" />
              Eva Icons
            </label>
            <label for="quasarwp-settings-themify" style="padding-right: 20px;">
              <input name="quasarwp-settings[themify]" type="checkbox" value="1" <?php checked(isset($options['themify'])); ?> id="quasarwp-settings-themify" />
              Themify
            </label>
            <label for="quasarwp-settings-line-awesome" style="padding-right: 20px;">
              <input name="quasarwp-settings[line-awesome]" type="checkbox" value="1" <?php checked(isset($options['line-awesome'])); ?> id="quasarwp-settings-line-awesome" />
              Line Awesome
            </label>
          </div>
          <hr>
          <div style="padding-top: 10px;">
            <label for="quasarwp-settings-modern-es6" style="padding-right: 20px;">
              <input name="quasarwp-settings[modern-es6]" type="checkbox" value="1" <?php checked(isset($options['modern-es6'])); ?> id="quasarwp-settings-modern-es6" />
              Modern (ES6+)
            </label>
            <label for="quasarwp-settings-qco" style="padding-right: 20px;">
              <input name="quasarwp-settings[qco]" type="checkbox" value="1" <?php checked(isset($options['qco'])); ?> id="quasarwp-settings-qco" />
              Quasar Configure Object
            </label>
            <label for="quasarwp-settings-minified-files" style="padding-right: 20px;">
              <input name="quasarwp-settings[minified-files]" type="checkbox" value="1" <?php checked(isset($options['minified-files'])); ?> id="quasarwp-settings-minified-files" />
              Minified files
            </label>
            <label for="quasarwp-settings-rtl-css-support" style="padding-right: 20px;">
              <input name="quasarwp-settings[rtl-css-support]" type="checkbox" value="1" <?php checked(isset($options['rtl-css-support'])); ?> id="quasarwp-settings-rtl-css-support" />
              RTL CSS support
            </label>
            <label for="quasarwp-settings-ie11-support" style="padding-right: 20px;">
              <input name="quasarwp-settings[ie11-support]" type="checkbox" value="1" <?php checked(isset($options['ie11-support'])); ?> id="quasarwp-settings-ie11-support" />
              IE11 support
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">QHeader:</th>
        <td>
          <div>
            <label for="quasarwp-settings-qheader">
              <input name="quasarwp-settings[qheader]" type="checkbox" value="1" <?php checked(isset($options['qheader'])); ?> id="quasarwp-settings-qheader" />
              Enabled
            </label>
            <br>
            <label for="quasarwp-settings-qheader-reveal">
              <input name="quasarwp-settings[qheader-reveal]" type="checkbox" value="1" <?php checked(isset($options['qheader-reveal'])); ?> id="quasarwp-settings-qheader-reveal" />
              Header Reveal
            </label>
            <br>
            <label for="quasarwp-settings-qheader-icon">
              <input name="quasarwp-settings[qheader-icon]" type="checkbox" value="1" <?php checked(isset($options['qheader-icon'])); ?> id="quasarwp-settings-qheader-icon" />
              Show Site Icon
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-qheader-separator">Separator type:</label>
            <select name="quasarwp-settings[qheader-separator]" id="quasarwp-settings-qheader-separator">
              <option value="none" <?php selected($options['qheader-separator'], 'none'); ?>>None</option>
              <option value="elevated" <?php selected($options['qheader-separator'], 'elevated'); ?>>Elevated</option>
              <option value="bordered" <?php selected($options['qheader-separator'], 'bordered'); ?>>Bordered</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">QFooter:</th>
        <td>
          <div>
            <label for="quasarwp-settings-qfooter">
              <input name="quasarwp-settings[qfooter]" type="checkbox" value="1" <?php checked(isset($options['qfooter'])); ?> id="quasarwp-settings-qfooter" />
              Enabled
            </label>
            <br>
            <label for="quasarwp-settings-qfooter-reveal">
              <input name="quasarwp-settings[qfooter-reveal]" type="checkbox" value="1" <?php checked(isset($options['qfooter-reveal'])); ?> id="quasarwp-settings-qfooter-reveal" />
              Footer Reveal
            </label>
            <br>
            <label for="quasarwp-settings-qfooter-icon">
              <input name="quasarwp-settings[qfooter-icon]" type="checkbox" value="1" <?php checked(isset($options['qfooter-icon'])); ?> id="quasarwp-settings-qfooter-icon" />
              Show Site Icon
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-qfooter-separator">Separator type:</label>
            <select name="quasarwp-settings[qfooter-separator]" id="quasarwp-settings-qfooter-separator">
              <option value="none" <?php selected($options['qfooter-separator'], 'none'); ?>>None</option>
              <option value="elevated" <?php selected($options['qfooter-separator'], 'elevated'); ?>>Elevated</option>
              <option value="bordered" <?php selected($options['qfooter-separator'], 'bordered'); ?>>Bordered</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Left-side Drawer:</th>
        <td>
          <div>
            <label for="quasarwp-settings-lqdrawer">
              <input name="quasarwp-settings[lqdrawer]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer'])); ?> id="quasarwp-settings-lqdrawer" />
              Enabled
            </label>
            <br>
            <label for="quasarwp-settings-lqdrawer-overlay">
              <input name="quasarwp-settings[lqdrawer-overlay]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer-overlay'])); ?> id="quasarwp-settings-lqdrawer-overlay" />
              Overlay Mode
            </label>
            <br>
            <label for="quasarwp-settings-lqdrawer-show">
              <input name="quasarwp-settings[lqdrawer-show]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer-show'])); ?> id="quasarwp-settings-lqdrawer-show" />
              Show if Above
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-lqdrawer-behavior">Behavior:</label>
            <select name="quasarwp-settings[lqdrawer-behavior]" id="quasarwp-settings-lqdrawer-behavior">
              <option value="normal" <?php selected($options['lqdrawer-behavior'], 'normal'); ?>>Behave Normal</option>
              <option value="mobile" <?php selected($options['lqdrawer-behavior'], 'mobile'); ?>>Behave Mobile</option>
              <option value="desktop" <?php selected($options['lqdrawer-behavior'], 'destop'); ?>>Behave Desktop</option>
            </select>
          </div>
          <div>
            <label for="quasarwp-settings-lqdrawer-separator">Separator type:</label>
            <select name="quasarwp-settings[lqdrawer-separator]" id="quasarwp-settings-lqdrawer-separator">
              <option value="none" <?php selected($options['lqdrawer-separator'], 'none'); ?>>None</option>
              <option value="elevated" <?php selected($options['lqdrawer-separator'], 'elevated'); ?>>Elevated</option>
              <option value="bordered" <?php selected($options['lqdrawer-separator'], 'bordered'); ?>>Bordered</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Right-side Drawer:</th>
        <td>
          <div>
            <label for="quasarwp-settings-rqdrawer">
              <input name="quasarwp-settings[rqdrawer]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer'])); ?> id="quasarwp-settings-rqdrawer" />
              Enabled
            </label>
            <br>
            <label for="quasarwp-settings-rqdrawer-overlay">
              <input name="quasarwp-settings[rqdrawer-overlay]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer-overlay'])); ?> id="quasarwp-settings-rqdrawer-overlay" />
              Overlay Mode
            </label>
            <br>
            <label for="quasarwp-settings-rqdrawer-show">
              <input name="quasarwp-settings[rqdrawer-show]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer-show'])); ?> id="quasarwp-settings-rqdrawer-show" />
              Show if Above
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-rqdrawer-behavior">Behavior:</label>
            <select name="quasarwp-settings[rqdrawer-behavior]" id="quasarwp-settings-rqdrawer-behavior">
              <option value="normal" <?php selected($options['rqdrawer-behavior'], 'normal'); ?>>Behave Normal</option>
              <option value="mobile" <?php selected($options['rqdrawer-behavior'], 'mobile'); ?>>Behave Mobile</option>
              <option value="desktop" <?php selected($options['rqdrawer-behavior'], 'desktop'); ?>>Behave Desktop</option>
            </select>
          </div>
          <div>
            <label for="quasarwp-settings-rqdrawer-separator">Separator type:</label>
            <select name="quasarwp-settings[rqdrawer-separator]" id="quasarwp-settings-rqdrawer-separator">
              <option value="none" <?php selected($options['rqdrawer-separator'], 'none'); ?>>None</option>
              <option value="elevated" <?php selected($options['rqdrawer-separator'], 'elevated'); ?>>Elevated</option>
              <option value="bordered" <?php selected($options['rqdrawer-separator'], 'bordered'); ?>>Bordered</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Tabs:</th>
        <td>
          <div>
            <label for="quasarwp-settings-qtabs">
              <input name="quasarwp-settings[qtabs]" type="checkbox" value="1" <?php checked(isset($options['qtabs'])); ?> id="quasarwp-settings-qtabs" />
              Enabled
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-qtabs-position">Position:</label>
            <select name="quasarwp-settings[qtabs-position]" id="quasarwp-settings-qtabs-position">
              <option value="left" <?php selected($options['qtabs-position'], 'left'); ?>>Left</option>
              <option value="center" <?php selected($options['qtabs-position'], 'center'); ?>>Center</option>
              <option value="right" <?php selected($options['qtabs-position'], 'right'); ?>>Right</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Front Page:</th>
        <td>
          <div>
            <label for="quasarwp-settings-frontpage-show-post-author">
              <input name="quasarwp-settings[frontpage-show-post-author]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-author'])); ?> id="quasarwp-settings-frontpage-show-post-author" />
              Show Author
            </label>
            <br>
            <label for="quasarwp-settings-frontpage-show-post-date">
              <input name="quasarwp-settings[frontpage-show-post-date]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-date'])); ?> id="quasarwp-settings-frontpage-show-post-date" />
              Show Post Date
            </label>
            <br>
            <label for="quasarwp-settings-frontpage-show-post-comments-counter">
              <input name="quasarwp-settings[frontpage-show-post-comments-counter]" type="checkbox" value="1" <?php checked(isset($options['frontpage-show-post-comments-counter'])); ?> id="quasarwp-settings-frontpage-show-post-comments-counter" />
              Show Comments Counter
            </label>
          </div>
          <div style="padding: 10px 0 10px 0;">
            <label for="quasarwp-settings-frontpage-post-layout">Posts Layout:</label>
            <select name="quasarwp-settings[frontpage-post-layout]" id="quasarwp-settings-frontpage-post-layout">
              <option value="vertical" <?php selected($options['frontpage-post-layout'], 'vertical'); ?>>Vertical</option>
              <option value="horizontal" <?php selected($options['frontpage-post-layout'], 'horizontal'); ?>>Horizontal</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Posts Page:</th>
        <td>
          <div>
            <label for="quasarwp-settings-posts-show-comments-counter">
              <input name="quasarwp-settings[posts-show-comments-counter]" type="checkbox" value="1" <?php checked(isset($options['posts-show-comments-counter'])); ?> id="quasarwp-settings-posts-show-comments-counter" />
              Show Comments Counter
            </label>
            <br>
            <label for="quasarwp-settings-posts-show-date">
              <input name="quasarwp-settings[posts-show-date]" type="checkbox" value="1" <?php checked(isset($options['posts-show-date'])); ?> id="quasarwp-settings-posts-show-date" />
              Show Post Date
            </label>
            <br>
            <label for="quasarwp-settings-posts-show-author">
              <input name="quasarwp-settings[posts-show-author]" type="checkbox" value="1" <?php checked(isset($options['posts-show-author'])); ?> id="quasarwp-settings-posts-show-author" />
              Show Post Author
            </label>
            <br>
            <label for="quasarwp-settings-posts-show-featured-img">
              <input name="quasarwp-settings[posts-show-featured-img]" type="checkbox" value="1" <?php checked(isset($options['posts-show-featured-img'])); ?> id="quasarwp-settings-posts-show-featured-img" />
              Show Post Featured Image
            </label>
            <br>
            <label for="quasarwp-settings-posts-show-social">
              <input name="quasarwp-settings[posts-show-social]" type="checkbox" value="1" <?php checked(isset($options['posts-show-social'])); ?> id="quasarwp-settings-posts-show-social" />
              Show Social Icons
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Language Pack:</th>
        <td>
          <div>
            <select name="quasarwp-settings[language]" id="quasarwp-settings-language">
              <?php
              foreach ($languages as $key => &$lang) {
                echo '<option value="' . $key . '" ' . selected($options['language'], $key) . '>' . $lang . '</option>';
              }
              ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Icon Set:</th>
        <td>
          <div>
            <select name="quasarwp-settings[icon-set]" id="quasarwp-settings-icon-set">
              <?php
              foreach ($iconSets as $key => &$iconSet) {
                echo '<option value="' . $key . '" ' . selected($options['icon-set'], $key) . '>' . $iconSet . '</option>';
              }
              ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Theme:</th>
        <td>
          <div>
            <!-- <input type="text" name="quasarwp-settings[layout]" value="<?php echo $options['layout']; ?>" /> -->
            <table>
              <thead>
                <th>Class</th>
                <th>Color</th>
              </thead>
              <tbody>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-primary">Primary</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-primary" name="quasarwp-settings[theme-primary]" value="<?php echo $options['theme-primary']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-secondary">Secondary</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-secondary" name="quasarwp-settings[theme-secondary]" value="<?php echo $options['theme-secondary']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-accent">Accent</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-accent" name="quasarwp-settings[theme-accent]" value="<?php echo $options['theme-accent']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-dark">Dark</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-dark" name="quasarwp-settings[theme-dark]" value="<?php echo $options['theme-dark']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-positive">Positive</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-positive" name="quasarwp-settings[theme-positive]" value="<?php echo $options['theme-positive']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-negative">Negative</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-negative" name="quasarwp-settings[theme-negative]" value="<?php echo $options['theme-negative']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-info">Info</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-info" name="quasarwp-settings[theme-info]" value="<?php echo $options['theme-info']; ?>"></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-theme-warning">Warning</label></td>
                  <td style="padding: 0px;"><input type="color" id="quasarwp-theme-warning" name="quasarwp-settings[theme-warning]" value="<?php echo $options['theme-warning']; ?>"></td>
                </tr>
              </tbody>
            </table>
            <br>
            <input type="button" class="button button-secondary" value="Set Default Theme" onclick="setDefaultTheme()">
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Social Icons:</th>
        <td>
          <div>
            <!-- <input type="text" name="quasarwp-settings[layout]" value="<?php echo $options['layout']; ?>" /> -->
            <table>
              <thead>
                <th>Media</th>
                <th>Enabled</th>
                <th>Icon</th>
              </thead>
              <tbody>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-whatsapp">Whatsapp</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[whatsapp]" type="checkbox" value="1" <?php checked(isset($options['whatsapp'])); ?> id="quasarwp-settings-whatsapp" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[whatsapp-icon]" value="<?php echo $options['whatsapp-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-telegram">Telegram</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[telegram]" type="checkbox" value="1" <?php checked(isset($options['telegram'])); ?> id="quasarwp-settings-telegram" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[telegram-icon]" value="<?php echo $options['telegram-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-facebook">Facebook</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[facebook]" type="checkbox" value="1" <?php checked(isset($options['facebook'])); ?> id="quasarwp-settings-facebook" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[facebook-icon]" value="<?php echo $options['facebook-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-twitter">Twitter</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[twitter]" type="checkbox" value="1" <?php checked(isset($options['twitter'])); ?> id="quasarwp-settings-twitter" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[twitter-icon]" value="<?php echo $options['twitter-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-instagram">Instagram</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[instagram]" type="checkbox" value="1" <?php checked(isset($options['instagram'])); ?> id="quasarwp-settings-instagram" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[instagram-icon]" value="<?php echo $options['instagram-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-github">GitHub</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[github]" type="checkbox" value="1" <?php checked(isset($options['github'])); ?> id="quasarwp-settings-github" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[github-icon]" value="<?php echo $options['github-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-linkedin">Linkedin</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[linkedin]" type="checkbox" value="1" <?php checked(isset($options['linkedin'])); ?> id="quasarwp-settings-linkedin" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[linkedin-icon]" value="<?php echo $options['linkedin-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-reddit">Reddit</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[reddit]" type="checkbox" value="1" <?php checked(isset($options['reddit'])); ?> id="quasarwp-settings-reddit" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[reddit-icon]" value="<?php echo $options['reddit-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-google">Google</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[google]" type="checkbox" value="1" <?php checked(isset($options['google'])); ?> id="quasarwp-settings-google" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[google-icon]" value="<?php echo $options['google-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-snapchat">Snapchat</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[snapchat]" type="checkbox" value="1" <?php checked(isset($options['snapchat'])); ?> id="quasarwp-settings-snapchat" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[snapchat-icon]" value="<?php echo $options['snapchat-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-pinterest">Pinterest</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[pinterest]" type="checkbox" value="1" <?php checked(isset($options['pinterest'])); ?> id="quasarwp-settings-pinterest" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[pinterest-icon]" value="<?php echo $options['pinterest-icon']; ?>" /></td>
                </tr>
                <tr>
                  <td style="padding: 0px;"><label for="quasarwp-social-tumblr">Tumblr</label></td>
                  <td style="padding: 0px;">
                    <input name="quasarwp-settings[tumblr]" type="checkbox" value="1" <?php checked(isset($options['tumblr'])); ?> id="quasarwp-settings-tumblr" />
                  </td>
                  <td style="padding: 0px;"><input type="text" name="quasarwp-settings[tumblr-icon]" value="<?php echo $options['tumblr-icon']; ?>" /></td>
                </tr>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </table>

    <script>
      const setDefaultTheme = function() {
        document.getElementById('quasarwp-theme-primary').value = '#027be3'
        document.getElementById('quasarwp-theme-secondary').value = '#26a69a'
        document.getElementById('quasarwp-theme-accent').value = '#9c27b0'
        document.getElementById('quasarwp-theme-dark').value = '#1d1d1d'
        document.getElementById('quasarwp-theme-positive').value = '#21ba45'
        document.getElementById('quasarwp-theme-negative').value = '#c10015'
        document.getElementById('quasarwp-theme-info').value = '#31ccec'
        document.getElementById('quasarwp-theme-warning').value = '#f2c037'
      }
    </script>

    <?php submit_button(); ?>
  </form>
<?php
}

function update_quasarwp()
{
  register_setting('quasarwp-settings', 'quasarwp-settings');
}

class Custom_Tab_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $url = !empty($item->url) ? $item->url : '';
    $title = !empty($item->title) ? $item->title : '';

    $output .= '<a href="' . $url . '" class="q-tab relative-position self-stretch flex flex-center text-center q-tab--inactive q-focusable q-hoverable cursor-pointer">';
    $output .= '  <div class="q-focus-helper"></div>';
    $output .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
    $output .= '    <div class="q-tab__label">' . $title . '</div>';
    $output .= '  </div>';
    $output .= '</a>';
  }
}

class Custom_Side_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $url = !empty($item->url) ? $item->url : '';
    $title = !empty($item->title) ? $item->title : '';

    $output .= '<a href="' . $url . '" class="q-tab relative-position self-stretch flex q-tab--inactive q-focusable q-hoverable cursor-pointer">';
    $output .= '  <div class="q-focus-helper"></div>';
    $output .= '  <div class="q-tab__content self-stretch flex-center relative-position q-anchor--skip non-selectable column">';
    $output .= '    <div class="q-tab__label">' . $title . '</div>';
    $output .= '  </div>';
    $output .= '</a>';
  }
}
