/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

	// Update the site title in real time...
	wp.customize('blogname', function (value) {
		value.bind(function (newval) {
			$('#site-title a').html(newval);
		});
	});

	//Update the site description in real time...
	wp.customize('blogdescription', function (value) {
		value.bind(function (newval) {
			$('.site-description').html(newval);
		});
	});

	//Update site title color in real time...
	wp.customize('header_textcolor', function (value) {
		value.bind(function (newval) {
			$('#site-title a').css('color', newval);
		});
	});

	//Update site background color...
	wp.customize('background_color', function (value) {
		value.bind(function (newval) {
			$('body').css('background-color', newval);
		});
	});

	//Update site link color in real time...
	wp.customize('link_textcolor', function (value) {
		value.bind(function (newval) {
			$('a').css('color', newval);
		});
	});

	// Theme Colors
	wp.customize('theme_primary', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-primary', newval, 'important');
		});
	});
	wp.customize('theme_secondary', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-secondary', newval, 'important');
		});
	});
	wp.customize('theme_accent', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-accent', newval, 'important');
		});
	});
	wp.customize('theme_dark', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-dark', newval, 'important');
		});
	});
	wp.customize('theme_positive', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-positive', newval, 'important');
		});
	});
	wp.customize('theme_negative', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-negative', newval, 'important');
		});
	});
	wp.customize('theme_info', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-info', newval, 'important');
		});
	});
	wp.customize('theme_warning', function (value) {
		value.bind(function (newval) {
			document.documentElement.style.setProperty('--q-color-warning', newval, 'important');
		});
	});

	// Header
	wp.customize('layout_header_enabled', function (value) {
		value.bind(function (newval) {
			$('.q-header').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_header_reveal', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataHeaderReveal = newval
		});
	});
	wp.customize('layout_header_backgroundcolor', function (value) {
		value.bind(function (newval) {
			$('.q-header').css('background-color', newval, '!important');
		});
	});
	wp.customize('layout_header_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataHeaderSeparator = newval
		});
	});
	wp.customize('layout_header_icon', function (value) {
		value.bind(function (newval) {
			$('.q-header .q-avatar').css('display', newval ? 'inline-block' : 'none');
		});
	});
	wp.customize('layout_header_blogname', function (value) {
		value.bind(function (newval) {
			$('.q-header .qwp-blogname').css('display', newval ? 'inline-block' : 'none');
		});
	});

	// Footer
	wp.customize('layout_footer_enabled', function (value) {
		value.bind(function (newval) {
			$('.q-footer').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_footer_reveal', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataFooterReveal = newval
		});
	});
	wp.customize('layout_footer_backgroundcolor', function (value) {
		value.bind(function (newval) {
			$('.q-footer').css('background-color', newval, '!important');
		});
	});
	wp.customize('layout_footer_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataFooterSeparator = newval
		});
	});
	wp.customize('layout_footer_icon', function (value) {
		value.bind(function (newval) {
			$('.q-footer .q-avatar').css('display', newval ? 'inline-block' : 'none');
		});
	});
	wp.customize('layout_footer_blogname', function (value) {
		value.bind(function (newval) {
			$('.q-footer .qwp-blogname').css('display', newval ? 'inline-block' : 'none');
		});
	});

	// Left Drawer
	wp.customize('layout_ldrawer_enabled', function (value) {
		value.bind(function (newval) {
			if (!qwpVueObj.qwpDataLeftDrawerShowIfAbove) qwpVueObj.qwpLeft = false
			$('#qwp-btn-left-menu').css('display', newval ? 'inline-block' : 'none');
		});
	});
	wp.customize('layout_ldrawer_show_if_above', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerShowIfAbove = newval
			qwpVueObj.qwpLeft = newval
		});
	});
	wp.customize('layout_ldrawer_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerSeparator = newval
		});
	});
	wp.customize('layout_ldrawer_overlay', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerOverlay = newval
		});
	});

	// Right Drawer
	wp.customize('layout_rdrawer_enabled', function (value) {
		value.bind(function (newval) {
			if (!qwpVueObj.qwpDataRightDrawerShowIfAbove) qwpVueObj.qwpRight = false
			$('#qwp-btn-right-menu').css('display', newval ? 'inline-block' : 'none');
		});
	});
	wp.customize('layout_rdrawer_show_if_above', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerShowIfAbove = newval
			qwpVueObj.qwpRight = newval
		});
	});
	wp.customize('layout_rdrawer_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerSeparator = newval
		});
	});
	wp.customize('layout_rdrawer_overlay', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerOverlay = newval
		});
	});


})(jQuery);
