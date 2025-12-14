<?php
/**
 * Frontend functionality.
 *
 * @package CookieVJ
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Frontend class.
 */
class COOKIEVJ_Frontend {

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
		$this->options = get_option( 'cookievj_settings' );

		if ( $this->is_banner_enabled() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
			add_action( 'wp_footer', array( $this, 'render_cookie_banner' ) );
		}
	}

	/**
	 * Check if banner is enabled.
	 *
	 * @return bool
	 */
	private function is_banner_enabled() {
		return isset( $this->options['enabled'] ) && '1' === $this->options['enabled'];
	}

	/**
	 * Enqueue frontend assets.
	 */
	public function enqueue_frontend_assets() {
		// Enqueue CSS.
		wp_enqueue_style(
			'cookievj-frontend',
			COOKIEVJ_PLUGIN_URL . 'assets/css/frontend.min.css',
			array(),
			COOKIEVJ_VERSION
		);

		// Enqueue JS.
		wp_enqueue_script(
			'cookievj-frontend',
			COOKIEVJ_PLUGIN_URL . 'assets/js/frontend.min.js',
			array( 'jquery' ),
			COOKIEVJ_VERSION,
			true
		);

		// Pass settings to JavaScript.
		wp_localize_script(
			'cookievj-frontend',
			'cookievjSettings',
			array(
				'cookieName'   => 'cookievj_cookie_consent',
				'cookieExpiry' => 365,
			)
		);

		// Add inline styles for customization.
		$cookievj_custom_css = $this->get_cookievj_custom_css();
		wp_add_inline_style( 'cookievj-frontend', $cookievj_custom_css );
	}

	/**
	 * Get custom CSS based on settings.
	 *
	 * @return string
	 */
	private function get_cookievj_custom_css() {
		$bg_color     = isset( $this->options['bg_color'] ) ? $this->options['bg_color'] : '#2c3e50';
		$button_color = isset( $this->options['button_color'] ) ? $this->options['button_color'] : '#27ae60';

		$css = "
			.cookievj-cookie-banner {
				background-color: {$bg_color};
			}
			.cookievj-accept-btn {
				background-color: {$button_color};
			}
			.cookievj-accept-btn:hover {
				background-color: {$button_color};
				opacity: 0.9;
			}
		";

		return $css;
	}

	/**
	 * Render cookie banner.
	 */
	public function render_cookie_banner() {
		$message     = isset( $this->options['message'] ) ? $this->options['message'] : __( 'We use cookies to improve your experience. By continuing to visit this site you agree to our use of cookies.', 'cookievj' );
		$accept_text = isset( $this->options['accept_text'] ) ? $this->options['accept_text'] : __( 'Accept', 'cookievj' );
		$reject_text = isset( $this->options['reject_text'] ) ? $this->options['reject_text'] : __( 'Reject', 'cookievj' );
		$position    = isset( $this->options['position'] ) ? $this->options['position'] : 'bottom';

		$position_class = 'cookievj-position-' . esc_attr( $position );
		?>
		<div id="cookievj-cookie-banner" class="cookievj-cookie-banner <?php echo esc_attr( $position_class ); ?>" style="display: none;">
			<div class="cookievj-banner-content">
				<div class="cookievj-banner-message">
					<p><?php echo esc_html( $message ); ?></p>
				</div>
				<div class="cookievj-banner-buttons">
					<button type="button" class="cookievj-accept-btn" id="cookievj-accept-btn">
						<?php echo esc_html( $accept_text ); ?>
					</button>
					<button type="button" class="cookievj-reject-btn" id="cookievj-reject-btn">
						<?php echo esc_html( $reject_text ); ?>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}