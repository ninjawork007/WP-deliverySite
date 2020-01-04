<?php
	
/* GET PAGE META
---------------------------------------------------------------- */
function cristiano_get_page_meta( $arg, $default = null ){
	$meta_data = get_post_meta( get_queried_object_id(), '_custom_page_options', true );
	if( !empty($meta_data[$arg]) ) {
		return $meta_data[$arg];
	} else {
		return $default;
	}
}	


function cristiano_lang_switcher(){
	if ( function_exists('pll_the_languages') ) {
		$args = array(
			'show_names' => 0,
			'show_flags' => true,
		);
		echo '<ul class="lang-switch">';
		pll_the_languages( $args );
		echo '</ul>';
	}

}
	

/* SHOPPING CART
---------------------------------------------------------------- */
function cristiano_shopping_cart(){
	if(!cs_get_customize_option('wc_shoping_cart_min') && cristiano_is_wc_activated()){
		?>
		<div class="shopping-cart">
			<div class="cart-listener">
				<?php cristiano_cart_link(); ?>
			</div>
			<div class="header-mini-cart">
				<p class="cart-links">
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><i class="fa fa-user-circle-o"></i><?php echo (is_user_logged_in()) ? wp_get_current_user()->user_login : esc_html_e('Sign In', 'cristiano'); ?></a>
					<a href="<?php echo get_permalink( get_option('woocommerce_cart_page_id') ); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i><?php esc_html_e('View cart', 'cristiano'); ?></a>
					<a class="close-cart fa fa-times"></a>
				</p>
				<?php the_widget( 'WC_Widget_Cart' ); ?>		
			</div>		
		</div>		
		<?php
	}
}

/* GET PRODUCT META
---------------------------------------------------------------- */
function cristiano_get_product_meta($section = NULL, $data = NULL){
	$post_meta = get_post_meta( get_the_ID(), $section, true );
	if($post_meta) {
		return $post_meta[$data];
	}
}



/* GET BLOG PAGE META
---------------------------------------------------------------- */
function cristiano_get_blog_page_meta( $arg, $default = null ){
	$meta_data = get_post_meta( get_option( 'page_for_posts' ), '_custom_page_options', true );
	if( !empty($meta_data[$arg]) ) {
		return $meta_data[$arg];
	} else {
		return $default;
	}
}

/* GET WOCOMMERCE SHOP META DATA / $arg = METABOX ID
---------------------------------------------------------------- */
function cristiano_get_wc_page_meta( $arg, $default = null ){
	$meta_data = get_post_meta( get_option( 'woocommerce_shop_page_id' ), '_custom_page_options', true );
	if( !empty($meta_data[$arg]) ) {
		return $meta_data[$arg];
	} else {
		return $default;
	}
}

/* DAILY MENU
---------------------------------------------------------------- */
function cristiano_today_cat(){
	$cat_args = array(
		'taxonomy'	=> 'dishes_categories',
		'parent'	=> 0,
	);
	$categories = get_categories( $cat_args );
	$today = date('N', current_time('timestamp', 1)) - 1;
	$today_cat = $categories[$today];
	return $today_cat;
}

function cristiano_menu_cat_title(){
	if(!cs_get_option('daily_menu')){
		return single_term_title('', false);
	}	
	if(cristiano_today_cat()->name == single_term_title('', false)) {
		return esc_html("Today's Menu", 'cristiano');
	} 
	else {
		single_term_title();
	}
}
add_filter( 'nav_menu_link_attributes', 'cristiano_daily_menu_href', 10, 3 );
function cristiano_daily_menu_href( $atts, $item, $args ) {  
    if($item->object_id == cs_get_option('menu_page')) {
		$atts['href'] = get_category_link(cristiano_today_cat()->term_id);
    }
    return $atts;
}		

/* SIDEBAR POSITION
---------------------------------------------------------------- */
function cristiano_has_sidebar( $classes ) {
	if(is_singular('post')) {
		$classes[] = cs_get_option('single_post_sidebar_position', 'right-sidebar');
	} else {
		$classes[] = cristiano_get_page_meta('sidebar_position');
	}
    return $classes;
}
add_filter( 'body_class', 'cristiano_has_sidebar' );


