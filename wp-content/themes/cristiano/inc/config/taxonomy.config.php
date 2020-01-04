<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

add_filter( 'cs_taxonomy_options', 'cristiano_cs_taxonomy_options' );

function cristiano_cs_taxonomy_options( $options ) {

	$options     = array();
	
	$options[]   = array(
		'id'       => '_restocore_wc_product_cat',
		'taxonomy' => 'product_cat', // category, post_tag or your custom taxonomy name
		'fields'   => array(
			array(
				'title'	=> esc_html__('Header Image', 'cristiano'),
				'id'    => 'restocore_wc_cat_header_img',
				'type'  => 'image',
				'add_title' => esc_html__('Add Header Image', 'cristiano'),
			),
			array(
				'id'	=> 'custom_link',			
				'title'	=> esc_html__('Custom Link', 'cristiano'),
				'type'	=> 'text',
			),
			array(
				'id'	=> 'limited_ordering_time',
				'type'	=> 'checkbox',
				'title'	=> esc_html__('Limited ordering time', 'cristiano'),
			),
			array(
				'id'	=> 'add_to_cart_hours',
				'type'	=> 'hours',
				'title'	=> esc_html__('Show add to cart button', 'cristiano'),
				'dependency'   => array( 'limited_ordering_time', '==', 'true' ),
			),
			array(
				'id'	=> 'time_notice',
				'type'	=> 'text',
				'title'	=> esc_html__('Notice', 'cristiano'),
				'info'	=> esc_html__('Example: Service: 11:00 am - 4:00 pm. ', 'cristiano'),
				'after'	=> esc_html__('Displayed after category name', 'cristiano'),
				'dependency'   => array( 'limited_ordering_time', '==', 'true' ),
			),
		),
	);
	
	$options[]	= array(
		'id'       => '_restocore_our_menu_taxonomy_options',
		'taxonomy' => 'dishes_categories', // category, post_tag or your custom taxonomy name
		'fields'   => array(
			array(
				'title' => esc_html__('Category Image', 'cristiano'),
				'id'    => 'restocore_menu_cat_img',
				'type'  => 'image',
				'add_title' => esc_html__('Add Category Image','cristiano'),
			),		
			array(
				'title'	=> esc_html('Menu Display', 'cristiano'),
				'id'	=> 'restocore_menu_cols',
				'type'	=> 'radio',
				'class'	=> 'horizontal',
				'options'	=> array(
					'col-1' => esc_html('1 Column', 'cristiano'),
					'cols-2' => esc_html('2 Columns', 'cristiano'),
				),
				'default'	=> 'cols-2',
			),
			array(
				'title' => esc_html__('Product Image Sizes', 'cristiano'),
				'id'    => 'restocore_menu_img_size',
				'type'  => 'radio',
				'class' => 'horizontal',
				'options'	=> array(
					'small-imgs' => esc_html__( 'Small',  'cristiano' ),				
					'medium-imgs'=> esc_html__( 'Medium', 'cristiano' ),				
					'large-imgs' => esc_html__( 'Large',  'cristiano' ),
				),
				'default'	=> 'large-imgs',
			),
			array(
				'title' => esc_html__('Product Image Styles', 'cristiano'),
				'id'    => 'restocore_menu_img_style',
				'type'  => 'radio',
				'class'   => 'horizontal',			
				'options'	=> array(
					'square-style'	=> esc_html__( 'Square', 'cristiano' ),	
					'rounded-style'	=> esc_html__( 'Rounded','cristiano' ),	
					'circle-style'	=> esc_html__( 'Circle', 'cristiano' ),							
					'drop-style'	=> esc_html__( 'Drop',   'cristiano' ),
				),
				'default'	=> 'drop-style',
			),		
		),
	);
	
	$options[]	= array(
		'id'       => '_restocore_category_taxonomy_options',
		'taxonomy' => 'category', // category, post_tag or your custom taxonomy name
		'fields'   => array(
			array(
				'title' => esc_html__('Category Image', 'cristiano'),
				'id'    => 'restocore_post_cat_img',
				'type'  => 'image',
				'add_title' => esc_html__('Add Category Image', 'cristiano'),
			),				
		),
	);
	
	return $options;
}