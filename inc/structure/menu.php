<?php
/**
 * Genesis Starter.
 *
 * @package Menu
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Remove output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

// Reduce the primary navigation menu to two level depth.
add_filter( 'wp_nav_menu_args', 'genesis_starter_primary_menu_args' );
function genesis_starter_primary_menu_args( $args ) {

  if( 'primary' != $args['theme_location'] ) {
    return $args;
  }

  $args['depth'] = 2;

  return $args;

}

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_starter_secondary_menu_args' );
function genesis_starter_secondary_menu_args( $args ) {

  if ( 'secondary' != $args['theme_location'] ) {
    return $args;
  }

  $args['depth'] = 1;

  return $args;

}