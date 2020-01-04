<?php
add_filter('manage_dishes_menu_posts_columns', 'cristiano_add_featured_column', 4);
add_filter('manage_dishes_menu_posts_columns', 'cristiano_add_images_column', 4);

add_filter('manage_dishes_menu_posts_custom_column', 'cristiano_featured_product_column', 5, 2);
add_action('wp_ajax_cristiano_featured_product', 'cristiano_featured_product_callback');
add_action('admin_enqueue_scripts', 'cristiano_featured_product_script', 99);
	
function cristiano_add_featured_column( $columns ){
	
	$num = 2;
	$new_columns = array(
		'featured'	=> esc_html__('Featured', 'cristiano'),
	);	
	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	
}

function cristiano_add_images_column( $columns ){
	
	$num = 1;
	$new_columns = array(
		'images'	=> esc_html__('Images', 'cristiano'),
	);	
	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	
}

function cristiano_featured_product_column( $colname, $post_id ){
	
	/* Version 1
		$icon = (get_post_meta($post_id, 'dishes_menu_featured', true)) ? 'fa fa-star' : 'fa fa-star-o';
	*/

	/* Version 2 */
	if( $colname === 'featured' ){
		$featured = (get_option('dishes_menu_featured')) ? get_option('dishes_menu_featured') : array();
		$icon = (in_array($post_id, $featured)) ?  'fa fa-star': 'fa fa-star-o';
		echo '<a class="cristiano-featured-product '.$icon.'" data-product-id="'.$post_id.'" href="admin-ajax.php?action=cristiano_featured_product&id='. $post_id .'"></a>';
	}
	if( $colname === 'images' ){
		echo '<a href="' . get_edit_post_link() . '">';
		the_post_thumbnail('thumbnail');
		echo '</a>';
	}	
	
}

function cristiano_featured_product_callback(){
	
	/* Version 1
		$value = (get_post_meta($_GET['id'], 'dishes_menu_featured', true)) ? false : true;
		update_post_meta($_GET['id'], 'dishes_menu_featured', $value);
	*/
	
	/* Version 2 */
	$featured = (get_option('dishes_menu_featured')) ? get_option('dishes_menu_featured') : array();	
	if (($key = array_search($_GET['id'], $featured)) !== false) {
	    unset($featured[$key]);
	} else {
		array_push($featured, $_GET['id']);	
	}
	update_option('dishes_menu_featured', $featured);
	wp_die(); 
}

function cristiano_featured_product_script() {
	if(get_current_screen()->post_type == 'dishes_menu') {
		wp_enqueue_script( 'cristiano_featured_product_admin_js', plugin_dir_url(__FILE__) .'/assets/admin.js' );
		wp_enqueue_style( 'cristiano_featured_product_admin_css', plugin_dir_url(__FILE__) .'/assets/admin.css' );
	}
}