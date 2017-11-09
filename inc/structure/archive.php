<?php
/**
 * Genesis Starter.
 *
 * @package Archive
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Modify the read more link text.
add_filter( 'the_content_more_link', 'genesis_starter_read_more_link' );
add_filter( 'get_the_content_more_link', 'genesis_starter_read_more_link' );
function genesis_starter_read_more_link() {

  $link = sprintf(
    '<a href="%s" class="more-link">%s &#x2192;</a>',
    get_the_permalink(),
    genesis_a11y_more_link( __( 'Continue Reading', 'genesis-starter' ) )
  );

  return $link;

}

// Format the read more link markup.
add_filter( 'get_the_content_limit', 'genesis_starter_content_limit_read_more_markup', 10, 3 );
function genesis_starter_content_limit_read_more_markup( $output, $content, $link ) {

  $output = sprintf(
    '<p>%s &#x02026;</p><p class="more-link-wrap">%s</p>',
    $content,
    $link
  );

  return $output;

}

// Remove entry meta in the entry footer on archive pages.
add_action( 'genesis_before_entry', 'genesis_starter_archive_remove_entry_footer' );
function genesis_starter_archive_remove_entry_footer() {

  if ( is_home() || is_search() || is_archive() && !is_post_type_archive() ) {
    remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
    remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
    remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
  }

}
