<?php
function restocore_our_menu_cats( $atts ) {
	ob_start();
	$atts = shortcode_atts(array(
		'title'	=> esc_html__('Our Menus','cristiano'),
		'subtitle' => esc_html__('Discover', 'cristiano'),
        'carousel'	=> false,
        'cols'	=> '4',
        'cat'	=> '',
    ), $atts);	
	
	?>
	<section id="our-menu-cats" class="section-block">
		<div class="center">
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
			<?php
				$args = array(
					'hide_empty' => 0,
					'parent'	=> 0,			
					'include'	=> $atts['cat'],
				);
				$categories = get_terms( 'dishes_categories', $args );
				
			?>	
			<?php if( $categories ): ?>	
				<div id="menu-cat-wrap" class="<?php echo ($atts['carousel']) ? 'items-swiper swiper swiper-container-horizontal' : ''; ?>"> 
					<ul class="our-menu-cats rect-item-list <?php echo ($atts['carousel']) ? 'swiper-wrapper' : 'cols-' . esc_attr( $atts['cols'] ) . ' margin-large flex' ; ?>">
						<?php foreach( $categories as $cat ): ?>	
						
						<?php
							$image = '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.png' . '" alt="">';
							$term_data = get_term_meta( $cat->term_id, '_restocore_our_menu_taxonomy_options', true );
							if( !empty($term_data) ) {
								$img_id = $term_data['restocore_menu_cat_img'];
								if($img_id) {
									$image = wp_get_attachment_image($img_id, 'cristiano_categories' );
								}
							}		
						?>
						<li class="item">
							<a href="<?php echo get_term_link($cat->term_id, 'dishes_categories'); ?>" >
								<?php echo $image; ?>
								<h2 class="font-heading color-tr"><?php echo $cat->name; ?></h2>
								<span class="gradient-to-top"></span>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php if($atts['carousel']) : ?>
						<div class="swiper-cat-prev fa fa-caret-left"></div>
						<div class="swiper-cat-next fa fa-caret-right"></div>	
					<?php endif; ?>						
				</div>
				<?php if($atts['carousel']) : ?>
					<div class="menu-cats-pagination"></div>								
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</section>
		<script>
		    var swiper = new Swiper('#menu-cat-wrap',{	 
			    cleanupStyles: true,
			    slidesPerView: <?php echo esc_js($atts['cols']); ?>,
			    spaceBetween: 30,
		        navigation: {
					nextEl: '.swiper-cat-next',
					prevEl: '.swiper-cat-prev',    
				},
				pagination: {
					el: '.menu-cats-pagination',
					clickable: true,
				},				
		  		slideClass: 'item',
				breakpoints: {
		            1024: {
		                slidesPerView: 4,
		                spaceBetween: '3.333333%'
		            },
		            768: {
		                slidesPerView: 3,
		                spaceBetween: '3.333333%'
		            },
		            600: {
		                slidesPerView: 2,
		                spaceBetween: 15
		            },
		            270: {
		                slidesPerView: 1,
		                spaceBetween: 1
		            }
		        }	    
		    });				
		</script>		
	</script>	
	<?php
	return ob_get_clean();
}