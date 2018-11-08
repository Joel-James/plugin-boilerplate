<?php

namespace DD_Boilerplate\Inc\Core;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Utils\Loader;

/**
 * The core plugin controller class.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Base extends Loader {

	/**
	 * Setter method.
	 *
	 * Set property and values to class.
	 *
	 * @param string $key   Property to set.
	 * @param mixed  $value Value to assign to the property.
	 *
	 * @since 1.0.0
	 */
	public function __set( $key, $value ) {

		$this->{$key} = $value;
	}

	/**
	 * Getter method.
	 *
	 * Allows access to extended site properties.
	 *
	 * @param string $key Property to get.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed Value of the property. Null if not available.
	 */
	public function __get( $key ) {

		// If set, get it.
		if ( isset( $this->{$key} ) ) {
			return $this->{$key};
		}

		return null;
	}
}
