<?php get_header(); ?>
	<div class="header-placeholder"></div>
	<div id="page-title">
		<div class="center">
			<h1 class="font-heading"><?php esc_html_e('Search Results for:', 'cristiano'); ?> <?php the_search_query(); ?></h1>
		</div>
	</div>	
	<div id="container">
		<div class="blur" style='background-image:url(<?php echo header_image(); ?>)'></div>											
		<div class="inner-container center">
			<?php if ( have_posts() ) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/loop', 'blog' ); ?>				
					<?php endwhile; ?>
					<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>			
			<?php else: ?>
			<div class="no-results">
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cristiano' ); ?></p>
				<?php get_search_form(); ?>	
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>