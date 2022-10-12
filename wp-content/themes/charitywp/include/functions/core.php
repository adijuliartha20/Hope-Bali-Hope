<?php
/*------------- THEME SETUP START -------------*/
add_action( 'after_setup_theme', 'charitywp_setup' );
function charitywp_setup(){
	load_theme_textdomain( 'charitywp', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'quote', 'gallery', 'image', 'video', 'audio', 'chat', 'link' ) );
	
	if( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'charitywp-big-post', 870, 450, true );
		add_image_size( 'charitywp-small-post', 410, 370, true );
		add_image_size( 'charitywp-content-post', 870, 650, true );
		add_image_size( 'charitywp-page-banner', 1920, 235, true );
		add_image_size( 'charitywp-slider', 1920, 750, true );
		add_image_size( 'charitywp-fully-slider', 1920, 1100, true );
		add_image_size( 'charitywp-event-list', 130, 115, true );
		add_image_size( 'charitywp-team-small', 200, 200, true );
		add_image_size( 'charitywp-team-big', 500, 500, true );
		add_image_size( 'charitywp-donation-small', 470, 295, true );
	}
	
	if( ! isset( $content_width ) ) {
		$content_width = 600;
	}
	
	if( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
/*------------- THEME SETUP END -------------*/

/*------------- SCRIPTS AND STYLES FILE START -------------*/
function charitywp_scripts()
{
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'charitywp-scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), false, true  );
	wp_enqueue_script( 'charitywp-admin-bar', get_template_directory_uri() . '/assets/js/admin-bar.js', array(), false, true  );
	$charitywp_fixed_sidebar = ot_get_option( 'charitywp_fixed_sidebar' );
	if( $charitywp_fixed_sidebar == 'on' or !$charitywp_fixed_sidebar == 'off' ) {
		wp_enqueue_script( 'charitywp-fixed-sidebar', get_template_directory_uri() . '/assets/js/fixed-sidebar.js', array(), false, true  );
	}
	$header_fixed = ot_get_option( 'header_fixed' );
	if( $header_fixed == 'on' ) {
		wp_enqueue_script( 'charitywp-fixed-header', get_template_directory_uri() . '/assets/js/fixed-header.js', array(), false, true  );
	}
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), false, true  );
	wp_enqueue_script( 'waypoints-infinite', get_template_directory_uri() . '/assets/js/waypoints-infinite.js', array(), false, true  );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), false, true  );
	wp_enqueue_script( 'counter', get_template_directory_uri() . '/assets/js/counter.js', array(), false, true  );
	wp_enqueue_script( 'charitywp', get_template_directory_uri() . '/assets/js/charitywp.js', array(), false, true  );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/countdown.min.js', array(), false, true  );
	wp_enqueue_script( 'plyr-io', get_template_directory_uri() . '/assets/js/plyr.js', array(), false, true  );
	wp_enqueue_script( 'select-classie', get_template_directory_uri() . '/assets/js/select-classie.js', array(), false, true  );
	wp_enqueue_script( 'select-fx', get_template_directory_uri() . '/assets/js/select-fx.js', array(), false, true  );
	wp_enqueue_script('ajax-app');
	wp_enqueue_script( 'ajax-login-register-script', get_template_directory_uri() . '/assets/js/user-box.js', array(), false, true );
	wp_localize_script('ajax-login-register-script', 'ptajax', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css'  );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css'  );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css'  );
	wp_enqueue_style( 'select', get_template_directory_uri() . '/assets/css/select.css'  );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css'  );
	wp_enqueue_style( 'plyr-io', get_template_directory_uri() . '/assets/css/plyr.css'  );
	wp_enqueue_style( 'charitywp', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'charitywp_scripts' );

function charitywp_load_custom_wp_admin() {
	wp_enqueue_style( 'charitywp-admin', get_template_directory_uri() . '/assets/css/admin.css'  );
	wp_enqueue_style( 'charitywp-ot-admin', get_template_directory_uri() . '/assets/css/admin-ot.css'  );
	wp_enqueue_script( 'charitywp-admin-script', get_template_directory_uri() . '/assets/js/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'charitywp_load_custom_wp_admin' );
/*------------- SCRIPTS AND STYLES FILE END -------------*/

/*------------- BODY CLASS START -------------*/
function charitywp_class_names( $classes ) {
	$classes[] = 'charitywp-class';
	
	$woocommerce_shop_product_column = esc_attr( ot_get_option( 'woocommerce_shop_product_column' ) );
	if( !empty( $woocommerce_shop_product_column ) ) {
		$classes[] = ' charitywp-shop-column-' . $woocommerce_shop_product_column;
	}
	
	return $classes;
}
add_filter( 'body_class', 'charitywp_class_names' );
/*------------- BODY CLASS END -------------*/

/*------------- EXCERPT START -------------*/
function charitywp_new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'charitywp_new_excerpt_more' );

function charitywp_my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'charitywp_my_add_excerpts_to_pages' );

function charitywp_text_limit_words( $string, $word_limit ) {
	$words = explode( ' ', $string, ( $word_limit + 1 ) );
	if( count( $words ) > $word_limit ) {
		array_pop( $words );
	}
	return implode( ' ', $words );
}
/*------------- EXCERPT END -------------*/

/*------------- AUTHOR BOX START -------------*/
function charitywp_post_author() {
	$author = get_the_author();
	$author_description = get_the_author_meta( 'description' );
	$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 120 ) );
	if ( $author_description ) { ?>
		<div class="post-author">
			<?php charitywp_content_title_start( $text = esc_html__ ( "About The Author", "charitywp" ) ); ?>
			<aside class="about-author">
				<?php if ( $author_avatar ) : ?>
					<div class="about-image">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 170 ) ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="about-content">
					<div class="author-name">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php printf( esc_html__( '%s', 'charitywp' ), $author ); ?>
						</a>
					</div>
					<?php charitywp_user_profile_social_media_links(); ?>
					<p><?php echo esc_attr( $author_description ); ?></p>
				</div>
			</aside>
		</div>
	<?php }
}
/*------------- AUTHOR BOX END -------------*/

/*------------- PAGE LOADING START -------------*/
function charitywp_page_loading() {
	$charitywp_loader = ot_get_option( 'charitywp_loader' );
	if( $charitywp_loader == 'on' ) :
		echo '<div class="loader-wrapper"><div class="spinner">
				  <div class="double-bounce1"></div>
				  <div class="double-bounce2"></div>
				</div>
			</div>';
	endif;
}
/*------------- PAGE LOADING END -------------*/

/*------------- FOOTER CONTENT START -------------*/
function charitywp_footer() {
	$hide_footer = ot_get_option( 'hide_footer' );
	$default_footer_style = ot_get_option( 'default_footer_style' );
	$page_footer_style_1 = ot_get_option( 'page_footer_style_1' );
	$page_footer_style_2 = ot_get_option( 'page_footer_style_1' );
	
	if( !$hide_footer == 'off' or $hide_footer == 'on' ) {
		if ( is_page() or is_single() ) {
			global $post;
			$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			$footer_style = get_post_meta( $post->ID, 'footer_layout_select', true);
			$footer_status = get_post_meta( $post->ID, 'footer_status', true);
		}
		else {
			$post = "";
			$footer_gap = "";
			$footer_style = "";
			$footer_status = "";
		}

		if( !$footer_gap == 'off' or $footer_gap == "on" ) {
			$footer_gap_status = "remove-gap";
		} else {
			$footer_gap_status = "remove-gap-removed";			
		}

		function charitywp_copyright() {
			$hide_copyright_menu = ot_get_option( 'hide_copyright_menu' );
			$footer_copyright_text = ot_get_option( 'footer_copyright_text' );
			if( !empty( $footer_copyright_text ) or !$hide_copyright_menu == 'off' or $hide_copyright_menu == "on" ) {
				echo '<div class="footer-copyright">';
					echo '<div class="container">';
						if( !empty( $footer_copyright_text ) ) {
							echo '<p>' . esc_attr( $footer_copyright_text ) . '</p>';
						}

						if( !$hide_copyright_menu == 'off' or $hide_copyright_menu == "on" ) {
							wp_nav_menu(
								array(
									'menu' => 'copyrightmenu',
									'theme_location' => 'copyrightmenu',
									'depth' => 1,
									'container' => 'div',
									'fallback_cb' => 'charitywp_walker::fallback',
									'walker' => new charitywp_walker()
								)
							);
						}
					echo '</div>';
				echo '</div>';
			}
		}
		
		function charitywp_footerstyle1() {
			$page_footer_style_1 = ot_get_option( 'page_footer_style_1' );
			if ( is_page() or is_single() ) {
				global $post;
				$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			}
			else {
				$post = "";
				$footer_gap = "";
			}

			if( !$footer_gap == 'off' or $footer_gap == "on" ) {
				$footer_gap_status = "remove-gap";
			} else {
				$footer_gap_status = "remove-gap-removed";			
			}
			?>
				<footer class="footer footer-style1 <?php echo esc_attr( $footer_gap_status ); ?>" id="Footer">
					<?php charitywp_container_before(); ?>
						<div class="footer-content">
							<?php
								$args_footer_page_content = array(
									'p' => $page_footer_style_1,
									'ignore_sticky_posts' => true,
									'post_type' => 'page',
									'post_status' => 'publish'
								);
								$wp_query = new WP_Query( $args_footer_page_content );
								while ( $wp_query->have_posts() ) :
								$wp_query->the_post();
								$postid = get_the_ID();
							?>
								<?php echo do_shortcode( get_the_content() ); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php charitywp_container_after(); ?>
					<?php charitywp_copyright(); ?>
				</footer>
			<?php
		}
		
		function charitywp_footerstyle2() {
			$page_footer_style_2 = ot_get_option( 'page_footer_style_1' );
			if ( is_page() or is_single() ) {
				global $post;
				$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			}
			else {
				$post = "";
				$footer_gap = "";
			}

			if( !$footer_gap == 'off' or $footer_gap == "on" ) {
				$footer_gap_status = "remove-gap";
			} else {
				$footer_gap_status = "remove-gap-removed";			
			}
			?>
				<footer class="footer footer-style2 <?php echo esc_attr( $footer_gap_status ); ?>" id="Footer">
					<?php charitywp_container_before(); ?>
						<div class="footer-content">
							<?php
								$args_footer_page_content = array(
									'p' => $page_footer_style_2,
									'ignore_sticky_posts' => true,
									'post_type' => 'page',
									'post_status' => 'publish'
								);
								$wp_query = new WP_Query( $args_footer_page_content );
								while ( $wp_query->have_posts() ) :
								$wp_query->the_post();
								$postid = get_the_ID();
							?>
								<?php echo do_shortcode( get_the_content() ); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php charitywp_container_after(); ?>
					<?php charitywp_copyright(); ?>
				</footer>
			<?php
		}
		
		if( !$footer_status == 'off' or $footer_status == "on" ) {
			if( !$page_footer_style_1 == '0' and !empty( $page_footer_style_1  ) or !$page_footer_style_2 == '0' and !empty( $page_footer_style_2  ) ) {
				
				if ( is_page() or is_single() ) {
					
					if( $footer_style == "footer-style-2" ) {
						charitywp_footerstyle2();
					} elseif( $footer_style == "footer-style-1" ) {
						charitywp_footerstyle1();
					} else {
						
						if( $default_footer_style == "footer-style-2" ) {
							charitywp_footerstyle2();
						} else {
							charitywp_footerstyle1();
						}
						
					}
					
				} elseif( is_category() ) {
				
					$cat = get_queried_object();
					$cat_id = $cat->term_id;
					$charitywp_category_footer_style = get_term_meta( $cat_id, 'charitywp_category_footer_style', true );
					
					if( $charitywp_category_footer_style == "footer-style-2" ) {
						charitywp_footerstyle2();
					} elseif( $charitywp_category_footer_style == "footer-style-1" ) {
						charitywp_footerstyle1();
					} else {
						
						if( $default_footer_style == "footer-style-2" ) {
							charitywp_footerstyle2();
						} else {
							charitywp_footerstyle1();
						}
						
					}
					
				} else {
					
					if( $default_footer_style == "footer-style-2" ) {
						charitywp_footerstyle2();
					} else {
						charitywp_footerstyle1();
					}
					
				}
			
			} else {
				echo '<div class="no-footer-blank"></div>';
			}
		} else {
			echo '<div class="no-footer-blank"></div>';
		}
		
	} else {
		echo '<div class="no-footer-blank"></div>';
	}
}
/*------------- FOOTER CONTENT END -------------*/

