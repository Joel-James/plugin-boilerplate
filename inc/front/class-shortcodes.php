<?php

namespace DD_Boilerplate\Inc\Front;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core\Base;

/**
 * The shortcodes functionality of the plugin.
 *
 * @todo Implement this.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Shortcodes extends Base {

	/**
	 * Register shortcodes for the DD Boilerplate.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Shortcode for the DD Boilerplate account page.
		add_shortcode( 'prosites_account', array( $this, 'account' ) );
		// Shortcode for the pricing table.
		add_shortcode( 'prosites_pricing_table', array( $this, 'pricing_table' ) );
	}

	/**
	 * User's account page shortcode.
	 *
	 * @since 1.0.0
	 */
	public function account() {

		$account_data = array();

		ddb_render( 'account', $account_data );
	}

	/**
	 * DD Boilerplate pricing table.
	 *
	 * This shortcode can be used to display
	 * the pricing table of the DD Boilerplate.
	 *
	 * @since 1.0.0
	 */
	public function pricing_table() {

	}
}
