<?php
/**
 * Displays the social nav.
 **/

$locations = get_nav_menu_locations();
$nav = wp_get_nav_menu_object($locations["manifesto_nav"]);
$nav_items = wp_get_nav_menu_items($nav->term_id, ["order" => "DESC"]);
?>

<ul class="manifesto-list">
  <?php foreach ($nav_items as $key => $item): ?>
    <li class="--as-h3">

      <?php get_template_part(
        "template-parts/manifesto/manifesto-item/manifesto-item",
        null,
        [
          "title" => $item->title,
          "icon" => get_field("icon", $item),
          "preserve_icon_spacing" => true,
        ]
      ); ?>

    </li>
  <?php endforeach; ?>
</ul>
