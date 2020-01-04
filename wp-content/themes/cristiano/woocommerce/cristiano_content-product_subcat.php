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
				<?php woocommerce_product_loop_start(); ?>
					<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				<?php woocommerce_product_loop_end(); ?>
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