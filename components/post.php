<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karuna
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (is_single() || is_page()) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if (is_single()) {
			the_title('<h1 class="entry-title">', '</h1>');
		}
		if (!is_single()) {
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		}

		if ('post' === get_post_type()) : ?>
			<?php get_template_part('components/post/content', 'meta'); ?>
		<?php
		endif; ?>
	</header>
	<div class="entry-content">
		<?php
		the_content(sprintf(
			wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'harwintonfair'), array('span' => array('class' => array()))),
			the_title('<span class="screen-reader-text">"', '"</span>', false)
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'harwintonfair'),
			'after'  => '</div>',
		));
		?>
	</div>
	<?php get_template_part('components/post/content', 'footer'); ?>

</article><!-- #post-## -->