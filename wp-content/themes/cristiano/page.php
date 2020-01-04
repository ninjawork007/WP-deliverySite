<?php get_header(); ?>
<?php get_template_part( 'template-parts/page-headers/heading', restocore_get_meta_data( 'page_header', 'minimal' ) ); ?>
<div id="layout" class="<?php echo cristiano_site_layout(); ?>">
	<?php if ( have_posts() ) : ?>
			<div id="container" class="color-content">
				<div class="center">
					<main id="content">
						<div <?php post_class()?>>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
							<?php if ( comments_open() || get_comments_number() ) {
								comments_template();
							} ?>
						</div>
					</main>
					<?php get_sidebar(); ?>
				</div>			
			</div>
	<?php endif; ?>
	<?php if( function_exists('restocore') ) { restocore_google_map(); } ?>
</div>
<?php get_footer(); ?>