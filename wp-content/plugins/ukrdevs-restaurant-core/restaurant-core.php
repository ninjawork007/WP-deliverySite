<?php
/*
Plugin Name: Restaurant Core
Description: Plug-in significantly expands Cristiano theme functionality. Developed special for Cristiano restaurant theme.
Version:     3.9.14
Author:      UkrDevs
Author URI:  http://ukrdevs.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: restocore
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'RESTAURANTCORE_PLUGIN_URL', __FILE__ );

//register_activation_hook( RESTAURANTCORE_PLUGIN_URL, 'restaurantcore_activate' );
//load_plugin_textdomain( 'restocore', false,  dirname( plugin_basename( __FILE__ ) ) . '/languages' );

include_once( 'restaurant-functions.php' );
include_once( 'cs-framework/cs-framework.php' );
include_once( 'type-our-menu/init.php' );
include_once( 'type-promo-slider/init.php' );
include_once( 'type-testimonials/init.php' );

include_once( 'widgets/contact-us.php' );	// Include Contact Details Widget
include_once( 'widgets/social.php' ); 	   	// Include Social Links Widget

if(class_exists('OCDI_Plugin')){
	include_once( 'restaurant-ocdi.php' );
}

function restocore_register_widgets() {
	register_widget( 'Cristiano_Contact_Widget' );
	register_widget( 'Cristiano_Social_Widget' );
}
add_action( 'widgets_init', 'restocore_register_widgets' );

add_filter( 'body_class','restocore_bg_pattern' );	// Body Class for Background Patterns

/** Shortcodes */
include_once( 'shortcodes/contact-details.php' );			// Include Shortcode file - Contact Details
include_once( 'shortcodes/open-table-reservation.php' );	// Include Shortcode file - Open Table Reservation
include_once( 'shortcodes/short-info.php' );				// Include Shortcode file - Short Info
include_once( 'shortcodes/contact-form.php' );				// Include Shortcode file - Contact Form
include_once( 'shortcodes/reservation.php' );				// Include Shortcode file - Reservarion
include_once( 'shortcodes/latest-news.php' );				// Include Shortcode file - Latest News
include_once( 'shortcodes/heading.php' );					// Include Shortcode file - Heading
include_once( 'shortcodes/article.php' );					// Include Shortcode file - Article
include_once( 'shortcodes/button.php' );					// Include Shortcode file - Button
include_once( 'shortcodes/product-list.php' );				// Include Shortcode file - Product List


add_shortcode( 'contact_form',			'restocore_contact_form' );				// Ajax Contact Form
add_shortcode( 'email_reservation',		'restocore_reservation' );				// Email Reservation Shortcode	
add_shortcode( 'open_table_reservation','restocore_open_table_reservation' );	// Open Table Reservation Shortcode
add_shortcode( 'contact_details',		'restocore_contact_details' );			// Contact Details Shortcode
add_shortcode( 'short_info',			'restocore_short_info' );				// Short Info Shortcpde	
add_shortcode( 'latest_news',			'restocore_latest_news' );				// Latest News Shortcode
add_shortcode( 'heading',				'restocore_heading' );					// Heading Shortcode
add_shortcode( 'article',				'restocore_article' );					// Article Shortcode
add_shortcode( 'button',				'cristiano_button_shortcode' );			// Button Shortcode
add_shortcode( 'product_list',			'cristiano_product_list' );				// WC Product List


/** WooCommerce Shortcodes */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('woocommerce/woocommerce.php')) {
	include_once( 'shortcodes/product-categories.php' ); 	// Include Shortcode WooCommerce - Promo Slider	
	include_once( 'shortcodes/star-products.php' );  		// Include Shortcode WooCommerce - Featured Products
	add_shortcode( 'product_cat', 'restaurantcore_product_categories' );
	add_shortcode( 'star_products', 'restaurantcore_star_products' );
}