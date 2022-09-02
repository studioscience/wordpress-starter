<?php
//Disables generic WP posts from admin menu

function disable_posts_menu() {
  remove_menu_page("edit.php");
}

add_action("admin_menu", "disable_posts_menu");