/*------------- DATE FORMAT START -------------*/
function charitywp_global_date_format( $date = "" ) {
	$date = date_i18n( get_option( 'date_format' ), strtotime( $date ) );
	return $date;
}

function charitywp_global_date_format_no_year( $date = "" ) {
	$date = date_i18n( 'M d, Y', strtotime( $date ) );
	return $date;
}
/*------------- DATE FORMAT END -------------*/

/*------------- POST FEATURED HEADER START -------------*/
function charitywp_post_featured_header( $post_id = "" ) {
	$featured_header_status = get_post_meta( $post_id, 'featured_header_status', true );
	$post_gallery_images_control =  get_post_meta( $post_id, 'post_images', true );

	if( $featured_header_status == "on" or !$featured_header_status == "off" ) {
		if ( has_post_format( 'video' ) ) {
			$post_video_embed = get_post_meta( $post_id, 'post_video_embed', true );
			if( !empty( $post_video_embed ) ) {
				$post_video_embed_new = balanceTags( stripcslashes( $post_video_embed ) );
				echo '<div class="post-featured-header">';
					echo balanceTags( stripslashes( addslashes( $post_video_embed_new ) ) );

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
				echo '</div>';
			}
		} elseif( has_post_format( 'audio' ) ) {
			$post_audio_embed = get_post_meta( $post_id, 'post_audio_embed', true );
			if( !empty( $post_audio_embed ) ) {
				$post_audio_embed_new = balanceTags ( stripcslashes( $post_audio_embed ) );
				echo '<div class="post-featured-header">';
					echo balanceTags ( stripslashes( addslashes( $post_audio_embed_new ) ) );

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
				echo '</div>';
			}
		} elseif( has_post_format( 'gallery' ) and !empty( $post_gallery_images_control ) ) {
			$post_gallery_images =  explode( ',', get_post_meta( $post_id, 'post_images', true ) );
			if( !empty( $post_gallery_images ) ) {
				echo '<div class="post-featured-header">';
					echo '<div class="swiper-container post-featured-header-image-gallery">';
						echo '<div class="swiper-wrapper">';
							foreach ($post_gallery_images as $image) {
								echo '<div class="swiper-slide">' . wp_get_attachment_image( $image, 'charitywp-big-post', true, true ) . '</div>';
							}
						echo '</div>';
					echo '</div>';

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
					echo '<div class="swiper-button-next"></div>';
					echo '<div class="swiper-button-prev"></div>';
				echo '</div>';
			}
		} else {
			$post_post_image = ot_get_option( 'post_post_image' );
			if ( !$post_post_image == 'off' or $post_post_image == 'on' ) {
				if ( has_post_thumbnail() ) {
					echo '<div class="post-featured-header">';
						echo get_the_post_thumbnail( $post_id, 'charitywp-big-post' );

						$post_post_category_name = ot_get_option( 'post_post_category_name' );
						if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
							if( is_single() ) {
								echo '<div class="category">';
									the_category( '', '' );
								echo '</div>';
							}
						}
					echo '</div>';
				}
			}
		}
	}
}
/*------------- POST FEATURED HEADER END -------------*/

/*------------- ATTACHMENT ID START -------------*/
if( ! function_exists( 'charitywp_get_attachment_id_from_guid' ) ) {
	function charitywp_get_attachment_id_from_guid( $url ) {
		$attachment_id = 0;
		$dir = wp_upload_dir();
		if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
			$file = basename( $url );
			$query_args = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'fields'      => 'ids',
				'meta_query'  => array(
					array(
						'value'   => $file,
						'compare' => 'LIKE',
						'key'     => '_wp_attachment_metadata',
					),
				)
			);
			$query = new WP_Query( $query_args );
			if ( $query->have_posts() ) {
				foreach ( $query->posts as $post_id ) {
					$meta = wp_get_attachment_metadata( $post_id );
					$original_file       = basename( $meta['file'] );
					$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
					if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
						$attachment_id = $post_id;
						break;
					}
				}
			}
		}
		return $attachment_id;
	}
}
/*------------- ATTACHMENT ID START -------------*/

/*------------- GENERAL TO SLUG START -------------*/
function charitywp_to_slug( $string ){
	return strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', $string ) ) );
}
/*------------- GENERAL TO SLUG END -------------*/

/*------------- RELATED POSTS START -------------*/
function charitywp_post_related_navigation() {
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	$post_related_posts = ot_get_option( 'post_related_posts' );
	$post_post_navigation = ot_get_option( 'post_post_navigation' );

	$post_related_count = ot_get_option( 'post_related_posts_column' );
	if( !empty( $post_related_count ) ) {
		$post_related_count = $post_related_count;
	} else {
		$post_related_count = "3";
	}
	
	if( !$post_related_posts == 'off' or $post_related_posts == 'on' or !$post_post_navigation == 'off' or $post_post_navigation == 'on' ) {
		echo '<div class="post-related-navigation">';
			if( !$post_related_posts == 'off' or $post_related_posts == 'on' ) {
				if ( $tags ) {
				?>
					<?php charitywp_content_title_start( $text = esc_html__ ( "Related Posts", "charitywp" ) ); ?>
					<div class="related-posts-columns related-posts-column-<?php echo esc_attr( $post_related_count ); ?>">
						<?php
							$tag_ids = array();
							foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
							$args = array(
								'tag__in' => $tag_ids,
								'post__not_in' => array( $post->ID ),
								'post_status' => 'publish',
								'posts_type' => 'post',
								'ignore_sticky_posts' => true,
								'posts_per_page' => $post_related_count
							);
							$my_query = new wp_query( $args );
							while( $my_query->have_posts() ) {
								$my_query->the_post();
								echo charitywp_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = "false", $excerpt = "false", $read_more = "false", $post_info = "true" );
							}
							wp_reset_postdata();
						?>
					</div>
				<?php }
			}

			if ( !$post_post_navigation == 'off' or $post_post_navigation == 'on' ) {
				charitywp_post_navigation(); 
			}
		echo '</div>';
	}
}
/*------------- RELATED POSTS END -------------*/

