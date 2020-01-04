<?php $hide_title = restocore_wc_get_meta_data('hide_title'); ?>
<div id="page-header" class="<?php echo cristiano_parallax(); ?>">
	<div class="divimage dzsparallaxer--target" style="background-image: url(<?php cristiano_header_image_wc(); ?>)"></div>	
		<div class="container">	
			<?php if(!$hide_title): ?>
				<div class="center">
					<div class="heading-title">
						<h1 class="font-heading color-tr <?php cristiano_dynamic_shadow(); ?>"><?php woocommerce_page_title(); ?></h1>
						<?php cristiano_limited_time_notice(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
</div>