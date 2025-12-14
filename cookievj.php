<?php
/**
 * Plugin Name: CookieVJ – Cookie Notice & Consent Banner
 * Plugin URI: https://vishavjeet.in/cookievj
 * Description: CookieVJ – Cookie Notice & Consent Banner is a simple, lightweight plugin that helps your website comply with cookie consent regulations such as GDPR and CCPA. Display a customizable cookie banner to inform visitors about cookie usage and obtain their consent.
 * Version: 1.0.0
 * Author: Vishavjeet Choubey
 * Author URI: https://vishavjeet.in
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cookievj
 * Domain Path: /languages
 *
 * @package CookieVJ
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define plugin constants.
define( 'COOKIEVJ_VERSION', '1.0.0' );
define( 'COOKIEVJ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'COOKIEVJ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'COOKIEVJ_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Main plugin class.
 */
class COOKIEVJ_Plugin {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	private static $instance = null;

	/**
	 * Plugin options.
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Get instance of this class.
	 *
	 * @return object Single instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->load_dependencies();
		$this->init_hooks();
	}

	/**
	 * Load required dependencies.
	 */
	private function load_dependencies() {
		require_once COOKIEVJ_PLUGIN_DIR . 'includes/class-cookievj-admin.php';
		require_once COOKIEVJ_PLUGIN_DIR . 'includes/class-cookievj-frontend.php';
	}

	/**
	 * Initialize hooks.
	 */
	private function init_hooks() {
		if ( is_admin() ) {
			COOKIEVJ_Admin::get_instance();
		} else {
			COOKIEVJ_Frontend::get_instance();
		}
	}

	/**
	 * Activation hook.
	 */
	public static function activate() {
		// Set default options.
		$default_options = array(
			'enabled'          => '1',
			'message'          => __( 'We use cookies to improve your experience. By continuing to visit this site you agree to our use of cookies.', 'cookievj' ),
			'accept_text'      => __( 'Accept', 'cookievj' ),
			'reject_text'      => __( 'Reject', 'cookievj' ),
			'position'         => 'bottom',
			'bg_color'         => '#2c3e50',
			'button_color'     => '#27ae60',
		);

		if ( ! get_option( 'cookievj_settings' ) ) {
			add_option( 'cookievj_settings', $default_options );
		}
	}


}

/**
 * Initialize the plugin.
 */
function cookievj_init() {
	return COOKIEVJ_Plugin::get_instance();
}

// Start the plugin.
cookievj_init();

// Register activation hook.
register_activation_hook( __FILE__, array( 'COOKIEVJ_Plugin', 'activate' ) );