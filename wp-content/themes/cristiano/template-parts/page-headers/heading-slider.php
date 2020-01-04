<?php $page_slider = restocore_get_meta_data('page_slider'); ?>
<div id="page-slider">
	<div class="swiper-wrapper">
		<?php foreach ($page_slider as $slider) : ?>
			<?php $src = wp_get_attachment_image_src( $slider['slide_image'], 'full' ); ?>
			<div class="swiper-slide" style='background-image: url("<?php echo $src[0]; ?>")'>
				<?php if( $slider['slide_title'] || $slider['slide_description'] || $slider['slide_button_link'] ): ?>
					<div class="center">
						<div class="table-cell color-tr">
							<div class="info">
								<?php if ($slider['slide_title']): ?>
									<h2 class="font-heading"><?php echo $slider['slide_title']; ?></h2>
								<?php endif; ?>
								<?php if($slider['slide_description']) : ?>
									<div class="description">
										<?php echo wpautop($slider['slide_description']) ?>
									</div>
								<?php endif; ?>
								<?php if( $slider['slide_button_link'] ): ?>
									<?php 
										if( $slider['slide_button_text'] ) {
											$slide_btn_text = $slider['slide_button_text'];
										} else {
											$slide_btn_text = esc_html__( 'Read More', 'cristiano' );
										} 
									?>
									<a class="more" href="<?php echo esc_attr($slider['slide_button_link']); ?>"><?php echo esc_html($slide_btn_text); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>	
			</div>
		<?php endforeach; ?>
	</div>
	<div class="slider-button-prev fa fa-caret-left"></div>
    <div class="slider-button-next fa fa-caret-right"></div>
	<div class="swiper-pagination"></div>
</div>