/* PARALLAX EFECT
---------------------------------------------------------------- */
function cristiano_parallax(){
	return (cs_get_option('dzsparallaxer') ? 'dzsparallaxer auto-init height-is-based-on-content use-loading' : 'simple-parallax');
}
	
/* CROOKED ELLEMENTS
---------------------------------------------------------------- */
function cristiano_transform_rotate(){
	$a = rand(1,2) . 'deg';
	$b = rand(0,1) == 1;
	if($b == false) {
		echo 'style="transform: rotate(-' . $a .')"';
	} else {
		echo 'style="transform: rotate('. $a .')"';
	}
}

/* DYNAMIC SHADOW
---------------------------------------------------------------- */
function cristiano_dynamic_shadow(){
	$shadow = cs_get_customize_option('shadow');
	if(empty($shadow)) {
		return;
	}	
	echo 'dynamic-shadow';
}

/* SECTION TITLE
---------------------------------------------------------------- */
if( ! function_exists('cristiano_section_title_template') ) {
	function cristiano_section_title_template($title, $subtitle = NULL) {
		set_query_var( 'section_title', $title );
		set_query_var( 'section_subtitle', $subtitle );		
		get_template_part( 'template-parts/section-titles/section-title', cs_get_customize_option('heading_style','v1') );	
	}
}

/* MOBILE TOP BAR
---------------------------------------------------------------- */
function cristiano_top_bar_mobile( $classes ) {
    if ( cs_get_option('show_top_bar_mobile', NULL) ) {
        $classes[] = 'mobile-top-bar';
    }
    return $classes;
}
add_filter( 'body_class', 'cristiano_top_bar_mobile' );


/* EXECLUDE CHILDREN
---------------------------------------------------------------- */
function cristiano_exclude_children($wp_query) {
    if ( isset ( $wp_query->query_vars['dishes_categories'] ) ) {
        $wp_query->set('tax_query', array( 
        	array (
	            'taxonomy' => 'dishes_categories',
	            'field' => 'slug',
	            'terms' => $wp_query->query_vars['dishes_categories'],
	            'include_children' => false,
			))
       );
    }
    if( is_tax('dishes_categories')) {
        $wp_query->set('posts_per_page', -1);
    }    
}  

/* POST CAT IMAGE
---------------------------------------------------------------- */
function restocore_get_post_cat_img(){
	$term_data = get_term_meta( get_queried_object()->term_id, '_restocore_category_taxonomy_options', true );
	if( !empty($term_data) ) {
		$img_id = $term_data['restocore_post_cat_img'];
		$img = wp_get_attachment_image_src($img_id, 'custom-header' );	
		return $img[0];			
	}
}

/* WOOCOMMERCE PAGE HEADER
---------------------------------------------------------------- */
function cristiano_header_image_wc() {
	if( is_product_category() && cristiano_wc_cat_img()) {
		echo cristiano_wc_cat_img();
	}
	elseif( has_post_thumbnail(get_option( 'woocommerce_shop_page_id' )) ){
		echo get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' ) );		
	} else {
		header_image();
	}
}
/* PAGE HEADER IMAGE
---------------------------------------------------------------- */
function cristiano_header_image() {
	if(has_post_thumbnail( get_queried_object_id() )) {
		echo get_the_post_thumbnail_url( get_queried_object_id() );
	} else {
		header_image();
	}
}

/* MAIL FORM: FROM NAME
---------------------------------------------------------------- */
function cristiano_from_mail_name() {
	return get_bloginfo( 'name' );
}

