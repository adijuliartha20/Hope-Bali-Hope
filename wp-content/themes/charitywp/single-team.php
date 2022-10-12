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
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					get_template_part( 'include/formats/content-team', get_post_format() );
					echo '<div class="post-content-elements">';
					echo '</div>';
				?>
			<?php endwhile; ?>
		<?php charitywp_container_after(); ?>
	<?php charitywp_site_sub_content_end(); ?>

<?php get_footer();