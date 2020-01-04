<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
} ?>
<div class="center">
	<div class="blur" style="background-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 50%), url(<?php the_post_thumbnail_url( 'cristiano_small_image' ); ?>)"></div> 	
	<div id="product-<?php the_ID(); ?>" <?php post_class('product-single-wrap'); ?>>
		<div id="product-single" class="cols-2 like-table">
			<?php add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 10 ); ?>		
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			<div class="details">
				<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );				
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ); 
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); 
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 1);
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);	
					add_action('woocommerce_single_product_summary', 'the_content', 10);	
					do_action( 'woocommerce_single_product_summary' );
				?>
				<span class="color-content"></span>
			</div>
			<?php restocore_products_nav(); ?>
		</div>	
		<?php global $product;  ?>
		<?php wc_display_product_attributes( $product ); ?>	
		<?php //do_action( 'woocommerce_share' ); ?>	
		<div class="both">
			<div class="content-section">		
				<?php comments_template(); // Product Reviews ?> 
				
				<?php remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 ); ?>
				<?php do_action( 'woocommerce_after_single_product_summary' ); ?>	
				<?php do_action( 'woocommerce_after_single_product' ); ?>
			</div>
			<?php get_sidebar( 'shop' ); ?>		
		</div>
	</div>
</div