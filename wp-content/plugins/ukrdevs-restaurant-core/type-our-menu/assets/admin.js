jQuery(document).ready(function($) {
	jQuery('.cristiano-featured-product').on('click', function(e) {
		e.preventDefault();
		var element = jQuery(this),
			product_id = element.attr('data-product-id');
		element.addClass(' ajax-load');
		var data = {
			action: 'cristiano_featured_product',
			id: product_id,
		};
		jQuery.get( ajaxurl, data, function(response) {
			if(element.hasClass('fa fa-star-o')) {
				element.removeClass('fa-star-o ajax-load').addClass('fa-star');
			} else {
				element.removeClass('fa-star ajax-load').addClass('fa-star-o');						
			}
		});					
	});
});