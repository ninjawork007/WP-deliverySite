<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

add_filter( 'cs_framework_settings','cristiano_cs_framework_settings'	);
add_filter( 'cs_framework_options', 'cristiano_cs_framework_options'	);

function cristiano_cs_framework_settings($settings) {
	$settings = array(
		'menu_title'      => esc_html__('Theme Options', 'cristiano'),
		'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
		'menu_slug'       => 'cs-framework',
		'ajax_save'       => false,
		'show_reset_all'  => false,
		'framework_title' => esc_html__('Theme Options', 'cristiano'),
	);
	return $settings;
}

function cristiano_cs_framework_options( $options ) {
	$options = array();

	$options[] = array(
		'name'   => 'services_heading',
		'title'  => esc_html__('General', 'cristiano'),
		'icon'   => 'fa fa-server',
	);	
	
	$options[] = array(
		'name'		=> 'general_section',
		'title'		=>	esc_html__( 'Layout', 'cristiano' ),
		'icon'		=>	'fa fa-columns',
		'fields'	=> array(	
				
			array(
				'type'		=> 'heading',
				'content'	=> esc_html__('Layout', 'cristiano'),
			),		
			array(
				'id'		=>	'dzsparallaxer',
				'type'		=>	'switcher',
				'title'		=>	esc_html__( 'Parallax', 'cristiano' ),				
			),	
			array(
				'id'		=>	'ukrdevs_site_layout',
				'type'		=>	'radio',
				'title'		=>	esc_html__( 'Select boxed or wide layout.', 'cristiano' ),
				'options'	=>	array(
					'wide' 	=>	esc_html__( 'Wide layout', 'cristiano' ),
					'boxed'	=>	esc_html__( 'Boxed layout', 'cristiano' ),
				),
				'default'	=>	'wide',
				'class'	=> 'horizontal',				
			),
			array(
				'id'		=>	'ukrdevs_bg_pattern',
				'type'		=>	'image_select',
				'title'		=>	esc_html__( 'Select a Background Pattern', 'cristiano' ),
				'options'	=> array(
					'pattern-bg1'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg1.png',
					'pattern-bg2'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg2.png',
					'pattern-bg3'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg3.png',
					'pattern-bg4'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg4.png',
					'pattern-bg5'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg5.png',
					'pattern-bg6'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg6.png',
					'pattern-bg7'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg7.png',
					'pattern-bg8'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg8.png',
					'pattern-bg9'    => get_template_directory_uri() . '/assets/images/patterns/admin/bg9.png',
					'pattern-bg10'   => get_template_directory_uri() . '/assets/images/patterns/admin/bg10.png',
					'pattern-bg11'   => get_template_directory_uri() . '/assets/images/patterns/admin/bg11.png',
				),
				'default'	=>	'pattern-bg1',
				'info'		=> esc_html__('Background pattern shows only on boxed layout!', 'cristiano'),
			),			
			array(
				'type'    => 'notice',
				'class'   => 'info',
				'content' => 'Header Settings now in the <a href="'.admin_url().'customize.php?autofocus%5Bpanel%5D=cristiano_theme_options">Customizer.</a>',
			),			
		),
	);
	
	$options[] = array(
		'name'		=> 'typography_section',
		'title'		=>	esc_html__( 'Typography', 'cristiano' ),
		'icon'		=>	'fa fa-font',
		'fields'	=> array(
			array(
				'id'	=> 'custom_fonts',
				'type'	=> 'switcher',
				'title'	=> esc_html__('Custom Fonts', 'cristiano'),
			),
			array(
				'id'	=> 'custom_font_set',
				'type'	=> 'fieldset', 
				'dependency'   => array( 'custom_fonts', '==', 'true' ),	
				'un_array'	=> true,			
				'fields'	=> 	array(
					array(
						'type'	=> 'subheading',
						'content'	=> esc_html__('BODY FONT', 'cristiano'),
					),
					array(
						'id'	=> 'body_font_source',
						'type'	=> 'radio',
						'options'	=> array(
							'google'	=> esc_html__('Google Fonts', 'cristiano'),
							'custom'	=> esc_html__('Custom Font', 'cristiano'),
						),
						'class'	=> 'horizontal',
						'default' => 'google',
					),
					array(
				  		'id'        => 'body_font',	
				  		'type'      => 'typography',
				  		'default'   => array(
							'family'  => 'IBM Plex Serif',
							'variant' => 'regular',
							'font'    => 'google',
						),	
						'dependency' => array('body_font_source_google', '==', 'true'),
					),	
					array(
						'id'	=> 'body_font_fieldset',
						'type'	=> 'fieldset',
						'un_array' => true,
						'fields'	=> array(
					        array(
					        	'id'      => 'body_font_woff',
								'type'    => 'upload',
								'title'   => 'WOFF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-woff',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),			
					        array(
					        	'id'      => 'body_font_ttf',
								'type'    => 'upload',
								'title'   => 'TTF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-ttf',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),					        				
						),
						'dependency'=> array('body_font_source_custom', '==', 'true'),
					),
					array(
						'type'	=> 'subheading',
				  		'content'     => esc_html__('HEADING FONT', 'cristiano'),
					),	
					array(
						'id'	=> 'heading_font_source',
						'type'	=> 'radio',
						'options'	=> array(
							'google'	=> esc_html__('Google Fonts', 'cristiano'),
							'custom'	=> esc_html__('Custom Font', 'cristiano'),
						),
						'class'	=> 'horizontal',
						'default' => 'google',
					),	
					array(
				  		'id'        => 'heading_font',	
				  		'type'      => 'typography',
				  		'default'   => array(
							'family'  => 'Cinzel',
							'variant' => 'regular',
							'font'    => 'google',
						),
						'dependency' => array('heading_font_source_google', '==', 'true'),
					),	
					array(
						'id'	=> 'heading_font_fieldset',
						'type'	=> 'fieldset',
						'un_array' => true,
						'fields'	=> array(
					        array(
					        	'id'      => 'heading_font_woff',
								'type'    => 'upload',
								'title'   => 'WOFF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-woff',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),			
					        array(
					        	'id'      => 'heading_font_ttf',
								'type'    => 'upload',
								'title'   => 'TTF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-ttf',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),					        				
						),
						'dependency'=> array('heading_font_source_custom', '==', 'true'),
					),	
					array(
						'id'	=> 'heading_font_uppercase',
						'type'	=> 'checkbox',
						'after'	=> esc_html__('to UPPERCASE', 'cristiano'),
					),
					array(
						'type'	=> 'subheading',
						'content'	=> esc_html__('TITLE FONT', 'cristiano'),
					),			
					array(
						'id'	=> 'title_font_source',
						'type'	=> 'radio',
						'options'	=> array(
							'google'	=> esc_html__('Google Fonts', 'cristiano'),
							'custom'	=> esc_html__('Custom Font', 'cristiano'),
						),
						'class'	=> 'horizontal',
						'default' => 'google',
					),	
					array(
				  		'id'        => 'title_font',	
				  		'type'      => 'typography',
				  		'default'   => array(
							'family'  => 'Cinzel',
							'variant' => 'regular',
							'font'    => 'google',
						),
						'dependency' => array('title_font_source_google', '==', 'true'),
					),	
					array(
						'id'	=> 'title_font_fieldset',
						'type'	=> 'fieldset',
						'un_array' => true,
						'fields'	=> array(
					        array(
					        	'id'      => 'title_font_woff',
								'type'    => 'upload',
								'title'   => 'WOFF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-woff',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),			
					        array(
					        	'id'      => 'title_font_ttf',
								'type'    => 'upload',
								'title'   => 'TTF',
								'settings'	=> array(
									'upload_type'  => 'application/x-font-ttf',
									'button_title' => esc_html__('Upload Font', 'cristiano'),
									'frame_title'  => esc_html__('Choose a Font', 'cristiano'),
									'insert_title' => esc_html__('Use This Font', 'cristiano'),
								),
					        ),					        				
						),
						'dependency'=> array('title_font_source_custom', '==', 'true'),
					),		
					array(
						'id'	=> 'title_font_uppercase',
						'type'	=> 'checkbox',
						'after'	=> esc_html__('to UPPERCASE', 'cristiano'),
					),													
					array(
						'type'		=> 'subheading',
				  		'content'	=> esc_html__('Languages Subsets', 'cristiano'),
					),				
					array(
						'id'	=> 'body_font_subsets',
						'type'	=> 'checkbox',
						'options'    => array(
							'latin-ext'		=> 'Latin Ext',
							'cyrillic'		=> 'Cyrillic',
							'cyrillic-ext'	=> 'Cyrillic Ext',										
							'greek'     	=> 'Greek',
							'greek-ext'		=> 'Greek Ext',
							'vietnamese'	=> 'Vietnamese',
							
						),				
						'class'	=> 'horizontal',
						'info'	=> esc_html__('Note: Make sure font already supports selected character set/sets.', 'cristiano'),
					),								
				),
			),			
		),
	);
	
	$options[]   = array(
	  'name'     => 'contact',
	  'title'    => esc_html__('Contact Details', 'cristiano'),
	  'icon'     => 'fa fa-location-arrow',
	  'fields' => array(
			array(
				'id'        => 'fieldset_address',
				'type'      => 'fieldset',
				'un_array'  => true, 
				'title'     => esc_html__('Address', 'cristiano'),
				'fields'    => array(
					array(
						'id'    => 'address_location',
						'type'  => 'text',
						'title' => esc_html__('Actual Address', 'cristiano'),
						'multilang'	=> true,
					),
					array(
						'id'    => 'address_notes',
						'type'  => 'text',
						'title' => esc_html__('Address Notes', 'cristiano'),
						'multilang'	=> true,              
					),           
					array(
						'id'    => 'open_table_id',
						'type'  => 'text',
						'title' => esc_html__( 'Open Table Restaurant ID', 'cristiano' ),
					),   
					array(
						'id'    => 'open_table_site',
						'type'  => 'select',
						'title' => esc_html__( 'Open Table Site', 'cristiano' ),
						'options'	=> array(
							'opentable.com' 	=> 'OpenTable.com',
							'opentable.de'		=> 'OpenTable.de',
							'opentable.es'		=> 'OpenTable.es',
							'OpenTable.jp'		=> 'OpenTable.jp',
							'opentable.com.mx'	=> 'OpenTable.com.mx',
							'opentable.ca'		=> 'OpenTable.ca',
							'opentable.hk'		=> 'OpenTable.hk',
							'opentable.ie'		=> 'OpenTable.ie',
							'opentable.sg'		=> 'OpenTable.sg',
							'opentable.nl' 		=> 'OpenTable.nl',
							'opentable.co.uk'	=> 'OpenTable.co.uk',
							'opentable.com.au'	=> 'OpenTable.com.au',
							'opentable.ae'		=> 'OpenTable.ae',
							'opentable.co.th'	=> 'OpenTable.co.th',
							'opentable.it'		=> 'OpenTable.it',
						),
					),
					array(
						'id'    => 'public_email',
						'type'  => 'text',
						'title' => esc_html__( 'Public email', 'cristiano' ),
						'info'	=> 'Shows in footer and on the contact page'
					),    
				),                 
			),
	        
			array(
	          'id'        => 'fieldset_phones',
	          'type'      => 'fieldset',
	          'title'     => esc_html__( 'Phone Numbers', 'cristiano' ),
	          'fields'    => array(
	            array(
	              'id'    => 'phone_1',
	              'type'  => 'text',
	              'title' => esc_html__('Phone', 'cristiano') . ' 1',
	            ),
	            array(
	              'id'    => 'phone_2',
	              'type'  => 'text',
	              'title' => esc_html__('Phone', 'cristiano') . ' 2',
	            ),
	            array(
	              'id'    => 'phone_3',
	              'type'  => 'text',
	              'title' => esc_html__('Phone', 'cristiano') . ' 3',
	            ),   
	            array(
	              'id'    => 'phone_4',
	              'type'  => 'text',
	              'title' => esc_html__('Phone', 'cristiano') . ' 4',
	            ),                              
	          ),
	          'default'   => array(
		          'phone_1' => '+38 (012) 34 56 789',
				  ),
	        ),
	        
			array(
	          'id'        => 'fieldset_hours',
	          'type'      => 'fieldset',
	          'title'     => esc_html__( 'Working Hours', 'cristiano' ),
	          'fields'    => array(
	            array(
	              'id'    => 'hours_1',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 1',
	 			  'multilang' => true,
	            ),
	            array(
	              'id'    => 'hours_2',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 2',
				  'multilang' => true,
	            ),
	            array(
	              'id'    => 'hours_3',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 3',
				  'multilang' => true,
	            ),     
	            array(
	              'id'    => 'hours_4',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 4',
				  'multilang' => true,
	            ),      
	            array(
	              'id'    => 'hours_5',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 5',
				  'multilang' => true,
	            ),     
	            array(
	              'id'    => 'hours_6',
	              'type'  => 'text',
	              'title' => esc_html__('Row', 'cristiano') . ' 6',
				  'multilang' => true,
	            ),                                                            
	          ),
	          'default'   => array(
		          'hours_1' => 'Mon - Fri: 08:00 am - 10:00 pm',
		          'hours_2' => 'Sat - Sun: 10:00 am - 11:00 pm',
				),          
	        ),       
	    ),
	);
		
	$options[]   = array(
	  'name'     => 'social',
	  'title'    => esc_html__('Social Networks', 'cristiano'),
	  'icon'     => 'fa fa-globe',
	  'fields' => array(
		  
			array(
	          'id'        => 'fieldset_social',
	          'type'      => 'fieldset',
	          'title'     => esc_html__( 'Social Networks', 'cristiano' ),
	          'fields'    => array(
	            array(
	              'id'    => 'facebook',
	              'type'  => 'text',
	              'title' => 'Facobook',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),            
	            ),
	            array(
	              'id'    => 'twitter',
	              'type'  => 'text',
	              'title' => 'Twitter',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),
	            array(
	              'id'    => 'linkedin',
	              'type'  => 'text',
	              'title' => 'LinkedIn',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),            
	            array(
	              'id'    => 'google-plus',
	              'type'  => 'text',
	              'title' => 'Google Plus',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),
	            array(
	              'id'    => 'youtube-play',
	              'type'  => 'text',
	              'title' => 'YouTube',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),                     
	            array(
	              'id'    => 'vk',
	              'type'  => 'text',
	              'title' => 'Vkontakte',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),
	             array(
	              'id'    => 'instagram',
	              'type'  => 'text',
	              'title' => 'Instagram',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),  
	             array(
	              'id'    => 'pinterest',
	              'type'  => 'text',
	              'title' => 'Pinterest',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),   
	             array(
	              'id'    => 'tripadvisor',
	              'type'  => 'text',
	              'title' => 'TripAdvisor',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),
				 array(
	              'id'    => 'yelp',
	              'type'  => 'text',
	              'title' => 'Yelp',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ),   
				 array(
	              'id'    => 'spoon',
	              'type'  => 'text',
	              'title' => 'Zomato',
		          'attributes'    => array(
		            'placeholder' => esc_html__( 'Social Url', 'cristiano' ),
		          ),               
	            ), 	                                                                 
	          ),
	        ),
		),	  
	);
	
	$admin_email = get_option('admin_email');
	
	$options[]   = array(
		'name'     => 'forms',
		'title'    => esc_html__('Website Forms', 'cristiano'),
		'icon'     => 'fa fa-wpforms',
		'fields' => array(
			array(
				'type'		=> 'heading',
				'content'	=> esc_html__('Contact Form', 'cristiano'),
			),
			array(
				'id'	=> 'contact_form_email',
				'type'	=> 'text',
				'title'	=> esc_html__('Send To Email Address', 'cristiano'),
				'attributes' => array(
					'placeholder' => $admin_email,
				),
				'info'	=> esc_html__('Defaults to your current email address.', 'cristiano'),
			),
			array(
				'type'		=> 'heading',
				'content'	=> esc_html__('Reservation Form', 'cristiano'),
			),		
			array(
				'id'	=> 'reservation_form_email',
				'type'	=> 'text',
				'title'	=> esc_html__('Send To Email Address', 'cristiano'),
				'attributes' => array(
					'placeholder' => $admin_email,
				),
				'info'	=> esc_html__('Defaults to your current email address.', 'cristiano'), 		
			),
			array(
				'id'	=> 'guest_number',
				'type'	=> 'number',
				'title'	=> esc_html__('Max Guest Number', 'cristiano'),
				'default'	=> '10',
				'attributes'	=> array(
					'min'	=> 1,
				),
			),
			array(
				'id'	=> 'reservation_hours',
				'type'	=> 'hours',
				'title'	=> esc_html__('Reservation Hours', 'cristiano'),
				'default'	=> array(
					'from'	=> '10:00',
					'to'	=> '22:00',
				),
			),	
			array(
				'type'		=> 'heading',
				'content'	=> esc_html__('Signature', 'cristiano'),
			),	
			array(
				'id'	=> 'email_signature',
				'type'	=> 'textarea',
				'attributes'	=> array(
					'rows'	=> 18,
				),
				'info' => esc_html__('Signature is displayed in the reservation email copy that goes to the client.', 'cristiano'),
			),		
		),
	);
	
	$options[]   = array(
		'name'     => 'footer_section',
		'title'    => esc_html__('Footer', 'cristiano'),
		'icon'     => 'fa fa-window-minimize',
		'fields'   => array(
			array(
				'type'		=> 'heading',
				'content'	=> esc_html__('Footer Copyright', 'cristiano'),
			),		
			array(
				'id'	=> 'footer_copyright',
				'type'	=> 'textarea',
				'title'	=> esc_html__('Copyright Text', 'cristiano'),
				'info'	=> esc_html__('Enter the text that displays in the copyright bar. HTML markup can be used.', 'cristiano'),
				'default'	=>	'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') .'. All rights reserved.',
			),
		),
	);
	
	$options[] = array(
		'name'   => 'services_heading',
		'title'  => esc_html__('Post Types', 'cristiano'),
		'icon'   => 'fa fa-server',
	);
	
	$options[]   = array(
		'name'	=> 'blog_section',
		'title'	=> esc_html__('Blog Settings', 'cristiano'),
		'icon'	=> 'fa fa-pencil-square-o',
		'sections' => array(
			array(
				'name'	=> 'blog_single',
				'title'	=> esc_html__('Single Post Page', 'cristiano'),
				'icon'	=> 'fa fa-minus',		
				'fields'=> array(
					array(
						'type'		=> 'heading',
						'content'	=> esc_html__('Single Post Page', 'cristiano'),
					),
					array(
						'id'	=> 'single_post_sidebar_position',
						'title'	=> esc_html__( 'Set Single Post Sidebar', 'cristiano' ),
						'type'	=> 'select',
						'options' => array(
							'no-sidebar'	=> esc_html__( 'No Sidebar', 'cristiano' ),
							'left-sidebar'	=> esc_html__( 'Left Sidebar', 'cristiano' ),
							'right-sidebar'	=> esc_html__( 'Right Sidebar', 'cristiano' ),
						),
						'default' => 'right-sidebar',
					),
					array(
						'id'	=> 'single_post_sidebar_area',
						'title'	=> esc_html__( 'Widget Area', 'cristiano' ),
						'dependency'		=> array( 'single_post_sidebar_position', '!=', 'no-sidebar' ),					
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
		),
	);
	
	$curency_symbol = cs_get_option('dishes_menu_currency');
	if(!$curency_symbol){
		$curency_symbol = '$';
	}
	$options[]   = array(
		'name'	=> 'menu_section',
		'title'	=> esc_html__('Our Menu', 'cristiano'),
		'icon'	=> 'fa fa-cutlery',
		'fields' => array(
			array(
				'id'		=> 'dishes_menu_currency',
				'type'		=> 'text',
				'title'		=> esc_html__('Currency Symbol', 'cristiano'),
				'default'	=> '$',
			),
			array(
				'id'		=> 'dishes_menu_currency_position',
				'type'		=> 'select',
				'title'		=> esc_html__('Currency Position', 'cristiano'),			
				'options'	=> array(
					'left' 			=> esc_html__('Left', 'cristiano') . ' (' . $curency_symbol . '99.99)',
					'right' 		=> esc_html__('Right', 'cristiano') . ' (99.99' . $curency_symbol . ')',
					'left_space'	=> esc_html__('Left with Space', 'cristiano') . ' (' . $curency_symbol . ' 99.99)',
					'right_space'	=> esc_html__('Right with Space', 'cristiano') .  ' (99.99 ' . $curency_symbol . ')',
				),
				'default'	=> 'left',
				'info'		=> esc_html__('Please select the position of the currency symbol.','cristiano'),			
			),	
			array(
				'id'		=> 'menu_item_single_page',
				'type'		=> 'switcher',
				'title'		=> esc_html__('Menu Item Single Page', 'cristiano'),					
			),	
			array(
				'id'		=> 'daily_menu',
				'type'		=> 'switcher',
				'title'		=> esc_html__('Daily Menu', 'cristiano'),					
			),
			array(
				'id' => 'menu_page',
				'type'	=> 'select',			
				'title'	=> esc_html__( 'Menu Page', 'cristiano' ),		
				'options'    	 => 'pages',
				'default_option' => esc_html__('- Select Menu Page -', 'cristiano'),
				'dependency'	 => array('daily_menu', '==', 'true'),
			),
			array(
				'type'		=> 'notice',
				'class'		=> 'info',
				'content'	=> esc_html__('For correct work of daily menu - Your parent menu categories must be days of week.', 'cristiano'),
				'dependency'	=> array('daily_menu', '==', 'true'),
			),
		),
	);
	if(class_exists('woocommerce')) {
		$options[]   = array(
			'name'     => 'woocommerce',
			'title'    => esc_html__('WooCommerce', 'cristiano'),
			'icon'     => 'fa fa-shopping-cart',
			'sections'	=> array(
				array(
					'name'	=> 'product_list_section',
					'title'	=> esc_html__('Catalog Page', 'cristiano'),
					'icon'	=> 'fa fa-minus',		
					'fields'=> array(
						array(
							'type'		=> 'heading',
							'content'	=> esc_html__('Catalog Page Settings', 'cristiano'),
						),	
						array(
							'id'	=> 'archive_product_template',
							'type'	=> 'radio',
							'title'	=> esc_html__('Product Catalog Template', 'cristiano'),
							'options'	=> array(
								'classic'	=> esc_html__('Classic', 'cristiano'),
								'list'		=> esc_html__('List', 'cristiano'),
							),
							'default'	=> 'classic',
							'class'		=> 'horizontal',
						),
						array(
							'id'	=> 'product_catalog_cols',
							'title'	=> esc_html__( 'Product Catalog Columns', 'cristiano' ),
							'type'	=> 'radio',
							'options' => array(
								'cols-2'	=> '2 ' . esc_html__( 'Columns', 'cristiano' ),
								'cols-3'	=> '3 ' . esc_html__( 'Columns', 'cristiano' ),
								'cols-4'	=> '4 ' . esc_html__( 'Columns', 'cristiano' ),
							),
							'default' => 'cols-3',
							'dependency'   => array( 'archive_product_template_classic', '==', 'true' ),

						),		
						array(
							'id'	=> 'test',
							'type'	=> 'fieldset',
							'un_array'	=> true,
							'dependency'   => array( 'archive_product_template_classic', '==', 'false' ),
							'fields'	=> array(
								array(
									'id'	=> 'featured_products',
									'title'	=> esc_html__('Featured Products', 'cristiano'),
									'type'	=> 'switcher',
								),	
								array(
									'id'	=> 'featured_products_title',
									'title'	=> esc_html__('Title', 'cristiano'),
									'type'	=> 'text',
									'dependency'   => array( 'featured_products', '==', 'true' ),
								),	
								array(
									'id'	=> 'featured_products_subtitle',
									'title'	=> esc_html__('Subtitle', 'cristiano'),
									'type'	=> 'text',
									'dependency'   => array( 'featured_products', '==', 'true' ),
								),											
								array(
									'id'	=> 'product_nav',
									'title'	=> esc_html__('Product Navigation', 'cristiano'),
									'type'	=> 'switcher',
								),		
								array(
									'id'	=> 'hide_product_images',
									'type'	=> 'checkbox',
									'title'	=> esc_html__('Hide Product Images', 'cristiano'),
								),							
							),
						),			
						array(
							'id'	=> 'products_per_page',
							'title'	=> esc_html__('Products per page', 'cristiano'),
							'type'	=> 'number',
							'after'	=> esc_html__('product items', 'cristiano'),
							'default'	=> get_option('posts_per_page'),
							'attributes' => array(
								'style'	=> 'width: 65px; margin-right: 5px;',
							),
							'dependency'   => array( 'archive_product_template_classic', '==', 'true' ),
						),							
					),		
				),
				array(
					'name'	=> 'single_product_section',
					'title'	=> esc_html__('Single Product', 'cristiano'),
					'icon'	=> 'fa fa-minus',
					'fields'=> array(
						array(
							'type'		=> 'heading',
							'content'	=> esc_html__('Single Product Settings', 'cristiano'),
						),	
						array(
							'id'	=> 'related_products_number',
							'title'	=> esc_html__('Number of Related Products', 'cristiano'),
							'type'	=> 'number',
							'attributes'	=> array(
								'min'	=> '2',
							),	
							'default'	=> '3',
						),	
						array(
							'type'		=> 'subheading',
							'content'	=> esc_html__('Sidebar', 'cristiano'),
						),										
						array(
							'id'	=> 'single_product_sidebar_position',
							'title'	=> esc_html__( 'Set Single Product Sidebar', 'cristiano' ),
							'type'	=> 'select',
							'options' => array(
								'no-sidebar'	=> esc_html__( 'No Sidebar', 'cristiano' ),
								'left-sidebar-sp'	=> esc_html__( 'Left Sidebar', 'cristiano' ),
								'right-sidebar-sp'	=> esc_html__( 'Right Sidebar', 'cristiano' ),
							),
							'default' => 'no-sidebar',
						),
						array(
							'id'	=> 'single_product_sidebar_area',
							'title'	=> esc_html__( 'Widget Area', 'cristiano' ),
							'dependency'		=> array( 'single_product_sidebar_position', '!=', 'no-sidebar' ),					
							'type'	=> 'radio',
							'options' => array(
								'blog_sidebar' => esc_html__('Blog Sidebar', 'cristiano'),
								'shop_sidebar' => esc_html__('Shop Sidebar', 'cristiano'),
								'general_sidebar' => esc_html__('General Sidebar', 'cristiano'),							
							),
							'default'	=> 'shop_sidebar',
							'info'		=> esc_html__('Choose widget area to display', 'cristiano'),
						),							
						array(
							'type'		=> 'subheading',
							'content'	=> esc_html__('Social Sharing', 'cristiano'),
						),							
						array(
							'id'	=> 'wc_social_sharing',
							'type'	=> 'switcher',
							'title'	=> esc_html__('Social Share Buttons', 'cristiano'),
						),		
						array(
							'id'	=> 'social_sharing_networks',
							'type'	=> 'checkbox',
							'title'	=> esc_html__('Social Networks', 'cristiano'),
							'options' => array(
								'facebook'	=> 'Facebook',
								'twitter'	=> 'Twitter',
								'google'	=> 'Google Plus',
								'linkedin'	=> 'LinkedIn',
								'tumblr'	=> 'Tumblr',
								'pinterest'	=> 'Pinterest',
							),
							'dependency'   => array( 'wc_social_sharing', '==', 'true' ),

						),							
									
					),				
				),			
			    array(
					'name'		=> 'checkout_section',
					'title'		=> esc_html__('Checkout Page', 'cristiano'),
					'icon'		=> 'fa fa-minus',
					'fields' => array(
						array(
							'type'		=> 'heading',
							'content'	=> esc_html__('Checkout Billing Fields', 'cristiano'),
						),	
						array(
							'id'	=> 'wc_billing_last_name',
							'title'	=> esc_html__('Last Name Field', 'cristiano'),
							'type'	=> 'switcher',
						),
						array(
							'id'	=> 'wc_billing_company',
							'title'	=> esc_html__('Company Field', 'cristiano'),
							'type'	=> 'switcher',
						),	
						array(
							'id'	=> 'wc_billing_country',
							'title'	=> esc_html__('Country Field', 'cristiano'),
							'type'	=> 'switcher',
						),
						array(
							'id'	=> 'wc_billing_state',
							'title'	=> esc_html__('State Field', 'cristiano'),
							'type'	=> 'switcher',
						),
						array(
							'id'	=> 'wc_billing_postcode',
							'title'	=> esc_html__('Post Code Field', 'cristiano'),
							'type'	=> 'switcher',
						),
						array(
							'id'	=> 'wc_billing_city',
							'title'	=> esc_html__('City Field', 'cristiano'),
							'type'	=> 'switcher',
						),				
					),				
				),		
			),
	
		);
	}
	$options[] = array(
		'name'   => 'services_heading',
		'title'  => esc_html__('Services', 'cristiano'),
		'icon'   => 'fa fa-server',
	);
	$options[] = array(
		'name'     => 'google_analytics_section',
		'title'    => esc_html__('Google Analytics', 'cristiano'),
		'icon'     => 'fa fa-line-chart',
		'fields' => array(
			array(
				'type'    => 'heading',
				'content' => 'Google Analitics',
			),	
			array(
				'id'	=> 'google_analytics',
				'type'	=> 'switcher',
				'title'	=> esc_html__('Google Analytics', 'cristiano'),
			),			
			array(
				'id'	=> 'ga_tracking_id',
				'type'	=> 'text',
				'title'	=> esc_html__('Enter Your Tracking ID', 'cristiano'),
				'info'	=> '<a target="_blank" href="https://support.google.com/analytics/answer/1008080">Find your tracking ID</a>',
				'attributes'	=> array(
					'placeholder'	=> 'UA-XXXXX-Y',
				),
				'dependency'   => array( 'google_analytics', '==', 'true' ),
			),
		),
	);		
	$options[] = array(
		'name'     => 'google_map_settings',
		'title'    => esc_html__('Google Maps', 'cristiano'),
		'icon'     => 'fa fa-map',
		'fields' => array(
			array(
				'type'    => 'heading',
				'content' => esc_html__('Google Maps', 'cristiano'),
			),		
			array(
				'id'	=> 'map_type',
				'type'	=> 'radio',
				'options'	=> array(
					'api'	=> esc_html__('Google Map API', 'cristiano'),
					'code'	=> esc_html__('Map Code', 'cristiano'),
				),
				'default'	=> 'api',
				'class'	=> 'horizontal',
			),
			array(
				'id'	=> 'google_map_fieldset',
				'type'	=> 'fieldset',
				'un_array'	=> 1,
				'dependency'=> array('map_type_api', '==', true ),
				'fields'    => array(
					array(
						'type'    => 'notice',
						'class'   => 'info',
						'content' => esc_html__('Info: For correct Google Maps working you should paste your generated Google Maps API key to field bellow', 'cristiano')
					),
		            array(
					 	'id'    => 'google_map_api',
					 	'type'  => 'text',
					 	'title' => esc_html__( 'Google Map API', 'cristiano' ),
					 	'info'  => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get API Key</a>',
		            ),  
					array(
						'id'	=> 'google_maps_pointer_custom',
						'type'	=> 'image',			
						'title'	=> esc_html__('Chose Custom Google Maps Pointer', 'cristiano'),
						'dependency'	=> array('google_maps_pointer_radio_custom','==','true'),
					), 
					array(
						'id'	=> 'google_maps_location',
						'type'	=> 'google_map',
					),            
					array(
						'id'	=> 'google_maps_style',
						'type'	=> 'image_select',
						'title'	=> esc_html__('Google Maps Styles', 'cristiano'),
						'options'	=> array(
							'default'	=> get_template_directory_uri() . '/assets/images/admin/google-maps/default.png',
							'silver'	=> get_template_directory_uri() . '/assets/images/admin/google-maps/silver.png',
							'dark'		=> get_template_directory_uri() . '/assets/images/admin/google-maps/dark.png',
							'night'		=> get_template_directory_uri() . '/assets/images/admin/google-maps/night.png',	
							'retro'		=> get_template_directory_uri() . '/assets/images/admin/google-maps/retro.png',
						),
						'default'	=> 'default',
						'info'	=> esc_html__('The Changes will take effect after saving.', 'cristiano'),
					),
					array(
						'id'	=> 'google_maps_info_window',
						'title'	=> esc_html__('Info Window', 'cristiano'),
						'type'	=> 'wysiwyg',
						'settings' => array(
							'textarea_rows' => 10,
							'media_buttons' => false,
							'teeny'	=> true,
						),
					),
					array(
						'id'	=> 'google_maps_marker',
						'title'	=> esc_html__('Custom Marker', 'cristiano'),
						'type'	=> 'upload',
					),
				),
			),
			array(
				'type'		=> 'subheading',
				'content'	=> esc_html__('Enter your Map Code', 'cristiano'),
				'dependency'   => array( 'map_type_code', '==', 'true' ),
			),
			array(
				'id'	=> 'map_code',
				'type'	=> 'textarea',
				'sanitize'	=> false,
				'dependency'   => array( 'map_type_code', '==', 'true' ),
			),
		),
	);	
	$options[]   = array(
		'name'     => 'backup_section',
		'title'    => esc_html__('Backup', 'cristiano'),
		'icon'     => 'fa fa-shield',
		'fields'   => array(
			array(
				'type'    => 'notice',
				'class'   => 'warning',
				'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'cristiano'),
			),	
			array(
				'type'    => 'backup',
			),
		),
	);

	return $options;
}