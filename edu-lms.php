<?php
/**
 * Plugin Name: EduLMS
 * Description: A Wordpress plugin for LMS.
 * Author: marufmks
 * Author URI: https://github.com/marufmks
 * License: GPLv2
 * Version: 1.0.0
 * Text Domain: edu-lms
 * Domain Path: /languages
 *
 * @package EduLMS
 */

use EduLMS\Core\Install;

defined( 'ABSPATH' ) || exit;

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'plugin.php';

/**
 * Initializes the EduLMS plugin when plugins are loaded.
 *
 * @since 1.0.0
 * @return void
 */
function edu_lms_init() {
	EduLMS::get_instance()->init();
}

// Hook for plugin initialization.
add_action( 'plugins_loaded', 'edu_lms_init' );

// Hook for plugin activation.
register_activation_hook( __FILE__, array( Install::get_instance(), 'init' ) );
