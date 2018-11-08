<?php

namespace DD_Boilerplate\Inc\Admin;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core\Base;
use DD_Boilerplate\Inc\Helpers\Menu as Menu_Helper;

/**
 * The page-specific functionality of the plugin.
 *
 * Loading page specific views are handled in this class.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Page extends Base {

	/**
	 * Register the page for the admin area.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function main_page() {

		$header_args = array(
			'title' => __( 'DD Boilerplate', 'dd-boilerplate' ),
		);

		$tabs = array(
			'default' => __( 'DD Boilerplate', 'dd-boilerplate' ),
			'tab1'    => __( 'Tab 1', 'dd-boilerplate' ),
			'tab2'    => __( 'Tab 2', 'dd-boilerplate' ),
		);

		/**
		 * Filter to add/remove menu items in settings page.
		 *
		 * @param array $menu_items Menu items.
		 *
		 * @since 1.0.0
		 */
		$tabs = apply_filters( 'ddb_settings_menu_items', $tabs );

		// Get args for the page.
		$args = array(
			'title' => __( 'Settings', 'dd-boilerplate' ),
			'tab'   => Menu_Helper::current_tab( 'main_page' ),
			'tabs'  => $tabs,
		);

		ddb_view( 'admin/common/header', $header_args );
		ddb_view( 'admin/main-page', $args );
		ddb_view( 'admin/common/footer' );
	}

	/**
	 * Register the sub menu page 1 for the admin area.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function sub_page() {

		$header_args = array(
			'title' => __( 'Sub Page 1', 'dd-boilerplate' ),
		);

		$tabs = array(
			'default' => __( 'Sub Page 1', 'dd-boilerplate' ),
			'tab1'    => __( 'Tab 1', 'dd-boilerplate' ),
			'tab2'    => __( 'Tab 2', 'dd-boilerplate' ),
		);

		/**
		 * Filter to add/remove menu items in settings page.
		 *
		 * @param array $menu_items Menu items.
		 *
		 * @since 1.0.0
		 */
		$tabs = apply_filters( 'ddb_settings_menu_items', $tabs );

		// Get args for the page.
		$args = array(
			'title' => __( 'Settings', 'dd-boilerplate' ),
			'tab'   => Menu_Helper::current_tab( 'sub_page' ),
			'tabs'  => $tabs,
		);

		ddb_view( 'admin/common/header', $header_args );
		ddb_view( 'admin/sub-page', $args );
		ddb_view( 'admin/common/footer' );
	}
}