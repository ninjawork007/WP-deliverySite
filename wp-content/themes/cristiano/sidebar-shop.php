<?php
	if(is_single()) {
		if(cs_get_option('single_product_sidebar_position', 'no-sidebar') == 'no-sidebar') {
			return;
		}
		if ( is_active_sidebar( cs_get_option('single_product_sidebar_area', 'shop_sidebar') ) ) {
			echo '<aside class="content-sidebar widget-area" role="complementary">';
				dynamic_sidebar( cs_get_option('single_product_sidebar_area', 'shop_sidebar') );
			echo '</aside>';
		}
	} else {
		if(cristiano_get_wc_page_meta('sidebar_position', 'no-sidebar') == 'no-sidebar') {
			return;
		}
		if ( is_active_sidebar( cristiano_get_wc_page_meta('sidebar_area', 'shop_sidebar') ) ) {
			echo '<aside class="content-sidebar widget-area" role="complementary">';
				dynamic_sidebar( cristiano_get_wc_page_meta('sidebar_area', 'shop_sidebar') );
			echo '</aside>';
		}
	}