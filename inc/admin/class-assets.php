<?php

namespace DD_Boilerplate\Inc\Admin;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Helpers\General as General_Helper;
use DD_Boilerplate\Inc\Core\Base;

/**
 * The assets-specific functionality of the plugin.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Assets extends Base {

	/**
	 * Initialize the class by registering hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {

		$this->add_action( 'admin_enqueue_scripts', $this, 'assets' );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function assets() {

		// Continue only if current page is one of DD Boilerplate pages.
		if ( ! General_Helper::is_ddb_page() ) {
			return;
		}

		// Enqueue settings page assets.
		$this->settings();

		// Enqueue common assets.
		$this->common();
	}

	/**
	 * Settings page specific styles and scripts.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function settings() {

		// Settings page script.
		wp_enqueue_script(
			DDB_NAME . '-settings',
			DDB_URL . 'assets/js/admin/admin.min.js',
			array( 'jquery' ),
			DDB_VERSION,
			false
		);

		// Settings page style.
		wp_enqueue_style(
			DDB_NAME . '-settings',
			DDB_URL . 'assets/css/admin.min.css',
			array(),
			DDB_VERSION,
			'all'
		);

		/**
		 * Action hook to enqueue settings assets.
		 *
		 * Use this action to enqueue styles and scripts
		 * that needs to be loaded in settings page.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ddb_assets_settings' );
	}

	/**
	 * Assets that is required in common.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function common() {

		/**
		 * Action hook to enqueue common assets.
		 *
		 * Use this action to enqueue styles and scripts
		 * that are common in all pro sites admin pages.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ddb_assets_common' );
	}
}
