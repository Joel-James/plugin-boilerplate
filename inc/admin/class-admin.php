<?php

namespace DD_Boilerplate\Inc\Admin;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core\Base;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Admin extends Base {

	/**
	 * Admin menu class instance.
	 *
	 * @var Menu
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $menu;

	/**
	 * Admin pages class instance.
	 *
	 * @var Page
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $page;

	/**
	 * Admin assets class instance.
	 *
	 * @var Menu
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $assets;

	/**
	 * Admin constructor.
	 *
	 * Set class properties and initialize child classes.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->menu   = new Menu();
		$this->assets = new Assets();
		$this->page   = new Page();
	}

	/**
	 * Register hoosk from class and children.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Register hooks from children.
		$this->menu->init();
		$this->assets->init();
	}
}
