/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

	// Theme Colors
	wp.customize('theme_background', function (value) {
		value.bind(function (newval) {
			$('#q-app').css('background-color', newval, 'important');
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
	wp.customize('layout_ldrawer_overlay', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerOverlay = newval
		});
	});
	wp.customize('layout_ldrawer_backgroundcolor', function (value) {
		value.bind(function (newval) {
			$('.q-drawer--left').css('background-color', newval, '!important');
		});
	});
	wp.customize('layout_ldrawer_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerSeparator = newval
		});
	});
	wp.customize('layout_ldrawer_behavior', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLeftDrawerBehavior = newval
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
	wp.customize('layout_rdrawer_overlay', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerOverlay = newval
		});
	});
	wp.customize('layout_rdrawer_backgroundcolor', function (value) {
		value.bind(function (newval) {
			$('.q-drawer--right').css('background-color', newval, '!important');
		});
	});
	wp.customize('layout_rdrawer_separator', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerSeparator = newval
		});
	});
	wp.customize('layout_rdrawer_behavior', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataRightDrawerBehavior = newval
		});
	});

	// Tabs
	wp.customize('layout_tabs_enabled', function (value) {
		value.bind(function (newval) {
			$('.q-tabs').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_tabs_align', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataTabsAlign = newval
		});
	});
	wp.customize('layout_tabs_backgroundcolor', function (value) {
		value.bind(function (newval) {
			$('.q-header .q-tabs').css('background-color', newval, '!important');
		});
	});

	// Home Page
	wp.customize('layout_home_author', function (value) {
		value.bind(function (newval) {
			$('.qwp-home-author').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_home_excerpt', function (value) {
		value.bind(function (newval) {
			$('.qwp-home-excerpt').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_home_postdate', function (value) {
		value.bind(function (newval) {
			$('.qwp-home-postdate').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_home_commentcounter', function (value) {
		value.bind(function (newval) {
			$('.qwp-home-commentcounter').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_home_postlayout', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataHomePostLayout = newval
		});
	});

	// Single
	wp.customize('layout_single_author', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-author').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_single_postdate', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-postdate').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_single_commentcounter', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-commentcounter').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_single_featured_image', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-featured-image').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_single_social', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-social').css('display', newval ? 'block' : 'none');
		});
	});
	wp.customize('layout_single_comments', function (value) {
		value.bind(function (newval) {
			$('.qwp-post-comments').css('display', newval ? 'block' : 'none');
		});
	});

	const socialMedias = ['whatsapp', 'telegram', 'facebook', 'twitter', 'e-mail', 'linkedin', 'reddit', 'pinterest'];
	for (let socialMedia of socialMedias) {
		wp.customize(`social_${socialMedia}_enabled`, function (value) {
			value.bind(function (newval) {
				$(`#social-icon-${socialMedia}`).css('display', newval ? 'inline-block' : 'none');
			});
		});
		wp.customize(`social_${socialMedia}_class`, function (value) {
			value.bind(function (newval) {
				$(`#social-icon-${socialMedia} .q-icon`).attr('class', `${newval} q-icon notranslate`)
			});
		});
	}

	wp.customize('settings_loading_enabled', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLoadingEnabled = newval
		});
	});
	wp.customize('settings_layout_view', function (value) {
		value.bind(function (newval) {
			qwpVueObj.qwpDataLayoutView = newval
		});
	});

	wp.customize(`theme_logo_class`, function (value) {
		value.bind(function (newval) {
			$('#qwp-site-logo').attr('class', newval)
		});
	});


})(jQuery);
