<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

$latest_work_heading = get_field('latest_work_heading');

$project_cards = get_field('project_cards');

?>
<section class="ys-section ys-section--intro ys-section--pad-top">
    <div class="ys-skewed">
        <div class="inner inner--lines">
            <div class="ys-two-col ys-two-col--mobile-reversed">
                <div class="ys-col ys-col--first ys-two-col--content">
                    <h1 class="text--no-wrap"><?php echo $main_heading; ?></h1>

                    <?php echo $main_subheading; ?>

                    <?php
                    $link = get_field('main_cta');

                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="ys-btn ys-btn--yellow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <span><?php echo esc_html( $link_title ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="ys-col ys-col--last">
                    <img src="<?php echo $main_image ?>')" alt="">
                </div>
            </div>

            <div class="ys-carousel-cards ys-section--pad-top">
                <h2 class="heading-xl"><?php echo $latest_work_heading ?></h2>
                <div class="ys-carousel-cards--container ys-slick">
                    <?php
                    if($project_cards): foreach($project_cards as $project_card):
                        $img = get_field('description_image', $project_card->ID);
                        $title = get_the_title($project_card->ID);
                        $studio = get_field('studio', $project_card->ID);
                        $permalink =  get_permalink($project_card->ID);
                        ?>
                        <article class="ys-carousel-card">
                            <div class="ys-carousel-card--image-container">
                                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                                <div class="ys-carousel-card--entry-content">
                                    <h3 class="ys-carousel-card--heading"><?php echo $title ?></h3>
                                    <p class="ys-carousel-card--date"><?php echo $studio ?></p>
                                </div>
                            </div>
                            <a class="ys-btn ys-btn--yellow" href="<?php echo $permalink; ?>"><span>Read More</span></a>
                        </article>
                    <?php endforeach; endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>
