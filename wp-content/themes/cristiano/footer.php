	<footer id="footer" class="footer">
		<?php if(function_exists('restocore')) : ?>
			<div class="like-table reset">
				<?php if ( is_active_sidebar('footer_region') ) : ?>
					<?php dynamic_sidebar('footer_region'); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div id="bottom-bar">
			<div class="center">
				<?php echo wpautop( cs_get_option('footer_copyright', '&copy; Copyright 2017. All Rights Reserved.') ); ?>
				<?php 
				if ( has_nav_menu( 'footer_links' ) ) {
					wp_nav_menu( array(
						'theme_location'	=> 'footer_links',
						'menu_class'		=> 'footer-links',
						'container'         => 'ul',				
					));			
				}
				?>					
			</div>
		</div>	
	</footer>	
	<div class="overlay"></div>
<?php wp_footer(); ?>
</body>
</html>