<?php	
	function restocore_top_dishes( $atts ) {
	ob_start();
	
	$atts = shortcode_atts(array(
    	'title'		=> esc_html__('Today\'s Offer', 'cristiano'),
    	'subtitle'	=> esc_html__('Don\'t Miss', 'cristiano'),
    	'cols'		=> '2',
    	'size'		=> 'large',
    	'style'		=> 'drop',
	), $atts);		
	?>
	<section id="top-dishes" class="section-block">
		<div class="center">
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
			<?php
				$query_args = array(
					'post_type' => 'dishes_menu',
					'nopaging' => true,
					'post__in' => get_option('dishes_menu_featured'),
				);
				$the_query = new WP_Query( $query_args );
			?>
			<?php if ( $the_query->have_posts() &&  get_option('dishes_menu_featured')) : ?>
				<div class="center">
					<ul class="dishes-menu <?php echo 'cols-' . $atts['cols'], ' ', $atts['size'] . '-imgs', ' ', $atts['style'] . '-style'; ?> margin-large">
						<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
							<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php if(isset($args['uri'])): ?>
					<div class="view-full-menu">
						<a href="<?php echo $args['uri']; ?>" class="btn-color"><?php esc_html_e( 'View Full Menu', 'cristiano' ) ?></a>
					</div>	
				<?php endif; ?>	
			<?php else: ?>
				<div class="center">
					<p class="woocommerce-info">
						<?php echo esc_html_e('No products.', 'cristiano'); ?>
					</p>
				</div>
			<?php endif; ?>	
		</div>
	</section>
<?php 
	return ob_get_clean();		
}