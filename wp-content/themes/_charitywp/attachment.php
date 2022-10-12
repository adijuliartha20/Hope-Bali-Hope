<?php
/**
	* The template for displaying attachment
*/
get_header(); ?>

	<?php charitywp_site_sub_content_start(); ?>
		<?php charitywp_archive_title(); ?>
		<?php charitywp_container_before(); ?>
			<?php charitywp_row_before(); ?>
				<?php charitywp_content_area_start(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'include/formats/content-attachment' ); ?>
					<?php endwhile; ?>
					<?php
						$attachment_comment_area = ot_get_option( 'attachment_comment_area' );
						if( $attachment_comment_area == "on" or !$attachment_comment_area == "off" ) {
							while ( have_posts() ) : the_post(); 
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							endwhile;
						}
					?>
				<?php charitywp_content_area_end(); ?>
				<?php get_sidebar(); ?>
			<?php charitywp_row_after(); ?>
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>

<?php get_footer();