<?php

/**
 * wp-roadmap bootstrap file
 *
 * @link              https://richardtape.com/plugins/wp-roadmap/
 * @since             0.1.0
 * @package           wp-roadmap
 *
 * @wordpress-plugin
 * Plugin Name:       WP Roadmap
 * Plugin URI:        https://richardtape.com/plugins/wp-roadmap/
 * Description:       Display a roadmap for your projects and allow others to suggest ideas.
 * Version:           0.1.0
 * Author:            Richard Tape
 * Author URI:        https://richardtape.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-roadmap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'WP_ROADMAP_VERSION', '0.1.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-roadmap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function wp_roadmap_bootstrap() {

	$plugin = new WP_Roadmap();
	$plugin->init();

}// end wp_roadmap_bootstrap()

add_action( 'plugins_loaded', 'wp_roadmap_bootstrap' );
