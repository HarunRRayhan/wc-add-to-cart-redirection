<?php
/**
 * Plugin Name:             WooCommerce Add To Cart Redirection
 * Plugin URI:              https://amazingplugins.com
 * Description:             Redirect user to any selected page upon product added to cart. You can choose any page
 * Author:                  Harun R Rayhan
 * Author URI:              https://amazingplugins.com
 * Text Domain:             amz_wcrd
 * Domain Path:             /languages
 * Version:                 0.1.0
 *
 * Requires at least:       4.5
 * Tested up to:            5.0.3
 * WC requires at least:    2.7
 * WC tested up to:         3.5.3
 *
 * License:                 GPLv2 or later
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package                 WC_Add_To_Cart_Redirection
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Permission denied!' );
}

// Define AMZ_WC_REDIRECTION_FILE
if ( ! defined( 'AMZ_WCRD_REDIRECTION_FILE' ) ) {
	define( 'AMZ_WCRD_REDIRECTION_FILE', __FILE__ );
}

// Define Minimum WooCommerce Version
if ( ! defined( 'AMZ_WCRD_MINIMUM_WOOCOMMERCE_VERSION' ) ) {
	define( 'AMZ_WCRD_MINIMUM_WOOCOMMERCE_VERSION', 2.7 );
}

// Plugin DIRNAME
if ( ! defined( 'AMZ_WCRD_PLUGIN_DIRNAME' ) ) {
	define( 'AMZ_WCRD_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
}

// Plugin Version
if ( ! defined( 'AMZ_WCRD_PLUGIN_VERSION' ) ) {
	define( 'AMZ_WCRD_PLUGIN_VERSION', '0.1.0' );
}

// Helper Functions
require_once( dirname( __FILE__ ) . '/helpers/helpers.php' );

// Register Activation Hook
register_activation_hook( __FILE__, function () {
	// Check if WooCommerce installed or Compatible
	$notice = amz_wcrd_check_woocommerce_plugin();
	if ( $notice ) {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die( amz_wcrd_plugin_die_message( $notice ) );
	}
} );

// Add Class for Redirection
if ( ! class_exists( 'AMZ_WooCommerce_Add_To_Cart_Redirection' ) ) {
	require_once( dirname( __FILE__ ) . '/includes/class.AMZ_WooCommerce_Add_To_Cart_Redirection.php' );
}


// Add AMZ_WooCommerce_Add_To_Cart_Redirection Class to Loaded hook
function amz_wcr_instance() {
	return AMZ_WooCommerce_Add_To_Cart_Redirection::instance();
}
add_action( 'plugins_loaded', 'amz_wcr_instance' );





