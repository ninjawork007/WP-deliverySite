<div class="<?php echo (cs_get_option('public_email') ? 'cols-4' : 'cols-3') ?> margin-large">
	<div>
		<div class="box phones">
			<h3 class="font-title">
				<?php esc_html_e( 'Phone', 'cristiano' ); ?>
			</h3>
			<ul>
				<?php restocore_mobile_numbers(); ?>
			</ul>
			<span class="color-pr-bg fa fa-phone"></span>
		</div>
	</div>
	<div>
		<div class="box address">
			<h3 class="font-title">
				<?php esc_html_e( 'Address', 'cristiano' );  ?>
			</h3>				
			<ul>
				<li>
					<a href="http://maps.google.com/?q=<?php echo restocore_option('address_location'); ?>" target="_blank"><?php echo restocore_option('address_location'); ?></a>
					<br>
					<?php echo restocore_option('address_notes'); ?>
				</li>
			</ul>
			<span class="color-pr-bg fa fa-map-marker"></span>
		</div>
	</div>
	<div>
		<div class="box hours">
			<h3 class="font-title">
				<?php esc_html_e( 'Working Hours', 'cristiano' ); ?>
			</h3>
			<ul>
				<?php echo restocore_working_hours(); ?>
			</ul>
			<span class="color-pr-bg fa fa-clock-o"></span>
		</div>
	</div>
	<?php if(cs_get_option('public_email')):?>
	<div>
		<div class="box email">
			<h3 class="font-title">
				<?php esc_html_e( 'Email', 'cristiano' ); ?>
			</h3>
			<ul>
				<a href="mailto:<?php echo cs_get_option('public_email'); ?>"><?php echo cs_get_option('public_email'); ?></a>
			</ul>
			<span class="color-pr-bg fa fa-envelope-o"></span>
		</div>
	</div>
	<?php endif; ?>
</div>