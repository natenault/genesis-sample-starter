<?php
/**
 * Genesis Starter.
 *
 * @package Comments
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_starter_comments_gravatar' );
function genesis_starter_comments_gravatar( $args ) {

  $args['avatar_size'] = 60;

  return $args;

}