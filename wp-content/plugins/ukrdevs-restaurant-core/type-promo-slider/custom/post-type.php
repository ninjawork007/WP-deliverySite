<?php
function promo_slider_posttype(){
	$labels = array(
		'name'               => esc_html__( 'Promo Slider', 'cristiano' ),
		'singular_name'      => esc_html__( 'Slide', 'cristiano' ),
		'menu_name'          => esc_html__( 'Promo Slider', 'cristiano' ) . ' ∗',
		'name_admin_bar'     => esc_html__( 'Slide', 'cristiano' ),
		'add_new'            => esc_html__( 'Add New Slide', 'cristiano' ),
		'add_new_item'       => esc_html__( 'Add New Slide', 'cristiano' ),
		'new_item'           => esc_html__( 'New Slide', 'cristiano' ),
		'edit_item'          => esc_html__( 'Edit Slide', 'cristiano' ),
		'view_item'          => esc_html__( 'View Slide', 'cristiano' ),
		'all_items'          => esc_html__( 'All Slides', 'cristiano' ),
		'search_items'       => esc_html__( 'Search Slides', 'cristiano' ),
		'parent_item_colon'  => esc_html__( 'Parent Slides:', 'cristiano' ),
		'not_found'          => esc_html__( 'No slides found.', 'cristiano' ),
		'not_found_in_trash' => esc_html__( 'No slides found in Trash.', 'cristiano' ),
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'			 => 'dashicons-images-alt2',		
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => 4,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'promo_slider', $args );
}