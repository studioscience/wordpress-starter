<?php
/**
 * Renders an icon
 * @var $args array
 **/

$size_class = !empty($args["size"]) ? "--${args["size"]}" : "";
$class_names = "icon ${size_class}";

if ($args["icon"]) {
  $icon_template = "template-parts/icon/svgs/" . $args["icon"] . ".svg"; ?>

  <!-- icon -->
  <span class="<?php echo $class_names; ?>">
    <?php get_template_part($icon_template); ?>
  </span>

<?php
}
