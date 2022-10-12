<?php
 
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'charitywp_custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function charitywp_custom_theme_options() {

	/* OptionTree is not loaded yet, or this is not an admin request */
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( ot_settings_id(), array() );

	/**
	* Custom settings array that will eventually be 
	* passes to the OptionTree Settings API Class.
	*/
	
	$custom_settings = array(
		'contextual_help' => array(
			'content' => array(
				array(
					'id' => 'option_types_help',
					'title' => esc_html__( 'Header Settings', 'charitywp' ),
					'content' => '<p>' . esc_html__( 'Help content goes here!', 'charitywp' ) . '</p>'
				)
			),
			'sidebar' => '<p>' . esc_html__( 'Sidebar content goes here!', 'charitywp' ) . '</p>'
		),
		
		'sections' => array(
			array(
				'title' => '<span class="dashicons dashicons-admin-site"></span>' . esc_html__( 'General', 'charitywp' ),
				'id' => 'general'
			),
			array(
				'title' => '<span class="dashicons dashicons-admin-appearance"></span>' . esc_html__( 'Color', 'charitywp' ),
				'id' => 'colors'
			),
			array(
				'title' => '<span class="dashicons dashicons-editor-justify"></span>' . esc_html__( 'Typography', 'charitywp' ),
				'id' => 'fonts'
			),
			array(
				'title' => '<span class="dashicons dashicons-media-document"></span>' . esc_html__( 'Blog/Archive', 'charitywp' ),
				'id' => 'blog'
			),
			array(
				'title' => '<span class="dashicons dashicons-media-text"></span>' . esc_html__( 'Page', 'charitywp' ),
				'id' => 'page'
			),
			array(
				'title' => '<span class="dashicons dashicons-share"></span>' . esc_html__( 'Social Media', 'charitywp' ),
				'id' => 'socialmedia'
			),
			array(
				'title' => '<span class="dashicons dashicons-cart"></span>' . esc_html__( 'WooCommerce', 'charitywp' ),
				'id' => 'woocommerce'
			),
			array(
				'title' => '<span class="dashicons dashicons-hammer"></span>' . esc_html__( 'Custom Codes', 'charitywp' ),
				'id' => 'customcodes'
			),
		),

		'settings' => array(
			/*----- GENERAL TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'charitywp' ),
				'id' => 'general_tab1',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'General Sidebar Position', 'charitywp' ),
					'id' => 'sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position.', 'charitywp' ),
					'std' => 'right',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'Loader Status', 'charitywp' ),
					'id' => 'charitywp_loader',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can select loader status.', 'charitywp' ),
					'std' => 'off',
					'section' => 'general'
				),
			array(
				'label' => esc_html__( 'Header', 'charitywp' ),
				'id' => 'general_tab2',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'Header Status', 'charitywp' ),
					'id' => 'hide_header',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide header.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'General Header Style', 'charitywp' ),
					'id' => 'default_header_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general header style.', 'charitywp' ),
					'std' => 'header-style-1',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Upload', 'charitywp' ),
					'id' => 'charitywp_logo',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload your site logo for header.', 'charitywp' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/logo.png' . '',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Upload - Alternative', 'charitywp' ),
					'id' => 'charitywp_logo_alternative',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload your alternative site logo for header.', 'charitywp' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/logo-alternative.png' . '',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Height', 'charitywp' ),
					'id' => 'logo_height',
					'type' => 'measurement',
					'desc' => esc_html__( 'You can enter logo height for header. Recommended type px.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Weight', 'charitywp' ),
					'id' => 'logo_width',
					'type' => 'measurement',
					'desc' => esc_html__( 'You can enter logo weight for header. Recommended type px.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Fixed', 'charitywp' ),
					'id' => 'header_fixed',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can make fixed header.', 'charitywp' ),
					'std' => 'off',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Social Media', 'charitywp' ),
					'id' => 'header_social_media',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide social links for header.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'User Box', 'charitywp' ),
					'id' => 'header_user_box',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide user box for header.', 'charitywp' ),
					'std' => 'off',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Search', 'charitywp' ),
					'id' => 'header_search',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide search area for header.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Sidebar', 'charitywp' ),
					'id' => 'header_sidebar',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide sidebar area for header.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Top Bar For Style 2', 'charitywp' ),
					'id' => 'header_style_2_top_bar',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide top bar for header style 2.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Phone Number', 'charitywp' ),
					'id' => 'header_phone_number',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter phone number for header.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on),header_style_2_top_bar:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Email Address', 'charitywp' ),
					'id' => 'header_email_address',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter email address for header.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on),header_style_2_top_bar:is(on)'
				),
			array(
				'label' => esc_html__( 'Footer', 'charitywp' ),
				'id' => 'general_tab3',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'Footer Status', 'charitywp' ),
					'id' => 'hide_footer',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide footer.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'General Footer Style', 'charitywp' ),
					'id' => 'default_footer_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general footer style.', 'charitywp' ),
					'std' => 'footer-style-1',
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Footer Page', 'charitywp' ),
					'id' => 'page_footer_style_1',
					'type' => 'page-select',
					'desc' => esc_html__( 'You can select page for footer.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Copyright Text', 'charitywp' ),
					'id' => 'footer_copyright_text',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter copyright text.', 'charitywp' ),
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Copyright Menu', 'charitywp' ),
					'id' => 'hide_copyright_menu',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide copyright menu.', 'charitywp' ),
					'std' => 'on',
					'section' => 'general'
				),
			array(
				'label' => esc_html__( 'Sidebar', 'charitywp' ),
				'id' => 'general_tab4',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'id' => 'custom_sidebars',
					'desc' => '',
					'label' => esc_html__('Create Sidebars','charitywp'),
					'type' => 'list-item',
					'section' => 'general',
					'settings' => array(
						array(
							'label' => esc_html__('ID','charitywp'),
							'id' => 'id',
							'type' => 'text',
							'desc' => esc_html__('Please write a lowercase id, with <strong>no spaces</strong>','charitywp'),
						)
					)
				),
			/*----- GENERAL TAB END -----*/
			
			/*----- COLORS TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'charitywp' ),
				'id' => 'colors_tab1',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Body Background ', 'charitywp' ),
					'id' => 'body_background',
					'type' => 'background',
					'desc' => esc_html__( 'This is body background of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Wrapper Background', 'charitywp' ),
					'id' => 'wrapper_background',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is wrapper background color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Theme Main Color', 'charitywp' ),
					'id' => 'theme_main_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is main color one of site. By setting a color here, all of your elements will use this color instead of default orange color.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Gradient Code', 'charitywp' ),
					'id' => 'theme_gradient',
					'type' => 'css',
					'desc' => esc_html__( 'This is theme gradient color of site. You can look documentation file to create a gradient.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Link Color', 'charitywp' ),
					'id' => 'link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is link color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Link Hover Color', 'charitywp' ),
					'id' => 'link_hover_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is link hover color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Heading Color', 'charitywp' ),
					'id' => 'heading_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is heading(h1, h2, h3, h4, h5 and h6) color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Border Color', 'charitywp' ),
					'id' => 'input_border_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is input border color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Background Color', 'charitywp' ),
					'id' => 'input_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is input background color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Placeholder Color', 'charitywp' ),
					'id' => 'input_placeholder_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is input placeholder color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Background Color', 'charitywp' ),
					'id' => 'button_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is button background color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Hover Background Color', 'charitywp' ),
					'id' => 'button_hover_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is button hover background color of site.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Hover Text Color', 'charitywp' ),
					'id' => 'button_hover_text_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is button hover text color of site.', 'charitywp' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Header', 'charitywp' ),
				'id' => 'colors_tab2',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Header - Style 1, 2, 3 and 4 Background', 'charitywp' ),
					'id' => 'header_style_1_background_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is background color for header style 1, 2, 3 and 4.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 1, 2, 3 and 4 Border Color', 'charitywp' ),
					'id' => 'header_style_1_header_border_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is border color for header style 1, 2, 3 and 4.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 1, 2, 3 and 4 Link Color', 'charitywp' ),
					'id' => 'header_style_1_link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is link color for header style 1, 2, 3 and 4.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 1, 2, 3 and 4 Elements Icon Color', 'charitywp' ),
					'id' => 'header_style_1_elements_icon_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is elements icon color for header style 1, 2, 3 and 4.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 5 Background', 'charitywp' ),
					'id' => 'header_style_5_background_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is background color for header style 5.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 5 Link Color', 'charitywp' ),
					'id' => 'header_style_5_link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is link color for header style 5.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 5 Elements Icon Color', 'charitywp' ),
					'id' => 'header_style_5_elements_icon_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is elements icon color for header style 5.', 'charitywp' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Footer', 'charitywp' ),
				'id' => 'colors_tab3',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Footer - Style 1 Background Color', 'charitywp' ),
					'id' => 'footer_style_1_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is background of footer style 1.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Footer - Style 1 Copyright Background Color', 'charitywp' ),
					'id' => 'footer_style_1_copyright_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is background of copyright style 1.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Footer - Style 2 Background Color', 'charitywp' ),
					'id' => 'footer_style_2_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is background of footer style 2.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Footer - Style 2 Copyright Background Color', 'charitywp' ),
					'id' => 'footer_style_2_copyright_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is background of copyright style 2.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'General Footer Text Color', 'charitywp' ),
					'id' => 'footer_text_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is general text color of footer.', 'charitywp' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Widget & Sidebar', 'charitywp' ),
				'id' => 'colors_tab4',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Sidebar Widget Title Color', 'charitywp' ),
					'id' => 'sidebar_widget_title_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is widget title color.', 'charitywp' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Sidebar Widget Title Border Color', 'charitywp' ),
					'id' => 'sidebar_widget_title_border_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is widget title border color.', 'charitywp' ),
					'section' => 'colors'
				),
			/*----- COLORS TAB END -----*/
			
			/*----- TYPOGRAPHY TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'charitywp' ),
				'id' => 'fonts_tab1',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label'       => esc_html__('Latin Extended', 'charitywp'),
					'id'          => 'font_subsets_latin',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('You can select character status for Latin Extended.','charitywp'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label'       => esc_html__('Cyrillic Extended', 'charitywp'),
					'id'          => 'font_subsets_cyrillic',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('You can select character status for Cyrillic.','charitywp'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label'       => esc_html__('Greek Extended', 'charitywp'),
					'id'          => 'font_subsets_greek',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('You can select character status for Greek language.','charitywp'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label' => esc_html__( 'Theme Main Font One', 'charitywp' ),
					'id' => 'theme_one_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select main theme font.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Theme Main Font Two', 'charitywp' ),
					'id' => 'theme_two_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select main theme font.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Body', 'charitywp' ),
					'id' => 'body_text',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for body.', 'charitywp' ),
					'section' => 'fonts',
					'std' => '',
				),
				array(
					'label' => esc_html__( 'H1', 'charitywp' ),
					'id' => 'h1_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H1.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H2', 'charitywp' ),
					'id' => 'h2_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H2.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H3', 'charitywp' ),
					'id' => 'h3_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H3.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H4', 'charitywp' ),
					'id' => 'h4_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H4.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H5', 'charitywp' ),
					'id' => 'h5_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H5.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H6', 'charitywp' ),
					'id' => 'h6_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for H6.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Input Font', 'charitywp' ),
					'id' => 'input_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for input.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Input Placeholder Font', 'charitywp' ),
					'id' => 'input_placeholder_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for input placeholder.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Button Font', 'charitywp' ),
					'id' => 'button_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for button.', 'charitywp' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Header', 'charitywp' ),
				'id' => 'fonts_tab2',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Header Font', 'charitywp' ),
					'id' => 'header_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for header.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Header Menu Link Font', 'charitywp' ),
					'id' => 'header_menu_link_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for header menu link.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Breadcrumb Font', 'charitywp' ),
					'id' => 'breadcrumb_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for breadcrumb.', 'charitywp' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Single Post', 'charitywp' ),
				'id' => 'fonts_tab3',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Post Content Font', 'charitywp' ),
					'id' => 'post_posts_content_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for post content.', 'charitywp' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Pages', 'charitywp' ),
				'id' => 'fonts_tab4',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Page Content Font', 'charitywp' ),
					'id' => 'page_content_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for page content.', 'charitywp' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( '404 Page', 'charitywp' ),
				'id' => 'fonts_tab5',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( '404 Page Title', 'charitywp' ),
					'id' => '404_page_title',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for 404 page title.', 'charitywp' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( '404 Page Text', 'charitywp' ),
					'id' => '404_page_text',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select font settings for 404 page text.', 'charitywp' ),
					'section' => 'fonts'
				),
			/*----- TYPOGRAPHY TAB END -----*/
			
			/*----- BLOG TAB START -----*/
			array(
				'label' => esc_html__( 'Category', 'charitywp' ),
				'id' => 'blog_tab1',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Category Sidebar Position', 'charitywp' ),
					'id' => 'category_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of category page.', 'charitywp' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Category Post List Style', 'charitywp' ),
					'id' => 'blog_category_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general category post list style of category page.', 'charitywp' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Category Title', 'charitywp' ),
					'id' => 'blog_category_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide category title of category page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'id' => 'sidebar_select',
					'desc' => '',
					'label' => esc_html__('Sidebar For Categories','charitywp'),
					'type' => 'sidebar_select_category',
					'section' => 'blog',
				),
			array(
				'label' => esc_html__( 'Post', 'charitywp' ),
				'id' => 'blog_tab2',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Post Sidebar Position', 'charitywp' ),
					'id' => 'post_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of post.', 'charitywp' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Sidebar Select', 'charitywp' ),
					'id' => 'post_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of post.', 'charitywp' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Information', 'charitywp' ),
					'id' => 'post_post_information',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post information of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Category Name', 'charitywp' ),
					'id' => 'post_post_category_name',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post category name of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Image', 'charitywp' ),
					'id' => 'post_post_image',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post image of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Share Buttons', 'charitywp' ),
					'id' => 'post_post_share_buttons',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post share buttons of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tags', 'charitywp' ),
					'id' => 'post_post_tags',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post tags of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Title', 'charitywp' ),
					'id' => 'post_post_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post title of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Navigation', 'charitywp' ),
					'id' => 'post_post_navigation',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide post navigation of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Related Posts', 'charitywp' ),
					'id' => 'post_related_posts',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide related posts of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Related Posts Column', 'charitywp' ),
					'id' => 'post_related_posts_column',
					'type' => 'numeric-slider',
					'desc' => esc_html__( 'You can enter column for related posts.', 'charitywp' ),
					'std' => '3',
					'min_max_step'=> '2,3,1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Author Biography', 'charitywp' ),
					'id' => 'post_author_biography',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide author biography of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Comment Area', 'charitywp' ),
					'id' => 'post_post_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide comment area of post.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Tag', 'charitywp' ),
				'id' => 'blog_tab3',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Tag Sidebar Position', 'charitywp' ),
					'id' => 'tag_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of tag page.', 'charitywp' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Sidebar Select', 'charitywp' ),
					'id' => 'tag_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of tag page.', 'charitywp' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Post List Style', 'charitywp' ),
					'id' => 'tag_tag_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select tag post list style of tag page.', 'charitywp' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Title', 'charitywp' ),
					'id' => 'tag_tag_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide tag title of tag page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Search', 'charitywp' ),
				'id' => 'blog_tab4',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Search Sidebar Position', 'charitywp' ),
					'id' => 'search_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of search page.', 'charitywp' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Sidebar Select', 'charitywp' ),
					'id' => 'search_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of search page.', 'charitywp' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Post List Style', 'charitywp' ),
					'id' => 'search_search_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select post list style of search page.', 'charitywp' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Title', 'charitywp' ),
					'id' => 'search_search_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide search title of search page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Archive', 'charitywp' ),
				'id' => 'blog_tab5',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Archive Sidebar Position', 'charitywp' ),
					'id' => 'archive_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of archive page.', 'charitywp' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Sidebar Select', 'charitywp' ),
					'id' => 'archive_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of archive page.', 'charitywp' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Post List Style', 'charitywp' ),
					'id' => 'archive_archive_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select category post list style of archive page.', 'charitywp' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Title', 'charitywp' ),
					'id' => 'archive_charitywp_archive_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide archive title of archive page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Attachment', 'charitywp' ),
				'id' => 'blog_tab6',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Attachment Sidebar Position', 'charitywp' ),
					'id' => 'attachment_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of attachment page.', 'charitywp' ),
					'std' => 'nosidebar',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Attachment Sidebar Select', 'charitywp' ),
					'id' => 'attachment_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of attachment page.', 'charitywp' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Attachment Title', 'charitywp' ),
					'id' => 'attachment_attachment_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide attachment title of attachment page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Social Share Buttons', 'charitywp' ),
					'id' => 'attachment_social_share',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide social share buttons of attachment page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Comment Area', 'charitywp' ),
					'id' => 'attachment_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide comment area of attachment page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'blog'
				),
			/*----- BLOG TAB END -----*/
			
			/*----- PAGES TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'charitywp' ),
				'id' => 'page_tab1',
				'type' => 'tab',
				'section' => 'page'
			),
				array(
					'label' => esc_html__( 'Page Sidebar Position', 'charitywp' ),
					'id' => 'page_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select general sidebar position of page.', 'charitywp' ),
					'std' => 'nosidebar',
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Sidebar Select', 'charitywp' ),
					'id' => 'page_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select sidebar of page.', 'charitywp' ),
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Title', 'charitywp' ),
					'id' => 'page_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide page title of page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Title Background', 'charitywp' ),
					'id' => 'page_title_background',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload background for page title.', 'charitywp' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/breadcrumbs-bg.jpg' . '',
					'section' => 'page',
				),
				array(
					'label' => esc_html__( 'Comment Area', 'charitywp' ),
					'id' => 'page_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide comment area of page.', 'charitywp' ),
					'std' => 'on',
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Terms and Conditions Page', 'charitywp' ),
					'id' => 'page_terms_and_conditions',
					'type' => 'page-select',
					'desc' => esc_html__( 'You can select page for terms and conditions.', 'charitywp' ),
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Privacy Policy Page', 'charitywp' ),
					'id' => 'page_privacy_policy',
					'type' => 'page-select',
					'desc' => esc_html__( 'You can select page for privacy policy.', 'charitywp' ),
					'section' => 'page'
				),
			/*----- PAGES TAB END -----*/
			
			/*----- SOCIAL MEDIA TAB START -----*/
			array(
				'label' => esc_html__( 'Social Links', 'charitywp' ),
				'id' => 'socialmedia_tab1',
				'type' => 'tab',
				'section' => 'socialmedia'
			),
				array(
					'label' => esc_html__( 'Facebook URL', 'charitywp' ),
					'id' => 'social_media_facebook',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Facebook url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Twitter URL', 'charitywp' ),
					'id' => 'social_media_twitter',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Twitter url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Google+ URL', 'charitywp' ),
					'id' => 'social_media_googleplus',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Google+ url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Instagram URL', 'charitywp' ),
					'id' => 'social_media_instagram',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Instagram url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'LinkedIn URL', 'charitywp' ),
					'id' => 'social_media_linkedin',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter LinkedIn url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Vine URL', 'charitywp' ),
					'id' => 'social_media_vine',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Vine url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Pinterest URL', 'charitywp' ),
					'id' => 'social_media_pinterest',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Pinterest url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'YouTube URL', 'charitywp' ),
					'id' => 'social_media_youtube',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter YouTube url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Behance URL', 'charitywp' ),
					'id' => 'social_media_behance',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Behance url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'DeviantArt URL', 'charitywp' ),
					'id' => 'social_media_deviantart',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter DeviantArt url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Digg URL', 'charitywp' ),
					'id' => 'social_media_digg',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Digg url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Dribbble URL', 'charitywp' ),
					'id' => 'social_media_dribbble',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Dribbble url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Flickr URL', 'charitywp' ),
					'id' => 'social_media_flickr',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Flickr url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'GitHub URL', 'charitywp' ),
					'id' => 'social_media_github',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter GitHub url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Last.fm URL', 'charitywp' ),
					'id' => 'social_media_lastfm',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Last.fm url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Reddit URL', 'charitywp' ),
					'id' => 'social_media_reddit',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Reddit url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'SoundCloud URL', 'charitywp' ),
					'id' => 'social_media_soundcloud',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter SoundCloud url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Tumblr URL', 'charitywp' ),
					'id' => 'social_media_tumblr',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Tumblr url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Vimeo URL', 'charitywp' ),
					'id' => 'social_media_vimeo',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Vimeo url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'VK URL', 'charitywp' ),
					'id' => 'social_media_vk',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter VK url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Medium URL', 'charitywp' ),
					'id' => 'social_media_medium',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter Medium url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'RSS URL', 'charitywp' ),
					'id' => 'social_media_rss',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter RSS url.', 'charitywp' ),
					'section' => 'socialmedia'
				),
			array(
				'label' => esc_html__( 'Social Share', 'charitywp' ),
				'id' => 'socialmedia_tab2',
				'type' => 'tab',
				'section' => 'socialmedia'
			),
				array(
					'label' => esc_html__( 'General Post Share', 'charitywp' ),
					'id' => 'hide_general_post_share',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide general post social share buttons.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Social Links For User Profile', 'charitywp' ),
					'id' => 'user_profile_social_links',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide social links on author profile.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Facebook Share', 'charitywp' ),
					'id' => 'social_share_facebook',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Facebook on social share.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Twitter Share', 'charitywp' ),
					'id' => 'social_share_twitter',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Twitter on social share.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Google+ Share', 'charitywp' ),
					'id' => 'social_share_googleplus',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Google+ on social share.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Linkedin Share', 'charitywp' ),
					'id' => 'social_share_linkedin',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Linkedin on social share.', 'charitywp' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Pinterest Share', 'charitywp' ),
					'id' => 'social_share_pinterest',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Pinterest on social share.', 'charitywp' ),
					'std' => 'off',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Reddit Share', 'charitywp' ),
					'id' => 'social_share_reddit',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Reddit on social share.', 'charitywp' ),
					'std' => 'off',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Delicious Share', 'charitywp' ),
					'id' => 'social_share_delicious',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Delicious on social share.', 'charitywp' ),
					'std' => 'off',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Stumbleupon Share', 'charitywp' ),
					'id' => 'social_share_stumbleupon',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Stumbleupon on social share.', 'charitywp' ),
					'std' => 'off',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Tumblr Share', 'charitywp' ),
					'id' => 'social_share_tumblr',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide Tumblr on social share.', 'charitywp' ),
					'std' => 'off',
					'section' => 'socialmedia'
				),
			/*----- SOCIAL MEDIA TAB END -----*/
			
			/*----- WOOCOMMERCE TAB START -----*/
			array(
				'label' => esc_html__( 'WooCommerce Sidebar Position - Shop Page', 'charitywp' ),
				'id' => 'woocommerce_sidebar_position',
				'type' => 'radio-image',
				'desc' => esc_html__( 'You can select sidebar position of WooCommerce.', 'charitywp' ),
				'std' => 'right',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Sidebar Position - Single Product', 'charitywp' ),
				'id' => 'woocommerce_product_sidebar_position',
				'type' => 'radio-image',
				'desc' => esc_html__( 'You can select sidebar position of WooCommerce single product.', 'charitywp' ),
				'std' => 'right',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Shop Product Column', 'charitywp' ),
				'id' => 'woocommerce_shop_product_column',
				'type' => 'numeric-slider',
				'desc' => esc_html__( 'You can enter product column for WooCommerce shop page.', 'charitywp' ),
				'std' => '4',
				'min_max_step'=> '3,6,1',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Related Product Count', 'charitywp' ),
				'id' => 'woocommerce_related_product_count_column',
				'type' => 'numeric-slider',
				'desc' => esc_html__( 'You can enter product count for WooCommerce related products.', 'charitywp' ),
				'std' => '4',
				'section' => 'woocommerce'
			),
			/*----- WOOCOMMERCE TAB END -----*/
			
			/*----- CUSTOM CODES TAB START -----*/
			array(
				'label' => esc_html__( 'Custom CSS Codes', 'charitywp' ),
				'id' => 'custom_css',
				'type' => 'css',
				'desc' => esc_html__( 'You can enter custom CSS codes.', 'charitywp' ),
				'section' => 'customcodes'
			),
			array(
				'label' => esc_html__( 'Custom JavaScript Codes', 'charitywp' ),
				'id' => 'custom_js',
				'type' => 'javascript',
				'desc' => esc_html__( 'You can enter custom JavaScript codes.', 'charitywp' ),
				'section' => 'customcodes'
			),
			/*----- CUSTOM CODES TAB END -----*/
		),
	);

	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings ); 
	}

	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_charitywp_custom_theme_options;
	$ot_has_charitywp_custom_theme_options = true;
}