<div class="swiper-slide item <?php echo (cs_get_option('dzsparallaxer') ? 'dzsparallaxer auto-init height-is-based-on-content use-loading' : 'simple-parallax') ?>">
	<div class="divimage dzsparallaxer--target" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
	<div class="center">
		<?php if( get_the_content() || get_the_title() ): ?>
		<div class="table-cell">
			<div class="details color-content">
				<h2 class="font-heading"><?php the_title(); ?></h2>
				<div class="content">
					<?php the_content(); ?>
					<?php edit_post_link(); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>