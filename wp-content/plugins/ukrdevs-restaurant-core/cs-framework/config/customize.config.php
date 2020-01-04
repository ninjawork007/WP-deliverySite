<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$options              = array();

$options[]            = array(
	'name'              => 'color_panel',
	'title'             => esc_html__('Colors', 'restocore'),
	'description'       => 'Codestar customize panel description.',
	'sections'          => array(
		array(
			'name'          => 'top_bar',
			'title'         => esc_html__('Top Bar Colors', 'restocore'),
			'settings'      => array(	
				array(
					'name'      => 'top_bar_bg',
					'default'   => '#1b2024',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Background Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'top_bar_color',
					'default'   => '#ffffff',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Text Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'top_bar_hover',
					'default'   => '#d1a054',
					'control'   => array(
						'label' => esc_html__('Hover / Active Link','restocore'),
						'type'	=> 'color',
					),
				),
			),
		),
		array(
			'name'          => 'header_colors',
			'title'         => esc_html__('Header Colors', 'restocore'),
			'settings'      => array(	
				array(
					'name'      => 'header_bg',
					'default'   => '#23282d',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Background Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'header_color',
					'default'   => '#ffffff',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Text Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'header_hover',
					'default'   => '#d1a054',
					'control'   => array(
						'label' => esc_html__('Hover / Active Link','restocore'),
						'type'	=> 'color',
					),
				),
			),
		),
		array(
			'name'          => 'nav_colors',
			'title'         => esc_html__('Navigation Colors', 'restocore'),
			'settings'      => array(	
				array(
					'name'      => 'nav_bg',
					'default'   => '#23282d',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Background Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'nav_color',
					'default'   => '#ffffff',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Text Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'nav_hover',
					'default'   => '#d1a054',
					'control'   => array(
						'label' => esc_html__('Hover / Active Link','restocore'),
						'type'	=> 'color',
					),
				),
			),
		),		
		array(
			'name'          => 'content_colors',
			'title'         => esc_html__('Content Colors', 'restocore'),
			'settings'      => array(	
				array(
					'name'      => 'primary_color',
					'default'   => '#1b2024',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Primary Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'secondary_color',
					'default'   => '#d1a054',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Secondary Color','restocore'),
						'type'	=> 'color',
					),
				),
			),
		),		
		array(
			'name'          => 'footer_colors',
			'title'         => esc_html__('Footer Colors', 'restocore'),
			'settings'      => array(	
				array(
					'name'      => 'footer_bg',
					'default'   => '#23282d',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Background Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'footer_color',
					'default'   => '#ffffff',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Text Color','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'footer_hover',
					'default'   => '#d1a054',
					'control'   => array(
						'label' => esc_html__('Hover / Active Link','restocore'),
						'type'	=> 'color',
					),
				),
				array(
					'name'      => 'footer_bottom_bg',
					'default'   => '#23282d',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Bottom Bar Background','restocore'),
						'type'	=> 'color',
					),
				),		
				array(
					'name'      => 'footer_bottom_color',
					'default'   => '#23282d',
					'transport' => 'postMessage',
					'control'   => array(
						'label' => esc_html__('Bottom Bar Color','restocore'),
						'type'	=> 'color',
					),
				),							
			),
		),		
	),
);

CSFramework_Customize::instance( $options );