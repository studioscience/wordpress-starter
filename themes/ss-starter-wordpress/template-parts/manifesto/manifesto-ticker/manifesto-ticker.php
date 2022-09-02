<?php
/**
 * Displays the manifesto in ticker form
 **/

$MIN_ITEMS = 10;

$locations = get_nav_menu_locations();
$nav = wp_get_nav_menu_object($locations["manifesto_nav"]);
$nav_items = wp_get_nav_menu_items($nav->term_id, ["order" => "DESC"]);
$total_items = count($nav_items);

if ($total_items < $MIN_ITEMS) {
  $sets_needed = ceil($MIN_ITEMS / $total_items);
  $chunks = array_fill(0, $sets_needed, $nav_items);
  $nav_items = call_user_func_array("array_merge", $chunks);
}
?>

<div class="manifesto-ticker" aria-hidden="true">
  <div class="ticker-inner js-ticker">
    <?php foreach ($nav_items as $key => $item): ?>
      <div class="ticker-item">

        <?php get_template_part(
          "template-parts/manifesto/manifesto-item/manifesto-item",
          null,
          [
            "title" => $item->title,
            "icon_margin" => "s",
            "icon" => get_field("icon", $item),
          ]
        ); ?>

      </div>
    <?php endforeach; ?>
  </div>
</div>
