<?php

/* ADMIN/FRONT - Image size update on theme activation --- FILTER
---------------------------------------------------------------- */	
function cristiano_wc_image_dimensions() { 
	update_option( 'shop_catalog_image_size',	array('width' => '370', 'height' => '247', 'crop' => 1) ); // Product Catalog thumbs
	update_option( 'shop_single_image_size',  	array('width' => '585', 'height' => '390', 'crop' => 1) ); // Single Product image
	update_option( 'shop_thumbnail_image_size', array('width' => '120', 'height' => '80',  'crop' => 1) ); // Image Gallery thumbs
}

/* FRONT - HEADER ---  Cart --- FUNCTION
---------------------------------------------------------------- */
function cristiano_cart_link() {
	get_template_part( 'template-parts/woocommerce', 'header_cart' );
}

/* FRONT - HEADER ---  Ajax Cart Update --- FILTER
---------------------------------------------------------------- */
function cristiano_cart_link_fragment( $fragments ) {
	ob_start();
	cristiano_cart_link();
	$fragments['.cart-link'] = ob_get_clean();
	return $fragments;
}

/* WOOCOMMERCE SIDEBAR POSITION
---------------------------------------------------------------- */
function cristiano_has_wc_sidebar( $classes ) {
	if(is_singular('product')) {
		$classes[] = cs_get_option('single_product_sidebar_position', 'no-sidebar');
		
	} elseif(is_shop() || is_product_category()) {
		$classes[] = cristiano_get_wc_page_meta('sidebar_position');	
	}
	return $classes;
}
add_filter( 'body_class', 'cristiano_has_wc_sidebar' );

/* ADMIN - PRODUCT PAGE ---  Product Short Description --- FILTER
---------------------------------------------------------------- */
function cristiano_wc_short_description_settings( $settings ) {
    $settings = array(
		'media_buttons' => false,
		'tinymce' => false,
		'quicktags' => false,
		'teeny' => false,
	);
    return $settings;
}

/* FRONT - PRODUCT PAGE ---  RELATED PRODUCT SHOW --- FILTER
---------------------------------------------------------------- */
function cristiano_related_products_show( $args ) {
	$args['posts_per_page'] = cs_get_option('related_products_number', '3');
	return $args;
}

/* FRONT - PRODUCT ARCHIVE --- Product Categories Image  --- FUNCTION
---------------------------------------------------------------- */	
function cristiano_woocommerce_subcategory_thumbnail( $category ) {
	$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true  );
	$title = get_cat_name($category->term_id);
	if($thumbnail_id) {
		$image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'cristiano_categories', $icon = false );
		$image = $image_attributes[0];
		$width = $image_attributes[1];
		$height = $image_attributes[2];
	} else {
		$image = wc_placeholder_img_src();
		$width = '270';
		$height= '405';
	}
	echo "<img alt='$title' src='$image' width='$width' height='$height'> ";
}
function cristiano_wc_cat_img($cat = null){
	$cat = (isset($cat)) ? $cat : get_queried_object_id();
	$term_data = get_term_meta( $cat, '_restocore_wc_product_cat', true );
	if( !empty($term_data) ) {
		$img_id = $term_data['restocore_wc_cat_header_img'];
		$img = wp_get_attachment_image_src($img_id, 'custom-header' );	
		return $img[0];			
	}
}

/* FRONT - STYLES --- WooCommerce CSS --- Filter
---------------------------------------------------------------- */
function cristiano_unset_wc_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );		// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );			// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

/* FRONT - PRODUCT ARCHIVE --- Product Short Description  --- FILTER
---------------------------------------------------------------- */	
function cristiano_ing_in_product_archives() {
    the_excerpt();
}

/* FRONT - CHECKOUT PAGE --- Billing & Shipping Fields --- FILTER
---------------------------------------------------------------- */
function cristiano_override_checkout_fields( $fields ) {
	if(cs_get_option('wc_billing_last_name') == NULL){
    	unset( $fields['billing']['billing_last_name'] );	
	}
	if(cs_get_option('wc_billing_country') == NULL){
    	unset( $fields['billing']['billing_country'] );	
	}	
	if(cs_get_option('wc_billing_company') == NULL){
    	unset( $fields['billing']['billing_company'] );	
	}	
	if(cs_get_option('wc_billing_state') == NULL){
    	unset( $fields['billing']['billing_state'] );	
	}
	if(cs_get_option('wc_billing_postcode') == NULL){
    	unset( $fields['billing']['billing_postcode'] );	
	}		
	if(cs_get_option('wc_billing_city') == NULL){
    	unset( $fields['billing']['billing_city'] );	
	}
    return $fields;
}

