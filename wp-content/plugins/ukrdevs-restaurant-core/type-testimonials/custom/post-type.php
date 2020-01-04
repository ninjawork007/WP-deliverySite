<?php
function restocore_testimonials_posttype(){
	$labels = array(
		'name'               => esc_html__( 'Testimonials', 'cristiano' ),
		'singular_name'      => esc_html__( 'Testimonial', 'cristiano' ),
		'menu_name'          => esc_html__( 'Testimonials', 'cristiano' ) . ' ∗',
		'name_admin_bar'     => esc_html__( 'Testimonial', 'cristiano' ),
		'add_new'            => esc_html__( 'Add New Testimonial', 'cristiano' ),
		'add_new_item'       => esc_html__( 'Add New Testimonial', 'cristiano' ),
		'new_item'           => esc_html__( 'New Testimonial', 'cristiano' ),
		'edit_item'          => esc_html__( 'Edit Testimonial', 'cristiano' ),
		'view_item'          => esc_html__( 'View Testimonial', 'cristiano' ),
		'all_items'          => esc_html__( 'All Testimonials', 'cristiano' ),
		'search_items'       => esc_html__( 'Search Testimonials', 'cristiano' ),
		'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'cristiano' ),
		'not_found'          => esc_html__( 'No Testimonials found.', 'cristiano' ),
		'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash.', 'cristiano' ),
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'			 => 'dashicons-format-quote',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 4,		
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'testimonials', $args );
}