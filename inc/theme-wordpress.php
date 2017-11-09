<?php
/**
 * Genesis Starter
 *
 * This file adds the WordPress admin settings to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Remove WordPress Dashboard Widgets.
add_action( 'wp_dashboard_setup', 'genesis_starter_remove_dashboard_meta_boxes' );
function genesis_starter_remove_dashboard_meta_boxes() {
  global $wp_meta_boxes;
  // wp
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );

  /**
   * Remove Yoast SEO dashboard widget
   * Last Tested: Jun 16 2017 using Yoast SEO 4.9 on WordPress 4.8
   */
  if ( defined( 'WPSEO_VERSION' ) ) {
    // May need to replace 'side' with 'normal' or 'advanced' in some cases.
    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
  }
}

/**
 * Remove unnecessary builtin post type supports.
 */
add_action( 'init', 'genesis_starter_remove_builtin_post_type_supports' );
function genesis_starter_remove_builtin_post_type_supports() {

  // Remove post type supports on pages
  remove_post_type_support( 'page', 'thumbnail' );

  // Remove post type supports on posts
  remove_post_type_support( 'post', 'trackbacks' );

}

/**
 * Remove unnecessary meta boxes.
 */
add_action( 'admin_menu' , 'genesis_starter_remove_post_meta_boxes' );
function genesis_starter_remove_post_meta_boxes() {

  // Remove revisions meta box on all post types
  foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
    if ( post_type_supports( $type, 'revisions' ) ) {
      remove_meta_box( 'revisionsdiv' , $type , 'normal' );;
    }
  }
}

/**
 * Remove "Add Media" button on custom post types.
 */
add_action( 'admin_head', 'genesis_starter_remove_add_media_button' );
function genesis_starter_remove_add_media_button() {
  $screen = get_current_screen();
  $custom_post_types = get_post_types( array(
    'public' => true,
    '_builtin' => false
  ) );

  if ( in_array( $screen->post_type, $custom_post_types ) ) {
    remove_action( 'media_buttons', 'media_buttons' );
  }
}
