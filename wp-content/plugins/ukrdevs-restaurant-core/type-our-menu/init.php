<?php
include_once( 'admin-featured-product.php' );	

include_once('custom/post-type.php');
include_once('custom/taxonomy.php');

include_once( 'shortcodes/our-menu-cats.php' );
include_once( 'shortcodes/our-menu-teaser.php' );
include_once( 'shortcodes/our-menu.php' );
include_once( 'shortcodes/top-dishes.php' );
include_once( 'shortcodes/single-menu-item.php' );

include_once( 'functions.php' );

add_action( 'init', 'our_menu_posttype' ); //Custom Post Type Init
add_action( 'init', 'our_menu_taxonomy' ); //Custom Taxonomy Init

add_shortcode( 'our_menu',			'restocore_our_menu' 		);
add_shortcode( 'our_menu_cats',		'restocore_our_menu_cats' 	);
add_shortcode( 'our_menu_teaser',	'restocore_our_menu_teaser' );
add_shortcode( 'top_dishes',		'restocore_top_dishes' 		);
add_shortcode( 'our_menu_item',		'restocore_our_menu_item' 	);