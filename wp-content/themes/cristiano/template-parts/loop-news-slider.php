<div class="item swiper-slide <?php echo (cs_get_option('dzsparallaxer')) ? 'dzsparallaxer auto-init height-is-based-on-content  use-loading' : 'simple-parallax'; ?>">
	<div class="divimage dzsparallaxer--target" style='background-image: url("<?php the_post_thumbnail_url(); ?>")'></div>
	<div class="center">
		<div class="cols-2 margin-large latest-news-inner">
			<div>
				<?php the_post_thumbnail( 'medium' ); ?>
			</div>
			<div>
				<time class="date pr-font" datetime="<?php the_time('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
				<h2 class="font-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
				<?php cristiano_excerpt_content(); ?>
				<a class="btn btn-transparent" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'cristiano') ?></a>
			</div>
		</div>
	</div>
	<span class="alpha-gradient"></span>
</div>