<?php
/**
 * Displays the footer nav menus.
**/

$locations = get_nav_menu_locations();
$main_nav = wp_get_nav_menu_object( $locations['footer_main_nav']);
$main_nav_items = wp_get_nav_menu_items( $main_nav->term_id, array( 'order' => 'DESC' ) );
$utility_nav = wp_get_nav_menu_object( $locations['footer_utility_nav'] );
$utility_nav_items = wp_get_nav_menu_items( $utility_nav->term_id, array( 'order' => 'DESC' ) );
?>


<nav>
    <ul class="site-footer__nav">
        <?php 
            foreach($utility_nav_items as $key => $item): 
                get_template_part(
                    'template-parts/navigation/nav-item',
                    null,
                    array(
                        'classes' => $item->classes ? implode(" ", $item->classes) : '',
                        'target' => $item->target ? $item->target : '_self',
                        'title' => $item->title,
                        'type'  => 'site-footer__nav__utility-item',
                        'url' => $item->url
                    )
                );
            endforeach;

            foreach($main_nav_items as $key => $item):
                get_template_part(
                    'template-parts/navigation/nav-item',
                    null,
                    array(
                        'classes' => $item->classes ? implode(" ", $item->classes) : '',
                        'target' => $item->target ? $item->target : '_self',
                        'title' => $item->title,
                        'type'  => 'site-footer__nav__main-item',
                        'url' => $item->url,
                    )
                );
            endforeach; 
        ?>
    </ul>
</nav>  