jQuery(function($){

	// Custom JS
	
	$('.sliders').slick({
		dots: false,
		infinite: false,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: false,
		variableWidth: true,
		asNavFor: '.sliders-nav-wrapper',
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false
		
	});
	  
	$('.sliders-nav-wrapper').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.sliders',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		infinite: false,
		variableWidth: true,
		arrows: false
	  });	
	
	$('.navigation.post-navigation').addClass('container');  

	$('.image-news').hover(function () {
			// over
			$(this).addClass('kenburns-bottom');
			
		}, function () {
			// out
			$(this).removeClass('kenburns-bottom');
		}
	);
	
	$('.article img').hover(function () {
		// over
		$(this).addClass('kenburns-top');
		
	}, function () {
		// out
		$(this).removeClass('kenburns-top');
	}
	
);
});
