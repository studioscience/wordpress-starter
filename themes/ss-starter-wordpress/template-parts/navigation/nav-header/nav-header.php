<?php
/**
 * Displays the hnav menus.
**/

$locations = get_nav_menu_locations();
$main_nav = wp_get_nav_menu_object( $locations['header_main_nav']);
$main_nav_items = wp_get_nav_menu_items( $main_nav->term_id, array( 'order' => 'DESC' ) );
$main_nav_item_count = !empty($main_nav_items) ? count($main_nav_items) : 0;
$utility_nav = wp_get_nav_menu_object( $locations['header_utility_nav'] );
$utility_nav_items = wp_get_nav_menu_items( $utility_nav->term_id, array( 'order' => 'DESC' ) );
$utility_nav_item_count = !empty($utility_nav_items) ? count($utility_nav_items) : 0;
?>


<nav>
    <ul class="site-header__nav__menu">
        <?php
            foreach($main_nav_items as $key => $item):
                get_template_part(
                    'template-parts/navigation/nav-item',
                    null,
                    array(
                        'admin_classes' => $item->classes ? implode(" ", $item->classes) : '',
                        'target' => $item->target ? $item->target : '_self',
                        'title' => $item->title,
                        'type'  => 'main',
                        'url' => $item->url,
                        'last_item' => $main_nav_item_count - 1 == $key ? true : null //adds a separator to last main nav item on header menu only
                    )
                );
            endforeach;

            foreach($utility_nav_items as $key => $item):
                get_template_part(
                    'template-parts/navigation/nav-item',
                    null,
                    array(
                        'admin_classes' => $item->classes ? implode(" ", $item->classes) : '',
                        'target' => $item->target ? $item->target : '_self',
                        'title' => $item->title,
                        'type'  => 'utility',
                        'url' => $item->url,
                        'last_item' => $utility_nav_item_count - 1 == $key ? true : null //adds button classes to donate menu item
                    )
                );
            endforeach;
        ?>
    </ul>
</nav>
