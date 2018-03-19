<?php
/**
 * Generic helper methods.
 *
 * @link              https://richardtape.com/plugins/wp-roadmap/
 * @since             0.1.0
 *
 * @package           wp-roadmap
 */

/**
 * A class which contains our generic helper methods used through the plugin.
 *
 * Class used here more for a faux namespace than anything else.
 *
 * @since      0.1.0
 * @package    wp-roadmap
 * @author     Richard Tape <rich@richardtape.com>
 */
class WP_Roadmap_Helpers {

	/**
	 * Fetch the roadmap item statuses.
	 *
	 * @return array The statuses to be used for each roadmap item
	 */
	public static function get_roadmap_item_statuses() {

		$statuses = array(
			'submitted'   => __( 'Submitted', 'wp-roadmap' ),
			'underreview' => __( 'Under Review', 'wp-roadmap' ),
			'accepted'    => __( 'Accepted', 'wp-roadmap' ),
			'inprogress'  => __( 'In Progress', 'wp-roadmap' ),
			'testing'     => __( 'Testing', 'wp-roadmap' ),
			'completed'   => __( 'Completed', 'wp-roadmap' ),
			'canceled'    => __( 'Canceled', 'wp-roadmap' ),
			'rejected'    => __( 'Rejected', 'wp-roadmap' ),
			'postponed'   => __( 'Postponed', 'wp-roadmap' ),
			'maybelater'  => __( 'Maybe Later', 'wp-roadmap' ),
		);

		return apply_filters( 'wp_roadmap_get_roadmap_item_statuses', $statuses );

	}// end get_roadmap_item_statuses()

}// end class WP_Roadmap_Helpers()
