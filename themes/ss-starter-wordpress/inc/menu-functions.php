<?php
/**
 * Functions and filters related to the menus.
 *
 * Makes the default WordPress navigation use an HTML structure similar
 * to the Navigation block.
 *
 * @link https://make.wordpress.org/themes/2020/07/06/printing-navigation-block-html-from-a-legacy-menu-in-themes/
 */

/**
 * Add a button to top-level menu items that has sub-menus.
 * An icon is added using CSS depending on the value of aria-expanded.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 */
function unlocked_add_sub_menu_toggle($output, $item, $depth, $args)
{
    if (0 === $depth && in_array('menu-item-has-children', $item->classes, true))
    {

        // Add toggle button.
        $output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="unlockedExpandSubMenu(this)">';
        $output .= '<span class="icon-plus">' . unlocked_get_icon_svg('ui', 'plus', 18) . '</span>';
        $output .= '<span class="icon-minus">' . unlocked_get_icon_svg('ui', 'minus', 18) . '</span>';
        $output .= '<span class="screen-reader-text">' . esc_html__('Open menu', 'unlocked') . '</span>';
        $output .= '</button>';
    }
    return $output;
}
add_filter('walker_nav_menu_start_el', 'unlocked_add_sub_menu_toggle', 10, 4);

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 * @param string $uri  Social link.
 * @param int    $size The icon size in pixels.
 * @return string
 */
function unlocked_get_social_link_svg($uri, $size = 24)
{
    return unlocked_SVG_Icons::get_social_link_svg($uri, $size);
}

/**
 * Displays SVG icons in the footer navigation.
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 */
function unlocked_nav_menu_social_icons($item_output, $item, $depth, $args)
{
    // Change SVG icon inside social links menu if there is supported URL.
    if ('footer' === $args->theme_location)
    {
        $svg = unlocked_get_social_link_svg($item->url, 24);
        if (!empty($svg))
        {
            $item_output = str_replace($args->link_before, $svg, $item_output);
        }
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'unlocked_nav_menu_social_icons', 10, 4);

/**
 * Filters the arguments for a single nav menu item.
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass
 */
function unlocked_add_menu_description_args($args, $item, $depth)
{
    if ('</span>' !== $args->link_after)
    {
        $args->link_after = '';
    }

    if (0 === $depth && isset($item->description) && $item->description)
    {
        // The extra <span> element is here for styling purposes: Allows the description to not be underlined on hover.
        $args->link_after = '<p class="menu-item-description"><span>' . $item->description . '</span></p>';
    }

    return $args;
}
add_filter('nav_menu_item_args', 'unlocked_add_menu_description_args', 10, 3);

