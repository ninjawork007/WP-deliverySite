<?php	
if(!function_exists('cristiano_customize_register')) {
	function cristiano_customize_register( $wp_customize ) {
		$header = cs_get_option('ukrdevs_header');
		$wp_customize->remove_section('colors');
		if($header == 'v1' || $header == 'v3') {
			$wp_customize->remove_section('top_bar');		
		}
		if($header == 'v1' || $header == 'v2' ) {
			$wp_customize->remove_section('nav_colors');		
		}
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'cristiano_customize_register', 40 );

/* TOP BAR COLORS
   ========================================================================== */
function cristiano_top_bar_colors() {
	$bg = cs_get_customize_option( 'top_bar_bg', '#1b2024' );
	$tx = cs_get_customize_option( 'top_bar_color', '#ffffff' );
	$pr = cs_get_customize_option( 'top_bar_hover', '#d1a054' );
	$css = '';

	if ( $bg !== '#1b2024' || $tx !== '#ffffff' ) {
		$css .= '
			#top-bar { 
				background-color: %1$s; 
				color: %2$s;
			}';
	}
	if( $pr !== '#d1a054' ) {
		$css .= '
			#top-bar a:hover,
			#top-bar .current-menu-item a {
				color: %3$s;
			}
		';	
	}
	wp_add_inline_style( 'cristiano-style', sprintf( $css, $bg, $tx, $pr ) );
}
add_action( 'wp_enqueue_scripts', 'cristiano_top_bar_colors', 20 );

/* HEADER COLORS
   ========================================================================== */
function cristiano_header_colors() {
	$bg = cs_get_customize_option( 'header_bg', '#1b2024' );
	$tx = cs_get_customize_option( 'header_color', '#ffffff' );
	$pr = cs_get_customize_option( 'header_hover', '#d1a054' );
	$tr = cs_get_customize_option( 'transparent_color', '#ffffff' );
	$css = '';
	if ( $bg !== '#1b2024' || $tx !== '#ffffff' ) {
		$css .= '
			.header-container,
			.primary-menu .sub-menu,
			.header-mini-cart {
				background-color: %1$s;
			}	
			.cart-link .count,
			.header-mini-cart .widget_shopping_cart .checkout {
				color: %1$s;
			}	
			.header-container,
			.primary-menu .sub-menu,
			.header-mini-cart {
				color: %2$s;
			}
		';
	}
	if( $pr !== '#d1a054' ) {
		$css .= '
			.primary-menu .current-menu-ancestor > a,
			.primary-menu .current-menu-item > a,
			.header a:hover,
			.header-mini-cart .amount {
				color: %3$s;
			}
			.primary-menu .sub-menu,
			.header-mini-cart {
				border-color: %3$s;
			}
			.cart-link .count,
			.header-mini-cart .widget_shopping_cart .checkout {
				background-color: %3$s;
			}
		';
	}
	if( $tr !== '#ffffff' ) {
		$css .= '
			.color-tr,
			.dzsparallaxer,
			.header-container.transparent-header {
				color: %4$s;
			}
		';
	}	
	
	
	wp_add_inline_style( 'cristiano-style', sprintf( $css, $bg, $tx, $pr, $tr ) );
}
add_action( 'wp_enqueue_scripts', 'cristiano_header_colors', 20 );

/* CONTENT COLORS
   ========================================================================== */
	
function cristiano_content_colors() {
	$bg = cs_get_customize_option( 'background_color', '#ffffff' );
	$tx = cs_get_customize_option( 'text_color', '#1b2024' );
	$pr = cs_get_customize_option( 'highlight_color', '#d1a054' );
	$css = '';
	if ( $bg !== '#ffffff' || $tx !== '#1b2024' ) {
		$css .= '
			.color-content,
			input, textarea, select {
				background-color: %1$s;
				color: %2$s;
			}	
			.color-content-inverse,
			#product-list .product-price,
			.btn-default,
			.woocommerce .price,
			.woocommerce-MyAccount-navigation-link a {
				background-color: %2$s;
				color: %1$s;		
			}
		';
	}
	if( $pr !== '#d1a054' ) {
		$css .= '
			.color-pr-tx,
			.btn-plate, 
			.btn-cart,
			.added_to_cart,
			.star-rating, 
			.product-subtotal .amount,
			tfoot .amount,
			.woocommerce-info a,
			.current-cat a,
			.is-active a,
			.post-content a,
			a:hover  {
				color: %3$s;
			}
			.color-pr-bg,
			.btn-primary,
			.swiper-pagination-bullet-active,
			.ui-slider .ui-slider-range,
			.woocommerce-notice--success,
			.widget_shopping_cart .checkout,
			.nav-links .current {
				background-color: %3$s;
				color: %1$s;
			}
		';
	}
	wp_add_inline_style( 'cristiano-style', sprintf( $css, $bg, $tx, $pr ) );	
}
add_action( 'wp_enqueue_scripts', 'cristiano_content_colors', 20 );

/* FOOTER COLORS
   ========================================================================== */

function cristiano_footer_colors() {
	$bg = cs_get_customize_option( 'footer_bg', '#1b2024' );
	$tx = cs_get_customize_option( 'footer_color', '#ffffff' );
	$pr = cs_get_customize_option( 'footer_hover', '#d1a054' );
	$css = '';
	if ( $bg !== '#1b2024' || $tx !== '#ffffff' ) {
		$css .= '
			#footer,
			#lang_sel_footer {
				background-color: %1$s;
				color: %2$s;
			}
		';
	}
	if( $pr !== '#d1a054' ) {
		$css .= '
			#footer h2,
			#footer a:hover {
				color: %3$s;
			}
		';
	}
	wp_add_inline_style( 'cristiano-style', sprintf( $css, $bg, $tx, $pr ) );
}
add_action( 'wp_enqueue_scripts', 'cristiano_footer_colors', 20 );