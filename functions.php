<?php
if ( ! function_exists( 'harwintonfair_setup' ) ) {
	function harwintonfair_setup() {
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

	}
}

add_action( 'after_setup_theme', 'harwintonfair_setup' );

/**
 * Register customizer settings/controls. 
 */
function harwintonfair_customize_register( $wp_customize ) {
	// add color picker setting
	$wp_customize->add_setting(
		'link_color', array(
			'default' => '#ff0000',
		)
	);

	// add color picker control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'link_color', array(
				'label'    => 'Link Color',
				'section'  => 'colors',
				'settings' => 'link_color',
			)
		)
	);
}

add_action( 'customize_register', 'harwintonfair_customize_register' );
