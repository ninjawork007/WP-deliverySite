<header class="header-container <?php echo cristiano_header_class(); ?>">
	<div class="header-wrap">
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