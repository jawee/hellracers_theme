<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */


/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists ( 'understrap_posted_on' ) ) {
	function understrap_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"> (%4$s) </time>';
		// }
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			// esc_html_x( 'Posted on %s', 'post date', 'understrap' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		// $byline = sprintf(
		// 	esc_html_x( 'by %s', 'post author', 'understrap' ),
		// 	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		// );
		// echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
		echo '<span class="posted-on">' . $posted_on . '</span>';
	}
}

if(!function_exists('understrap_category_for_post')) {
	function understrap_category_for_post() {
		$categories = get_the_category($post->ID);
		//print_r($category);
		echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
	}
}

if ( ! function_exists ( 'understrap_posted_on_post' ) ) {
	function understrap_posted_on_post($post) {
		$time_string = '<time class="entry-date published">%s</time>';

		$time_string = sprintf( $time_string,
			 get_the_date('c', $post) 
		);
                $time_string = '<time class="entry-date published">' . get_the_date('d M Y', $post) . '</time>'; 
		return $time_string;
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists ( 'understrap_entry_footer' ) ) {
	function understrap_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
			if ( $categories_list && understrap_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'understrap' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists ( 'understrap_categorized_blog' ) ) {
	function understrap_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'understrap_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'understrap_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so components_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so components_categorized_blog should return false.
			return false;
		}
	}
}

