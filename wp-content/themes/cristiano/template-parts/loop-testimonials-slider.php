<div class="swiper-slide">
	<?php if( get_the_content() || get_the_title() ): ?>
		<div class="content">	
			<?php if(has_post_thumbnail()): ?>
				<?php the_post_thumbnail('cristiano_small_image') ?>
			<?php else: ?>	
				<i class="fa fa-quote-left" aria-hidden="true"></i>
			<?php endif; ?>
			<blockquote ><?php the_content(); ?></blockquote>
			<h2 class="font-heading color-pr-tx"><?php the_title(); ?></h2>	
		</div>
	<?php endif; ?>
</div>