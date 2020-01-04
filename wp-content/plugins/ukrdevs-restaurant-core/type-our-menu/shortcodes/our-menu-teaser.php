<?php
function restocore_our_menu_teaser( $atts ) {
	ob_start();
	
	$atts = shortcode_atts(array(
		'title'		=> esc_html__('From Our Menu', 'cristiano'),
		'subtitle'	=> esc_html__('Random Dishes', 'cristiano'),
		'cols'		=> '2',
		'size'		=> 'large',
		'style'		=> 'drop',
		'uri'		=> '',
		'cat'		=> NULL,
		'btntxt'	=> esc_html__('View Full Menu', 'cristiano'),
	), $atts);		
	
	if( isset($atts['cat']) ) {
		$query_args = array(
			'post_type' => 'dishes_menu',
			'posts_per_page' => 6,
			'orderby'        => 'rand',
			'tax_query' => array(
				'relation'	=> 'OR',
				array(
					'taxonomy' => 'dishes_categories',
					'terms'    => explode(",", $atts['cat']),
					'operator'	=> 'IN',
				),
			),
		);		
	} else {
		$query_args = array(
			'post_type' => 'dishes_menu',
			'posts_per_page' => 6,
			'orderby'        => 'rand',
		);		
	}
	$the_query = new WP_Query( $query_args );
?>
<section id="our-menu" class="section-block">
	<div class="center">
		<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<ul class="dishes-menu <?php echo 'cols-' . $atts['cols'] . ' margin-large ' . $atts['size'] . '-imgs', ' ', $atts['style'] . '-style'; ?> ">
				<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
					<?php get_template_part( 'template-parts/loop-our-menu' ); ?>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php if( $atts['uri'] ): ?>
			<div class="view-full-menu">
				<a href="<?php echo $atts['uri']; ?>" class="btn btn-transparent btn-lg"><?php echo $atts['btntxt']; ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php 
return ob_get_clean();
}