/*------------- PAGINATION START -------------*/
function charitywp_pagination() {
	if( is_singular() )
		return;

	global $wp_query;

	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	if( $paged >= 1 )
		$links[] = $paged;

	if( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	$charitywp_post_navigation_prev = '<span><i class="fa fa-angle-left" aria-hidden="true"></i> ' . esc_html__( 'Previous', 'charitywp' ) . '</span>';
	$charitywp_post_navigation_next = '<span>' . esc_html__( 'Next', 'charitywp' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
	$prev_text = $charitywp_post_navigation_prev;
	$next_text = $charitywp_post_navigation_next;

	echo '<nav class="post-pagination"><ul>' . "\n";

	if( get_previous_posts_link() )
		printf( '<li>' . get_previous_posts_link( $prev_text ) . '</li>' );

	?>
		<li class="total-pages"><span><?php echo esc_html__( 'Page', 'charitywp' ) . ' ' . $paged . ' ' . esc_html__( 'of', 'charitywp' ) . ' ' . $max; ?></span></li>
	<?php
	if( get_next_posts_link() )
		printf( '<li>' . get_next_posts_link( $next_text ) . '</li>' );

	echo '</ul></nav>' . "\n";
}
/*------------- PAGINATION END -------------*/

/*------------- POST NAVIGATION START -------------*/
function charitywp_post_navigation() {
	$charitywp_post_navigation_prev = '<span><i class="fa fa-angle-left" aria-hidden="true"></i>' . esc_html__( 'Previous', 'charitywp' ) . '</span>';
	$charitywp_post_navigation_next = '<span>' . esc_html__( 'Next', 'charitywp' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
	$prevPost = get_previous_post( false );
	$nextPost = get_next_post( false );
?>
	<div class="post-navigation">
		<nav>
			<ul>
				<?php if( !empty( $prevPost ) ) { ?>
					<li class="previous">
						<?php previous_post_link( '%link', $charitywp_post_navigation_prev ); ?>
					</li>
				<?php } ?>
				<?php if( !empty( $nextPost ) ) { ?>
					<li class="next">
						<?php next_post_link( '%link', $charitywp_post_navigation_next ); ?>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
<?php
}

function charitywp_latest_posts_pagination( $paged = "", $query = "" ) {
	if( !empty( $paged ) or !empty( $query ) ) {
		$output = "";
		$prev_text = '<span><i class="fa fa-angle-left" aria-hidden="true"></i>' . esc_html__( 'Previous Posts', 'charitywp' ) . '</span>';
		$next_text = '<span>' . esc_html__( 'Next Posts', 'charitywp' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
		$output .= '<nav class="post-pagination">';
			$output .= '<ul>';
				$prev_control = get_previous_posts_link( $prev_text );
				if( !empty( $prev_control ) ) {
					$output .= '<li class="previous">' . get_previous_posts_link( $prev_text ) . '</li>';					
				}
				$next_control = get_next_posts_link( $next_text, $query->max_num_pages );
				if( !empty( $next_control ) ) {
					$output .= '<li class="next">' . get_next_posts_link( $next_text, $query->max_num_pages ) . '</li>';
				}
			$output.= '</ul>';
		$output .= '</nav>';
		return $output;
	}
}
/*------------- POST NAVIGATION END -------------*/

/*------------- CONTACT FORM 7 START -------------*/
function charitywp_mycustom_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );
	return $form;
}
add_filter( 'wpcf7_form_elements', 'charitywp_mycustom_wpcf7_form_elements' );
/*------------- CONTACT FORM 7 END -------------*/

/*------------- MENUS START -------------*/
register_nav_menus( 
	array(
		'mainmenu' => esc_html__( 'Main Menu', 'charitywp' ),
		'onepagemenu' => esc_html__( 'One Page Menu', 'charitywp' ),
		'copyrightmenu' => esc_html__( 'Copyright Menu', 'charitywp' ),
	)
);
/*------------- MENUS END -------------*/

/*------------- HEADER START -------------*/
	/*------------- HEADER STYLES START -------------*/
	function charitywp_header() {
		$hide_header = ot_get_option( 'hide_header' );
		$default_header_style = ot_get_option( 'default_header_style' );
		
		if( !$hide_header == 'off' or $hide_header == 'on' ) {
			if ( is_page() or is_single() ) {
				global $post;
				$header_style = get_post_meta( $post->ID, 'header_layout_select', true);
				$header_status = get_post_meta( $post->ID, 'header_status', true);
				$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
				$header_gap = get_post_meta( $post->ID, 'header_gap', true);
			}
			else {
				$header_style = "";
				$header_status = "";
				$page_menu_location = "";
				$header_gap = "";
			}
		
			if ( $page_menu_location == "default" ) {
				$menu_location = 'mainmenu';
			} elseif ( $page_menu_location == "onepage" ) {
				$menu_location = "onepagemenu";		
			} else {
				$menu_location = "mainmenu";		
			}

			if( !$header_gap == 'off' or $header_gap == "on" ) {
				$header_gap_status = "remove-gap";
			} else {
				$header_gap_status = "remove-gap-removed";			
			}
			
			function charitywp_headerstyle1() {
				if ( is_page() or is_single() ) {
					global $post;
					$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$page_menu_location = "";
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			
				if ( $page_menu_location == "default" ) {
					$menu_location = 'mainmenu';
				} elseif ( $page_menu_location == "onepage" ) {
					$menu_location = "onepagemenu";		
				} else {
					$menu_location = "mainmenu";		
				}
			?>
				<div class="header header-style-1<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php charitywp_site_logo(); ?>
							<div class="header-menu">
								<div class="header-bar">
									<?php charitywp_header_sidebar(); ?>
									<?php charitywp_header_styles_main_elements(); ?>
									<?php charitywp_header_userbox(); ?>
								</div>
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => $menu_location,
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'charitywp_walker::fallback',
												'walker' => new charitywp_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function charitywp_headerstyle2() {
				if ( is_page() or is_single() ) {
					global $post;
					$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$page_menu_location = "";
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			
				if ( $page_menu_location == "default" ) {
					$menu_location = 'mainmenu';
				} elseif ( $page_menu_location == "onepage" ) {
					$menu_location = "onepagemenu";		
				} else {
					$menu_location = "mainmenu";		
				}
			?>
				<div class="header header-style-1 header-style-2<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<?php charitywp_header_top_bar(); ?>
					<div class="container">
						<div class="header-main-area">
							<?php charitywp_site_logo(); ?>
							<div class="header-menu">
								<div class="header-bar">
									<?php charitywp_header_userbox(); ?>
								</div>
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => $menu_location,
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'charitywp_walker::fallback',
												'walker' => new charitywp_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function charitywp_headerstyle3() {
				if ( is_page() or is_single() ) {
					global $post;
					$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$page_menu_location = "";
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			
				if ( $page_menu_location == "default" ) {
					$menu_location = 'mainmenu';
				} elseif ( $page_menu_location == "onepage" ) {
					$menu_location = "onepagemenu";		
				} else {
					$menu_location = "mainmenu";		
				}
			?>
				<div class="header header-style-1 header-style-3<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<?php charitywp_header_top_bar(); ?>
					<div class="container">
						<div class="header-main-area">
							<?php charitywp_site_logo(); ?>
							<div class="header-menu">
								<div class="header-bar">
									<?php charitywp_header_userbox(); ?>
								</div>
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => $menu_location,
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'charitywp_walker::fallback',
												'walker' => new charitywp_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function charitywp_headerstyle4() {
				if ( is_page() or is_single() ) {
					global $post;
					$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$page_menu_location = "";
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			
				if ( $page_menu_location == "default" ) {
					$menu_location = 'mainmenu';
				} elseif ( $page_menu_location == "onepage" ) {
					$menu_location = "onepagemenu";		
				} else {
					$menu_location = "mainmenu";		
				}
			?>
				<div class="header header-style-1 header-style-4<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php charitywp_site_logo(); ?>
							<div class="header-menu">
								<div class="header-bar">
									<?php charitywp_header_sidebar(); ?>
									<?php charitywp_header_styles_main_elements(); ?>
									<?php charitywp_header_userbox(); ?>
								</div>
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => $menu_location,
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'charitywp_walker::fallback',
												'walker' => new charitywp_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function charitywp_headerstyle5() {
				if ( is_page() or is_single() ) {
					global $post;
					$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$page_menu_location = "";
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			
				if ( $page_menu_location == "default" ) {
					$menu_location = 'mainmenu';
				} elseif ( $page_menu_location == "onepage" ) {
					$menu_location = "onepagemenu";		
				} else {
					$menu_location = "mainmenu";		
				}
			?>
				<div class="header header-style-1 header-style-5<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php charitywp_site_logo(); ?>
							<?php charitywp_site_alternative_logo(); ?>
							<div class="header-menu">
								<div class="header-bar">
									<?php charitywp_header_sidebar(); ?>
									<?php charitywp_header_styles_main_elements(); ?>
									<?php charitywp_header_userbox(); ?>
								</div>
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => $menu_location,
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'charitywp_walker::fallback',
												'walker' => new charitywp_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			if( !$header_status == 'off' or $header_status == "on" ) {
				
				if ( is_page() or is_single() ) {
					
					if( $header_style == "header-style-2" ) {
						charitywp_headerstyle2();
					} elseif( $header_style == "header-style-3" ) {
						charitywp_headerstyle3();
					} elseif( $header_style == "header-style-4" ) {
						charitywp_headerstyle4();
					} elseif( $header_style == "header-style-5" ) {
						charitywp_headerstyle5();
					} elseif( $header_style == "header-style-1" ) {
						charitywp_headerstyle1();
					} else {
						
						if( $default_header_style == "header-style-2" ) {
							charitywp_headerstyle2();
						} elseif( $default_header_style == "header-style-3" ) {
							charitywp_headerstyle3();
						} elseif( $default_header_style == "header-style-4" ) {
							charitywp_headerstyle4();
						} elseif( $default_header_style == "header-style-5" ) {
							charitywp_headerstyle5();
						} else {
							charitywp_headerstyle1();
						}
						
					}
					
				} elseif( is_category() ) {
					
					$cat = get_queried_object();
					$cat_id = $cat->term_id;
					$charitywp_category_header_style = get_term_meta( $cat_id, 'charitywp_category_header_style', true );
					
					if( $charitywp_category_header_style == "header-style-2" ) {
						charitywp_headerstyle2();
					} elseif( $charitywp_category_header_style == "header-style-3" ) {
						charitywp_headerstyle3();
					} elseif( $charitywp_category_header_style == "header-style-4" ) {
						charitywp_headerstyle4();
					} elseif( $charitywp_category_header_style == "header-style-5" ) {
						charitywp_headerstyle5();
					} elseif( $charitywp_category_header_style == "header-style-1" ) {
						charitywp_headerstyle1();
					} else {
						
						if( $default_header_style == "header-style-2" ) {
							charitywp_headerstyle2();
						} elseif( $default_header_style == "header-style-3" ) {
							charitywp_headerstyle3();
						} elseif( $default_header_style == "header-style-4" ) {
							charitywp_headerstyle4();
						} elseif( $default_header_style == "header-style-5" ) {
							charitywp_headerstyle5();
						} else {
							charitywp_headerstyle1();
						}
						
					}
					
				} else {
				
					if( $default_header_style == "header-style-2" ) {
						charitywp_headerstyle2();
					} elseif( $default_header_style == "header-style-3" ) {
						charitywp_headerstyle3();
					} elseif( $default_header_style == "header-style-4" ) {
						charitywp_headerstyle4();
					} elseif( $default_header_style == "header-style-5" ) {
						charitywp_headerstyle5();
					} else {
						charitywp_headerstyle1();
					}

				}
				
			}
		}
	}
	/*------------- HEADER STYLES START END -------------*/

	/*------------- HEADER MOBILE START -------------*/
	function charitywp_mobile_header() {
		if ( is_page() or is_single() ) {
			global $post;
			$page_menu_location = get_post_meta( $post->ID, 'page_menu_location', true);
		}
		else {
			$page_menu_location = "";
		}
	
		if ( $page_menu_location == "default" ) {
			$menu_location = 'mainmenu';
		} elseif ( $page_menu_location == "onepage" ) {
			$menu_location = "onepagemenu";		
		} else {
			$menu_location = "mainmenu";		
		}
		?>
			<header class="mobile-header">
				<div class="logo-area">
					<div class="container">
						<?php charitywp_site_logo(); ?>
						<div class="mobile-menu-icon">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</header>
			<div class="mobile-menu-wrapper"></div>
			<div class="mobile-menu scrollbar-outer">
				<div class="mobile-menu-top">
					<div class="logo-area">
						<?php charitywp_site_logo(); ?>
						<div class="mobile-menu-icon">
							<i class="fa fa-times-thin" aria-hidden="true"></i>
						</div>
					</div>
					<nav class="mobile-navbar">
						<?php
							wp_nav_menu(
								array(
									'menu' => 'mainmenu',
									'theme_location' => $menu_location,
									'depth' => 5,
									'container' => 'div',
									'container_class' => 'collapse navbar-collapse',
									'menu_class' => 'nav navbar-nav',
									'fallback_cb' => 'charitywp_walker::fallback',
									'walker' => new charitywp_walker()
								)
							);
						?>
					</nav>
				</div>
				<div class="mobile-menu-bottom">
					<?php charitywp_header_userbox(); ?>
					<?php charitywp_header_styles_main_elements(); ?>
				</div>
			</div>
		<?php
	}
	/*------------- HEADER MOBILE END -------------*/

	/*------------- HEADER STYLE CONTENTS START -------------*/
		/*------------- HEADER LOGOS START -------------*/
		function charitywp_site_logo() {
			echo '<div class="header-logo">';
				$logo = ot_get_option( 'charitywp_logo' );
				$logo_height = ot_get_option( 'logo_height' ); if( !empty( $logo_height ) ) { $logo_height = 'height="' . esc_attr( $logo_height[0] ) . esc_attr( $logo_height[1] ) . '"'; }
				$logo_width = ot_get_option( 'logo_width' ); if( !empty( $logo_width ) ) { $logo_width = 'width="' . esc_attr( $logo_width[0] ) . esc_attr( $logo_width[1] ) . '"'; }
				if( !$logo == ""  ) {
					echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'charitywp' ) . '" src="' . esc_url( ot_get_option( 'charitywp_logo' ) ) . '" ' . $logo_height . $logo_width . ' /></a></div>';
				} else {
					echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'charitywp' ) . '" src="' . get_template_directory_uri() . '/assets/img/logo.png" /></a></div>';
				}
			echo '</div>';
		}

		function charitywp_site_alternative_logo() {
			echo '<div class="header-logo header-alternative-logo">';
				$logo = ot_get_option( 'charitywp_logo_alternative' );
				$logo_height = ot_get_option( 'logo_height' ); if( !empty( $logo_height ) ) { $logo_height = 'height="' . esc_attr( $logo_height[0] ) . esc_attr( $logo_height[1] ) . '"'; }
				$logo_width = ot_get_option( 'logo_width' ); if( !empty( $logo_width ) ) { $logo_width = 'width="' . esc_attr( $logo_width[0] ) . esc_attr( $logo_width[1] ) . '"'; }
				if( !$logo == ""  ) {
					echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'charitywp' ) . '" src="' . esc_url( ot_get_option( 'charitywp_logo_alternative' ) ) . '" ' . $logo_height . $logo_width . ' /></a></div>';
				} else {
					echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'charitywp' ) . '" src="' . get_template_directory_uri() . '/assets/img/logo-alternative.png" /></a></div>';
				}
			echo '</div>';
		}
		/*------------- HEADER LOGOS END -------------*/

		/*------------- HEADER USERBOX START -------------*/
		function charitywp_header_userbox() {
			$header_user_box = ot_get_option( 'header_user_box' );
			if( $header_user_box == 'on' ) {
				if( ! is_user_logged_in() ){ 
					echo'<div class="header-userbox"><ul class="user-box-links">
						<li>
							<a href="" data-target="#user_login_popup" data-toggle="modal">' . esc_html__( 'Login', 'charitywp' ) . '</a>
							<a href="" data-target="#user_register_popup" data-toggle="modal">' . esc_html__( 'Sign Up', 'charitywp' ) . '</a>
						</li>
					</ul></div>';
				} else {
					$current_user = wp_get_current_user();
					if( !empty( $current_user->ID ) ) {
						$loggined_user_id = $current_user->ID;
					} else {
						$loggined_user_id = "";
					}
					echo'<div class="header-userbox"><ul class="user-box-links">
						<li>
							<a href="' . esc_url( get_edit_profile_url( $current_user->ID ) ) . '" " title="' . esc_html__( 'Profile', 'charitywp' ) . '">' . esc_html__( 'Profile', 'charitywp' ) . '</a>
							<a href="' . esc_url( wp_logout_url( home_url( '/' ) ) ) . ' " title="' . esc_html__( 'Log Out', 'charitywp' ) . '">' . esc_html__( 'Log Out', 'charitywp' ) . '</a>
						</li>
					</ul></div>';
				}
			}
		}
		/*------------- HEADER USERBOX END -------------*/

		/*------------- HEADER SIDEBAR START -------------*/
		function charitywp_header_sidebar() {
			$header_sidebar = ot_get_option( 'header_sidebar' );
			if( $header_sidebar == 'on' or !$header_sidebar == 'off' ) {
				$search_rand = rand( 0, 999999 );
				echo '<div class="header-sidebar">';
					echo '<i class="fa fa fa-bars" aria-hidden="true"></i>';
					echo '<div class="header-sidebar-content">';
						echo '<div class="header-sidebar-content-wrapper scrollbar-outer">';
							if ( is_active_sidebar( 'header-sidebar' ) )  {
								dynamic_sidebar("header-sidebar");
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';			
			}
		}
		/*------------- HEADER SIDEBAR END -------------*/

		/*------------- HEADER CONTENT ELEMENTS START -------------*/
		function charitywp_header_styles_main_elements() {
			$header_search = ot_get_option( 'header_search' );
			if( $header_search == 'on' or !$header_search == 'off' ) {
				$search_rand = rand( 0, 999999 );
				echo '<div class="header-search">';
					echo '<i class="fa fa fa-search" aria-hidden="true"></i>';
					echo '<div class="header-search-content">
							<form role="search" method="get" id="charitywpsearchform-' . esc_attr( $search_rand ) . '" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
								<div class="search-form-widget">
									<input type="text" value="' . esc_attr( get_search_query() ) . '" placeholder="' . esc_html__( 'Search', 'charitywp' ) . '" name="s" id="charitywp-search-form-' . esc_attr( $search_rand ) . '" class="searchform-text" />
									<button><i class="fa fa-search"></i></button>
								</div>
							</form>
						</div>';
				echo '</div>';			
			}

			$header_social_media = ot_get_option( 'header_social_media' );
			if( $header_social_media == 'on' or !$header_social_media == 'off' ) {
				echo '<div class="social-share">';
					echo '<i class="fa fa-share-alt" aria-hidden="true"></i>';
					echo charitywp_social_media_links();
				echo '</div>';			
			}
		}
		/*------------- HEADER ELEMENTS END -------------*/

		/*------------- HEADER TOP BAR START -------------*/
		function charitywp_header_top_bar() {
			$header_style_2_top_bar = ot_get_option( 'header_style_2_top_bar' );
			if( $header_style_2_top_bar == 'on' or !$header_style_2_top_bar == 'off' ) {
				echo '<div class="header-top-bar">';
					echo '<div class="container">';
						$header_phone_number = ot_get_option( 'header_phone_number' );
						$header_email_address = ot_get_option( 'header_email_address' );
						if( !empty( $header_phone_number ) or !empty( $header_email_address ) ) {
							echo '<div class="top-bar-contact">';
								echo '<ul>';
									if( !empty( $header_phone_number ) ) {
										echo '<li>';
											echo '<i class="fa fa-phone" aria-hidden="true"></i>';
											echo '<span>' . ot_get_option( 'header_phone_number' ) . '</span>';
										echo '</li>';
									}
									if( !empty( $header_email_address ) ) {
										echo '<li>';
											echo '<i class="fa fa-envelope-o" aria-hidden="true"></i>';
											echo '<span>' . ot_get_option( 'header_email_address' ) . '</span>';
										echo '</li>';
									}
								echo '</ul>';
							echo '</div>';
						}

						charitywp_header_sidebar();
						charitywp_header_styles_main_elements();
					echo '</div>';
				echo '</div>';
			}			
		}
		/*------------- HEADER TOP BAR END -------------*/
	/*------------- HEADER STYLE CONTENTS END -------------*/

	/*------------- SUB MENU CLASS START -------------*/
	class charitywp_walker extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
		}
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			//Add class and attribute to LI element that contains a submenu UL.
			if ($args->has_children){
				$classes[] 		= 'dropdown';
				$li_attributes .= ' data-dropdown="dropdown"';
			}
			$classes[] = 'menu-item-' . $item->ID;
			//If we are on the current page, add the active class to that menu item.
			$classes[] = ($item->current) ? 'active' : '';

			//Make sure you still add all of the WordPress classes.
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

			//Add attributes to link element.
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ($args->has_children) ? ' class="dropdown-toggle disabled" data-toggle="dropdown"' : ''; 

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before;
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
			$item_output .= ($args->has_children) ? '<i class="fa fa-angle-down" aria-hidden="true"></i>' : '';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
	        if ( ! $element )
	            return;
	        $id_field = $this->db_fields['id'];
	        // Display this element.
	        if ( is_object( $args[0] ) )
	           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
	        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }
	}
	/*------------- SUB MENU CLASS END -------------*/

	/*------------- HEADER USERBOX CONTENT START -------------*/
	function charitywp_userbox() {
		$header_user_box = ot_get_option( 'header_user_box' );
		$header_social_login_system = ot_get_option( 'header_social_login_system' );
		if( !$header_user_box == 'off' or $header_user_box == 'on' ) {
			if( ! is_user_logged_in() ){ 
				?>
				<div class="modal fade pt-user-modal" id="user_login_popup" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="user-box">
								<div class="user-box-login">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
									<div class="pt-login">
										<form id="pt_login_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
											<div class="form-group">
												<input class="required" name="pt_user_login" type="text" placeholder="<?php echo esc_html__('Username', 'charitywp') ?>" />
											</div>
											<div class="form-group">
												<input class="required" name="pt_user_pass" id="pt_user_pass" type="password" placeholder="<?php echo esc_html__('Password', 'charitywp')?>" />
											</div>
											<div class="form-group login-form-remember-me">
												<div class="login-remember-me-wrapper">
													<input type="checkbox" value="None" id="login-remember-me-wrapper-input" name="pt_remember_me" />
													<label for="login-remember-me-wrapper-input" id="login-remember-me-wrapper-label"><?php echo esc_html__('Remember Me', 'charitywp')?></label>
												</div>
											</div>
											<div class="form-group login-form-button">
												<input type="hidden" name="action" value="charitywp_login_member"/>
												<button data-loading-text="<?php echo esc_html__('Loading...', 'charitywp') ?>" type="submit"><?php echo esc_html__('Sign in', 'charitywp'); ?></button>
											</div>
											<div class="bottom-links">
											<a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>"><?php echo esc_html__('Lost Password?', 'charitywp') ?></a>
											<a href="" data-target="#user_register_popup" data-toggle="modal" class="create-an-account" data-dismiss="modal"><?php echo esc_html__('Create an Account', 'charitywp') ?></a>
											</div>
											<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
										</form>
										<div class="pt-errors"></div>
									</div>
									<div class="pt-loading">
										<p><i class="fa fa-refresh fa-spin"></i><br><?php echo esc_html__('Loading...', 'charitywp') ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade pt-user-modal" id="user_register_popup" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="user-box">
								<div class="user-box-login">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
									<div class="pt-register">
										<?php
											if( get_option("users_can_register") == "0" ) {
												echo '<p class="users_can_register">' . esc_html__( 'New membership are not allowed.', 'charitywp' ) . '</p>';
											} else {
										?>
										<form id="pt_registration_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST">
											<div class="form-group">
												<input class="required" name="pt_user_login" placeholder="<?php echo esc_html__('Username', 'charitywp'); ?>" type="text"/>
											</div>
											<div class="form-group">
												<input class="required" name="pt_user_email" id="pt_user_email" placeholder="<?php echo esc_html__('Email', 'charitywp'); ?>" type="email"/>
											</div>
											<div class="form-group login-form-remember-me">
												<div class="login-remember-me-wrapper">
													<div class="description">
														<?php
															$page_terms_and_conditions = ot_get_option( 'page_terms_and_conditions' );
															if( !empty( $page_terms_and_conditions ) ) {
																$page_terms_and_conditions = get_the_permalink( $page_terms_and_conditions );
															} else {
																$page_terms_and_conditions = home_url( '/' );
															}

															$page_privacy_policy = ot_get_option( 'page_privacy_policy' );
															if( !empty( $page_privacy_policy ) ) {
																$page_privacy_policy = get_the_permalink( $page_privacy_policy );
															} else {
																$page_privacy_policy = home_url( '/' );
															}
														?>
														<?php echo esc_html__('By creating an account you agree to our', 'charitywp' ); ?>
														<a href="<?php echo esc_url( $page_terms_and_conditions ); ?>" target="_blank"><?php echo esc_html__('terms and conditions', 'charitywp' ); ?></a>
														<?php echo esc_html__('and our', 'charitywp' ); ?>
														<a href="<?php echo esc_url( $page_privacy_policy ); ?>" target="_blank"><?php echo esc_html__('privacy policy.', 'charitywp' ); ?></a>
													</div>
												</div>
											</div>
											<div class="form-group login-form-button register-form-button">
												<input type="hidden" name="action" value="charitywp_register_member"/>
												<button data-loading-text="<?php echo esc_html__('Loading...', 'charitywp') ?>" type="submit"><?php echo esc_html__('Be Member', 'charitywp'); ?></button>
											</div>
											<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
										</form>
										<div class="pt-errors"></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
		}
	}
	add_action( 'wp_footer', 'charitywp_userbox' );

	function charitywp_login_member(){
		$user_login = $_POST['pt_user_login'];	
		$user_pass = $_POST['pt_user_pass'];
		$remember = $_POST['pt_remember_me'];
		if(isset($_POST['pt_remember_me'])) {
			$remember_me = "true";
		} else {
			$remember_me = "false";
		}

		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__('Session token has expired, please reload the page and try again.', 'charitywp') . '</div>' ) );
		}
		elseif( empty( $user_login ) || empty( $user_pass ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__('Please fill all form fields.', 'charitywp' ) . '</div>' ) );
		} else {
			$user = wp_signon( array( 'user_login' => $user_login, 'user_password' => $user_pass, 'remember' => $remember_me ), false );
			if( is_wp_error( $user ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . $user->get_error_message() . '</div>' ) );
			} else{
				echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__('Login successful, you are being redirected.', 'charitywp') . '</div>' ) );
			}
		}
		die();
	}
	add_action( 'wp_ajax_nopriv_charitywp_login_member', 'charitywp_login_member' );

	function charitywp_register_member(){
			$user_login	= $_POST['pt_user_login'];	
			$user_email	= $_POST['pt_user_email'];
			
			if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Session token has expired, please reload the page and try again', 'charitywp' ).'</div>' ) );
				die();
			}
		 	
		 	elseif( empty( $user_login ) || empty( $user_email ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Please fill all form fields', 'charitywp' ) . '</div>' ) );
				die();
		 	}
			
			$errors = register_new_user($user_login, $user_email);
			if( is_wp_error( $errors ) ){
				$registration_error_messages = $errors->errors;
				$display_errors = '<div class="alert alert-no">';
					foreach( $registration_error_messages as $error ){
						$display_errors .= '<p>' . $error[0] . '</p>';
					}
				$display_errors .= '</div>';
				echo json_encode( array( 'error' => true, 'message' => $display_errors ) );
			} else {
				echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__( 'Registration completed. Please check your e-mail.', 'charitywp' ) . '</p>' ) );
			}
		 	die();
	}
	add_action( 'wp_ajax_nopriv_charitywp_register_member', 'charitywp_register_member' );
	/*------------- HEADER USERBOX CONTENT END -------------*/
