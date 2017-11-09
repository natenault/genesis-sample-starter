<?php
/**
 * Genesis Starter.
 *
 * This file adds the front page to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

add_action( 'genesis_meta', 'genesis_starter_front_page_genesis_meta' );
function genesis_starter_front_page_genesis_meta() {

  // Screen reader text for skip link.
  add_action( 'genesis_before_loop', 'genesis_starter_print_screen_reader' );

}

/**
 * Function to output the accessible screen reader header for the content.
 *
 * @since 1.0.0
 */
function genesis_starter_print_screen_reader() {

  echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'genesis-starter' ) . '</h2>';

}

// Runs the Genesis loop.
genesis();