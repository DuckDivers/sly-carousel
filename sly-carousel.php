<?php
/*
	Plugin Name: Sly Carousel
	Version: 1.0
	Plugin URI: https://github.com/DuckDivers/sly-carousel
	Description: A custom carousel using the Sly jQuery Plugin
	Author: Howard Ehrenberg
	Text Domain: Duck_Divers
	Author URI: http://www.howardehrenberg.com/
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	GitHub Plugin URI: https://github.com/DuckDivers/sly-carousel
	GitHub Branch:     master	
*/
if ( ! defined( 'ABSPATH' ) )
exit; 
// Define plugin file constant
define( 'DD_SLY_PLUGIN_FILE', __FILE__ );
define( 'DD_SLY_PLUGIN_VERSION', '1.0' );
$plugin_url = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__));

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'duck_sly_style' );

/**
 * Register style sheet.
 */
function duck_sly_style() {
	wp_register_style( 'duck-sly-style', plugins_url( 'sly-carousel/assets/sly-plugin.css', false, '1.0', 'all' ) );
	wp_enqueue_style( 'duck-sly-style' );
	wp_register_style('sly-custom', plugins_url('sly-carousel/assets/custom-css.php', false, '1.0', 'all'));
	wp_enqueue_style('sly-custom');
}
	if ( !class_exists('lessc') ) {
		include_once "$plugin_url/assets/lessc.inc.php";
	}
require_once "$plugin_url/assets/shortcode.php";
require_once "$plugin_url/assets/less-compile.php";
require_once "$plugin_url/assets/admin-options.php";

?>