/*------------- HEADER END -------------*/

/*------------- SOCIAL MEDIA START -------------*/
	/*------------- SOCIAL MEDIA LINKS TEMPLATE START -------------*/
	function charitywp_social_media_links() {
		$output = '';
		$output .='<ul class="social-links">';
			if( !ot_get_option( 'social_media_facebook' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_facebook' ) . '" class="facebook" title="' . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_twitter' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_twitter' ) . '" class="twitter" title="' . esc_html__( 'Twitter', 'charitywp' ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_googleplus' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_googleplus' ) . '" class="googleplus" title="' . esc_html__( 'Google+', 'charitywp' ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_instagram' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_instagram' ) . '" class="instagram" title="' . esc_html__( 'Instagram', 'charitywp' ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_linkedin' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_linkedin' ) . '" class="linkedin" title="' . esc_html__( 'Linkedin', 'charitywp' ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vine' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vine' ) . '" class="vine" title="' . esc_html__( 'Vine', 'charitywp' ) . '" target="_blank"><i class="fa fa-vine"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_youtube' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_youtube' ) . '" class="youtube" title="' . esc_html__( 'YouTube', 'charitywp' ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_pinterest' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_pinterest' ) . '" class="pinterest" title="' . esc_html__( 'Pinterest', 'charitywp' ) . '" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_behance' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_behance' ) . '" class="behance" title="' . esc_html__( 'Behance', 'charitywp' ) . '" target="_blank"><i class="fa fa-behance"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_deviantart' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_deviantart' ) . '" class="deviantart" title="' . esc_html__( 'Deviantart', 'charitywp' ) . '" target="_blank"><i class="fa fa-deviantart"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_digg' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_digg' ) . '" class="digg" title="' . esc_html__( 'Digg', 'charitywp' ) . '" target="_blank"><i class="fa fa-digg"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_dribbble' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_dribbble' ) . '" class="dribbble" title="' . esc_html__( 'Dribbble', 'charitywp' ) . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_flickr' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_flickr' ) . '" class="flickr" title="' . esc_html__( 'Flickr', 'charitywp' ) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_github' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_github' ) . '" class="github" title="' . esc_html__( 'GitHub', 'charitywp' ) . '" target="_blank"><i class="fa fa-github"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_lastfm' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_lastfm' ) . '" class="lastfm" title="' . esc_html__( 'Last.fm', 'charitywp' ) . '" target="_blank"><i class="fa fa-lastfm"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_reddit' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_reddit' ) . '" class="reddit" title="' . esc_html__( 'Reddit', 'charitywp' ) . '" target="_blank"><i class="fa fa-reddit"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_soundcloud' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_soundcloud' ) . '" class="soundcloud" title="' . esc_html__( 'SoundCloud', 'charitywp' ) . '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_tumblr' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_tumblr' ) . '" class="tumblr" title="' . esc_html__( 'Tumblr', 'charitywp' ) . '" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vimeo' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vimeo' ) . '" class="vimeo" title="' . esc_html__( 'Vimeo', 'charitywp' ) . '" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vk' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vk' ) . '" class="vk" title="' . esc_html__( 'VK', 'charitywp' ) . '" target="_blank"><i class="fa fa-vk"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_medium' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_medium' ) . '" class="medium" title="' . esc_html__( 'Medium', 'charitywp' ) . '" target="_blank"><i class="fa fa-medium"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_rss' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_rss' ) . '" class="rss" title="' . esc_html__( 'RSS', 'charitywp' ) . '" target="_blank"><i class="fa fa-rss"></i></a></li>';
			endif;
		$output .='</ul>';
		return balanceTags ( stripslashes( addslashes( $output ) ) );
	}
	/*------------- SOCIAL MEDIA LINKS TEMPLATE END -------------*/

	/*------------- POST SOCIAL SHARE TEMPLATE START -------------*/
	function charitywp_general_post_social_share() {
		$social_share_facebook = ot_get_option( 'social_share_facebook' );
		$social_share_twitter = ot_get_option( 'social_share_twitter' );
		$social_share_googleplus = ot_get_option( 'social_share_googleplus' );
		$social_share_linkedin = ot_get_option( 'social_share_linkedin' );
		$social_share_pinterest = ot_get_option( 'social_share_pinterest' );
		$social_share_reddit = ot_get_option( 'social_share_reddit' );
		$social_share_delicious = ot_get_option( 'social_share_delicious' );
		$social_share_stumbleupon = ot_get_option( 'social_share_stumbleupon' );
		$social_share_tumblr = ot_get_option( 'social_share_tumblr' );
		$social_share_link_title = esc_html__( 'Share to', 'charitywp' );
		$hide_general_post_share = ot_get_option( 'hide_general_post_share' );
		$share_post_id = get_the_ID();
		
		$title = "";
		$facebook = "";
		$twitter = "";
		$googleplus = "";
		$linkedin = "";
		$pinterest = "";	
		$reddit = "";
		$delicious = "";
		$stumbleupon = "";
		$tumblr = "";
		
		if( !$hide_general_post_share == 'off' or $hide_general_post_share == "on" ) {
			if( is_single() ) {
				$title = '<div class="title">' . esc_html__( 'Share:', 'charitywp' ) . '</div>';
			}

			if( !$social_share_facebook == 'off' or $social_share_facebook == 'on' ) {
				$facebook = '<li><a class="share-facebook"  href="https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&t=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-facebook"></i>' . '<span>' . esc_html__( 'Facebook', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_twitter == 'off' or $social_share_twitter == 'on' ) {
				$twitter = '<li><a class="share-twitter"  href="https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . urlencode( get_the_title() ). '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Twitter', 'charitywp' ) . '" target="_blank"><i class="fa fa-twitter"></i>' . '<span>' . esc_html__( 'Twitter', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_googleplus == 'off' or $social_share_googleplus == 'on' ) {
				$googleplus = '<li><a class="share-googleplus"  href="https://plus.google.com/share?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Google+', 'charitywp' ) . '" target="_blank"><i class="fa fa-google-plus"></i>' . '<span>' . esc_html__( 'Google+', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_linkedin == 'off' or $social_share_linkedin == 'on' ) {
				$linkedin = '<li><a class="share-linkedin"  href="https://www.linkedin.com/shareArticle?mini=true&amp;url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Linkedin', 'charitywp' ) . '" target="_blank"><i class="fa fa-linkedin"></i>' . '<span>' . esc_html__( 'LinkedIn', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_pinterest == 'off' or $social_share_pinterest == 'on' ) {
				$pinterest = '<li><a class="share-pinterest"  href="https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&description=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Pinterest', 'charitywp' ) . '" target="_blank"><i class="fa fa-pinterest-p"></i>' . '<span>' . esc_html__( 'Pinterest', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_reddit == 'off' or $social_share_reddit == 'on' ) {
				$reddit = '<li><a class="share-reddit"  href="http://reddit.com/submit?url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Reddit', 'charitywp' ) . '" target="_blank"><i class="fa fa-reddit"></i>' . '<span>' . esc_html__( 'Reddit', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_delicious == 'off' or $social_share_delicious == 'on' ) {
				$delicious = '<li><a class="share-delicious"  href="http://del.icio.us/post?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Delicious', 'charitywp' ) . '" target="_blank"><i class="fa fa-delicious"></i>' . '<span>' . esc_html__( 'Delicious', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_stumbleupon == 'off' or $social_share_stumbleupon == 'on' ) {
				$stumbleupon = '<li><a class="share-stumbleupon"  href="http://www.stumbleupon.com/submit?url=' . get_the_permalink() . '&title=' . get_the_title() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Stumbleupon', 'charitywp' ) . '" target="_blank"><i class="fa fa-stumbleupon"></i>' . '<span>' . esc_html__( 'Stumbleupon', 'charitywp' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_tumblr == 'off' or $social_share_tumblr == 'on' ) {
				$tumblr = '<li><a class="share-tumblr"  href="http://www.tumblr.com/share/link?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Tumblr', 'charitywp' ) . '" target="_blank"><i class="fa fa-tumblr"></i>' . '<span>' . esc_html__( 'Tumblr', 'charitywp' ) . '</span>' . '</a></li>';
			}
		}
		
		$before = '<div class="post-share">' . $title . '<ul>';
		$after = '</ul></div>';
		
		$output = $before . $facebook . $twitter . $googleplus . $linkedin . $pinterest . $reddit . $delicious . $stumbleupon . $tumblr . $after;
		return balanceTags ( stripslashes( addslashes( $output ) ) );
	}
	/*------------- POST SOCIAL SHARE TEMPLATE END -------------*/

	/*------------- USER PROFILE SOCIAL MEDIA START -------------*/
	function charitywp_user_profile_social_media_links( $user_id = "" ) {
		$user_profile_social_media_facebook = get_the_author_meta( 'facebook', $user_id );
		$user_profile_social_media_googleplus = get_the_author_meta( 'googleplus', $user_id );
		$user_profile_social_media_instagram = get_the_author_meta( 'instagram', $user_id );
		$user_profile_social_media_linkedin = get_the_author_meta( 'linkedin', $user_id );
		$user_profile_social_media_vine = get_the_author_meta( 'vine', $user_id );
		$user_profile_social_media_twitter = get_the_author_meta( 'twitter', $user_id );
		$user_profile_social_media_pinterest = get_the_author_meta( 'pinterest', $user_id );
		$user_profile_social_media_youtube = get_the_author_meta( 'youtube', $user_id );
		$user_profile_social_media_behance = get_the_author_meta( 'behance', $user_id );
		$user_profile_social_media_deviantart = get_the_author_meta( 'deviantart', $user_id );
		$user_profile_social_media_digg = get_the_author_meta( 'digg', $user_id );
		$user_profile_social_media_dribbble = get_the_author_meta( 'dribbble', $user_id );
		$user_profile_social_media_flickr = get_the_author_meta( 'flickr', $user_id );
		$user_profile_social_media_github = get_the_author_meta( 'github', $user_id );
		$user_profile_social_media_lastfm = get_the_author_meta( 'lastfm', $user_id );
		$user_profile_social_media_reddit = get_the_author_meta( 'reddit', $user_id );
		$user_profile_social_media_soundcloud = get_the_author_meta( 'soundcloud', $user_id );
		$user_profile_social_media_tumblr = get_the_author_meta( 'tumblr', $user_id );
		$user_profile_social_media_vimeo = get_the_author_meta( 'vimeo', $user_id );
		$user_profile_social_media_vk = get_the_author_meta( 'vk', $user_id );
		$user_profile_social_media_medium = get_the_author_meta( 'medium', $user_id );

		if( !$user_profile_social_media_medium == "" or !$user_profile_social_media_vk == "" or !$user_profile_social_media_vimeo == "" or !$user_profile_social_media_tumblr == "" or !$user_profile_social_media_soundcloud == "" or !$user_profile_social_media_reddit == "" or !$user_profile_social_media_lastfm == "" or !$user_profile_social_media_github == "" or !$user_profile_social_media_flickr == "" or !$user_profile_social_media_dribbble == "" or !$user_profile_social_media_digg == "" or !$user_profile_social_media_deviantart == "" or !$user_profile_social_media_behance == "" or !$user_profile_social_media_youtube == "" or !$user_profile_social_media_pinterest == "" or !$user_profile_social_media_twitter == "" or !$user_profile_social_media_vine == "" or !$user_profile_social_media_linkedin == "" or !$user_profile_social_media_facebook == "" or !$user_profile_social_media_googleplus == ""  or !$user_profile_social_media_instagram == "" ) { ?>

			<div class="author-social-links">
				<ul>
					<?php if( !$user_profile_social_media_facebook == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_facebook ); ?>" title="<?php echo esc_html__( 'Facebook', 'charitywp' ); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_googleplus == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_googleplus ); ?>" title="<?php echo esc_html__( 'Google+', 'charitywp' ); ?>" target="_blank" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_instagram == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_instagram ); ?>" title="<?php echo esc_html__( 'Instagram', 'charitywp' ); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_linkedin == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_linkedin ); ?>" title="<?php echo esc_html__( 'LinkedIn', 'charitywp' ); ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vine == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vine ); ?>" title="<?php echo esc_html__( 'Vine', 'charitywp' ); ?>" target="_blank" class="vine"><i class="fa fa-vine"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_twitter == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_twitter ); ?>" title="<?php echo esc_html__( 'Twitter', 'charitywp' ); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_pinterest == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_pinterest ); ?>" title="<?php echo esc_html__( 'Pinterest', 'charitywp' ); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_youtube == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_youtube ); ?>" title="<?php echo esc_html__( 'YouTube', 'charitywp' ); ?>" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_behance == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_behance ); ?>" title="<?php echo esc_html__( 'Behance', 'charitywp' ); ?>" target="_blank" class="behance"><i class="fa fa-behance"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_deviantart == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_deviantart ); ?>" title="<?php echo esc_html__( 'DeviantArt', 'charitywp' ); ?>" target="_blank" class="deviantart"><i class="fa fa-deviantart"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_digg == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_digg ); ?>" title="<?php echo esc_html__( 'Digg', 'charitywp' ); ?>" target="_blank" class="digg"><i class="fa fa-digg"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_dribbble == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_dribbble ); ?>" title="<?php echo esc_html__( 'Dribbble', 'charitywp' ); ?>" target="_blank" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_flickr == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_flickr ); ?>" title="<?php echo esc_html__( 'Flickr', 'charitywp' ); ?>" target="_blank" class="flickr"><i class="fa fa-flickr"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_github == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_github ); ?>" title="<?php echo esc_html__( 'GitHub', 'charitywp' ); ?>" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_lastfm == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_lastfm ); ?>" title="<?php echo esc_html__( 'Last.fm', 'charitywp' ); ?>" target="_blank" class="lastfm"><i class="fa fa-lastfm"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_reddit == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_reddit ); ?>" title="<?php echo esc_html__( 'Reddit', 'charitywp' ); ?>" target="_blank" class="reddit"><i class="fa fa-reddit"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_soundcloud == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_soundcloud ); ?>" title="<?php echo esc_html__( 'SoundCloud', 'charitywp' ); ?>" target="_blank" class="soundcloud"><i class="fa fa-soundcloud"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_tumblr == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_tumblr ); ?>" title="<?php echo esc_html__( 'Tumblr', 'charitywp' ); ?>" target="_blank" class="tumblr"><i class="fa fa-tumblr"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vimeo == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vimeo ); ?>" title="<?php echo esc_html__( 'Vimeo', 'charitywp' ); ?>" target="_blank" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vk == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vk ); ?>" title="<?php echo esc_html__( 'VK', 'charitywp' ); ?>" target="_blank" class="vk"><i class="fa fa-vk"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_medium == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_medium ); ?>" title="<?php echo esc_html__( 'Medium', 'charitywp' ); ?>" target="_blank" class="medium"><i class="fa fa-medium"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php
		}
	}
	/*------------- USER PROFILE SOCIAL MEDIA END -------------*/
