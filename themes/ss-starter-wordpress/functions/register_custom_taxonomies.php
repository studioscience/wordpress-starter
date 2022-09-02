<?php

class BlackspaceRegisterCustomTaxonomies {
  public function __construct() {
    add_action("init", [$this, "blackspace_custom_taxonomies"]);
  }

  public function blackspace_custom_taxonomies() {
    $taxonomies = [
      [
        "id" => "test",
        "labels" => [
          "name" => "Test",
          "singular_name" => "Test",
          "search_items" => "Search Tests",
          "all_items" => "All Tests",
          "parent_item" => "Parent Test",
          "edit_item" => "Edit Test",
          "view_item" => "View Test",
          "update_item" => "Update Test",
          "add_new_item" => "Add New Test",
          "new_item_name" => "New Test Name",
          "not_found" => "No tests found",
          "no_terms" => "No tests",
          "filter_by_item" => "Filter by test",
          "item_link" => "Test Link",
          "item_link_description" => "A link to a test",
        ],
        "hierarchical" => true,
        "object_type" => ["locations"],
      ],
    ];

    foreach ($taxonomies as $key => $taxonomy) {
      $this->blackspace_register_taxonomy($taxonomy);
    }
  }

  private function blackspace_register_taxonomy($data) {
    $id = $data["id"];
    $labels = $data["labels"];
    $object_type = $data["object_type"];
    $hierarchical = $data["hierarchical"];

    register_taxonomy($id, $object_type, [
      "hierarchical" => $hierarchical,
      "labels" => $labels,
      "query_var" => true,
      "rewrite" => ["slug" => $id, "with_front" => false],
      "public" => true,
      "show_ui" => true,
      "show_in_quick_edit" => false,
      "show_in_rest" => false,
      "show_tagcloud" => true,
      "_builtin" => false,
      "show_in_nav_menus" => false,
    ]);
  }
}

new BlackspaceRegisterCustomTaxonomies();
