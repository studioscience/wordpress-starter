<?php
/**
 * Renders vertical spacing between page elements
 * @var $args array
 * $args {
 *   size?: [S, M, L]
 *   full_width?: boolean (default: true)
 *   hr?: boolean (default: false)
 * }
 **/

$size = strtolower($args["size"]) ?: "m";
$is_full_width = $args["full_width"] !== false;
$should_show_separator = $args["hr"] === true;

$class_names = crunch_classes([
  "vertical-spacing" => true,
  "--size-${size}" => true,
  "--full-width" => $is_full_width,
  "--separator" => $should_show_separator
]);

?>

<div class="<?php echo $class_names; ?>"></div>
