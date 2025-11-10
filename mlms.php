<?php
/**
 * Plugin Name: Mlms
 * Description: A Wordpress plugin for LMS.
 * Author: marufmks
 * Author URI: https://github.com/marufmks
 * License: GPLv2
 * Version: 1.0.0
 * Text Domain: mlms
 * Domain Path: /languages
 *
 * @package Mlms
 */

use Mlms\Core\Install;

defined( 'ABSPATH' ) || exit;

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'plugin.php';

/**
 * Initializes the Mlms plugin when plugins are loaded.
 *
 * @since 1.0.0
 * @return void
 */
function mlms_init() {
	Mlms::get_instance()->init();
}

// Hook for plugin initialization.
add_action( 'plugins_loaded', 'mlms_init' );

// Hook for plugin activation.
register_activation_hook( __FILE__, array( Install::get_instance(), 'init' ) );
