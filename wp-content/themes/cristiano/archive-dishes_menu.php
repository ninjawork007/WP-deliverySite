<?php get_header(); ?>

	<div id="page-header" style="background-image: url(<?php echo header_image(); ?>)">
		<div class="center">
			<h1><?php echo post_type_archive_title(); ?></h1>
		</div>
	</div>		
	<?php if ( have_posts() ) : ?>
		<div id="layout" class="<?php do_action('cristiano_site_layout'); ?>">
			<div id="container">
				<div id="content" class="center">			
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/loop', 'blog' ); ?>				
					<?php endwhile; ?>
					<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>			
				</div>
			</div>
		</div>
	<?php endif; ?>
		
<?php get_footer(); ?>