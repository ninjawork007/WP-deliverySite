<span class="cart-link">
	<i class="fa fa-shopping-bag"></i>
	<span class="count">
		<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>
	</span>
	<?php if( cs_get_customize_option('wc_shoping_cart_amount', false )): ?>
		<span class="total">
			<?php echo wp_kses_data( WC()->cart->get_cart_total() );?>
		</span>	
	<?php endif; ?>
</span>