/*------------- SOCIAL SHARE END -------------*/

/*------------- SHOP START -------------*/
	/*------------- WOOCOMMERCE GENERAL START -------------*/
	if(class_exists('Woocommerce') ) {
		function charitywp_woocommerce_support() {
			add_theme_support( 'woocommerce' );
		}
		add_action( 'after_setup_theme', 'charitywp_woocommerce_support' );
	}
	/*------------- WOOCOMMERCE GENERAL END -------------*/

	/*------------- WOOCOMMERCE COLUMNS END -------------*/
	function charitywp_related_products_args( $args ) {
		$related_product_count = esc_attr( ot_get_option( 'woocommerce_related_product_count_column' ) );
		if( !empty( $related_product_count ) ) {
			$args['posts_per_page'] = $related_product_count;
			$args['columns'] = 4;
		} else {
			$args['posts_per_page'] = 4;
			$args['columns'] = 4;
		}
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'charitywp_related_products_args' );

	if (!function_exists('charitywp_loop_columns')) {
		function charitywp_loop_columns() {
			$woocommerce_shop_product_column = esc_attr( ot_get_option( 'woocommerce_shop_product_column' ) );
			if( !empty( $woocommerce_shop_product_column ) ) {
				return $woocommerce_shop_product_column;
			} else {
				return 3;
			}
		}
	}
	add_filter('loop_shop_columns', 'charitywp_loop_columns');
	/*------------- WOOCOMMERCE COLUMNS START -------------*/

	/*------------- GENERAL SHOP BUY NOW LINK START -------------*/
	function charitywp_shop_buy_now( $product_id = "" ) {
		if( !empty( $product_id ) ) {
			$output = '<a href="' . get_the_permalink( $product_id ). '" class="more-button" title="' . the_title_attribute( array( 'echo' => 0,  'post' => $product_id ) ) . '">';
				$output .= '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
				$output .= '<span>' . esc_html__( 'Buy Now', 'charitywp' ) . '</span>';
			$output .= '</a>';
			return $output;
		}
	}
	/*------------- GENERAL SHOP BUY NOW LINK END -------------*/

	/*------------- GENERAL PRICE START -------------*/
	function charitywp_product_price( $product_id = "" ) {
		if( !empty( $product_id ) ) {
			global $product;
			$output = '<div class="price">' . balanceTags( stripslashes( addslashes( $product->get_price_html() ) ) ) . '</div>';
			return $output;
		}
	}
	/*------------- GENERAL PRICE END -------------*/
