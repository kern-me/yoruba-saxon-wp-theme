<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');
$project_cards = get_field('project_cards');
$latest_work_heading = get_field('latest_work_heading');
?>
<section class="ys-section ys-section--intro ys-section--pad-top u-overflow-visible">
    <div class="ys-skewed">
        <div class="inner inner--lines">
            <div class="ys-two-col">
                <div class="ys-col ys-col--first ys-two-col--content">
                    <a class="u-heading-link u-text-black" href="<?php echo site_url() ?>/about"><h2 class="u-heading-lt u-skew-base--desktop"><?php echo $main_heading; ?></h2></a>

                    <div class="home-main-subheading">
                        <?php echo $main_subheading; ?>
                    </div>
                    <?php
                    $link = get_field('main_cta');

                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="ys-btn ys-btn--yellow u-margin-top-2 u-show-desktop-only--flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <span><?php echo esc_html( $link_title ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="ys-col ys-col--last u-margin-top-2--mobile">
                    <img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['alt']; ?>">
                    <a class="ys-btn ys-btn--yellow u-margin-top-2 u-show-mobile-only--flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span><?php echo esc_html( $link_title ); ?></span>
                    </a>
                </div>
            </div>

            <div class="ys-carousel-cards ys-section--pad-top">
                <a class="u-heading-link u-text-black" href="<?php echo site_url() ?>/projects"><h2 class="u-heading-lt u-skew-base--desktop"><?php echo $latest_work_heading ?></h2></a>
                <div class="ys-carousel-cards--container ys-slick u-pad-top--l">
                    <?php
                    if($project_cards): foreach($project_cards as $project_card):
                        $title = get_the_title($project_card->ID);
                        $studio = get_field('studio', $project_card->ID);
                        $permalink =  get_permalink($project_card->ID);
                        ?>
                        <a title="Learn more about <?php echo $title ?>" class="u-card-link u-card-link--light" href="<?php echo $permalink; ?>">
                            <article class="ys-carousel-card">
                                <div class="ys-carousel-card--image-container">
                                    <?php echo get_the_post_thumbnail($project_card->ID); ?>
                                </div>
                                <div class="ys-carousel-card--entry-content">
                                    <h3 class="ys-carousel-card--heading"><?php echo $title ?></h3>
                                    <p class="ys-carousel-card--date"><?php echo $studio ?></p>
                                </div>
                                <div class="ys-btn ys-btn--yellow u-margin-top-2"><span>Read More</span></div>
                            </article>
                        </a>
                    <?php endforeach; endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>