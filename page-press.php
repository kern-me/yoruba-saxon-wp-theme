<?php
get_header();
include_once ('template-parts/ys-hero.php');

$press_featured_article = get_field('press_featured_article');

?>
<?php if ($press_featured_article): ?>
<section class="ys-section ys-lines-section pad-top--l">
    <div class="inner gutter">
        <div class="press-heading-content">
            <?php foreach ($press_featured_article as $pfa):
                $press_link = get_field('press_link', $pfa->ID);
                echo get_the_post_thumbnail($pfa->ID);
            ?>
            <h2><?php echo get_the_title($pfa->ID); ?></h2>
            <?php echo apply_filters('the_content', $pfa->post_content); ?>
            <a target="_blank" href="<?php echo esc_url($press_link); ?>" class="ys-btn ys-btn--skewed ys-btn--yellow u-margin-top-2"><span>Read More</span></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="ys-section ys-no-skew ys-section--projects">
    <div class="inner ys-carousel-cards--container-grid">
        <?php $loop = new WP_Query( array( 'post_type' => 'press', 'posts_per_page' => -1 ) ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <article class="ys-carousel-card">
            <div>
                <div class="ys-carousel-card--image-container">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
                <h3><?php the_field( 'publication' ); ?></h3>
                <p class="ys-carousel-card--date"><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></p>
                <div class="ys-carousel-card--description"><?php the_content() ?></div>
            </div>
            <a href="<?php the_field('press_link') ?>" class="ys-btn ys-btn--yellow u-margin-top-2"><span>Read More</span></a>
        </article>
        <?php endwhile; ?>
    </div>
</section>


<?php get_footer(); ?>