/*------------- SHOP END -------------*/

/*------------- POST LIST STYLES START -------------*/
	/*------------- POST LIST STYLE 1 START -------------*/
	function charitywp_post_list_style_1( $post_id = "", $image = "", $category = "", $excerpt = "", $read_more = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			if ( is_sticky( get_the_ID() ) ) {
				$output .= '<div class="post-list-styles post-list-style-1 sticky-post">';
			} else {
				$output .= '<div class="post-list-styles post-list-style-1">';
			}			
				if( $image == 'true' ) {
						if ( has_post_thumbnail( $post_id ) ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'charitywp-big-post' );
						} else {
							$image_url = "";
						}

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
								if( $category == 'true' ) {
									$output .= '<div class="category">';
										$output .= get_the_category_list( '', '', $post_id );
									$output .= '</div>';
								}
							$output .= '</div>';
						}
				}

				$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

				if( $excerpt == 'true' ) {
					$excerpt_control = get_the_excerpt();
					if( !empty( $excerpt_control ) ) {
						$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
					}
				}

				if( $read_more == 'true' or $post_info == 'true' ) {
					$output .= '<div class="bottom">';
						if( $read_more == 'true' ) {
							$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" class="more-button">' . esc_html__( 'More', 'charitywp' ) . '</a>';
						}

						if( $post_info == 'true' ) {
							$output .= '<ul class="post-information">';
								$output .= '<li class="date"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</li>';
								$output .= '<li class="comment"><i class="fa fa-comment" aria-hidden="true"></i>';
									$output .= '<a href="' . get_the_permalink( $post_id ) . '#comments" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">';
										$num_comments = get_comments_number( $post_id );
										if ( $num_comments == 0 ) {
											$comments = esc_html__( '0 Comment', 'charitywp' );
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . ' ' . esc_html__( 'Comments', 'charitywp' );
										} else {
											$comments = esc_html__( '1 Comment', 'charitywp' );
										}
										$output .= $comments;
									$output .= '</a>';
								$output .= '</li>';
							$output .= '</ul>';
						}
					$output .= '</div>';
				}
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 1 END -------------*/

	/*------------- POST LIST STYLE 2 START -------------*/
	function charitywp_post_list_style_2( $post_id = "", $image = "", $category = "", $excerpt = "", $read_more = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			if ( is_sticky( get_the_ID() ) ) {
				$output .= '<div class="post-list-styles post-list-style-2 sticky-post">';
			} else {
				$output .= '<div class="post-list-styles post-list-style-2">';
			}
				if( $image == 'true' ) {
						if ( has_post_thumbnail( $post_id ) ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'charitywp-small-post' );
						} else {
							$image_url = "";
						}

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
								if( $category == 'true' ) {
									$output .= '<div class="category">';
										$output .= get_the_category_list( '', '', $post_id );
									$output .= '</div>';
								}
							$output .= '</div>';
						}
				}

				$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

				if( $excerpt == 'true' ) {
					$excerpt_control = get_the_excerpt();
					if( !empty( $excerpt_control ) ) {
						$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
					}
				}

				if( $read_more == 'true' or $post_info == 'true' ) {
					$output .= '<div class="bottom">';
						if( $read_more == 'true' ) {
							$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" class="more-button">' . esc_html__( 'More', 'charitywp' ) . '</a>';
						}

						if( $post_info == 'true' ) {
							$output .= '<ul class="post-information">';
								$output .= '<li class="date"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</li>';
								$output .= '<li class="comment"><i class="fa fa-comment" aria-hidden="true"></i>';
									$output .= '<a href="' . get_the_permalink( $post_id ) . '#comments" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">';
										$num_comments = get_comments_number( $post_id );
										if ( $num_comments == 0 ) {
											$comments = esc_html__( '0 Comment', 'charitywp' );
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . ' ' . esc_html__( 'Comments', 'charitywp' );
										} else {
											$comments = esc_html__( '1 Comment', 'charitywp' );
										}
										$output .= $comments;
									$output .= '</a>';
								$output .= '</li>';
							$output .= '</ul>';
						}
					$output .= '</div>';
				}
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 2 END -------------*/

	/*------------- POST LIST STYLE 3 START -------------*/
	function charitywp_post_list_style_3( $post_id = "", $image = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			$output .= '<div class="post-list-styles post-list-style-3">';
				if( $image == 'true' ) {
					if ( has_post_thumbnail( $post_id ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
							$output .= '</div>';
						}
					} else {
						$image_url = "";
					}
				}

				$output .= '<div class="desc">';
					$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

					if( $post_info == 'true' ) {
						$output .= '<div class="post-information"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 3 END -------------*/

	/*------------- ARCHIVE POST LIST STYLES START -------------*/
	function charitywp_archive_post_list_styles() {
		function charitywp_archive_post_list_styles_style1() {
			echo '<div class="archive-post-list-style-1 post-list">';
				while ( have_posts() ) : the_post();
					echo charitywp_post_list_style_1( $post_id = get_the_ID(), $image = "true", $category = "true", $excerpt = "true", $read_more = "true", $post_info = "true" );
				endwhile;
			echo '</div>';
		}
		
		function charitywp_archive_post_list_styles_style2() {
			echo '<div class="archive-post-list-style-2 post-list">';
				while ( have_posts() ) : the_post();
					echo charitywp_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = "true", $excerpt = "true", $read_more = "true", $post_info = "true" );
				endwhile;
			echo '</div>';
		}

		if( is_category() ) {
			$archive_archive_post_list_style = ot_get_option( 'blog_category_post_list_style' );
		} elseif( is_tag() ) {
			$archive_archive_post_list_style = ot_get_option( 'tag_tag_post_list_style' );
		} elseif( is_search() ) {
			$archive_archive_post_list_style = ot_get_option( 'search_search_post_list_style' );
		} else {
			$archive_archive_post_list_style = ot_get_option( 'archive_archive_post_list_style' );
		}
		
		if( is_category() ) {
			$cat = get_queried_object();
			$cat_id = $cat->term_id;
			$charitywp_category_category_post_list_style = get_term_meta( $cat_id, 'charitywp_category_category_post_list_style', true );
			if( $charitywp_category_category_post_list_style == "post-list-style-1" ) {
				charitywp_archive_post_list_styles_style1();				
			} elseif( $charitywp_category_category_post_list_style == "post-list-style-2" ) {
				charitywp_archive_post_list_styles_style2();				
			} else {
				if( $archive_archive_post_list_style == "style2" ) {
					charitywp_archive_post_list_styles_style2();
				} else {
					charitywp_archive_post_list_styles_style1();
				}
			}

		} else {
			if( $archive_archive_post_list_style == "style2" ) {
				charitywp_archive_post_list_styles_style2();
			} else {
				charitywp_archive_post_list_styles_style1();
			}
		}
	}
	/*------------- ARCHIVE POST LIST STYLES END -------------*/
/*------------- POST LIST STYLES END -------------*/

/*------------- BREADCRUMBS START -------------*/
function charitywp_breadcrumbs() {
	/* === OPTIONS === */
	$text['home'] = get_bloginfo( 'name' ); // text for the 'Home' link
	$text['category'] = ' %s'; // text for a category page
	$text['search'] = '%s'; // text for a search results page
	$text['tag'] = '%s'; // text for a tag page
	$text['author'] = '%s'; // text for an author page
	$text['404'] = esc_html__( 'Page 404', 'charitywp' ); // text for the 404 page
	$text['page'] = '%s'; // text 'Page N'
	$text['cpage'] = esc_html__( 'Comment Page', 'charitywp' ) . ' %s'; // text 'Comment Page N'
	$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
	$wrap_after = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
	$sep = '>'; // separator between crumbs
	$sep_before = '<span class="sep">'; // tag before separator
	$sep_after = '</span>'; // tag after separator
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_current = 1; // 1 - show current page title, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$home_url = home_url('/');
	$link_before = '<span>';
	$link_after = '</span>';
	$link_attr = ' itemprop="item"';
	$link_in_before = '<span itemprop="name">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;
	if (is_home() || is_front_page()) {
		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
	} else {
		echo $wrap_before;
		if ($show_home_link) echo $home_link;
		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}
		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}
		} elseif ( is_day() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo $sep;
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current) echo $sep . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}
		// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . $post_type->label . $after;
			}
		} elseif ( is_attachment() ) {
			if ($show_home_link) echo $sep;
			$parent = get_post($parent_id);
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}
		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo $sep;
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
			}
		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;
		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
		echo $wrap_after;
	}
}
/*------------- BREADCRUMBS END -------------*/

