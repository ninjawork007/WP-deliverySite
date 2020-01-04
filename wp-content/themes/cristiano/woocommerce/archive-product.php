<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.4.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
get_template_part( 'template-parts/page-headers/wc', restocore_wc_get_meta_data( 'page_header', 'featured' ) ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<?php
		if ( have_posts() ) {

			switch (cs_get_option('archive_product_template', 'classic')) {
			case 'classic':
				wc_get_template( 'archive-product-classic.php' );
			    break;
			case 'list':
				wc_get_template( 'archive-product-list.php' );
			    break;
			case 'onepage':
				wc_get_template( 'archive-product-onepage.php' );
			    break;
			} 
		}	
	?>
	
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>		
	<?php //do_action( 'woocommerce_sidebar' );  ?>

<?php get_footer( 'shop' ); ?>