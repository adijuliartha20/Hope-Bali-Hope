<?php
/*------------- LATEST POSTS WIDGET START -------------*/
function charitywp_latest_posts_register_widgets() {
	register_widget( 'charitywp_latest_posts_widget' );
}
add_action( 'widgets_init', 'charitywp_latest_posts_register_widgets' );

class charitywp_latest_posts_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
	            'charitywp_latest_posts_widget',
        	    esc_html__( 'Charitywp Theme: Latest Posts Widget', 'charitywp' ),
 	           array( 'description' => esc_html__( 'Latest posts widget.', 'charitywp' ), )
		);
	}
	
	function widget( $args, $instance ) {
		echo $args['before_widget'];

			$latest_posts_widget_title = esc_attr( $instance['latest_posts_widget_title'] );
			if ( !empty( $instance['latest_posts_widget_title'] ) ) {
				echo '<div class="widget-title">'. esc_attr( $latest_posts_widget_title ) .'</div>';
			}

			if( $instance) {
				$latest_posts_widget_title = strip_tags( esc_attr( $instance['latest_posts_widget_title'] ) );
				$latest_posts_widget_category = strip_tags( esc_attr( $instance['latest_posts_widget_category'] ) );
				$latest_posts_widget_exclude = strip_tags( esc_attr( $instance['latest_posts_widget_exclude'] ) );
				$latest_posts_widget_offset = strip_tags( esc_attr( $instance['latest_posts_widget_offset'] ) );
				$latest_posts_widget_post_count = strip_tags( esc_attr( $instance['latest_posts_widget_post_count'] ) );
			}
			
			/*------------- Exclude Start -------------*/
			if( !empty( $latest_posts_widget_exclude ) ) :
				$latest_posts_widget_exclude = $latest_posts_widget_exclude;
				$latest_posts_widget_exclude = explode( ',', $latest_posts_widget_exclude );
			else:
				$latest_posts_widget_exclude = "";
			endif;
			/*------------- Exclude End -------------*/
			?>
			<?php charitywp_widget_content_before(); ?>
				<div class="latest-posts-widget">
					<?php
						$args_latest_posts = array(
							'posts_per_page' => $latest_posts_widget_post_count,
							'post_status' => 'publish',
							'post__not_in' => $latest_posts_widget_exclude,
							'offset' => $latest_posts_widget_offset,
							'ignore_sticky_posts'    => true,
							'post_type' => 'post',
							'cat' => $latest_posts_widget_category
						); 
						$wp_query = new WP_Query($args_latest_posts);
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();
							echo charitywp_post_list_style_3( $post_id = get_the_ID(), $post_information = "true", $post_image = "true", $post_category = "true" );
						}
						wp_reset_postdata();
					?>
				</div>
			<?php charitywp_widget_content_after(); ?>

		<?php echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['latest_posts_widget_title'] = strip_tags( esc_attr( $new_instance['latest_posts_widget_title'] ) );
		$instance['latest_posts_widget_category'] = strip_tags( esc_attr( $new_instance['latest_posts_widget_category'] ) );
		$instance['latest_posts_widget_exclude'] = strip_tags( esc_attr( $new_instance['latest_posts_widget_exclude'] ) );
		$instance['latest_posts_widget_offset'] = strip_tags( esc_attr( $new_instance['latest_posts_widget_offset'] ) );
		$instance['latest_posts_widget_post_count'] = strip_tags( esc_attr( $new_instance['latest_posts_widget_post_count'] ) );

		return $instance;
	}

	function form($instance) {

		$latest_posts_widget_title = '';
		$latest_posts_widget_category = '';
		$latest_posts_widget_exclude = '';
		$latest_posts_widget_offset = '';
		$latest_posts_widget_post_count = '';

		if( $instance) {
			$latest_posts_widget_title = strip_tags( esc_attr( $instance['latest_posts_widget_title'] ) );
			$latest_posts_widget_category = strip_tags( esc_attr( $instance['latest_posts_widget_category'] ) );
			$latest_posts_widget_exclude = strip_tags( esc_attr( $instance['latest_posts_widget_exclude'] ) );
			$latest_posts_widget_offset = strip_tags( esc_attr( $instance['latest_posts_widget_offset'] ) );
			$latest_posts_widget_post_count = strip_tags( esc_attr( $instance['latest_posts_widget_post_count'] ) );
		} ?>
		 
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'charitywp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_title' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_post_count' ) ); ?>"><?php esc_html_e( 'Post Count:', 'charitywp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_post_count' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_post_count ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_category' ) ); ?>"><?php esc_html_e( 'Category:', 'charitywp' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name('latest_posts_widget_category') ); ?>" id="<?php echo esc_attr( $this->get_field_id('latest_posts_widget_category') ); ?>" class="widefat"> 
				<option value=""><?php echo esc_html__( 'All Categories', 'charitywp' ); ?></option>
				<?php
				 $categories =  get_categories('child_of=0'); 
				 foreach ($categories as $category) {
					$category_select_control = '';
					if ( $latest_posts_widget_category == $category->cat_ID )
					{
						$category_select_control = "selected";
					}
					$option = '<option value="' . esc_attr( $category->cat_ID ) . '"' . $category_select_control . '>';
					$option .= $category->cat_name;
					$option .= '</option>';
					echo balanceTags( $option );
				 }
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_exclude' ) ); ?>"><?php esc_html_e( 'Exclude Posts:', 'charitywp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_exclude' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_exclude ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_offset' ) ); ?>"><?php esc_html_e( 'Offset:', 'charitywp' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_posts_widget_offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_posts_widget_offset' ) ); ?>" type="text" value="<?php echo esc_attr( $latest_posts_widget_offset ); ?>" />
		</p>

	<?php }
}
/*------------- LATEST POSTS WIDGET END -------------*/