/*------------- TITLES START -------------*/
	/*------------- ARCHIVE TITLES START -------------*/
	function charitywp_archive_title() {
		echo '<div class="page-title-breadcrumbs">';
			if( is_page() ) {
				if ( has_post_thumbnail() ) {
					$custom_breadcrumbs = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'charitywp-page-banner' );
					echo '<div class="page-title-breadcrumbs-image" style="background-image:url(' . esc_url( $custom_breadcrumbs["0"] ) . ');"></div>';
				} else {
					echo '<div class="page-title-breadcrumbs-image"></div>';						
				}	
			} else {
				echo '<div class="page-title-breadcrumbs-image"></div>';
			}

			echo '<div class="container">';
				echo '<h1>';
					if( is_post_type_archive( 'event' ) or is_post_type_archive( 'speaker' ) or is_post_type_archive( 'venue' ) ) {
						echo post_type_archive_title();
					} elseif( is_category() ) {
						$blog_category_title = ot_get_option( 'blog_category_title' );
						if( !$blog_category_title == 'off' or $blog_category_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses( printf( __( '<span>%s</span>', 'charitywp' ), single_cat_title( '', false ) ) , $allowed_html );
						}
					} elseif( is_tag() ) {
						$tag_tag_title = ot_get_option( 'tag_tag_title' );
						if( !$tag_tag_title == 'off' or $tag_tag_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses( printf( __( '<span>%s</span>', 'charitywp' ), single_tag_title( '', false ) ) , $allowed_html );
						}
					} elseif( is_search() ) {
						$search_search_title = ot_get_option( 'search_search_title' );
						if( !$search_search_title == 'off' or $search_search_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses ( printf( __( '<span>%s</span>', 'charitywp' ), get_search_query() ) , $allowed_html ); 
						}
					} elseif( is_author() ) {
						printf( esc_html__( '%s', 'charitywp' ), '' . get_the_author() . '' );
					} elseif( is_tax( 'eventcat' ) ) {
						echo single_term_title() . ' ' . esc_html__( 'Events', 'charitywp' );
					} elseif( is_home() ) {
						echo esc_html__( 'Home', 'charitywp' );
					} elseif( is_attachment() ) {
						$attachment_attachment_title = ot_get_option( 'attachment_attachment_title' );
						if( !$attachment_attachment_title == 'off' or $attachment_attachment_title == 'on' ) {
							echo get_the_title();
						}
					} elseif( is_page() ) {
						$page_title = ot_get_option( 'page_title' );
						if( !$page_title == 'off' or $page_title == 'on' ) {
							echo get_the_title();
						}
					} elseif( is_single() ) {
						$post_post_title = ot_get_option( 'post_post_title' );
						if( !$post_post_title == 'off' or $post_post_title == 'on' ) {
							echo get_the_title();
						}
					} else {
						$archive_charitywp_archive_title = ot_get_option( 'archive_charitywp_archive_title' );
						if( !$archive_charitywp_archive_title == 'off' or $archive_charitywp_archive_title == 'on' ) {
							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'charitywp' ), get_the_date() );
							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'charitywp' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'charitywp' ) ) );
							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'charitywp' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'charitywp' ) ) );
							elseif( is_singular( 'venue' ) or is_singular( 'event' ) or is_singular( 'speaker' ) ) :
								echo get_the_title();
							else :
								echo esc_html__( 'Archives', 'charitywp' );
							endif;
						}
					}
				echo '</h1>';
				echo '<div class="excerptBreadcrumbs" >';
					if( is_page() or is_single() ) {
						$excerpt_control = get_the_excerpt();
						if( !empty( $excerpt_control ) ) {
							echo '<p>' . get_the_excerpt() . '</p>';
						}
					}
					charitywp_breadcrumbs();
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}

	function charitywp_archive_title_none() {
		echo '<div class="archive-title-none"></div>';
	}
	/*------------- ARCHIVE TITLES END -------------*/

	/*------------- CONTENT TITLES START -------------*/
	function charitywp_content_title_start( $text = "" ) {
		echo '<div class="content-title-wrapper">';
			echo '<div class="title">' . $text . '</div>';
		echo '</div>';
	}

	function charitywp_content_alternative_title_start( $text = "" ) {
		echo '<span class="content-alternative-wrapper-title">' . $text . '</span>';
	}
	/*------------- CONTENT TITLES END -------------*/
