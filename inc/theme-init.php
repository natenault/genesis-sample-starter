<?php
/**
 * Genesis Starter.
 *
 * Require necessary setup files for the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Define directory locations
$child_lib_dir = get_stylesheet_directory() . '/inc';
$child_customizer_dir = $child_lib_dir . '/customizer/';
$child_structure_dir = $child_lib_dir . '/structure/';
$child_plugins_dir = $child_lib_dir . '/plugins/';

// Load Child Theme Customizer files.
require_once( $child_customizer_dir . 'customize.php' );
include_once( $child_customizer_dir . 'output.php' );

// Load Child Theme Structure files.
include_once( $child_structure_dir . 'archive.php' );
include_once( $child_structure_dir . 'breadcrumb.php' );
include_once( $child_structure_dir . 'comments.php' );
include_once( $child_structure_dir . 'footer.php' );
include_once( $child_structure_dir . 'header.php' );
include_once( $child_structure_dir . 'layout.php' );
include_once( $child_structure_dir . 'menu.php' );
include_once( $child_structure_dir . 'post.php' );
include_once( $child_structure_dir . 'sidebar.php' );