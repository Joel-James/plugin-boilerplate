<?php

namespace DD_Boilerplate\Inc\Helpers;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Define the general utility functionality.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class General {

	/**
	 * Page screen ids of our plugin pages.
	 *
	 * @var array $plugin_pages
	 */
	private static $plugin_pages = array(
		'toplevel_page_dd-boilerplate',
		'dd-boilerplate_page_ddb-sub-menu',
	);

	/**
	 * Check if current page is DD Boilerplate admin.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public static function is_ddb_page() {

		$current_screen = get_current_screen();

		/**
		 * Filter to add/remove items to DD Boilerplate pages.
		 *
		 * @param array Screen IDs of DD Boilerplate pages.
		 */
		$plugin_pages = apply_filters( 'ddb_plugin_pages', self::$plugin_pages );

		// If not on plugin page.
		if ( empty( $current_screen ) || ! in_array( $current_screen->id, $plugin_pages, true ) ) {
			return false;
		}

		return true;
	}
}