/*------------- TITLES END -------------*/

/*------------- SIDEBARS & COLUMNS START -------------*/
	/*------------- CREATE SIDEBARS START -------------*/
	if( !function_exists( 'charitywp_sidebars_init' ) ) {
		function charitywp_sidebars_init() {
			register_sidebar(array(
				'id' => 'general-sidebar',
				'name' => esc_html__( 'General Sidebar', 'charitywp' ),
				'before_widget' => '<div id="%1$s" class="general-sidebar-wrap widget-box %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title">',
				'after_title' => '</div>',
			));
			
			register_sidebar(array(
				'id' => 'shop-sidebar',
				'name' => esc_html__( 'Shop Sidebar', 'charitywp' ),
				'before_widget' => '<div id="%1$s" class="shop-sidebar-wrap widget-box %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title">',
				'after_title' => '</div>',
			));
			
			register_sidebar(array(
				'id' => 'header-sidebar',
				'name' => esc_html__( 'Header Sidebar', 'charitywp' ),
				'before_widget' => '<div id="%1$s" class="header-sidebar-wrap widget-box %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title">',
				'after_title' => '</div>',
			));
		}
	}

	add_action( 'widgets_init', 'charitywp_sidebars_init' );
	/*------------- CREATE SIDEBARS END -------------*/

	/*------------- SIDEBAR START -------------*/
	function charitywp_post_content_area_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
		} else {
			if ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
		}
	}

	function charitywp_post_sidebar_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$cat = get_queried_object();
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {			
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		} else {
			if ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$cat = get_queried_object();
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {			
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		}
	}

	function charitywp_content_area_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right site-content-left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
		} else {
			if ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right site-content-left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
		}
	}

	function charitywp_sidebar_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		} else {
			if ( is_post_type_archive( 'event' ) ) {
				$sidebar_position = ot_get_option('event_sidebar_position');
			} elseif ( is_post_type_archive( 'venue' ) ) {
				$sidebar_position = ot_get_option('venue_sidebar_position');
			} elseif ( is_post_type_archive( 'speaker' ) ) {
				$sidebar_position = ot_get_option('speaker_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$charitywp_category_sidebar_style = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				if( !empty( $charitywp_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'charitywp_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		}
	}

	function charitywp_content_area_end() {
		echo '</div>';
	}

	function charitywp_sidebar_end() {
		echo '</div></div>';
	}
	/*------------- SIDEBAR END -------------*/

	/*------------- WRAPPER BEFORE START -------------*/
	function charitywp_wrapper_before() {
		?>
			<div class="charitywp-wrapper" id="general-wrapper">
		<?php
	}
	/*------------- WRAPPER BEFORE END -------------*/

	/*------------- WRAPPER AFTER START -------------*/
	function charitywp_wrapper_after() {
		?>
			</div>
		<?php
	}
	/*------------- WRAPPER AFTER END -------------*/

	/*------------- SITE CONTENT START -------------*/
	function charitywp_site_content_start() {
		?>
			<div class="site-content">
		<?php
	}

	function charitywp_site_content_end() {
		?>			
			</div>
		<?php
	}
	/*------------- SITE CONTENT END -------------*/

	/*------------- SITE SUB CONTENT START -------------*/
	function charitywp_site_sub_content_start() {
		?>
			<div class="site-sub-content">
		<?php
	}

	function charitywp_site_sub_content_end() {
		?>			
			</div>
		<?php
	}
	/*------------- SITE SUB CONTENT END -------------*/

	/*------------- WIDGET CONTENT BEFORE START -------------*/
	function charitywp_widget_content_before() {
		?>
			<div class="widget-content">
		<?php
	}
	/*------------- WIDGET CONTENT BEFORE END -------------*/

	/*------------- WIDGET CONTENT AFTER START -------------*/
	function charitywp_widget_content_after() {
		?>
			</div>
		<?php
	}
	/*------------- WIDGET CONTENT AFTER END -------------*/

	/*------------- SITE PAGE CONTENT BEFORE START -------------*/
	function charitywp_site_page_content_before() {
		?>
			<div class="site-page-content">
		<?php
	}
	/*------------- SITE PAGE CONTENT BEFORE END -------------*/

	/*------------- SITE PAGE CONTENT AFTER START -------------*/
	function charitywp_site_page_content_after() {
		?>
			</div>
		<?php
	}
	/*------------- SITE PAGE CONTENT AFTER END -------------*/

	/*------------- CONTAINER BEFORE START -------------*/
	function charitywp_container_before() {
		?>
			<div class="container">
		<?php
	}
	/*------------- CONTAINER BEFORE END -------------*/

	/*------------- CONTAINER AFTER START -------------*/
	function charitywp_container_after() {
		?>
			</div>
		<?php
	}
	/*------------- CONTAINER AFTER END -------------*/

	/*------------- ROW BEFORE START -------------*/
	function charitywp_row_before() {
		?>
			<div class="row">
		<?php
	}
	/*------------- ROW BEFORE END -------------*/

	/*------------- ROW AFTER START -------------*/
	function charitywp_row_after() {
		?>
			</div>
		<?php
	}
	/*------------- ROW AFTER END -------------*/
/*------------- SIDEBARS & COLUMNS END -------------*/