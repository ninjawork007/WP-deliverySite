<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$options       = array();

if(class_exists('woocommerce')) {
	$options[] = array(
		'title'      => esc_html__( 'WooCommerce Shortcodes', 'restocore' ),
		'shortcodes' => array(
			array(
				'name'      => 'product_cat',
				'title'     => esc_html__('Product Categories', 'restocore'),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'restocore' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'restocore' ),
			        ),
			        array(
				        'id'	=> 'carousel',
				        'type'	=> 'switcher',
				        'title'	=> esc_html__( 'Carousel', 'restocore' ),
				        'default' => true,
			        ),   
					array(
						'id'         => 'cat',
						'type'       => 'checkbox',
						'title'      => esc_html__( 'Choose Categories to Display', 'restocore' ),
						'options'     => 'categories',
						'query_args'    => array(
							'taxonomy'	=> 'product_cat',
							'parent'	=> 0,
						),
						'info'	=> esc_html__('Leave blank to show all categories.','restocore'),
					),			         			
				),
			),
			array(
				'name'      => 'star_products',
				'title'     => esc_html__('Featured Star Products', 'restocore'),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'restocore' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'restocore' ),
			        ),		        			
				),
			),
			array(
				'name'      => 'product_category',
				'title'     => esc_html__('Product Category', 'restocore'),
				'fields'    => array(
			        array(
						'id'    => 'category',
						'type'  => 'text',
						'title'	=> esc_html__('Category Slug', 'restocore'),
						'info' => 'Go to: WooCommerce > Products > Categories to find the slug column.'
			        ),		        			
				),
			),	
			array(
				'name'      => 'products',
				'title'     => esc_html__('Products', 'restocore'),
				'fields'    => array(
			        array(
						'id'    => 'ids',
						'type'  => 'text',
						'title'	=> esc_html__('Products IDs', 'restocore'),
						'info' => esc_html__('Comma separated IDs of products', 'restocore'),
			        ),		        			
				),
			),										
		),		
	);
}

