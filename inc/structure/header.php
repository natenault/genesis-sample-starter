<?php
/**
 * Genesis Starter.
 *
 * @package Header
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Add header-* classes to the body class.
add_filter( 'body_class', 'genesis_starter_header_body_classes' );
function genesis_starter_header_body_classes( array $classes ) {

  if ( has_custom_logo() ) {
    $classes[] = 'header-image';
  }

  return $classes;

}

// Display custom logo in header.
add_action( 'genesis_site_title', 'the_custom_logo', 1 );
