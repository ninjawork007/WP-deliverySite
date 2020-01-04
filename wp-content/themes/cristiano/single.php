<?php get_header(); ?>
	<?php get_template_part( 'template-parts/page-headers/heading', restocore_get_meta_data( 'page_header', 'featured' ) ); ?>
		<div id="layout" class="<?php echo cristiano_site_layout(); ?>">

		<div id="container" class="color-content">
			<div id="single-post" class="inner-container center">
				<?php if ( have_posts() ) : ?>
					<main id="content">
						<?php while (have_posts()) : the_post(); ?>
							<article <?php post_class()?>>		
								<ul class="entry-meta">
									<li>
										<i class="fa fa-calendar-o"></i>
										<time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
									</li>
									<li>
										<i class="fa fa-comment"></i>
										<a href="<?php the_permalink() ?>#comments"><?php comments_number(); ?></a>
									</li>
									<li>
										<i class="fa fa-tag"></i>
										<?php the_category(); ?>
									</li>
								</ul>
								<div class="post-content">
									<?php the_content(); ?>
								</div>
								<?php if(has_tag()): ?>
									<div class="tags">
										<i class="fa fa-tags" aria-hidden="true"></i>	
										<?php the_tags('','',''); ?>
									</div>
								<?php endif; ?>
							</article>
						<?php endwhile; ?>
						<?php 
							$args = array(
								'before' => '<div id="post-nav">',
								'after'	 => '</div>',
							);
							wp_link_pages( $args ); 
						?>
						<?php if ( comments_open() || get_comments_number() ): ?>
							<?php comments_template(); ?>
						<?php else: ?>
							<h3><?php esc_html_e( 'Comments are closed', 'cristiano' ); ?></h3>
						<?php endif;?>
					</main>
				<?php endif; ?>
				<?php get_sidebar(); ?>			
			</div>
		</div>
	</div>
<?php get_footer(); ?>	