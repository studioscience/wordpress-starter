<?php
  $className = 'c-block';
  if (!empty($block['className'])) {
      $className .= ' ' . $block['className'];
  }

  if (!empty($block['align'])) {
      $className .= ' align' . $block['align'];
  }
?>

<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays a hero banner.
 */

if ( get_field('background_type') == "color" ) {
  $background_style = "background-color: " . get_field('background_color') . ';';
} else {
  $image = get_field('background_image');
  $background_style = "background: url(" . $image .') center no-repeat; background-size: cover;';
}

$text_color = get_field('text_color');
$text_align_class = get_field('text_alignment');
$id = 'hero-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$hero_classes = array($align_class, $text_color, $text_align_class);
$heading_type = get_field('heading_type');
$hero_image = get_field('hero_image');
$body = get_field('body');

if(get_field('hero_cta')) {
  $link = get_field('hero_cta'); 
  $link_url = $link['url'];
  $link_title = $link['title'];
}  

if(empty($link)) {
  $link_title = '';
  $link_url = '';
}

?>

<div 
  class="hero <?php echo implode(" ", $hero_classes); ?>" 
  id="<?php echo $id; ?>"
  style="<?php echo $background_style; ?>">
    <div>
      <?php if ($text_align_class == "right:Right") : ?>
        <div class="md:max-w-7xl mx-auto">
            <div class="md:flex md:flex-row flex-col">
              <div class="md:flex-1 md:w-1/2 ">
                <img class="h-full w-full" src="<?php echo esc_url( $hero_image ); ?>" alt="hero image">
              </div>
              <div class="md:flex-1 flex items-center px-4 py-12 sm:px-6 lg:px-10">
                <div class="max-w-[600px] mx-auto">
                  <h3 class="uppercase text-base font-bold letter-spacing-lg text-brand-purple"><?php echo get_field('eyebrow'); ?></h3>
                  <h2 class="heading mt-7 text-5xl font-medium leading-10 text-galaxy sm:text-5xl"><?php the_field('heading'); ?></h2>
                  <?php if(!empty($body) ) : ?>
                    <div class="mt-7 text-lg text-black"><?php the_field('body'); ?></div>
                  <?php endif ?>
                  <?php if($link) : ?>
                    <div class="mt-8">
                      <div class="inline-flex rounded-md">
                        <a href="<?php echo esc_url($link_url) ?>" class="inline-flex border-purple-grad items-center justify-center rounded-full bg-transparent px-5 py-3 text-base font-medium text-brand-purple">
                          <?php echo esc_html($link_title); ?>
                        </a>
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        <?php elseif($text_align_class == "left:Left") : ?>
          <div class="md:max-w-7xl mx-auto">
            <div class="md:flex md:flex-row flex-col">
              <div class="md:flex-1 flex items-center px-4 py-12 sm:px-6 lg:px-10">
                <div class="max-w-[600px] mx-auto">
                  <h3 class="uppercase text-base font-bold letter-spacing-lg text-brand-purple"><?php echo get_field('eyebrow'); ?></h3>
                  <h2 class="heading mt-7 text-5xl font-medium leading-10 text-galaxy sm:text-5xl"><?php the_field('heading'); ?></h2>
                  <?php if(!empty($body) ) : ?>
                    <div class="mt-7 text-lg text-black"><?php the_field('body'); ?></div>
                  <?php endif ?>
                  <?php if($link) : ?>
                    <div class="mt-8">
                      <div class="inline-flex rounded-md">
                        <a href="<?php echo esc_url($link_url) ?>" class="inline-flex border-purple-grad items-center justify-center rounded-full bg-transparent px-5 py-3 text-base font-medium text-brand-purple">
                          <?php echo esc_html($link_title); ?>
                        </a>
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              </div>
              <div class="md:flex-1 md:w-1/2 ">
                <img class="h-full w-full" src="<?php echo esc_url( $hero_image ); ?>" alt="hero image">
              </div>
            </div>
          </div>
        <?php else : ?>
          <div class="text-center">
            <div class="hero-content md:max-w-xl mx-auto lg:py-60">
              <h3 class="uppercase text-base font-bold letter-spacing-lg text-brand-purple"><?php echo get_field('eyebrow'); ?></h3>
              <h2 class="heading mt-7 text-5xl font-medium leading-10 text-galaxy sm:text-5xl"><?php the_field('heading'); ?></h2>
              <?php if(!empty($body) ) : ?>
                <div class="mt-7 text-lg text-black"><?php the_field('body'); ?></div>
              <?php endif ?> 
              <?php if(!empty($link) ) : ?>
                <a class="inline-flex items-center justify-center rounded-full button-gradient px-5 py-3 my-4 text-base font-medium text-white hover:bg-hero-gradient" href="<?php echo esc_url($link_url) ?>"><p><?php echo esc_html($link_title) ?></p></a>
              <?php endif ?>  
            </div>
          </div>
          
      <?php endif; ?>    
      
    </div>
</div>