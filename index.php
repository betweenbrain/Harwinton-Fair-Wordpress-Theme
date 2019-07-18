<?php
/**
 * @package Harwintonfair
 */

get_header();

echo 'index.php' . "\n";
global $wp;
var_dump($wp->query_string);

if (have_posts()) : ?>
	<main class="wrapper" role="main">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('components/post'); ?>
		<?php endwhile; ?>
	</main>
<?php endif; ?>
<?php get_footer(); ?>