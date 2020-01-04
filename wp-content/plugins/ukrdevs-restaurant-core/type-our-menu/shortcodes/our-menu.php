<?php
function restocore_our_menu( $atts ) {
	ob_start();
		$atts = shortcode_atts(array(
        	'cat'	=> NULL,
        	'url'	=> NULL,
        	'nav'	=> false,
		), $atts);	
		$cat_args = array(
			'taxonomy'	=> 'dishes_categories',
			'parent'	=> 0,
			'include'	=> $atts['cat'],
		);
		$categories = get_categories( $cat_args );
				
		?>
		
		<?php if( $categories ): ?>
			<?php if($atts['nav']): ?>
				<?php 
					$args = array (
						'taxonomy' => 'dishes_categories',
						'parent'	=> 0,
						'include'	=> $atts['cat'],
					);
				?>	
				<div class="page-nav">
					<ul id="mainNav" class="page-nav font-heading color-content">	
						<?php $cats = get_terms($args); ?>
						<?php foreach( $cats as $cat ): ?>
							<li><a class="js-scroll-trigger" href="#catid-<?php echo esc_attr($cat->term_id); ?>"><?php echo esc_html($cat->name); ?></a></li>
						<?php endforeach; ?>
					</ul>	
				</div>
			<?php endif; ?>
				
			<div class="dishes-menu-wrap">
				<?php foreach( $categories as $cat ): ?>
					<?php
						$style_class = 'no-items'; 
						if($cat->count > 0) {
							$style_class = 'has-items'; 
						}
					?>
					<div id="catid-<?php echo esc_attr($cat->term_id); ?>" class="category-section <?php echo $style_class; ?>">
						<?php 
							$style = '';
							$class = '';
							$cat_img_url = restocore_get_menu_cat_img($cat->term_id);
							if($cat_img_url) {
								$class = 'has-bg ' . cristiano_parallax();
								$style = "style='background-image: url($cat_img_url)'";
							}
						?>
						<div class="cat-menu-heading <?php echo $class; ?>">
							<?php if($cat_img_url) : ?>
								<div class="divimage dzsparallaxer--target" <?php echo $style; ?>></div>					
							<?php endif; ?>		
							<div class="table">
								<div class="table-cell">
									<div class="info color-content">					
										<?php cristiano_section_title_template($cat->name); ?>
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
										'taxonomy'	=> 'dishes_categories',
										'terms'	=> $cat->term_id,
										'include_children' => false,
									),
								),
								'order'	=> 'ASC',
								'orderby' => 'menu_order',
							);
							$the_query = new WP_Query( $query_args );
						?>
						<div class="center">
							<?php if ( $the_query->have_posts() ) : ?>
								<ul class="dishes-menu margin-large <?php restocore_dishes_img_size($cat->term_id); ?>">
									<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
										<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
									<?php endwhile; wp_reset_postdata(); ?>
								</ul>
							<?php endif; ?>
						</div>	
						
						<?php		
							$subcats_args = array(
								'taxonomy'	=> 'dishes_categories',
								'child_of'	=> $cat->term_id,
							);
							$subcats = get_terms( $subcats_args );
							$cols = 'cols-' . count($subcats);																			
						?>					
						<?php if( $subcats ): ?>
							<div class="tabs">
								<div class="center">
								<?php $i = 1; ?>
								<ul class="tabs-nav <?php echo $cols; ?>">
									<?php foreach($subcats as $subcat): ?>
										<li><a href="#tab-<?php echo $subcat->slug . '-' . $i; ?>" class="pr-font"><?php echo $subcat->name; ?></a></li>
										<?php $i++; ?>
									<?php endforeach; ?>
								</ul>
								<?php $i = 1; ?>
								<?php foreach($subcats as $subcat): ?>
									<div id="tab-<?php echo $subcat->slug . '-' . $i; ?>" class="tab-section">
										<?php
											$query_args = array(
												'post_type' => 'dishes_menu',
												'nopaging' => true,
												'dishes_categories' => $subcat->slug,
											);
											$the_query = new WP_Query( $query_args );
										?>
										<?php if ( $the_query->have_posts() ) : ?>
											<ul class="dishes-menu margin-large <?php restocore_dishes_img_size($subcat->term_id); ?>">
												<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
													<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
												<?php endwhile; ?>
											</ul>
										<?php else: ?>
											<p class="cristiano-info">
												<?php echo esc_html_e('No menu items found.', 'restocore'); ?>
											</p>
										<?php endif; ?>
									</div>	
								<?php $i++; ?>	
								<?php endforeach; ?>
								</div>
							</div>							
						<?php endif; ?>
					</div>		
				<?php endforeach; ?>
			</div>	
		<?php else: ?>
			<div class="center">
				<?php 
					$query_args = array(
						'post_type' => 'dishes_menu',
						'nopaging' => true,
					);
					$the_query = new WP_Query( $query_args );
				?>
				<div class="center">
					<?php if ( $the_query->have_posts() ) : ?>
						<ul class="dishes-menu cols-2 margin-large">
							<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>				
								<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
						</div>
					<?php else: ?>
						<p class="cristiano-info">
							<?php echo esc_html_e('No menu items found.', 'restocore'); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>				
		<?php endif; ?>
			<?php if($atts['url']): ?>
				<div class="view-full-menu">
					<a href="<?php echo $atts['uri']; ?>" class="btn-color"><?php esc_html_e( 'View Full Menu', 'restocore' ) ?></a>
				</div>	
			<?php endif; ?>	
		<?php	
				
	return ob_get_clean();
}