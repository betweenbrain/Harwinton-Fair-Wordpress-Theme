<?php
/**
 * @package Harwintonfair
 */

get_header();

echo 'category.php' . "\n";
global $wp;
var_dump($wp->query_string);

if (have_posts()) : ?>
	<main class="wrapper" role="main">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('components/page'); ?>
		<?php endwhile; ?>
	</main>
<?php endif; ?>
<?php get_footer(); ?>