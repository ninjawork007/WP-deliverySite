<?php
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

load_theme_textdomain( 'cristiano', get_template_directory() . '/languages' );	
	
/* THEME ACTIVATION
---------------------------------------------------------------- */	
function cristiano_activete() {
	if (version_compare( get_bloginfo('version'), '4.2', '<') ) {
		wp_die( esc_html__('You must have a minimum version of 4.2 to use this theme', 'cristiano') );
	}
}

/* TGM PLUGIN
---------------------------------------------------------------- */
function cristiano_require_plugins() {
	$plugins = array(	
		array(
			'name' 			=> esc_html__('Restaurant Core', 'cristiano'),
			'slug' 			=> 'ukrdevs-restaurant-core',
			'source' 		=> get_template_directory() . '/lib/plugins/ukrdevs-restaurant-core.zip',
			'version'		=> '3.9.14',
			'required' 		=> true,
		),
	);
	$config = array(
	    'id'           => 'cristiano-tgmpa-required',
	    'default_path' => '',
	    'menu'         => 'tgmpa-install-plugins',
	    'has_notices'  => true,
	    'dismissable'  => false,
	    'dismiss_msg'  => '',
	    'is_automatic' => true,	    
	    'message'      => '',
	);
	tgmpa( $plugins, $config );
}
function cristiano_recomended_plugins() {
	$plugins = array(
		array(
			'name' 			=> 'WooCommerce',
			'slug' 			=> 'woocommerce',
			'required' 		=> false,
		),	
		array(
			'name' 			=> 'Classic Editor',
			'slug' 			=> 'classic-editor',
			'required' 		=> false,
		),	
		array(
			'name'	=> esc_html__('Intuitive Custom Post Order', 'cristiano'),
			'slug'	=> 'intuitive-custom-post-order',
			'required'	=> false,
		),		
		array(
			'name'	=> esc_html__('One Click Demo Import', 'cristiano'),
			'slug'	=> 'one-click-demo-import',
			'required'	=> false,
		),
		array(
			'name' 			=> esc_html__('Envato Market (Theme Updater)', 'cristiano'),
			'slug' 			=> 'envato-market',
			'source' 		=> get_template_directory() . '/lib/plugins/envato-market.zip',
			'version'		=> '2.0.1',
			'required' 		=> false,
		),
	);
	$config = array(
	    'id'           => 'cristiano-tgmpa',
	    'default_path' => '',
	    'menu'         => 'tgmpa-install-plugins',
	    'has_notices'  => true,
	    'dismissable'  => true,
	    'dismiss_msg'  => '',
	    'is_automatic' => true,
	    'message'      => '',
	);
	tgmpa( $plugins, $config );
}
/* CRISTIANO THEME SUPPORT
---------------------------------------------------------------- */
function cristiano_theme_support() {	
	update_option( 'thumbnail_size_w', 370 );
	update_option( 'thumbnail_size_h',  247 );
	update_option( 'medium_size_w', 675 );
	update_option( 'medium_size_h', 450 );
	update_option( 'large_size_w', 830 );
	update_option( 'large_size_h', 7777 );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'		  => 400,
		'flex-width'  => true,			
	));
	add_theme_support( 'custom-header', array(
		'width'		  => 1920,
	));
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Elegant', 'cristiano' ),
			'slug'  => 'elegant',
			'color'	=> '#001c28',
		),
		array(
			'name'  => __( 'Cherry', 'cristiano' ),
			'slug'  => 'cherry',
			'color' => '#300000',
		),
		array(
			'name'  => __( 'Light', 'cristiano' ),
			'slug'  => 'light',
			'color' => '#fff',
	       ),
	) );	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	//Post Thumbnails
	add_theme_support( 'woocommerce',	array( 'thumbnail_image_width' => 420, 'single_image_width' => 675 ) );			
	add_theme_support( 'html5', 		array( 'gallery', 'caption' ) );	
	add_theme_support( 'align-wide' );
	add_image_size( 'cristiano_small_image', 105, 105, true );
	add_image_size( 'cristiano_categories', 420, 630, true );
	add_image_size( 'full_hd', 1920, 1080, true );
	
    add_theme_support( 'wc-product-gallery-lightbox' );	
    add_theme_support( 'wc-product-gallery-slider' );					
}



/* DETECT IF WOOCOMMERCE ACTIVATED
---------------------------------------------------------------- */
function cristiano_is_wc_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
/* REGISTER NAV MENU
---------------------------------------------------------------- */
function cristiano_menu() {	
	register_nav_menus(array(
		'primary'		=> esc_html__( 'Primary Menu', 'cristiano' ),
		'top_menu'		=> esc_html__( 'Top Bar Menu', 'cristiano' ),
		'footer_links'	=> esc_html__( 'Below Footer Links', 'cristiano' ),
	));
}
/* REGISTER RIGHT SIDEBAR
---------------------------------------------------------------- */
function cristiano_widgets() {	
	register_sidebar( array(
		'name'          => esc_html__('Blog Sidebar', 'cristiano'),
		'id'            => 'blog_sidebar',
		'class'			=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title font-heading">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => esc_html__('Shop Sidebar', 'cristiano'),
		'id'            => 'shop_sidebar',
		'class'			=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title font-heading">',
		'after_title'   => '</h3>',
	));		
	register_sidebar( array(
		'name'          => esc_html__('General Sidebar', 'cristiano'),
		'id'            => 'general_sidebar',
		'class'			=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title font-heading">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => esc_html__('Footer Widget Area', 'cristiano'),
		'description'	=> esc_html__('Appears in the footer section of the site.', 'cristiano'),
		'id'            => 'footer_region',
		'class'			=> '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="font-heading">',
		'after_title'   => '</h2>',
	));		
}
function cristiano_custom_upload_mimes($existing_mimes) {
	$existing_mimes['woff'] = 'application/x-font-woff';
	$existing_mimes['ttf'] = 'application/x-font-ttf';
	return $existing_mimes;
}
add_filter('upload_mimes', 'cristiano_custom_upload_mimes');