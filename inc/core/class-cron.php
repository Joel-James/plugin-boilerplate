<?php

namespace DD_Boilerplate\Inc\Core;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * The cron-specific functionality of the plugin.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Cron extends Base {

	/**
	 * Initialize the class by registering hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {

		$this->add_action( 'ddb_sample_cron', $this, 'sample_cron' );
	}

	/**
	 * Sample cron function DD Boilerplate.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function sample_cron() {}
}
