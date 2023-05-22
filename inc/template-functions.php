<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Access Solutions WP Theme
 */

function theme_body_classes( $classes ) {

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Macintosh') !== false) {
		$classes[] = 'mac-os';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

function theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'theme_pingback_header' );
