<?php

if (!function_exists("blackspace_register_nav_menu")) {
  function blackspace_register_nav_menu() {
    register_nav_menus([
      "header_main_nav" => __("Header Main Nav", "header_main_nav"),
      "header_utility_nav" => __("Header Utility Nav", "header_utility_nav"),
      "footer_main_nav" => __("Footer Main Nav", "footer_main_nav"),
      "footer_utility_nav" => __("Footer Utility Nav", "footer_utility_nav"),
      "social_nav" => __("Social Nav", "social_nav"),
      "manifesto_nav" => __("Manifesto Entries", "manifesto_nav"),
    ]);
  }

  add_action("init", "blackspace_register_nav_menu", 0);
}
