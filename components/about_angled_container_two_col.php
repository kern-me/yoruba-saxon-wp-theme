<?php
$founders_heading = get_field('founders_heading');
$founders_description = get_field('founders_description');
$founders_link = get_field('founders_link');
$founders_image = get_field('founders_image');
$featured_press = get_field('featured_press');
?>
<section class="ys-section u-margin-top--xxl block--two-col-img">
    <div class="inner ys-lines-section">
        <h2 class="heading-xl u-text-center--mobile">Founders</h2>
        <div id="founders" class="skewed-row u-margin-top--l">
            <div class="skewed-col skewed-col--first">
                <h3><?php echo $founders_heading ?></h3>
                <p class="description"><?php echo $founders_description ?></p>
                <a class="ys-btn ys-btn--yellow" href="<?php echo $founders_link['url']; ?>" target="_blank" rel="noopener"><span><?php echo $founders_link['title']; ?></span></a>
            </div>
            <div class="skewed-col skewed-col--last skewed-img-container">
                <img src="<?php echo $founders_image['url']; ?>" alt="<?php echo $founders_image['alt']; ?>">
            </div>
        </div>
        <div id="press" class="skewed-row skewed-row--reversed u-margin-top--xxl">
            <?php if ($featured_press):
            foreach ($featured_press as $press):
                $pid = $press->ID;
                $publication_name = get_field('publication', $pid);
                $press_link = get_field('press_link', $pid);
                ?>
                <div class="skewed-col skewed-col--first skewed-img-container">
                    <h2 aria-hidden="true" class="heading-xl u-skew--reversed u-show-mobile-only--block u-text-center--mobile">Press</h2>
                    <div class="u-margin-top-2--mobile"><?php echo get_the_post_thumbnail($pid); ?></div>
                </div>
                <div class="skewed-col skewed-col--last">
                    <h2 class="heading-xl u-skew--reversed u-show-desktop-only--block">Press</h2>
                    <h3><?php echo $publication_name ?></h3>
                    <p class="ys-carousel-card--date u-skew-0"><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></p>
                    <div class="description"><?php echo apply_filters('the_content', $press->post_content); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php
        if ($featured_press):
            foreach ($featured_press as $press): ?>
                <div class="btn-group">
                    <div>
                        <a class="ys-btn ys-btn--yellow" href="/press"><span>All Press</span></a>
                    </div>
                    <div>
                        <?php $press_link = get_field('press_link', $press->ID); ?>
                        <a target="_blank" rel="noopener" class="ys-btn ys-btn--white" href="<?php echo esc_url($press_link); ?>"><span>Continue Reading</span></a>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</section>