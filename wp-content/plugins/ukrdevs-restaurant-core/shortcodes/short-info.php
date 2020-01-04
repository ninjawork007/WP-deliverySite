<?php
function restocore_short_info( $atts ){
	ob_start();
	$atts = shortcode_atts(array(
        'text'		=> '',		
        'img'		=> NULL,
        'shading'	=> '0',
        'height'	=> NULL,
    ), $atts);
    $bg = wp_get_attachment_image_url($atts['img'], 'full');  
	?>	
		<section class="short-info  <?php echo($bg) ? 'has-bg ' . cristiano_parallax() : 'color-content-inverse' ?>" style="<?php echo ($atts['height']) ? 'height:' . $atts['height'] . 'px' : '' ?> ">
			<?php if($bg): ?>
				<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo $bg; ?>)"></div>	
			<?php endif; ?>
			<div class="center">
				<?php if(isset( $atts['text'] )): ?>
					<h2 class="font-heading"><?php echo esc_html( $atts['text'] ) ?></h2>
				<?php endif; ?>
			</div>
			<?php if($atts['shading'] > '0' && $bg): ?>
				<span class="dim" style="opacity:.<?php echo esc_html( $atts['shading'] ) ?>"></span>
			<?php endif; ?>
		</section>
	<?php
	return ob_get_clean();		
}