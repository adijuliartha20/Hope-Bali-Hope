<?php
/**
	* The template for displaying woocommerce single
*/
get_header(); ?>

	<?php charitywp_site_sub_content_start(); ?>
		<?php charitywp_container_before(); ?>
			<?php charitywp_row_before(); ?>
				<?php charitywp_content_area_start(); ?>
					<div class="page-content">
						<?php woocommerce_content(); ?>
					</div>
				<?php charitywp_content_area_end(); ?>					
				<?php get_sidebar( 'shop' ); ?>				
			<?php charitywp_row_after(); ?>
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>
	
<?php get_footer();