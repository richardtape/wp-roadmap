<?php
/**
 * The file that defines the custom post types for this plugin
 *
 * Loaded after extended-cpts so we're able to use that
 *
 * @link              https://richardtape.com/plugins/wp-roadmap/
 * @since             0.1.0
 *
 * @package           wp-roadmap
 */

/**
 * Class to register our custom post types.
 *
 * @since      0.1.0
 * @package    wp-roadmap
 * @author     Richard Tape <rich@richardtape.com>
 */
class WP_Roadmap_CPT {

	/**
	 * The Roadmap CPT which will also have the taxonomy added to it.
	 *
	 * @var [type]
	 */
	public $roadmap = null;

	public function init() {

		add_action( 'init', array( $this, 'register' ) );

		add_action( 'wp_roadmap_after_register_extended_post_type_roadmap', array( $this, 'add_taxonomy' ) );

	}// end init()

	/**
	 * The admin columns for our Roadmap Custom Post Type
	 *
	 * @return array An array of admin columns
	 */
	public function get_admin_cols() {

		return array(
			'title',
			'status' => array(
				'title'    => 'Status',
				'meta_key' => 'roadmap_item_status', // WPCS: slow query ok.
			),
		);

	}// end get_admin_cols()


	/**
	 * Fetch the args array for the roadmap custom post type
	 *
	 * @return array The array of arguments for the roadmap post type
	 */
	public function get_roadmap_post_type_args() {

		$args = array(
			'admin_cols'   => $this->get_admin_cols(),
			'hierarchical' => true,
			'supports'     => array( 'title', 'page-attributes', 'revisions' ),
		);

		return apply_filters( 'wp_roadmap_get_roadmap_post_type_args', $args );

	}// end get_roadmap_post_type_args()


	/**
	 * Register our roadmap custom post type.
	 *
	 * @since             0.1.0
	 * @return void
	 */
	public function register() {

		if ( ! function_exists( 'register_extended_post_type' ) ) {
			wp_die( 'Dependency missing: register_extended_post_type() is not available.' );
		}

		$this->roadmap = register_extended_post_type( 'roadmap', $this->get_roadmap_post_type_args() );

		do_action( 'wp_roadmap_after_register_extended_post_type_roadmap', $this->roadmap );

	}// end register()

	/**
	 * Add the roadmap tag taxonomy to the post type
	 *
	 * @param object $roadmap - the newly registered roadmap CPT
	 * @return void
	 */
	public function add_taxonomy( $roadmap ) {

		$this->roadmap->add_taxonomy( 'roadmap-tag', array(
			'hierarchical' => false,
		) );

	}// end add_taxonomy()

}// end class WP_Roadmap_CPT
