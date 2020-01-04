<?php 
	$slider = restocore_wc_get_meta_data( 'presentation_slider' );		
	$height = ($slider['height']) ? 'style="height:'. $slider['height'] .'px"' : '';
	$button = (isset($slider['button'])) ? $slider['button'] : '';
	$slider_type = (isset($slider['slider_type'])) ? $slider['slider_type'] : '';
?>
<section id="slider" <?php echo $height; ?> class="<?php echo ($slider_type == 'video') ? 'video-bg' : 'img-slider' ?>">	
	<?php if($slider_type == 'video'): ?>
		<video autoplay loop playsinline muted>
			<source src="<?php echo esc_url($slider['video']); ?>">
		</video>
	<?php else: ?>
		<?php $gallery = $slider['gallery']; ?>
		<?php if( ! empty( $gallery ) ) : ?>
			<?php $ids = explode( ',', $gallery ); ?>
			<?php foreach ( $ids as $id ) : ?>
				<?php $attachment = wp_get_attachment_image_src( $id, 'full_hd' ); ?>
				<div class="item" style="background-image: url(<?php echo esc_url($attachment[0]); ?>)"></div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?>
		<div class="info color-tr <?php cristiano_dynamic_shadow(); ?>">
			<?php if( !is_null( $slider['logo'] ) ): ?>
				<?php echo wp_get_attachment_image($slider['logo'], 'full slider-logo'); ?>
			<?php endif ?>				
			<?php if( !is_null( $slider['title'] ) ): ?>
				<h1 class="font-heading"><?php echo $slider['title']; ?></h1>
			<?php endif ?>
			<?php if( !is_null( $slider['subtitle'] ) ): ?>
				<p class="title"><?php  echo $slider['subtitle']; ?></p>
			<?php endif;?>
			<?php if(isset($slider['add_button'])): ?>
				<a class="font-heading" target="<?php echo (isset($button['new_tab'])) ? '_blank' : '' ; ?>" href="<?php echo ($button['custom_link_url']) ? $button['custom_link_url'] : get_permalink($button['link_to_page']) ; ?>"><?php echo ($button['link_text']) ? $button['link_text'] : ''; ?></a>
			<?php endif; ?>
		</div>
		<?php if(!$height): ?>
			<span class="scroll">
				<span class="wheel"></span>
			</span>
		<?php endif; ?>
	<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
</section>