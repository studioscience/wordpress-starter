<?php
    $type = $args['type'];
    $type_class = 'site-header__nav__menu__'.$type.'-item';
    
    // list item vars
    $title = $args['title'];
    $icon = $args['icon']; //social nav only
    $item_args['class'] = crunch_classes([
        "${args["admin_classes"]}" => !empty($args['admin_classes']),
         "{$type_class}" => !empty($type),
        "-last" => !empty($args['last_item']),
    ]);

    $item_attribute_string = prepare_attribute_string(
        ["aria-label", "class", "disabled", "href", "onclick", "target"],
        $item_args
    );

    // link tag vars
    $link_args['href'] = $args['url'];
    $link_args['target'] = $args['target'] ? $args['target'] : '';
    $link_args['class'] = crunch_classes([
        "-external" => $args['target'] == '_blank',
        "button --variant-primary" => !empty($args['last_item']) && $args['type'] === 'utility',
    ]);

    $link_attribute_string = prepare_attribute_string(
        ["aria-label", "class", "disabled", "href", "onclick", "target"],
        $link_args
    );
?>

<li <?php echo $item_attribute_string;?>>
    <a <?php echo $link_attribute_string;?>>
        <?php echo $title;?>
    </a>
</li>