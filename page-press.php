<?php
get_header();
echo '<main id="primary" class="site-main">';

include_once ('template-parts/ys-hero.php');
include_once('components/press_featured_section.php');
?>

<section class="ys-section ys-no-skew ys-section--projects">
    <div class="inner ys-carousel-cards--container-grid" id="press-articles-container">
        <?php 
        $paged = 1;
        $posts_per_page = 6;
        $loop = new WP_Query( array( 
            'post_type' => 'press', 
            'posts_per_page' => $posts_per_page,
            'paged' => $paged 
        ) ); 
        
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <article class="ys-carousel-card">
                <div>
                    <div class="ys-carousel-card--image-container">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                    <h3><?php the_field( 'publication' ); ?></h3>
                    <p class="ys-carousel-card--date"><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></p>
                    <div class="ys-carousel-card--description"><?php the_content() ?></div>
                </div>
                <a href="<?php the_field('press_link') ?>" class="ys-btn ys-btn--yellow u-margin-top-2" title="Read More: <?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?>"><span>Read More</span></a>
            </article>
        <?php endwhile; 
        wp_reset_postdata();
        ?>
    </div>
    <?php if ($loop->max_num_pages > 1) : ?>
        <div class="load-more-container">
            <button id="load-more-press" class="btn--load-more" data-page="1" data-max="<?php echo $loop->max_num_pages; ?>">
                Load More
            </button>
        </div>
    <?php endif; ?>
</section>

<?php echo '</main>';

get_footer();