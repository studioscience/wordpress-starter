<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<!-- content-page.php : <?php the_title(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content();?>
</article><!-- #post-<?php the_ID(); ?> -->
