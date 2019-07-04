<?php
// wp_enqueue_style( 'style', get_stylesheet_uri() );
// wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all');
function harwintonfair_widgets() {

	register_sidebar(
		array(
			'name'          => 'Call To Action',
			'id'            => 'call_to_action',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          =>  __( 'Main Menu', 'harwintonfair' ),
			'id'            => 'main_menu',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'harwintonfair' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'harwintonfair_widgets' );

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

	$wp_customize->add_setting(
		'featured_category', array(
			'default' => '',
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

	$wp_customize->add_control(
		'featured_category', array(
			'type'        => 'select',
			'section'     => 'static_front_page',
			'label'       => __( 'Featured Category' ),
			'description' => __( 'Category of posts displayed on the homepage.' ),
			'choices'     => getCatArray(),
		)
	);
}

add_action( 'customize_register', 'harwintonfair_customize_register' );

function getCatArray() {
	$cats = get_categories();
	$resp = [];
	foreach ( $cats as $cat ) {
		$resp[ $cat->term_id ] = $cat->name;
	}
	return $resp;
}
