<?php
/*
 * The template for displaying comments part
*/
if ( post_password_required() )
	return;
?>
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) { ?>
			<div class="content-title-wrapper">
				<div class="title"><?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'charitywp' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></div>
			</div>
			<ol class="comment-list">
				<?php
					if (function_exists('charitywp_comment')) {
						$callback = 'charitywp_comment';
					} else {
						$callback = '';
					}
					
					wp_list_comments( array(
						'style' => 'ol',
						'short_ping' => true,
						'avatar_size' => 85,
						'callback' => $callback,
						'reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i>' . esc_html__( 'Reply', 'charitywp' ),
					) );
				?>
			
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
					<nav class="navigation comment-navigation" role="navigation">
						<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment Navigation', 'charitywp' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'charitywp' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'charitywp' ) ); ?></div>
					</nav>
				<?php } ?>

				<?php if ( ! comments_open() && get_comments_number() ) { ?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'charitywp' ); ?></p>
				<?php } ?>
			</ol>
		<?php } ?>

		<div class="comment-form">
			<?php
				$comments_args = array(
					'id_form' => 'commentform',
					'id_submit' => 'submit',
					'class_submit' => 'btn btn-danger',
					'title_reply_before' => '<div class="content-title-wrapper"><div class="title">',
					'title_reply_after' => '</div></div>',
					'title_reply' => esc_html__( 'Leave a Reply', 'charitywp' ),
					'title_reply_to' => '<div class="comment-title">' . esc_html__('Leave a Reply to', 'charitywp') . ' %s' . '</div>',
					'cancel_reply_link' => esc_html__( 'Cancel Reply', 'charitywp'),
					'label_submit' => esc_html__( 'Post Comment', 'charitywp'),
					'comment_field' => '<div class="comments-area-textarea"><textarea class="form-control" placeholder="' . esc_html__('Your Comment', 'charitywp') . '" name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea></div>',
					'comment_notes_before' => '',
					'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
							'<div class="comments-inputs"><div class="form-group name"><input class="form-control" type="text" placeholder="' . esc_html__('Name', 'charitywp') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1"' . ($req ? "aria-required='true'" : '' ). ' /></div>',

						'email' =>
							'<div class="form-group email"><input class="form-control" type="text" placeholder="' . esc_html__('Email', 'charitywp') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1"' . ($req ? "aria-required='true'" : '' ). ' /></div>',

						'url' =>
							'<div class="form-group website"><input class="form-control" type="text" placeholder="' . esc_html__('Website URL', 'charitywp') . '" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="1" /></div></div>'
						)
					),

				);
				comment_form( $comments_args );
			?>
		</div>
	</div>