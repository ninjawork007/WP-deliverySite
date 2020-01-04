<?php get_header(); ?>		
	<div id="page-header" class="<?php echo cristiano_parallax(); ?>">
		<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo restocore_get_menu_cat_img(get_queried_object_id()); ?>)"></div>	
			<div class="container">	
				<div class="center">
					<div class="heading-title">
						<h1 class="font-heading color-tr <?php cristiano_dynamic_shadow(); ?>"><?php echo cristiano_menu_cat_title(); ?></h1>
					</div>
				</div>
			</div>
		<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
	</div>	
	

		<div id="layout" class="<?php do_action('cristiano_site_layout'); ?>">
			<div id="container">
				<div id="content">
					<div class="center">
						<?php 
							$args = array (
								'taxonomy' => 'dishes_categories',
								'hide_empty' => 0,
								'title_li' => 0,
								'depth' => 1,
								'hierarchical' => 0,
								'parent'	=> 0,
							);
							$queried_object = get_queried_object();			
						?>		
						<ul id="categories-nav" class="pr-font">	
							<?php wp_list_categories( $args ); ?>
						</ul>
						<?php if(have_posts()): ?>
							<ul class="dishes-menu cols-2 margin-large <?php restocore_dishes_img_size($queried_object->term_id); ?>">	
								<?php while (have_posts()) : the_post(); ?>
									<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
								<?php endwhile; ?>
							</ul>				
						<?php endif; ?>
					</div>
					<?php		
						$subcat_args = array(
							'taxonomy'		=> 'dishes_categories',
							'child_of'	=> $queried_object->term_id,
						);
						$subcats = get_categories( $subcat_args );			
					?>	
					
					<?php foreach($subcats as $subcat): ?>
						
						<?php 
							$style = '';
							$class = '';
							$cat_img_url = restocore_get_menu_cat_img($subcat->term_id);
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
										<?php cristiano_section_title_template($subcat->name); ?>
										<div class="description">
											<?php echo term_description($subcat->term_id, 'dishes_categories'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>									
						<?php
							$query_args = array(
								'post_type' => 'dishes_menu',
								'nopaging' => true,
								'dishes_categories' => $subcat->slug,
							);
							$the_query = new WP_Query( $query_args );
						?>
						<?php if ( $the_query->have_posts() ) : ?>
							<div class="center">
								<ul class="dishes-menu margin-large <?php restocore_dishes_img_size($subcat->term_id); ?>">
									<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
										<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php else: ?>		
							<p class="cristiano-info">
								<?php echo esc_html_e('No menu items found.', 'cristiano'); ?>
							</p>
						<?php endif; ?>														
					<?php endforeach; ?>			
				</div>
			</div>
		</div>	
<?php get_footer(); ?>