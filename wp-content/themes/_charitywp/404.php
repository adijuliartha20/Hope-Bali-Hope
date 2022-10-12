<?php
/*
	* The template for displaying 404 page
*/
get_header(); ?>

	<?php charitywp_site_sub_content_start(); ?>
		<?php charitywp_container_before(); ?>
			<div class="content-title-element dark size1 center">
				<div class="title"><?php echo esc_html__( '404 Page', 'charitywp' ); ?></span></div>
				<div class="separate"><i class="fa fa-cubes" aria-hidden="true"></i></div>
				<div class="description"><?php echo esc_html__( 'Page not found! The page you are looking for cannot be found.', 'charitywp' ); ?></div>
			</div>

			<div class="page-404-search">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div>
						<input type="text" placeholder="<?php esc_html_e( 'Enter the keyword..', 'charitywp' ); ?>" name="s" class="search">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i> <?php esc_html_e( 'Search', 'charitywp' ); ?></button>
					</div>
				</form>
			</div>
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>
	
<?php get_footer();
