<?php
function cristiano_button_shortcode($atts){
	ob_start();
	$atts = shortcode_atts( array(
		'text'  => 'Button',
		'style'	=> 'btn-default',
		'size'	=> 'btn-md',
		'url'   => esc_url( home_url( '/' )),
		'position'	=> 'center',
		'target' => false,
		'class'	=> '',
	), $atts );    
    ?>
    	<div class="align-<?php echo $atts['position'] ?>">
			<a href="<?php echo $atts['url'] ?>" class="btn <?php echo $atts['style'] . ' ' . $atts['size'] . ' ' . $atts['class'] ?>" <?php echo ($atts['target'] == true) ? 'target="_blank"' : ''; ?>><?php echo $atts['text']; ?></a>
    	</div>
	<?php
	return ob_get_clean();		
}