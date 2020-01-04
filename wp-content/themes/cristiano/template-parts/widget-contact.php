<ul class="contact-info">
	<li><?php echo restocore_option('address_location'); ?></li>
	<?php restocore_mobile_number('li'); ?>
	<?php restocore_working_hours(); ?>	
	<?php if(cs_get_option('public_email')): ?>
		<li><a href="mailto:<?php echo cs_get_option('public_email'); ?>"><?php echo cs_get_option('public_email'); ?></a></li>
	<?php endif; ?>
</ul>