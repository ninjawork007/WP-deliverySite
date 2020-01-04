<?php

/** Includes */
require get_parent_theme_file_path( '/inc/class-tgm-plugin-activation.php'	); // TGM Plugin Activation
require get_parent_theme_file_path( '/inc/init.php'							); // Initialization
require get_parent_theme_file_path( '/inc/enqueue.php'						); // Include Styles and Scripts
require get_parent_theme_file_path( '/inc/cristiano.php'					); // Theme Functions
require get_parent_theme_file_path( '/inc/fonts.php'						); // Fonts
require get_parent_theme_file_path( '/inc/color-patterns.php'				); // Color Patterns
require get_parent_theme_file_path( '/inc/config/framework.config.php'		); // Theme Options Configurations
require get_parent_theme_file_path( '/inc/config/metabox.config.php'		); // Metaboxes  Configurations
require get_parent_theme_file_path( '/inc/config/shortcode.config.php'		); // Shortcodes Configurations
require get_parent_theme_file_path( '/inc/config/taxonomy.config.php'		); // Taxonomies Configurations
require get_parent_theme_file_path( '/inc/config/customize.config.php'		); // Customizer Configurations

/** Actons */
add_action( 'after_switch_theme',		'cristiano_activete' 					);	// AFTER Theme Activate
add_action( 'after_setup_theme',		'cristiano_theme_support' 				);	// After Setup Theme
add_action( 'tgmpa_register',			'cristiano_require_plugins' 			);	// TGMPA Rerequire Plugins
add_action( 'tgmpa_register',			'cristiano_recomended_plugins' 			);	// TGMPA Recomended Plugins

add_action( 'widgets_init',				'cristiano_widgets' 					);	// WIDGETS Init
add_action( 'after_setup_theme',		'cristiano_menu' 						);	// MENU Init

/** Filters  */
add_filter( 'wp_calculate_image_srcset',	'__return_false' 					); 	// Disable WordPress Img Src Calculation
add_filter( 'use_default_gallery_style',	'__return_false' 					); 	// Disable WordPress Gallery Styles
add_filter( 'the_content_more_link',		'cristiano_remove_more_link'		);	// Remove More Link From Post
add_filter( 'comment_form_default_fields',	'cristiano_comment_form_fields'		);	// Unset URL Field Form Comment Form
add_filter( 'excerpt_length',				'cristiano_excerpt_length'			);	// Excerpt Length for Blog Filter
add_filter( 'excerpt_more',					'cristiano_excerpt_more'			);	// Excerpt More For Blog Filter
add_filter( 'wp_mail_from_name',			'cristiano_from_mail_name'			);	// Mail From Name Filter
add_filter( 'pre_get_posts',				'cristiano_exclude_children'		);	// Execlude Children

/** WooCommerce */
if( cristiano_is_wc_activated() ) { 
	require get_parent_theme_file_path( 'inc/woocommerce.php' ); 
	add_action( 'woocommerce_init', 			'cristiano_wc_image_dimensions' 		);	
	add_filter( 'loop_shop_columns',			'cristiano_loop_shop_columns'			);	 	
	add_action( 'init', 						'cristiano_placeholder' 				); 	// Update Placeholder Image				
	add_filter( 'woocommerce_enqueue_styles',	'cristiano_unset_wc_styles'				); 	// Unset WooCommerce styles
	add_filter( 'woocommerce_checkout_fields' , 'cristiano_override_checkout_fields'	);	// Unset Some Checkout Fields
	add_filter( 'woocommerce_shipping_fields' , 'cristiano_override_shipping_fields' 	);	// Unset Some Shipping Fields
	add_filter( 'loop_shop_per_page', 			'cristiano_products_per_page' 			);	// Products Per Page
	add_filter( 'woocommerce_product_short_description_editor_settings',	'cristiano_wc_short_description_settings'	);		
	add_filter( 'woocommerce_add_to_cart_fragments', 						'cristiano_cart_link_fragment'				);	// Ajax Update Number of Items In Cart
	add_filter( 'woocommerce_output_related_products_args', 				'cristiano_related_products_show' 			);	// How ManyRelated Products Show
	apply_filters( 'woocommerce_review_gravatar_size', '60' );							// Review Gravatar size	
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);		// Remove BreadCrumbs	
	remove_filter('woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories');
	
	
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);	
	add_action('woocommerce_after_shop_loop_item', 'cristiano_woocommerce_template_loop_add_to_cart');	
	
	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); 
	add_action('woocommerce_single_product_summary', 'cristiano_product_category_hours');	
}

function custom_add_to_cart_message() {
    $message    = sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(wc_get_page_id('shop')), __('Continue Shopping', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
    return $message;
}
add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message' );
