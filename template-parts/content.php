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
                            <img src=" <?php echo esc_url($description_image['url']) ?>'" alt="<?php echo esc_attr($description_image['alt']) ?>" />
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
                echo
                    '<div class="video-container">
                        <video autoplay loop muted playsinline>
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
                '<div class="featured-review">'.$featured_review.'<p>&mdash; ' . $featured_review_source . '</p></div>';
            ?>
        </section>
        <?php endif; ?>

        <?php
        $related_press = get_field('related_press');

        if( $related_press ): ?>
        <section class="single-project-press">
            <?php foreach( $related_press as $related_press_article ):
                $permalink = get_permalink( $related_press_article->ID );
                $title = get_the_title( $related_press_article->ID );
                ?>
                    <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>

        <?php
        $supplemental_image = get_field('supplemental_image');

        if ($supplemental_image): ?>
        <section class="single-project-supplemental">
            <img src="<?php echo esc_url($supplemental_image['url'])?>" alt="<?php echo esc_attr($supplemental_image['alt'])?>"/>
        </section>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php endif; ?>