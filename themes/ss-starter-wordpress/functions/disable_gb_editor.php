<?php //Switches out the gutenberg editor for the classic editor

function prefix_disable_gutenberg($gutenberg_filter, $post_type) {
  $post_types = ["post", "page", "locations"]; //add any post types you'd like the editor disabled on to this array

  if (in_array($post_type, $post_types)) {
    return false;
  }

  return $gutenberg_filter;
}

add_filter("use_block_editor_for_post_type", "prefix_disable_gutenberg", 10, 2);
