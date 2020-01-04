<?php	
	function restocore_our_menu_item( $args ) {
	ob_start();
	
	$atts = shortcode_atts(array(
		'id'		=> 1,
		'size'		=> 'large',
		'style'		=> 'drop',
	), $atts);		
	$query_args = array(
		'p'         => $atts['id'],
		'post_type' => 'dishes_menu',
	);
	$the_query = new WP_Query($query_args);	
	?>
	<?php if ( $the_query->have_posts() ) : ?>
		<div class="center">
			<div class="dishes-menu margin-large col-1 <?php echo $atts['size'].'-imgs', ' ', $atts['style'] . '-style'; ?>">
				<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
					<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
				<?php endwhile; ?>
			</div>
		</div>	
	<?php else: ?>	
		<div class="center">	
			<p style="color:red">[our_menu_item] Can't find a product with such ID <b>"<?php echo $id; ?>"</b>.</p>	
		</div>
	<?php endif; ?>
	<?php
	return ob_get_clean();
}