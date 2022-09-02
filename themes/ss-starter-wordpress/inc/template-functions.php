<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage unlocked
 */

/**
 * Adds custom classes to the array of body classes.
 *
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function unlocked_body_classes($classes)
{
	// Helps detect if JS is enabled or not.
	$classes[] = "no-js";

	// Adds `singular` to singular pages.
	$classes[] = is_singular() ? "singular" : "";

	return $classes;
}
add_filter("body_class", "unlocked_body_classes");

/**
 * Adds custom class to the array of posts classes.
 *
 *
 * @param array $classes An array of CSS classes.
 * @return array
 */
function unlocked_post_classes($classes)
{
	$classes[] = "entry";

    if (function_exists("get_current_screen")) {
        $screen = get_current_screen();
        if ( $screen->parent_base == null ) {
            $classes[] = "page-content";
        }
    } else {
        $classes[] = "page-content";
    }

	return $classes;
}
add_filter("post_class", "unlocked_post_classes", 10, 3);

/**
 * Remove the `no-js` class from body if JS is supported.
 *
 *
 * @return void
 */
function unlocked_supports_js()
{
	echo '<script>document.body.classList.remove("no-js");</script>';
}
add_action("wp_footer", "unlocked_supports_js");

/**
 * Gets the SVG code for a given icon.
 *
 *
 * @param string $group The icon group.
 * @param string $icon  The icon.
 * @param int    $size  The icon size in pixels.
 * @return string
 */
function unlocked_get_icon_svg($group, $icon, $size = 24)
{
	return unlocked_SVG_Icons::get_svg($group, $icon, $size);
}

/**
 * Filters the list of attachment image attributes.
 *
 * @param string[]     $attr       Array of attribute values for the image markup, keyed by attribute name.
 *                                 See wp_get_attachment_image().
 * @param WP_Post      $attachment Image attachment post.
 * @param string|int[] $size       Requested image size. Can be any registered image size name, or
 *                                 an array of width and height values in pixels (in that order).
 * @return string[] The filtered attributes for the image markup.
 */
function unlocked_get_attachment_image_attributes($attr, $attachment, $size)
{
	if (is_admin()) {
		return $attr;
	}

	if (
		isset($attr["class"]) &&
		false !== strpos($attr["class"], "custom-logo")
	) {
		return $attr;
	}

	$width = false;
	$height = false;

	if (is_array($size)) {
		$width = (int) $size[0];
		$height = (int) $size[1];
	} elseif ($attachment && is_object($attachment) && $attachment->ID) {
		$meta = wp_get_attachment_metadata($attachment->ID);
		if (isset($meta["width"]) && isset($meta["height"])) {
			$width = (int) $meta["width"];
			$height = (int) $meta["height"];
		}
	}

	if ($width && $height) {
		// Add style.
		$attr["style"] = isset($attr["style"]) ? $attr["style"] : "";
		$attr["style"] =
			"width:100%;height:" .
			round((100 * $height) / $width, 2) .
			"%;max-width:" .
			$width .
			"px;" .
			$attr["style"];
	}

	return $attr;
}
add_filter(
	"wp_get_attachment_image_attributes",
	"unlocked_get_attachment_image_attributes",
	10,
	3
);
