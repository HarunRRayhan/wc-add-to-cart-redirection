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
 * WC tested up to:         3.3
 *
 * License:                 GPLv3
 * License URI:             http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package                 WC_Add_To_Cart_Redirection
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Permission denied!' );
}

// Define AMZ_WC_REDIRECTION_FILE
if ( ! defined( 'AMZ_WC_REDIRECTION_FILE' ) ) {
	define( 'AMZ_WC_REDIRECTION_FILE', __FILE__ );
}

// Helper Functions
require_once('helpers/helpers.php');

// Register Activation Hook
register_activation_hook( __FILE, function () {
	// Check if WooCommerce installed or Compatible
	$notice = amz_wc_add_to_cart_redirection_compatibility_check();
	if($notice) {

	}
} );





