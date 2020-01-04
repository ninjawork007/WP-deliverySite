<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


add_filter( 'cs_metabox_options', 'cristiano_cs_metabox_options' );

function cristiano_cs_metabox_options( $options ) {
	
	$options      = array();
	
	$options[] = array(
		'id'	=> 'dishes_menu_data',
		'title' 	=> esc_html__('Product Options', 'cristiano'),
		'post_type'	=> 'dishes_menu',
		'context'   => 'side',
		'priority'  => 'high',
		'sections'	=> array(
			array(
				'name'  => 'dm_product_options',
				'fields' => array(
					array(
						'id'		=> 'price_selector',
						'type'		=> 'radio',
						'options'	=> array(
							'single'	=> esc_html__( 'Single Price', 'cristiano' ),
							'multiple'	=> esc_html__( 'Multiple Prices', 'cristiano' ),
						),
						'default'	=> 'single',
					),				
					array(
						'id'	=> 'price',
						'type'	=> 'text',
						'title'	=> esc_html__('Single Price', 'cristiano'),
						'info'	=> esc_html__('No currency symbols', 'cristiano'),
						'dependency' => array( 'price_selector_single', '==', 'true' ),					
						'attributes' => array(
							'style'	=> 'width: 100px;'
						),
					),
					array(
						'id'			=> 'multiple_prices',
						'type'			=> 'group',
						'title'			=> esc_html__('Multiple Prices', 'cristiano'),
						'button_title'	=> esc_html__('Add Price', 'cristiano'),
						'dependency' => array( 'price_selector_multiple', '==', 'true' ),
						'help'			=> esc_html__('Solutions for product portion with different prices. For example: Pizza Sizes or ml of Drinks.', 'cristiano'),
						'fields'          => array(
							array(
								'id'			=> 'label',
								'type'			=> 'text',
								'title'			=> esc_html__('Label', 'cristiano'),
								'wrap_class'	=> 'inline-block',
								'attributes'	=> array(
									'style'	=> 'width: 100px;',
								),				      
							),
							array(
								'id'			=> 'price',
								'type'			=> 'text',
								'title'			=> esc_html__('Price', 'cristiano'),
								'wrap_class'	=> 'inline-block',
								'attributes'	=> array(
									'style'	=> 'width: 100px;',
								),				      				      
						    ),
						),
					),																
					array(
						'id'	=> 'highlight',
						'type'	=> 'text',
						'title'	=> esc_html__('Highlight', 'cristiano'),
					),		
				),
			),
		),
	);
	
	$options[] = array(
		'id'	=> '_product_content_meta',
		'title' 	=> esc_html__('Product Short Description', 'cristiano'),
		'post_type'	=> 'dishes_menu',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'	=> array(
			array(
				'name'  => 'product_content_meta',
				'fields' => array(
					array(
						'id'		=> '_product_short_description',
						'type'		=> 'textarea',
					),
				),
			),
		),
	);
	
	if(class_exists('woocommerce')) {
		$options[] = array(
			'id'	=> '_dishes_menu_wc',
			'title' 	=> esc_html__('Link to WooCommerce Product', 'cristiano'),
			'post_type'	=> 'dishes_menu',
			'context'   => 'side',
			'priority'  => 'high',
			'sections'	=> array(
				array(
					'name'  => 'dishes_menu_wc_link',
					'fields' => array(
						array(
							'id'	=> 'order_button',
							'type'	=> 'switcher',
							'title'	=> esc_html__('Order Button', 'cristiano'),					
						),						
						array(
							'id'	=> 'link_to_product',
							'type'	=> 'select',
							'title'	=> esc_html__('Select WooCommerce Product', 'cristiano'),
							'type'	=> 'select',
							'options'     => 'post',
							'query_args'    => array(
								'post_type'	=> array('product', 'location'),
								'posts_per_page'	=> '-1',
							),	
							'class'      => 'chosen',		
							'dependency' => array( 'order_button', '==', 'true' ),				
						),
					),
				),
			),
		);
	}
	
	// -----------------------------------------
	// Page Metabox Google Maps Options        -
	// -----------------------------------------
	$options[]    = array(
		'id'        => '_custom_page_options',
		'title'     => esc_html__( 'Page Options', 'cristiano' ),
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
			 'name'		=> 'page_header_section',
			 'title'	=> esc_html__( 'Page Header', 'cristiano' ),
			 'icon'		=>	'fa fa-header',
			 'fields'	=> array(
				 array(
					 'id'		=> 'page_header',
					 'type'		=> 'radio',
					 'class'	=> 'horizontal',
					 'options'	=> array(
						 'title'		=> esc_html__( 'Minimal', 'cristiano' ),
						 'featured'		=> esc_html__( 'Featured Image', 'cristiano' ),
						 'presentation'	=> esc_html__( 'Presentation Slider', 'cristiano' ),
						 'slider'		=> esc_html__( 'Swiped Slider', 'cristiano' ),
						 'shortcode'	=> esc_html__( 'Shortcode', 'cristiano' ),
					 ),
					 'default'	=> 'title',
				),
				array(
					'id'	=> 'transparent_header',
					'title'	=> esc_html__( 'Transparent Header', 'cristiano' ),
					'dependency' => array( 'page_header_title', '!=', 'true' ),								
					'type'	=> 'select',
					'options'	=> array(
						'default'	=> esc_html__('Default', 'cristiano'),
						'on'	=> esc_html__('On', 'cristiano'),
						'off'	=> esc_html__('Off', 'cristiano'),
					),
				),
				array(
					'id'	=> 'hide_title',
					'type'	=> 'checkbox',
					'title'	=> esc_html__('Hide Title', 'cristiano'),				
					'dependency'	=> array( 'page_header_featured', '==', 'true' ),
				),
				array(
					'id'	=> 'header_subtitle',
					'type'	=> 'text',
					'title'	=> esc_html__('Header Subtitle', 'cristiano'),				
					'dependency'	=> array( 'page_header_featured', '==', 'true' ),
				),
				array(
					  'type'    	=> 'notice',
					  'class'   	=> 'info',
					  'content' 	=> esc_html__('Info: The Header will not be a transparent in minimal variant.', 'cristiano'),
					  'dependency'	=> array( 'page_header_title', '==', 'true' ),				  
					),		
				array(
					'id'	=> 'presentation_slider',
					'dependency'	=> array( 'page_header_presentation', '==', 'true' ),					
					'type'	=> 'fieldset',				
					'fields'	=> array(
						array(
							'id'	=> 'logo',
							'type'	=> 'image',
							'title'	=> esc_html__('Logo', 'cristiano'),
						),					
						array(
							'id'	=> 'title',
							'type'	=> 'text',
							'title'	=> esc_html__('Title', 'cristiano'),
						),
						array(
							'id'	=> 'subtitle',
							'type'	=> 'textarea',
							'title'	=> esc_html__('Description', 'cristiano'),
						),
						array(
							'id'	=> 'add_button',
							'type'	=> 'checkbox',
							'title'	=> esc_html__('Add Button', 'cristiano'),
						),
						array(
							'id'		=> 'button',
							'type'		=> 'fieldset',
							'dependency'=> array( 'add_button', '==', 'true' ),
							'wrap_class'=> 'wrap-link',
							'fields'	=> array(
								array(
									'id'	=> 'link_to_page',
									'title'	=> esc_html__('Page URL', 'cristiano'),
									'type'	=> 'select',
									'options' => 'pages',
									'default_option' => esc_html__('Select a Page', 'cristiano'),
								),
								array(
									'id'	=> 'custom_link_url',
									'title'	=> esc_html__('Custom URL', 'cristiano'),
									'type'	=> 'text',
									'attributes'	=> array(
										'placeholder' => 'http://',	
									),
								),
								array(
									'id'	=> 'link_text',
									'title'	=> esc_html__('Link Text', 'cristiano'),
									'type'	=> 'text',
								),
								array(
									'id'	=> 'new_tab',
									'type'	=> 'checkbox',
									'title'	=> esc_html__('Open link in a new tab', 'cristiano'),
								),
							),
						),
						array(
							'id'	=> 'slider_type',
							'type'	=> 'select',
							'title'	=> esc_html__('Slider Type', 'cristiano'),
							'class'	=> 'horizontal',
							'options'	=> array(
								'gallery' => esc_html__('Gallery', 'cristiano'),
								'video' => esc_html__('Video', 'cristiano'),
							),
							'default' => 'gallery',
						),
						array(
							'id'	=> 'gallery',
							'type'	=> 'gallery',
							'title'	=> esc_html__('Slider Images', 'cristiano'),
							'dependency'   => array( 'slider_type', '==', 'gallery' ),
						),	
						
						array(
							'id'	=> 'video',
							'type'	=> 'upload',
							'title'	=> esc_html__('Video', 'cristiano'),
							'settings'      => array(
								'upload_type'  => 'video',
								'button_title' => esc_html__('Upload Video', 'cristiano'),
								'frame_title'  => 'Select a video',
								'insert_title' => 'Use this video',
							),
							'dependency'   => array( 'slider_type', '==', 'video' ),
						),																				
						array(
							'id'	=> 'height',
							'type'	=> 'number',
							'title'	=> esc_html__('Height in px', 'cristiano'),
							'info'	=> esc_html__('Leave empty for full screen', 'cristiano'),
							'attributes'	=> array(
								'min'	=> '200',
								'max'	=> '2000',
								'step'	=> '10',
							),
						),						
					),
				),						
				array(
					'id'			=> 'slider_shortcode',
					'type'			=> 'textarea',
					'dependency'	=> array( 'page_header_shortcode', '==', 'true' ),
					'title'			=> esc_html__('Paste Slider Shortcode', 'cristiano'),
				),
				array(
					'id'				=> 'page_slider',
					'type'				=> 'group',
					'dependency'		=> array( 'page_header_slider', '==', 'true' ),
					'button_title'		=> 'Add New Slide',
					'accordion_title'	=> 'Slide',
					'fields'	=> array(
						array(
							'id'	=> 'slide_title',
							'type'	=> 'text',
							'title'	=> esc_html__( 'Slide Title', 'cristiano' ),
						),
						array(
							'id'	=> 'slide_description',
							'type'	=> 'textarea',
							'title'	=> esc_html__( 'Slide Description', 'cristiano' ),
						),					
						array(
							'id'	=> 'slide_image',
							'type'	=> 'image',
							'title'	=> esc_html__( 'Slide Background Image', 'cristiano' ),
						),
						array(
							'id'	=> 'slide_button_text',
							'type'	=> 'text',
							'title'	=> esc_html__( 'Slide Button Text', 'cristiano' ),
							
						),				
						array(
							'id'	=> 'slide_button_link',
							'type'	=> 'text',
							'title'	=> esc_html__( 'Slide Button Link', 'cristiano' ),
						),
					),
				),			 
			 ),
			),
			array(
				'name'		=> 'sidebar_section',
				'title'		=>  esc_html__('Sidebar', 'cristiano'),
				'icon'		=> 'fa fa-th-list',
				'fields'	=> array(
					array(
						'id'	=> 'sidebar_position',
						'title'	=> esc_html__('Sidebar Position', 'cristiano'),
						'type'	=> 'radio',
						'options' => array(
							'no-sidebar'	=> esc_html__('No Sidebar', 'cristiano'),
							'left-sidebar'	=> esc_html__('Left', 'cristiano'),
							'right-sidebar'	=> esc_html__('Right', 'cristiano'),
						),
						'default' => 'no-sidebar',
					),
					array(
						'id'	=> 'sidebar_area',
						'title'	=> esc_html__( 'Widget Area', 'cristiano' ),
						'dependency'		=> array( 'sidebar_position_no-sidebar', '!=', 'true' ),					
						'type'	=> 'radio',
						'options' => array(
							'blog_sidebar' => esc_html__('Blog Sidebar', 'cristiano'),
							'shop_sidebar' => esc_html__('Shop Sidebar', 'cristiano'),
							'general_sidebar' => esc_html__('General Sidebar', 'cristiano'),
						),
						'default'	=> 'blog_sidebar',
						'info'	=> esc_html__('Choose widget area to display', 'cristiano'),
					),				
				),
			),			
			array(
				'name'	=> 'section_1',
				'title'	=> esc_html__( 'Page Layout', 'cristiano' ),
				'icon'	=> 'fa fa-columns',
				'fields'	=> array(
					array(
						'id'		=>	'ukrdevs_page_layout',
						'type'		=>	'radio',
						'title'		=>	esc_html__( 'Select boxed or wide layout.', 'cristiano' ),
						'options'	=>	array(
							'default'	=> esc_html__( 'Default', 'cristiano' ),
							'wide' 		=> esc_html__( 'Wide layout', 'cristiano' ),
							'boxed'		=> esc_html__( 'Boxed layout', 'cristiano' ),
						),
						'default'	=>	'default',
					),
				),
			),
			array(
				'name'	=> 'section_3',
				'title'	=> esc_html__( 'Google Map', 'cristiano' ),
				'icon'	=> 'fa fa-map-marker',
				'fields'	=> array(
					array(
						'id'    => 'google_map_switcher',
						'type'  => 'switcher',
						'title' => esc_html__('Google Map Above Footer', 'cristiano'),
					),
				),
			),
		),
	);
		
	return $options;
}
	