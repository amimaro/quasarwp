<?php

// Get tag list comma separated
function comma_tags($tags, $show_links = true)
{
  if ($tags) {
    $t = array();
    foreach ($tags as $tag) {
      $t[] = (!$show_links) ? $tag->name : '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
    }
    return implode(",", $t);
  } else {
    return false;
  }
}

// Shorten Excerpt Length
function tn_custom_excerpt_length($length)
{
  return 35;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

function theme_slug_setup()
{
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_slug_setup');


// Check if string is JSON
function isJson($string)
{
  json_decode($string);
  return json_last_error() === JSON_ERROR_NONE;
}