/* UNSET URL FROM COMMENT FORM
---------------------------------------------------------------- */
function cristiano_comment_form_fields( $fields ) {
    unset($fields['url']);
	return $fields;
}
/* EXCERPT/CONTENT AUTO DETECT
---------------------------------------------------------------- */
function cristiano_excerpt_content(){
	global $post;
	if (strpos($post->post_content, '<!--more-->')) {
		the_content();
	}
	else {
		the_excerpt();
	}
}
/* REMOVE MORE LINK
---------------------------------------------------------------- */
function cristiano_remove_more_link() {
	return;
}
/* EXCERPT LENGTH
---------------------------------------------------------------- */
function cristiano_excerpt_length( $length ) {
	return 30;
}
/* EXCERPT
---------------------------------------------------------------- */
function cristiano_excerpt_more(){
	return '...';
}
/* !!! DEPRICATED !!!
---------------------------------------------------------------- */
function cristiano_header(){
	return;
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

if( ! function_exists('cristiano_header_class') ) {
	function cristiano_header_class(){
		$transparent_header = cs_get_customize_option( 'transparent_header', cs_get_option('transparent_header') );
		$page_treansparent_header = (cristiano_wc_page()) ? restocore_wc_get_meta_data('transparent_header'): restocore_get_meta_data('transparent_header');	
		$page_header 			  = (cristiano_wc_page()) ? restocore_wc_get_meta_data('page_header') 		: restocore_get_meta_data('page_header');
		if($transparent_header == true && $page_header != 'title' && $page_treansparent_header != 'off' || $page_treansparent_header == 'on' && $page_header != 'title') {
			echo 'transparent-header sticky-tr';
		} else {
			echo 'sticky';
		}
	}
}
add_action( 'cristiano_header_class', 'cristiano_header_class' );


	function cristiano_wc_page () {
	    if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
	            return true;
	    }
	    $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
	                                    "woocommerce_terms_page_id" ) ;
	    foreach ( $woocommerce_keys as $wc_page_id ) {
            if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                    return true ;
            }
	    }
	    return false;
	}

if (!function_exists('cs_get_option')){
	function cs_get_option($data, $default = ''){
		return $default;
	}
}
if (!function_exists('cs_get_customize_option')){
	function cs_get_customize_option($data, $default = ''){
		return $default;
	}
}
if (!function_exists('restocore_get_meta_data')){
	function restocore_get_meta_data($data, $default = ''){
		return $default;
	}
}
if (!function_exists('restocore_wc_get_meta_data')){
	function restocore_wc_get_meta_data($data, $default = ''){
		return $default;
	}
}
if (!function_exists('restocore_link_to_product')){
	function restocore_link_to_product(){
		return;
	}
}

function cristiano_social_share(){
	if(cs_get_option('wc_social_sharing', null) == null) {
		return;
	}
	$networks = cs_get_option('social_sharing_networks');	
	$page_id = get_queried_object_id();
	$post = get_post($page_id);	
	$thumbnail_id = get_post_thumbnail_id($page_id);	
	$img_url = wp_get_attachment_image_url($thumbnail_id, 'full');	
	$post_title = $post->post_title;
	$post_content = $post->post_content . ' ' . $post->post_excerpt;
	
	echo '<ul class="cristiano-social-share">';
		foreach($networks as $network) {
			$link = get_permalink($page_id);
			switch($network) {
				case 'facebook':
					$share = 'https://www.facebook.com/sharer/sharer.php?u=' . $link;
					break;
				case 'twitter':
					$share = "https://twitter.com/intent/tweet?url=$link&text=" . urlencode($post_content);
					break;			
				case 'google':
					$share = 'https://plus.google.com/share?url=' . $link;
					break;
				case 'linkedin':
					$share = 'http://www.linkedin.com/shareArticle?mini=true&url=' . $link;
					break;
				case 'tumblr':
					$share = "http://www.tumblr.com/share?v=3&u=$link&t=". urlencode($post_content);
					break;		
				case 'pinterest':
					$share = "https://www.pinterest.com/pin/create/button/?url=$link&media=$img_url&description=" . urlencode($post_title);				
			}
			echo "<li><a class='fa fa-$network' target='_blank' href='$share' title='$network'></a></li>";
		} 	
	echo '</ul>';
}
add_action( 'woocommerce_share', 'cristiano_social_share' );


