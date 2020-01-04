<header class="header-container <?php echo cristiano_header_class(); ?>">
	<div class="header-wrap">
		<div id="top-bar">
			<div class="<?php echo cs_get_customize_option('full_width_header', null) ? 'full-width-header' : 'center'; ?> clearfix">
				<?php get_template_part('template-parts/widget', 'social'); ?>
				<?php 
					wp_nav_menu( array(
						'theme_location'	=> 'top_menu',
						'menu_class'		=> 'additional-links',
						'container'         => 'ul',
						'fallback_cb'		=>	'__return_empty_string',			
					));	
				?>	
				<?php if(function_exists('restocore')): ?>
				<ul class="header-info">
					<li><i class="fa fa-map-marker"></i><?php echo restocore_option('address_location'); ?></li>					
					<li><i class="fa fa-phone"></i><a href="tel:<?php restocore_mobile_number(); ?>"><?php restocore_mobile_number(); ?></a></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="header header-v1">
			<div class="flex-header <?php echo cs_get_customize_option('full_width_header', null) ? 'full-width-header' : 'center'; ?> clearfix">
				<div id="nav-listener" class="nav-icon-left">
					<span></span>
					<span></span>
					<span></span>
				</div>
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
				<nav id="nav">
					<?php 
						cristiano_shopping_cart();
						cristiano_lang_switcher();
						wp_nav_menu( array(
							'theme_location'	=> 'primary',
							'menu_class'		=> 'primary-menu',
							'container'         => 'ul',				
						));
					?>
				</nav>
			</div>
		</div>
	</div>
</header>