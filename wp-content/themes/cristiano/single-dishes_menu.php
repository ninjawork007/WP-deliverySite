<?php get_header(); ?>
		<div id="layout" class="<?php echo cristiano_site_layout(); ?>">

<div id="container">
	<?php if ( have_posts() ) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="blur" style="background-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%,rgba(0,0,0,0) 50%), url(<?php the_post_thumbnail_url( 'cristiano_small_image' ); ?>)"></div> 
			<div class="center">	
				<article id="product-single" class="cols-2 like-table">
					<div>
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="details">
						<h1 class="font-title"><?php the_title(); ?></h1>
						<p class="product_meta"><?php the_terms(get_the_ID(), 'dishes_categories', esc_html__( 'Categories: ', 'cristiano' )); ?></p>
						<?php restocore_product_price(); ?>
						<?php the_content(); ?>
						<?php if(cristiano_get_product_meta('_product_content_meta', '_product_short_description')): ?>
							<div class="product-short-description">
								<p><?php echo cristiano_get_product_meta('_product_content_meta', '_product_short_description'); ?></p>
							</div>
						<?php endif; ?>
						<span class="color-content"></span>
					</div>
					<?php restocore_products_nav(); ?>
					<span class="product-price single-price color-content-inverse"><?php restocore_dishes_price(); ?></span>
				</article>
				<section class="related products">				
					<?php cristiano_section_title_template( esc_html__('Related Products', 'cristiano') ) ?>
					<?php 
						$args = array(
							'posts_per_page' => 3,
							'orderby'	=> 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'dishes_categories',
									'field'	=> 'term_id',
									'terms'	=> array_column(get_the_terms(get_the_ID(), 'dishes_categories'), 'term_id'),
								),
							),
						);
						
						$the_query = new WP_Query($args);
					?>
					<ul id="product-list" class="cols-3 margin-large">
						<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
							<li>
								<div class="product">
									<a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?>
										<span class="product-price font-title"><?php restocore_dishes_price(); ?></span>
									</a>
									<div class="description">
										<h2 class="font-title"><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
									</div>
								</div>
							
							</li>
						<?php endwhile; ?>
					</ul>
				</section>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
</div>
		</div>
<?php get_footer(); ?>	