jQuery(function() {
	//Homepage slider
	jQuery("#slider").slick({  dots: true,
		infinite: true,
		autoplay: true,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: true,
		dots: false,
		arrows: false,
		autoplaySpeed: 4000,
    });

	jQuery('ul.dropdown-menu [data-toggle=dropdown],#menu-header-navigation a[data-toggle=dropdown]').on('click', function(event) {
	        // Avoid following the href location when clicking
	        event.preventDefault(); 
	        // Avoid having the menu to close when clicking
	        event.stopPropagation(); 
	        // If a menu is already open we close it
	        $('ul.dropdown-menu [data-toggle=dropdown],#menu-header-navigation a[data-toggle=dropdown]').parent().removeClass('open');
	        // opening the one you clicked on
	        $(this).parent().addClass('open');
	    });

	//Hover override
	//$('.dropdown').hover(function() {
	//		$(this).toggleClass('open');
	//});

	jQuery('body.shopp-product #menu-header-navigation .dropdown-menu').css('display','inherit !important');
});