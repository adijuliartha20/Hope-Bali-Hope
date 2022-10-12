<?php
/**
* Plugin Name: CharityWP Theme: Elements
* Plugin URI: http://themeforest.net/user/gloriathemes
* Description: CharityWP elements plugin.
* Version: 1.0
* Author: Gloria Themes
* Author URI: http://gloriathemes.com/
*/

/*------------- USER PROFILES START -------------*/
	/*------------- USER PROFILES - SOCIAL MEDIA START -------------*/
	function charitywp_user_profile_social_media( $user_profile_create_fields ) {
		$user_profile_create_fields['facebook'] = esc_html__( 'Facebook', 'charitywp' );
		$user_profile_create_fields['googleplus'] = esc_html__( 'Google+', 'charitywp' );
		$user_profile_create_fields['instagram'] = esc_html__( 'Instagram', 'charitywp' );
		$user_profile_create_fields['linkedin'] = esc_html__( 'LinkedIn', 'charitywp' );
		$user_profile_create_fields['vine'] = esc_html__( 'Vine', 'charitywp' );
		$user_profile_create_fields['twitter'] = esc_html__( 'Twitter', 'charitywp' );
		$user_profile_create_fields['pinterest'] = esc_html__( 'Pinterest', 'charitywp' );
		$user_profile_create_fields['youtube'] = esc_html__( 'YouTube', 'charitywp' );
		$user_profile_create_fields['behance'] = esc_html__( 'Behance', 'charitywp' );
		$user_profile_create_fields['deviantart'] = esc_html__( 'DeviantArt', 'charitywp' );
		$user_profile_create_fields['digg'] = esc_html__( 'Digg', 'charitywp' );
		$user_profile_create_fields['dribbble'] = esc_html__( 'Dribbble', 'charitywp' );
		$user_profile_create_fields['flickr'] = esc_html__( 'Flickr', 'charitywp' );
		$user_profile_create_fields['github'] = esc_html__( 'GitHub', 'charitywp' );
		$user_profile_create_fields['lastfm'] = esc_html__( 'Last.fm', 'charitywp' );
		$user_profile_create_fields['reddit'] = esc_html__( 'Reddit', 'charitywp' );
		$user_profile_create_fields['soundcloud'] = esc_html__( 'SoundCloud', 'charitywp' );
		$user_profile_create_fields['tumblr'] = esc_html__( 'Tumblr', 'charitywp' );
		$user_profile_create_fields['vimeo'] = esc_html__( 'Vimeo', 'charitywp' );
		$user_profile_create_fields['vk'] = esc_html__( 'VK', 'charitywp' );
		$user_profile_create_fields['medium'] = esc_html__( 'Medium', 'charitywp' );
		return $user_profile_create_fields;
	}
	add_filter( 'user_contactmethods', 'charitywp_user_profile_social_media', 10, 1 );
	/*------------- USER PROFILES - SOCIAL MEDIA END -------------*/
/*------------- USER PROFILES END -------------*/


/*------------- COMMENTS START -------------*/
	/*------------- COMMENT LIST START -------------*/
	function charitywp_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
		<<?php echo esc_attr( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		
		<?php if ( 'div' != $args['style'] ) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php } ?>
			<div class="comment-author vcard">
				<?php
					$user = get_user_by( 'email', $comment->comment_author_email );
				?>
				<?php if ( $args['avatar_size'] != 0 ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
				<?php $allowed_html = array ( 'span' => array() ); printf( wp_kses( '<cite class="fn">%s</cite>', 'charitywp' ), get_comment_author() ); ?>

				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php printf( esc_html__( '%1$s', 'charitywp' ), get_comment_date(),  get_comment_time() ); ?></a>
				</div>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( '<i class="fa fa-pencil" aria-hidden="true"></i>' . esc_html__( 'Edit', 'charitywp' ), '  ', '' ); ?>
				</div>
			</div>
			
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'charitywp' ); ?></em>
			<?php } ?>

			<?php comment_text(); ?>

		<?php if ( 'div' != $args['style'] ) { ?>
			</div>
		<?php } ?>
	<?php
	}
	/*------------- COMMENT LIST END -------------*/

	/*------------- COMMENT TO TOP START -------------*/
	function eventstation_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'eventstation_move_comment_field_to_bottom' );
	/*------------- COMMENT TO TOP END -------------*/
/*------------- COMMENTS END -------------*/

/*------------- POST TYPES START -------------*/
	/*--------------- TEAMS START ---------------*/
	if ( ! function_exists('charitywp_team') ) {
		function charitywp_team() {
			$labels = array(
				'name' => _x( 'Teams', 'Members General Name', 'charitywp' ),
				'singular_name' => _x( 'Member', 'Members Singular Name', 'charitywp' ),
				'menu_name' => esc_html__( 'Teams', 'charitywp' ),
				'parent_item_colon' => esc_html__( 'Parent Member:', 'charitywp' ),
				'all_items' => esc_html__( 'All Members', 'charitywp' ),
				'view_item' => esc_html__( 'View Member', 'charitywp' ),
				'add_new_item' => esc_html__( 'Add New Member Item', 'charitywp' ),
				'add_new' => esc_html__( 'Add New Member', 'charitywp' ),
				'edit_item' => esc_html__( 'Edit Member', 'charitywp' ),
				'update_item' => esc_html__( 'Update Member', 'charitywp' ),
				'search_items' => esc_html__( 'Search Member', 'charitywp' ),
				'not_found' => esc_html__( 'Not Member Found', 'charitywp' ),
				'not_found_in_trash' => esc_html__( 'Not Member Found in Trash', 'charitywp' ),
			);
			$args = array(
				'label' => esc_html__( 'Teams', 'charitywp' ),
				'description' => esc_html__( 'Member post type description.', 'charitywp' ),
				'labels' => $labels,
				'supports' => array( 'title', 'comments', 'author', 'excerpt', 'thumbnail', 'revisions', 'editor' ),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-image-filter',
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
			);
			register_post_type( 'team', $args );
		}
		add_action( 'init', 'charitywp_team', 0 );
	}
	/*--------------- TEAMS END ---------------*/
/*------------- POST TYPES END -------------*/

