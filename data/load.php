<?php

if (!get_option('quasarwp-settings')) {
  add_option('quasarwp-settings', array(
    'roboto-font' => 1,
    'material-icons' => 1,
    'fontawesomev5' => 1,
    'minified-files' => 1,
    'language' => 'en-us',
    'icon-set' => 'material',
  ));
}
