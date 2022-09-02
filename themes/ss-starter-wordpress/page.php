<?php
/**
 * The template for displaying pages
 */

get_header();

/* Start the Loop */
while (have_posts()):?>
    <?php get_template_part('template-parts/heading-accessibility/heading-accessibility', null, array('title' => get_the_title()));?>
    <?php the_post();?>
    <?php get_template_part('template-parts/content/content-page');?>
<?php endwhile; get_footer();?>
