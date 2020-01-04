<?php
function cristiano_enqueue($enqueue_styles) {
	$theme_version = wp_get_theme()->version;
	if( !cs_get_option('custom_fonts', NULL) ){
		wp_enqueue_style( 'cristiano-google-fonts', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700|Cinzel&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese');	
    } else {
		add_action( 'wp_enqueue_scripts', 'cristiano_body_font', 11 );	
		add_action( 'wp_enqueue_scripts', 'cristiano_heading_font', 11 );
		add_action( 'wp_enqueue_scripts', 'cristiano_title_font', 11 );   
 	} 	
    wp_enqueue_style( 'cristiano-fontawesome',  get_template_directory_uri() . '/assets/css/font-awesome.css', '', '4.7.0' );
	wp_enqueue_style( 'magnific-popup', 		get_template_directory_uri() . '/assets/css/magnific-popup.css', '', '1.1.0' );
	wp_enqueue_style( 'swiper',					get_template_directory_uri() . '/assets/css/swiper.min.css', '', '4.4.2' );
	wp_enqueue_style( 'cristiano-grid',   		get_template_directory_uri() . '/assets/css/grid.css', '',  $theme_version );			  
	wp_enqueue_style( 'cristiano-style', 		get_stylesheet_uri(), '', $theme_version  );
	if(class_exists( 'woocommerce' )){
		wp_enqueue_style( 'cristiano-wc-style', get_template_directory_uri() . '/assets/css/woocommerce.css', '', $theme_version );	
	}
	wp_enqueue_style( 'cristiano-rwd',   		get_template_directory_uri() . '/assets/css/rwd.css', '', $theme_version );
	if(cs_get_option('dzsparallaxer')){
    	wp_enqueue_style( 'dzsparallaxer',  	get_template_directory_uri() . '/assets/css/dzsparallaxer.css', '', $theme_version );    		
    	wp_enqueue_script( 'dzsparallaxer',   	get_template_directory_uri() . '/assets/js/dzsparallaxer.js', array('jquery'), null, true );  	
	}
	wp_enqueue_script( 'okshadow',   			get_template_directory_uri() . '/assets/js/okshadow.min.js', array('jquery'), null, true );	
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'jquery-ui-tabs' );	
    wp_enqueue_script( 'magnific-popup',		get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0' );
	wp_enqueue_script( 'swiper',				get_template_directory_uri() . '/assets/js/swiper.min.js', '', '3.4.2' );
    wp_enqueue_script( 'cristiano-script',		get_template_directory_uri() . '/assets/js/script.js', array('jquery'), $theme_version );
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
}

function cristiano_admin_enqueue(){
  	wp_enqueue_style( 'cristiano-admin-styles',	get_template_directory_uri() . '/assets/css/admin.css' );			
}

function cristiano_customizer_live_preview() {
	wp_enqueue_script( 'cristiano-themecustomizer', get_theme_file_uri('/assets/js/customize-preview.js'),'', wp_get_theme()->version, true );
}

add_action( 'wp_enqueue_scripts', 'cristiano_enqueue' );

add_action( 'admin_enqueue_scripts', 'cristiano_admin_enqueue' );

add_action( 'customize_preview_init',	'cristiano_customizer_live_preview'	);


function cristiano_disable_styles() {
   wp_dequeue_style( 'jquery-ui' );
}
add_action( 'wp_print_styles', 'cristiano_disable_styles', 100 );