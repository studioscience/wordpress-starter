<?php
/**
 * Displays the site header.
 * */

 $logo_id = get_theme_mod( 'custom_logo' );
?>

<header id="site-header" class="js-site-header site-header">
    <?php if ($logo_id):?>
        <a class="site-header__logo" href="<?php echo get_site_url();?>">
            <?php get_img($logo_id, $size = "small", $class = "", $lazyLoad = false) ?>
        </a>
    <?php endif;?>
    
    <div class="site-header__nav">
        <?php get_template_part('template-parts/navigation/nav-header/nav-header'); ?>

        <button class="js-header-btn site-header__nav__hamburger-btn">
            <span class="visually-hidden">Toggle nagivation menu</span>    
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
