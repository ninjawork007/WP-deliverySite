<?php $product_list_template = (cs_get_option('hide_product_images')) ? 'product-list-minimal' : 'product-list-images'; ?>
<div class="tabs">
	<div class="center">
	<?php $i = 1; ?>
	<ul class="tabs-nav <?php echo $cols; ?>">
		<?php foreach($subcats as $subcat): ?>
			<li><a href="#tab-<?php echo $subcat->slug . '-' . $i; ?>" class="pr-font"><?php echo $subcat->name; ?></a></li>
			<?php $i++; ?>
		<?php endforeach; ?>
	</ul>
	<?php $i = 1; ?>
	<?php foreach($subcats as $subcat): ?>
		<div id="tab-<?php echo $subcat->slug . '-' . $i; ?>" class="tab-section">
			<?php
				$query_args = array(
					'post_type' => 'product',
					'nopaging' => true,
					'product_cat' => $subcat->slug,
				);
				$the_query = new WP_Query( $query_args );
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<ul class="product-list-small cols-2 margin-large flex <?php echo $product_list_template; ?>">
					<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
						<?php wc_get_template_part( 'cristiano', $product_list_template ); ?>
					<?php endwhile; ?>
				</ul>
			<?php else: ?>
				<p class="cristiano-info">
					<?php echo esc_html_e('No menu items found.', 'cristiano'); ?>
				</p>
			<?php endif; ?>
		</div>	
	<?php $i++; ?>	
	<?php endforeach; ?>
	</div>
</div>