<?php
/**
 * The template for displaying single posts not caught by other templates
 */

get_header();

/* Start the Loop */
while (have_posts()):
	the_post();
	get_template_part('template-parts/content/content-single');
endwhile; // End of the loop.

get_footer();
