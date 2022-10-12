<?php
function charitywp_radio_images( $array, $field_id ) {

	/*----- GENERAL SIDEBAR POSITION START -----*/
	if ( $field_id == 'sidebar_position' or $field_id == 'post_sidebar_position' or $field_id == 'woocommerce_sidebar_position' or $field_id == 'woocommerce_product_sidebar_position' or $field_id == 'attachment_sidebar_position' or $field_id == 'category_sidebar_position' or $field_id == 'search_sidebar_position' or $field_id == 'archive_sidebar_position' or $field_id == 'author_sidebar_position' or $field_id == 'tag_sidebar_position' or $field_id == 'page_sidebar_position' or $field_id == 'layout_select_meta_box_text' or $field_id == 'event_sidebar_position' or $field_id == 'venue_sidebar_position' or $field_id == 'speaker_sidebar_position' ) {
		$array = array(
			array(
				'value' => 'nosidebar',
				'label' => esc_html__( 'None Sidebar', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/none-sidebar.jpg'
			),
			array(
				'value' => 'left',
				'label' => esc_html__( 'Left Sidebar', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/left-sidebar.jpg'
			),
			array(
				'value' => 'right',
				'label' => esc_html__( 'Right Sidebar', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/right-sidebar.jpg'
			)
		);
	}
	/*----- GENERAL SIDEBAR POSITION END -----*/
	
	/*----- HEADER LAYOUT START -----*/
	if ( $field_id == 'header_layout_select' or $field_id == 'default_header_style' ) {
		$array = array(
			array(
				'value' => 'header-style-1',
				'label' => esc_html__( 'Header Style 1', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/header-1.jpg'
			),
			array(
				'value' => 'header-style-2',
				'label' => esc_html__( 'Header Style 2', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/header-2.jpg'
			),
			array(
				'value' => 'header-style-3',
				'label' => esc_html__( 'Header Style 3', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/header-3.jpg'
			),
			array(
				'value' => 'header-style-4',
				'label' => esc_html__( 'Header Style 4', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/header-4.jpg'
			),
			array(
				'value' => 'header-style-5',
				'label' => esc_html__( 'Header Style 5', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/header-5.jpg'
			)
		);
	}
	/*----- HEADER LAYOUT END -----*/
	
	/*----- FOOTER LAYOUT START -----*/
	if ( $field_id == 'footer_layout_select'  or $field_id == 'default_footer_style' ) {
		$array = array(
			array(
				'value' => 'footer-style-1',
				'label' => esc_html__( 'Footer Style 1', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/footer-1.jpg'
			),
			array(
				'value' => 'footer-style-2',
				'label' => esc_html__( 'Footer Style 2', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/footer-2.jpg'
			)
		);
	}
	/*----- FOOTER LAYOUT END -----*/
	
	/*----- CATEGORY STYLE START -----*/
	if ( $field_id == 'blog_category_post_list_style' or $field_id == 'tag_tag_post_list_style' or $field_id == 'author_author_post_list_style' or $field_id == 'search_search_post_list_style' or $field_id == 'archive_archive_post_list_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style1.jpg'
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'charitywp' ),
				'src' => get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style2.jpg'
			)
		);
	}
	/*----- CATEGORY STYLE END -----*/
	
	return $array;
}
add_filter( 'ot_radio_images', 'charitywp_radio_images', 10, 2 );