<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

add_filter( 'cs_shortcode_options', 'cristiano_cs_shortcode_options' );

function cristiano_cs_shortcode_options( $options ) {

	$options       = array();
	
	$options[]     = array(
		'title'      => esc_html__( 'General Shortcodes', 'cristiano' ),
		'shortcodes' => array(
			array(
				'name'		=> 'promo_slider',
				'title'		=> 'Promo Slider',
				'fields'    => array(
					array(
						'id' => 'cat',
						'type'	=> 'checkbox',			
						'title'	=> esc_html__( 'Select Promo Categories', 'cristiano' ),		
						'options'     => 'categories',
						'query_args'    => array(
							'taxonomy'	=> 'promo_slider_categories',
							'parent'	=> 0,
						),						
					),
				),
			),
			array(
				'name'	=> 'testimonials_slider',
				'title'	=> esc_html__( 'Testimonials Slider', 'cristiano' ),
				'fields'	=> array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'img',
						'type'  => 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),
			        ),		        
			        array(
						'id'    => 'shading',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Shading', 'cristiano' ),
						'class'	=> 'horizontal',
						'options'	=> array(
							'0'	=> esc_html__( 'None', 'cristiano' ),
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
				'title'		=> esc_html__( 'Latest News', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'title',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
					),
					array(
						'id'	=> 'subtitle',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
					),		
					array(
						'id'	=> 'count',
						'type'	=> 'number',
						'title'	=> esc_html__( 'Count', 'cristiano' ),
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
						'title'	=> esc_html__('Categories', 'cristiano'),
						'info'	=> esc_html__('Leave blank to show all categories.', 'cristiano'),					
					),						
				),
			),
			array(
				'name'		=> 'contact_details',
				'title'		=> esc_html__( 'Contact Details', 'cristiano' ),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),		        			
				),			
			),
			array(
				'name'		=> 'short_info',
				'title'		=> esc_html__( 'Short Info', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'text',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Short Info', 'cristiano' ),
					),
					array(
						'id'	=> 'img',
						'type'	=> 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),
					),	
					array(
						'id'	=> 'shading',
						'type'	=> 'radio',
						'title'	=> esc_html__( 'Shading', 'cristiano' ),
						'class'	=> 'horizontal',
						'options'	=> array(
							'0' => esc_html__( 'None', 'cristiano' ),
							'25'	=> '25%',
							'50'	=> '50%',
							'75'	=> '75%',
						),			
						'default'	=> '25',
					),	
					array(
						'id'	=> 'height',
						'type'	=> 'number',
						'title'	=> esc_html__( 'Custom Height', 'cristiano' ),
						'attributes'	=> array(
							'min'	=> '0',
							'max'	=> '900',
							'step'	=> '10',
						),
						'info'	=> esc_html__( 'Leave empty for auto height', 'cristiano' ),
					),
				),
			),
			array(
				'name'		=> 'heading',
				'title'		=> esc_html__( 'Heading', 'cristiano' ),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),		        			
				),			
			),	
			array(
				'name'	=> 'button',
				'title'	=> 	esc_html__( 'Button', 'cristiano' ),
				'fields'    => array(
					array(
						'id'    => 'text',
						'type'  => 'text',
						'title'	=> esc_html__( 'Button Title', 'cristiano' ),		
						'default' => 'Button',
					),	
					array(
						'id'    => 'url',
						'type'  => 'text',
						'title'	=> esc_html__( 'Button Link', 'cristiano' ),						
					),		
					array(
						'id'    => 'style',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Button Style', 'cristiano' ),											
						'options'	=> array(
							'btn-default' => esc_html__( 'Default', 'cristiano' ),	
							'btn-primary' => esc_html__( 'Primary', 'cristiano' ),
							'btn-transparent' => esc_html__( 'Transparent', 'cristiano' ),
						),					
						'default'	=> 'btn-default',
					),
					array(
						'id'    => 'size',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Button Size', 'cristiano' ),																	
						'options'	=> array(
							'btn-sm' => esc_html__( 'Small', 'cristiano' ),	
							'btn-md' => esc_html__( 'Medium', 'cristiano' ),
							'btn-lg' => esc_html__( 'Large', 'cristiano' ),
						),	
						'default'	=> 	'btn-md',				
					),
					array(
						'id'    => 'target_blank',
						'type'  => 'checkbox',
						'title'	=> esc_html__( 'Open link in a new tab', 'cristiano' ),						
					),
				),
			),
			array(
				'name'		=> 'article',
				'title'		=> esc_html__( 'Aricle', 'cristiano' ),
				'fields'    => array(
					array(
						'id'	=> 'image',
						'type'	=> 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),				
					),
					array(
						'id'	=> 'position',
						'type'	=> 'radio',
						'title'	=> esc_html__( 'Image Position', 'cristiano' ),														
						'options' => array(
							'left'   => esc_html__('Left', 'cristiano'),
							'right'  => esc_html__('Right', 'cristiano'),
						),
						'default'	=> 'left',	
					),				
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),	
			        array(
						'id'    => 'content',
						'type'  => 'textarea',
						'title'	=> esc_html__( 'Content', 'cristiano' ),
			        ),		        	        			
				),			
			),			
		),
	);	
	
	if(class_exists('woocommerce')) {
		$options[] = array(
			'title'      => esc_html__( 'WooCommerce Shortcodes', 'cristiano' ),
			'shortcodes' => array(
				array(
					'name'      => 'product_cat',
					'title'     => esc_html__('Product Categories', 'cristiano'),
					'fields'    => array(
				        array(
							'id'    => 'title',
							'type'  => 'text',
							'title'	=> esc_html__( 'Title', 'cristiano' ),
				        ),
				        array(
							'id'    => 'subtitle',
							'type'  => 'text',
							'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
				        ),
				        array(
							'id'    => 'cols',
							'type'  => 'number',
							'title'	=> esc_html__( 'Columns', 'cristiano' ),
							'default'	=> '4',
							'attributes'	=> array(
								'max'	=> 6,
								'min'	=> 2
							),
				        ),					        
				        array(
					        'id'	=> 'carousel',
					        'type'	=> 'switcher',
					        'title'	=> esc_html__( 'Carousel', 'cristiano' ),
					        'default' => true,
				        ),
						array(
							'id'         => 'cat',
							'type'       => 'checkbox',
							'title'      => esc_html__( 'Choose Categories to Display', 'cristiano' ),
							'options'     => 'categories',
							'query_args'    => array(
								'taxonomy'	=> 'product_cat',
								'parent'	=> 0,
							),
							'info'	=> esc_html__('Leave blank to show all categories.','cristiano'),
						),			         			
					),
				),
				array(
					'name'      => 'star_products',
					'title'     => esc_html__('Featured Star Products', 'cristiano'),
					'fields'    => array(
				        array(
							'id'    => 'title',
							'type'  => 'text',
							'title'	=> esc_html__( 'Title', 'cristiano' ),
				        ),
				        array(
							'id'    => 'subtitle',
							'type'  => 'text',
							'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
				        ),		        			
					),
				),
				array(
					'name'      => 'product_category',
					'title'     => esc_html__('Product Category', 'cristiano'),
					'fields'    => array(
				        array(
							'id'    => 'category',
							'type'  => 'text',
							'title'	=> esc_html__('Category Slug', 'cristiano'),
							'info'	=> esc_html__('Go to: WooCommerce > Products > Categories to find the slug column.', 'cristiano'),
				        ),		        			
					),
				),	
				array(
					'name'      => 'products',
					'title'     => esc_html__('Products', 'cristiano'),
					'fields'    => array(
				        array(
							'id'    => 'ids',
							'type'  => 'text',
							'title'	=> esc_html__('Products IDs', 'cristiano'),
							'info' => esc_html__('Comma separated IDs of products', 'cristiano'),
				        ),		        			
					),
				),										
			),		
		);
	}
	
	$options[]     = array(
		'title'      => esc_html__( 'Our Menu Shortcodes', 'cristiano' ),
		'shortcodes' => array(
			array(
				'name'		=> 'our_menu_cats',
				'title'		=> esc_html__( 'Our Menu Categories', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'title',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
					),
					array(
						'id'	=> 'subtitle',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' )
					),										
					array(
						'id'         => 'cat',
						'type'       => 'checkbox',
						'title'      => esc_html__( 'Choose Categories to Display', 'cristiano' ),
						'options'     => 'categories',
						'query_args'    => array(
							'taxonomy'	=> 'dishes_categories',
							'parent'	=> 0,
						),
						'info'	=> esc_html__('Leave blank to show all categories.','cristiano'),
					),
					array(
						'id'	=> 'cols',
						'type'	=> 'number',
						'title'	=> esc_html__('Columns', 'cristiano'),
						'attributes'	=> array(
							'min'	=> '2',
							'max'	=> '6',	
						),
						'default'	=> '4',
					),
					array(
						'id'	=> 'carousel',
						'type'	=> 'switcher',
						'title'	=>  esc_html__('Carousel', 'cristiano'),
					),
				),
			),
			array(
				'name'		=> 'our_menu',
				'title'		=> esc_html__( 'Our Menu', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'nav',
						'type'	=> 'switcher',
						'title'	=> esc_html__( 'Menu Naviagtion', 'cristiano' ),
						'default'	=> true,
					),
					
					array(
						'id'         => 'cat',
						'type'       => 'checkbox',
						'title'      => esc_html__( 'Choose Categories to Display', 'cristiano' ),
						'options'     => 'categories',
						'query_args'    => array(
							'taxonomy'	=> 'dishes_categories',
							'parent'	=> 0,
						),
						'info'	=> esc_html__('Leave blank to show all categories.','cristiano'),
					),
				),
			),	
				
				
			array(
				'name'		=> 'our_menu_teaser',
				'title'		=> esc_html__( 'Random Menu Items', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'title',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
					),
					array(
						'id'	=> 'subtitle',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' )
					),
					array(
						'id'         => 'cat',
						'type'       => 'checkbox',
						'title'      => esc_html__( 'Choose categories to Display', 'cristiano' ),
						'options'     => 'categories',
						'query_args'    => array(
							'taxonomy'	=> 'dishes_categories',
						),
						'info'	=> esc_html__('Leave blank to show all categories.','cristiano'),
					),
					array(
						'id'	=> 'cols',
						'title' => esc_html__( 'Menu Display', 'cristiano' ),					
						'type'	=> 'radio',
						'options'	=> array(
							'1'	=> esc_html__('1 column', 'cristiano'),
							'2'	=> esc_html__('2 columns', 'cristiano'),
						),
						'default'	=> '2',
					),				
					array(
						'id'	=> 'size',
						'title' => esc_html__( 'Product Image Sizes', 'cristiano' ),					
						'type'	=> 'radio',
						'options'	=> array(
							'small'		=> esc_html__('Small', 'cristiano'),
							'medium'	=> esc_html__('Medium', 'cristiano'),
							'large'		=> esc_html__('Large', 'cristiano'),
						),
						'default'	=> 'large',
					),
					array(
						'id'	=> 'style',
						'title' => esc_html__( 'Product Image Styles', 'cristiano' ),				
						'type'	=> 'radio',
						'options'	=> array(
							'square'	=> esc_html__('Square', 'cristiano'),
							'rounded'	=> esc_html__('Rounded', 'cristiano'),
							'circle'	=> esc_html__('Circle', 'cristiano'),
							'drop'		=> esc_html__('Drop', 'cristiano'),
						),
						'default' => 'drop',
					),							
					array(
						'id'	=> 'uri',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Full Menu URI', 'cristiano' ),
					),
				),
			),
			array(
				'name'		=> 'top_dishes',
				'title'		=> esc_html__( 'Top Dishes', 'cristiano' ),
				'fields'	=> array(
					array(
						'id'	=> 'title',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
					),
					array(
						'id'	=> 'subtitle',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' )
					),
					array(
						'id'	=> 'cols',
						'title' => esc_html__( 'Menu Display', 'cristiano' ),					
						'type'	=> 'radio',
						'options'	=> array(
							'1'	=> esc_html__('1 column', 'cristiano'),
							'2'	=> esc_html__('2 columns', 'cristiano'),
						),
						'default'	=> '2',
					),				
					array(
						'id'	=> 'size',
						'title' => esc_html__( 'Product Image Sizes', 'cristiano' ),					
						'type'	=> 'radio',
						'options'	=> array(
							'small'		=> esc_html__('Small', 'cristiano'),
							'medium'	=> esc_html__('Medium', 'cristiano'),
							'large'		=> esc_html__('Large', 'cristiano'),
						),
						'default'	=> 'large',
					),
					array(
						'id'	=> 'style',
						'title' => esc_html__( 'Product Image Styles', 'cristiano' ),				
						'type'	=> 'radio',
						'options'	=> array(
							'square'	=> esc_html__('Square', 'cristiano'),
							'rounded'	=> esc_html__('Rounded', 'cristiano'),
							'circle'	=> esc_html__('Circle', 'cristiano'),
							'drop'		=> esc_html__('Drop', 'cristiano'),
						),
						'default' => 'drop',
					),
					array(
						'id'	=>	'uri',
						'type'	=> 'text',
						'title' => esc_html__( 'Full Menu URL', 'cristiano' ),					
					),		
				),
			),
			array(
				'name'	=> 'our_menu_item',
				'title'	=> esc_html__('Single Item','cristiano'),
				'fields'	=> array(
					array(
						'id'	=> 'id',
						'type'	=> 'number',
						'title'	=> esc_html__( 'Enter Single Menu Item ID', 'cristiano' ),
					),
					array(
						'id'	=> 'size',
						'title' => esc_html__( 'Product Image Sizes', 'cristiano' ),					
						'type'	=> 'radio',
						'options'	=> array(
							'small'		=> esc_html__('Small', 'cristiano'),
							'medium'	=> esc_html__('Medium', 'cristiano'),
							'large'		=> esc_html__('Large', 'cristiano'),
						),
						'default'	=> 'large',
					),
					array(
						'id'	=> 'style',
						'title' => esc_html__( 'Product Image Styles', 'cristiano' ),				
						'type'	=> 'radio',
						'options'	=> array(
							'square'	=> esc_html__('Square', 'cristiano'),
							'rounded'	=> esc_html__('Rounded', 'cristiano'),
							'circle'	=> esc_html__('Circle', 'cristiano'),
							'drop'		=> esc_html__('Drop', 'cristiano'),
						),
						'default' => 'drop',
					),				
				),
			),									
		),
	);
	
	$options[] = array(
		'title'      => esc_html__( 'Form Shortcodes', 'cristiano' ),
		'shortcodes' => array(
			array(
				'name'		=> 'contact_form',
				'title'		=> esc_html__( 'Contact Form', 'cristiano' ),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),	
			        array(
						'id'    => 'img',
						'type'  => 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),
			        ),		
			        array(
						'id'    => 'shading',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Shading', 'cristiano' ),
						'options'	=> array(
							'0'	=> esc_html__( 'None', 'cristiano' ),
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
				'title'		=> esc_html__( 'Email Reservation', 'cristiano' ),
				'fields'	=> array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),	
			        array(
						'id'    => 'img',
						'type'  => 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),
			        ),		
			        array(
						'id'    => 'shading',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Shading', 'cristiano' ),
						'options'	=> array(
							'0'	=> esc_html__( 'None', 'cristiano' ),
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
				'title'		=> esc_html__( 'Open Table Reservation', 'cristiano' ),
				'fields'    => array(
			        array(
						'id'    => 'title',
						'type'  => 'text',
						'title'	=> esc_html__( 'Title', 'cristiano' ),
			        ),
			        array(
						'id'    => 'subtitle',
						'type'  => 'text',
						'title'	=> esc_html__( 'Sub Title', 'cristiano' ),
			        ),	
			        array(
						'id'    => 'img',
						'type'  => 'image',
						'title'	=> esc_html__( 'Image', 'cristiano' ),
			        ),		
			        array(
						'id'    => 'shading',
						'type'  => 'radio',
						'title'	=> esc_html__( 'Shading', 'cristiano' ),
						'class'	=> 'horizontal',
						'options'	=> array(
							'0'	=> esc_html__( 'None', 'cristiano' ),
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
	

	
	return $options;
	
}