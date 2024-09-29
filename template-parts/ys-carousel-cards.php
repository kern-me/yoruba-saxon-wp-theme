<section class="ys-section ys-section--intro ys-no-skew ys-section--pad-top">
    <div class="inner">

        <?php $press_heading = get_field('press_heading'); ?>
        <h2 class="heading-xl"><?php echo $press_heading ?></h2>
        <svg class="carousel-clip-path" width="1349" height="676" viewBox="0 0 1349 676" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <clipPath id="carousel_clip_path">
                    <path d="M75.5 1L1 302V675H1262V356.5L1348 1H75.5Z" stroke="black"/>
                </clipPath>
            </defs>
        </svg>
        <div class="ys-carousel-cards--container-grid ys-slick">
            <?php
            if( have_rows('press_cards') ):
                while( have_rows('press_cards') ) : the_row();
                    $press_card_heading = get_sub_field('press_card_heading');
                    $press_card_date = get_sub_field('press_card_date');
                    $press_card_description = get_sub_field('press_card_description');
                    $press_card_image = get_sub_field('press_card_image');
                    $press_card_link = get_sub_field('press_card_link');

                    if( $press_card_link ):
                        $link_url = $press_card_link['url'];
                        $link_title = $press_card_link['title'];
                        $link_target = $press_card_link['target'] ? $press_card_link['target'] : '_self';
                    endif;

                    echo '<div class="ys-carousel-card">';
                    echo '<div class="ys-carousel-card--image-container">';
                    echo '<img src="' . esc_url($press_card_image['url']) . '" alt="' . esc_attr($press_card_image['alt']) . '" />';
                    echo '</div>';

                    echo '<div>';
                    echo '<h3 class="ys-carousel-card--heading">' . $press_card_heading . '</h3>';
                    echo '<p class="ys-carousel-card--date">' . $press_card_date . '</p>';
                    echo '</div>';

                    echo '<p class="ys-carousel-card--description">' . $press_card_description . '</p>';
                    echo '<a class="ys-btn ys-btn--yellow" href="'. esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . '<span>' . esc_html( $link_title ) . '</span></a>';

                    echo '</div>';
                endwhile;
            endif;
            ?>
        </div>
</section>