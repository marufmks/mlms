<?php
use EduLMS\Core\Api;
use EduLMS\Admin\Menu;
use EduLMS\Core\Template;
use EduLMS\Assets\Frontend;
use EduLMS\Assets\Admin;
use EduLMS\Traits\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Class EduLMS
 *
 * The main class for the Coldmailar plugin, responsible for initialization and setup.
 *
 * @since 1.0.0
 */
final class EduLMS {

	use Base;

	/**
	 * Class constructor to set up constants for the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
		define( 'EDU_LMS_VERSION', '1.0.0' );
		define( 'EDU_LMS_PLUGIN_FILE', __FILE__ );
		define( 'EDU_LMS_DIR', plugin_dir_path( __FILE__ ) );
		define( 'EDU_LMS_URL', plugin_dir_url( __FILE__ ) );
		define( 'EDU_LMS_ASSETS_URL', EDU_LMS_URL . '/assets' );
		define( 'EDU_LMS_ROUTE_PREFIX', 'edu-lms/v1' );
	}

	/**
	 * Main execution point where the plugin will fire up.
	 *
	 * Initializes necessary components for both admin and frontend.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		if ( is_admin() ) {
			Menu::get_instance()->init();
			Admin::get_instance()->bootstrap();
		}

		// Initialze core functionalities.
		Frontend::get_instance()->bootstrap();
		API::get_instance()->init();
		Template::get_instance()->init();

		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	public function register_blocks() {
		register_block_type( __DIR__ . '/assets/blocks/block-1' );
	}


	/**
	 * Internationalization setup for language translations.
	 *
	 * Loads the plugin text domain for localization.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain( 'edu-lms', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}
