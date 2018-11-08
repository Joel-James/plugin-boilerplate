<?php

namespace DD_Boilerplate\Inc;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

use DD_Boilerplate\Inc\Core;
use DD_Boilerplate\Inc\Admin;
use DD_Boilerplate\Inc\Front;

/**
 * The core plugin class.
 * Defines internationalization, admin-specific hooks, and public-facing site hooks.
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
final class DD_Boilerplate extends Core\Base {

	/**
	 * The instance of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @var DD_Boilerplate $instance Instance of the plugin.
	 */
	private static $instance;

	/**
	 * The name of this plugin.
	 *
	 * @var string $plugin_name The name of this plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @var string $plugin_version The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $plugin_version;

	/**
	 * Admin class instance.
	 *
	 * @var Admin\Admin
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $admin;

	/**
	 * Front class instance.
	 *
	 * @var Front\Front
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $frontend;

	/**
	 * Core class instance.
	 *
	 * @var Core\Core
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected $core;

	/**
	 * Initialize and set properties.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	private function __construct() {

		// Initialize.
		$this->init();

		$this->plugin_name    = DDB_NAME;
		$this->plugin_version = DDB_VERSION;
	}

	/**
	 * Main DD_Boilerplate Instance.
	 *
	 * Ensures only one instance of DD_Boilerplate is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @static
	 * @see DD_Boilerplate()
	 *
	 * @return DD_Boilerplate
	 */
	public static function instance() {

		// If instance not set, or not valid, create new.
		if ( is_null( self::$instance ) || ! self::$instance instanceof DD_Boilerplate ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize functionality of the plugin.
	 *
	 * This is where we kick-start the plugin by defining
	 * everything required and register all hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	private function init() {

		$this->define_constants();
		$this->load_depends();
		$this->init_hooks();
		$this->set_locale();
		$this->define_classes();
		$this->init_classes();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function set_locale() {

		$i18n = new Core\I18n();
		$i18n->init();
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * Note: Do not write any heavy tasks in __constructor of classes.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function define_classes() {

		// Define controllers.
		$this->admin    = new Admin\Admin();
		$this->frontend = new Front\Front();
		$this->core     = new Core\Core();
	}

	/**
	 * Define DD Boilerplate constants.
	 *
	 * These constants can not be changed.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function define_constants() {

		// Plugin name.
		$this->define( 'DDB_NAME', 'dd-boilerplate' );
		// Plugin version.
		$this->define( 'DDB_VERSION', '1.0.0' );
		// Shared UI version.
		$this->define( 'DDB_UI_VERSION', 'sui-2-3-9' );
		// Plugin directory.
		$this->define( 'DDB_DIR', plugin_dir_path( DDB_PLUGIN_FILE ) );
		// Plugin url.
		$this->define( 'DDB_URL', plugin_dir_url( DDB_PLUGIN_FILE ) );
		// Plugin base file.
		$this->define( 'DDB_BASENAME', plugin_basename( DDB_PLUGIN_FILE ) );
		// Plugin vendor directory.
		$this->define( 'DDB_VENDOR', DDB_DIR . 'inc/vendor/' );
	}

	/**
	 * Initialize all classes of the plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_classes() {

		// Initialize controllers.
		$this->admin->init();
		$this->frontend->init();
		$this->core->init();
	}

	/**
	 * Initialize the hooks.
	 *
	 * Set activation and deactivation hooks here.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {

		// The code that runs during plugin activation.
		register_activation_hook( DDB_PLUGIN_FILE, array( 'DD_Boilerplate\Inc\Core\Activator', 'activate' ) );

		// The code that runs during plugin deactivation.
		register_deactivation_hook( DDB_PLUGIN_FILE, array( 'DD_Boilerplate\Inc\Core\Deactivator', 'deactivate' ) );
	}

	/**
	 * Load dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function load_depends() {

		// Include our helper functions.
		require_once DDB_DIR . 'inc/helpers/functions/template.php';
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string $name Constant name.
	 * @param string|bool $value Constant value.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function define( $name, $value ) {

		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
}
