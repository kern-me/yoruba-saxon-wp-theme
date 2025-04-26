<section class="ys-section ys-section--press ys-no-skew ys-section--pad-top ys-section--pad-bottom">
    <div class="inner">

        <?php $press_heading = get_field('press_heading'); ?>
        <a class="u-heading-link u-text-black heading-offset" href="<?php echo site_url() ?>/press"><h2 class="u-heading-lt"><?php echo $press_heading ?></h2></a>
        <svg class="carousel-clip-path" width="1364" height="802" viewBox="0 0 1364 802" fill="none">
            <clipPath id="carousel_clip_path">
                <path d="M73 1L1 298L4 801.5L1265 790.5L1261.5 403L1362.5 1H73Z" fill="#D9D9D9" fill-opacity="0.6" stroke="black"/>
            </clipPath>
        </svg>
        <div class="ys-carousel-cards--container-grid u-pad-top--l">
            <?php
            $press_cards = get_field('press_cards');

            if($press_cards): foreach($press_cards as $press_card):
                $publication_name = get_field('publication', $press_card->ID);
                $press_link = get_field('press_link', $press_card->ID);
                $post_date = get_the_date( 'F j, Y', $press_card->ID );
                ?>
                <a class="u-card-link u-card-link--light" href="<?php echo esc_url($press_link); ?>" target="_blank" rel="noopener">
                    <article class="ys-carousel-card">
                        <div>
                            <div class="ys-carousel-card--image-container">
                                <?php echo get_the_post_thumbnail($press_card->ID, ''); ?>
                            </div>
                            <div class="ys-carousel-card--entry-content">
                                <h3 class="ys-carousel-card--heading"><?php echo $publication_name ?></h3>
                                <p class="ys-carousel-card--date"><?php echo $post_date; ?></p>
                            </div>
                            <div class="ys-carousel-card--description u-margin-top-2"><?php echo apply_filters('the_content', $press_card->post_content); ?></div>
                        </div>

                        <div class="ys-btn ys-btn--yellow u-margin-top-2--mobile"><span>Read More</span></div>
                    </article>
                </a>
            <?php endforeach; endif; ?>
        </div>
</section><?php
