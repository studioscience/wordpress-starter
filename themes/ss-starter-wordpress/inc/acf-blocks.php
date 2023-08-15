<?php

//add_action('init', 'sundaysky_custom_blocks');

  if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');

    function register_acf_block_types() {
      acf_register_block_type ( 
        array(
          'name' => 'gallery-container',
          'title' => 'Paginated Image Gallery',
          'description' => 'A block for displaying 3-6 images within a paged image gallery.',
          'render_template' => 'template-parts/blocks/gallery.php',
          'icon' => '',
          'keywords' => array('images', 'gallery', 'paginate', 'page'),
        )
      );
      
    }
  } 
?>