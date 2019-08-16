<?php
/**
 * @package Harwintonfair
 */

get_header(); ?>
<div id="primary" class="content-area">
	<?php
	/* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );

	if ( $sticky ) {
		/* Sort the stickies with the newest ones at the top */
		rsort( $sticky );

		/* Get the 5 newest stickies (change 5 for a different number) */
		$sticky = array_slice( $sticky, 0, 5 );

		$query = new WP_Query(
			array(
				'posts_per_page'      => 1,
				'post__in'            => $sticky,
				'ignore_sticky_posts' => 1,
			)
		);
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo get_template_part( 'parts/sticky' );
			}
		}
		wp_reset_postdata();
	}
	?>
	<main class="wrapper<?php if ( is_active_sidebar( 'home_sidebar' ) ) echo ' two-column'?>" role="main">
		<div>
		<?php
		$category = get_theme_mod( 'featured_category' );
		$query    = new WP_Query(
			array(
				'posts_per_page'      => 4,
				'cat'                 => $category,
				'ignore_sticky_posts' => 1,
			)
		);
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo get_template_part( 'parts/page' );
			}
		}
		wp_reset_postdata();
		?>
		</div>
		<?php if ( is_active_sidebar( 'home_sidebar' ) ) : ?>
		<aside>
			<?php dynamic_sidebar( 'home_sidebar' ); ?>
		</aside>
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>
