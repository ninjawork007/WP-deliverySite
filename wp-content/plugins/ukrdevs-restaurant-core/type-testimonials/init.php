<?php

include_once('custom/post-type.php');
include_once( 'shortcodes/testimonials-slider.php' );

add_action( 'init', 'restocore_testimonials_posttype' ); //Custom Post Type Init
add_shortcode( 'testimonials_slider', 'restocore_testimonials' );