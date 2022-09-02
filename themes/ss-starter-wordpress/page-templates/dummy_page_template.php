<?php
/**
* Template Name: Dummy Global Page Template

* @package WordPress
* @subpackage Blackspace
* @since Blackspace 1.0
*/

get_header();

/* Start the Loop */
while (have_posts()):?>
    Dummy Global Page Template

    <?php get_template_part('template-parts/heading-accessibility/heading-accessibility', null, array('title' => get_the_title()));?>
    <?php the_post();?>
    <?php get_template_part('template-parts/content/content-page');?>
<?php endwhile; get_footer();?>
