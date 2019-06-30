<?php
// wp_enqueue_style( 'style', get_stylesheet_uri() );

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
		'bar_color', array(
			'default' => '#ff0000',
		)
	);

	// add color picker control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'bar_color', array(
				'label'    => 'Top/Bottom Bar Color',
				'section'  => 'colors',
				'settings' => 'bar_color',
			)
		)
	);
}

add_action( 'customize_register', 'harwintonfair_customize_register' );
