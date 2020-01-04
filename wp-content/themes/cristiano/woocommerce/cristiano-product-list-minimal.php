<li <?php post_class('menu-item shop-menu-item clearfix'); ?>>
	<div class="description">					
		<span class="dm-price font-title color-content color-pr-tx"><?php woocommerce_template_loop_price(); ?>
			<?php remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 ); ?>				
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</span>	
		<h2 class="color-content"><a class="title font-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php woocommerce_show_product_loop_sale_flash(); ?></h2>
		<div class="dots"><?php the_excerpt(); ?></div>
	</div>
</li>