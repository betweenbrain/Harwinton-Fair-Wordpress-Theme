<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
  <meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
  <meta name="author" content="<?php the_title(); ?>">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<?php
	// Maybe remove to optimize the site?
	// wp_head();
	?>
    <?php
    	$link_color = get_theme_mod( 'link_color' );

        if ( $link_color ) :
            ?>
            <style type="text/css">
                a {
                    color: <?php echo $link_color; ?>;
                }
            </style>
            <?php
        endif;
?>
</head>

<body>

<?php if ( has_custom_logo() ) : ?>
		<?php the_custom_logo(); ?>
	<?php endif; ?>

<?php
// Site name.
if ( get_bloginfo( 'name' ) ) {
	bloginfo( 'name' );
};
?>
<?php
// Site description.
if ( $description = get_bloginfo( 'description', 'display' ) ) :
	?>
		<?php echo $description; ?>
<?php endif; ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<article>
	<h1><?php the_title(); ?></h1>
	<h4>Posted on <?php the_time( 'F jS, Y' ); ?></h4>
		<?php the_content( __( '(more...)' ) ); ?>
	</article>
<?php endwhile; ?>
<?php endif; ?>
  <script src="js/scripts.js"></script>
</body>
</html>
