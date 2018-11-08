<?php

namespace DD_Boilerplate\Inc\Front;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core\Base;

/**
 * The public-facing functionality of the plugin.
 *
 * @todo Implement this.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Front extends Base {

	/**
	 * Shortcodes class instance.
	 *
	 * @var Shortcodes
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $shortcodes;

	/**
	 * Frontend constructor.
	 *
	 * Set class properties and initialize child classes.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->shortcodes = new Shortcodes();
	}

	/**
	 * Register hooks from class and children.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$this->shortcodes->init();
	}
}
