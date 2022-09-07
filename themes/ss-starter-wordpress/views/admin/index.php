<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 *
 * @package swps
 */

?>

<div class="wrap">
	<h1>swps Settings Page</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'swps_options_group' ); ?>
		<?php do_settings_sections( 'swps' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
