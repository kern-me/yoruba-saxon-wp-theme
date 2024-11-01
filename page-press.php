<?php
get_header();
include_once ('template-parts/ys-hero.php');

$press_image = get_field('press_image');
$press_heading_content = get_field('press_heading_content');
$press_link = get_field('press_link');
?>

<section class="ys-section ys-lines-section pad-top--l">
    <div class="inner gutter">
        <div class="press-heading-content">
            <img src="<?php echo $press_image['url']; ?>" alt="<?php echo $press_image['alt']; ?>" />
            <?php echo $press_heading_content; ?>
            <a target="_blank" href="<?php echo $press_link['url']; ?>" class="ys-btn ys-btn--skewed ys-btn--yellow u-margin-top-2"><span>Read More</span></a>
        </div>
    </div>
</section>
<section class="ys-section ys-no-skew ys-section--projects">
    <div class="inner ys-carousel-cards--container-grid">
        <?php $loop = new WP_Query( array( 'post_type' => 'press', 'posts_per_page' => -1 ) ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <article class="ys-carousel-card">
            <div>
                <div class="ys-carousel-card--image-container">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
                <h3><?php the_field( 'publication' ); ?></h3>
                <p class="ys-carousel-card--date"><?php the_field( 'published_date' ); ?></p>
                <div class="ys-carousel-card--description"><?php the_field( 'press_description' ); ?></div>
            </div>
            <a href="<?php the_field('press_link') ?>" class="ys-btn ys-btn--yellow u-margin-top-2"><span>Read More</span></a>
        </article>
        <?php endwhile; ?>
    </div>
</section>


<?php get_footer(); ?>
