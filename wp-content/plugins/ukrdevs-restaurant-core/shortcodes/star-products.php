<?php
function restaurantcore_star_products( $atts ) {
	ob_start();
		
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Chef Recommends', 'cristiano'),
        'subtitle'	=> esc_html__('Should to Try', 'cristiano'),
    ), $atts);	
		
	$query_args = array(
		'posts_per_page'	=> 3,
		'no_found_rows'		=> 1,
		'post_status'		=> 'publish',
		'post_type'			=> 'product',
		'orderby'           => 'rand',
		'tax_query'	=> array(
			array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
			),
		),
	);
	$featured_products = new WP_Query( $query_args );
	?>
	
	<?php if ( $featured_products->have_posts() ): ?>
		<section id="most-popular" class="section-block">
			<div class="center">
				<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
				<ul id="product-list" class="cols-3 margin-large">
					<?php while ( $featured_products->have_posts() ): ?>
						<?php
							$featured_products->the_post();				
							get_template_part('woocommerce/content', 'product');
						?>
					<?php endwhile; ?>
				</ul>
			</div>
		</section>			
	<?php endif; ?>
	<?php
	return ob_get_clean();		
}