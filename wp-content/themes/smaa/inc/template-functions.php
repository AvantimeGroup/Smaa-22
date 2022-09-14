<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package SMÅA
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function smaa_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'smaa_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function smaa_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'smaa_pingback_header' );


/**
 * Deactivate gutenberg widget admin which replaced "classic widgets" with WP v 5.8
 */

 function smaa_classic_widget_admin() {
	 remove_theme_support('widgets-block-editor');
 }
 add_action( 'after_setup_theme', 'smaa_classic_widget_admin');
