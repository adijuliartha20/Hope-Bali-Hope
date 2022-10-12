<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'charitywp_custom_meta_boxes' );
/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function charitywp_custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
		/*----- POST METABOXES START -----*/
		$post_meta_box = array(
			'id' => 'post_settings',
			'title' => esc_html__( 'Post Settings', 'charitywp' ),
			'pages' => array( 'post' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-header-settings',
					'label' => esc_html__( 'Header Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'header_status',
						'label' => esc_html__( 'Header Status', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide header.', 'charitywp' ),
					),
					array(
						'id' => 'header_layout_select',
						'label'	=> esc_html__( 'Header Style', 'charitywp' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select post for header style.', 'charitywp' ),
					),
					array(
						'id' => 'page_title',
						'label' => esc_html__( 'Page Title & Breadcrumbs', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide page title and breadcrumbs.', 'charitywp' ),
					),
				array(
					'id' => 'tab2-layout-settings',
					'label' => esc_html__( 'Layout Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'sidebar_position',
						'label'	=> esc_html__( 'Sidebar Position', 'charitywp' ),
						'desc' => esc_html__( 'You can select post for sidebar position.', 'charitywp' ),
						'type' => 'radio-image',
					),
					array(
						'label' => esc_html__( 'Post For Sidebar', 'charitywp' ),
						'desc' => esc_html__( 'You can select post for sidebar.', 'charitywp' ),
						'id' => 'post_sidebar_select',
						'type' => 'sidebar-select'
					),
					array(
						'id' => 'full_with_container',
						'label' => esc_html__( 'Full Width Container', 'charitywp' ),
						'type' => 'on_off',
						'std' => 'off',
						'desc' => esc_html__( 'You can make full width container.', 'charitywp' ),
					),
				array(
					'id' => 'tab3-featured-header',
					'label' => esc_html__( 'Featured Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'featured_header_status',
						'label' => esc_html__( 'Featured Header Status', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide featured header.', 'charitywp' ),
					),
					array(
						'id' => 'post_video_embed',
						'label' => esc_html__( 'Video Embed Code', 'charitywp' ),
						'desc' => esc_html__( 'You can enter video embed code.', 'charitywp' ) . esc_attr( '<br><i>' ) . esc_html__( 'Example:', 'charitywp' ) . htmlspecialchars( ' &lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube-nocookie.com/embed/OYbXaqQ3uuo&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;' ) . esc_attr( '</i>' ),
						'type' => 'text'
					),
					array(
						'id' => 'post_audio_embed',
						'label' => esc_html__( 'Audio Embed Code', 'charitywp' ),
						'desc' => esc_html__( 'You can enter audio embed code.', 'charitywp' ) . esc_attr( '<br><i>' ) . esc_html__( 'Example:', 'charitywp' ) . htmlspecialchars( ' &lt;iframe width=&quot;100%&quot; height=&quot;450&quot; scrolling=&quot;no&quot; frameborder=&quot;no&quot; src=&quot;https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/90909412&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false&amp;amp;visual=true&quot;&gt;&lt;/iframe&gt;' ) . esc_attr( '</i>' ),
						'type' => 'text'
					),
					array(
						'id' => 'post_images',
						'label' => esc_html__( 'Post Images', 'charitywp' ),
						'desc' => esc_html__( 'You can upload images for gallery.', 'charitywp' ),
						'type' => 'gallery'
					),
				array(
					'id' => 'tab4-footer-settings',
					'label' => esc_html__( 'Footer Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'footer_status',
						'label' => esc_html__( 'Footer Status', 'charitywp' ),
						'desc' => esc_html__( 'You can hide footer.', 'charitywp' ),
						'type' => 'on_off'
					),
					array(
						'id' => 'footer_layout_select',
						'label'	=> esc_html__( 'Footer Style', 'charitywp' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select post for footer style.', 'charitywp' ),
					),
			)
		);
		ot_register_meta_box( $post_meta_box );
		/*----- POST METABOXES END -----*/
		
		/*----- PAGE METABOXES START -----*/
		$page_meta_box = array( 
			'id' => 'page_settings',
			'title' => esc_html__( 'Page Settings', 'charitywp' ),
			'pages' => array( 'page' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-header-settings',
					'label' => esc_html__( 'Header Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'header_status',
						'label' => esc_html__( 'Header Status', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide header.', 'charitywp' ),
					),
					array(
						'id' => 'header_layout_select',
						'label'	=> esc_html__( 'Header Style', 'charitywp' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select page for header style.', 'charitywp' ),
					),
					array(
						'id' => 'page_title',
						'label' => esc_html__( 'Page Title & Breadcrumbs', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide page title and breadcrumbs.', 'charitywp' ),
					),
					array(
						'id' => 'header_gap',
						'label' => esc_html__( 'Header Gap', 'charitywp' ),
						'type' => 'on_off',
						'std' => 'on',
						'desc' => esc_html__( 'You can remove header gap.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Menu Location', 'charitywp' ),
						'id' => 'page_menu_location',
						'type' => 'radio',
						'desc' => esc_html__( 'You can select menu location for post.', 'charitywp' ),
						'choices' => array(
							array(
								'label' => esc_html__( 'Default Location', 'charitywp' ),
								'value' => 'default'
							),
							array(
								'label' => esc_html__( 'One Page Location', 'charitywp' ),
								'value' => 'onepage'
							),
						),
					),
					
				array(
					'id' => 'tab2-layout-settings',
					'label' => esc_html__( 'Layout Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'sidebar_position',
						'label'	=> esc_html__( 'Sidebar Position', 'charitywp' ),
						'desc' => esc_html__( 'You can select page for sidebar position.', 'charitywp' ),
						'type' => 'radio-image',
					),
					array(
						'label' => esc_html__( 'Page For Sidebar', 'charitywp' ),
						'desc' => esc_html__( 'You can select page for sidebar.', 'charitywp' ),
						'id' => 'page_sidebar_select',
						'type' => 'sidebar-select'
					),
					array(
						'id' => 'full_with_container',
						'label' => esc_html__( 'Full Width Container', 'charitywp' ),
						'type' => 'on_off',
						'std' => 'off',
						'desc' => esc_html__( 'You can make full width container.', 'charitywp' ),
					),					
				array(
					'id' => 'tab3-footer-settings',
					'label' => esc_html__( 'Footer Settings', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'footer_status',
						'label' => esc_html__( 'Footer Status', 'charitywp' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide footer.', 'charitywp' ),
					),
					array(
						'id' => 'footer_layout_select',
						'label'	=> esc_html__( 'Footer Style', 'charitywp' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select page for footer style.', 'charitywp' ),
					),
					array(
						'id' => 'footer_gap',
						'label' => esc_html__( 'Footer Gap', 'charitywp' ),
						'type' => 'on_off',
						'std' => 'on',
						'desc' => esc_html__( 'You can remove footer gap.', 'charitywp' ),
					),
			)
		);
		ot_register_meta_box( $page_meta_box );
		/*----- PAGE METABOXES END -----*/
		
		/*----- TEAM METABOXES START -----*/
		$team_meta_box = array( 
			'id' => 'team_settings',
			'title' => esc_html__( 'Team Settings', 'charitywp' ),
			'pages' => array( 'team' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-general-details',
					'label' => esc_html__( 'General Details', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'team_company',
						'label' => esc_html__( 'Company', 'charitywp' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter company name.', 'charitywp' ),
					),
					array(
						'id' => 'team_birthday',
						'label' => esc_html__( 'Birthday', 'charitywp' ),
						'type' => 'date-picker',
						'desc' => esc_html__( 'You can enter birthday.', 'charitywp' ),
					),
					array(
						'id' => 'team_experiences',
						'label' => esc_html__( 'Experiences', 'charitywp' ),
						'type' => 'textarea-simple',
						'desc' => esc_html__( 'You can enter experiences.', 'charitywp' ),
					),
				array(
					'id' => 'tab2-general-details',
					'label' => esc_html__( 'Contact', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'id' => 'team_location',
						'label' => esc_html__( 'Location', 'charitywp' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can select location.', 'charitywp' ),
					),
					array(
						'id' => 'team_address',
						'label' => esc_html__( 'Address', 'charitywp' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter address.', 'charitywp' ),
					),
					array(
						'id' => 'team_phone',
						'label' => esc_html__( 'Phone', 'charitywp' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter phone.', 'charitywp' ),
					),
					array(
						'id' => 'team_email',
						'label' => esc_html__( 'Email', 'charitywp' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter email.', 'charitywp' ),
					),
				array(
					'id' => 'tab3-team-network',
					'label' => esc_html__( 'Network', 'charitywp' ),
					'type' => 'tab'
				),
					array(
						'label' => esc_html__( 'Official Web Site', 'charitywp' ),
						'id' => 'team_official_web_site',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter official web site.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Facebook URL', 'charitywp' ),
						'id' => 'team_social_media_facebook',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Facebook url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Twitter URL', 'charitywp' ),
						'id' => 'team_social_media_twitter',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Twitter url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Google+ URL', 'charitywp' ),
						'id' => 'team_social_media_googleplus',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Google+ url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Instagram URL', 'charitywp' ),
						'id' => 'team_social_media_instagram',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Instagram url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'YouTube URL', 'charitywp' ),
						'id' => 'team_social_media_youtube',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter YouTube url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Flickr URL', 'charitywp' ),
						'id' => 'team_social_media_flickr',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Flickr url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'SoundCloud URL', 'charitywp' ),
						'id' => 'team_social_media_soundcloud',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter SoundCloud url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'Vimeo URL', 'charitywp' ),
						'id' => 'team_social_media_vimeo',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter Vimeo url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'LinkedIn URL', 'charitywp' ),
						'id' => 'team_social_media_linkedin',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter LinkedIn url.', 'charitywp' ),
					),
					array(
						'label' => esc_html__( 'GitHub URL', 'charitywp' ),
						'id' => 'team_social_media_github',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter GitHub url.', 'charitywp' ),
					),
			)
		);
		ot_register_meta_box( $team_meta_box );
		/*----- TEAM METABOXES END -----*/

	/**
	* Register our meta boxes using the 
	* ot_register_meta_box() function.
	*/
}