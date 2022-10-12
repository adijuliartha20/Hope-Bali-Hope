<?php function charitywp_selection() {?>
	<?php echo charitywp_google_webfont(); 

	$ot_typgraphy_array = new charitywp_ot_font_settings;
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('theme_one_font','body,.charitywp-single-donation-content .give-goal-progress .raised,.charitywp-donation-list .give-goal-progress .raised,.header-style-1 .header-search,.header-style-1 .social-share,.header-style-1 .header-sidebar,.header .header-top-bar,.datepicker.dropdown-menu,#tribe-events-content .tribe-events-calendar div[id*=tribe-events-event-] h3.tribe-events-month-event-title', 'Poppins');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('theme_two_font','[id*=give-form].give-display-modal .give-btn, [id*=give-form].give-display-reveal .give-btn, .give-btn, .charitywp-link-button, .charitywp-link-button:visited, button, input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.charitywp-slider-carousel  .slider-wrapper .content .box-name,.charitywp-slider-carousel  .slider-wrapper .content .title,.charitywp-slider-carousel  .slider-wrapper .content .buttons,.content-title-element .title,.charitywp-banner .content .toptitle,.charitywp-banner .content .maintitle,.charitywp-banner .content .button a, .charitywp-banner .content .button a:visited,.charitywp-button a, .charitywp-button a:visited,.charitywp-event-list ul li .title a, .charitywp-event-list ul li .title a:visited,.charitywp-team-list ul li .content .title a, .charitywp-team-list ul li .content .title a:visited,.charitywp-service-box .title,.testimonials-carousel .content .name,.charitywp-counter,.charitywp-contact-box .button-link, .charitywp-contact-box .button-link:visited,.charitywp-donation-list .title a, .charitywp-donation-list .title a:visited,.wpb-js-composer .vc_tta.vc_general .vc_tta-panel-title,.widget-title,.header-style-1,.page-title-breadcrumbs h1,.post-list-style-1 .image .category,.post-list-style-1 .title,.post-list-style-1 .bottom a.more-button, .post-list-style-1 .bottom a.more-button:visited,.post-list-style-2 .image .category .post-categories,.post-list-style-2 .title,.post-list-style-2 .bottom a.more-button, .post-list-style-2 .bottom a.more-button:visited,.post-pagination ul,.post-content-list .post-content-footer .post-share,.post-content-list .post-content-footer .post-tags,.post-navigation ul,.content-title-wrapper .title,.tribe-events-meta-group .tribe-events-single-section-title, .tribe-events-schedule h2, .tribe-events-list h2.tribe-events-page-title, .tribe-events-day .tribe-events-day-time-slot h5, .tribe-events-calendar td div[id*=tribe-events-daynum-], .tribe-events-viewmore, #tribe-events .tribe-events-button, .tribe-events-button, #tribe-bar-form #tribe-bar-views, .datepicker.dropdown-menu th, .datepicker.dropdown-menu td,#give-recurring-form h3.give-section-break, #give-recurring-form h4.give-section-break, #give-recurring-form legend, form.give-form h3.give-section-break, form.give-form h4.give-section-break, form.give-form legend, form[id*=give-form] h3.give-section-break, form[id*=give-form] h4.give-section-break, form[id*=give-form] legend,.give-goal-progress .raised,.charitywp-fully-slider .content .content-wrapper .title', 'Montserrat');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('body_text','body', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h1_font','h1', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h2_font','h2', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h3_font','h3', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h4_font','h4', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h5_font','h5', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('h6_font','h6', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_font','h6', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','input::-webkit-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','input::-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','input:-ms-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','input:-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','.form-control::-webkit-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','.form-control::-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','.form-control:-ms-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','.form-control:-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','textarea::-webkit-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','textarea::-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','textarea:-ms-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','textarea:-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','select::-webkit-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','select::-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','select:-ms-input-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('input_placeholder_font','select:-moz-placeholder', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('button_font','[id*=give-form].give-display-modal .give-btn, [id*=give-form].give-display-reveal .give-btn, .give-btn, .charitywp-link-button, .charitywp-link-button:visited, button, input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('header_font','.header', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('header_menu_link_font','.header-style-1', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('breadcrumb_font','.page-title-breadcrumbs', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('post_posts_content_font','.single-post .post-content-body', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('page_content_font','.page .page-content-body', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('404_page_title','.error404 .content-title-element .title', '');
	$ot_typgraphy_array->charitywp_ot_font_settings_echo('404_page_text','.error404 .content-title-element .description', '');

	?>
	<style id='charitywp-selection' type='text/css'>
		<?php 
			$ot_typgraphy_array->charitywp_css_output();
		?>
		
		/*----- CUSTOM COLOR START -----*/
		<?php if( ot_get_option('page_title_background') !== "" ) { ?>
			.page-title-breadcrumbs .page-title-breadcrumbs-image {
				background-image:url(<?php echo esc_url( ot_get_option('page_title_background') ); ?>);
			}
		<?php } ?>

		<?php if( ot_get_option('body_background') !== "" ) { ?>
			body {
				<?php echo charitywp_bg_type('body_background'); ?>
			}
		<?php } ?>

		<?php if( ot_get_option('wrapper_background') !== "" ) { ?>
			.charitywp-wrapper {
				background-color:<?php echo ot_get_option('wrapper_background'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('theme_gradient') !== "" ) { ?>
			.charitywp-slider-carousel.style5 .slider-wrapper .image:before {
				<?php echo ot_get_option('theme_gradient'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('theme_main_color') !== "" ) { ?>
			#tribe-events .tribe-events-button,
			#tribe-events .tribe-events-button:hover,
			#tribe_events_filters_wrapper input[type=submit],
			.tribe-events-button,
			.tribe-events-button.tribe-active:hover,
			.tribe-events-button.tribe-inactive,
			.tribe-events-button:hover,
			.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
			.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			.event-tag-widget ul li a:hover,
			.event-tag-widget ul li a:focus,
			.widget_tag_cloud .tagcloud a:hover,
			.widget_tag_cloud .tagcloud a:focus,
			.charitywp-donation-list .pagination-buttons>div:hover,
			.charitywp-donation-list .pagination-buttons>div:focus,
			.logo-carousel .pagination-buttons>div:hover,
			.logo-carousel .pagination-buttons>div:focus,
			.double-bounce1,
			.double-bounce2
			{
				background-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.woocommerce-info,
			.woocommerce-message,
			.woocommerce-error,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu
			{
				border-top-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.charitywp-fully-slider .content .content-wrapper .title:after,
			.mobile-menu .user-box-links,
			.plyr--audio .plyr__controls button.tab-focus:focus,
			.plyr--audio .plyr__controls button:hover,
			.plyr__play-large,
			.plyr--video .plyr__controls button.tab-focus:focus,
			.plyr--video .plyr__controls button:hover,
			.tribe-events-day .tribe-events-day-time-slot h5,
			#tribe-bar-form .tribe-bar-submit input[type=submit],
			.woocommerce #respond input#submit.alt.disabled,
			.woocommerce #respond input#submit.alt.disabled:hover,
			.woocommerce #respond input#submit.alt:disabled,
			.woocommerce #respond input#submit.alt:disabled:hover,
			.woocommerce #respond input#submit.alt:disabled[disabled],
			.woocommerce #respond input#submit.alt:disabled[disabled]:hover,
			.woocommerce a.button.alt.disabled,
			.woocommerce a.button.alt.disabled:hover,
			.woocommerce a.button.alt:disabled,
			.woocommerce a.button.alt:disabled:hover,
			.woocommerce a.button.alt:disabled[disabled],
			.woocommerce a.button.alt:disabled[disabled]:hover,
			.woocommerce button.button.alt.disabled,
			.woocommerce button.button.alt.disabled:hover,
			.woocommerce button.button.alt:disabled,
			.woocommerce button.button.alt:disabled:hover,
			.woocommerce button.button.alt:disabled[disabled],
			.woocommerce button.button.alt:disabled[disabled]:hover,
			.woocommerce input.button.alt.disabled,
			.woocommerce input.button.alt.disabled:hover,
			.woocommerce input.button.alt:disabled,
			.woocommerce input.button.alt:disabled:hover,
			.woocommerce input.button.alt:disabled[disabled],
			.woocommerce input.button.alt:disabled[disabled]:hover,
			.woocommerce span.onsale,
			.post-author .about-author .about-content .author-social-links ul li a:hover,
			.post-author .about-author .about-content .author-social-links ul li a:focus,
			.post-navigation ul li,
			.post-content-list .post-content-footer .post-tags span a,
			.post-content-list .post-content-footer .post-tags span a:visited,
			.post-content-list .post-content-footer .post-share ul li a:hover,
			.post-content-list .post-content-footer .post-share ul li a:focus,
			.post-pagination ul li,
			.post-list-style-2 .bottom a.more-button,
			.post-list-style-2 .bottom a.more-button:visited,
			.post-list-style-1 .bottom a.more-button,
			.post-list-style-1 .bottom a.more-button:visited,
			.header-style-1 .user-box-links,
			.user-box button.close:hover,
			.user-box button.close:focus,
			.event-tag-widget ul li a:hover,
			.event-tag-widget ul li a:focus,
			.widget_tag_cloud .tagcloud a:hover,
			.widget_tag_cloud .tagcloud a:focus,
			.charitywp-app-box .app-item a:hover,
			.charitywp-app-box .app-item a:focus,
			.charitywp-contact-box .button-link, 
			.charitywp-contact-box .button-link:visited,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet:hover,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet:focus,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
			.charitywp-button.style4 a:hover,
			.charitywp-button.style4 a:focus,
			.charitywp-button.style5 a:hover,
			.charitywp-button.style5 a:focus,
			.charitywp-button a:hover,
			.charitywp-button a:focus,
			.charitywp-button.style2 a,
			.charitywp-button.style2 a:visited,
			.charitywp-banner .content .button a:hover,
			.charitywp-banner .content .button a:focus,
			.content-title-element.size1 .title:after,
			.charitywp-slider-carousel  .slider-wrapper .content .buttons a:hover,
			.charitywp-slider-carousel  .slider-wrapper .content .buttons a:focus,
			.charitywp-slider-carousel .slider-wrapper .content .box-name,
			.edit-link a, 
			.edit-link a:visited,
			.charitywp-pagination>li.charitywp-pagination-nav,
			.charitywp-pagination>li>a,
			.charitywp-pagination>li>a:visited,
			[id*=give-form].give-display-modal .give-btn,
			[id*=give-form].give-display-reveal .give-btn,
			.give-btn,
			.charitywp-link-button,
			.charitywp-link-button:visited,
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button
			{
				background:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.mobile-menu .social-links li a:hover,
			.mobile-menu .social-links li a:focus,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a:focus,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a:hover,
			.mobile-menu .mobile-menu-top .navbar-nav>li a:hover,
			.mobile-menu .mobile-menu-top .navbar-nav>li a:focus,
			.mobile-menu .mobile-menu-top .navbar-nav li:hover>a,
			.mobile-menu .mobile-menu-top .navbar-nav li:focus>a:visited,
			.mobile-menu .mobile-menu-top .navbar-nav li:hover>i,
			.mobile-menu .mobile-menu-top .navbar-nav li:focus>i,
			#give-recurring-form h3.give-section-break,
			#give-recurring-form h4.give-section-break,
			#give-recurring-form legend,
			form.give-form h3.give-section-break,
			form.give-form h4.give-section-break,
			form.give-form legend,
			form[id*=give-form] h3.give-section-break,
			form[id*=give-form] h4.give-section-break,
			form[id*=give-form] legend,
			.plyr__progress--played,
			.plyr__volume--display,
			.tribe-events-list a.tribe-events-read-more,
			.tribe-events-list a.tribe-events-read-more:visited,
			.tribe-events-list-separator-month,
			.tribe-events-meta-group .tribe-events-single-section-title,
			#tribe-events-content .tribe-events-tooltip h4,
			#tribe_events_filters_wrapper .tribe_events_slider_val,
			.single-tribe_events a.tribe-events-gcal,
			.single-tribe_events a.tribe-events-ical,
			.woocommerce div.product p.price,
			.woocommerce div.product span.price,
			.woocommerce div.product .stock,
			.woocommerce ul.products li.product .price,
			.woocommerce div.product form.cart .variations label,
			.up-sells.upsells.products h2,
			.woocommerce #reviews h3,
			.related.products h2,
			.woocommerce-tabs h2,
			.woocommerce-info:before,
			.woocommerce-message:before,
			.woocommerce-error:before,
			.content-title-wrapper .title,
			.post-author .about-author .about-content .author-name a,
			.post-author .about-author .about-content .author-name a:visited,
			.post-author .about-author .about-content .author-name,
			.post-navigation ul li:hover a,
			.post-navigation ul li:hover a:visited,
			.post-navigation ul li:hover,
			.post-content-list .post-content-footer .post-tags span:hover a,
			.post-content-list .post-content-footer .post-tags span:focus a:visited,
			.post-content-list .post-content-footer .post-information li i,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories a,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories a:visited,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories,
			.post-pagination ul li:hover a,
			.post-pagination ul li:hover a:visited,
			.post-pagination ul li:hover,
			.post-list-style-3 .post-information i,
			.post-list-style-2 .bottom .post-information li i,
			.post-list-style-2 .bottom a.more-button:hover,
			.post-list-style-2 .bottom a.more-button:focus,
			.post-list-style-2 .title a:hover,
			.post-list-style-2 .title a:focus,
			.post-list-style-2 .image .category .post-categories a,
			.post-list-style-2 .image .category .post-categories a:visited,
			.post-list-style-2 .image .category .post-categories,
			.post-list-style-1 .bottom .post-information li i,
			.post-list-style-1 .bottom a.more-button:hover,
			.post-list-style-1 .bottom a.more-button:focus,
			.post-list-style-1 .title a:hover,
			.post-list-style-1 .title a:focus,
			.post-list-style-1 .image .category .post-categories a,
			.post-list-style-1 .image .category .post-categories a:visited,
			.post-list-style-1 .image .category .post-categories,
			.page-title-breadcrumbs .breadcrumbs a.home,
			.page-title-breadcrumbs .breadcrumbs a.home:visited,
			.page-title-breadcrumbs .breadcrumbs a:hover,
			.page-title-breadcrumbs .breadcrumbs a:focus,
			.team-detail-container .left .team-detail-list>li .list-name>i,
			.comment-list li cite a, 
			.comment-list li cite a:visited,
			.comment-list li cite,
			.footer .footer-content #menu-footer-menu li a:before,
			.footer .footer-content #menu-footer-menu li a:hover,
			.footer .footer-content #menu-footer-menu li a:focus,
			.footer a:hover,
			.footer a:focus,
			.header .header-top-bar .top-bar-contact ul li i,
			.header-style-1.fixed-header-class .header-search>i:hover,
			.header-style-1.fixed-header-class .social-share>i:hover,
			.header-style-1.fixed-header-class .header-sidebar>i:hover,
			.header-style-1.fixed-header-class .header-search>i:focus,
			.header-style-1.fixed-header-class .social-share>i:focus,
			.header-style-1.fixed-header-class .header-sidebar>i:focus,
			.header-style-1.fixed-header-class .header-search.opened>i,
			.header-style-1.fixed-header-class .social-share.opened>i,
			.header-style-1.fixed-header-class .header-sidebar.opened>i,
			.header-style-1.header-style-5 .header-search>i:hover,
			.header-style-1.header-style-5 .social-share>i:hover,
			.header-style-1.header-style-5 .header-sidebar>i:hover,
			.header-style-1.header-style-5 .header-search>i:focus,
			.header-style-1.header-style-5 .social-share>i:focus,
			.header-style-1.header-style-5 .header-sidebar>i:focus,
			.header-style-1.header-style-5 .header-search.opened>i,
			.header-style-1.header-style-5 .social-share.opened>i,
			.header-style-1.header-style-5 .header-sidebar.opened>i,
			.header-style-1 .header-search>i:hover,
			.header-style-1 .social-share>i:hover,
			.header-style-1 .header-sidebar>i:hover,
			.header-style-1 .header-search>i:focus,
			.header-style-1 .social-share>i:focus,
			.header-style-1 .header-sidebar>i:focus,
			.header-style-1 .header-search.opened>i,
			.header-style-1 .social-share.opened>i,
			.header-style-1 .header-sidebar.opened>i,
			.header-style-1.fixed-header-class .header-main-area .header-menu .navbar .navbar-nav>li>a:hover,
			.header-style-1.fixed-header-class .header-main-area .header-menu .navbar .navbar-nav>li>a:focus,
			.header-style-1.header-style-5 .header-main-area .header-menu .navbar .navbar-nav>li:hover>a,
			.header-style-1.header-style-5 .header-main-area .header-menu .navbar .navbar-nav>li>a:hover,
			.header-style-1.header-style-5 .header-main-area .header-menu .navbar .navbar-nav>li>a:focus,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li:hover>a,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:hover,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:focus,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:hover,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:focus,
			.header-style-1 .social-share .social-links li a:hover,
			.header-style-1 .social-share .social-links li a:focus,
			.user-box .bottom-links a:focus,
			.user-box .bottom-links a:hover,
			.widget_meta ul li a:hover,
			.widget_meta ul li a:focus,
			.widget_rss ul li a:hover,
			.widget_rss ul li a:focus,
			.widget_recent_entries ul li a:hover,
			.widget_recent_entries ul li a:focus,
			.widget_recent_comments ul li a:hover,
			.widget_recent_comments ul li a:focus,
			.widget_nav_menu ul li a:hover,
			.widget_nav_menu ul li a:focus,
			.widget_archive ul li a:hover,
			.widget_archive ul li a:focus,
			.widget_pages ul li a:hover,
			.widget_pages ul li a:focus,
			.widget_categories ul li a:hover,
			.widget_categories ul li a:focus,
			.widget-title span,
			.widget-title,
			.charitywp-icon-list ul li i,
			.charitywp-donation-list .title a,
			.charitywp-donation-list .title a:visited,
			.charitywp-contact-box i,
			.charitywp-contact-box .button-link:focus,
			.charitywp-contact-box .button-link:hover,
			.charitywp-counter,
			.testimonials-carousel .content .name,
			.charitywp-service-box i,
			.charitywp-service-box .title,
			.charitywp-team-list ul li .content .official-sites li a:hover,
			.charitywp-team-list ul li .content .official-sites li a:focus,
			.charitywp-team-list ul li .content .title a,
			.charitywp-team-list ul li .content .title a:visited,
			.charitywp-event-list ul li .eventdate i,
			.charitywp-event-list.style2 ul li .title a:hover,
			.charitywp-event-list.style2 ul li .title a:focus,
			.charitywp-event-list ul li .title a,
			.charitywp-event-list ul li .title a:visited,
			.charitywp-banner .content .toptitle,
			.content-title-element .title,
			.edit-link a:focus,
			.edit-link a:hover,
			.charitywp-pagination>li>a:hover,
			.charitywp-pagination>li>a:focus,
			blockquote:before,
			[id*=give-form].give-display-modal .give-btn:hover,
			[id*=give-form].give-display-modal .give-btn:focus,
			[id*=give-form].give-display-reveal .give-btn:hover,
			[id*=give-form].give-display-reveal .give-btn:focus,
			.give-btn:hover,
			.give-btn:focus,
			.charitywp-link-button:hover,
			.charitywp-link-button:focus,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover,
			.cs-select > span::after,
			a:hover,
			a:focus
			{
				color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.post-author .about-author .about-content .author-social-links ul li a:hover,
			.post-author .about-author .about-content .author-social-links ul li a:focus,
			.post-navigation ul li,
			.post-content-list .post-content-footer .post-tags span a,
			.post-content-list .post-content-footer .post-tags span a:visited,
			.post-content-list .post-content-footer .post-share ul li a:hover,
			.post-content-list .post-content-footer .post-share ul li a:focus,
			.post-pagination ul li,
			.post-list-style-2 .bottom a.more-button,
			.post-list-style-2 .bottom a.more-button:visited,
			.post-list-style-1 .bottom a.more-button,
			.post-list-style-1 .bottom a.more-button:visited,
			.charitywp-donation-list .pagination-buttons>div:hover,
			.charitywp-donation-list .pagination-buttons>div:focus,
			.charitywp-app-box .app-item a:hover,
			.charitywp-app-box .app-item a:focus,
			.charitywp-contact-box .button-link:focus,
			.charitywp-contact-box .button-link:hover,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet:hover,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet:focus,
			.testimonials-carousel .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
			.charitywp-service-box:hover i,
			.logo-carousel .pagination-buttons>div:hover,
			.logo-carousel .pagination-buttons>div:focus,
			.charitywp-button.style4 a:hover,
			.charitywp-button.style4 a:focus,
			.charitywp-button.style5 a:hover,
			.charitywp-button.style5 a:focus,
			.charitywp-button a:hover,
			.charitywp-button a:focus,
			.charitywp-button.style2 a,
			.charitywp-button.style2 a:visited,
			.charitywp-banner .content .button a:hover,
			.charitywp-banner .content .button a:focus,
			.charitywp-slider-carousel  .slider-wrapper .content .buttons a:hover,
			.charitywp-slider-carousel  .slider-wrapper .content .buttons a:focus,
			.edit-link a:focus,
			.edit-link a:hover,
			.charitywp-pagination>li>a:hover,
			.charitywp-pagination>li>a:focus,
			[id*=give-form].give-display-modal .give-btn:hover,
			[id*=give-form].give-display-modal .give-btn:focus,
			[id*=give-form].give-display-reveal .give-btn:hover,
			[id*=give-form].give-display-reveal .give-btn:focus,
			.give-btn:hover,
			.give-btn:focus,
			.charitywp-link-button:hover,
			.charitywp-link-button:focus,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover,
			[id*=give-form].give-display-modal .give-btn,
			[id*=give-form].give-display-reveal .give-btn,
			.give-btn,
			.charitywp-link-button,
			.charitywp-link-button:visited,
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button
			{
				border-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.charitywp-link-button-opened, .charitywp-link-button-opened:visited {
				color: #777777;
				border-color: #cccccc;
				background: transparent;
			}
		<?php } ?>
		<?php if( ot_get_option('link_color') !== "" ) { ?>
			a, a:visited {
				color:<?php echo ot_get_option('link_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('link_hover_color') !== "" ) { ?>
			a:hover, a:focus {
				color:<?php echo ot_get_option('link_hover_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('heading_color') !== "" ) { ?>
			h1, h2, h3, h4, h5, h6 {
				color:<?php echo ot_get_option('heading_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('input_border_color') !== "" ) { ?>
			.select2-dropdown,
			#give-recurring-form .form-row input[type=text],
			#give-recurring-form .form-row input[type=tel],
			#give-recurring-form .form-row input[type=email],
			#give-recurring-form .form-row input[type=password],
			#give-recurring-form .form-row select,
			#give-recurring-form .form-row textarea,
			form.give-form .form-row input[type=text],
			form.give-form .form-row input[type=tel],
			form.give-form .form-row input[type=email],
			form.give-form .form-row input[type=password],
			form.give-form .form-row select,
			form.give-form .form-row textarea,
			form[id*=give-form] .form-row input[type=text],
			form[id*=give-form] .form-row input[type=tel],
			form[id*=give-form] .form-row input[type=email],
			form[id*=give-form] .form-row input[type=password],
			form[id*=give-form] .form-row select,
			form[id*=give-form] .form-row textarea,
			input[type="email"],
			input[type="number"],
			input[type="password"],
			input[type="tel"],
			input[type="url"],
			input[type="text"],
			input[type="time"],
			input[type="week"],
			input[type="search"],
			input[type="month"],
			input[type="datetime"],
			input[type="date"],
			textarea,
			textarea.form-control,
			select,
			.woocommerce form .form-row .select2-container .select2-choice,
			.select2-container--default .select2-selection--single,
			.form-control,
			div.cs-select,
			.cs-select {
				border-color:<?php echo ot_get_option('input_border_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('input_background_color') !== "" ) { ?>
			#give-recurring-form .form-row input[type=text],
			#give-recurring-form .form-row input[type=tel],
			#give-recurring-form .form-row input[type=email],
			#give-recurring-form .form-row input[type=password],
			#give-recurring-form .form-row select,
			#give-recurring-form .form-row textarea,
			form.give-form .form-row input[type=text],
			form.give-form .form-row input[type=tel],
			form.give-form .form-row input[type=email],
			form.give-form .form-row input[type=password],
			form.give-form .form-row select,
			form.give-form .form-row textarea,
			form[id*=give-form] .form-row input[type=text],
			form[id*=give-form] .form-row input[type=tel],
			form[id*=give-form] .form-row input[type=email],
			form[id*=give-form] .form-row input[type=password],
			form[id*=give-form] .form-row select,
			form[id*=give-form] .form-row textarea,
			input[type="email"],
			input[type="number"],
			input[type="password"],
			input[type="tel"],
			input[type="url"],
			input[type="text"],
			input[type="time"],
			input[type="week"],
			input[type="search"],
			input[type="month"],
			input[type="datetime"],
			input[type="date"],
			textarea,
			textarea.form-control,
			select,
			.woocommerce form .form-row .select2-container .select2-choice,
			.select2-container--default .select2-selection--single,
			.form-control,
			div.cs-select,
			.cs-select {
				background:<?php echo ot_get_option('input_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_background_color') !== "" ) { ?>
			[id*=give-form].give-display-modal .give-btn,
			[id*=give-form].give-display-reveal .give-btn,
			.give-btn,
			.charitywp-link-button,
			.charitywp-link-button:visited,
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				background:<?php echo ot_get_option('button_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_hover_background_color') !== "" ) { ?>
			[id*=give-form].give-display-modal .give-btn:hover,
			[id*=give-form].give-display-modal .give-btn:focus,
			[id*=give-form].give-display-reveal .give-btn:hover,
			[id*=give-form].give-display-reveal .give-btn:focus,
			.give-btn:hover,
			.give-btn:focus,
			.charitywp-link-button:hover,
			.charitywp-link-button:focus,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover {
				background:<?php echo ot_get_option('button_hover_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_hover_text_color') !== "" ) { ?>
			[id*=give-form].give-display-modal .give-btn:hover,
			[id*=give-form].give-display-modal .give-btn:focus,
			[id*=give-form].give-display-reveal .give-btn:hover,
			[id*=give-form].give-display-reveal .give-btn:focus,
			.give-btn:hover,
			.give-btn:focus,
			.charitywp-link-button:hover,
			.charitywp-link-button:focus,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover {
				color:<?php echo ot_get_option('button_hover_text_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_1_background_color') !== "" ) { ?>
			.header-style-1 {
				background:<?php echo ot_get_option('header_style_1_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_1_header_border_color') !== "" ) { ?>
			.header-style-1 {
				border-bottom-color:<?php echo ot_get_option('header_style_1_header_border_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_1_link_color') !== "" ) { ?>
			.header-style-1.fixed-header-class .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1.fixed-header-class .header-main-area .header-menu .navbar .navbar-nav>li>a:visited,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited {
				color:<?php echo ot_get_option('header_style_1_link_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_1_elements_icon_color') !== "" ) { ?>
			.header-style-1 .header-search>i,
			.header-style-1 .social-share>i,
			.header-style-1 .header-sidebar>i {
				color:<?php echo ot_get_option('header_style_1_elements_icon_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_5_background_color') !== "" ) { ?>
			.header-style-1.header-style-5 {
				background:<?php echo ot_get_option('header_style_5_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_5_link_color') !== "" ) { ?>
			.header-style-1.header-style-5 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1.header-style-5 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited {
				color:<?php echo ot_get_option('header_style_5_link_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_5_elements_icon_color') !== "" ) { ?>
			.header-style-1.header-style-5 .header-search>i,
			.header-style-1.header-style-5 .social-share>i,
			.header-style-1.header-style-5 .header-sidebar>i {
				color:<?php echo ot_get_option('header_style_5_elements_icon_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('sidebar_widget_title_color') !== "" ) { ?>
			.widget-title {
				color:<?php echo ot_get_option('sidebar_widget_title_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('sidebar_widget_title_border_color') !== "" ) { ?>
			.widget-title {
				border-bottom-color:<?php echo ot_get_option('sidebar_widget_title_border_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_1_background_color') !== "" ) { ?>
			.footer {
				border-bottom-color:<?php echo ot_get_option('footer_style_1_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_1_copyright_background_color') !== "" ) { ?>
			.footer .footer-copyright {
				border-bottom-color:<?php echo ot_get_option('footer_style_1_copyright_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_2_background_color') !== "" ) { ?>
			.footer.footer-style2 {
				border-bottom-color:<?php echo ot_get_option('footer_style_2_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_2_copyright_background_color') !== "" ) { ?>
			.footer.footer-style2 .footer-copyright {
				border-bottom-color:<?php echo ot_get_option('footer_style_2_copyright_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_text_color') !== "" ) { ?>
			.footer,
			.footer a,
			.footer a:visited {
				border-bottom-color:<?php echo ot_get_option('footer_sfooter_text_colortyle_2_copyright_background_color'); ?>;
			}
		<?php } ?>
		/*----- CUSTOM COLOR END -----*/

		<?php if( ot_get_option('custom_css') !== "" ) { ?>
			/*----- CUSTOM CSS START -----*/
				<?php echo ot_get_option('custom_css'); ?>
			/*----- CUSTOM CSS END -----*/
		<?php } ?>
	</style>
	
	<?php if( ot_get_option('custom_js') !== "" ) { ?>
		<script type="text/javascript">
			<?php echo ot_get_option('custom_js'); ?>
		</script>
	<?php } ?>
<?php 
}
add_action('wp_head', 'charitywp_selection'); ?>