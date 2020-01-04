<li <?php post_class('menu-item shop-menu-item clearfix'); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="thumbnail">
			<?php cristiano_woocommerce_template__mini_loop_add_to_cart(); ?>
			<span class="zoom-img" <?php cristiano_transform_rotate(); ?>>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</span>
			<?php the_post_thumbnail( 'cristiano_small_image' ); ?>
		</div>
	<?php else: ?>
		<div class="thumbnail">
			<?php woocommerce_template_loop_add_to_cart(); ?>
			<?php echo wc_placeholder_img(); ?>
		</div>
	<?php endif; ?>
	<div class="description">
		<span class="dm-price font-title color-content color-pr-tx"><?php woocommerce_template_loop_price(); ?></span>
		<h2 class="color-content"><a class="title font-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php woocommerce_show_product_loop_sale_flash(); ?></h2>
		<div class="dots"><?php the_excerpt(); ?></div>
	</div>
</li>