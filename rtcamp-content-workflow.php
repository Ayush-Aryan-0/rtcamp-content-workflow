<?php
/**
 * Plugin Name: RTCamp Content Workflow
 * Plugin URI: https://github.com/yourusername/rtcamp-content-workflow
 * Description: Custom editorial workflow system built for enterprise WordPress.
 * Version: 1.0.0
 * Author: Ayush Aryan
 * License: GPL v2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Plugin constants
define( 'RCWM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'RCWM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load required files (ORDER MATTERS)
require_once RCWM_PLUGIN_PATH . 'includes/class-rcwm-db.php';
require_once RCWM_PLUGIN_PATH . 'includes/class-rcwm-loader.php';

// Activation hook
register_activation_hook( __FILE__, 'rcwm_activate_plugin' );
function rcwm_activate_plugin() {
    RCWM_DB::create_tables();
}

// Deactivation hook
register_deactivation_hook( __FILE__, 'rcwm_deactivate_plugin' );
function rcwm_deactivate_plugin() {
    // Optional cleanup later
}

// Run the plugin
function rcwm_run_plugin() {
    $loader = new RCWM_Loader();
    $loader->run();
}
rcwm_run_plugin();