$options[]     = array(
	'title'      => esc_html__( 'Our Menu Shortcodes', 'restocore' ),
	'shortcodes' => array(
		array(
			'name'		=> 'our_menu_cats',
			'title'		=> esc_html__( 'Our Menu Categories', 'restocore' ),
			'fields'	=> array(
				array(
					'id'	=> 'title',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
				),
				array(
					'id'	=> 'subtitle',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' )
				),				
				array(
					'id'         => 'cat',
					'type'       => 'checkbox',
					'title'      => esc_html__( 'Choose Categories to Display', 'restocore' ),
					'options'     => 'categories',
					'query_args'    => array(
						'taxonomy'	=> 'dishes_categories',
						'parent'	=> 0,
					),
					'info'	=> esc_html__('Leave blank to show all categories.','restocore'),
				),
			),
		),		
		array(
			'name'		=> 'our_menu',
			'title'		=> esc_html__( 'Our Menu', 'restocore' ),
			'fields'	=> array(
				array(
					'id'         => 'cat',
					'type'       => 'checkbox',
					'title'      => esc_html__( 'Choose Categories to Display', 'restocore' ),
					'options'     => 'categories',
					'query_args'    => array(
						'taxonomy'	=> 'dishes_categories',
						'parent'	=> 0,
					),
					'info'	=> esc_html__('Leave blank to show all categories.','restocore'),
				),
			),
		),	
			
			
		array(
			'name'		=> 'our_menu_teaser',
			'title'		=> esc_html__( 'Random Menu Items', 'restocore' ),
			'fields'	=> array(
				array(
					'id'	=> 'title',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
				),
				array(
					'id'	=> 'subtitle',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' )
				),
				array(
					'id'         => 'cat',
					'type'       => 'checkbox',
					'title'      => esc_html__( 'Choose categories to Display', 'restocore' ),
					'options'     => 'categories',
					'query_args'    => array(
						'taxonomy'	=> 'dishes_categories',
					),
					'info'	=> esc_html__('Leave blank to show all categories.','restocore'),
				),
				array(
					'id'	=> 'cols',
					'title' => esc_html__( 'Menu Display', 'restocore' ),					
					'type'	=> 'radio',
					'options'	=> array(
						'1'	=> esc_html__('1 column', 'restocore'),
						'2'	=> esc_html__('2 columns', 'restocore'),
					),
					'default'	=> '2',
				),				
				array(
					'id'	=> 'size',
					'title' => esc_html__( 'Product Image Sizes', 'restocore' ),					
					'type'	=> 'radio',
					'options'	=> array(
						'small'		=> esc_html__('Small', 'restocore'),
						'medium'	=> esc_html__('Medium', 'restocore'),
						'large'		=> esc_html__('Large', 'restocore'),
					),
					'default'	=> 'large',
				),
				array(
					'id'	=> 'style',
					'title' => esc_html__( 'Product Image Styles', 'restocore' ),				
					'type'	=> 'radio',
					'options'	=> array(
						'square'	=> esc_html__('Square', 'restocore'),
						'rounded'	=> esc_html__('Rounded', 'restocore'),
						'circle'	=> esc_html__('Circle', 'restocore'),
						'drop'		=> esc_html__('Drop', 'restocore'),
					),
					'default' => 'drop',
				),							
				array(
					'id'	=> 'uri',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Full Menu URI', 'restocore' ),
				),
			),
		),
		array(
			'name'		=> 'top_dishes',
			'title'		=> esc_html__( 'Top Dishes', 'restocore' ),
			'fields'	=> array(
				array(
					'id'	=> 'title',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
				),
				array(
					'id'	=> 'subtitle',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' )
				),
				array(
					'id'	=> 'cols',
					'title' => esc_html__( 'Menu Display', 'restocore' ),					
					'type'	=> 'radio',
					'options'	=> array(
						'1'	=> esc_html__('1 column', 'restocore'),
						'2'	=> esc_html__('2 columns', 'restocore'),
					),
					'default'	=> '2',
				),				
				array(
					'id'	=> 'size',
					'title' => esc_html__( 'Product Image Sizes', 'restocore' ),					
					'type'	=> 'radio',
					'options'	=> array(
						'small'		=> esc_html__('Small', 'restocore'),
						'medium'	=> esc_html__('Medium', 'restocore'),
						'large'		=> esc_html__('Large', 'restocore'),
					),
					'default'	=> 'large',
				),
				array(
					'id'	=> 'style',
					'title' => esc_html__( 'Product Image Styles', 'restocore' ),				
					'type'	=> 'radio',
					'options'	=> array(
						'square'	=> esc_html__('Square', 'restocore'),
						'rounded'	=> esc_html__('Rounded', 'restocore'),
						'circle'	=> esc_html__('Circle', 'restocore'),
						'drop'		=> esc_html__('Drop', 'restocore'),
					),
					'default' => 'drop',
				),
				array(
					'id'	=>	'uri',
					'type'	=> 'text',
					'title' => esc_html__( 'Full Menu URL', 'restocore' ),					
				),		
			),
		),
		array(
			'name'	=> 'our_menu_item',
			'title'	=> esc_html__('Single Item','restocore'),
			'fields'	=> array(
				array(
					'id'	=> 'id',
					'type'	=> 'number',
					'title'	=> esc_html__( 'Enter Single Menu Item ID', 'restocore' ),
				),
				array(
					'id'	=> 'size',
					'title' => esc_html__( 'Product Image Sizes', 'restocore' ),					
					'type'	=> 'radio',
					'options'	=> array(
						'small'		=> esc_html__('Small', 'restocore'),
						'medium'	=> esc_html__('Medium', 'restocore'),
						'large'		=> esc_html__('Large', 'restocore'),
					),
					'default'	=> 'large',
				),
				array(
					'id'	=> 'style',
					'title' => esc_html__( 'Product Image Styles', 'restocore' ),				
					'type'	=> 'radio',
					'options'	=> array(
						'square'	=> esc_html__('Square', 'restocore'),
						'rounded'	=> esc_html__('Rounded', 'restocore'),
						'circle'	=> esc_html__('Circle', 'restocore'),
						'drop'		=> esc_html__('Drop', 'restocore'),
					),
					'default' => 'drop',
				),				
			),
		),									
	),
);

$options[] = array(
	'title'      => esc_html__( 'Form Shortcodes', 'restocore' ),
	'shortcodes' => array(
		array(
			'name'		=> 'contact_form',
			'title'		=> esc_html__( 'Contact Form', 'restocore' ),
			'fields'    => array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),	
		        array(
					'id'    => 'img',
					'type'  => 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),
		        ),		
		        array(
					'id'    => 'opacity',
					'type'  => 'radio',
					'title'	=> esc_html__( 'Opacity', 'restocore' ),
					'options'	=> array(
						'0'	=> esc_html__( 'None', 'restocore' ),
						'25'=> '25%',
						'50'=> '50%',
						'75'=> '75%',
					),
					'default'	=> '50',
		        ),		        	        			
			),			
		),
		array(
			'name'		=> 'email_reservation',		
			'title'		=> esc_html__( 'Email Reservation', 'restocore' ),
			'fields'	=> array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),	
		        array(
					'id'    => 'img',
					'type'  => 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),
		        ),		
		        array(
					'id'    => 'opacity',
					'type'  => 'radio',
					'title'	=> esc_html__( 'Opacity', 'restocore' ),
					'options'	=> array(
						'0'	=> esc_html__( 'None', 'restocore' ),
						'25'=> '25%',
						'50'=> '50%',
						'75'=> '75%',
					),
					'default'	=> '50',
		        ),		                			
			),				
		),	
		array(
			'name'		=> 'open_table_reservation',
			'title'		=> esc_html__( 'Open Table Reservation', 'restocore' ),
			'fields'    => array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),	
		        array(
					'id'    => 'img',
					'type'  => 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),
		        ),		
		        array(
					'id'    => 'opacity',
					'type'  => 'radio',
					'title'	=> esc_html__( 'Opacity', 'restocore' ),
					'class'	=> 'horizontal',
					'options'	=> array(
						'0'	=> esc_html__( 'None', 'restocore' ),
						'25'=> '25%',
						'50'=> '50%',
						'75'=> '75%',
					),
					'default'	=> '50',
		        ),		        	        			
			),			
		),	
	),
);

