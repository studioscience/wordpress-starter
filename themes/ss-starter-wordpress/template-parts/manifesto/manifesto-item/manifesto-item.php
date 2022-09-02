<?php
/**
 * @var array $args {
 *   title: string
 *   icon: string
 *   icon_margin: s | m | l
 *   preserve_icon_spacing: bool
 * }
 */

$valid_margin_sizes = ["s", "m", "l"];
$title = $args["title"];
$src = $args["icon"]["url"];
$has_icon = strlen($src) > 0;
$icon_margin = strtolower($args["icon_margin"]) ?: "m";

$icon_classes = crunch_classes([
  "icon" => true,
  "--icon-margin-${icon_margin}" => in_array($icon_margin, $valid_margin_sizes),
]);

$icon_attr_string = $has_icon
  ? prepare_attribute_string(
    ["class", "src"],
    ["class" => $icon_classes, "src" => $src]
  )
  : "";
?>

<div class="manifesto-item">
  <?php if ($has_icon): ?>
    <img <?php echo $icon_attr_string; ?> alt="" />
  <?php elseif ($args["preserve_icon_spacing"]): ?>
    <div class="icon-spacer"></div>
  <?php endif; ?>
  <span><?php echo $title; ?></span>
</div>
