<?php
function restocore_latest_news( $atts ){
	ob_start();
	
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Latest News', 'cristiano'),
        'subtitle'	=> esc_html__('From Our Blog', 'cristiano'),
        'count'		=> '2', 
        'cat'		=> NULL,       		
    ), $atts);
	?>
	<section id="latest-news" class="has-bg color-tr">
			<?php 
				$query_args = array(
					'posts_per_page' => $atts['count'],
					'post_type' => 'post',
					'cat'		=> $atts['cat'],
				);
				$the_query = new WP_Query( $query_args );
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<div class="latest-news_list">
					<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">	
							<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
								<?php get_template_part( 'template-parts/loop-news-slider' ); ?>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
						<div class="swiper-pagination"></div>
						<span class="slider-button-prev fa fa-caret-left swiper-button-disabled"></span>
						<span class="slider-button-next fa fa-caret-right"></span>		
					</div>						
				</div>
			<?php else: ?>
				<p class="woocommerce-info">
					<?php echo esc_html_e('You have no Posts.', 'cristiano'); ?>
				</p>
			<?php endif; ?>
	</section>
	<?php
	return ob_get_clean();
}