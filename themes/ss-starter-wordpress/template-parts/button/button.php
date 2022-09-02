<?php
/**
 * Renders a button or an anchor styled like a button
 * @var $args array
 * Supported args: aria_label, disabled, class_name, href, icon, onclick, size, target, text, variant [primary | secondary | tertiary | text]
 **/

$size = $args["size"] ?? "medium";
$text = $args["text"] ?? "";
$icon = is_array($args["icon"])
  ? $args["icon"]
  : ["icon" => $args["icon"]];
$is_anchor = !empty($args["href"]);
$is_disabled = $args["disabled"] === true;

if ($is_disabled) {
  $args["disabled"] = "disabled";
}

$args["class"] = crunch_classes([
  "button" => true,
  "--size-${args["size"]}" => !empty($args["size"]),
  "--variant-${args["variant"]}" => !empty($args["variant"]),
  "--disabled" => $is_disabled,
  $args["class_name"] => !empty($args["class_name"]),
]);

$attribute_string = prepare_attribute_string(
  ["aria-label", "class", "disabled", "href", "onclick", "target"],
  $args
);

if ($is_anchor): ?>

  <a <?php echo $attribute_string; ?>>
    <span><?php echo $text; ?></span>
    <?php $icon && get_icon($icon["icon"], $icon); ?>
  </a>

<?php else: ?>

  <button <?php echo $attribute_string; ?>>
    <span><?php echo $text; ?></span>
    <?php $icon && get_icon($icon["icon"], $icon); ?>
  </button>

<?php endif; ?>
