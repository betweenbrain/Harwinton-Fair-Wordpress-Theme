<?php

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css', false, '1.0', 'all');
	}
);

add_action(
	'widgets_init',
	function () {
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
				'name'          => 'Main Menu',
				'id'            => 'main_menu',
				'description'   => 'Widgets in this area will be shown on all posts and pages.',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="rounded">',
				'after_title'   => '</h2>',
			)
		);
	}
);

add_action(
	'after_setup_theme',
	function () {
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
);

/**
 * Register customizer settings/controls.
 */
add_action(
	'customize_register',
	function ($wp_customize) {
		// add color picker setting
		$wp_customize->add_setting(
			'bar_color',
			array(
				'default' => '#ff0000',
			)
		);

		$wp_customize->add_setting(
			'featured_category',
			array(
				'default' => '',
			)
		);

		// add color picker control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bar_color',
				array(
					'label'    => 'Top/Bottom Bar Color',
					'section'  => 'colors',
					'settings' => 'bar_color',
				)
			)
		);

		$wp_customize->add_control(
			'featured_category',
			array(
				'type'        => 'select',
				'section'     => 'static_front_page',
				'label'       => __('Featured Category'),
				'description' => __('Category of posts displayed on the homepage.'),
				'choices'     => getCatArray(),
			)
		);
	}
);

function getCatArray()
{
	$cats = get_categories();
	$resp = [];
	foreach ($cats as $cat) {
		$resp[$cat->term_id] = $cat->name;
	}
	return $resp;
}
