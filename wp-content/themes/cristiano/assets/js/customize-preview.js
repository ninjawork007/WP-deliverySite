/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
	var api = wp.customize;
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.text-logo h2' ).text( to );
		} );
	} );
	
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.text-logo p' ).text( to );
		} );
	} );	

	// TOP BAR COLORS
	wp.customize( '_cs_customize_options[top_bar_bg]', function( value ) {
		value.bind( function( newval ) {
			$( '#top-bar' ).css('background-color', newval );
		} );
	} );
	wp.customize( '_cs_customize_options[top_bar_color]', function( value ) {
		value.bind( function( newval ) {
			$( '#top-bar' ).css('color', newval );
		} );
	} );	

	// TRANSPARENT COLORS
	wp.customize( '_cs_customize_options[transparent_color]', function( value ) {
		value.bind( function( newval ) {
			$( '.color-tr, .dzsparallaxer, .transparent-header' ).css('color', newval );
		} );
	} );

	// HEADER COLORS
	wp.customize( '_cs_customize_options[header_bg]', function( value ) {
		value.bind( function( newval ) {
			$( '.header-container, .primary-menu .sub-menu, .header-mini-cart' ).css('background-color', newval );
			$( '.cart-link .count' ).css('color', newval);			
		} );
	} );
	wp.customize( '_cs_customize_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			$( '.header-container, .primary-menu .sub-menu, .header-mini-cart' ).css('color', newval );			
		} );
	} );
	wp.customize( '_cs_customize_options[header_hover]', function( value ) {
		value.bind( function( newval ) {
			$( '.current-menu-item > a, .header-mini-cart .amount' ).css('color', newval );
			$( '.cart-link .count, .header-mini-cart .checkout' ).css('background-color', newval );	
			$( '.header-mini-cart, .primary-menu .sub-menu' ).css('border-color', newval );	

		} );
	} );	
	
	// CONTENT COLORS
	wp.customize( '_cs_customize_options[background_color]', function( value ) {
		value.bind( function( newval ) {
			$( '.color-content' ).css('background-color', newval );
			$( '.color-content-inverse, .color-pr-bg' ).css('color', newval);
		} );
	} );
	wp.customize( '_cs_customize_options[text_color]', function( value ) {
		value.bind( function( newval ) {
			$( '.color-content' ).css('color', newval );
			$( '.color-content-inverse' ).css('background-color', newval);
		} );
	} );
	wp.customize( '_cs_customize_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			$( '.color-pr-tx, .btn-plate, .btn-cart, .added_to_cart, .star-rating, .product-subtotal .amount, tfoot .amount, .woocommerce-info a, .current-cat a, .is-active a, .post-content a' ).css('color', newval );
			$( '.color-pr-bg, .btn-primary, .swiper-pagination-bullet-active, .header-mini-cart .checkout' ).css('background-color', newval );
		} );
	} );	
		
	// FOOTER COLORS
	wp.customize( '_cs_customize_options[footer_bg]', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css('background-color', newval );
		} );
	} );
	wp.customize( '_cs_customize_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css('color', newval );
		} );
	} );	
	
} )( jQuery );