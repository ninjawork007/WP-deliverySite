"use strict";

jQuery(window).scroll(function() {
	var wpadminbar =  jQuery('#wpadminbar').outerHeight()
	var topBarHeight = jQuery('#top-bar').outerHeight();
	var headerV2Height = jQuery('.header-v2').outerHeight();
	var headerContainer = (jQuery('.header-container'));
	var headerHeight = headerContainer.outerHeight();
	if (jQuery(this).scrollTop() > headerHeight){
		jQuery('.sticky-tr').removeClass("transparent-header").css('top', -topBarHeight - headerV2Height);
		jQuery('.sticky').css('top', -topBarHeight - headerV2Height + wpadminbar);
	}
	else{
		jQuery('.sticky-tr').addClass("transparent-header").css('top', 0);
		jQuery('.sticky').css('top', 0);
	}
	
});

jQuery(document).ready(function($) {
	jQuery('.header-placeholder').css('height', jQuery('.header-container').outerHeight());

	/* SHOW NAV MENU
	   ========================================================================== */
	   	   
	$( '#nav-listener' ).click(function() {
		$('body').toggleClass('active-nav-aside');
	});
	

	/* SHOW MINI CART
	   ========================================================================== */	
	$( '.cart-listener' ).click(function() {
		$('body').toggleClass('show-sub-cart');
	});
	$( '.overlay' ).click(function() {
		$('body').removeClass('show-sub-cart');
	});		
/* SMOOTH SCROLLING
   ========================================================================== */      
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 79)
        }, 1000 );
        return false;
      }
  });

	
	var dateElement = $('.datepicker');
	dateElement.datepicker({
		minDate: 0,
		dateFormat: dateElement.attr('format'),
	});
	$('.datepicker').datepicker( "setDate", "getDate" );
	$('.tabs').tabs({show: 'fade', hide: 'fade'});
	
	// RWD Navigation
	function initMainNavigation( container ) {
		// Add dropdown toggle that display child menu items.
		container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle">'  + '</button>' );
		container.find('a[href$="#"]').addClass('dropdown-toggle').next().remove();
		
	
		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );
	
		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
		} );
	}
	initMainNavigation( $( '#nav' ) );
	

	
	
	$('.gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery:{
			enabled:true
		}
	});	
		
    var swiper = new Swiper('#testimonials-slider .swiper-container',{    
        navigation: {
			nextEl: '.next',
			prevEl: '.prev',    
		},	
        cleanupStyles: true,
        loop: true,	                              
    });		
	
	//Latest News Slider		
    var swiper = new Swiper('#latest-news .swiper-container',{    
        navigation: {
			nextEl: '#latest-news .slider-button-next',
			prevEl: '#latest-news .slider-button-prev',    
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},	    
	    cleanupStyles: true,
        autoHeight: true,
    });	
	
	//Swiper Promo Slider	
    var swiper = new Swiper('.promo-slider',{	    
        navigation: {
			nextEl: '.slider-button-next',
			prevEl: '.slider-button-prev',    
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},	    
	    cleanupStyles: true,
        autoplay: 6000,
        autoHeight: true,
    });
    
    var swiper = new Swiper('#page-slider',{
	    
        navigation: {
			nextEl: '.slider-button-next',
			prevEl: '.slider-button-prev',    
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},	    
        cleanupStyles: true,
        autoplay: 6000,		       
        loop: true,
    });
    
/* TITLE SHADOW
   ========================================================================== */	
	$('.dynamic-shadow').okshadow({
		color: '#000',
		textShadow: true,
	}); 
   
    
/* OPEN TABLE DATE PICKER
   ========================================================================== */
	var otDate = $('.otw-reservation-date');
	otDate.datepicker({
		minDate: 0,
		dateFormat: otDate.attr('format'),
		onSelect: function() {
			var secconds = Date.parse(otDate.val());
			var date = new Date(secconds);
			var yy = date.getFullYear();
			var mm = date.getMonth() + 1;
			var dd = date.getDate();
			$('.startDate').val( mm + '/' + dd + '/' + yy);
		}
	});
	otDate.datepicker( 'setDate', 'getDate' );    
   
});

/* WOOCOMMERCE CART PRODUCTS
   ========================================================================== */
function cristiano_cart() {
	var product_list,
		cart_list,
		removeCartButton = jQuery('.remove_from_cart_button'),
		addToCartButton = jQuery('.ajax_add_to_cart');
		addToCartButton.each(function() {
			var myThis = jQuery(this);
	   		product_list = jQuery(this).attr('data-product_id');
	   	  	removeCartButton.each(function(){
		       	cart_list = jQuery(this).attr('data-product_id');
			  	if(product_list == cart_list) {
				  	myThis.addClass('added');
			  	}       	
		  	});		   		
		});
		removeCartButton.click(function(){
			var cart_list = jQuery(this).attr('data-product_id');
			addToCartButton.each(function() {
				if(cart_list == jQuery(this).attr('data-product_id'))
				jQuery(this).removeClass('added');
			});
		});
}

window.addEventListener('load', cristiano_cart);
jQuery( document ).ajaxSuccess(cristiano_cart);


window.onload = function(){
	if(document.getElementById('slider')) {
		var slider = document.getElementById('slider').getElementsByClassName('item');
		
		if(slider.length == 1) {
			bg_zoom();
		}
		if( slider.length > 1 ) {
			var sliderLength = slider.length;			
			var count = 0;
			bg_switch();
			setInterval(bg_switch, 7000);
		}
	}
	
	function bg_zoom(){
		slider[0].classList.add('one-bg');
	}
	
	function bg_switch(){
		slider[count].classList.add('active');
		slider[count].style.zIndex = 1;
		var scount = count;
		
		if(scount === 0) {
			slider[sliderLength - 1].style.removeProperty('z-index');
			setTimeout(function(){
				slider[sliderLength - 1].classList.remove('active');
			},3000);
		} else {
			slider[scount - 1].style.removeProperty('z-index');
			setTimeout(function(){
				slider[scount - 1].classList.remove('active');
			},3000);
		}
		(sliderLength === count + 1) ? count = 0 : count++;
	}
}