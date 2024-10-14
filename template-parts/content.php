<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yaroba-saxon
 */
?>

    <div class="entry-content">
<?php

/*  -------------------------------------------------------------------
    SINGLE PROJECT CONTENT
*/

if (is_singular('project')):

    $description_image = get_field('description_image');
    $directed_by = get_field('directed_by');
    $produced_by = get_field('produced_by');
    $studio = get_field('studio');
    $written_by = get_field('written_by');
    $starring = get_field('starring');
    $release_date = get_field('release_date');
    $watch_link = get_field('watch_link');

    if ($watch_link):
        $link_url = $watch_link['url'];
        $link_title = $watch_link['title'];
        $link_target = $watch_link['target'] ? $watch_link['target'] : '_self';
    endif;
    ?>
    <section class="single-project-description ys-section ys-section--intro pad-top--xl pad-bottom--xl">
        <div class="ys-skewed">
            <div class="inner inner--lines">
                <div class="ys-two-col ys-two-col--mobile-reversed">
                    <div class="ys-col ys-col--first ys-two-col--content">
                        <?php the_content(); ?>
                        <p><strong>Directed By: </strong><?php echo $directed_by ?></p>
                        <p><strong>Produced By: </strong><?php echo $produced_by ?></p>
                        <p><strong>Studio: </strong><?php echo $studio ?></p>
                        <p><strong>Written By: </strong><?php echo $written_by ?></p>
                        <p><strong>Starring: </strong><?php echo $starring ?></p>
                        <p><strong>Release Date: </strong><?php echo $release_date ?></p>
                        <a class="ys-btn ys-btn--yellow" href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <span><?php echo esc_html($link_title); ?></span>
                        </a>
                    </div>
                    <div class="ys-col ys-col--last">
                        <img src=" <?php echo esc_url($description_image['url']) ?>'"
                             alt="<?php echo esc_attr($description_image['alt']) ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    $featured_media_selection = get_field('featured_media_selection');

    if ($featured_media_selection): ?>
        <section class="single-project-featured-media">
        <?php
        if ($featured_media_selection === 'video'):
            $featured_video = get_field('featured_video');
            $featured_video_poster = get_field('featured_video_poster');

            echo
                '<div class="video-container">
                        <button id="featured_play_btn" class="ys-btn--video initial"></button>
                        <video id="featured_video" poster="' . $featured_video_poster . '">
                            <source src="' . $featured_video . '" type="video/mp4">
                        </video>
                    </div>';

        elseif ($featured_media_selection === 'image'):
            $featured_media_image = get_field('featured_image');
            echo '<img src="' . esc_url($featured_media_image['url']) . '" alt="' . esc_attr($featured_media_image['alt']) . '"/>';
        endif;

        $featured_review = get_field('featured_review');

        if ($featured_review):
            $featured_review_source = get_field('featured_review_source');
            echo
                '<div class="featured-review">' . $featured_review . '<p>&mdash; ' . $featured_review_source . '</p></div>';
            ?>
            </section>
        <?php endif; ?>

        <?php
        $related_press = get_field('related_press');

        if ($related_press): ?>
            <section class="single-project-press ys-carousel-cards--container">
                <div class="inner">
                    <h2 class="heading-xl">Press</h2>
                    <div class="ys-carousel-cards--container-grid">
                        <?php foreach ($related_press as $related_press_article):
                            $press_id = $related_press_article->ID;

                            $press_image = get_field('press_image', $press_id);
                            $publication_name = get_field('publication', $press_id);
                            $published_date = get_field('published_date', $press_id);
                            $press_description = get_field('press_description', $press_id);
                            $press_link = get_field('press_link', $press_id);

                            ?>
                            <article class="ys-carousel-card">
                                <div class="ys-carousel-card--image-container">
                                    <?php echo get_the_post_thumbnail($related_press_article->ID, 'thumbnail'); ?>
                                </div>
                                <h3><?php echo $publication_name ?></h3>
                                <p class="ys-carousel-card--date"><?php echo $published_date ?></p>
                                <p class="ys-carousel-card--description"><?php echo $press_description ?></p>
                                <a class="ys-btn ys-btn--yellow ys-skew" href="<?php echo esc_url($press_link); ?>">Read
                                    More</a>
                            </article>

                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        $supplemental_image1 = get_field('supplemental_image1');
        $supplemental_image2 = get_field('supplemental_image2');
        $supplemental_image3 = get_field('supplemental_image3');

        ?>
        <section class="single-project-supplemental">
            <?php if ($supplemental_image1): ?>
                <img src="<?php echo esc_url($supplemental_image1['url']) ?>"
                     alt="<?php echo esc_attr($supplemental_image1['alt']) ?>"/>
            <?php endif; ?>

            <?php if ($supplemental_image2): ?>
                <img src="<?php echo esc_url($supplemental_image2['url']) ?>"
                     alt="<?php echo esc_attr($supplemental_image2['alt']) ?>"/>
            <?php endif; ?>

            <?php if ($supplemental_image3): ?>
                <img src="<?php echo esc_url($supplemental_image3['url']) ?>"
                     alt="<?php echo esc_attr($supplemental_image3['alt']) ?>"/>
            <?php endif; ?>

        </section>
    <?php endif; ?>


    <?php
    /*  -------------------------------------------------------------------
        SINGLE PRESS ARTICLE CONTENT
    */

    if (is_singular('press')):
        $press_image = get_field('press_image');
        $publication = get_field('publication');
        $published_date = get_field('published_date');
        $press_description = get_field('press_description');
        $press_link = get_field('press_link');
        ?>
        <section class="single-press">
            <div class="inner inner--content">
                <article>
                    <div class="skewed-image-container">
                        <?php if ($press_image): ?>
                            <img src="<?php echo $press_image['url'] ?>" alt="<?php echo $press_image['alt'] ?>"/>
                        <?php endif; ?>
                    </div>
                    <h3 class="press-card--publication-name"><?php echo $publication ?></h3>
                    <p class="press-card--published-date"></p>
                    <p class="press-card--description"></p>
                    <a href="<?php echo $press_link ?>" target="_blank">Read More</a>
                </article>
            </div>
        </section>
    <?php endif; ?>
    </div>
<?php endif; ?>