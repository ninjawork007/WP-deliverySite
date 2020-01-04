<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$options     = array();

$options[]   = array(
	'id'       => '_restocore_wc_product_cat',
	'taxonomy' => 'product_cat', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'title'	=> esc_html__('Header Image', 'restocore'),
			'id'    => 'restocore_wc_cat_header_img',
			'type'  => 'image',
			'add_title' => esc_html__('Add Header Image','restocore'),
		),
		array(
			'id'	=> 'custom_link',			
			'title'	=> esc_html__('Custom Link', 'restocore'),
			'type'	=> 'text',
		),
	),
);

$options[]	= array(
	'id'       => '_restocore_our_menu_taxonomy_options',
	'taxonomy' => 'dishes_categories', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'title' => esc_html__('Category Image', 'restocore'),
			'id'    => 'restocore_menu_cat_img',
			'type'  => 'image',
			'add_title' => esc_html__('Add Category Image','restocore'),
		),		
		array(
			'title'	=> esc_html('Menu Display', 'restocore'),
			'id'	=> 'restocore_menu_cols',
			'type'	=> 'radio',
			'class'	=> 'horizontal',
			'options'	=> array(
				'col-1' => esc_html('1 Column', 'restocore'),
				'cols-2' => esc_html('2 Columns', 'restocore'),
			),
			'default'	=> 'cols-2',
		),
		array(
			'title' => esc_html__('Product Image Sizes', 'restocore'),
			'id'    => 'restocore_menu_img_size',
			'type'  => 'radio',
			'class' => 'horizontal',
			'options'	=> array(
				'small-imgs' => esc_html__( 'Small',  'restocore' ),				
				'medium-imgs'=> esc_html__( 'Medium', 'restocore' ),				
				'large-imgs' => esc_html__( 'Large',  'restocore' ),
			),
			'default'	=> 'large-imgs',
		),
		array(
			'title' => esc_html__('Product Image Styles', 'restocore'),
			'id'    => 'restocore_menu_img_style',
			'type'  => 'radio',
			'class'   => 'horizontal',			
			'options'	=> array(
				'square-style'	=> esc_html__( 'Square', 'restocore' ),	
				'rounded-style'	=> esc_html__( 'Rounded','restocore' ),	
				'circle-style'	=> esc_html__( 'Circle', 'restocore' ),							
				'drop-style'	=> esc_html__( 'Drop',   'restocore' ),
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
			'title' => esc_html__('Category Image', 'restocore'),
			'id'    => 'restocore_post_cat_img',
			'type'  => 'image',
			'add_title' => esc_html__('Add Category Image','restocore'),
		),				
	),
);

CSFramework_Taxonomy::instance( $options );