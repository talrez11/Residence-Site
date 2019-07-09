jQuery(window).ready(function() {
	var headerNavigation = jQuery('#menu-main-menu a');

	// Detecting mobile devices
	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};

	if(!isMobile.any()) {
		// Header gallery
		jQuery('.header').slick({
			autoplay: true,
			autoplaySpeed: 2000,
			pauseOnFocus: false,
			pauseOnHover: false,
			fade: true,
			auto: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			adaptiveHeight: true,
			arrows: false
		});

		jQuery('.images').slick({
			pauseOnFocus: false,
			pauseOnHover: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: true,
			arrows: true,
			infinite: true
		});
	}

	// Header Navigation active state
	headerNavigation.on('click', function() {
		var item = jQuery(this);
		headerNavigation.not(item).removeClass('active');
		item.addClass('active');
	})
});