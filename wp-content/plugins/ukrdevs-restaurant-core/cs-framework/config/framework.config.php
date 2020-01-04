<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$settings           = array(
  'menu_title'      => esc_html__('Theme Options', 'restocore'),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => esc_html__('Theme Options', 'restocore'),
);

$options        = array();

$options[] = array(
	'name'		=> 'general_section',
	'title'		=>	esc_html__( 'Page Layout', 'restocore' ),
	'icon'		=>	'fa fa-columns',
	'fields'	=> array(	
		array(
			'id'		=>	'ukrdevs_site_layout',
			'type'		=>	'radio',
			'title'		=>	esc_html__( 'Select boxed or wide layout.', 'restocore' ),
			'options'	=>	array(
				'wide' 	=>	esc_html__( 'Wide layout', 'restocore' ),
				'boxed'	=>	esc_html__( 'Boxed layout', 'restocore' ),
			),
			'default'	=>	'wide',
		),
		array(
			'id'		=>	'ukrdevs_bg_pattern',
			'type'		=>	'image_select',
			'title'		=>	esc_html__( 'Select a Background Pattern', 'restocore' ),
			'options'	=> array(
				'pattern-bg1'    => get_template_directory_uri() . '/images/patterns/admin/bg1.png',
				'pattern-bg2'    => get_template_directory_uri() . '/images/patterns/admin/bg2.png',
				'pattern-bg3'    => get_template_directory_uri() . '/images/patterns/admin/bg3.png',
				'pattern-bg4'    => get_template_directory_uri() . '/images/patterns/admin/bg4.png',
				'pattern-bg5'    => get_template_directory_uri() . '/images/patterns/admin/bg5.png',
				'pattern-bg6'    => get_template_directory_uri() . '/images/patterns/admin/bg6.png',
				'pattern-bg7'    => get_template_directory_uri() . '/images/patterns/admin/bg7.png',
				'pattern-bg8'    => get_template_directory_uri() . '/images/patterns/admin/bg8.png',
				'pattern-bg9'    => get_template_directory_uri() . '/images/patterns/admin/bg9.png',
				'pattern-bg10'   => get_template_directory_uri() . '/images/patterns/admin/bg10.png',
				'pattern-bg11'   => get_template_directory_uri() . '/images/patterns/admin/bg11.png',
			),
			'default'	=>	'pattern-bg1',
			'info'		=> esc_html__('Background pattern shows only on boxed layout!', 'restocore'),
		),		
		array(
			'id'	=> 'transparent_header',
			'type'	=> 'switcher',
			'title'	=> esc_html__('Transparent Header', 'restocore'),
		),	
		array(
			'id'	=> 'show_top_bar_mobile',
			'type'	=> 'switcher',
			'title'	=> esc_html__('Show Top Bar On Mobile', 'restocore'),
		),				
		array(
			'id'		=>	'ukrdevs_header',
			'type'		=>	'image_select',
			'title'		=>	esc_html__( 'Select a Header Layout', 'restocore' ),
			'options'	=> array(
				'v1'    => get_template_directory_uri() . '/images/headers/v1.png',
				'v2'    => get_template_directory_uri() . '/images/headers/v2.png',
				'v3'    => get_template_directory_uri() . '/images/headers/v3.png',
				'v4'    => get_template_directory_uri() . '/images/headers/v4.png',
			),
			'radio'        => true,
			'default'      => 'v2',
		),
		array(
			'id'		=>	'ukrdevs_welcome_msg',
			'type'		=>	'text',
			'title'		=>	esc_html__( 'Welcome Message', 'restocore' ),
			'default' 	=>  'Welcome to Cristiano Restaurant Theme!',
			'info'   	=>  esc_html__( 'Show on top bar (Header #4)', 'restocore' ),	
			'multilang'	=> true,					
		),
		array(
			'type'	=> 'heading',
			'content'	=> esc_html__('Footer Copyright', 'restocore'),
		),		
		array(
			'id'	=> 'footer_copyright',
			'type'	=> 'textarea',
			'title'	=> esc_html__('Copyright Text', 'restocore'),
			'info'	=> esc_html__('Enter the text that displays in the copyright bar. HTML markup can be used.', 'restocore'),
			'default'	=>	'Copyright © ' . date('Y') . ' ' . get_bloginfo('name') .'. All rights reserved.',
		),
	),
);

