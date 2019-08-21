<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karuna
 */
$meta      = get_post_meta( $post->ID );
$locations = wp_get_post_terms( $post->ID, 'locations' );
$date      = ( in_array( 'end', $meta ) )
	? date( 'l, F jS', strtotime( $meta['begin'][0] ) ) . ' at ' . date( 'g:i A', strtotime( $meta['begin'][0] ) ) . ' - ' . date( 'g:i A', strtotime( $meta['end'][0] ) )
	: date( 'l, F jS', strtotime( $meta['begin'][0] ) ) . ' at ' . date( 'g:i A', strtotime( $meta['begin'][0] ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_single() || is_page() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo $date . ' at the ' . $locations[0]->name;
		}
		if ( ! is_single() ) {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header>
	<div class="entry-content">
		<?php
		if ( is_single() ) {
			the_content(
				sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'harwintonfair' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'harwintonfair' ),
					'after'  => '</div>',
				)
			);
		}
		if ( ! is_single() ) {
			?>
			<p><?php echo date( 'g:ia', strtotime( $meta['begin'][0] ) ); ?>
				<?php if ( isset( $meta['end'] ) ) { ?>
					until
					<?php
					echo date( 'g:ia', strtotime( $meta['end'][0] ) );
				}
				?>
				at <?php foreach ( $locations as $term ) : ?>
					<a href="/location/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
				<?php endforeach; ?>
			</p>
			<?php
			the_excerpt();
		}
		?>
	</div>
</article>
