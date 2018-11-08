<?php

namespace DD_Boilerplate\Inc\Admin;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core\Base;

/**
 * The menu-specific functionality of the plugin.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Menu extends Base {

	/**
	 * Initialize the class by registering hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {

		$this->add_action( 'admin_menu', $this, 'admin_menu' );
	}

	/**
	 * Register the menu for the admin settings.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function admin_menu() {

		$page = new Page();

		// Main page.
		add_menu_page(
			__( 'DD Boilerplate', 'dd-boilerplate' ),
			__( 'DD Boilerplate', 'dd-boilerplate' ),
			'manage_options',
			DDB_NAME,
			array( $page, 'main_page' ),
			'dashicons-admin-plugins'
		);

		// Example sub menu.
		$this->sub_menu( $page );
	}

	/**
	 * Register the sub menu for the admin settings.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	private function sub_menu( $page ) {

		// Sub page.
		$page_hook = add_submenu_page(
			DDB_NAME,
			__( 'Sub Menu', 'dd-boilerplate' ),
			__( 'Sub Menu', 'dd-boilerplate' ),
			'manage_options',
			'ddb-sub-menu',
			array( $page, 'sub_page' )
		);

		/**
		 * Action hook to run something when we are on DD Boilerplate sub menu page.
		 *
		 * @param string $main_page DD Boilerplate menu string.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ddb_menu_settings_sub_menu', $page_hook );
	}
}
