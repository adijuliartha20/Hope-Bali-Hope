<?php
/**
	* The template for displaying single
*/
get_header(); ?>

	<?php charitywp_site_sub_content_start(); ?>
		<?php
			$post_post_title_each = get_post_meta( get_the_ID(), 'page_title', true );
			$post_post_title = ot_get_option( 'post_post_title' );
			if( !$post_post_title == 'off' or $post_post_title == 'on' ) {
				if( !$post_post_title_each == 'off' or $post_post_title_each == 'on' ) {
					charitywp_archive_title();
				}
			}
		?>
	
		<?php charitywp_container_before(); ?>
			<?php charitywp_row_before(); ?>
				<?php charitywp_post_content_area_start(); ?>
					<?php
						while ( have_posts() ) : the_post();

							give_get_template_part( 'single-give-form/content', 'single-give-form' );

						endwhile; // end of the loop.
					?>
				<?php charitywp_content_area_end(); ?>
				<?php get_sidebar(); ?> 
			<?php charitywp_row_after(); ?>
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>

<?php get_footer();