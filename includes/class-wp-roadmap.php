<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link              https://richardtape.com/plugins/wp-roadmap/
 * @since             0.1.0
 *
 * @package           wp-roadmap
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    wp-roadmap
 * @author     Richard Tape <rich@richardtape.com>
 */
class WP_Roadmap {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.1.0
	 * @return void
	 */
	public function init() {

		$this->set_properties();
		$this->load_dependencies();
		$this->set_locale();
		$this->add_hooks();

	}// end __construct()

	/**
	 * Set properties for this class
	 *
	 * @since    0.1.0
	 * @return void
	 */
	public function set_properties() {

		$this->version     = WP_ROADMAP_VERSION;
		$this->plugin_name = 'wp-roadmap';

	}// end set_properties()

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    0.1.0
	 * @return void
	 */
	public function load_dependencies() {

		// Our helper class
		require_once plugin_dir_path( __FILE__ ) . 'class-wp-roadmap-helpers.php';

		// John Billion's brilliant Extended CPTs...
		require_once plugin_dir_path( __FILE__ ) . 'libraries/extended-cpts/extended-cpts.php';

		// ... which we then use to create our CPT
		require_once plugin_dir_path( __FILE__ ) . 'class-wp-roadmap-cpt.php';

		// The equally brilliant CMB2 by WDS and Justin Sternberg...
		require_once plugin_dir_path( __FILE__ ) . 'libraries/cmb2/init.php';

		// ... which we then use to add our metaboxes
		require_once plugin_dir_path( __FILE__ ) . 'class-wp-roadmap-metaboxes.php';

	}// end load_dependencies()

	/**
	 * Register our actions and filters
	 *
	 * @return void
	 */
	public function add_hooks() {

		// Register our CPT
		$cpt = new WP_Roadmap_CPT();
		$cpt->init();

		$metaboxes = new WP_Roadmap_Metaboxes();
		add_action( 'cmb2_admin_init', array( $metaboxes, 'register' ) );

	}// end add_hooks()

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    0.1.0
	 * @return void
	 */
	public function set_locale() {

		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

	}// end set_locale()

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 * @return void
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-roadmap',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}// end load_plugin_textdomain()

}// end class WP_Roadmap
