<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 */
?>
<!doctype html>
<html lang="en-us">
    <head>
	    <meta charset="<?php bloginfo("charset"); ?>" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#ffffff">
	    <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div class="page-container">
            <?php get_template_part("template-parts/header/header"); ?>

            <main id="site-main">
