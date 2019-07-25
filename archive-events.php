<?php
/**
 * @package Harwintonfair
 */

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$events = new WP_Query(array(
	'post_type' => 'events',
	'posts_per_page' => '50',
	'paged' => $paged,
	'order'      => 'ASC',
	'orderby'   => 'meta_value',
	'meta_key'  => 'begin',
	'meta_type' => 'DATETIME'
));
$today = null;

if ($events->have_posts()) : ?>
	<main class="wrapper" role="main">
		<?php while ($events->have_posts()) : $events->the_post(); ?>
			<?php $meta = get_post_meta($post->ID); ?>
			<?php
			$date = date('l, F jS', strtotime($meta['begin'][0]));
			if ($today != $date) {
				$today = $date; ?>
				<h2><?php echo $date ?></h2>
			<?php	} ?>
			<?php get_template_part('parts/event'); ?>
		<?php endwhile; ?>
	</main>
<?php endif; ?>
<?php get_footer(); ?>