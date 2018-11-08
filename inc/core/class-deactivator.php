<?php

namespace DD_Boilerplate\Inc;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Fired during plugin deactivation
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 **/
class Deactivator {

	/**
	 * Function that runs during plugin deactivation.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function deactivate() {

		// We need to clear the cron.
		wp_clear_scheduled_hook( 'ddb_sample_cron' );
	}

}
