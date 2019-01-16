<?php

// Compatibility Check
function amz_wc_add_to_cart_redirection_compatibility_check()
{
	if ( ! class_exists( 'WooCommerce' ) ) {
		return __( 'Please install and activate <strong>WooCommerce</strong> plugin first.', 'amz_wcrd' );
	}

	return false;
}
