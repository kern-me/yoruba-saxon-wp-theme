<?php
get_header();
include_once ('template-parts/ys-hero.php');
?>
<section class="ys-section ys-section--projects pad-bottom-0">
    <div class="inner">
        <img class="u-centered u-heading-width--l" src="<?php echo get_template_directory_uri() . '/assets/images/heading-coming-soon.svg' ?>" alt="Coming Soon" />
        <div class="ys-projects-grid ys-projects-grid--coming-soon pad-top--l">
            <?php
            $projects_coming_soon = get_field('projects_coming_soon');

            if($projects_coming_soon): foreach($projects_coming_soon as $project_card):
                $img = get_field('description_image', $project_card->ID);
                $title = get_the_title($project_card->ID);
                $studio = get_field('studio', $project_card->ID);
                $permalink =  get_permalink($project_card->ID);
            ?>
            <a href="<?php echo $permalink ?>" class="ys-project">
                <div class="ys-project-image-container">
                    <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                </div>
                <div class="ys-project-text-container">
                    <h3><?php echo $title ?></h3>
                    <p><?php echo $studio ?></p>
                </div>
            </a>
            <?php endforeach; endif; ?>
        </div>

        <img class="u-centered margin-top--xl u-heading-width--l" src="<?php echo get_template_directory_uri() . '/assets/images/heading-all-projects.svg' ?>" alt="All Projects" />

        <div class="ys-projects-grid pad-top--l">
            <?php
            $projects_all = get_field('all_projects');

            if($projects_all): foreach($projects_all as $project_card):
                $img = get_field('description_image', $project_card->ID);
                $title = get_the_title($project_card->ID);
                $studio = get_field('studio', $project_card->ID);
                $permalink =  get_permalink($project_card->ID);
                ?>
                <a href="<?php echo $permalink ?>" class="ys-project">
                    <div class="ys-project-image-container">
                        <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                    </div>
                    <div class="ys-project-text-container">
                        <h3><?php echo $title ?></h3>
                        <p><?php echo $studio ?></p>
                    </div>
                </a>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
