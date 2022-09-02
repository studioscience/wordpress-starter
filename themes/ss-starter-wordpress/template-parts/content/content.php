<?php
/**
 * Template part for displaying posts
 */
?>

<!-- content.php : <?php the_title(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content();?>
</article><!-- #post-<?php the_ID(); ?> -->
