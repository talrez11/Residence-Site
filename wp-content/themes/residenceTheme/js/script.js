jQuery(window).ready(function() {
	var headerNavigation = jQuery('#menu-main-menu a');
	var loaderSign = jQuery('#sign div.loader');
	var loaderContact = jQuery('#contact div.loader');
	var successResponseNewsletter = '<h4>Thank You!</h4>';
	var errorMessageNewLetter = '<h4>Email not valid!';
	var showMoreText = 'Read More';
	var showLessText = 'Read Less';
	var position = jQuery('#about').position().top;

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

	jQuery(window).on('scroll', function(event) {
		var scroll = jQuery(this).scrollTop();
		if(scroll > position) {
			jQuery('a#up').addClass('show');
		} else {
			jQuery('a#up').removeClass('show');
		}
	});

	//Read more button event
	jQuery('#more').on('click', function(event) {
		event.preventDefault();
		jQuery(this).toggleClass('show');
		jQuery('#about p').toggleClass('show');
		if(jQuery(this).hasClass('show')) {
			jQuery(this).text(showLessText);
		} else {
			jQuery(this).text(showMoreText);
		}
	});

	jQuery('#sign').on('submit', function(event) {
		event.preventDefault();
		loaderSign.addClass('show');
		var ajax_form_data = jQuery(this).serialize();
		console.log(ajax_form_data);
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type:   'post',
			data:   ajax_form_data,
			async: true,
		}).done (function (response) {
			console.log(response);
			jQuery('#sign .response').addClass('show');
			if(response == 1) {
				jQuery('#sign .response').html(successResponseNewsletter);
			} else {
				jQuery('#sign .response').html(errorMessageNewLetter);
			}
			loaderSign.removeClass('show');
			setTimeout(removeResponseMessage, 5000);
		});
	});

	function removeResponseMessage() {
		jQuery('#sign .response').removeClass('show');
		jQuery('#sign .response').html(' ');
	}

	if(!isMobile.any()) {
		// Header gallery
		jQuery('.header').slick({
			autoplay: true,
			autoplaySpeed: 5000,
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
				slidesToScroll: 3,
				arrows: false,
				dots: true,
				waitForAnimate: false,
				focusOnSelect: false
			});
		});

		jQuery('#recommend').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			waitForAnimate: true,
			focusOnSelect: true,
		});

	} else if(isMobile.any()) {
		jQuery('.header').slick({
			autoplay: true,
			autoplaySpeed: 5000,
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

		jQuery('#image_gallery ul').first().addClass('show');

		jQuery.each(jQuery('#image_gallery ul'), function() {
			jQuery(this).slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots: true,
				waitForAnimate: true,
				focusOnSelect: true
			});
		});

		jQuery('#recommend').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			waitForAnimate: true,
			focusOnSelect: true,
			adaptiveHeight: true
		});
	}

	// control image gallery display
	var subjectImages = jQuery('#subject li');
	var imagesGallery = jQuery('#image_gallery ul');

	subjectImages.on('click', function() {
		var galleryNumber = jQuery(this).attr('class');
		jQuery('#image_gallery').addClass('show');
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
	});

	jQuery(headerNavigation).on('click', function() {
		var id = jQuery(this).attr('href');
		jQuery("html, body").animate({ scrollTop: jQuery(id).offset().top - 50}, 1000);
	});

	jQuery('a#up').on('click', function() {
		var id = jQuery(this).attr('href');
		jQuery("html, body").animate({ scrollTop: jQuery(id).offset().top - 150}, 1000);
	});

});