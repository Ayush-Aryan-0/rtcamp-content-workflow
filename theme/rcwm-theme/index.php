<?php get_header(); ?>

<div class="container">
    <h1>Editorial Contents</h1>

    <?php
    $query = new WP_Query([
        'post_type'      => 'rcwm_editorial',
        'posts_per_page' => 10,
        'post_status'    => 'publish'
    ]);

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
            $query->the_post();
            ?>
            <div class="article">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
                <small>Author: <?php the_author(); ?></small>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No editorial content available.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
