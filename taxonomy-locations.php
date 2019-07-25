<?php
get_header();

$term = get_queried_object();
$events = new WP_Query(
    array(
        'posts_per_page' => -1,
        'post_type' => 'events',
        'tax_query' => array(
            array(
                'taxonomy' => 'locations',
                'field' => 'term_id',
                'terms' => $term->term_id,
            )
        )
    )
);
$today = null;
if ($events->have_posts()) : ?>
    <main class="wrapper" role="main">
        <h1>Events at the <?php echo $term->name ?></h1>
        <?php while ($events->have_posts()) : $events->the_post(); ?>
            <?php $meta = get_post_meta($post->ID); ?>
            <?php
            $date = date('l, F jS', strtotime($meta['begin'][0]));
            if ($today != $date) {
                $today = $date; ?>
                <h2><?php echo $date ?></h2>
            <?php    } ?>
            <?php get_template_part('parts/event'); ?>
        <?php endwhile; ?>
    </main>
<?php endif; ?>
<?php get_footer(); ?>