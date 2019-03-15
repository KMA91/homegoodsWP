(function($) {

	"use strict";

	$( document ).ready(function() {

		if ($('#wpadminbar').length > 0) {
		
			$('#header-main-fixed').css('top', $('#wpadminbar').height() + 'px');
			$('#wpadminbar').css('position', 'fixed');
		}

		if ($(window).width() < 800) {

			$('#header-main-fixed .cart-contents-icon').appendTo($('#header-main-fixed'));
			$('#header-main-fixed #cart-popup-content').appendTo($('#header-main-fixed'));

			$('#navmain > div > ul > li').each(
			       function() {
			         if ($(this).find('> ul.sub-menu').length > 0) {

			           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
			         }
			       }
			     );

			$('.sub-menu-item-toggle').on('click', function(e) {

			     var subMenu = $(this).parent().find('> ul.sub-menu');

			     $('#navmain ul ul.sub-menu').not(subMenu).hide();
			     $(this).toggleClass('sub-menu-item-toggle-expanded');
			     subMenu.toggle();
			     subMenu.find('ul.sub-menu').toggle();
			});

		}

		fcommerce_initHeaderIconsEvents();

		$('#header-spacer').height( $('#header-main-fixed').height() );

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();

			} else {

				$('.scrollup').fadeOut();

			}
		});

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		fcommerce_mainMenuInit();

		if ( $(window).width() < 800 ) {
		
			$('#navmain > div > ul > li').each(
		       function() {
		         if ($(this).find('> ul.sub-menu').length > 0) {

		           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   $('.sub-menu-item-toggle').on('click', function(e) {

		     e.stopPropagation();

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).hide();
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     subMenu.toggle();
		     subMenu.find('ul.sub-menu').toggle();
		   });

		}

		$('#navmain > div').on('click', function(e) {

			e.stopPropagation();

			// toggle main menu
			if ( $(window).width() < 800 ) {

				var parentOffset = $(this).parent().offset(); 
				
				var relY = e.pageY - parentOffset.top;
			
				if (relY < 36) {
				
					$('ul:first-child', this).toggle(400);
				}
			}
		});

		// re-init main menu on screen resize
		$(window).resize(function () {
	       
	    	fcommerce_mainMenuClear();
	    	fcommerce_mainMenuInit();
		});
	});

	function fcommerce_initHeaderIconsEvents() {

		$('a.cart-contents-icon').mouseenter(function(){
		
			// display mini-cart if it's not visible
			if ( !$('#cart-popup-content').is(":visible") ) {

				var rightPos = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
				var topPos = $(this).offset().top - $(window).scrollTop() + $(this).outerHeight(); 

				$('#cart-popup-content').css('right', rightPos).css('top', topPos).fadeIn();
			}
		});
		
		$('#cart-popup-content').mouseleave(function(){
		
			$('#cart-popup-content').fadeOut();
		});
	}

	function fcommerce_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function fcommerce_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

})(jQuery);