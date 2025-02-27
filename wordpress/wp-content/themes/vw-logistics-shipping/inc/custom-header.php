<?php
/**
 * @package VW Logistics Shipping 
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_logistics_shipping_header_style()
*/
function vw_logistics_shipping_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_logistics_shipping_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'vw_logistics_shipping_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_logistics_shipping_custom_header_setup' );

if ( ! function_exists( 'vw_logistics_shipping_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_logistics_shipping_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_logistics_shipping_header_style' );

function vw_logistics_shipping_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'vw-logistics-shipping-basic-style', $custom_css );
	endif;
}
endif;