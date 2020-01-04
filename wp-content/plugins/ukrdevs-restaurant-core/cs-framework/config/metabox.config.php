<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$options      = array();

$options[] = array(
	'id'	=> 'dishes_menu_data',
	'title' 	=> esc_html__('Product Options', 'restocore'),
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
						'single'	=> esc_html__( 'Single Price', 'restocore' ),
						'multiple'	=> esc_html__( 'Multiple Prices', 'restocore' ),
					),
					'default'	=> 'single',
				),				
				array(
					'id'	=> 'price',
					'type'	=> 'text',
					'title'	=> esc_html__('Single Price', 'restocore'),
					'info'	=> esc_html__('No currency symbols', 'restocore'),
					'dependency' => array( 'price_selector_single', '==', 'true' ),					
					'attributes' => array(
						'style'	=> 'width: 100px;'
					),
				),
				array(
					'id'			=> 'multiple_prices',
					'type'			=> 'group',
					'title'			=> esc_html__('Multiple Prices', 'restocore'),
					'button_title'	=> esc_html__('Add Price', 'restocore'),
					'dependency' => array( 'price_selector_multiple', '==', 'true' ),
					'help'			=> esc_html__('Solutions for product portion with different prices. For example: Pizza Sizes or ml of Drinks.', 'restocores'),
					'fields'          => array(
						array(
							'id'			=> 'label',
							'type'			=> 'text',
							'title'			=> esc_html__('Label', 'restocore'),
							'wrap_class'	=> 'inline-block',
							'attributes'	=> array(
								'style'	=> 'width: 100px;',
							),				      
						),
						array(
							'id'			=> 'price',
							'type'			=> 'text',
							'title'			=> esc_html__('Price', 'restocore'),
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
					'title'	=> esc_html__('Highlight', 'restocore'),
				),
				array(
					'id'	=> 'top_menu',
					'type'	=> 'switcher',
					'title'	=> esc_html__('Today\'s Special', 'restocore'),
					'help'	=> 'To show Today\'s Special products on pages use [top_dishes] shortcode.',
				),			
			),
		),
	),
);

// -----------------------------------------
// Page Metabox Google Maps Options        -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_options',
  'title'     => esc_html__( 'Page Options', 'restocore' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(
	 array(
		 'name'		=> 'page_header_section',
		 'title'	=> esc_html__( 'Page Header', 'restocore' ),
		 'icon'		=>	'fa fa-header',
		 'fields'	=> array(
			 array(
				 'id'		=> 'page_header',
				 'type'		=> 'radio',
				 'class'	=> 'horizontal',
				 'options'	=> array(
					 'featured'		=> esc_html__( 'Featured Image', 'restocore' ),
					 'title'		=> esc_html__( 'Minimal', 'restocore' ),
					 'presentation'	=> esc_html__( 'Presentation Slider', 'restocore' ),
					 'slider'		=> esc_html__( 'Swiped Slider', 'restocore' ),
					 'shortcode'	=> esc_html__( 'Shortcode', 'restocore' ),
				 ),
				 'default'	=> 'featured',
			),
			array(
				'id'	=> 'transparent_header',
				'title'	=> esc_html__( 'Transparent Header', 'restocore' ),
				'dependency' => array( 'page_header_title', '!=', 'true' ),								
				'type'	=> 'select',
				'options'	=> array(
					'default'	=> esc_html__('Default', 'restocore'),
					'on'	=> esc_html__('On', 'restocore'),
					'off'	=> esc_html__('Off', 'restocore'),
				),
			),
			array(
				'id'	=> 'hide_title',
				'type'	=> 'checkbox',
				'title'	=> esc_html__('Hide Title', 'restocore'),				
				'dependency'	=> array( 'page_header_featured', '==', 'true' ),
			),
			array(
				  'type'    	=> 'notice',
				  'class'   	=> 'info',
				  'content' 	=> esc_html__('Info: The Header will not be a transparent in minimal variant.', 'restocore'),
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
						'title'	=> esc_html__('Logo', 'restocore'),
					),					
					array(
						'id'	=> 'title',
						'type'	=> 'text',
						'title'	=> esc_html__('Title', 'restocore'),
					),
					array(
						'id'	=> 'subtitle',
						'type'	=> 'text',
						'title'	=> esc_html__('Subtitle', 'restocore'),
					),
					array(
						'id'	=> 'gallery',
						'type'	=> 'gallery',
						'title'	=> esc_html__('Slider Images', 'restocore'),
					),	
					array(
						'id'	=> 'opacity',
						'type'	=> 'radio',
						'title'	=> esc_html__('Opacity Level', 'restocore'),
						'class' => 'horizontal',
						'options'	=> array(
							'0'	=> esc_html__('None', 'restocore'),
							'0.25'	=> '25%',
							'0.50'	=> '50%',
							'0.75'	=> '75%',
						),
						'default'	=> '0.25',
					),															
					array(
						'id'	=> 'height',
						'type'	=> 'number',
						'title'	=> esc_html__('Height in px', 'restocore'),
						'info'	=> esc_html__('Leave empty for full screen', 'restocore'),
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
				'title'			=> esc_html__('Paste Slider Shortcode', 'restocore'),
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
						'title'	=> esc_html__( 'Slide Title', 'restocore' ),
					),
					array(
						'id'	=> 'slide_description',
						'type'	=> 'textarea',
						'title'	=> esc_html__( 'Slide Description', 'restocore' ),
					),					
					array(
						'id'	=> 'slide_image',
						'type'	=> 'image',
						'title'	=> esc_html__( 'Slide Background Image', 'restocore' ),
					),
					array(
						'id'	=> 'slide_button_text',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Slide Button Text', 'restocore' ),
						
					),				
					array(
						'id'	=> 'slide_button_link',
						'type'	=> 'text',
						'title'	=> esc_html__( 'Slide Button Link', 'restocore' ),
					),
				),
			),			 
		 ),
	 ),
	 array(
	      'name'	=> 'section_1',
	      'title'	=> esc_html__( 'Page Layout', 'restocore' ),
	      'icon'	=> 'fa fa-columns',
	      'fields'	=> array(
		    array(
				'id'		=>	'ukrdevs_page_layout',
				'type'		=>	'radio',
				'title'		=>	esc_html__( 'Select boxed or wide layout.', 'restocore' ),
				'options'	=>	array(
					'default'	=> esc_html__( 'Default', 'restocore' ),
					'wide' 		=> esc_html__( 'Wide layout', 'restocore' ),
					'boxed'		=> esc_html__( 'Boxed layout', 'restocore' ),
				),
				'default'	=>	'default',
			),
		),// end: fields
	),// end: a section
    // begin: a section
	 array(
	      'name'	=> 'section_3',
	      'title'	=> esc_html__( 'Google Map', 'restocore' ),
	      'icon'	=> 'fa fa-map-marker',
	      'fields'	=> array(
		     array(
	          'id'    => 'google_map_switcher',
	          'type'  => 'switcher',
	          'title' => esc_html__('Google Map Before Footer', 'restocore'),
		    ),
		),// end: fields
	),// end: a section
  ),
);

CSFramework_Metabox::instance( $options );
