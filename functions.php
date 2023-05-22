<?php
/**
 * Access Solutions WP Theme functions and definitions
 * @package Access Solutions WP Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

// Theme paths constants.
define( 'THEME_DIRECTORY_URI', get_template_directory_uri() );
define( 'THEME_DIRECTORY', get_template_directory() );

require_once THEME_DIRECTORY . '/inc/helpers.php';
require_once THEME_DIRECTORY . '/inc/template-functions.php';

require_once THEME_DIRECTORY . '/classes/Walker_Foundation_Menu.php';
require_once THEME_DIRECTORY . '/classes/Hero_Banner.php';

add_action( 'init', function () {
	Hero_Banner::registerHeroSection();
} );

function theme_setup() {

	load_theme_textdomain( 'Access Solutions WP Theme' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		[
			'menu-1' => esc_html__( 'Primary', 'Access Solutions WP Theme' ),
		]
	);

	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		]
	);

	add_theme_support(
		'custom-logo',
		[
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		]
	);
}

add_action( 'after_setup_theme', 'theme_setup' );


function theme_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'Access Solutions WP Theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'Access Solutions WP Theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}

add_action( 'widgets_init', 'theme_widgets_init' );

function theme_scripts() {

	wp_enqueue_style( 'foundation-css', THEME_DIRECTORY_URI . '/assets/css/foundation.css' );
	wp_enqueue_style( 'custom-css', THEME_DIRECTORY_URI . '/assets/css/custom.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation-js', THEME_DIRECTORY_URI . '/assets/js/foundation.min.js', null, '6.5.0', true );
	wp_enqueue_script( 'slick', THEME_DIRECTORY_URI . '/assets/js/plugins/slick.min.js', [ 'jquery' ], null, true );

	/**
	 * Plugins. Uncomment to enable
	 */
	//wp_enqueue_style('fancybox', get_stylesheet_directory_uri() . '/assets/css/fancybox4.css');
	//wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/plugins/fancybox4.min.js', '', null, true );

	//wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/assets/js/plugins/matchHeight.min.js', ['jquery'], null, true );

	wp_enqueue_script( 'main', THEME_DIRECTORY_URI . '/assets/js/main.js', [
		'jquery',
		'foundation-js',
		'slick'
	], null, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Init Foundation
add_action( 'wp_footer', function () {
	echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
}, 50 );

/**
 * Register ACF Blocks
 */
require THEME_DIRECTORY . '/blocks/register-blocks.php';