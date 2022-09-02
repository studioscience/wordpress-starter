<?php

function blackspace_hide_editor() {
  $post_id = $_GET["post"] ? $_GET["post"] : $_POST["post_ID"];

  if (!isset($post_id)) {
    return;
  }

  $pages = ["homepage"];
  $title = strtolower(get_the_title($post_id));

  if (in_array($title, $pages)) {
    remove_post_type_support("page", "editor");
  }
}

add_action("admin_init", "blackspace_hide_editor");
