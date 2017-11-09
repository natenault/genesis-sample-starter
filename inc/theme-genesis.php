<?php
/**
 * Genesis Starter.
 *
 * This file adds the required Genesis functions used in the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Remove Genesis Breadcrumbs theme support.
remove_theme_support( 'genesis-breadcrumbs' );

// Remove Genesis Single Post Layout Settings.
remove_theme_support( 'genesis-inpost-layouts' );

// Remove Genesis Taxonomy Layout Settings.
remove_theme_support( 'genesis-archive-layouts' );

// Remove Genesis SEO Settings menu link.
remove_theme_support( 'genesis-seo-settings-menu' );

// Remove settings meta boxes.
add_action( 'genesis_theme_settings_metaboxes', 'genesis_starter_remove_theme_settings_metaboxes' );
function genesis_starter_remove_theme_settings_metaboxes( $hook ) {

  remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );
  remove_meta_box( 'genesis-theme-settings-feeds', $hook, 'main' );
  remove_meta_box( 'genesis-theme-settings-nav', $hook, 'main' );
  remove_meta_box( 'genesis-theme-settings-scripts',  $hook, 'main' );
  // remove_meta_box( 'genesis-theme-settings-breadcrumbs', $hook, 'main' );
  // remove_meta_box( 'genesis-theme-settings-comments', $hook, 'main' );
  // remove_meta_box( 'genesis-theme-settings-header', $hook, 'main' );
  // remove_meta_box( 'genesis-theme-settings-layout', $hook, 'main' );
  // remove_meta_box( 'genesis-theme-settings-posts', $hook, 'main' );

}

// Remove Genesis options from Theme Customizer.
add_action( 'customize_register', 'genesis_starter_remove_customizer_settings', 16 );
function genesis_starter_customizer_settings( $wp_customize ) {

  $wp_customize->remove_section( 'genesis_layout' );
  $wp_customize->remove_section( 'genesis_comments' );
  $wp_customize->remove_section( 'genesis_archives' );
  $wp_customize->remove_control( 'blog_title' );

}

// Remove Genesis builtin post type supports.
add_action( 'init', 'genesis_starter_remove_post_type_supports' );
function genesis_starter_remove_post_type_supports() {

  foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
    remove_post_type_support( $type, 'genesis-seo' );
    remove_post_type_support( $type, 'genesis-scripts' );
  }

}

// Remove Genesis widgets.
add_action( 'widgets_init', 'genesis_starter_remove_genesis_widgets', 20 );
function genesis_starter_remove_genesis_widgets() {

  unregister_widget( 'Genesis_Latest_Tweets_Widget' );
  unregister_widget( 'Genesis_Menu_Pages_Widget' );
  unregister_widget( 'Genesis_User_Profile_Widget' );
  unregister_widget( 'Genesis_Widget_Menu_Categories' );

}

// Remove Genesis Page Templates.
add_filter( 'theme_page_templates', 'genesis_starter_remove_genesis_page_templates' );
function genesis_starter_remove_genesis_page_templates( $page_templates ) {

  unset( $page_templates['page_archive.php'] );
  unset( $page_templates['page_blog.php'] );

  return $page_templates;

}

// Filter the favicon URL.
add_filter( 'genesis_favicon_url', 'genesis_starter_favicon_url' );
function genesis_starter_favicon_url( $favicon ) {

  $favicon = get_stylesheet_directory_uri() . '/assets/images/favicon.ico';
  return $favicon;

}
