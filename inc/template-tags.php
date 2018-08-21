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

