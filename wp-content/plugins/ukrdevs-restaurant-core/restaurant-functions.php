<?php
/* SECTION TITLE
---------------------------------------------------------------- */
if( ! function_exists('cristiano_section_title_template') ) {
	function cristiano_section_title_template($title, $subtitle = NULL) {
		set_query_var( 'section_title', $title );
		set_query_var( 'section_subtitle', $subtitle );		
		get_template_part( 'template-parts/section-titles/section-title', cs_get_customize_option('heading_style','v1') );	
	}
}
	
function restaurantcore_activate() {	
	if ( version_compare( get_bloginfo('version'), '4.5', '<' ) ) {
		wp_die( esc_html__( 'You must have a minimum version of 4.5 to use this plugin', 'restocore') );
	}
	$args = array(
		'codestar-framework/cs-framework.php',
		'cristiano-shortcodes/index.php',
		'cristiano-dishes-menu/index.php',	
		'cristiano-promo-slider/index.php',	
		'cristiano-contact-form/index.php',
	);	
	deactivate_plugins($args);
	delete_plugins($args);
}

function restocore(){
	return true;
}

/* SHOW GOOGLE MAP
---------------------------------------------------------------- */
if( ! function_exists('restocore_google_map') ) {
	function restocore_google_map() {
		$google_map = restocore_get_meta_data('google_map_switcher');
		if( !empty($google_map) ){
			get_template_part( 'template-parts/part', 'google_map' );
		}
	}
}

/* SHOW WC GOOGLE MAP
---------------------------------------------------------------- */
if( ! function_exists('restocore_wc_google_map') ) {
	function restocore_wc_google_map() {
		$post_meta = get_post_meta( get_option( 'woocommerce_shop_page_id' ), '_custom_page_options', true );
		if(!empty($post_meta['google_map_switcher'])) {
			get_template_part( 'template-parts/part', 'google_map' );
		}
	}
}

/* LAYOUT WIDE / BOXED
---------------------------------------------------------------- */
if( ! function_exists('cristiano_site_layout') ) {
	function cristiano_site_layout(){
		$site_layout = cs_get_option( 'ukrdevs_site_layout' );
		$page_layout = restocore_get_meta_data('ukrdevs_page_layout');
		if( !$page_layout || $page_layout == 'default' ) {
			echo esc_attr( $site_layout );
		} else {
			echo esc_attr( $page_layout );
		}
	}
}
add_action('cristiano_site_layout', 'cristiano_site_layout');

if( ! function_exists('cristiano_wc_site_layout') ) {
	function cristiano_wc_site_layout(){
		$site_layout = cs_get_option( 'ukrdevs_site_layout' );
		$post_meta = get_post_meta( get_option( 'woocommerce_shop_page_id' ), '_custom_page_options', true );
		if(!empty($post_meta['ukrdevs_page_layout'])) {
			$page_layout = $post_meta['ukrdevs_page_layout'];
		}
		if( !$page_layout || $page_layout == 'default' ) {
			echo esc_attr( $site_layout );
		} else {
			echo esc_attr( $page_layout );
		}
	}
}
add_action('cristiano_wc_site_layout', 'cristiano_wc_site_layout');


/* GET THEME OPTION
---------------------------------------------------------------- */
if( ! function_exists('restocore_option') ) {
	function restocore_option($id, $default = NULL) {
		$option = cs_get_option($id);
		if(is_string($option)) {
			return $option;
		}	
		if(function_exists('icl_object_id') && is_array($option)) {
			if(function_exists('pll_current_language')) {
				$lang = pll_current_language('slug');
				return $option[$lang];
			}
			return $option[ICL_LANGUAGE_CODE];
		}
		if(!function_exists('icl_object_id') && is_array($option)) {
			return reset($option);
		}	
		return $default;
	}
}
/* GET META DATA / $arg = METABOX ID
---------------------------------------------------------------- */
if( ! function_exists('restocore_get_meta_data') ) {
	function restocore_get_meta_data( $arg, $default = NULL ){
		$meta_data = get_post_meta( get_queried_object_id(), '_custom_page_options', true );
		if( !empty($meta_data[$arg]) ) {
			return $meta_data[$arg];
		} 
		return $default;
	}
}
if( ! function_exists('restocore_wc_get_meta_data') ) {
	function restocore_wc_get_meta_data( $arg, $default = NULL ){
		$meta_data = get_post_meta( get_option( 'woocommerce_shop_page_id' ), '_custom_page_options', true );
		if( !empty($meta_data[$arg]) ) {
			return $meta_data[$arg];
		}	
		return $default;		
	}
}

