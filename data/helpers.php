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
