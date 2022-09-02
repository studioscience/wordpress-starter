<?php

class BlackspaceRegisterCustomPostTypes {
  public function __construct() {
    add_action("init", [$this, "blackspace_custom_post_types"]);
  }

  public function blackspace_custom_post_types() {
    //add your custom post types to this array
    $post_types = [
      [
        "post_type" => "locations",
        "singular" => "Location",
        "plural" => "Locations",
        "supports" => ["title", "editor", "excerpt", "custom-fields"],
      ],
    ];

    foreach ($post_types as $key => $post_type) {
      $this->blackspace_register_custom_post_type($post_type);
    }
  }

  private function blackspace_register_custom_post_type($data) {
    $singular = $data["singular"];
    $plural = $data["plural"];
    $post_type = $data["post_type"];
    $supports = $data["supports"];
    $rewrite = $data["rewrite"];

    $labels = [
      "name" => _x($plural, "post type general name", "blackspace-theme"),
      "singular_name" => _x(
        $singular,
        "post type singular name",
        "blackspace-theme"
      ),
      "menu_name" => _x($plural, "admin menu", "blackspace-theme"),
      "name_admin_bar" => _x(
        $singular,
        "add new on admin bar",
        "blackspace-theme"
      ),
      "add_new" => _x("Add New", $singular, "blackspace-theme"),
      "add_new_item" => __("Add New " . $singular, "blackspace-theme"),
      "new_item" => __("New " . $singular, "blackspace-theme"),
      "edit_item" => __("Edit " . $singular, "blackspace-theme"),
      "view_item" => __("View " . $singular, "blackspace-theme"),
      "all_items" => __("All " . $plural, "blackspace-theme"),
      "search_items" => __("Search " . $plural, "blackspace-theme"),
      "parent_item_colon" => __("Parent " . $plural . ":", "blackspace-theme"),
      "not_found" => __("No " . $plural . " found.", "blackspace-theme"),
      "not_found_in_trash" => __(
        "No " . $plural . " found in Trash.",
        "blackspace-theme"
      ),
    ];

    $args = [
      "labels" => $labels,
      "description" => __($singular . ".", "blackspace-theme"),
      "public" => true,
      "show_ui" => true,
      "show_in_menu" => true,
      "menu_position" => 5,
      "rewrite" => [
        "slug" => "collection/%collections%",
        "with_front" => false,
      ],
      "show_in_rest" => true,
      "supports" => $supports,
      "rewrite" => $rewrite,
    ];

    register_post_type($post_type, $args);
  }
} // End class

new BlackspaceRegisterCustomPostTypes();
