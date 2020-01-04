<?php
function our_menu_taxonomy() {
	$args = array(
		'label'				=> esc_html__('Menu Categories', 'cristiano'),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
		'show_in_nav_menus'	=> true,
	);
	register_taxonomy( 'dishes_categories', 'dishes_menu', $args );
}