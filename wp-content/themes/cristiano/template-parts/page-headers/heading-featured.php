<?php $hide_title = restocore_get_meta_data('hide_title'); ?>
<div id="page-header" class="<?php echo cristiano_parallax(); ?>">
	<div class="divimage dzsparallaxer--target" style="background-image:url(<?php cristiano_header_image(); ?>)"></div>	
		<div class="container">	
			<?php if(!$hide_title): ?>
				<div class="center">
					<div class="heading-title">
						<h1 class="font-heading color-tr <?php cristiano_dynamic_shadow(); ?>"><?php single_post_title(); ?></h1>
						<?php echo cristiano_get_page_meta('header_subtitle'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
</div>