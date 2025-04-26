
<?php
$press_featured_article = get_field('press_featured_article');

if ($press_featured_article): ?>
    <section class="ys-section ys-lines-section">
        <div class="inner">
            <div class="press-heading-content">
                <?php foreach ($press_featured_article as $pfa):
                    $press_link = get_field('press_link', $pfa->ID);
                    echo get_the_post_thumbnail($pfa->ID);
                    ?>
                    <h2><?php echo get_the_title($pfa->ID); ?></h2>
                    <?php echo apply_filters('the_content', $pfa->post_content); ?>
                    <a href="<?php echo esc_url($press_link); ?>" class="ys-btn ys-btn--yellow u-margin-top-2" target="_blank" rel="noopener"><span>Read More</span></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>