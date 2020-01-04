<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

add_filter( 'cs_customize_options', 'cristiano_cs_customize_options' );

function cristiano_cs_customize_options( $options ) {

	$options              = array();
	
	$options[] = array(
		'name'              => 'cristiano_theme_options',
		'title'             => esc_html__('Theme Options', 'cristiano'),
		'sections'          => array(
			array(
				'name'          => 'cristiano_header',
				'title'         => esc_html__('Header', 'cristiano'),
				'settings'      => array(
					array(
						'name'          => 'header_design',
						'control'       => array(
							'type'      => 'cs_field',
							'options'   => array(
								'type'      => 'image_select',
								'title'     => esc_html__('Header Design', 'cristiano'),
								'options'   => array(
									'v1'	=> get_template_directory_uri() . '/assets/images/headers/v1.png',
									'v2'    => get_template_directory_uri() . '/assets/images/headers/v2.png',
									'v3'    => get_template_directory_uri() . '/assets/images/headers/v3.png',
								),
								'radio'     => true,
							),
						),
					),		    	
					array(
						'name'          => 'transparent_header',
					    'control'       => array(
					        'type'        => 'cs_field',
					        'options'     => array(
					        	'type'      => 'switcher',
								'title'     => esc_html__('Transparent Header', 'cristiano'),
					        ),
					    ),
					    'default'	=> cs_get_option('transparent_header'),
				    ),	
					array(
						'name'          => 'full_width_header',
					    'control'       => array(
					        'type'        => 'cs_field',
					        'options'     => array(
					        	'type'      => 'switcher',
								'title'     => esc_html__('Full Width', 'cristiano'),
					        ),
					    ),
				    ),				    
					array(
						'name'          => 'shading_overlay',
					    'control'       => array(
							'label'       => esc_html__('Header Image Shading Overlay', 'cristiano'),
							'type'        => 'select',
							'choices'     => array(
								''	=> esc_html__('Gradient', 'cristiano'),	
								'radial' => esc_html__('Radial', 'cristiano'),	
								'opacity-3'	=> 'Shading 75%',		
								'opacity-2'	=> 'Shading 50%',		
								'opacity-1'	=> 'Shading 25%',
								'none'		=> esc_html__('None', 'cristiano'),
							),
					    ),
				    ),
					array(
						'name'          => 'shadow',
					    'control'       => array(
					        'type'        => 'cs_field',
					        'options'     => array(
					        	'type'      => 'switcher',
								'title'     => esc_html__('Dynamic Shadow', 'cristiano'),
					        ),
					    ),
				    ),
					array(
						'name'          => 'wc_shoping_cart_amount',
					    'control'       => array(
					        'type'        => 'cs_field',
					        'options'     => array(
					        	'type'      => 'switcher',
								'title'     => esc_html__('Show Cart Ammount', 'cristiano'),
					        ),
					    ),
				    ),
					array(
						'name'          => 'wc_shoping_cart_min',
					    'control'       => array(
					        'type'        => 'cs_field',
					        'options'     => array(
					        	'type'      => 'checkbox',
								'title'     => esc_html__('Hide Cart Icon', 'cristiano'),
					        ),
					    ),
				    ),
				),
			), 
			array(
				'name'          => 'cristiano_heading',
				'title'         => esc_html__('Heading', 'cristiano'),
				'settings'      => array(
					array(
						'name'          => 'heading_style',
						'control'       => array(
							'type'      => 'cs_field',
							'options'   => array(
								'type'      => 'image_select',
								'title'     => esc_html__('Heading Style', 'cristiano'),
								'options'   => array(
									''    	=> get_template_directory_uri() . '/assets/images/admin/headings/heading-v1.png',
									'v2'    => get_template_directory_uri() . '/assets/images/admin/headings/heading-v2.png',
								),
								'radio'     => true,
							),
						),
					),						
				),
			),			   	    		    	    	
		),		
	);
			
	$options[]            = array(
		'name'              => 'color_panel',
		'title'             => esc_html__('Colors', 'cristiano'),
		'sections'          => array(
			array(
				'name'	=> 'top_bar_colors',
				'title'	=> 	esc_html__('Top Bar Colors', 'cristiano'),
				'settings'	=> array(
					array(
						'name'      => 'top_bar_bg',
						'default'   => '#1b2024',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Background', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'top_bar_color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Text', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'top_bar_hover',
						'default'   => '#d1a054',
						'transport' => 'postMessage',						
						'control'   => array(
							'label' => esc_html__('Accent', 'cristiano'),
							'type'	=> 'color',
						),
					),					
				),
			),
			array(
				'name'          => 'header_colors',
				'title'         => esc_html__('Header Colors', 'cristiano'),
				'settings'      => array(																				
					array(
						'name'      => 'header_bg',
						'default'   => '#1b2024',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Background', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'header_color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Text', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'header_hover',
						'default'   => '#d1a054',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Accent', 'cristiano'),
							'type'	=> 'color',
						),
					),				
					array(
						'name'      => 'transparent_color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Image Text [Global]', 'cristiano'),
							'type'	=> 'color',
						),
					),											
				),
			),		
			array(
				'name'          => 'content_colors',
				'title'         => esc_html__('Content Colors', 'cristiano'),
				'settings'      => array(	
					array(
						'name'      => 'background_color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Background', 'cristiano'),
							'type'	=> 'color',
						),
					),					
					array(
						'name'      => 'text_color',
						'default'   => '#1b2024',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Text', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'highlight_color',
						'default'   => '#d1a054',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Accent', 'cristiano'),
							'type'	=> 'color',
						),
					),
				),
			),		
			array(
				'name'          => 'footer_colors',
				'title'         => esc_html__('Footer', 'cristiano'),
				'settings'      => array(	
					array(
						'name'      => 'footer_bg',
						'default'   => '#1b2024',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Background', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'footer_color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'control'   => array(
							'label' => esc_html__('Text', 'cristiano'),
							'type'	=> 'color',
						),
					),
					array(
						'name'      => 'footer_hover',
						'default'   => '#d1a054',
						'transport' => 'postMessage',						
						'control'   => array(
							'label' => esc_html__('Accent', 'cristiano'),
							'type'	=> 'color',
						),
					),							
				),
			),		
		),
	);
	return $options;	
}