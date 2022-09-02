<?php
/**
 * Get the responsive image.
 * Handles multiple image sizes
 * Gets the urls for those sizes and apply them to a srcset
 * Incorporates Lazy Loading by default.
 *
 * @param string $image_id
 * @param string $size optional
 * @param string $class optional
 * @param bool $lazyLoad optional
 *
 * @return string $output
 */
function get_img($image_id, $size = "medium", $class = "", $lazyLoad = true) {
  // Check the image id
  $image_id = absint($image_id);
  if (!is_int($image_id)) {
    return false;
  }

  // Check the attachment exists
  $image = wp_get_attachment_image_src($image_id, $size);
  if (empty($image)) {
    return false;
  }

  // Gather the required element attributes
  $src = wp_get_attachment_image_url($image_id, $size);
  $srcset = wp_get_attachment_image_srcset($image_id, $size);
  $sizes = wp_get_attachment_image_sizes($image_id, $size);
  $alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);
  $class = $lazyLoad
    ? crunch_classes([$class => true, "js-lazy-load" => true])
    : $class;

  get_template_part("template-parts/img/img", null, [
    "class" => $class,
    "src" => $src,
    "srcset" => $srcset,
    "sizes" => $sizes,
    "alt" => $alt,
    "loading" => $lazyLoad ? "lazy" : "eager",
  ]);
}
