<?php
function enqueue_unlocked_theme_assets() {
  wp_enqueue_style(
    "compiled-styles",
    get_template_directory_uri() . "/dist/styles.min.css",
    [],
    current_time("timestamp"),
    "all"
  );
  wp_enqueue_script(
    "compiled-scripts",
    get_template_directory_uri() . "/dist/scripts.min.js",
    [],
    current_time("timestamp"),
    "all"
  );
  wp_enqueue_script(
    "youtube-api",
    "https://www.youtube.com/iframe_api",
    [],
    false,
    "all"
  );
  wp_add_inline_script(
    "compiled-scripts",
    'window.THEME_DIR = "' . get_template_directory_uri() . '"',
    "before"
  );
}

add_action("wp_enqueue_scripts", "enqueue_unlocked_theme_assets");

//This loads all the block styles on the admin at once so we don't have to reference single style files every time we add a new block definition.
function enqueue_unlocked_theme_admin_assets() {
  wp_enqueue_style(
    "compiled-styles",
    get_template_directory_uri() . "/dist/admin.min.css",
    [],
    current_time("timestamp"),
    "all"
  );
  wp_enqueue_script(
    "admin-scripts",
    get_template_directory_uri() . "/assets/js/utils/admin.js",
    [],
    current_time("timestamp"),
    "all"
  );
}

add_action("admin_enqueue_scripts", "enqueue_unlocked_theme_admin_assets");
