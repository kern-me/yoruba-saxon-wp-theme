<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

?>
<section class="ys-section ys-section--intro ys-section--pad-top">
    <div class="ys-skewed">
        <div class="inner inner--lines">
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
                        <a class="ys-btn ys-btn--yellow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <span><?php echo esc_html( $link_title ); ?></span>
                        </a>
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
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Watch Now</span></a>
                    </div>
                    <div class="ys-carousel-card">
                        <div>
                            <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/latest-work-2.jpg" alt="" />
                            <h3>Lawman: Bass Reeves</h3>
                            <p>Paramount+</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Watch Now</span></a>
                    </div>
                    <div class="ys-carousel-card">
                        <div>
                            <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/latest-work-3.jpg" alt="" />
                            <h3>The After</h3>
                            <p>Netflix</p>
                        </div>
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Watch Now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ys-section ys-section--pad-top">
    <div class="inner">
        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/meet-the-team-graphic.jpg" alt="" />
    </div>
</section>

<section class="ys-section ys-section--intro ys-no-skew ys-section--pad-top">
    <div class="inner">
        <h2 class="heading-xl">Press</h2>
        <div class="ys-carousel-cards--container">
            <div class="ys-carousel-card">
                <div>
                    <div class="skewed-image-container">
                        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/press-1.jpg" alt="" />
                    </div>
                    <div class="card-content">
                        <h3>Variety</h3>
                        <p>May 23, 2024</p>
                        <p>David Oyelowo on Creating an Inclusive Kingdom and Sticking With ‘Bass Reeves’ After Being Turned Down by Every Studio</p>
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="ys-carousel-card">
                <div>
                    <div class="skewed-image-container">
                        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/press-2.jpg" alt="" />
                    </div>
                    <div class="card-content">
                        <h3>Deadline</h3>
                        <p>May 15, 2024</p>
                        <p>David Oyelowo Is Working To “Normalize The Marginalized” With Production Company Yoruba Saxon And Streamer Mansa</p>
                        <a href="#" class="ys-btn ys-btn--yellow"><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="ys-carousel-card">
                <div>
                    <div class="skewed-image-container">
                        <img src="<?php echo site_url() ?>/wp-content/uploads/2024/09/press-3.jpg" alt="" />
                    </div>
                    <div class="card-content">
                        <h3>Robb Report</h3>
                        <p>April 28, 2024</p>
                        <p>Meet Hollywood Power Couple David and Jessica Oyelowo; Together since they were teens, the actor and his producing-partner wife...</p>
                        <a href="#" class="ys-btn ys-btn--yellow ys-btn--skewed"><span>Read More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

