<?php
function restocore_article($atts, $content = null){
	ob_start();
	$atts = shortcode_atts(array(
        'image'      => '0',
        'position'   => 'left',        		
        'title'      => 'Some Title',
    ), $atts);
    $image = wp_get_attachment_image($atts['image'], 'medium');        
    $class = 'to-left';
    if($atts['position'] == 'right') {
	    $class = 'to-right';
    } 
    if($image) {
	    $class .= ' has-post-thumbnail';
    }
	?>
	<div class="center">
		<div class="article cols-2 no-margin <?php echo $class; ?> ">
			<div class="image"><?php echo $image; ?></div>
			<div class="details color-content rwd-padding">
				<h2 class="font-title"><?php echo $atts['title']; ?></h2>
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();		
}