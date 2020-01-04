<?php get_header(); ?>
	<?php get_template_part( 'template-parts/page-headers/heading', restocore_get_meta_data( 'page_header', 'default' ) ); ?>
	<?php if ( have_posts() ) : ?>
		<div id="layout" class="<?php echo cristiano_site_layout(); ?>">
			<div id="container" class="color-content clearfix">
				<div class="center">
					<main id="content">
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
						<?php endwhile; ?>
						<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>
					</main>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>	