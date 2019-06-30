<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
  <meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>">
  <meta name="author" content="<?php the_title(); ?>">
	<?php
	// Maybe remove to optimize the site?
	// wp_head();
	?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/normalize.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all">
	<?php
		$bar_color = get_theme_mod( 'bar_color' );

	if ( $bar_color ) :
		?>
			<style type="text/css">
				.bar {
					background-color: <?php echo $bar_color; ?>;
				}
			</style>
			<?php
		endif;
	?>
</head>

<body>
<?php
// Site description.
if ( $description = get_bloginfo( 'description', 'display' ) ) :
	?>
		<div class="bar"><?php echo $description; ?></div>
<?php endif; ?>

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
<div class="bar"></div>
  <script src="js/scripts.js"></script>
</body>
</html>
