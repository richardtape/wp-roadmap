<?php
/**
 * The file that defines the custom metaboxes for this plugin
 *
 * Loaded after cmb2 so we're able to use that
 *
 * @link              https://richardtape.com/plugins/wp-roadmap/
 * @since             0.1.0
 *
 * @package           wp-roadmap
 */

/**
 * Class to register our custom metaboxes.
 *
 * @since      0.1.0
 * @package    wp-roadmap
 * @author     Richard Tape <rich@richardtape.com>
 */
class WP_Roadmap_Metaboxes {

	/**
	 * Register our custom metaboxes
	 *
	 * @since      0.1.0
	 *
	 * @return void
	 */
	public function register() {

		$prefix = 'wp_roadmap_';

		$roadmap_metabox = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Roadmap Item Attributes', 'wp-roadmap' ),
			'object_types' => array( 'roadmap' ),
		) );

		$roadmap_metabox->add_field( array(
			'name'    => esc_html__( 'Details', 'wp-roadmap' ),
			'desc'    => esc_html__( 'Full details about this roadmap item.', 'cmb2' ),
			'id'      => $prefix . 'details',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 10,
			),
		) );

		$roadmap_metabox->add_field( array(
			'name'             => esc_html__( 'Status', 'wp-roadmap' ),
			'desc'             => esc_html__( 'The current status of this roadmap item.', 'wp-roadmap' ),
			'id'               => $prefix . 'status',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => WP_Roadmap_Helpers::get_roadmap_item_statuses(),
		) );

	}// end register()

}// end class WP_Roadmap_Metaboxes()