$options[] = array(
	'name'		=> 'typography_section',
	'title'		=>	esc_html__( 'Typography', 'restocore' ),
	'icon'		=>	'fa fa-font',
	'fields'	=> array(
		array(
			'type'		=> 'heading',
			'content'	=> esc_html__('Google Fonts', 'restocore'),
		),		
		array(
			'id'        => 'body_font',
			'type'      => 'typography',
			'title'     => esc_html__('Body Font', 'restocore'),
			'default'   => array(
				'family'  => 'Lora',
				'font'    => 'google',
			),
			'variant'   => false,
			'info'		=> esc_html__('default is', 'restocore') . ' <b>Lora</b>',			
		),				
		array(
			'id'        => 'headings_font',
			'type'      => 'typography',
			'title'     => esc_html__('Headings Font','restocore'),
			'default'   => array(
				'family'  => 'Cinzel',
				'font'    => 'google',
				'variant' => 'regular',
			),
			'info'		=> esc_html__('default is', 'restocore') . ' <b>Cinzel</b>',			
			
		),				
	),
);

$options[]   = array(
  'name'     => 'contact',
  'title'    => esc_html__('Contact Details', 'restocore'),
  'icon'     => 'fa fa-location-arrow',
  'fields' => array(
		array(
          'id'        => 'fieldset_address',
          'type'      => 'fieldset',
          'un_array'  => true, 
          'title'     => esc_html__('Address', 'restocore'),
          'fields'    => array(
            array(
              'id'    => 'address_location',
              'type'  => 'text',
              'title' => esc_html__('Actual Address', 'restocore'),
              'multilang'	=> true,
            ),
            array(
              'id'    => 'address_notes',
              'type'  => 'text',
              'title' => esc_html__('Address Notes', 'restocore'),
              'multilang'	=> true,              
            ),
            array(
              'id'    => 'google_map_location',
              'type'  => 'text',
              'title' => esc_html__( 'Google Map Location', 'restocore' ),
              'default'	=> '40.715028, -74.017775',
            ),
             array(
              'id'    => 'google_map_zoom',
              'type'  => 'text',
              'title' => esc_html__( 'Google Map Zoom Level', 'restocore' ),
              'info'  => esc_html__( 'Diapason from 3 to 20', 'restocore' ),
              'default'	=> '12',
            ),            
             array(
              'id'    => 'google_map_api',
              'type'  => 'text',
              'title' => esc_html__( 'Google Map API', 'restocore' ),
              'info'  => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Get API Key</a>',
            ),    
            array(
              'id'    => 'open_table_id',
              'type'  => 'text',
              'title' => esc_html__( 'Open Table Restaurant ID', 'restocore' ),
            ),    
          ),                 
        ),
        
		array(
          'id'        => 'fieldset_phones',
          'type'      => 'fieldset',
          'title'     => esc_html__( 'Phone Numbers', 'restocore' ),
          'fields'    => array(
            array(
              'id'    => 'phone_1',
              'type'  => 'text',
              'title' => esc_html__('Phone', 'restocore') . ' 1',
            ),
            array(
              'id'    => 'phone_2',
              'type'  => 'text',
              'title' => esc_html__('Phone', 'restocore') . ' 2',
            ),
            array(
              'id'    => 'phone_3',
              'type'  => 'text',
              'title' => esc_html__('Phone', 'restocore') . ' 3',
            ),   
            array(
              'id'    => 'phone_4',
              'type'  => 'text',
              'title' => esc_html__('Phone', 'restocore') . ' 4',
            ),                              
          ),
          'default'   => array(
	          'phone_1' => '+38 (012) 34 56 789',
			  ),
        ),
        
		array(
          'id'        => 'fieldset_hours',
          'type'      => 'fieldset',
          'title'     => esc_html__( 'Working Hours', 'restocore' ),
          'fields'    => array(
            array(
              'id'    => 'hours_1',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 1',
 			  'multilang' => true,
            ),
            array(
              'id'    => 'hours_2',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 2',
			  'multilang' => true,
            ),
            array(
              'id'    => 'hours_3',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 3',
			  'multilang' => true,
            ),     
            array(
              'id'    => 'hours_4',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 4',
			  'multilang' => true,
            ),      
            array(
              'id'    => 'hours_5',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 5',
			  'multilang' => true,
            ),     
            array(
              'id'    => 'hours_6',
              'type'  => 'text',
              'title' => esc_html__('Row', 'restocore') . ' 6',
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
  'title'    => esc_html__('Social Networks', 'restocore'),
  'icon'     => 'fa fa-globe',
  'fields' => array(
	  
		array(
          'id'        => 'fieldset_social',
          'type'      => 'fieldset',
          'title'     => esc_html__( 'Social Networks', 'restocore' ),
          'fields'    => array(
            array(
              'id'    => 'facebook',
              'type'  => 'text',
              'title' => 'Facobook',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),            
            ),
            array(
              'id'    => 'twitter',
              'type'  => 'text',
              'title' => 'Twitter',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),
            array(
              'id'    => 'linkedin',
              'type'  => 'text',
              'title' => 'LinkedIn',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),            
            array(
              'id'    => 'google-plus',
              'type'  => 'text',
              'title' => 'Google Plus',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),
            array(
              'id'    => 'youtube-play',
              'type'  => 'text',
              'title' => 'YouTube',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),                     
            array(
              'id'    => 'vk',
              'type'  => 'text',
              'title' => 'Vkontakte',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),
             array(
              'id'    => 'instagram',
              'type'  => 'text',
              'title' => 'Instagram',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),  
             array(
              'id'    => 'pinterest',
              'type'  => 'text',
              'title' => 'Pinterest',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),   
             array(
              'id'    => 'tripadvisor',
              'type'  => 'text',
              'title' => 'TripAdvisor',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),
			 array(
              'id'    => 'yelp',
              'type'  => 'text',
              'title' => 'Yelp',
	          'attributes'    => array(
	            'placeholder' => esc_html__( 'Social Url', 'restocore' ),
	          ),               
            ),                                                                   
          ),
        ),
	),	  
);

$admin_email = get_option('admin_email');

$options[]   = array(
	'name'     => 'forms',
	'title'    => esc_html__('Website Forms', 'restocore'),
	'icon'     => 'fa fa-wpforms',
	'fields' => array(
		array(
			'type'		=> 'heading',
			'content'	=> esc_html__('Contact Form', 'restocore'),
		),
		array(
			'id'	=> 'contact_form_email',
			'type'	=> 'text',
			'title'	=> esc_html__('Send To Email Address', 'restocore'),
			'attributes' => array(
				'placeholder' => $admin_email,
			),
			'info'	=> esc_html__('Defaults to your current email address.', 'restocore'),
		),
		array(
			'type'		=> 'heading',
			'content'	=> esc_html__('Reservation Form', 'restocore'),
		),		
		array(
			'id'	=> 'reservation_form_email',
			'type'	=> 'text',
			'title'	=> esc_html__('Send To Email Address', 'restocore'),
			'attributes' => array(
				'placeholder' => $admin_email,
			),
			'info'	=> esc_html__('Defaults to your current email address.', 'restocore'), 		
		),
		array(
			'id'	=> 'guest_number',
			'type'	=> 'number',
			'title'	=> __('Max Guest Number', 'restocore'),
			'default'	=> '10',
			'attributes'	=> array(
				'min'	=> 1,
			),
			
		),
		array(
			'type'		=> 'heading',
			'content'	=> esc_html__('Signature', 'restocore'),
		),	
		array(
			'id'	=> 'email_signature',
			'type'	=> 'textarea',
			'attributes'	=> array(
				'rows'	=> 18,
			),
			'info' => esc_html__('Signature is displayed in the reservation email copy that goes to the client.', 'restocore'),
		),		
	),
);

$curency_symbol = cs_get_option('dishes_menu_currency');
if(!$curency_symbol){
	$curency_symbol = '$';
}
$options[]   = array(
	'name'	=> 'menu_section',
	'title'	=> esc_html__('Dishes Menu', 'restocore'),
	'icon'	=> 'fa fa-cutlery',
	'fields' => array(
		array(
			'id'		=> 'dishes_menu_currency',
			'type'		=> 'text',
			'title'		=> esc_html__('Currency Symbol', 'restocore'),
			'default'	=> '$',
		),
		array(
			'id'		=> 'dishes_menu_currency_position',
			'type'		=> 'select',
			'title'		=> esc_html__('Currency Position', 'restocore'),			
			'options'	=> array(
				'left' 			=> esc_html__('Left', 'restocore') . ' (' . $curency_symbol . '99.99)',
				'right' 		=> esc_html__('Right', 'restocore') . ' (99.99' . $curency_symbol . ')',
				'left_space'	=> esc_html__('Left with Space', 'restocore') . ' (' . $curency_symbol . ' 99.99)',
				'right_space'	=> esc_html__('Right with Space', 'restocore') .  ' (99.99 ' . $curency_symbol . ')',
			),
			'default'	=> 'left',
			'info'		=> esc_html__('Please select the position of the currency symbol.','realty-core'),			
		),
	),
);
if(class_exists('woocommerce')) {
	$options[]   = array(
		'name'     => 'woocommerce',
		'title'    => esc_html__('WooCommerce', 'restocore'),
		'icon'     => 'fa fa-shopping-cart',
		'sections'	=> array(
			array(
				'name'	=> 'product_list_section',
				'title'	=> __('Catalog Page', 'restocore'),
				'icon'	=> 'fa fa-minus',		
				'fields'=> array(
					array(
						'type'		=> 'heading',
						'content'	=> __('Catalog Page Settings', 'restocore'),
					),	
					array(
						'id'	=> 'products_per_page',
						'title'	=> __('Products per page', 'oregano'),
						'type'	=> 'number',
						'after'	=> __('product items', 'oregano'),
						'default'	=> get_option('posts_per_page'),
						'attributes' => array(
							'style'	=> 'width: 65px; margin-right: 5px;',
						),
					),
					array(
						'type'		=> 'heading',
						'content'	=> __('Sidebar', 'oregano'),
					),
					array(
						'id'	=> 'product_catalog_sidebar',
						'title'	=> __( 'Set Product Catalog Sidebar', 'oregano' ),
						'type'	=> 'select',
						'options' => array(
							'no-sidebar'	=> __( 'No Sidebar', 'oregano' ),
							'left-sidebar'	=> __( 'Left Sidebar', 'oregano' ),
							'right-sidebar'	=> __( 'Right Sidebar', 'oregano' ),
						),
						'default' => 'no-sidebar',
					),													
				),		
			),
			array(
				'name'	=> 'single_product_section',
				'title'	=> __('Single Product', 'restocore'),
				'icon'	=> 'fa fa-minus',
				'fields'=> array(
					array(
						'type'		=> 'heading',
						'content'	=> __('Single Product Settings', 'restocore'),
					),	
					array(
						'id'	=> 'related_products_number',
						'title'	=> 'Number of Related Products',
						'type'	=> 'number',
						'attributes'	=> array(
							'min'	=> '2',
						),	
						'default'	=> '3',
					),	
					array(
						'type'		=> 'heading',
						'content'	=> __('Sidebar', 'oregano'),
					),										
					array(
						'id'	=> 'single_product_sidebar',
						'title'	=> __( 'Set Product Catalog Sidebar', 'oregano' ),
						'type'	=> 'select',
						'options' => array(
							'no-sidebar'	=> __( 'No Sidebar', 'oregano' ),
							'left-sidebar-sp'	=> __( 'Left Sidebar', 'oregano' ),
							'right-sidebar-sp'	=> __( 'Right Sidebar', 'oregano' ),
						),
						'default' => 'no-sidebar',
					),
								
				),				
			),			
		    array(
				'name'		=> 'checkout_section',
				'title'		=> __('Checkout Page', 'restocore'),
				'icon'		=> 'fa fa-minus',
				'fields' => array(
					array(
						'type'		=> 'heading',
						'content'	=> esc_html__('Shopping Cart', 'restocore'),
					),
					array(
						'id'	=> 'wc_shoping_cart_min',
						'type'	=> 'switcher',
						'title' => esc_html__('Shopping Cart on Header', 'restocore'),
					),
					array(
						'type'		=> 'heading',
						'content'	=> esc_html__('Checkout Billing Fields', 'restocore'),
					),	
					array(
						'id'	=> 'wc_billing_last_name',
						'title'	=> esc_html__('Last Name Field', 'restocore'),
						'type'	=> 'switcher',
					),
					array(
						'id'	=> 'wc_billing_company',
						'title'	=> esc_html__('Company Field', 'restocore'),
						'type'	=> 'switcher',
					),	
					array(
						'id'	=> 'wc_billing_country',
						'title'	=> esc_html__('Country Field', 'restocore'),
						'type'	=> 'switcher',
					),
					array(
						'id'	=> 'wc_billing_state',
						'title'	=> esc_html__('State Field', 'restocore'),
						'type'	=> 'switcher',
					),
					array(
						'id'	=> 'wc_billing_postcode',
						'title'	=> esc_html__('Post Code Field', 'restocore'),
						'type'	=> 'switcher',
					),
					array(
						'id'	=> 'wc_billing_city',
						'title'	=> esc_html__('City Field', 'restocore'),
						'type'	=> 'switcher',
					),				
				),				
			),		
		),

	);
}
$options[]   = array(
	'name'     => 'backup_section',
	'title'    => 'Backup',
	'icon'     => 'fa fa-shield',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'restocore'),
		),	
		array(
			'type'    => 'backup',
		),
	)
);


CSFramework::instance( $settings, $options );
