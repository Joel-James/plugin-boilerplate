<?php

namespace DD_Boilerplate\Inc\Helpers;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Define the settings utility functionality.
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
class Settings {

	/**
	 * DD Boilerplate settings option name.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private static $settings_key = 'ddb_settings';

	/**
	 * Get a single setting value.
	 *
	 * @param string $key     Setting key.
	 * @param string $group   Setting group.
	 * @param mixed  $default Default value.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public static function get_option( $key, $group, $default = false ) {

		// We need key and group.
		if ( empty( $key ) || empty( $group ) ) {
			return false;
		}

		// Get group values.
		$options = self::get_options( $group );

		return isset( $options[ $key ] ) ? $options[ $key ] : $default;
	}

	/**
	 * Get a setting group values.
	 *
	 * @param string $group Setting group.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public static function get_options( $group = '' ) {

		// Get site option.
		$options = get_site_option( self::$settings_key, array() );

		/**
		 * Filter to modify settings values before returning.
		 *
		 * @paran array $options Option values.
		 *
		 * @since 1.0.0
		 */
		$options = apply_filters( 'ddb_get_options', $options );

		// If group is not given, return all values.
		if ( empty( $group ) ) {
			return $options;
		}

		return isset( $options[ $group ] ) ? $options[ $group ] : array();
	}

	/**
	 * Update a single setting value.
	 *
	 * @param string $key   Setting key.
	 * @param mixed  $value Setting value.
	 * @param string $group Setting group.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return bool False if value was not updated. True if value was updated.
	 */
	public static function update_option( $key, $value, $group ) {

		// We need all parameters.
		if ( empty( $key ) || empty( $group ) || empty( $value ) ) {
			return false;
		}

		// Get all values first.
		$options = self::get_options();

		/**
		 * Filter to modify settings values before updating.
		 *
		 * @paran mixed  $value Option value.
		 * @paran string $key Option key.
		 * @paran string $options Option group.
		 *
		 * @since 1.0.0
		 */
		$value = apply_filters( 'ddb_update_option', $value, $key, $group );

		$options[ $group ][ $key ] = $value;

		return self::update_options( $options );
	}

	/**
	 * Update a setting group value.
	 *
	 * @param string $group Setting group.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return bool False if value was not updated. True if value was updated.
	 */
	private static function update_options( $values ) {

		// We need values.
		if ( empty( $values ) ) {
			return false;
		}

		/**
		 * Filter to modify settings values before updating.
		 *
		 * @paran array $values Option values.
		 *
		 * @since 1.0.0
		 */
		$values = apply_filters( 'ddb_update_options', $values );

		return update_site_option( self::$settings_key, $values );
	}
}
