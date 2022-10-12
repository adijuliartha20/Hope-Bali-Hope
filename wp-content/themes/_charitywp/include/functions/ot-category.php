<?php
/**
	* Category Custom Fields
 */
function charitywp_category_edit_settings( $term, $taxonomy ) {
	$charitywp_category_sidebar_style  = get_term_meta( $term->term_id, 'charitywp_category_sidebar_style', true );
	$charitywp_category_category_post_list_style  = get_term_meta( $term->term_id, 'charitywp_category_category_post_list_style', true );
?>

	<tr class="form-field gloria-custom-admin-row gloria-custom-admin-row-column">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Sidebar Style', 'charitywp' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="charitywp_category_sidebar_style" id="charitywp-category-sidebar-1" value="nosidebar" class="radio" <?php if( $charitywp_category_sidebar_style == 'nosidebar' ){ echo 'checked="checked"'; } ?>>
					<label for="charitywp-category-sidebar-1"><img for="charitywp-category-header-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/none-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'None Sidebar', 'charitywp' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="charitywp_category_sidebar_style" id="charitywp-category-sidebar-2" value="left" class="radio" <?php if( $charitywp_category_sidebar_style == 'left' ){ echo 'checked="checked"'; } ?>>
					<label for="charitywp-category-sidebar-2"><img for="charitywp-category-header-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/left-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'Left Sidebar', 'charitywp' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="charitywp_category_sidebar_style" id="charitywp-category-sidebar-3" value="right" class="radio" <?php if( $charitywp_category_sidebar_style == 'right' ){ echo 'checked="checked"'; } ?>>
					<label for="charitywp-category-sidebar-3"><img for="charitywp-category-header-3" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/right-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'Right Sidebar', 'charitywp' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>

	<tr class="form-field gloria-custom-admin-row gloria-custom-admin-row-column">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Post List Style', 'charitywp' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="charitywp_category_category_post_list_style" id="charitywp-category-post-list-style-1" value="post-list-style-1" class="radio" <?php if( $charitywp_category_category_post_list_style == 'post-list-style-1' ){ echo 'checked="checked"'; } ?>>
					<label for="charitywp-category-post-list-style-1"><img for="charitywp-category-post-list-style-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style1.jpg'; ?>" alt="<?php echo esc_html__( 'Style 1', 'charitywp' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="charitywp_category_category_post_list_style" id="charitywp-category-post-list-style-2" value="post-list-style-2" class="radio" <?php if( $charitywp_category_category_post_list_style == 'post-list-style-2' ){ echo 'checked="checked"'; } ?>>
					<label for="charitywp-category-post-list-style-2"><img for="charitywp-category-post-list-style-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style2.jpg'; ?>" alt="<?php echo esc_html__( 'Style 2', 'charitywp' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>
  <?php
}
add_action( 'category_edit_form_fields', 'charitywp_category_edit_settings', 10,2 );

function charitywp_category_settings_save( $term_id, $tt_id, $taxonomy ) { 
	if ( isset( $_POST['charitywp_category_sidebar_style'] ) ) {
		update_term_meta( $term_id, 'charitywp_category_sidebar_style', $_POST['charitywp_category_sidebar_style'] );
	}

	if ( isset( $_POST['charitywp_category_category_post_list_style'] ) ) {
		update_term_meta( $term_id, 'charitywp_category_category_post_list_style', $_POST['charitywp_category_category_post_list_style'] );
	}
}
add_action( 'edit_term', 'charitywp_category_settings_save', 10,3 );