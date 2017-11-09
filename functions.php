<?php
/**
 * Genesis Starter.
 *
 * This file adds functions to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme Defaults.
include_once( get_stylesheet_directory() . '/inc/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_starter_localization_setup' );
function genesis_starter_localization_setup() {
	load_child_theme_textdomain( 'genesis-starter', get_stylesheet_directory() . '/languages' );
}

// Setup The Child Theme.
include_once( get_stylesheet_directory() . '/inc/theme-init.php' );

// Override Parent Theme functions.
include_once( get_stylesheet_directory() . '/inc/theme-genesis.php' );

// Add the WordPress functions.
include_once( get_stylesheet_directory() . '/inc/theme-wordpress.php' );

// Add the helper functions.
include_once( get_stylesheet_directory() . '/inc/theme-functions.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Starter' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_starter_enqueue_scripts_styles' );
function genesis_starter_enqueue_scripts_styles() {

	wp_enqueue_style(
		'genesis-starter-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Source+Serif+Pro',
		array(),
		CHILD_THEME_VERSION
	);
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'genesis-starter-responsive-menu', get_stylesheet_directory_uri() . "/assets/scripts/min/responsive-menus.min.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'genesis-starter-responsive-menu',
		'genesis_responsive_menu',
		genesis_starter_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function genesis_starter_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-starter' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-starter' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links'
) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form'
) );

// Add title tag support.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for custom logo.
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 300,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array(
	'primary'   => __( 'After Header Menu', 'genesis-starter' ),
	'secondary' => __( 'Footer Menu', 'genesis-starter' )
) );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );
