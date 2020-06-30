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

})(jQuery);
