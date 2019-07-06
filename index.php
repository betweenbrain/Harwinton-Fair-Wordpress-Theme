<?php
/**
 * @package Harwintonfair
 */

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
		?>
		<article>
			<h1><?php the_title(); ?></h1>
			<h4>Posted on <?php the_time('F jS, Y'); ?></h4>
			<?php the_content(__('(more...)')); ?>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>