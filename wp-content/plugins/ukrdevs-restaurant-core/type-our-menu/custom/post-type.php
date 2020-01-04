<?php
function our_menu_posttype(){
	$labels = array(
		'name'               => esc_html__( 'Our Menu', 'cristiano' ),
		'singular_name'      => esc_html__( 'Dish', 'cristiano' ),
		'menu_name'          => esc_html__( 'Our Menu', 'cristiano' ) . ' ∗',
		'name_admin_bar'     => esc_html__( 'Dish', 'cristiano' ),
		'add_new'            => esc_html__( 'Add New Dish', 'cristiano' ),
		'add_new_item'       => esc_html__( 'Add New Dish', 'cristiano' ),
		'new_item'           => esc_html__( 'New Dish', 'cristiano' ),
		'edit_item'          => esc_html__( 'Edit Dish', 'cristiano' ),
		'view_item'          => esc_html__( 'View Dish', 'cristiano' ),
		'all_items'          => esc_html__( 'All Dishes', 'cristiano' ),
		'search_items'       => esc_html__( 'Search Dishes', 'cristiano' ),
		'parent_item_colon'  => esc_html__( 'Parent Dishes:', 'cristiano' ),
		'not_found'          => esc_html__( 'No dishes found.', 'cristiano' ),
		'not_found_in_trash' => esc_html__( 'No dishes found in Trash.', 'cristiano' ),
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'			 => 'dashicons-editor-ul',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'menu-cat' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'dishes_menu', $args );
}