<?php

namespace DD_Boilerplate\Inc\Helpers;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Helpers\General;
use DD_Boilerplate\Inc\Helpers\Request;

/**
 * Define the menu utility functionality.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Menu {

	/**
	 * Page tabs.
	 *
	 * @var array Tab names.
	 */
	private static $tabs = array(
		'main_page' => array(
			'tab1',
			'tab2',
		),
		'sub_page'  => array(
			'tab1',
			'tab2',
		),
	);

	/**
	 * Get a template or load current theme's custom template.
	 *
	 * @param string $parent Parent page.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public static function current_tab( $parent = 'main_page' ) {

		$tab = 'default';

		/**
		 * Filter to add items to tabs to current page.
		 *
		 * @since 1.0.0
		 */
		$tabs = apply_filters( 'ddb_menu_tabs', self::$tabs );

		// Make sure parent item is valid.
		$parent = in_array( $parent, array_keys( $tabs ) ) ? $parent : 'main_page';

		if ( General::is_ddb_page() ) {
			// Get tab from url.
			$request_tab = Request::get( 'tab' );

			// Get current tab.
			if ( ! empty( $request_tab ) && in_array( $request_tab, $tabs[ $parent ] ) ) {
				$tab = $request_tab;
			}
		}

		return $tab;
	}

	/**
	 * Get a template or load current theme's custom template.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public static function current_menu() {

		$menu = 'default';

		if ( General::is_ddb_page() ) {
			$request_menu = Request::get( 'page' );

			// Get current menu.
			if ( ! empty( $request_menu ) && in_array( $request_menu, self::$setting_tabs ) ) {
				$menu = $request_menu;
			}
		}

		return $menu;
	}
}