$options[]     = array(
	'title'      => esc_html__( 'Other Shortcodes', 'restocore' ),
	'shortcodes' => array(
		array(
			'name'		=> 'promo_slider',
			'title'		=> 'Promo Slider',
			'fields'    => array(
				array(
					'type'    => 'content',
					'content' => esc_html__('Just click to "Insert Shortcode, this is adding a single shortcode', 'restocore'),
				),
			),			
		),
		array(
			'name'	=> 'testimonials_slider',
			'title'	=> esc_html__( 'Testimonials Slider', 'restocore' ),
			'fields'	=> array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'img',
					'type'  => 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),
		        ),		        
		        array(
					'id'    => 'opacity',
					'type'  => 'radio',
					'title'	=> esc_html__( 'Opacity', 'restocore' ),
					'class'	=> 'horizontal',
					'options'	=> array(
						'0'	=> esc_html__( 'None', 'restocore' ),
						'25'=> '25%',
						'50'=> '50%',
						'75'=> '75%',
					),
					'default'	=> '50',
		        ),
			),
		),
		array(
			'name'		=> 'latest_news',
			'title'		=> esc_html__( 'Latest News', 'restocore' ),
			'fields'	=> array(
				array(
					'id'	=> 'title',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
				),
				array(
					'id'	=> 'subtitle',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
				),		
				array(
					'id'	=> 'count',
					'type'	=> 'number',
					'title'	=> esc_html__( 'Count', 'restocore' ),
					'attributes'	=> array(
						'min'	=> 1,
						'max'	=> 10,
					),
					'default'	=> 2,
				),	
				array(
					'id'	=> 'cat',
					'type'       => 'checkbox',
					'options'     => 'categories',					
					'title'	=> esc_html__('Categories', 'restocore'),
					'info'	=> esc_html__('Leave blank to show all categories.','restocore'),					
				),						
			),
		),
		array(
			'name'		=> 'contact_details',
			'title'		=> esc_html__( 'Contact Details', 'restocore' ),
			'fields'    => array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),		        			
			),			
		),
		array(
			'name'		=> 'short_info',
			'title'		=> esc_html__( 'Short Info', 'restocore' ),
			'fields'	=> array(
				array(
					'id'	=> 'text',
					'type'	=> 'text',
					'title'	=> esc_html__( 'Short Info', 'restocore' ),
				),
				array(
					'id'	=> 'img',
					'type'	=> 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),
				),	
				array(
					'id'	=> 'opacity',
					'type'	=> 'radio',
					'title'	=> esc_html__( 'Opacity', 'restocore' ),
					'class'	=> 'horizontal',
					'options'	=> array(
						'0' => esc_html__( 'None', 'restocore' ),
						'25'	=> '25%',
						'50'	=> '50%',
						'75'	=> '75%',
					),			
					'default'	=> '25',
				),	
				array(
					'id'	=> 'height',
					'type'	=> 'number',
					'title'	=> esc_html__( 'Custom Height', 'restocore' ),
					'attributes'	=> array(
						'min'	=> '0',
						'max'	=> '900',
						'step'	=> '10',
					),
					'info'	=> esc_html__( 'Leave empty for auto height', 'restocore' ),
				),
			),
		),
		array(
			'name'		=> 'heading',
			'title'		=> esc_html__( 'Heading', 'restocore' ),
			'fields'    => array(
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),
		        array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title'	=> esc_html__( 'Sub Title', 'restocore' ),
		        ),		        			
			),			
		),	
		array(
			'name'		=> 'article',
			'title'		=> esc_html__( 'Aricle', 'restocore' ),
			'fields'    => array(
				array(
					'id'	=> 'image',
					'type'	=> 'image',
					'title'	=> esc_html__( 'Image', 'restocore' ),				
				),
				array(
					'id'	=> 'position',
					'type'	=> 'radio',
					'title'	=> esc_html__( 'Image Position', 'restocore' ),														
					'options' => array(
						'left'   => esc_html__('Left', 'restocore'),
						'right'  => esc_html__('Right', 'restocore'),
					),
					'default'	=> 'left',	
				),				
		        array(
					'id'    => 'title',
					'type'  => 'text',
					'title'	=> esc_html__( 'Title', 'restocore' ),
		        ),	
		        array(
					'id'    => 'content',
					'type'  => 'textarea',
					'title'	=> esc_html__( 'Content', 'restocore' ),
		        ),		        	        			
			),			
		),			
	),
);
CSFramework_Shortcode_Manager::instance( $options );