function cristiano_override_shipping_fields( $fields ) {    
	if(is_checkout()) {
	  	if(cs_get_option('wc_billing_last_name') == NULL){
	    	unset( $fields['shipping_last_name'] );	
		}
		if(cs_get_option('wc_billing_country') == NULL){
	    	unset( $fields['shipping_country'] );	
		}	
		if(cs_get_option('wc_billing_company') == NULL){
	    	unset( $fields['shipping_company'] );	
		}	
		if(cs_get_option('wc_billing_state') == NULL){
	    	unset( $fields['shipping_state'] );	
		}
		if(cs_get_option('wc_billing_postcode') == NULL){
	    	unset( $fields['shipping_postcode'] );	
		}		
		if(cs_get_option('wc_billing_city') == NULL){
	    	unset( $fields['shipping_city'] );	
		}  
	}
    return $fields;
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



/* FRONT -> CATALOG/PRODUCT ---  IMAGE PLACEHOLDER --- FILTER
---------------------------------------------------------------- */
function cristiano_placeholder() {
  	add_filter('woocommerce_placeholder_img_src', 'cristiano_wc_placeholder_img_src');
	function cristiano_wc_placeholder_img_src( $src ) {
		return get_template_directory_uri() . '/assets/images/placeholder.jpg';
	}
}

/* PRODUCT SUBCATEGORIES TABS
---------------------------------------------------------------- */
function cristiano_shop_subcat(){
	$subcat_ids = get_term_children(get_queried_object_id(), 'product_cat'); 
	
	if(!empty($subcat_ids)) {
		$subcats_args = array(
			'taxonomy'	=> 'product_cat',
			'include'	=> $subcat_ids,
		);
		$subcats = get_terms( $subcats_args );
		$cols = 'cols-' . count($subcats);
		if($subcats){
			wc_get_template('cristiano_content-product_subcat.php', array('subcats' => $subcats, 'cols' => $cols));
		}						
	}
}

function cristiano_shop_is_not_children_cat() {
	$subcat_ids = get_term_children(get_queried_object_id(), 'product_cat');	
	if(!empty($subcat_ids)) {
		return false;
	}
	return true;
}

/* VIEW CART BUTTON
---------------------------------------------------------------- */
if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {

	/**
	 * Output the view cart button.
	 */
	function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button view-cart wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
	}
}

/* ADMIN -> PRODUCT ---  Remove Gallery Metabox --- FUNCTION
---------------------------------------------------------------- */
function cristiano_wc_remove_metaboxes() {
	remove_meta_box( 'woocommerce-product-images', 'product' ,'side' ); // Remove Product Gallery Metabox
}

function cristiano_products_per_page( $cols ) {
	$cols = cs_get_option('products_per_page', 6);
	return $cols;
}
function cristiano_loop_shop_columns() {
	return 3;
}

function cristiano_shop_categories_list() {
	$shop_page = get_option( 'woocommerce_shop_page_display' );
	$category_page = get_option( 'woocommerce_category_archive_display' );
			if( is_shop() && empty($shop_page) || is_product_category() && empty($category_page) ) {

		$args = array (
			'taxonomy' => 'product_cat',
			'title_li' => 0,
			'depth' => 1,
			'hierarchical' => 0,
			'parent'	=> 0,
			'exclude' => get_option( 'default_product_cat' ),
		);							
	echo '<ul id="categories-nav">';
		wp_list_categories( $args );
	echo '</ul>';
	}			
}

function cristiano_product_category_hours(){
	$terms = get_the_terms(get_the_ID(), 'product_cat');	
	$term_data = get_term_meta( $terms[0]->term_id, '_restocore_wc_product_cat', true );
	if( !empty( $term_data['limited_ordering_time'] ) && !empty( $term_data['add_to_cart_hours'] ) ){
		$add_to_cart_hours = $term_data['add_to_cart_hours'];
		
		//var_dump($add_to_cart_hours['from']);
		//var_dump( current_time('timestamp') );

		if( strtotime($add_to_cart_hours['from']) < current_time('timestamp') && strtotime($add_to_cart_hours['to']) > current_time('timestamp') ) {
			add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);					
		} else {
			echo ($term_data['time_notice']) ? '<p class="time-notice font-heading">' . $term_data['time_notice'] . '</p>' : null;
		}
	} else {
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
	}
}
function cristiano_woocommerce_template_loop_add_to_cart() {
	$terms = get_the_terms(get_the_ID(), 'product_cat');	
	$term_data = get_term_meta( $terms[0]->term_id, '_restocore_wc_product_cat', true );
	if( !empty($term_data['limited_ordering_time']) && !empty( $term_data['add_to_cart_hours'] ) ){
		$add_to_cart_hours = $term_data['add_to_cart_hours'];
		
		//var_dump($add_to_cart_hours['from']);
		//var_dump( current_time('timestamp') );

		if( strtotime($add_to_cart_hours['from']) < current_time('timestamp') && strtotime($add_to_cart_hours['to']) > current_time('timestamp') ) {
			add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20);	
		}
	}		
	else {
		add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20);	
	}
}

function cristiano_woocommerce_template__mini_loop_add_to_cart() {
	$terms = get_the_terms(get_the_ID(), 'product_cat');	
	$term_data = get_term_meta( $terms[0]->term_id, '_restocore_wc_product_cat', true );
	if( !empty($term_data['limited_ordering_time']) && !empty( $term_data['add_to_cart_hours'] ) ){
		$add_to_cart_hours = $term_data['add_to_cart_hours'];
		
		//var_dump($add_to_cart_hours['from']);
		//var_dump( current_time('timestamp') );

		if( strtotime($add_to_cart_hours['from']) < current_time('timestamp') && strtotime($add_to_cart_hours['to']) > current_time('timestamp') ) {
			woocommerce_template_loop_add_to_cart();	
		}
	} else {
		woocommerce_template_loop_add_to_cart();		
	}	
}
function cristiano_limited_time_notice(){
	if(!is_tax( 'product_cat' )) {
		return;
	}
	$term_data = get_term_meta( get_queried_object_id(), '_restocore_wc_product_cat', true );
	if(!empty($term_data['limited_ordering_time']) && !empty($term_data['time_notice']) ) {
		echo '<p class="font-heading color-tr dynamic-shadow">';
		echo $term_data['time_notice'];
		echo '</p>';
	}
}

function cristiano_product_description($charlength){
	$excerpt = get_the_excerpt();
	$charlength++;
	echo '<p>';
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	echo '</p>';
}


