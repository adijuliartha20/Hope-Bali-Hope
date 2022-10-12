<?php
/*
	* The template used for displaying team single content
*/
?>

<div class="post-list post-content-list">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-wrapper">
			<div class="post-content-body">
				<div class="team-detail-container">
					<div class="left">
						<?php
							if ( has_post_thumbnail() ) {
								echo '<div class="image">';
									the_post_thumbnail( 'charitywp-team-big' );
								echo '</div>';
							}

							$team_categories = wp_get_post_terms( get_the_ID(), 'team_category' );
							$team_birthday = get_post_meta( get_the_ID(), 'team_birthday', true );
							$team_company = get_post_meta( get_the_ID(), 'team_company', true );
							$team_location = get_post_meta( get_the_ID(), 'team_location', true );
							$team_phone = get_post_meta( get_the_ID(), 'team_phone', true );
							$team_email = get_post_meta( get_the_ID(), 'team_email', true );
							$team_address = get_post_meta( get_the_ID(), 'team_address', true );
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
							$team_experiences = get_post_meta( get_the_ID(), 'team_experiences', true );

							if( !empty( $team_categories ) or !empty( $team_birthday ) or !empty( $team_company ) or !empty( $team_location ) or !empty( $team_phone ) or !empty( $team_email ) or !empty( $team_address ) or !empty( $official_web_site ) or !empty( $social_media_facebook ) or !empty( $social_media_twitter ) or !empty( $social_media_googleplus ) or !empty( $social_media_instagram ) or !empty( $social_media_youtube ) or !empty( $social_media_flickr ) or !empty( $social_media_soundcloud ) or !empty( $social_media_vimeo ) or !empty( $social_media_linkedin ) or !empty( $team_experiences ) ) {
								echo '<ul class="team-detail-list">';
									if( !empty( $team_categories ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-star" aria-hidden="true"></i>' . esc_html__( 'Position', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">';
												echo '<div class="position-category">';
													foreach( $team_categories as $team_category ) {
														echo '<div class="item">' . esc_attr( $team_category->name ) . '</div>';
													}
												echo '</div>';
											echo '</div>';
										echo '</li>';
									}

									if( !empty( $team_birthday ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-calendar" aria-hidden="true"></i>' . esc_html__( 'Birthday', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . charitywp_global_date_format( $date = $team_birthday ) . '</div>';
										echo '</li>';										
									}

									if( !empty( $team_company ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-building" aria-hidden="true"></i>' . esc_html__( 'Company', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . esc_attr( $team_company ). '</div>';
										echo '</li>';										
									}

									if( !empty( $team_location ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-map" aria-hidden="true"></i>' . esc_html__( 'Location', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . esc_attr( $team_location ). '</div>';
										echo '</li>';										
									}

									if( !empty( $team_phone ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-phone" aria-hidden="true"></i>' . esc_html__( 'Phone', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . esc_attr( $team_phone ). '</div>';
										echo '</li>';										
									}

									if( !empty( $team_address ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-map-signs" aria-hidden="true"></i>' . esc_html__( 'Address', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . esc_attr( $team_address ). '</div>';
										echo '</li>';										
									}

									if( !empty( $team_email ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-envelope" aria-hidden="true"></i>' . esc_html__( 'Email', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . esc_attr( $team_email ). '</div>';
										echo '</li>';										
									}

									if( !empty( $team_experiences ) ) {
										echo '<li class="experiences">';
											echo '<div class="list-name"><i class="fa fa-list" aria-hidden="true"></i>' . esc_html__( 'Experiences', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">' . wpautop( $team_experiences ). '</div>';
										echo '</li>';										
									}

									if( !empty( $official_web_site ) or !empty( $social_media_facebook ) or !empty( $social_media_twitter ) or !empty( $social_media_googleplus ) or !empty( $social_media_instagram ) or !empty( $social_media_youtube ) or !empty( $social_media_flickr ) or !empty( $social_media_soundcloud ) or !empty( $social_media_vimeo ) or !empty( $social_media_linkedin ) ) {
										echo '<li>';
											echo '<div class="list-name"><i class="fa fa-share-alt" aria-hidden="true"></i>' . esc_html__( 'Web Sites', 'charitywp' ) . ':</div>';
											echo '<div class="list-content">';
												echo '<ul class="official-sites">';
													if( !empty( $official_web_site ) ) {
														echo '<li><a href="' . esc_url( $official_web_site ) . '" class="officialsite" title="' . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
													}

													if( !empty( $social_media_facebook ) ) {
														echo '<li><a href="' . esc_url( $social_media_facebook ) . '" class="facebook" title="' . esc_html__( 'Facebook', 'charitywp' ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
													}
													
													if( !empty( $social_media_twitter ) ) {
														echo '<li><a href="' . esc_url( $social_media_twitter ) . '" class="twitter" title="' . esc_html__( 'Twitter', 'charitywp' ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
													}

													if( !empty( $social_media_googleplus ) ) {
														echo '<li><a href="' . esc_url( $social_media_googleplus ) . '" class="googleplus" title="' . esc_html__( 'Google+', 'charitywp' ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
													}

													if( !empty( $social_media_instagram ) ) {
														echo '<li><a href="' . esc_url( $social_media_instagram ) . '" class="instagram" title="' . esc_html__( 'Instagram', 'charitywp' ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
													}

													if( !empty( $social_media_youtube ) ) {
														echo '<li><a href="' . esc_url( $social_media_youtube ) . '" class="youtube" title="' . esc_html__( 'YouTube', 'charitywp' ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
													}

													if( !empty( $social_media_flickr ) ) {
														echo '<li><a href="' . esc_url( $social_media_flickr ) . '" class="flickr" title="' . esc_html__( 'Flickr', 'charitywp' ) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
													}

													if( !empty( $social_media_soundcloud ) ) {
														echo '<li><a href="' . esc_url( $social_media_soundcloud ) . '" class="soundcloud" title="' . esc_html__( 'SoundCloud', 'charitywp' ) . '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
													}

													if( !empty( $social_media_vimeo ) ) {
														echo '<li><a href="' . esc_url( $social_media_vimeo ) . '" class="vimeo" title="' . esc_html__( 'Vimeo', 'charitywp' ) . '" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
													}

													if( !empty( $social_media_linkedin ) ) {
														echo '<li><a href="' . esc_url( $social_media_linkedin ) . '" class="linkedin" title="' . esc_html__( 'LinkedIn', 'charitywp' ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
													}
												echo "<ul>";	
											echo '</div>';
										echo '</li>';
									}

								echo '</ul>';
							}

						?>
					</div>
					<div class="right">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>