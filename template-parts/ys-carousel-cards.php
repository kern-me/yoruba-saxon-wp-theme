<section class="ys-section ys-section--intro ys-no-skew ys-section--pad-top">
    <div class="inner">

        <?php $press_heading = get_field('press_heading'); ?>
        <h2 class="heading-xl"><?php echo $press_heading ?></h2>
        <svg class="carousel-clip-path" width="1364" height="802" viewBox="0 0 1364 802" fill="none" xmlns="http://www.w3.org/2000/svg">
            <clipPath id="carousel_clip_path">
                <path d="M73 1L1 298L4 801.5L1265 790.5L1261.5 403L1362.5 1H73Z" fill="#D9D9D9" fill-opacity="0.6" stroke="black"/>
            </clipPath>
        </svg>
        <div class="ys-carousel-cards--container-grid ys-slick">
                <?php
                $press_cards = get_field('press_cards');

                if($press_cards): foreach($press_cards as $press_card):
                    $press_image = get_field('press_image', $press_card->ID);
                    $publication_name = get_field('publication', $press_card->ID);
                    $published_date = get_field('published_date', $press_card->ID);
                    $press_description = get_field('press_description', $press_card->ID);
                    $press_link = get_field('press_link', $press_card->ID);
                    ?>
                    <article class="ys-carousel-card">
                        <div>
                            <div class="ys-carousel-card--image-container">
                                <?php echo get_the_post_thumbnail($press_card->ID, ''); ?>
                            </div>
                            <div class="ys-carousel-card--entry-content">
                                <h3 class="ys-carousel-card--heading"><?php echo $publication_name ?></h3>
                                <p class="ys-carousel-card--date"><?php echo $published_date ?></p>
                            </div>
                            <div class="ys-carousel-card--description u-margin-top-2"><?php echo $press_description ?></div>
                        </div>

                        <a class="ys-btn ys-btn--yellow u-margin-top-2--mobile" href="<?php echo esc_url($press_link); ?>" target="_blank"><span>Read More</span></a>
                    </article>
                <?php endforeach; endif; ?>
        </div>
</section>