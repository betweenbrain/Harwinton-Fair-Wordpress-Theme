<?php
$term = get_queried_object();
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'events',
    'tax_query' => array(
        array(
            'taxonomy' => 'locations',
            'field' => 'term_id',
            'terms' => $term->term_id,
        )
    )
);
$posts = get_posts($args); ?>
<ul>
    <?php foreach ($posts as $post) : setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach;  ?>
</ul>
<?php wp_reset_postdata(); ?>