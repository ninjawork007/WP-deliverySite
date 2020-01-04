<?php
function promo_slider_taxonomy() {
	$args = array(
		'label'				=> esc_html__('Promo Categories', 'cristiano'),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
		'show_in_nav_menus'	=> true,
	);
	register_taxonomy( 'promo_slider_categories', 'promo_slider', $args );
}