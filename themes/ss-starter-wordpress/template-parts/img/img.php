<?php
/**
 * Renders a responsive image
 * @var $args array
 **/

$src = esc_url( $args['src'] );
$srcset = esc_attr( $args['srcset'] );
$class = esc_attr($args['class']);
$sizes = esc_attr( $args['sizes'] );
$alt = esc_attr($args['alt']);
$loading = esc_attr($args['loading']);

$shouldLazyLoad = $loading == 'lazy';
$srcKeyName = $shouldLazyLoad ? 'data-src' : 'src';
$srcSetKeyName = $shouldLazyLoad ? 'data-srcset' : 'srcset';

$attributes = prepare_attribute_string(
  [$srcKeyName, $srcSetKeyName, 'class', 'sizes', 'alt', 'loading'],
  [
    $srcKeyName => $src,
    $srcSetKeyName => $srcset,
    'class' => $class,
    'sizes' => $sizes,
    'alt' => $alt,
    'loading' => $loading,
  ]
);

?>

<img <?php echo $attributes ?> />
