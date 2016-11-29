<?php
/**
 * Define some constants
 */
 
// This site is an INN Member
if ( ! defined( 'INN_MEMBER' ) ) {
    define( 'INN_MEMBER', true);
}

// This site is hosted by INN
if ( ! defined( 'INN_HOSTED' ) ) {
    define( 'INN_HOSTED', true);
}

/**
 * Include theme files
 *
 * Based on how Largo loads files: https://github.com/INN/Largo/blob/master/functions.php#L358
 *
 * 1. hook function Largo() on after_setup_theme
 * 2. function Largo() runs Largo::get_instance()
 * 3. Largo::get_instance() runs Largo::require_files()
 *
 * This function is intended to be easily copied between child themes, and for that reason is not prefixed with this child theme's normal prefix.
 *
 * @link https://github.com/INN/Largo/blob/master/functions.php#L145
 */
function largo_child_require_files() {
	$includes = array(
		'/inc/tablepress.php'
	);

	foreach ($includes as $include ) {
		require_once( get_stylesheet_directory() . $include );
	}
}
add_action( 'after_setup_theme', 'largo_child_require_files' );


/**
 * Register a custom homepage layout
 *
 * @see "homepages/layouts/your_homepage_layout.php"
 */
function register_custom_homepage_layout() {
	include_once __DIR__ . '/homepages/layouts/oklahoma.php';
	register_homepage_layout('OklahomaWatch');
}
add_action( 'init', 'register_custom_homepage_layout', 0 );


/**
 * Include compiled style.css
 */
function child_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );

	$suffix = ( LARGO_DEBUG )? '' : '.min';
	wp_enqueue_style( 'oklahomawatch', get_stylesheet_directory_uri() . '/css/child' . $suffix . '.css' );

}
add_action( 'wp_enqueue_scripts', 'child_stylesheet', 20 );


/**
 * DoubleClick for WordPress setup
 */
function oklahoma_configure_dfp() {

    global $DoubleClick;

    $DoubleClick->networkCode = "216331270";

    /* breakpoints */
    $DoubleClick->register_breakpoint('phone', array('minWidth'=>0,'maxWidth'=>769));
    $DoubleClick->register_breakpoint('tablet', array('minWidth'=>769,'maxWidth'=>980));
    $DoubleClick->register_breakpoint('desktop', array('minWidth'=>980,'maxWidth'=>9999));

}

add_action('dfw_setup', 'oklahoma_configure_dfp');
