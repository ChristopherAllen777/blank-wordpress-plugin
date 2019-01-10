<?php
/**
 * Crunchify Hello World Plugin is the simplest WordPress plugin for beginner.
 * Take this as a base plugin and modify as per your need.
 *
 * @package Chris Allen Plugin
 * @author Chris Allen
 * @license GPL-2.0+
 * @link https://chrisallen.online
 * @copyright 2019 Chris Allen, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: Chris Allen Plugin
 *            Plugin URI: https://chrisallen.online/development
 *            Description: Take this as a base plugin built by Chris Allen.
 *            Version: 3.0
 *            Author: Chris Allen
 *            Author URI: https://chrisallen.online
 *            Text Domain: crunchify-hello-world
 *            Contributors: Chris Allen
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
/**
 * Adding Submenu under Settings Tab
 *
 * @since 1.0
 */
function chrisallen_add_menu() {
	add_submenu_page ( "options-general.php", "Chris Allen Plugin", "Chris Allen Plugin", "manage_options", "chrisallen-hello-world", "chrisallen_hello_world_page" );
}
add_action ( "admin_menu", "chrisallen_add_menu" );
 
/**
 * Setting Page Options
 * - add setting page
 * - save setting page
 *
 * @since 1.0
 */
function chrisallen_hello_world_page() {
	?>
<div class="wrap">
	<h1>
		Chris Allen Plugin Template By <a
			href="https://crunchify.com/optimized-sharing-premium/" target="_blank">Chris Allen</a>
	</h1>
 
	<form method="post" action="options.php">
            <?php
	settings_fields ( "chrisallen_hello_world_config" );
	do_settings_sections ( "chrisallen-hello-world" );
	submit_button ();
	?>
    </form>
</div>
 
<?php
}
 
/**
 * Init setting section, Init setting field and register settings page
 *
 * @since 1.0
 */
function chrisallen_hello_world_settings() {
	add_settings_section ( "chrisallen_hello_world_config", "", null, "chrisallen-hello-world" );
	add_settings_field ( "chrisallen-hello-world-text", "This is sample Textbox", "chrisallen_hello_world_options", "chrisallen-hello-world", "chrisallen_hello_world_config" );
	register_setting ( "chrisallen_hello_world_config", "chrisallen-hello-world-text" );
}
add_action ( "admin_init", "chrisallen_hello_world_settings" );
 
/**
 * Add simple textfield value to setting page
 *
 * @since 1.0
 */
function chrisallen_hello_world_options() {
	?>
<div class="postbox" style="width: 65%; padding: 30px;">
	<input type="text" name="chrisallen-hello-world-text"
		value="<?php
	echo stripslashes_deep ( esc_attr ( get_option ( 'chrisallen-hello-world-text' ) ) );
	?>" /> Provide any text value here for testing<br />
</div>
<?php
}
 
/**
 * Append saved textfield value to each post
 *
 * @since 1.0
 */
add_filter ( 'the_content', 'chrisallen_com_content' );
function chrisallen_com_content($content) {
	return $content . stripslashes_deep ( esc_attr ( get_option ( 'chrisallen-hello-world-text' ) ) );
}