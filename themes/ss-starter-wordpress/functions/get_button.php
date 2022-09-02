<?php
function get_button($text, $args = []) {
  $args["text"] = $text;
  get_template_part("template-parts/button/button", null, $args);
}
