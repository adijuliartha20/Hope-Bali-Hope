<?php
/*
	* The template for displaying archive
*/
get_header(); ?>
	<?php charitywp_site_sub_content_start(); ?>
		<?php
			charitywp_archive_title();
		?>
		<?php charitywp_container_before(); ?>
			<?php charitywp_row_before(); ?>
				<?php charitywp_content_area_start(); ?>
					<?php
					if ( have_posts() ) {
						charitywp_archive_post_list_styles();
						charitywp_pagination();		
					} else {
						get_template_part( 'include/formats/content', 'none' );
					}
					?>
				<?php charitywp_content_area_end(); ?>
				
				<?php get_sidebar(); ?> 
			<?php charitywp_row_after(); ?>
			
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>
	
<?php get_footer();