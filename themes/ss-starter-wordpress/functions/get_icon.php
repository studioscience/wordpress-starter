<?php
function get_icon($icon, $args = []) {
  $args["icon"] = $icon;
  get_template_part("template-parts/icon/icon", null, $args);
}