// WOOCOMMERCE - SHOW NAVIGATION FOR SINGLE PRODUCT
if( ! function_exists('restocore_products_nav') ) {

	function restocore_products_nav() {
		$prev_post = get_previous_post();
			$next_post = get_next_post();
		if(!empty($prev_post)) { ?>
			<a class="product-nav next-product" href="<?php echo get_permalink($prev_post->ID); ?>"><i class="fa fa-caret-right"></i></a>
		<?php }
		if(!empty($next_post)) { ?>
			<a class="product-nav prev-product" href="<?php echo get_permalink($next_post->ID); ?>"><i class="fa fa-caret-left"></i></a>
		<?php }
	}
}

/* BACKGROUND PATTERN
---------------------------------------------------------------- */
if( ! function_exists('restocore_bg_pattern') ) {
	function restocore_bg_pattern( $classes ){
		$site_layout = cs_get_option( 'ukrdevs_site_layout' );	
		$page_layout = restocore_get_meta_data('ukrdevs_page_layout');
		$page_layout_wc = restocore_wc_get_meta_data('ukrdevs_page_layout');
		if( $site_layout == 'boxed' && $page_layout !== 'wide' || $page_layout == 'boxed') {
			$bg_pattern = cs_get_option( 'ukrdevs_bg_pattern' );
			$classes[] = $bg_pattern;		
		}
		return $classes;
	}
}


/* !!! DEPRECATED !!!
---------------------------------------------------------------- */
function restocore_page_header() {
	return;
}
/* PRESENTATION SLIDER
---------------------------------------------------------------- */
function restocore_slider() {
	return;
}

/* SHOW SOCIAL LINKS
---------------------------------------------------------------- */
if( ! function_exists('restocore_social') ) {
	function restocore_social(){
		$socials = cs_get_option( 'fieldset_social' );
		if( is_array( $socials ) ) {
			foreach( $socials as $class => $url  ) {
				if($url): ?>
					<a class="fa fa-<?php echo esc_attr($class) ?>" href="<?php echo esc_url( $url ) ?>" target="blank"></a>
				<?php endif;
			}
		}
	}
}
add_action( 'restocore_social', 'restocore_social' );



/* SHOW ADDRESS
---------------------------------------------------------------- */
if( ! function_exists('restocore_address') ) {
	function restocore_address( $tag = NULL ){
		$address = cs_get_option( 'address_location' );
		if( isset($address) ) {
			if( isset($tag) ) {
				echo "<$tag>" .  esc_html( $address )  . "</$tag>";
			} else {
				echo esc_html( $address );			
			}
		}
	}
}

/* SHOW MOBILE NUMBER
---------------------------------------------------------------- */
if( ! function_exists('restocore_mobile_number') ) {
	function restocore_mobile_number( $tag = NULL ){
		$phone_number_fieldset = cs_get_option( 'fieldset_phones' );
		$phone_number = $phone_number_fieldset['phone_1'];
		if( isset($phone_number) ) {
			if( isset($tag) ) {
				echo "<$tag><a href='tel:$phone_number'>" . esc_html($phone_number) . "</a></$tag>";
			} else {
				echo esc_html($phone_number);			
			}
		}
	}
}

/* SHOW MOBILE NUMBERS in tag <li>
---------------------------------------------------------------- */
if( ! function_exists('restocore_mobile_numbers') ) {
	function restocore_mobile_numbers(){
		$phones = cs_get_option( 'fieldset_phones' );
		if( is_array( $phones ) ) {
			foreach( $phones as $phone ) {
				if($phone) {
					echo '<li><a href="tel:' . $phone .'">' . esc_html( $phone ) . '</a></li>';
				}
			}
		}
	}
}

/* SHOW WORKING HOURS
---------------------------------------------------------------- */
if( ! function_exists('restocore_working_hours') ) {
	function restocore_working_hours(){
		$hours = cs_get_option( 'fieldset_hours' );
		if( is_array( $hours ) ) {
			foreach( $hours as $hour ) {
				if(is_string($hour)) {
					echo '<li class="hours">' . esc_html( $hour ) . '</li>';					
				}
				if(function_exists('icl_object_id') && is_array($hour)) {
					echo '<li class="hours">' . esc_html( $hour[ICL_LANGUAGE_CODE] ) . '</li>';	
				}
				if(!function_exists('icl_object_id') && is_array($hour)){
					echo '<li class="hours">' . esc_html( reset($hour) ) . '</li>';						
				}
			}
		}
	}
}

//PHP ot JS DATE FORMAT
function restocore_format_php_to_js( $dateFormat ) {
	$chars = array(
		// Day
		'd' => 'dd',
		'j' => 'd',
		'l' => 'DD',
		'D' => 'D',
		// Month
		'm' => 'mm',
		'n' => 'm',
		'F' => 'MM',
		'M' => 'M',
		// Year
		'Y' => 'yy',
		'y' => 'y',
	);
	return strtr( (string) $dateFormat, $chars );
}