<?php
/**
 * Genesis Starter.
 *
 * This file adds the Customizer additions to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

add_action( 'customize_register', 'genesis_starter_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function genesis_starter_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'genesis_starter_link_color',
		array(
			'default'           => genesis_starter_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_starter_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', 'genesis-starter' ),
				'label'       => __( 'Link Color', 'genesis-starter' ),
				'section'     => 'colors',
				'settings'    => 'genesis_starter_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'genesis_starter_accent_color',
		array(
			'default'           => genesis_starter_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'genesis_starter_accent_color',
			array(
				'description' => __( 'Change the default hovers color for button.', 'genesis-starter' ),
				'label'       => __( 'Accent Color', 'genesis-starter' ),
				'section'     => 'colors',
				'settings'    => 'genesis_starter_accent_color',
			)
		)
	);

}
