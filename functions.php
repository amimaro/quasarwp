<?php

// QUASARWP MENU

add_filter( 'rest_allow_anonymous_comments', '__return_true' );

add_action('quasarwp', 'my_theme_setup');
function my_theme_setup()
{
  load_theme_textdomain('quasarwp', get_template_directory() . '/data/languages');
}

if (!get_option('quasarwp-settings')) {
  add_option('quasarwp-settings', array(
    'layout' => 'hHh Lpr lFf',
    'qheader' => 1,
    'qheader-separator' => 'elevated',
    'qfooter' => 1,
    'qfooter-separator' => 'elevated',
    'lqdrawer' => 1,
    'lqdrawer-behavior' => 'none',
    'lqdrawer-separator' => 'bordered',
    'lqdrawer-show' => 1,
    'rqdrawer-behavior' => 'none',
    'rqdrawer-separator' => 'bordered',
    'roboto-font' => 1,
    'material-icons' => 1,
    'minified-files' => 1,
    'language' => 'en-us',
    'icon-set' => 'material',
    'qtabs-position' => 'left',
    'frontpage-post-layout' => 'vertical',
    'frontpage-show-post-date' => 1,
    'frontpage-show-post-author' => 1,
    'frontpage-show-post-comments-counter' => 1,
    'single-show-post-comments-counter' => 1,
    'single-show-post-date' => 1,
    'single-show-post-author' => 1,
    'single-show-post-img' => 1,
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

  $options = get_option('quasarwp-settings');
?>
  <h1>QuasarWP Settings</h1>
  <form method="post" action="options.php">
    <?php settings_fields('quasarwp-settings'); ?>
    <?php do_settings_sections('quasarwp-settings'); ?>
    <table class="form-table">
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
              Header Reveal
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
            <label for="quasarwp-settings-single-show-post-comments-counter">
              <input name="quasarwp-settings[single-show-post-comments-counter]" type="checkbox" value="1" <?php checked(isset($options['single-show-post-comments-counter'])); ?> id="quasarwp-settings-single-show-post-comments-counter" />
              Show Comments Counter
            </label>
            <br>
            <label for="quasarwp-settings-single-show-post-date">
              <input name="quasarwp-settings[single-show-post-date]" type="checkbox" value="1" <?php checked(isset($options['single-show-post-date'])); ?> id="quasarwp-settings-single-show-post-date" />
              Show Post Date
            </label>
            <br>
            <label for="quasarwp-settings-single-show-post-author">
              <input name="quasarwp-settings[single-show-post-author]" type="checkbox" value="1" <?php checked(isset($options['single-show-post-author'])); ?> id="quasarwp-settings-single-show-post-author" />
              Show Post Author
            </label>
            <br>
            <label for="quasarwp-settings-single-show-post-img">
              <input name="quasarwp-settings[single-show-post-img]" type="checkbox" value="1" <?php checked(isset($options['single-show-post-img'])); ?> id="quasarwp-settings-single-show-post-img" />
              Show Post Featured Image
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">Language Pack:</th>
        <td>
          <div>
            <?php
            $languages = include('languages.php');
            ?>
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
            <?php
            $iconSets = include('/data/icon-sets.php');
            ?>
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
    </table>
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
