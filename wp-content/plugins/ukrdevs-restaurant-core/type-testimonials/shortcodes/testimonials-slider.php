<?php
	function restocore_testimonials( $atts ){
		ob_start();
		$atts = shortcode_atts(array(
		    'title'		=> esc_html__('Testimonials', 'restocore'),
		    'subtitle'	=> esc_html__('What Our Clients Say', 'restocore'),
		    'img'		=> '',
		    'shading'	=> '0',
		), $atts);		
		$bg = wp_get_attachment_image_url($atts['img'], 'full');
		?>
		<section id="testimonials-slider" class="section-block <?php echo($bg) ? 'has-bg ' . cristiano_parallax() : '' ?>">
			<?php if($bg):?>
				<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo $bg; ?>)"></div>	
			<?php endif; ?>
			<div class="center">
				<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
				<?php
					$args = array( 'post_type' => 'testimonials');
					$loop = new WP_Query( $args );
				?>
				<?php if($loop->have_posts()): ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php get_template_part('template-parts/loop-testimonials-slider'); ?>
						<?php endwhile; ?>
						</div>
						<div class="nav">
							<span class="prev fa fa-caret-left"></span>
							<span class="next fa fa-caret-right"></span>	
						</div>		
					</div>
				<?php endif; ?>		

			</div>
			<?php if( $atts['shading'] > '0' && $bg ): ?>
				<span class="dim" style="opacity:.<?php echo esc_html( $atts['shading'] ) ?>"></span>
			<?php endif; ?>
		</section>
		<?php
		return ob_get_clean();
	}