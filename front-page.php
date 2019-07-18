<?php

/**
 * @package Harwintonfair
 */

get_header(); ?>
<div id="primary" class="content-area">
	<?php
	/* Get all sticky posts */
	$sticky = get_option('sticky_posts');

	if ($sticky) {
		/* Sort the stickies with the newest ones at the top */
		rsort($sticky);

		/* Get the 5 newest stickies (change 5 for a different number) */
		$sticky = array_slice($sticky, 0, 5);

		$query = new WP_Query(array('posts_per_page' => 1, 'post__in' => $sticky, 'ignore_sticky_posts' => 1));
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				echo get_template_part('components/content', 'sticky');
			}
		}
		wp_reset_postdata();
	}
	?>
	<main class="wrapper" role="main">
		<?php
		$category = get_theme_mod('featured_category');
		$query = new WP_Query(array('posts_per_page' => 4, 'cat' => $category, 'ignore_sticky_posts' => 1));
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				echo get_template_part('components/page');
			}
		}
		wp_reset_postdata(); ?>
	</main>
</div>
<?php get_footer(); ?>