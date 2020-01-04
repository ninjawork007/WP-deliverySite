<?php
function restaurantcore_product_categories( $atts ) {
	ob_start();
	
	$atts = shortcode_atts(array(
        'title' 	=> esc_html__('Order Online', 'cristiano'),
        'subtitle'	=> esc_html__('From 11:00am to 10:00pm', 'cristiano'),
        'carousel'	=> false,
        'cols'	=> '4',
        'cat'	=> '',
    ), $atts); 	    
	?>	
		<section id="order-online" class="section-block">
			<div class="center">
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>			
			<?php
				$args = array(
					'include'	=> $atts['cat'],
				);
				$product_categories = get_terms( 'product_cat', $args );
				
			?>
			<?php if ( $product_categories ) : ?>				
				<div id="categories-wrapper" class="<?php echo ($atts['carousel']) ? 'items-swiper swiper swiper-container-horizontal' : ''; ?>"> 
					<ul id="categories-list" class="rect-item-list <?php echo ($atts['carousel']) ? 'swiper-wrapper' : 'cols-' . esc_attr( $atts['cols'] ) . ' margin-large flex' ; ?> ">
						<?php
						foreach ( $product_categories as $category ) {
								wc_get_template( 'content-product_cat.php', array(
									'category' => $category
								) );
							}
						?>
					</ul>
					<?php if($atts['carousel']) : ?>
						<div class="swiper-cat-prev fa fa-caret-left"></div>
						<div class="swiper-cat-next fa fa-caret-right"></div>	
					<?php endif; ?>					
				</div>
				<?php if($atts['carousel']) : ?>
					<div class="swiper-pagination"></div>								
				<?php endif; ?>
			<?php endif; ?>
			</div>
		</section>
		<script>
		    var swiper = new Swiper('#categories-wrapper',{	 
			    cleanupStyles: true,
			    slidesPerView: <?php echo esc_js($atts['cols']); ?>,
			    spaceBetween: 30,
		        navigation: {
					nextEl: '.swiper-cat-next',
					prevEl: '.swiper-cat-prev',    
				},
				pagination: {
					el: '.swiper-pagination',
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
	<?php
	return ob_get_clean();
}