<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

$latest_work_heading = get_field('latest_work_heading');

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
                    // Check rows exists.
                    if( have_rows('carousel_card') ):

                    // Loop through rows.
                    while( have_rows('carousel_card') ) : the_row();
                        $carousel_card_heading = get_sub_field('card_heading');
                        $carousel_card_description = get_sub_field('card_description');
                        $carousel_card_image = get_sub_field('card_image');
                        $carousel_card_link = get_sub_field('card_link');

                        if( $carousel_card_link ):
                            $link_url = $carousel_card_link['url'];
                            $link_title = $carousel_card_link['title'];
                            $link_target = $carousel_card_link['target'] ? $carousel_card_link['target'] : '_self';
                        endif;

                        echo '<div class="ys-carousel-card">';
                        echo '<div>';
                        echo '<img src="' . esc_url($carousel_card_image['url']) . '" alt="' . esc_attr($carousel_card_image['alt']) . '" />';
                        echo '<h3 class="ys-carousel-card--heading">' . $carousel_card_heading . '</h3>';
                        echo '<p class="ys-carousel-card--date">' . $carousel_card_description . '</p>';
                        echo '</div>';
                        echo '<a class="ys-btn ys-btn--yellow" href="'. esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . '<span>' . esc_html( $link_title ) . '</span></a>';
                    echo '</div>';

                    // End loop.
                    endwhile;

                    // No value.
                    else :
                    // Do something...
                    endif;
                    ?>

                    <!--
                    <div class="ys-carousel-card">
                        <div>
                            <img src="/wp-content/uploads/2024/09/latest-work-3.jpg" alt="" />
                            <h3 class="ys-carousel-card--heading">The After</h3>
                            <p class="ys-carousel-card--date">Netflix</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Watch Now</span></a>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</section>
