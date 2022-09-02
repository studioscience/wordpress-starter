<?php
function blackspace_custom_logo_setup() {
  $defaults = [
    "flex-height" => true,
    "flex-width" => true,
  ];

  add_theme_support("custom-logo", $defaults);
}

add_action("after_setup_theme", "blackspace_custom_logo_setup");
