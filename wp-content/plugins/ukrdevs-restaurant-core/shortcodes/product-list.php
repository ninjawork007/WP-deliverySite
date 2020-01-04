<?php
function cristiano_product_list($atts){
	ob_start();
	$atts = shortcode_atts( array(
		'text'  => 'Button',
	), $atts );
	
	get_template_part( 'woocommerce/archive-product-list' );

	return ob_get_clean();		
}