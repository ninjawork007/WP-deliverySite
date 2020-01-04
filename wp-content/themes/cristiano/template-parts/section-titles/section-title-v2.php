<div class="section-title v2">
	<h3 class="font-heading color-content"> <?php echo get_query_var('section_title'); ?></h3>		
	<?php if(get_query_var('section_subtitle')): ?>
		<p class="subtitle color-pr-tx"><?php echo get_query_var('section_subtitle'); ?></p>
	<?php endif; ?>
</div>