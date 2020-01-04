<div class="shortcode-slider">
	<?php $slider = restocore_get_meta_data('slider_shortcode'); ?>	
	<?php if($slider): ?>
		<?php echo do_shortcode($slider); ?>
	<?php else: ?>
	<div id="page-header">	
		<div class="center"><h1>No shortcode</h1></div>
	</div>
	<?php endif; ?>
	<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
</div>