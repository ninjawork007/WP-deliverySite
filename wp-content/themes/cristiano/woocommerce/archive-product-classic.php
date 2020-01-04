	<?php cristiano_shop_categories_list(); ?>

	<?php cristiano_shop_subcat(); ?>	
			
		<?php if ( have_posts() && cristiano_shop_is_not_children_cat() ) : ?>		
					
			<?php woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
			
						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
			
						wc_get_template_part( 'content', 'product' );
					}
				}
				
			woocommerce_product_loop_end(); ?>
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>			
		<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>

		<?php endif; ?>