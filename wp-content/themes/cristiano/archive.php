<?php get_header(); ?>	
	<div id="page-header" class="<?php echo cristiano_parallax(); ?>">
		<div class="divimage dzsparallaxer--target" style="background-image:url(<?php cristiano_header_image(); ?>)"></div>	
			<div class="container">	
					<div class="center">
						<h1 class="font-heading color-tr <?php cristiano_dynamic_shadow(); ?>"><?php the_archive_title(); ?></h1>
					</div>
			</div>
		<span class="shading <?php echo cs_get_customize_option('shading_overlay', 'gradient'); ?>"></span>
	</div>	
	<?php if ( have_posts() ) : ?>
			<div id="container">
				<div class="inner-container center">
					<main id="content" class="center">	
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part( 'template-parts/loop', 'blog' ); ?>				
						<?php endwhile; ?>
						<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>			
					</main>
				</div>
			</div>
	<?php endif; ?>
		
<?php get_footer(); ?>