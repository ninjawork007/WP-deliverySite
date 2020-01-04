<?php

include_once('custom/post-type.php');
include_once('custom/taxonomy.php');
include_once('shortcodes/promo-slider.php');

add_action( 'init', 'promo_slider_posttype' );					// Custom Post Type Init
add_action( 'init', 'promo_slider_taxonomy' );					// Custom Taxonomy Init

add_shortcode( 'promo_slider', 'restaurantcore_promo_slider' );	// Promo Slider Shortcode