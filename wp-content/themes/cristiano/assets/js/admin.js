jQuery(document).ready(function($) {
	
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
   
});