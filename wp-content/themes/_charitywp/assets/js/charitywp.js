(function($){
	'use strict';

	/*---------- LOADING EFFECT START ----------*/ 
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 2000);
	/*---------- LOADING EFFECT END ----------*/

	/*---------- GO TOP SCROLLING START ----------*/
	$(function () {
		$('.go-top-icon').on("click", function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	/*---------- GO TOP SCROLLING END ----------*/
	
	/*---------- SCROLL LINK START ----------*/
	$(function() {
	  $('.charitywp-slider-carousel .slider-wrapper .content .buttons a, .header a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });
	});
	/*---------- SCROLL LINK END ----------*/

	/*---------- TOOLTIP START ----------*/ 
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	/*---------- TOOLTIP END ----------*/

	/*---------- MOBILE HEADER START ----------*/
	$(function () {
		$(document).on('click', '.mobile-header .mobile-menu-icon', function(){
			$('.mobile-header').addClass('mobile-menu-bars-actived');
			$('.mobile-header .mobile-menu-icon').addClass('mobile-menu-bars-opened');
			$('.mobile-header .mobile-menu-icon i').attr('class', 'fa fa-times-thin');
			$('.mobile-menu').addClass('mobile-menu-opened');
			$('.mobile-menu-wrapper').addClass('mobile-menu-wrapper-opened');
		});

		$(document).on('click', '.mobile-header .mobile-menu-bars-opened', function(){
			$('.mobile-header .mobile-menu-icon').removeClass('mobile-menu-bars-opened');
			$('.mobile-header .mobile-menu-icon i').attr('class', 'fa fa-bars');
		});

		$(document).on('click', '.mobile-menu .mobile-menu-icon', function(){
			$('.mobile-menu').removeClass('mobile-menu-opened');
			$('.mobile-menu').removeClass('mobile-menu-wrapper-opened');
			$('.mobile-header').removeClass('mobile-menu-bars-actived');
			$('.mobile-menu-wrapper').removeClass('mobile-menu-wrapper-opened');
			$('.mobile-header .mobile-menu-icon').removeClass('mobile-menu-bars-opened');
			$('.mobile-header .mobile-menu-icon i').attr('class', 'fa fa-bars');
		});

		$(document).on('click', '.mobile-menu-wrapper-opened', function(){
			$('.mobile-menu').removeClass('mobile-menu-opened');
			$('.mobile-menu-wrapper').removeClass('mobile-menu-wrapper-opened');
			$('.mobile-header').removeClass('mobile-menu-bars-actived');
			$('.mobile-header .mobile-menu-icon').removeClass('mobile-menu-bars-opened');
			$('.mobile-header .mobile-menu-icon i').attr('class', 'fa fa-bars');
		});

		if($('.mobile-navbar li.dropdown .dropdown-menu').length){
			$('.mobile-navbar li.dropdown').append('<i class="fa fa-angle-down"></i>');
			$('.mobile-navbar li.dropdown .fa-angle-down').on('click', function() {
				$(this).prev('.dropdown-menu').slideToggle(500);
			});
		}

		$('.mobile-menu').scrollbar();

		$(document).on('click', '.user-box .user-box-login>ul>li.user-box-login-form .user-box-login-form-top-links li a', function(){
			$('.eventchamp-class').addClass('modal-open').delay(900);
		});

		$(document).on('click', '.user-box .user-box-login .close', function(){
			$('body').removeClass('modal-open');
		});
	});
	/*---------- MOBILE HEADER END ----------*/

	/*---------- COUNTER START ----------*/
	$('.charitywp-counter .number').counterUp({
		delay: 10,
		time: 2000
	});
	/*---------- COUNTER END ----------*/

	/*---------- HEADER START ----------*/
		/*---------- HEADER SOCIAL LINKS START ----------*/
		$(function () {
			$(document).on('click', '.header .social-share>i', function(){
				$('.header .social-share').addClass('opened');
			});
		
			$(document).on('click', '.header .social-share.opened>i', function(){
				$('.header .social-share').removeClass('opened');
			});
		});
		/*---------- HEADER SOCIAL LINKS END ----------*/

		/*---------- HEADER SEARCH START ----------*/
		$(function () {
			$(document).on('click', '.header .header-search>i', function(){
				$('.header .header-search').addClass('opened');
			});
		
			$(document).on('click', '.header .header-search.opened>i', function(){
				$('.header .header-search').removeClass('opened');
			});
		});
		/*---------- HEADER SEARCH END ----------*/

		/*---------- HEADER SIDEBAR START ----------*/
		$(function () {
			$(document).on('click', '.header .header-sidebar>i', function(){
				$('.header .header-sidebar').addClass('opened');
			});
		
			$(document).on('click', '.header-sidebar.opened>i', function(){
				$('.header .header-sidebar').removeClass('opened');
			});

			$('.header .header-sidebar .header-sidebar-content .header-sidebar-content-wrapper').scrollbar();
		});
		/*---------- HEADER SIDEBAR END ----------*/
	/*---------- HEADER END ----------*/

	/*---------- FULLY SLIDER HEIGHT START ----------*/
	$(function(){
		$(window).resize(function(){
			var windowy = $(window).height();
			$('.charitywp-fully-slider .image').css('height',windowy + 'px');
		}).resize();    
	});
	/*---------- FULLY SLIDER HEIGHT END ----------*/

	/*---------- GLORIA CAROUSEL START ----------*/
	function gloriaSliders() {
		$('.gloria-sliders').each( function() {
			var cswiper = $(this),
				autoplay = $(this).data('aplay'),
				item = $(this).data('item'),
				sloop = $(this).data('sloop'),
				columnSpace = $(this).data('column-space'),
				effect = $(this).data('effect'),
				effectTime = $(this).data('effectTime'),
				pagination = $(this).data('pagination');


			var swiper = new Swiper(cswiper, {
				slidesPerView: item,
				autoplay: autoplay,
				loop: sloop,
				effect: effect,
				spaceBetween: columnSpace,
				nextButton: '.next',
				prevButton: '.prev',
				pagination: pagination,
				paginationClickable: true,
				preventClicks: true,
				preventClicksPropagation: true,
				breakpoints: {
					991: {
						slidesPerView: item < 6 ? item: 5, 
					},
					767: {
						slidesPerView: item < 6 ? item: 4, 
					},
					550: {
						slidesPerView: item < 6 ? item: 3, 
					},
					350: {
						slidesPerView: item < 6 ? item: 2, 
					},
				}
			});

		});

	}
	gloriaSliders();
	/*---------- GLORIA CAROUSEL END ----------*/

} )( jQuery );