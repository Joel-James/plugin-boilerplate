<?php

namespace DD_Boilerplate\Inc;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Fired during plugin activation
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 **/
class Activator {

	/**
	 * Function that runs during plugin activation.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function activate() {

		$min_php = '5.2.0';

		// Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
		if ( version_compare( PHP_VERSION, $min_php, '<' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
			wp_die( printf( __( 'This plugin requires a minimum PHP Version of %s', 'dd-boilerplate' ), $min_php ) );
		}

		// Create tables.
		self::create_tables();
		// Set crons.
		self::create_crons();
	}

	/**
	 * Create custom tables for DD Boilerplate.
	 *
	 * Use dbDelta function to upgrade or create tables
	 * safely without breaking anything.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private static function create_tables() {

		// Create custom tables required for this plugin.
	}

	/**
	 * Set custom crons for periodic actions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private static function create_crons() {

		// Register new cron for our plugin.
		if ( ! wp_next_scheduled( 'ddb_sample_cron' ) ) {
			wp_schedule_event( strtotime( date( 'Y-m-d 23:59:59' ) ), 'daily', 'ddb_sample_cron' );
		}
	}
}
