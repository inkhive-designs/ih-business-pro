<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 
 */

if ( ! function_exists( 'ihbp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ihbp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'ih-business-pro' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'ih-business-pro' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}

function ihbp_posted_on_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'j M' ) ),
		esc_html( get_the_date('j M') ),
		esc_attr( get_the_modified_date( 'j M' ) ),
		esc_html( get_the_modified_date('j M') )
	);
	
	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';

}

endif;

if ( ! function_exists( 'ihbp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ihbp_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ' ', 'ih-business-pro' ) );
		if ( $categories_list && ihbp_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '<span class="cat-title">Categories</span> %1$s', 'ih-business-pro' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' ', 'ih-business-pro' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( '<span class="tag-title">Tags</span> %1$s', 'ih-business-pro' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'ih-business-pro' ), __( '1 Comment', 'ih-business-pro' ), __( '% Comments', 'ih-business-pro' ) );
		echo '</span>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ihbp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ihbp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ihbp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ihbp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ihbp_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'ihbp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function ihbp_comment( $comment, $args, $depth ) {

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'ih-business-pro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'ih-business-pro' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? 'ih-business-pro' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body row">
			<footer class="comment-meta">
				<div class="comment-author vcard col-md-2 col-sm-2 hidden-xs">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 150 ); ?>
				</div><!-- .comment-author -->
				<div class="comment-metadata col-md-10 col-sm-10 col-xs-12">
					<?php printf( '%s', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf('%1$s', get_comment_date() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'ih-business-pro' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content col-md-10 col-sm-10 col-xs-12">
				<?php comment_text(); ?>
				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
			<?php edit_comment_link( __( 'Edit', 'ih-business-pro' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for ihbp_comment()

/**
 * Flush out the transients used in ihbp_categorized_blog.
 */
function ihbp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ihbp_categories' );
}
add_action( 'edit_category', 'ihbp_category_transient_flusher' );
add_action( 'save_post',     'ihbp_category_transient_flusher' );
