<header class="header-container header-container-v2 <?php do_action('cristiano_header_class'); ?>">
	<div class="header-wrap">	
		<div id="top-bar">
			<div class="center clearfix">				
				<p class="message"><?php echo cs_get_option('ukrdevs_welcome_msg'); ?></p>	
				<?php 
					wp_nav_menu( array(
						'theme_location'	=> 'top_menu',
						'menu_class'		=> 'additional-links',
						'container'         => 'ul',
						'fallback_cb'		=>	'__return_empty_string',			
					));
				?>						
			</div>
		</div>		
		<div class="header header-v2">
			<div class="<?php echo cs_get_customize_option('full_width_header', null) ? 'full-width-header' : 'center'; ?>">
				<div class="cols-3 like-table flex-header">
					<div class="td-1">
						<?php if( function_exists('restocore') ): ?>
							<ul class="header-info">
								<li><i class="fa fa-map-marker"></i><?php echo restocore_option('address_location'); ?></li>					
								<li><i class="fa fa-phone"></i><?php restocore_mobile_number(); ?></li>
							</ul>
						<?php endif; ?>							
					</div>	
					<div class="td-2">	
						<div class="logo">
							<?php the_custom_logo(); ?>
							<?php if( get_header_textcolor() !== 'blank'): ?>
								<div class="text-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<span class="title font-heading"><?php bloginfo( 'name' ); ?></span>
										<span class="description font-title"><?php bloginfo( 'description', 'display' );  ?></span>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="td-3">
						<?php get_template_part('template-parts/widget', 'social'); ?>
					</div>
				</div>
				<div id="nav-listener" class="nav-icon-left">
					<span></span>
					<span></span>
					<span></span>
				</div>				
			</div>			
		</div>
	</div>	
	<nav id="nav" class="nav-color">
		<div class="<?php echo cs_get_customize_option('full_width_header', null) ? 'full-width-header' : 'center'; ?>">			
			<?php 
				cristiano_shopping_cart();
				wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'menu_class'		=> 'primary-menu',
					'container'         => 'ul',				
				));
			?>
		</div>
	</nav>
</header>