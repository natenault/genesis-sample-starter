<?php
/**
 * Genesis Starter.
 *
 * @package Post
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Customize the entry meta in the entry header.
add_filter( 'genesis_post_info', 'genesis_starter_post_info_filter' );
function genesis_starter_post_info_filter( $post_info ) {

  $post_info = '[post_date] ' . __( 'by', 'genesis-starter' ) . ' [post_author_posts_link]';

  return $post_info;

}

// Display adjacent entry navigation on single posts.
add_action( 'genesis_after_entry', 'genesis_prev_next_post_nav', 8 );

// Remove the edit link.
add_filter ( 'genesis_edit_post_link' , '__return_false' );

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_starter_author_box_gravatar' );
function genesis_starter_author_box_gravatar( $size ) {

  return 90;

}