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

	//control image gallery display
	var subjectImages = jQuery('#subject li');
	var imagesGallery = jQuery('#image_gallery div.holder');
	console.log(imagesGallery);

	subjectImages.on('click', function() {
		var galleryNumber = jQuery(this).attr('class');
		jQuery.each(imagesGallery, function() {
			var item = jQuery(this);
			if(item.hasClass(galleryNumber)){
				item.addClass('active');
			} else {
				item.removeClass('active');
			}
		})
	});

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
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: false,
			arrows: true,
			waitForAnimate: false
		});
	}

	// Header Navigation active state
	headerNavigation.on('click', function() {
		var item = jQuery(this);
		headerNavigation.not(item).removeClass('active');
		item.addClass('active');
	})
});