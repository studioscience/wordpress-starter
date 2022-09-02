<?php
/**
 * Functions and definitions
 *
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS["wp_version"], "5.3", "<")) {
  require get_template_directory() . "/inc/back-compat.php";
}

if (!function_exists("blackspace_setup")) {
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   */
  function blackspace_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support("automatic-feed-links");

    /*
     * Let WordPress manage the document title.
     * This theme does not use a hard-coded <title> tag in the document head,
     * WordPress will provide it for us.
     */
    add_theme_support("title-tag");

    /**
     * Add post-formats support.
     */
    add_theme_support("post-formats", [
      "link",
      "aside",
      "gallery",
      "image",
      "quote",
      "status",
      "video",
      "audio",
      "chat",
    ]);

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support("post-thumbnails");
    set_post_thumbnail_size(1568, 9999);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support("html5", [
      "comment-form",
      "comment-list",
      "gallery",
      "caption",
      "style",
      "script",
      "navigation-widgets",
    ]);

    // Add support for Block Styles.
    add_theme_support("wp-block-styles");

    // Add support for full and wide align images.
    add_theme_support("align-wide");

    // Add support for responsive embedded content.
    add_theme_support("responsive-embeds");

    // Add support for custom units.
    // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
    add_theme_support("custom-units");
  }
}
add_action("after_setup_theme", "blackspace_setup");

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 */
function blackspace_add_ie_class() {
  ?>
  <script>
    if (-1 !== navigator.userAgent.indexOf("MSIE") || -1 !== navigator.appVersion.indexOf("Trident/")) {
      document.body.classList.add("is-IE");
    }
  </script>
  <?php
}

add_action("wp_footer", "blackspace_add_ie_class");

/* Disable WordPress Admin Bar for all users - TEMP whilst we're developing */
add_filter("show_admin_bar", "__return_false");

/* Enque Styles & Scripts */
require_once get_theme_file_path("functions/enqueue_theme_assets.php");

/* Disable Gutenberg Editor */
require_once get_theme_file_path("functions/disable_gb_editor.php");

/* Disable Generic WP Posts */
require_once get_theme_file_path("functions/disable_posts.php");

/* Register Nav Menus */
require_once get_theme_file_path("functions/register_nav_menus.php");

/* Register Custom Post Types */
require_once get_theme_file_path("functions/register_custom_post_types.php");

/* Register Custom Taxonomies */
require_once get_theme_file_path("functions/register_custom_taxonomies.php");

/* Register Theme Settings */
require_once get_theme_file_path("functions/custom_logo_setup.php");

/* Remove Content Editors */
require_once get_theme_file_path("functions/remove_content_editor.php");

/* Load Component Helper Functions */
/* Custom Functions */
require_once get_theme_file_path("functions/component_helpers.php");
require_once get_theme_file_path("functions/get_button.php");
require_once get_theme_file_path("functions/get_icon.php");
require_once get_theme_file_path("functions/get_img.php");
require_once get_theme_file_path("functions/get_vertical_spacing.php");
require_once get_theme_file_path("functions/utils.php");
