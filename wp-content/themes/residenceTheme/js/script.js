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

		jQuery.each(jQuery('#image_gallery ul'), function() {
			jQuery(this).slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: true,
				waitForAnimate: true,
				focusOnSelect: true,

			});
		});
	}

	// control image gallery display
	var subjectImages = jQuery('#subject li');
	var imagesGallery = jQuery('#image_gallery ul');

	jQuery('#image_gallery ul.one').addClass('show');

	subjectImages.on('click', function() {
		var galleryNumber = jQuery(this).attr('class');
		jQuery.each(imagesGallery, function() {
			var item = jQuery(this);
			if(item.hasClass(galleryNumber)){
				item.addClass('show');
			} else {
				item.removeClass('show');
			}
		})
	});

	// Header Navigation active state
	headerNavigation.on('click', function() {
		var item = jQuery(this);
		headerNavigation.not(item).removeClass('active');
		item.addClass('active');
	})

	jQuery(headerNavigation).on('click', function() {
		var id = jQuery(this).attr('href');
		jQuery("html, body").animate({ scrollTop: jQuery(id).offset().top - 50}, 1000);
	});
});