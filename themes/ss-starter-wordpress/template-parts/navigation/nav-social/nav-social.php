<?php
/**
 * Displays the social nav.
**/

$locations = get_nav_menu_locations();
$social_nav = wp_get_nav_menu_object( $locations['social_nav']);
$social_nav_items = wp_get_nav_menu_items( $social_nav->term_id, array( 'order' => 'DESC' ) );
?>


<nav>
    <ul class="nav-social">
        <?php 
            foreach($social_nav_items as $key => $item):
                get_template_part(
                    'template-parts/navigation/nav-item',
                    null,
                    array(
                        'classes' => $item->classes ? implode(" ", $item->classes) : '',
                        'target' => $item->target ? $item->target : '_self',
                        'title' => $item->title,
                        'type'  => 'social-nav__item',
                        'url' => $item->url,
                        'icon' => get_field('icon', $item),                   
                    )
                );
            endforeach; 
        ?>
    </ul>
</nav>  