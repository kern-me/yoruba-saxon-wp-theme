<?php
get_header();
include_once('template-parts/ys-hero.php');

$hero_subheading = get_field('hero_subheading');
$projects = get_field('featured_projects');
$founders_heading = get_field('founders_heading');
$founders_description = get_field('founders_description');
$founders_link = get_field('founders_link');
$founders_image = get_field('founders_image');
$featured_press = get_field('featured_press');
$partners = get_field('partners');

?>

<section class="ys-section ys-section--about-intro">
    <div class="inner gutter">
        <?php echo $hero_subheading ?>
    </div>
</section>

<section id="projects" class="ys-section margin-top--xxl block--masonry-grid">
    <div class="inner gutter">
        <h2 class="heading-xl u-text-center--mobile">Projects</h2>
        <div class="grid pad-top--l">
        <?php if ($projects):
            foreach ($projects as $project):
                $pr_id = $project->ID;

                $project_image = get_field('description_image', $pr_id);
                $project_title = get_the_title($pr_id);
                $studio = get_field('studio', $pr_id);
                $project_link = get_permalink($pr_id);
                ?>
                <a href="<?php echo esc_url($project_link); ?>">
                    <div>
                        <p class="project-title"><?php echo $project_title ?></p>
                        <p class="project-studio"><?php echo $studio ?></p>
                    </div>
                    <img src="<?php echo $project_image['url']; ?>" alt="<?php echo $project_image['alt']; ?>">
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <a href="<?php echo site_url() ?>/projects" class="ys-btn ys-btn--yellow u-content-centered--mobile u-margin-top-2"><span>All Projects</span></a>
    </div>
</section>

<section class="ys-section margin-top--xxl block--two-col-img">
    <div class="inner gutter ys-lines-section">
        <h2 class="heading-xl u-text-center--mobile">Founders</h2>
        <div id="founders" class="skewed-row margin-top--l">
            <div class="skewed-col skewed-col--first">
                <h3><?php echo $founders_heading ?></h3>
                <p class="description"><?php echo $founders_description ?></p>
                <a class="ys-btn ys-btn--yellow" href="<?php echo $founders_link['url']; ?>" target="_blank"><span><?php echo $founders_link['title']; ?></span></a>
            </div>
            <div class="skewed-col skewed-col--last skewed-img-container">
                <img src="<?php echo $founders_image['url']; ?>" alt="<?php echo $founders_image['alt']; ?>">
            </div>
        </div>
        <div id="press" class="skewed-row skewed-row--reversed margin-top--xxl">
            <?php if ($featured_press):
            foreach ($featured_press as $press):
                $pid = $press->ID;

                $press_image = get_field('press_image', $pid);
                $publication_name = get_field('publication', $pid);
                $published_date = get_field('published_date', $pid);
                $press_description = get_field('press_description', $pid);
                $press_link = get_field('press_link', $pid);
                ?>
                <div class="skewed-col skewed-col--first skewed-img-container">
                    <h2 aria-hidden="true" class="heading-xl ys-skew--reversed show-mobile-only--block u-text-center--mobile">Press</h2>
                    <div class="u-margin-top-2--mobile"><?php echo get_the_post_thumbnail($pid, 'medium'); ?></div>
                </div>
                <div class="skewed-col skewed-col--last">
                    <h2 class="heading-xl ys-skew--reversed show-desktop-only--block">Press</h2>
                    <h3><?php echo $publication_name ?></h3>
                    <p class="ys-carousel-card--date"><?php echo $published_date ?></p>
                    <div class="description"><?php echo $press_description ?></div>
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
                        <a class="ys-btn ys-btn--white" href="<?php echo esc_url($press_link); ?>"><span>Continue Reading</span></a>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</section>

<section id="partners" class="ys-section margin-top--xxl">
    <div class="inner gutter">
        <h2 class="heading-xl u-text-center--mobile">Partners</h2>
        <div class="flex-grid flex-grid--partners pad-top--l">
        <?php
        if (have_rows('partners')):
            while (have_rows('partners')) : the_row();
                $partner_logo = get_sub_field('partner_logo');
                $partner_logo_size = get_sub_field('partner_logo_size');

                if ($partner_logo_size):
                    $partner_logo_size = get_sub_field('partner_logo_size');
                else:
                    $partner_logo_size = '';
                endif;

                echo '<img class="' . $partner_logo_size . '" src="' . $partner_logo['url'] . '" alt="' . $partner_logo['alt'] . '" />';
            endwhile;
        endif;
        ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