/*--------------- TAXONOMY START ---------------*/
	/*--------------- CATEGORY START ---------------*/
	if ( ! function_exists( 'charitywp_team_category' ) ) {
		function charitywp_team_category() {
			$labels = array(
				'name' => _x( 'Categories', 'Categories General Name', 'charitywp' ),
				'singular_name' => _x( 'Categories', 'Categories Singular Name', 'charitywp' ),
				'menu_name' => esc_html__( 'Categories', 'charitywp' ),
				'all_items' => esc_html__( 'All Categories', 'charitywp' ),
				'parent_item' => esc_html__( 'Parent Category', 'charitywp' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'charitywp' ),
				'new_item_name' => esc_html__( 'New Category Name', 'charitywp' ),
				'add_new_item' => esc_html__( 'Add New Category', 'charitywp' ),
				'edit_item' => esc_html__( 'Edit Category', 'charitywp' ),
				'view_item' => esc_html__( 'View Category', 'charitywp' ),
				'update_item' => esc_html__( 'Update Category', 'charitywp' ),
				'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'charitywp' ),
				'search_items' => esc_html__( 'Search Categories', 'charitywp' ),
				'add_or_remove_items' => esc_html__( 'Add or remove categories', 'charitywp' ),
				'choose_from_most_used' => esc_html__( 'Choose from the most used categories', 'charitywp' ),
				'not_found' => esc_html__( 'Not Found', 'charitywp' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => false,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
			);
			register_taxonomy( 'team_category', array( 'team' ), $args );

		}
		add_action( 'init', 'charitywp_team_category', 0 );
	}
	/*--------------- CATEGORY END ---------------*/
/*--------------- TAXONOMY START ---------------*/

/*--------------- VC ELEMENTS START ---------------*/
	/*------------- CHARITYWP SLIDER START -------------*/
	function charitywp_slider_output( $atts, $content = null ) {		
		$atts = shortcode_atts(
			array(
				'style' => '',
				'pagination' => '',
			), $atts
		);

		$output = '';

		if( $atts["style"] == "style2" ) {
			$style_column = "2";
		} elseif( $atts["style"] == "style3" ) {
			$style_column = "3";
		} elseif( $atts["style"] == "style4" ) {
			$style_column = "1";
		} elseif( $atts["style"] == "style5" ) {
			$style_column = "1";
		} else {
			$style_column = "1";
		}

			$output .= '<div class="swiper-container charitywp-slider-carousel gloria-sliders ' . esc_attr( $atts["style"] ) . '" data-item="' . esc_attr( $style_column ) . '" data-sloop="true" data-column-space="0" data-autoplay="5000" data-pagination=".swiper-pagination">';
				$output .= '<div class="swiper-wrapper">';
					$output .= do_shortcode( $content );
				$output .= '</div>';
				if( $atts["pagination"] == "true" ) {
					$output .= '<div class="swiper-pagination"></div>';					
				}
			$output .= '</div>';

			return $output;
	}
	add_shortcode( "charitywp_slider", "charitywp_slider_output" );

	function charitywp_slider_item_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'sliderimage' => '',
				'boxname' => '',
				'title' => '',
				'maintext' => '',
				'link1' => '',
				'link2' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["title"] ) ) {
			$output .= '<div class="swiper-slide">';
				$output .= '<div class="slider-wrapper">';
					if( !empty( $atts["sliderimage"] ) ) {
						$image = $atts["sliderimage"];
						$output .= '<div class="image" style="background-image:url(' . wp_get_attachment_image_url( $image, 'charitywp-slider', true, array( "alt" => $atts["title"] ) ) . ');">';
							if( !empty( $atts["maintext"] ) or !empty( $atts["title"] ) or !empty( $atts["boxname"] ) or !empty( $atts["link1"] ) or !empty( $atts["link2"] ) ) {
								$output .= '<div class="content container">';
									$output .= '<div class="content-wrapper">';
										if( !empty( $atts["boxname"] ) ) {
											$output .= '<div class="box-name">' . esc_attr( $atts["boxname"] ) . '</div>';
										}
										if( !empty( $atts["title"] ) ) {
											$output .= '<div class="title">' . esc_attr( $atts["title"] ) . '</div>';
										}
										if( !empty( $atts["maintext"] ) ) {
											$output .= '<p>' . esc_attr( $atts["maintext"] ) . '</p>';
										}
										if( !empty( $atts["link1"] ) or !empty( $atts["link2"] ) ) {
											$output .= '<div class="buttons">';
												if( !empty( $atts["link1"] ) ) {
													$href = $atts["link1"];
													$href = vc_build_link( $href );
													if( !empty( $href["target"] ) ) {
														$target = $href["target"];
													} else {
														$target = "_parent";
													}
													if( !empty( $href["url"] ) ) {
														$output .= '<a href="' . esc_url( $href["url"] ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $href["title"] ) . '"><span>' . esc_attr( $href["title"] ) . '</span></a>';
													}
												}
												if( !empty( $atts["link2"] ) ) {
													$href = $atts["link2"];
													$href = vc_build_link( $href );
													if( !empty( $href["target"] ) ) {
														$target = $href["target"];
													} else {
														$target = "_parent";
													}
													if( !empty( $href["url"] ) ) {
														$output .= '<a href="' . esc_url( $href["url"] ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $href["title"] ) . '"><span>' . esc_attr( $href["title"] ) . '</span></a>';
													}
												}
											$output .= '</div>';
										}
									$output .= '</div>';
								$output .= '</div>';
							}
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode("charitywp_slider_item", "charitywp_slider_item_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Slider', 'charitywp' ),
			"base" => "charitywp_slider",
			"as_parent" => array('only' => 'charitywp_slider_item'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-slider.jpg',
			"description" =>esc_html__( 'CharityWP slider element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
						esc_html__( 'Style 3', 'charitywp' ) => 'style3',
						esc_html__( 'Style 4', 'charitywp' ) => 'style4',
						esc_html__( 'Style 5', 'charitywp' ) => 'style5',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'charitywp' ),
					"description" => esc_html__( 'You can select the pagination status.', 'charitywp' ),
					"param_name" => "pagination",
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
			)
		)
		);
	}

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__("CharityWP Slider Item", 'charitywp'),
			"base" => "charitywp_slider_item",
			"as_child" => array( 'only' => 'charitywp_slider' ),
			"content_element" => true,
			"category" => esc_html__("CharityWP Theme", 'charitywp'),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-slider.jpg',
			"description" =>esc_html__( 'CharityWP slider item element.','charitywp'),
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Image', 'charitywp' ),
					"description" => esc_html__( 'You can upload the slider image.', 'charitywp' ),
					"param_name" => "sliderimage",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Box Name', 'charitywp' ),
					"description" => esc_html__( 'You can enter the box title.', 'charitywp' ),
					"param_name" => "boxname",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'charitywp' ),
					"description" => esc_html__( 'You can enter the title.', 'charitywp' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'charitywp' ),
					"description" => esc_html__( 'You can enter the text.', 'charitywp' ),
					"param_name" => "maintext",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link 1', 'charitywp' ),
					"description" => esc_html__( 'You can enter the link 1.', 'charitywp' ),
					"param_name" => "link1",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link 2', 'charitywp' ),
					"description" => esc_html__( 'You can enter the link 2.', 'charitywp' ),
					"param_name" => "link2",
				)
			)
		) );
	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_charitywp_slider extends WPBakeryShortCodesContainer {}
	}
	/*------------- CHARITYWP SLIDER END -------------*/

	/*------------- CHARITYWP FULLY SLIDER START -------------*/
	function charitywp_fully_slider_output( $atts, $content = null ) {		
		$atts = shortcode_atts(
			array(
				'autoplay' => '',
				'pagination' => '',
			), $atts
		);

		$output = '';

			$output .= '<div class="swiper-container charitywp-fully-slider gloria-sliders" data-item="1" data-sloop="true" data-column-space="0" data-effect="fade" data-autoplay="' . esc_attr( $atts["autoplay"] ) . '" data-pagination=".swiper-pagination">';
				$output .= '<div class="swiper-wrapper">';
					$output .= do_shortcode( $content );
				$output .= '</div>';
				if( $atts["pagination"] == "true" ) {
					$output .= '<div class="swiper-pagination"></div>';					
				}
			$output .= '</div>';

			return $output;
	}
	add_shortcode( "charitywp_fully_slider", "charitywp_fully_slider_output" );

	function charitywp_fully_slider_item_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'sliderimage' => '',
				'title' => '',
				'text' => '',
				'link' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["title"] ) ) {
			$output .= '<div class="swiper-slide">';
				$output .= '<div class="slider-wrapper">';
					if( !empty( $atts["sliderimage"] ) ) {
						$image = $atts["sliderimage"];
						$output .= '<div class="image" style="background-image:url(' . wp_get_attachment_image_url( $image, 'charitywp-fully-slider', true, array( "alt" => $atts["title"] ) ) . ');">';
							if( !empty( $atts["text"] ) or !empty( $atts["title"] ) or !empty( $atts["link"] ) ) {
								$output .= '<div class="content container">';
									$output .= '<div class="content-wrapper">';
										if( !empty( $atts["title"] ) ) {
											$output .= '<div class="title">' . esc_attr( $atts["title"] ) . '</div>';
										}
										if( !empty( $atts["text"] ) ) {
											$output .= '<p>' . esc_attr( $atts["text"] ) . '</p>';
										}
										if( !empty( $atts["link"] ) ) {
											$output .= '<div class="buttons">';
												if( !empty( $atts["link"] ) ) {
													$href = $atts["link"];
													$href = vc_build_link( $href );
													if( !empty( $href["target"] ) ) {
														$target = $href["target"];
													} else {
														$target = "_parent";
													}
													if( !empty( $href["url"] ) ) {
														$output .= '<a href="' . esc_url( $href["url"] ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $href["title"] ) . '" class="charitywp-link-button"><span>' . esc_attr( $href["title"] ) . '</span></a>';
													}
												}
											$output .= '</div>';
										}
									$output .= '</div>';
								$output .= '</div>';
							}
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode("charitywp_fully_slider_item", "charitywp_fully_slider_item_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Fully Slider', 'charitywp' ),
			"base" => "charitywp_fully_slider",
			"as_parent" => array('only' => 'charitywp_fully_slider_item'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-fully-slider.jpg',
			"description" =>esc_html__( 'CharityWP fully slider element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay', 'charitywp' ),
					"description" => esc_html__( 'You can enter the autoplay delay. Example: 5000. Leave blank to autoplay disabled.', 'charitywp' ),
					"param_name" => "autoplay",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'charitywp' ),
					"description" => esc_html__( 'You can select the pagination status.', 'charitywp' ),
					"param_name" => "pagination",
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
			)
		)
		);
	}

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__("CharityWP Fully Slider Item", 'charitywp'),
			"base" => "charitywp_fully_slider_item",
			"as_child" => array( 'only' => 'charitywp_fully_slider' ),
			"content_element" => true,
			"category" => esc_html__("CharityWP Theme", 'charitywp'),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-fully-slider.jpg',
			"description" =>esc_html__( 'CharityWP fully slider item element.','charitywp'),
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Image', 'charitywp' ),
					"description" => esc_html__( 'You can upload the slider image.', 'charitywp' ),
					"param_name" => "sliderimage",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Title', 'charitywp' ),
					"description" => esc_html__( 'You can enter the title.', 'charitywp' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'charitywp' ),
					"description" => esc_html__( 'You can enter the text.', 'charitywp' ),
					"param_name" => "text",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Link', 'charitywp' ),
					"description" => esc_html__( 'You can enter the link.', 'charitywp' ),
					"param_name" => "link",
				),
			)
		) );
	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_charitywp_fully_slider extends WPBakeryShortCodesContainer {}
	}
	/*------------- CHARITYWP FULLY SLIDER END -------------*/

	/*------------- CHARITYWP TITLE START -------------*/
	function charitywp_content_title_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'size' => '',
				'style' => '',
				'align' => '',
				'title' => '',
				'text' => '',
			), $atts
		);

		$output = "";

		if( !empty( $atts["title"] ) or !empty( $atts["title"] ) ) {
			$output .= '<div class="content-title-element ' . esc_attr( $atts["style"] ) . ' ' . esc_attr( $atts["size"] ) . ' ' . esc_attr( $atts["align"] ) . '">';
				if( !empty( $atts["title"] ) ) {
					$output .= '<div class="title">';
						$output .= '<span>' . esc_attr( $atts["title"] ) . '</span>';
					$output .= '</div>';
				}
				if( !empty( $atts["text"] ) ) {
					$output .= '<div class="text">' . esc_attr( $atts["text"] ) . '</div>';
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_content_title", "charitywp_content_title_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Title', 'charitywp' ),
			"base" => "charitywp_content_title",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-content-title.jpg',
			"description" =>esc_html__( 'CharityWP title element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Size', 'charitywp' ),
					"description" => esc_html__( 'You can select the title size.', 'charitywp' ),
					"param_name" => "size",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Size 1', 'charitywp' ) => 'size1',
						esc_html__( 'Size 2', 'charitywp' ) => 'size2',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the title style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Dark', 'charitywp' ) => 'dark',
						esc_html__( 'White', 'charitywp' ) => 'white',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Align', 'charitywp' ),
					"description" => esc_html__( 'You can select the align style.', 'charitywp' ),
					"param_name" => "align",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Left', 'charitywp' ) => 'left',
						esc_html__( 'Right', 'charitywp' ) => 'right',
						esc_html__( 'Center', 'charitywp' ) => 'center',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'charitywp' ),
					"description" => esc_html__( 'You can enter the title.', 'charitywp' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'charitywp' ),
					"description" => esc_html__( 'You can enter the text.', 'charitywp' ),
					"param_name" => "text",
				)
			),
		)
		);
	}
	/*------------- CHARITYWP TITLE END -------------*/

	/*------------- CHARITYWP BANNER START -------------*/
	function charitywp_banner_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'toptitle' => '',
				'maintitle' => '',
				'text' => '',
				'link' => '',
				'bannerbg' => '',
			), $atts
		);

		$output = "";

		if( !empty( $atts["toptitle"] ) or !empty( $atts["maintitle"] ) or !empty( $atts["link"] ) ) {

			if( !empty( $atts["bannerbg"] ) ) {
				$bannerbg = $atts["bannerbg"];
			} else {
				$bannerbg = "";
			}

			$output .= '<div class="charitywp-banner" style="background-image:url(' . esc_url( wp_get_attachment_url( $bannerbg, 'full', true, true ) ) . ');">';

				$output .= '<div class="content">';
					if( !empty( $atts["toptitle"] ) ) {
						$output .= '<div class="toptitle">' . esc_attr( $atts["toptitle"] ) . '</div>';
					}

					if( !empty( $atts["maintitle"] ) ) {
						$output .= '<div class="maintitle">' . esc_attr( $atts["maintitle"] ) . '</div>';
					}

					if( !empty( $atts["text"] ) ) {
						$output .= '<p class="text">' . esc_attr( $atts["text"] ) . '</p>';
					}

					if( !empty( $atts["link"] ) ) {
						$href = $atts["link"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}

						if( !empty( $href["url"] ) ) {
							$output .= '<div class="button"><a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">' . esc_attr( $href["title"] ) . '</a></div>';
						}
					}
				$output .= '</div>';

			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_banner", "charitywp_banner_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Banner Box', 'charitywp' ),
			"base" => "charitywp_banner",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-banner.jpg',
			"description" =>esc_html__( 'CharityWP banner box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Top Title", 'charitywp' ),
					"description" => esc_html__( 'You can enter the top title.', 'charitywp' ),
					"param_name" => "toptitle",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Main Title", 'charitywp' ),
					"description" => esc_html__( 'You can enter the main title.', 'charitywp' ),
					"param_name" => "maintitle",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text", 'charitywp' ),
					"description" => esc_html__( 'You can enter the text.', 'charitywp' ),
					"param_name" => "text",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Banner Link', 'charitywp' ),
					"description" => esc_html__( 'You can enter the more link.', 'charitywp' ),
					"param_name" => "link",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( 'Background', 'charitywp' ),
					"description" => esc_html__( 'You can upload the banner background.', 'charitywp' ),
					"param_name" => "bannerbg",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP BANNER END -------------*/

	/*------------- CHARITYWP BUTTON START -------------*/
	function charitywp_button_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'style' => '',
				'buttonlink' => '',
				'icon' => '',
				'align' => '',
				'floating' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["buttonlink"] ) ) {
			if( $atts["floating"] == "true" ) {
				$floating = "floating-true";
			} else {
				$floating = "floating-false";
			}

			$output .= '<div class="charitywp-button ' . esc_attr( $atts["style"] ) . ' ' . esc_attr( $atts["align"] ) . ' ' . esc_attr( $floating ) . '">';
				$href = $atts["buttonlink"];
				$href = vc_build_link( $href );
				if( !empty( $href["target"] ) ) {
					$target = $href["target"];
				} else {
					$target = "_parent";
				}

				$output .= '<a href="' . esc_url( $href["url"] ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $href["title"] ) . '">';
					if( !empty( $atts["icon"] ) ) {
						$output .= '<i class="fa fa-' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
					}
					$output .= '<span>' . esc_attr( $href["title"] ) . '</span>';
				$output .= '</a>';
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_button", "charitywp_button_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Button', 'charitywp' ),
			"base" => "charitywp_button",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-button.jpg',
			"description" =>esc_html__( 'CharityWP button element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the title style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
						esc_html__( 'Style 3', 'charitywp' ) => 'style3',
						esc_html__( 'Style 4', 'charitywp' ) => 'style4',
						esc_html__( 'Style 5', 'charitywp' ) => 'style5',
					),
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button Link', 'charitywp' ),
					"description" => esc_html__( 'You can enter the button link.', 'charitywp' ),
					"param_name" => "buttonlink",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'charitywp' ),
					"description" => esc_html__( 'You can enter the icon name. List of the icons is available in the documentation file. Example: edge, automobile, bel-o.', 'charitywp' ),
					"param_name" => "icon",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Align', 'charitywp' ),
					"description" => esc_html__( 'You can select the align style.', 'charitywp' ),
					"param_name" => "align",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Left', 'charitywp' ) => 'left',
						esc_html__( 'Right', 'charitywp' ) => 'right',
						esc_html__( 'Center', 'charitywp' ) => 'center',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Floating Left', 'charitywp' ),
					"description" => esc_html__( 'You can select the floating left status.', 'charitywp' ),
					"param_name" => "floating",
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
			),
		)
		);
	}
	/*------------- CHARITYWP BUTTON END -------------*/

	/*------------- CHARITYWP EVENT LIST START -------------*/
	function charitywp_event_list_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'style' => '',
				'eventids' => '',
				'eventtag' => '',
				'excludeevents' => '',
				'offset' => '',
				'eventcount' => '',
				'eventcat' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts['excludeevents'] ) ) {
			$excludeevents = $atts['excludeevents'];
			$exclude = explode( ',', $excludeevents );
		} else {
			$exclude = "";
		}

		if( !empty( $atts['eventids'] ) ) {
			$eventids = explode( ',', $atts['eventids'] );
		} else {
			$eventids = "";
		}

		$query_arg = array(
			'posts_per_page' => $atts['eventcount'],
			'post__not_in' => $exclude,
			'tag' => $atts['eventtag'],
			'tribe_events_cat' => $atts['eventcat'],
			'post__in' => $eventids,
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'tribe_events',
			'order' => 'DESC',
			'orderby' => 'date',
		);
		$post_query = new WP_Query( $query_arg );

		if ( $post_query->have_posts() ) {
			$output .= '<div class="charitywp-event-list ' . esc_attr( $atts["style"] ) . '">';
				$output .= '<ul>';
					while ( $post_query->have_posts() ) {
						$post_query->the_post();
						$output .= '<li>';
							if ( has_post_thumbnail( get_the_ID() ) ) {
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'charitywp-event-list' );
								$output .= '<div class="image"><a href="' . get_the_permalink( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" /></a></div>';
							}
							$output .= '<div class="content">';
								$output .= '<div class="title"><a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '">' . get_the_title() . '</a></div>';
								if( !empty( get_the_excerpt() ) ) {
									$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
								}

								$event_date = tribe_get_start_date( null, false );
								if( !empty( $event_date ) ) {
									$output .= '<div class="eventdate"><i class="fa fa-calendar" aria-hidden="true"></i><span>' . date_i18n( get_option( 'date_format' ), strtotime( $event_date ) ) . '</span></div>';
								}

							$output .= '</div>';
						$output .= '</li>';
					}
					wp_reset_postdata();
				$output .= '</ul>';
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_event_list", "charitywp_event_list_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Event List', 'charitywp' ),
			"base" => "charitywp_event_list",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-event-list.jpg',
			"description" =>esc_html__( 'CharityWP event list element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the title style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Events', 'charitywp' ),
					"description" => esc_html__( 'You can enter the event ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "excludeevents",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'charitywp' ),
					"description" => esc_html__( 'You can enter the offset number.', 'charitywp' ),
					"param_name" => "offset",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Event Count', 'charitywp' ),
					"description" => esc_html__( 'You can enter the event count.', 'charitywp' ),
					"param_name" => "eventcount",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Tag', 'charitywp' ),
					"description" => esc_html__( 'You can enter the event tag.', 'charitywp' ),
					"param_name" => "eventtag",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Event ID's", 'charitywp' ),
					"description" => esc_html__( 'You can enter the event ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "eventids",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category Name", 'charitywp' ),
					"description" => esc_html__( 'You can enter the category name. Enter as slug name.', 'charitywp' ),
					"param_name" => "eventcat",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP EVENT LIST END -------------*/

	/*------------- CHARITYWP DONATION LIST START -------------*/
	function charitywp_donations_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'goalstatus' => '',
				'buttonstyle' => '',
				'detailbutton' => '',
				'column' => '',
				'donationids' => '',
				'excludedonations' => '',
				'offset' => '',
				'donationcount' => '',
				'slidersystem' => '',
				'autoplay' => '',
				'loop' => '',
				'columnsize' => '',
				'columnspace' => '',
				'navigation' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts['excludedonations'] ) ) {
			$excludedonations = $atts['excludedonations'];
			$exclude = explode( ',', $excludedonations );
		} else {
			$exclude = "";
		}

		if( !empty( $atts['donationids'] ) ) {
			$donationids = explode( ',', $atts['donationids'] );
		} else {
			$donationids = "";
		}

		$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
		if( empty( $paged ) ) { $paged = 1; }

		$query_arg = array(
			'posts_per_page' => $atts['donationcount'],
			'post__not_in' => $exclude,
			'post__in' => $donationids,
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'paged' => $paged,
			'ignore_sticky_posts' => true,
			'post_type' => 'give_forms',
		);
		$post_query = new WP_Query( $query_arg );

		if ( $post_query->have_posts() ) {
			if( $atts["slidersystem"] == "true" ) {

				if( !empty( $atts["columnsize"] ) ) {
					$columnsize = $atts["columnsize"];
				} else {
					$columnsize = "3";
				}

				if( !empty( $atts["columnspace"] ) ) {
					$columnspace = $atts["columnspace"];
				} else {
					$columnspace = "30";
				}
				
				$output .= '<div class="charitywp-donation-list">';
					$output .= '<div class="swiper-container donation-carousel gloria-sliders" data-column-space="' . esc_attr( $columnspace ) . '" data-aplay="' . esc_attr( $atts["autoplay"] ) . '" data-item="' . esc_attr( $columnsize ) . '" data-sloop="' . esc_attr( $atts["loop"] ) . '">';
						$output .= '<div class="swiper-wrapper">';
							while ( $post_query->have_posts() ) {
								$post_query->the_post();
								$output .= '<div class="swiper-slide">';
									if ( has_post_thumbnail( get_the_ID() ) ) {
										$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'charitywp-donation-small' );
										$output .= '<div class="image"><a href="' . get_the_permalink( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" /></a></div>';
									}

									$output .= '<div class="content">';
										$output .= '<div class="title"><a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '">' . get_the_title() . '</a></div>';

										if( !empty( get_the_excerpt() ) ) {
											$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
										}

										if( $atts["goalstatus"] == "true" ) {
											$output .= do_shortcode( '[give_goal id="' . get_the_ID() . '" show_text="true" show_bar="true"]' );
										}

										$output .= '<div class="button">';
											if( $atts["buttonstyle"] == "detailpage" ) {
												$output .= '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" class="charitywp-link-button">' . esc_html__( 'Donate Now', 'charitywp' ) . '</a>';									
											} else {
												$output .= do_shortcode( '[give_form id="' . get_the_ID() . '" show_title="true" show_goal="true" show_content="none" display_style="button"]' );
											}

											if( $atts["detailbutton"] == "true" ) {
												$output .= '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" class="charitywp-link-button charitywp-link-button-opened">' . esc_html__( 'Details', 'charitywp' ) . '</a>';										
											}
										$output .= '</div>';
										
									$output .= '</div>';
								$output .= '</div>';
							}
							wp_reset_postdata();
						$output .= '</div>';
						if( $atts["navigation"] == "true" ) {
							$output .= '<div class="pagination-buttons">
											<div class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
											<div class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
										</div>';					
						}
					$output .= '</div>';
				$output .= '</div>';

			} else {
				$output .= '<div class="charitywp-donation-list ' . esc_attr( $atts["column"] ) . '">';
					$output .= '<ul>';
						while ( $post_query->have_posts() ) {
							$post_query->the_post();
							$output .= '<li>';
								if ( has_post_thumbnail( get_the_ID() ) ) {
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'charitywp-donation-small' );
									$output .= '<div class="image"><a href="' . get_the_permalink( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" /></a></div>';
								}

								$output .= '<div class="content">';
									$output .= '<div class="title"><a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '">' . get_the_title() . '</a></div>';

									if( !empty( get_the_excerpt() ) ) {
										$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
									}

									if( $atts["goalstatus"] == "true" ) {
										$output .= do_shortcode( '[give_goal id="' . get_the_ID() . '" show_text="true" show_bar="true"]' );
									}

									$output .= '<div class="button">';
										if( $atts["buttonstyle"] == "detailpage" ) {
											$output .= '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" class="charitywp-link-button">' . esc_html__( 'Donate Now', 'charitywp' ) . '</a>';									
										} else {
											$output .= do_shortcode( '[give_form id="' . get_the_ID() . '" show_title="true" show_goal="true" show_content="none" display_style="button"]' );
										}

										if( $atts["detailbutton"] == "true" ) {
											$output .= '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" class="charitywp-link-button charitywp-link-button-opened">' . esc_html__( 'Details', 'charitywp' ) . '</a>';										
										}
									$output .= '</div>';
									
								$output .= '</div>';
							$output .= '</li>';
						}
						wp_reset_postdata();
					$output .= '</ul>';

					if ( $atts['navigation'] == 'true' ) {
						$output .= charitywp_latest_posts_pagination( $paged = $paged, $query = $post_query );
					}
				$output .= '</div>';
			}
		}

		return $output;
	}
	add_shortcode( "charitywp_donations", "charitywp_donations_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Donation List', 'charitywp' ),
			"base" => "charitywp_donations",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-donation-list.jpg',
			"description" =>esc_html__( 'CharityWP donation and causes list element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'charitywp' ),
					"description" => esc_html__( 'You can select the column style.', 'charitywp' ),
					"param_name" => "column",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'Two Column', 'charitywp' ) => 'two-column',
						esc_html__( 'Three Column', 'charitywp' ) => 'three-column',
						esc_html__( 'Four Column', 'charitywp' ) => 'four-column',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Button Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the button style.', 'charitywp' ),
					"param_name" => "buttonstyle",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'Modal', 'charitywp' ) => 'modal',
						esc_html__( 'Payment via Detail Page', 'charitywp' ) => 'detailpage',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Goal Status', 'charitywp' ),
					"description" => esc_html__( 'You can select the goal status.', 'charitywp' ),
					"param_name" => "goalstatus",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Detail Button Status', 'charitywp' ),
					"description" => esc_html__( 'You can select the detail button status.', 'charitywp' ),
					"param_name" => "detailbutton",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Slider System', 'charitywp' ),
					"description" => esc_html__( 'You can select the slider system.', 'charitywp' ),
					"param_name" => "slidersystem",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay', 'charitywp' ),
					"description" => esc_html__( 'You can enter the autoplay delay. Example: 5000. Leave blank to autoplay disabled.', 'charitywp' ),
					"param_name" => "autoplay",
					"group" => esc_html__( 'Design', 'charitywp' ),
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Loop",'charitywp'),
					"description" => esc_html__("You can select the loop status.",'charitywp'),
					"param_name" => "loop",
					"group" => esc_html__( 'Design', 'charitywp' ),
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Slider Column', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column.', 'charitywp' ),
					"param_name" => "columnsize",
					"group" => esc_html__( 'Design', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Column Space', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column space.', 'charitywp' ),
					"param_name" => "columnspace",
					"group" => esc_html__( 'Design', 'charitywp' ),
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Navigation",'charitywp'),
					"description" => esc_html__("You can select the navigation status.",'charitywp'),
					"param_name" => "navigation",
					"group" => esc_html__( 'Design', 'charitywp' ),
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Donation', 'charitywp' ),
					"description" => esc_html__( 'You can enter the donation ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "excludedonations",
					"group" => esc_html__( 'Content', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'charitywp' ),
					"description" => esc_html__( 'You can enter the offset number.', 'charitywp' ),
					"param_name" => "offset",
					"group" => esc_html__( 'Content', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Donation Count', 'charitywp' ),
					"description" => esc_html__( 'You can enter the donation count.', 'charitywp' ),
					"param_name" => "donationcount",
					"group" => esc_html__( 'Content', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Donation ID's", 'charitywp' ),
					"description" => esc_html__( 'You can enter the donation ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "donationids",
					"group" => esc_html__( 'Content', 'charitywp' ),
				),
			),
		)
		);
	}
	/*------------- CHARITYWP DONATION LIST END -------------*/

	/*------------- CHARITYWP SINGLE DONATION CONTENT START -------------*/
	function charitywp_single_donation_content_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'contenttype' => '',
				'donationid' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts['donationid'] ) ) {
			$donationid = explode( ',', $atts['donationid'] );
		} else {
			$donationid = "";
		}

		$query_arg = array(
			'posts_per_page' => 1,
			'post__in' => $donationid,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'give_forms',
		);
		$post_query = new WP_Query( $query_arg );

		if ( $post_query->have_posts() ) {
			$output .= '<div class="charitywp-single-donation-content ' . esc_attr( $atts["contenttype"] ) . '">';
				while ( $post_query->have_posts() ) {
					$post_query->the_post();
					if( $atts["contenttype"] == "modalpayment1" ) {
						$output .= do_shortcode( '[give_form id="' . get_the_ID() . '" show_title="true" show_goal="true" show_content="none" display_style="modal"]' );
					} else {
						$output .= do_shortcode( '[give_form id="' . get_the_ID() . '" show_title="true" show_goal="true" show_content="none" display_style="button"]' );
					}
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_single_donation_content", "charitywp_single_donation_content_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Single Donation', 'charitywp' ),
			"base" => "charitywp_single_donation_content",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-single-donation.jpg',
			"description" =>esc_html__( 'CharityWP single donation element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Content Type', 'charitywp' ),
					"description" => esc_html__( 'You can select the content type.', 'charitywp' ),
					"param_name" => "contenttype",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Button Payment', 'charitywp' ) => 'button',
						esc_html__( 'Modal Payment 1', 'charitywp' ) => 'modalpayment1',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Donation ID", 'charitywp' ),
					"description" => esc_html__( 'You can enter the donation id.', 'charitywp' ),
					"param_name" => "donationid",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP SINGLE DONATION CONTENT END -------------*/

	/*------------- CHARITYWP TEAM LIST START -------------*/
	function charitywp_team_list_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'column' => '',
				'teamids' => '',
				'teamtag' => '',
				'excludeteams' => '',
				'offset' => '',
				'teamcount' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts['excludeteams'] ) ) {
			$excludeteams = $atts['excludeteams'];
			$exclude = explode( ',', $excludeteams );
		} else {
			$exclude = "";
		}

		if( !empty( $atts['teamids'] ) ) {
			$teamids = explode( ',', $atts['teamids'] );
		} else {
			$teamids = "";
		}

		$query_arg = array(
			'posts_per_page' => $atts['teamcount'],
			'post__not_in' => $exclude,
			'post__in' => $teamids,
			'offset' => $atts['offset'],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'team',
		);
		$post_query = new WP_Query( $query_arg );

		if ( $post_query->have_posts() ) {
			$output .= '<div class="charitywp-team-list ' . esc_attr( $atts["column"] ) . '">';
				$output .= '<ul>';
					while ( $post_query->have_posts() ) {
						$post_query->the_post();
						$output .= '<li>';
							if ( has_post_thumbnail( get_the_ID() ) ) {
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'charitywp-team-small' );
								$output .= '<div class="image"><a href="' . get_the_permalink( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '" /><div class="hover"><i class="fa fa-search-plus" aria-hidden="true"></i></div></a></div>';
							}
							$output .= '<div class="content">';
								$team_categories = wp_get_post_terms( get_the_ID(), 'team_category' );
								if( !empty( $team_categories ) ) {
									$output .= '<div class="category">';
										foreach( $team_categories as $team_category ) {
											$output .= '<div class="item">' . esc_attr( $team_category->name ) . '</div>';
										}
									$output .= '</div>';
								}

								$output .= '<div class="title"><a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => get_the_ID() ) ) . '">' . get_the_title() . '</a></div>';

								if( !empty( get_the_excerpt() ) ) {
									$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
								}
								
								$official_web_site = get_post_meta( get_the_ID(), 'team_official_web_site', true );
								$social_media_facebook = get_post_meta( get_the_ID(), 'team_social_media_facebook', true );
								$social_media_twitter = get_post_meta( get_the_ID(), 'team_social_media_twitter', true );
								$social_media_googleplus = get_post_meta( get_the_ID(), 'team_social_media_googleplus', true );
								$social_media_instagram = get_post_meta( get_the_ID(), 'team_social_media_instagram', true );
								$social_media_youtube = get_post_meta( get_the_ID(), 'team_social_media_youtube', true );
								$social_media_flickr = get_post_meta( get_the_ID(), 'team_social_media_flickr', true );
								$social_media_soundcloud = get_post_meta( get_the_ID(), 'team_social_media_soundcloud', true );
								$social_media_vimeo = get_post_meta( get_the_ID(), 'team_social_media_vimeo', true );
								$social_media_linkedin = get_post_meta( get_the_ID(), 'team_social_media_linkedin', true );

								if( !empty( $official_web_site ) or !empty( $social_media_facebook ) or !empty( $social_media_twitter ) or !empty( $social_media_googleplus ) or !empty( $social_media_instagram ) or !empty( $social_media_youtube ) or !empty( $social_media_flickr ) or !empty( $social_media_soundcloud ) or !empty( $social_media_vimeo ) or !empty( $social_media_linkedin ) ) {
									$output .= '<ul class="official-sites">';
										if( !empty( $official_web_site ) ) {
											$output .= '<li><a href="' . esc_url( $official_web_site ) . '" class="officialsite" title="' . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
										}

										if( !empty( $social_media_facebook ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_facebook ) . '" class="facebook" title="' . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
										}
										
										if( !empty( $social_media_twitter ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_twitter ) . '" class="twitter" title="' . esc_html__( 'Twitter', 'charitywp' ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
										}

										if( !empty( $social_media_googleplus ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_googleplus ) . '" class="googleplus" title="' . esc_html__( 'Google+', 'charitywp' ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
										}

										if( !empty( $social_media_instagram ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_instagram ) . '" class="instagram" title="' . esc_html__( 'Instagram', 'charitywp' ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
										}

										if( !empty( $social_media_youtube ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_youtube ) . '" class="youtube" title="' . esc_html__( 'YouTube', 'charitywp' ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
										}

										if( !empty( $social_media_flickr ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_flickr ) . '" class="flickr" title="' . esc_html__( 'Flickr', 'charitywp' ) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
										}

										if( !empty( $social_media_soundcloud ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_soundcloud ) . '" class="soundcloud" title="' . esc_html__( 'SoundCloud', 'charitywp' ) . '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
										}

										if( !empty( $social_media_vimeo ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_vimeo ) . '" class="vimeo" title="' . esc_html__( 'Vimeo', 'charitywp' ) . '" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
										}

										if( !empty( $social_media_linkedin ) ) {
											$output .= '<li><a href="' . esc_url( $social_media_linkedin ) . '" class="linkedin" title="' . esc_html__( 'LinkedIn', 'charitywp' ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
										}
									$output .= "</ul>";									
								}

							$output .= '</div>';
						$output .= '</li>';
					}
					wp_reset_postdata();
				$output .= '</ul>';
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_team_list", "charitywp_team_list_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Team Box', 'charitywp' ),
			"base" => "charitywp_team_list",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-team.jpg',
			"description" =>esc_html__( 'CharityWP team box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Column', 'charitywp' ),
					"description" => esc_html__( 'You can select the column style.', 'charitywp' ),
					"param_name" => "column",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Three Column', 'charitywp' ) => 'three-column',
						esc_html__( 'Four Column', 'charitywp' ) => 'four-column',
						esc_html__( 'Five Column', 'charitywp' ) => 'five-column',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Team Members', 'charitywp' ),
					"description" => esc_html__( 'You can enter the team member ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "excludeteams",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'charitywp' ),
					"description" => esc_html__( 'You can enter the offset number.', 'charitywp' ),
					"param_name" => "offset",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Team Member Count', 'charitywp' ),
					"description" => esc_html__( 'You can enter the team member count.', 'charitywp' ),
					"param_name" => "teamcount",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Team Member ID's", 'charitywp' ),
					"description" => esc_html__( 'You can enter the team member ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "teamids",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP TEAM LIST END -------------*/

	/*------------- CHARITYWP LATEST POSTS START -------------*/
	function charitywp_latest_posts_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'category' => '',
				'excludeposts' => '',
				'posttag' => '',
				'postids' => '',
				'offset' => '',
				'postcount' => '',
				'style' => '',
				'pagination' => '',
				'categoryname' => '',
				'postinformation' => '',
				'excerpt' => '',
				'readmore' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts['excludeposts'] ) ) {
			$excludeposts = $atts['excludeposts'];
			$exclude = explode( ',', $excludeposts );
		} else {
			$exclude = "";
		}

		if( !empty( $atts['postids'] ) ) {
			$postids = explode( ',', $atts['postids'] );
		} else {
			$postids = "";
		}

		if( $atts['categoryname'] == "true" ) {
			$category_status = "true";
		} else {
			$category_status = "";
		}

		if( $atts['postinformation'] == "true" ) {
			$information_status = "true";
		} else {
			$information_status = "";
		}

		if( $atts['excerpt'] == "true" ) {
			$excerpt_status = "true";
		} else {
			$excerpt_status = "";
		}

		if( $atts['readmore'] == "true" ) {
			$readmore_status = "true";
		} else {
			$readmore_status = "";
		}

		$style = $atts['style'];

		$paged = is_front_page() ? get_query_var( 'page', 1 ) : get_query_var( 'paged', 1 );
		if( empty( $paged ) ) { $paged = 1; }

		$query_arg = array(
			'posts_per_page' => $atts['postcount'],
			'post__not_in' => $exclude,
			'tag' => $atts['posttag'],
			'cat' => $atts['category'],
			'post__in' => $postids,
			'offset' => $atts['offset'],
			'paged' => $paged,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post_type' => 'post',
		);
		$post_query = new WP_Query( $query_arg );

		if ( $post_query->have_posts() ) {
			$output .= '<div class="charitywp-latest-posts-element ' . esc_attr( $style ) . '">';
				if( $style == "style2" ) {
					$output .= '<div class="archive-post-list-style-2 post-list">';
						while ( $post_query->have_posts() ) {
							$post_query->the_post();
							$output .= charitywp_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = $category_status, $excerpt = $excerpt_status, $read_more = $readmore_status, $post_info = $information_status );
						}
						wp_reset_postdata();
					$output .= '</div>';
				} elseif( $style == "style3" ) {
					$output .= '<div class="archive-post-list-style-3 post-list">';
						while ( $post_query->have_posts() ) {
							$post_query->the_post();
							$output .= charitywp_post_list_style_3( $post_id = get_the_ID(), $image = "true", $post_info = $information_status );
						}
						wp_reset_postdata();
					$output .= '</div>';
				} elseif( $style == "style4" ) {
					$output .= '<div class="archive-post-list-style-2 archive-post-list-style-4 post-list">';
						while ( $post_query->have_posts() ) {
							$post_query->the_post();
							$output .= charitywp_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = $category_status, $excerpt = $excerpt_status, $read_more = $readmore_status, $post_info = $information_status );
						}
						wp_reset_postdata();
					$output .= '</div>';
				} else {
					$output .= '<div class="archive-post-list-style-1 post-list">';
						while ( $post_query->have_posts() ) {
							$post_query->the_post();
							$output .= charitywp_post_list_style_1( $post_id = get_the_ID(), $image = "true", $category = $category_status, $excerpt = $excerpt_status, $read_more = $readmore_status, $post_info = $information_status );
						}
						wp_reset_postdata();
					$output .= '</div>';
				}

				if ( $atts['pagination'] == 'true' ) {
					$output .= charitywp_latest_posts_pagination( $paged = $paged, $query = $post_query );
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_latest_posts", "charitywp_latest_posts_output" );

	if(function_exists('vc_map')){
		$posts_list = get_posts(array(
			'orderby' => 'title',
			'order' => 'ASC',
			'post_type' => 'post'
		));

		$posts_array = array();
		$posts_array[esc_html__( 'All Categories', 'charitywp' )] = "-";
		foreach($posts_list as $post) {
			$posts_array[$post->post_title . " (id:" . esc_attr( $post->ID ) . ")"] = $post->ID;
		}

		$post_categories = get_terms("category");
		$post_categories_array = array();
		$post_categories_array[__("All Categories", 'charitywp')] = "-";
		foreach($post_categories as $post_category) {
			$post_categories_array[$post_category->name] =  $post_category->term_id;
		}

		vc_map( array(
			"name" => esc_html__( 'CharityWP Blog Box', 'charitywp' ),
			"base" => "charitywp_latest_posts",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-blog.jpg',
			"description" =>esc_html__( 'CharityWP blog box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category', 'charitywp' ),
					"description" => esc_html__( 'You can select the category.', 'charitywp' ),
					"param_name" => "category",
					"value" => $post_categories_array,
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Tag', 'charitywp' ),
					"description" => esc_html__( 'You can enter the post tag.', 'charitywp' ),
					"param_name" => "posttag",
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Post ID's", 'charitywp' ),
					"description" => esc_html__( 'You can enter the post ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "postids",
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Exclude Posts', 'charitywp' ),
					"description" => esc_html__( 'You can enter the post ids. Separate with commas 1,2,3 etc.', 'charitywp' ),
					"param_name" => "excludeposts",
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Offset', 'charitywp' ),
					"description" => esc_html__( 'You can enter the offset number.', 'charitywp' ),
					"param_name" => "offset",
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Post Count', 'charitywp' ),
					"description" => esc_html__( 'You can enter the post count.', 'charitywp' ),
					"param_name" => "postcount",
					"group" => esc_html__( 'General', 'charitywp' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the element style.', 'charitywp' ),
					"param_name" => "style",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
						esc_html__( 'Style 3', 'charitywp' ) => 'style3',
						esc_html__( 'Style 4', 'charitywp' ) => 'style4',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Pagination', 'charitywp' ),
					"description" => esc_html__( 'You can select the pagination status.', 'charitywp' ),
					"param_name" => "pagination",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category Name', 'charitywp' ),
					"description" => esc_html__( 'You can hide the category name.', 'charitywp' ),
					"param_name" => "categoryname",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Post Information', 'charitywp' ),
					"description" => esc_html__( 'You can hide the post information.', 'charitywp' ),
					"param_name" => "postinformation",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Excerpt', 'charitywp' ),
					"description" => esc_html__( 'You can hide the post excerpt.', 'charitywp' ),
					"param_name" => "excerpt",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Read More', 'charitywp' ),
					"description" => esc_html__( 'You can hide the read more button.', 'charitywp' ),
					"param_name" => "readmore",
					"group" => esc_html__( 'Design', 'charitywp' ),
					'save_always' => true,
					'value' => array(
						esc_html__( 'False', 'charitywp' ) => 'false',
						esc_html__( 'True', 'charitywp' ) => 'true',
					),
				)
			),
		)
		);
	}
	/*------------- CHARITYWP LATEST POSTS END -------------*/

	/*------------- CHARITYWP LOGO CAROUSEL START -------------*/
	function charitywp_logo_carousel_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'style' => '',
				'autoplay' => '',
				'loop' => '',
				'column' => '',
				'navigation' => '',
				'columnspace' => '',
			), $atts
		);
		
		$output = '';

			if( !empty( $atts["column"] ) ) {
				$column = $atts["column"];
			} else {
				$column = "5";
			}

			if( !empty( $atts["columnspace"] ) ) {
				$columnspace = $atts["columnspace"];
			} else {
				$columnspace = "15";
			}
			
			$output .= '<div class="swiper-container logo-carousel gloria-sliders ' . esc_attr( $atts["style"] ) . '" data-column-space="' . esc_attr( $columnspace ) . '" data-aplay="' . esc_attr( $atts["autoplay"] ) . '" data-item="' . esc_attr( $column ) . '" data-sloop="' . esc_attr( $atts["loop"] ) . '">';
				$output .= '<div class="swiper-wrapper">';
						$output .= do_shortcode( $content );
				$output .= '</div>';
				if( $atts["navigation"] == "true" ) {
					$output .= '<div class="pagination-buttons">
									<div class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
									<div class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
								</div>';					
				}
			$output .= '</div>';
				

		return $output;
	}
	add_shortcode("charitywp_logo_carousel", "charitywp_logo_carousel_shortcode");

	function charitywp_logo_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'logoimage' => '',
				'logolink' => ''
			), $atts
		);
		
		$output = '';
		
		if( !empty( $atts['logoimage'] ) ) {
			$image = wp_get_attachment_image_src( $atts["logoimage"], "full" );
			$output .= '<div class="swiper-slide">';
				if( !empty( $atts["logolink"] ) ) {
					$output .= '<div class="logo-item">';
						$href = $atts["logolink"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}
						$output .= '<a href="' . esc_url( $href["url"] ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $href["title"] ) . '" ><img src="' . esc_url( $image[0] ) . '" alt="' . esc_attr( $href["title"] ) . '" /></a>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode("charitywp_logo", "charitywp_logo_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( "CharityWP Logo Carousel", 'charitywp' ),
			"base" => "charitywp_logo_carousel",
			"class" => "",
			"as_parent" => array('only' => 'charitywp_logo'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( "CharityWP Theme", 'charitywp' ),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-logo-carousel.jpg',
			"description" =>esc_html__( 'CharityWP logo carousel element.','charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Style",'charitywp'),
					"description" => esc_html__("You can select the style.",'charitywp'),
					"param_name" => "style",
					"value" => array(
						esc_html__("Style 1", 'charitywp') => "style1",
						esc_html__("Style 2", 'charitywp') => "style2",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay', 'charitywp' ),
					"description" => esc_html__( 'You can enter the autoplay delay. Example: 5000. Leave blank to autoplay disabled.', 'charitywp' ),
					"param_name" => "autoplay",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Loop",'charitywp'),
					"description" => esc_html__("You can select the loop status.",'charitywp'),
					"param_name" => "loop",
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Column', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column.', 'charitywp' ),
					"param_name" => "column",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Column Space', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column space.', 'charitywp' ),
					"param_name" => "columnspace",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Navigation",'charitywp'),
					"description" => esc_html__("You can select the navigation status.",'charitywp'),
					"param_name" => "navigation",
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
			)
		) );
	}

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( "CharityWP Logo Carousel Item", 'charitywp' ),
			"base" => "charitywp_logo",
			"class" => "",
			"as_child" => array( 'only' => 'charitywp_logo_carousel' ),
			"content_element" => true,
			"category" => esc_html__( "CharityWP Theme", 'charitywp' ),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp_logo.jpg',
			"description" =>esc_html__( 'CharityWP logo carousel item element.','charitywp' ),
			"params" => array(
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( "Image",'charitywp' ),
					"description" => esc_html__( "You can the upload your logo.", 'charitywp' ),
					"param_name" => "logoimage",
					"value" => "",
				),
				array(
					"type" => "vc_link",
					"class" => "",
					"heading" => esc_html__( "Logo Link",'charitywp' ),
					"description" => esc_html__( "You can enter the logo link.", 'charitywp' ),
					"param_name" => "logolink",
					"value" => "",
				),
			)
		) );
	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_charitywp_logo_carousel extends WPBakeryShortCodesContainer {}
	}
	/*------------- CHARITYWP LOGO CAROUSEL END -------------*/

	/*------------- CHARITYWP SERVICE BOX START -------------*/
	function charitywp_service_box_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'style' => '',
				'title' => '',
				'text' => '',
				'icon' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["title"] ) or !empty( $atts["text"] ) ) {
			$output .= '<div class="charitywp-service-box ' . esc_attr( $atts["style"] ) . '">';
				if( !empty( $atts["icon"] ) ) {
					$output .= '<i class="fa fa-' . esc_attr( $atts["icon"] ) . '"></i>';
				}

				if( !empty( $atts["title"] ) ) {
					$output .= '<div class="title">' . esc_attr( $atts["title"] ) . '</div>';
				}

				if( !empty( $atts["text"] ) ) {
					$output .= '<p>' . esc_attr( $atts["text"] ) . '</p>';
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_service_box", "charitywp_service_box_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Service Box', 'charitywp' ),
			"base" => "charitywp_service_box",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-service-box.jpg',
			"description" =>esc_html__( 'CharityWP service box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Style",'charitywp'),
					"description" => esc_html__("You can select the style.",'charitywp'),
					"param_name" => "style",
					"value" => array(
						esc_html__("Style 1", 'charitywp') => "style1",
						esc_html__("Style 2", 'charitywp') => "style2",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'charitywp' ),
					"description" => esc_html__( 'You can enter the service title.', 'charitywp' ),
					"param_name" => "title",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text", 'charitywp' ),
					"description" => esc_html__( 'You can enter the service text.', 'charitywp' ),
					"param_name" => "text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'charitywp' ),
					"description" => esc_html__( 'You can enter the icon name. List of the icons is available in the documentation file. Example: edge, automobile, bel-o.', 'charitywp' ),
					"param_name" => "icon",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP SERVICE BOX END -------------*/

	/*------------- CHARITYWP TESTIMONIALS START -------------*/
	function charitywp_testimonials_output( $atts, $content = null ) {		
		$atts = shortcode_atts(
			array(
				'style' => '',
				'autoplay' => '',
				'loop' => '',
				'column' => '',
				'columnspace' => '',
				'navigation' => '',
			), $atts
		);

			if( !empty( $atts["columnspace"] ) ) {
				$columnspace = $atts["columnspace"];
			} else {
				$columnspace = "0";
			}

		$output = '';
			$output .= '<div class="swiper-container testimonials-carousel gloria-sliders ' . esc_attr( $atts["style"] ) . '" data-column-space="' . esc_attr( $columnspace ) . '" data-aplay="' . esc_attr( $atts["autoplay"] ) . '" data-item="' . esc_attr( $atts["column"] ) . '" data-sloop="' . esc_attr( $atts["loop"] ) . '" data-pagination=".swiper-pagination">';
				$output .= '<div class="swiper-wrapper">';
					$output .= do_shortcode( $content );
				$output .= '</div>';
				if( $atts["navigation"] == "true" ) {
					$output .= '<div class="swiper-pagination"></div>';					
				}
			$output .= '</div>';

			return $output;
	}
	add_shortcode( "charitywp_testimonials", "charitywp_testimonials_output" );

	function charitywp_testimonials_item_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'image' => '',
				'profession' => '',
				'name' => '',
				'text' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["name"] ) or !empty( $atts["text"] ) ) {
			$output .= '<div class="swiper-slide">';
				if( !empty( $atts["image"] ) ) {
					if( !empty( $atts["image"] ) ) {
						$image = $atts["image"];
					} else {
						$image = "";
					}
					$output .= '<div class="image">';
						$output .= wp_get_attachment_image( $image, 'thumbnail', true, array( "alt" => $atts["name"] ) );
					$output .= '</div>';
				}
				if( !empty( $atts["text"] ) or !empty( $atts["name"] ) ) {
					$output .= '<div class="content">';
						if( !empty( $atts["profession"] ) ) {
							$output .= '<div class="profession">' . esc_attr( $atts["profession"] ) . '</div>';
						}
						if( !empty( $atts["name"] ) ) {
							$output .= '<div class="name">' . esc_attr( $atts["name"] ) . '</div>';
						}
						$output .= '<p>' . esc_attr( $atts["text"] ) . '</p>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode("charitywp_testimonials_item", "charitywp_testimonials_item_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Testimonial Box', 'charitywp' ),
			"base" => "charitywp_testimonials",
			"as_parent" => array('only' => 'charitywp_testimonials_item'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-testimonials.jpg',
			"description" =>esc_html__( 'CharityWP testimonial box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Style",'charitywp'),
					"description" => esc_html__("You can select the style.",'charitywp'),
					"param_name" => "style",
					"value" => array(
						esc_html__("Style 1", 'charitywp') => "style1",
						esc_html__("Style 2", 'charitywp') => "style2",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Autoplay', 'charitywp' ),
					"description" => esc_html__( 'You can enter the autoplay delay. Example: 5000. Leave blank to autoplay disabled.', 'charitywp' ),
					"param_name" => "autoplay",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Loop",'charitywp'),
					"description" => esc_html__("You can select the loop status.",'charitywp'),
					"param_name" => "loop",
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Column', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column.', 'charitywp' ),
					"param_name" => "column",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Column Space', 'charitywp' ),
					"description" => esc_html__( 'You can enter the column space.', 'charitywp' ),
					"param_name" => "columnspace",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Navigation",'charitywp'),
					"description" => esc_html__("You can select the navigation status.",'charitywp'),
					"param_name" => "navigation",
					"value" => array(
						esc_html__("False", 'charitywp') => "false",
						esc_html__("True", 'charitywp') => "true",
					)
				),
			)
		)
		);
	}

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__("Testimonial Item", 'charitywp'),
			"base" => "charitywp_testimonials_item",
			"as_child" => array( 'only' => 'charitywp_testimonials' ),
			"content_element" => true,
			"category" => esc_html__("CharityWP Theme", 'charitywp'),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-testimonials.jpg',
			"description" =>esc_html__( 'Testimonials item element.','charitywp'),
			"params" => array(
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( 'Image','charitywp'),
					"description" => esc_html__( 'You can upload the customer image. Suitably: 110x110', 'charitywp'),
					"param_name" => "image",
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( 'Profession','charitywp'),
					"description" => esc_html__( 'You can enter the customer profession.', 'charitywp'),
					"param_name" => "profession",
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( 'Name','charitywp'),
					"description" => esc_html__( 'You can enter the customer name.', 'charitywp'),
					"param_name" => "name",
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__( 'Content','charitywp'),
					"description" => esc_html__( 'You can enter the customer feedback.', 'charitywp'),
					"param_name" => "text",
				)
			)
		) );
	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_charitywp_testimonials extends WPBakeryShortCodesContainer {}
	}
	/*------------- CHARITYWP TESTIMONIALS END -------------*/

	/*------------- CHARITYWP COUNTER START -------------*/
	function charitywp_step_boxes_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'countertitle' => '',
				'style' => '',
				'counternumber' => '',
			), $atts
		);
		
		$output = '';
			
		if( !empty( $atts['counternumber'] ) or !empty( $atts['countertitle'] ) ) {
			$output .= '<div class="charitywp-counter ' . esc_attr( $atts["style"] ) . '">';
				if( !empty( $atts['counternumber'] ) ) {
					if( !empty( $atts['counternumber'] ) ) {
						$counternumber = esc_attr( $atts['counternumber'] );
					} else {
						$counternumber = "1";
					}

					if( !empty( $atts['counternumber'] ) ) {
						$output .= '<div class="number">' . esc_attr( $atts['counternumber'] ) . '</div>';
					}
					if( !empty( $atts['countertitle'] ) ) {
						$output .= '<div class="title">' . esc_attr( $atts['countertitle'] ) . '</div>';
					}
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode("charitywp_step_boxes", "charitywp_step_boxes_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__("CharityWP Counter", 'charitywp'),
			"base" => "charitywp_step_boxes",
			"class" => "",
			"category" => esc_html__("CharityWP Theme", 'charitywp'),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-counter.jpg',
			"description" =>esc_html__( 'CharityWP counter element.','charitywp'),
			"params" => array(
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Title",'charitywp'),
					"description" => esc_html__("You can enter the counter title.", 'charitywp'),
					"param_name" => "countertitle",
					"value" => ""
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Number",'charitywp'),
					"description" => esc_html__("You can enter the counter number.", 'charitywp'),
					"param_name" => "counternumber",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
					),
				),
			)
		) );
	}
	/*------------- CHARITYWP COUNTER END -------------*/

	/*------------- CHARITYWP CONTACT BOX START -------------*/
	function charitywp_contact_box_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'address' => '',
				'email' => '',
				'phone' => '',
				'fax' => '',
				'abouttext' => '',
				'aboutlink' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["address"] ) or !empty( $atts["email"] ) or !empty( $atts["phone"] ) or !empty( $atts["fax"] ) or !empty( $atts["abouttext"] ) or !empty( $atts["aboutlink"] ) ) {
			$output .= '<div class="charitywp-contact-box">';
				if( !empty( $atts["abouttext"] ) ) {
					$output .= '<div class="contact-row about-text">' . esc_attr( $atts["abouttext"] ) . '</div>';
				}

				if( !empty( $atts["address"] ) ) {
					$output .= '<div class="contact-row address"><i class="fa fa-map-marker" aria-hidden="true"></i>' . esc_attr( $atts["address"] ) . '</div>';
				}

				if( !empty( $atts["email"] ) ) {
					$output .= '<div class="contact-row email"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:' . esc_attr( str_replace(' ', '', $atts["email"] ) ) . '">' . esc_attr( $atts["email"] ) . '</a></div>';
				}

				if( !empty( $atts["phone"] ) ) {
					$output .= '<div class="contact-row phone"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+' . esc_attr( str_replace(' ', '', $atts["phone"] ) ) . '">' . esc_attr( $atts["phone"] ) . '</a></div>';
				}

				if( !empty( $atts["fax"] ) ) {
					$output .= '<div class="contact-row fax"><i class="fa fa-fax" aria-hidden="true"></i>' . esc_attr( $atts["fax"] ) . '</div>';
				}

				if( !empty( $atts["aboutlink"] ) ) {
					$href = $atts["aboutlink"];
					$href = vc_build_link( $href );
					if( !empty( $href["target"] ) ) {
						$target = $href["target"];
					} else {
						$target = "_parent";
					}

					if( !empty( $href["url"] ) ) {
						$href["url"] = site_url().'/contact/';
						$output .= '<div class="contact-row about-button-link dd">';
							$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '" class="button-link">' . esc_attr( $href["title"] ) . '</a>';
						$output .= '</div>';
					}
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_contact_box", "charitywp_contact_box_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Contact Box', 'charitywp' ),
			"base" => "charitywp_contact_box",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-contact-box.jpg',
			"description" =>esc_html__( 'CharityWP contact box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Address", 'charitywp' ),
					"description" => esc_html__( 'You can enter the address.', 'charitywp' ),
					"param_name" => "address",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Email", 'charitywp' ),
					"description" => esc_html__( 'You can enter the email.', 'charitywp' ),
					"param_name" => "email",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Phone", 'charitywp' ),
					"description" => esc_html__( 'You can enter the phone.', 'charitywp' ),
					"param_name" => "phone",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Fax", 'charitywp' ),
					"description" => esc_html__( 'You can enter the fax.', 'charitywp' ),
					"param_name" => "fax",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "About Text", 'charitywp' ),
					"description" => esc_html__( 'You can enter the about text.', 'charitywp' ),
					"param_name" => "abouttext",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Button Link', 'charitywp' ),
					"description" => esc_html__( 'You can enter the button link.', 'charitywp' ),
					"param_name" => "buttonlink",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP CONTACT BOX END -------------*/

	/*------------- CHARITYWP APP BOX START -------------*/
	function charitywp_app_box_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'applestore' => '',
				'googleplay' => '',
				'windowstore' => '',
				'amazon' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["applestore"] ) or !empty( $atts["googleplay"] ) or !empty( $atts["windowstore"] ) or !empty( $atts["amazon"] ) ) {
			$output .= '<div class="charitywp-app-box">';
				if( !empty( $atts["applestore"] ) ) {
					$output .= '<div class="app-item applestore">';
						$href = $atts["applestore"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}

						$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">';
							$output .= '<i class="fa fa-apple" aria-hidden="true"></i>';
							$output .= '<div class="description">';
								$output .= '<span class="name">' . esc_html__( 'Download via', 'charitywp' ) . '</span>';
								$output .= '<span class="app-name">' . esc_html__( 'Apple Store', 'charitywp' ) . '</span>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</div>';
				}
				if( !empty( $atts["googleplay"] ) ) {
					$output .= '<div class="app-item googleplay">';
						$href = $atts["googleplay"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}
						
						$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">';
							$output .= '<i class="fa fa-play" aria-hidden="true"></i>';
							$output .= '<div class="description">';
								$output .= '<span class="name">' . esc_html__( 'Download via', 'charitywp' ) . '</span>';
								$output .= '<span class="app-name">' . esc_html__( 'Google Play', 'charitywp' ) . '</span>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</div>';
				}
				if( !empty( $atts["windowstore"] ) ) {
					$output .= '<div class="app-item windowstore">';
						$href = $atts["windowstore"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}
						
						$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">';
							$output .= '<i class="fa fa-windows" aria-hidden="true"></i>';
							$output .= '<div class="description">';
								$output .= '<span class="name">' . esc_html__( 'Download via', 'charitywp' ) . '</span>';
								$output .= '<span class="app-name">' . esc_html__( 'Windows', 'charitywp' ) . '</span>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</div>';
				}
				if( !empty( $atts["amazon"] ) ) {
					$output .= '<div class="app-item amazon">';
						$href = $atts["amazon"];
						$href = vc_build_link( $href );
						if( !empty( $href["target"] ) ) {
							$target = $href["target"];
						} else {
							$target = "_parent";
						}
						
						$output .= '<a href="' . esc_url( $href["url"] ) . '" title="' . esc_attr( $href["title"] ) . '" target="' . esc_attr( $target ) . '">';
							$output .= '<i class="fa fa-amazon" aria-hidden="true"></i>';
							$output .= '<div class="description">';
								$output .= '<span class="name">' . esc_html__( 'Download via', 'charitywp' ) . '</span>';
								$output .= '<span class="app-name">' . esc_html__( 'Amazon', 'charitywp' ) . '</span>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</div>';
				}
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_app_box", "charitywp_app_box_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP App Box', 'charitywp' ),
			"base" => "charitywp_app_box",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-app-box.jpg',
			"description" =>esc_html__( 'CharityWP app box element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Apple Store', 'charitywp' ),
					"description" => esc_html__( 'You can enter the Apple Store link.', 'charitywp' ),
					"param_name" => "applestore",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Google Play', 'charitywp' ),
					"description" => esc_html__( 'You can enter the Google Play link.', 'charitywp' ),
					"param_name" => "googleplay",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Windows Store', 'charitywp' ),
					"description" => esc_html__( 'You can enter the Windows Store link.', 'charitywp' ),
					"param_name" => "windowstore",
				),
				array(
					"type" => "vc_link",
					"heading" => esc_html__( 'Amazon', 'charitywp' ),
					"description" => esc_html__( 'You can enter the Amazon link.', 'charitywp' ),
					"param_name" => "amazon",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP APP BOX END -------------*/

	/*------------- CHARITYWP MODAL BUTTON START -------------*/
	function charitywp_modal_button_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'buttontitle' => '',
				'text' => '',
				'icon' => '',
			), $atts
		);
		
		$output = '';

		$rand = rand( 1, 99999 );

		if( !empty( $atts["buttontitle"] ) ) {
			$output .= '<div class="charitywp-button">';
				$output .= '<a title="' . esc_attr( $atts["buttontitle"] ) . '" type="button" data-toggle="modal" data-target="#modal_' . esc_attr( $rand ) . '">';
					if( !empty( $atts["icon"] ) ) {
						$output .= '<i class="fa fa-' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
					}
					$output .= '<span>' . esc_attr( $atts["buttontitle"] ) . '</span>';
				$output .= '</a>';
			$output .= '</div>';
			$output .= '<div class="modal fade bs-example-modal-lg charitywp-modal" id="modal_' . esc_attr( $rand ) . '" tabindex="-1" role="dialog" aria-labelledby="modal_' . esc_attr( $rand ) . 'Label">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						    	<div class="modal-body">';
									if( !empty( $atts["text"] ) ) {
										$output .= '<div class="content">' . $atts["text"] . '</div>';
									}
								$output .= '</div>';
						    $output .= '</div>
						  </div>
						</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_modal_button", "charitywp_modal_button_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Modal Button', 'charitywp' ),
			"base" => "charitywp_modal_button",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-modal-button.jpg',
			"description" =>esc_html__( 'CharityWP modal button element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Button Title', 'charitywp' ),
					"description" => esc_html__( 'You can enter the button title.', 'charitywp' ),
					"param_name" => "buttontitle",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'charitywp' ),
					"description" => esc_html__( 'You can enter the icon name. List of the icons is available in the documentation file. Example: edge, automobile, bel-o.', 'charitywp' ),
					"param_name" => "icon",
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__( 'Content', 'charitywp' ),
					"description" => esc_html__( 'You can enter the modal text.', 'charitywp' ),
					"param_name" => "text",
				)
			),
		)
		);
	}
	/*------------- CHARITYWP MODAL BUTTON END -------------*/

	/*------------- CHARITYWP MAILCHIMP NEWSLETTER START -------------*/
	function charitywp_mailchimp_newsletter_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'style' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["id"] ) ) {
			$output = '<div class="charitywp-newsletter-element ' . esc_attr( $atts["style"] ) . '">';
				$output .= do_shortcode( '[mc4wp_form id="' . esc_attr( $atts["id"] ) . '"]' );
			$output .= '</div>';
		}

		return $output;
	}
	add_shortcode( "charitywp_mailchimp_newsletter", "charitywp_mailchimp_newsletter_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP MailChimp Newsletter', 'charitywp' ),
			"base" => "charitywp_mailchimp_newsletter",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-mailchimp-newsletter.jpg',
			"description" =>esc_html__( 'CharityWP MailChimp newsletter element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'MailChimp Newsletter ID', 'charitywp' ),
					"description" => esc_html__( 'You can enter the MailChimp newsletter id.', 'charitywp' ),
					"param_name" => "id",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the newsletter style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
					),
				),
			),
		)
		);
	}
	/*------------- CHARITYWP MAILCHIMP NEWSLETTER END -------------*/

	/*------------- CHARITYWP ICON LIST START -------------*/
	function charitywp_icon_list_output( $atts, $content = null ) {		
		$atts = shortcode_atts(
			array(
				'style' => '',
			), $atts
		);

			$output = '';

			$output .= '<div class="charitywp-icon-list ' . esc_attr( $atts["style"] ) . '">';
				$output .= '<ul>';
					$output .= do_shortcode( $content );
				$output .= '</ul>';
			$output .= '</div>';


			return $output;
	}
	add_shortcode( "charitywp_icon_list", "charitywp_icon_list_output" );

	function charitywp_icon_list_item_shortcode( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'text' => '',
				'icon' => '',
			), $atts
		);
		
		$output = '';

		if( !empty( $atts["text"] ) ) {
			$output .= '<li>';
				if( !empty( $atts["icon"] ) ) {
					$output .= '<i class="fa fa-' . esc_attr( $atts["icon"] ) . '" aria-hidden="true"></i>';
				}
				if( !empty( $atts["text"] ) ) {
					$output .= '<div class="text">' . esc_attr( $atts["text"] ) . '</div>';
				}
			$output .= '</li>';
		}

		return $output;
	}
	add_shortcode("charitywp_icon_list_item", "charitywp_icon_list_item_shortcode");

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Icon List', 'charitywp' ),
			"base" => "charitywp_icon_list",
			"as_parent" => array('only' => 'charitywp_icon_list_item'),
			"js_view" => 'VcColumnView',
			"content_element" => true,
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-icon-list.jpg',
			"description" =>esc_html__( 'CharityWP icon list element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Style', 'charitywp' ),
					"description" => esc_html__( 'You can select the style.', 'charitywp' ),
					"param_name" => "style",
					'save_always' => true,
					'value' => array(
						esc_html__( 'Style 1', 'charitywp' ) => 'style1',
						esc_html__( 'Style 2', 'charitywp' ) => 'style2',
					),
				),
			)
		)
		);
	}

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__("CharityWP Icon List Item", 'charitywp'),
			"base" => "charitywp_icon_list_item",
			"as_child" => array( 'only' => 'charitywp_icon_list' ),
			"content_element" => true,
			"category" => esc_html__("CharityWP Theme", 'charitywp'),
			"icon" => get_template_directory_uri().'/assets/img/icons/charitywp-icon-list.jpg',
			"description" =>esc_html__( 'CharityWP icon list item element.','charitywp'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Text', 'charitywp' ),
					"description" => esc_html__( 'You can enter the text.', 'charitywp' ),
					"param_name" => "text",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Icon', 'charitywp' ),
					"description" => esc_html__( 'You can enter the icon name. List of the icons is available in the documentation file. Example: edge, automobile, bel-o.', 'charitywp' ),
					"param_name" => "icon",
				),
			)
		) );
	}

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_charitywp_icon_list extends WPBakeryShortCodesContainer {}
	}
	/*------------- CHARITYWP ICON LIST END -------------*/

	/*------------- CHARITYWP VIDEO PLAYER START -------------*/
	function charitywp_video_audio_element_output( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'contenttype' => '',
				'videoid' => '',
				'html5link' => '',
				'posterimage' => '',
			), $atts
		);
		
		$output = '';

			if( !empty( $atts["videoid"] ) or !empty( $atts["html5link"] ) ) {
				$output .= '<div class="charitywp-video-audio-element">';

					if( $atts["contenttype"] == "vimeo" ) {
						if( !empty( $atts["videoid"] ) ) {
							$output .= '<div data-type="vimeo" data-video-id="' . esc_attr( $atts["videoid"] ) . '"></div>';
						}
					} elseif( $atts["contenttype"] == "html5video" ) {
						if( !empty( $atts["html5link"] ) ) {
							$output .= '<video poster="' . esc_url( wp_get_attachment_url( esc_attr( $atts["posterimage"] ), 'full', true, true ) ) . '" controls>
										  <source src="' . esc_url( $atts["html5link"] ) . '" type="video/mp4">
										</video>';
						}
					} elseif( $atts["contenttype"] == "html5audio" ) {
						if( !empty( $atts["html5link"] ) ) {
							$output .= '<audio controls>
										  <source src="' . esc_url( $atts["html5link"] ) . '" type="audio/mp3">
										</audio>';
						}
					} else {
						if( !empty( $atts["videoid"] ) ) {
							$output .= '<div data-type="youtube" data-video-id="' . esc_attr( $atts["videoid"] ) . '"></div>';
						}
					}

				$output .= '</div>';
			}

		return $output;
	}
	add_shortcode( "charitywp_video_audio_element", "charitywp_video_audio_element_output" );

	if(function_exists('vc_map')){
		vc_map( array(
			"name" => esc_html__( 'CharityWP Video / Audio', 'charitywp' ),
			"base" => "charitywp_video_audio_element",
			"category" => esc_html__( 'CharityWP Theme', 'charitywp' ),
			"icon" => get_template_directory_uri() . '/assets/img/icons/charitywp-video-audio-element.jpg',
			"description" =>esc_html__( 'CharityWP video and audio element.', 'charitywp' ),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Content Type', 'charitywp' ),
					"description" => esc_html__( 'You can select the content type.', 'charitywp' ),
					"param_name" => "contenttype",
					'save_always' => true,
					'value' => array(
						esc_html__( 'YouTube', 'charitywp' ) => 'youtube',
						esc_html__( 'Vimeo', 'charitywp' ) => 'vimeo',
						esc_html__( 'HTML5 Video', 'charitywp' ) => 'html5video',
						esc_html__( 'HTML5 Audio', 'charitywp' ) => 'html5audio',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Video ID for YouTube / Video', 'charitywp' ),
					"description" => esc_html__( 'You can enter the video id for the YouTube / Vimeo.', 'charitywp' ),
					"param_name" => "videoid",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Video / Audio Link for HTML5', 'charitywp' ),
					"description" => esc_html__( 'You can enter the video / audio link for the HTML5 player.', 'charitywp' ),
					"param_name" => "html5link",
				),
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => esc_html__( 'Video Poster for HTML5 Vimeo','charitywp'),
					"description" => esc_html__( 'You can upload the HTML video poster image.', 'charitywp'),
					"param_name" => "posterimage",
				),
			),
		)
		);
	}
	/*------------- CHARITYWP VIDEO PLAYER END -------------*/
/*--------------- VC ELEMENTS END ---------------*/