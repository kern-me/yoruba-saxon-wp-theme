<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yoruba-saxon
 */
?>
<div class="entry-content"><!-- START .entry-content -->

    <?php

    /*  -------------------------------------------------------------------
        SINGLE PROJECT CONTENT
    */

    if (is_singular('project')) {

        $description_image = get_field('description_image');
        $directed_by = get_field('directed_by');
        $produced_by = get_field('produced_by');
        $studio = get_field('studio');
        $written_by = get_field('written_by');
        $starring = get_field('starring');
        $release_date = get_field('release_date');
        $watch_link = get_field('watch_link');

        $featured_media_selection = get_field('featured_media_selection');
        $featured_review = get_field('featured_review');
        $related_press = get_field('related_press');

        $supplemental_image1 = get_field('supplemental_image1');
        $supplemental_image2 = get_field('supplemental_image2');
        $supplemental_image3 = get_field('supplemental_image3');

        $supplemental_image1_position = get_field('supplemental_image1_position');
        $supplemental_image2_position = get_field('supplemental_image2_position');
        $supplemental_image3_position = get_field('supplemental_image3_position');

        if ($watch_link) {
            $link_url = $watch_link['url'];
            $link_title = $watch_link['title'];
            $link_target = $watch_link['target'] ? $watch_link['target'] : '_self';
        } ?>

        <section class="single-project-description ys-section ys-section--intro u-pad-top--xl u-pad-bottom--xl">
            <div class="ys-skewed">
                <div class="inner inner--lines">
                    <div class="ys-two-col ys-two-col--mobile-reversed">
                        <div class="ys-col ys-col--first ys-two-col--content">
                            <div class="single-project--intro-content u-margin-bottom-2--mobile">
                                <?php the_content(); ?>
                            </div>
                            <?php if ($directed_by) { ?>
                                <p><strong>Directed By: </strong><?php echo $directed_by ?></p>
                            <?php } ?>

                            <?php if ($produced_by) { ?>
                                <p><strong>Produced By: </strong><?php echo $produced_by ?></p>
                            <?php } ?>

                            <?php if ($studio) { ?>
                                <p><strong>Studio: </strong><?php echo $studio ?></p>
                            <?php } ?>

                            <?php if ($written_by) { ?>
                                <p><strong>Written By: </strong><?php echo $written_by ?></p>
                            <?php } ?>

                            <?php if ($starring) { ?>
                                <p><strong>Starring: </strong><?php echo $starring ?></p>
                            <?php } ?>

                            <?php if ($release_date) { ?>
                                <p><strong>Release Date: </strong><?php echo $release_date ?></p>
                            <?php } ?>

                            <?php if ($watch_link) { ?>
                                <a class="ys-btn ys-btn--yellow u-margin-top--l" href="<?php echo esc_url($link_url); ?>" target="_blank" rel="noopener">
                                    <span>Watch Now</span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="ys-col ys-col--last">
                            <?php if ($description_image) { ?>
                                <img src=" <?php echo esc_url($description_image['url']) ?>'"
                                     alt="<?php echo esc_attr($description_image['alt']) ?>"/>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if ($featured_media_selection) { ?>
            <section class="single-project-featured-media">
                <?php
                if ($featured_media_selection === 'video') {
                    $featured_video = get_field('featured_video');
                    $featured_video_poster = get_field('featured_video_poster');
                    echo '<div class="video-container"><button id="featured_play_btn" class="ys-btn--video initial"></button><video id="featured_video" poster="' . $featured_video_poster . '"><source src="' . $featured_video . '" type="video/mp4"></video></div>';

                } elseif ($featured_media_selection === 'image' ) {
                    $featured_media_image = get_field('featured_image');
                    if ($featured_media_image) {
                        echo '<img src="' . esc_url($featured_media_image['url']) . '" alt="' . esc_attr($featured_media_image['alt']) . '"/>';
                    }
                }

                if ($featured_review) {
                    $featured_review_source = get_field('featured_review_source');
                    echo '<div class="featured-review"><div class="inner">' . $featured_review . '<p>&mdash; ' . $featured_review_source . '</p></div></div>';
                } ?>
            </section>
        <?php } ?>

        <?php
        if ($related_press) { ?>
            <section class="single-project-press ys-carousel-cards--container u-pad-top--xl">
                <div class="inner">
                    <h2 class="heading-xl heading-offset u-heading-thin">Press</h2>
                    <div class="ys-carousel-cards--container-grid u-pad-top--l">
                        <?php foreach ($related_press as $related_press_article) {
                            $press_id = $related_press_article->ID;
                            $publication_name = get_field('publication', $press_id);
                            $press_link = get_field('press_link', $press_id);
                            ?>
                            <article class="ys-carousel-card">
                                <div class="ys-carousel-card--image-container">
                                    <?php echo get_the_post_thumbnail($related_press_article->ID); ?>
                                </div>
                                <h3><?php echo $publication_name ?></h3>
                                <p class="ys-carousel-card--date"><?php $post_date = get_the_date('F j, Y');
                                    echo $post_date; ?></p>
                                <div class="ys-carousel-card--description u-margin-top-2"><?php echo apply_filters('the_content', $related_press_article->post_content); ?></div>
                                <a class="ys-btn ys-btn--yellow u-skew u-margin-top-2"
                                   href="<?php echo esc_url($press_link); ?>"><span>Read More</span></a>
                            </article>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php
        if ($supplemental_image1 || $supplemental_image2 || $supplemental_image3) { ?>
            <section class="single-project-supplemental u-pad-top--xxl">
                <div class="inner">
                    <div class="single-project-supplemental--grid">
                        <?php if ($supplemental_image1) { ?>
                            <img class="<?php echo $supplemental_image1_position ?>"
                                 src="<?php echo esc_url($supplemental_image1['url']) ?>"
                                 alt="<?php echo esc_attr($supplemental_image1['alt']) ?>"/>
                        <?php } ?>

                        <?php if ($supplemental_image2) { ?>
                            <img class="<?php echo $supplemental_image2_position ?>"
                                 src="<?php echo esc_url($supplemental_image2['url']) ?>"
                                 alt="<?php echo esc_attr($supplemental_image2['alt']) ?>"/>
                        <?php } ?>

                        <?php if ($supplemental_image3) { ?>
                            <img class="<?php echo $supplemental_image3_position ?>"
                                 src="<?php echo esc_url($supplemental_image3['url']) ?>"
                                 alt="<?php echo esc_attr($supplemental_image3['alt']) ?>"/>
                        <?php } ?>
                    </div>
            </section>
        <?php } ?>
    <?php } ?>



    <?php
    /*  -------------------------------------------------------------------
        SINGLE PRESS ARTICLE CONTENT
    */

    if (is_singular('press')) {
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
                        <?php if ($press_image) { ?>
                            <img src="<?php echo $press_image['url'] ?>" alt="<?php echo $press_image['alt'] ?>"/>
                        <?php } ?>
                    </div>
                    <h3 class="press-card--publication-name"><?php echo $publication ?></h3>
                    <p class="press-card--published-date"></p>
                    <p class="press-card--description"></p>
                    <a href="<?php echo $press_link ?>" target="_blank" rel="noopener">Read More</a>
                </article>
            </div>
        </section>
    <?php } ?>

</div> <!-- END .entry-content -->