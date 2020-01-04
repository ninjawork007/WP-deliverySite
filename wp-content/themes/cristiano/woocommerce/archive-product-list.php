<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>
<?php $product_list_template = (cs_get_option('hide_product_images')) ? 'product-list-minimal' : 'product-list-images'; ?>
<?php if(is_product_category()): ?>
	<?php cristiano_shop_categories_list(); ?>	
		<?php
		$subcat_ids = get_term_children(get_queried_object_id(), 'product_cat'); 						
		if(!empty($subcat_ids)) {
			$subcats_args = array(
				'taxonomy'	=> 'product_cat',
				'include'	=> $subcat_ids,
			);
			$subcats = get_terms( $subcats_args );
			$cols = 'cols-' . count($subcats);
			if($subcats){
				wc_get_template('cristiano_content-product_subcat_list.php', array('subcats' => $subcats, 'cols' => $cols));
			}						
		} 
		?>			
		<?php if ( have_posts() && cristiano_shop_is_not_children_cat() ) : ?>		
			<div class="center">
				
				<ul class="product-list-small cols-2 margin-large <?php echo $product_list_template; ?>">
					<?php	
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							do_action( 'woocommerce_shop_loop' );
							
							wc_get_template_part( 'cristiano', $product_list_template );					
						}
					}
				 	?>
				</ul>
				<?php
					do_action( 'woocommerce_archive_description' );
				?>	
			</div>
	
			<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>

		<?php endif; ?>
<?php else: ?>
	<?php if(cs_get_option('featured_products')): ?>
		<?php
		$query_args = array(
			'posts_per_page'	=> 3,
			'no_found_rows'		=> 1,
			'post_status'		=> 'publish',
			'post_type'			=> 'product',
			'orderby'           => 'rand',
			'tax_query'	=> array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				),
			),
		);
		$featured_products = new WP_Query( $query_args );
		?>
		<?php if ( $featured_products->have_posts() ): ?>
			<section id="most-popular" class="section-block">
				<div class="center">
					<?php cristiano_section_title_template(cs_get_option('featured_products_title'), cs_get_option('featured_products_subtitle')); ?>
					<ul class="featured-products product-list-small cols-2 margin-large <?php echo $product_list_template; ?>">
						<?php while ( $featured_products->have_posts() ): ?>
							<?php
								$featured_products->the_post();				
								wc_get_template_part( 'cristiano', $product_list_template );
							?>
						<?php endwhile; ?>
					</ul>
				</div>
			</section>			
		<?php endif; ?>
	<?php endif; ?>
	<?php 
		$args = array (
			'taxonomy' => 'product_cat',
			'parent'	=> 0,
		
		);
	?>	
	
	<?php if(cs_get_option('product_nav')): ?>
	<div class="page-nav">
		<ul id="mainNav" class="page-nav font-heading color-content">	
			<?php $cats = get_terms($args); ?>
			<?php foreach( $cats as $cat ): ?>
				<li><a class="js-scroll-trigger" href="#catid-<?php echo esc_attr($cat->term_id); ?>"><?php echo esc_html($cat->name); ?></a></li>
			<?php endforeach; ?>
		</ul>	
	</div>	
	<?php endif; ?>
			
	<?php
		$cat_args = array(
			'taxonomy'	=> 'product_cat',
			'hide_empty' => true,
			'parent'	=> 0,			
				
		);
		$categories = get_categories( $cat_args );
	?>	
	<?php if( $categories ): ?>
		<div class="product-list-wrap">		
			<?php foreach( $categories as $cat ): ?>
			
			<?php 
				$cat_img_url = '';
				$class = 'no-bg';
				$cat_img_url = cristiano_wc_cat_img($cat->term_id);
				if($cat_img_url) {
					$class = 'has-bg ' . cristiano_parallax();
					$style = "style='background-image: url($cat_img_url)'";
				}
			?>

				<div id="catid-<?php echo esc_attr($cat->term_id); ?>" class="cat-menu-heading <?php echo $class; ?>">
					<?php if($cat_img_url) : ?>
						<div class="divimage dzsparallaxer--target" <?php echo $style; ?>></div>					
					<?php endif; ?>		
					<div class="table">
						<div class="table-cell">
							<div class="info color-content">					
								<?php cristiano_section_title_template($cat->name); ?>
								<?php  
									$term_data = get_term_meta( $cat->term_id, '_restocore_wc_product_cat', true );
									if(!empty($term_data['limited_ordering_time']) && !empty($term_data['time_notice']) ) {
										echo '<div class="limited-time-notice"><p class="font-heading">';
										echo $term_data['time_notice'];
										echo '</p></div>';
									}
								?>
								<div class="description">
									<?php echo term_description($cat->term_id, 'dishes_categories'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>					
		
				<?php 
					$query_args = array(
						'nopaging' => true,
						'tax_query' => array(
							array(
								'taxonomy'	=> 'product_cat',
								'terms'	=> $cat->term_id,
								'include_children' => false,
							),
						),												
					);
					$the_query = new WP_Query( $query_args );
	
				?>
									
				<div class="center">
					<?php if ( $the_query->have_posts() ) : ?>
						<ul class="product-list-small cols-2 margin-large <?php echo $product_list_template; ?>">
							<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
								<?php wc_get_template_part( 'cristiano', $product_list_template ); ?>
							<?php endwhile; wp_reset_query(); ?>
						</ul>
					<?php endif; ?>
				</div>
				<?php		
					$subcats_args = array(
						'taxonomy'	=> 'product_cat',
						'child_of'	=> $cat->term_id,
					);
					$subcats = get_terms( $subcats_args );
					$cols = 'cols-' . count($subcats);																			
				?>					
				<?php if( $subcats ): ?>
					<div class="tabs">
						<div class="center">
						<?php $i = 1; ?>
						<ul class="tabs-nav font-heading <?php echo $cols; ?>">
							<?php foreach($subcats as $subcat): ?>
								<li><a href="#tab-<?php echo esc_attr($subcat->slug . '-' . $i); ?>"><?php echo esc_html($subcat->name); ?></a></li>
								<?php $i++; ?>
							<?php endforeach; ?>
						</ul>
						<?php $i = 1; ?>
						<?php foreach($subcats as $subcat): ?>
							<div id="tab-<?php echo esc_attr($subcat->slug . '-' . $i); ?>" class="tab-section">
								<?php
									$query_args = array(
										'post_type' => 'product',
										'nopaging' => true,
										'product_cat' => $subcat->slug,
									);
									$the_query = new WP_Query( $query_args );
								?>
								<?php if ( $the_query->have_posts() ) : ?>
									<ul class="product-list-small margin-large cols-2 flex <?php echo $product_list_template; ?>">
										<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
											<?php wc_get_template_part( 'cristiano', $product_list_template); ?>
										<?php endwhile; ?>
									</ul>
								<?php else: ?>
									<p class="info">
										<?php echo esc_html_e('No products were found matching your selection.', 'cristiano'); ?>
									</p>
								<?php endif; ?>
							</div>	
						<?php $i++; ?>	
						<?php endforeach; ?>
						</div>
					</div>							
				<?php endif; ?>				
									
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

<?php endif; ?>