<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

?>
<section class="ys-section ys-section--intro">
    <div class="ys-skewed">
        <div class="inner">
            <div class="ys-two-col">
                <div class="ys-col ys-col--first ys-two-col--content">
                    <h1><?php echo $main_heading; ?></h1>

                    <?php echo $main_subheading; ?>

                    <?php
                    $link = get_field('main_cta');

                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="ys-btn ys-btn--yellow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="ys-col ys-col--last">
                    <img src="<?php echo $main_image ?>')" alt="">
                </div>
            </div>

            <div class="ys-carousel-cards">
                <h2 class="heading-xl">Latest Work</h2>
                <div class="ys-carousel-cards--container">
                    <div class="ys-carousel-card">
                        <div>
                            <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/latest-work-1.jpg" alt="" />
                            <h3>Becoming King</h3>
                            <p>Paramount+</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow">Watch Now</a>
                    </div>
                    <div class="ys-carousel-card">
                        <div>
                            <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/latest-work-2.jpg" alt="" />
                            <h3>Lawman: Bass Reeves</h3>
                            <p>Paramount+</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow">Watch Now</a>
                    </div>
                    <div class="ys-carousel-card">
                        <div>
                            <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/latest-work-3.jpg" alt="" />
                            <h3>The After</h3>
                            <p>Netflix</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow">Watch Now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

