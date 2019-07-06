<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php the_title(); ?></title>
	<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
	<meta name="author" content="<?php the_title(); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/normalize.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all">
	<?php
	if ($bar_color = get_theme_mod('bar_color')) : ?>
		<style type="text/css">
			.bar {
				background-color: <?php echo $bar_color;
									?>;
			}
		</style>
	<?php
	endif;
	?>
</head>

<body>
	<?php
	if ($description = get_bloginfo('description', 'display')) :
		?>
		<div class="headline bar">
			<div class="wrapper">
				<?php echo $description; ?>
			</div>
		</div>
	<?php endif; ?>


	<?php if (has_custom_logo() || is_active_sidebar('main_menu')) : ?>
		<div class="wrapper">
			<?php if (has_custom_logo()) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>

			<?php if (is_active_sidebar('main_menu')) : ?>
				<?php dynamic_sidebar('main_menu'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if (is_active_sidebar('call_to_action')) : ?>
		<div class="call-to-action">
			<?php dynamic_sidebar('call_to_action'); ?>
		</div>
	<?php endif; ?>