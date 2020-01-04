<?php

function restaurantcore_promo_slider($atts){
	ob_start();
	$atts = shortcode_atts(array(
    	'cat'	=> NULL,
	), $atts);	
	
	
	if( $atts['cat'] ) {
		$args = array(
			'post_type' => 'promo_slider',
			'tax_query' => array(
				array(
					'taxonomy' => 'promo_slider_categories',
					'field' => 'id',
					'terms' => explode(',', $atts['cat']),
				),
			),
		);			
	} else {
		$args = array(
			'post_type' => 'promo_slider',
		);
	}
	$loop = new WP_Query( $args );
	?>
	<?php if($loop->have_posts()): ?>
		<section class="promo-slider">
			<div class="swiper-wrapper">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php get_template_part('template-parts/loop', 'promo-slider'); ?>
				<?php endwhile; ?>
			</div>
			<div class="slider-button-prev fa fa-caret-left"></div>
			<div class="slider-button-next fa fa-caret-right"></div>			
			<div class="swiper-pagination"></div>	
		</section>
	<?php endif; ?>
	<?php
	return ob_get_clean();
}