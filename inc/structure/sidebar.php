<?php
/**
 * Genesis Starter.
 *
 * @package Sidebar
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://www.studiopress.com/
 */

// Add support for shortcodes in widget areas.
add_filter( 'widget_text', 'do_shortcode' );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );