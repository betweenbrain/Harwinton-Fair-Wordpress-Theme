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

		/* Query sticky posts */
		$query = new WP_Query(array('post__in' => $sticky, 'ignore_sticky_posts' => 1));
		// The Loop
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
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('components/content', 'page'); ?>
		<?php endwhile; ?>
	</main>
</div>
<?php get_footer(); ?>