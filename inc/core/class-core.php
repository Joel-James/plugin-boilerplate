<?php

namespace DD_Boilerplate\Inc\Core;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * The core functionality of the plugin.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Core extends Base {

	/**
	 * Cron class instance.
	 *
	 * @var Cron
	 */
	protected $cron;

	/**
	 * Core constructor.
	 *
	 * Set class properties and initialize child classes.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->cron = new Cron();
	}

	/**
	 * Register hoosk from class and children.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Register cron hooks.
		$this->cron->init();
	}
}
