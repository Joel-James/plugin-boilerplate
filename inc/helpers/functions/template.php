<?php

use DD_Boilerplate\Inc\Helpers\Logs;

/**
 * Get a template or load current theme's custom template.
 *
 * Locate the called template.
 * Search Order:
 * 1. /themes/theme/ddb-templates/$template_name
 * 2. /themes/theme/$template_name
 * 3. /plugins/ddb-templates/templates/$template_name.
 *
 * @param string $template_name Template to load.
 * @param string $template_path Path to templates.
 *
 * @since 1.0.0
 *
 * @return string Path to the template file.
 */
function ddb_locate_template( $template_name, $template_path = '' ) {

	// Set variable to search in ddb-templates folder of theme.
	if ( ! $template_path ) {
		$template_path = 'ddb-templates/';
	}

	// Set default plugin templates path.
	$default_path = DDB_DIR . 'views/templates/';

	// Search template file in theme folder.
	$template = locate_template( array(
		$template_path . $template_name . '.php',
		$template_name . '.php',
	) );

	// Get plugins template file.
	if ( ! $template ) {
		$template = $default_path . $template_name . '.php';
	}

	/**
	 * Filter to change the template path.
	 *
	 * @param string $template      Template file name.
	 * @param string $template_name Template to load.
	 * @param string $template_path Path to templates.
	 * @param string $default_path  Default path.
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'ddb_locate_template', $template, $template_name, $template_path, $default_path );
}

/**
 * Print the given admin view file.
 *
 * @param string $view The relative path of the file.
 * @param array  $args Optional arguments to set as variable
 *
 * @since  1.0.0
 * @access public
 *
 * @return void
 */
function ddb_view( $view, $args = array() ) {

	// Custom file path.
	if ( file_exists( DDB_DIR . $view . '.php' ) ) {
		$file_name = DDB_DIR . $view . '.php';
	} else {
		// Default views.
		$file_name = DDB_DIR . 'views/' . $view . '.php';
	}

	// If file exist, set all arguments are variables.
	if ( file_exists( $file_name ) && is_readable( $file_name ) ) {
		if ( ! empty( $args ) ) {
			$args = (array) $args;
			extract( $args );
		}
		// Now include the file.
		include $file_name;
	} else {
		// Log error.
		Logs::error_log( sprintf( __( 'DD Boilerplate, view missing or not readable: %s', 'dd-boilerplate' ), $file_name ) );
	}
}

/**
 * Get or print the given filename.
 *
 * @param string $template_name Template to load.
 * @param array  $args          Args passed for the template file.
 * @param string $tempate_path  Path to templates.
 *
 * @since  1.0.0
 * @access public
 *
 * @return void
 */
function ddb_render( $template_name, $args = array(), $tempate_path = '' ) {

	// Locate the template based on priority.
	$template_file = ddb_locate_template( $template_name, $tempate_path );

	// If template found.
	if ( file_exists( $template_file ) ) {
		// Make sure all variables are available in template.
		if ( ! empty( $args ) ) {
			$args = (array) $args;
			extract( $args );
		}
		// Now include the file.
		include $template_file;
	} else {
		// Log error.
		Logs::error_log( sprintf( __( 'DD Boilerplate, template missing or not readable: %s', 'dd-boilerplate' ), $template_file ) );
	}
}

/**
 * Render admin menu for DD Boilerplate dashboard.
 *
 * @param array  $tabs         Tab items (array of key and title).
 * @param string $current_item Current active item.
 *
 * @since  4.0.0
 * @access public
 *
 * @return void
 */
function ddb_render_admin_menu( $tabs, $current_item ) {

	ddb_view( 'admin/common/menu', array(
		'tabs' => $tabs,
		'tab'  => $current_item,
	) );
}
