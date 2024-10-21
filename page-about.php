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

<section class="ys-section pad-top--xl">
    <div class="inner gutter">
        <h2 class="heading-l">Projects</h2>
        <div class="ys-masonry-grid pad-top--l">
        <?php if ($projects):
            foreach ($projects as $project):
                $pr_id = $project->ID;

                $project_image = get_field('description_image', $pr_id);
                $project_title = get_the_title($pr_id);
                $project_link = get_permalink($pr_id);
                ?>
            <div class="ys-masonry-grid--col">
                <a href="<?php echo esc_url($project_link); ?>">
                    <img class="" src="<?php echo $project_image['url']; ?>" alt="<?php echo $project_image['alt']; ?>">
                </a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <a href="/projects" class="ys-btn ys-btn--yellow ys-btn--skewed"><span>All Projects</span></a>
    </div>
</section>

<section class="ys-section pad-top--xl">
    <div class="inner gutter">
        <h2 class="heading-xl">Founders</h2>
        <h3><?php echo $founders_heading ?></h3>
        <p><?php echo $founders_description ?></p>
        <img src="<?php echo $founders_image['url']; ?>" alt="<?php echo $founders_image['alt']; ?>">
        <a href="<?php echo $founders_link['url']; ?>" target="_blank"><?php echo $founders_link['title']; ?></a>
    </div>
</section>

<section class="ys-section pad-top--xl">
    <div class="inner gutter">
        <h2 class="heading-xl">Press</h2>
        <?php if ($featured_press):
            foreach ($featured_press as $press):
                $pid = $press->ID;

                $press_image = get_field('press_image', $pid);
                $publication_name = get_field('publication', $pid);
                $published_date = get_field('published_date', $pid);
                $press_description = get_field('press_description', $pid);
                $press_link = get_field('press_link', $pid);
                ?>
                <div class="ys-carousel-card--image-container">
                    <?php echo get_the_post_thumbnail($pid, 'thumbnail'); ?>
                    <a class="ys-btn ys-btn--yellow ys-skew" href="/press">All Press</a>
                </div>
                <h3><?php echo $publication_name ?></h3>
                <p class="ys-carousel-card--date"><?php echo $published_date ?></p>
                <p class="ys-carousel-card--description"><?php echo $press_description ?></p>
                <a class="ys-btn ys-btn--white ys-skew" href="<?php echo esc_url($press_link); ?>">Continue Reading</a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<section class="ys-section pad-top--xl">
    <div class="inner gutter">
        <h2 class="heading-xl">Partners</h2>
        <?php
        if (have_rows('partners')):
            while (have_rows('partners')) : the_row();
                $partner_logo = get_sub_field('partner_logo');
                echo '<img src="' . $partner_logo['url'] . '" alt="' . $partner_logo['alt'] . '" />';
            endwhile;
        endif;
        ?>
    </div>
</section>


<?php get_footer(); ?>
