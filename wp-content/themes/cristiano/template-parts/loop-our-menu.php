<li <?php post_class('menu-item clearfix') ?>>
	<?php if ( has_post_thumbnail() ): ?>		
		<div class="thumbnail">
			<span class="zoom-img" <?php cristiano_transform_rotate(); ?>>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</span>
			<?php the_post_thumbnail( 'cristiano_small_image' ); ?>
		</div>			
	<?php endif; ?>
	<div class="description">
		<span class="dm-price font-title color-content color-pr-tx"><?php restocore_dishes_price(); ?></span>			
		<?php if(cs_get_option('menu_item_single_page')): ?>	
			<h2 class="color-content"><a href="<?php the_permalink(); ?>" class="title font-title"><?php the_title(); ?></a><?php restocore_link_to_product(); ?><?php restocore_highlight_text(); ?></h2>
		<?php else: ?>
			<h2 class="color-content"><span class="title font-title"><?php the_title(); ?></span><?php restocore_link_to_product(); ?><?php restocore_highlight_text(); ?></h2>
		<?php endif; ?>
		<div class="dots">
			<?php restocore_product_price(); ?>	
				<?php $short_description = cristiano_get_product_meta('_product_content_meta', '_product_short_description'); ?>
				<?php 
				if($short_description) {
					echo $short_description;
				} else {
					the_content();
				}
			?>
		</div>
		<?php edit_post_link(); ?>
	</div>
</li>